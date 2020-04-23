<?php


namespace App\Controllers;


use App\Entity\Magazine;
use App\Repositories\MagazineStorage;
use App\Requests\Request;

class MagazineController extends Controller
{
    public function search(Request $request)
    {
        $term = $request->post('term');
        $magazines = MagazineStorage::findByLikeName($term);

        $data = [];
        /** @var Magazine $magazine */
        foreach ($magazines as $magazine) {
            $data[] = [
                'value' => $magazine->id,
                'label' => join(' ', [$magazine->name, $magazine->number, $magazine->date])
            ];
        }

        header('Content-Type: application/json');
        echo json_encode($data);
        exit();
    }
}
