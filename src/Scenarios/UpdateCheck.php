<?php


namespace App\Scenarios;


use App\Entity\Check;
use App\Logger;
use App\Repositories\CheckStorage;
use App\Repositories\MagazineStorage;
use App\Repositories\SubscriptionStorage;
use App\Requests\Request;

class UpdateCheck
{
    /**
     * @param Request $request
     * @param Check $check
     * @throws \Exception
     */
    public static function run(Request $request, Check $check)
    {
        Logger::log('debug', 'start update check');
        $error = false;
        $magazine_rel_id = (int)$request->post('magazine');
        $subscriber_id = (int)$request->post('subscriber');
        $tracking = (int)$request->post('tracking');
        $number = (int)$request->post('number');
        $delivery_date = date_create($check->delivery_date);

        $magazine = MagazineStorage::findByID($magazine_rel_id);
        if (!$magazine || date_create($magazine->date) > $delivery_date) {
            $error = true;
        } else {
            $check->magazine_rel_id = $magazine->id;
        }

        if ($subscription = SubscriptionStorage::findBySubscriberAndMagazineOnDate($subscriber_id, $magazine->magazine_id, $check->delivery_date)) {
            $check->subscriber_id = $subscription->subscriber_id;
        } else {
            $error = true;
        }

        if (!$number || !$tracking) {
            $error = true;
        } else {
            $check->number = $number;
            $check->tracking = $tracking;
        }

        if ($error) {
            $check->status = Check::WRONG;
        } else {
            $check->status = Check::PROCESSED;
        }
        CheckStorage::update($check);
        Logger::log('debug', 'end update check');
    }
}
