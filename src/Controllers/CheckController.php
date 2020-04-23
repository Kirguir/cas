<?php


namespace App\Controllers;


use App\Entity\Check;
use App\Entity\User;
use App\Repositories\CheckStorage;
use App\Requests\Request;
use App\Scenarios\UpdateCheck;

class CheckController extends Controller
{
    protected string $uploadDir = '/var/www/uploads/';

    public function index(User $operator)
    {
        $checks = CheckStorage::findAllNewByOperator($operator->id);
        $data = [
            'checks' => $checks,
            'user' => $operator,
        ];
        $this->view('checks', $data);
    }

    public function load(Request $request, User $operator)
    {
        $files = $request->files('check_files');
        $errors = '';

        if (!empty($files)) {
            foreach ($files['error'] as $key => $error) {
                $tmp_name = $files["tmp_name"][$key];
                if (!$tmp_name) continue;

                $name = basename($files["name"][$key]);
                if ($error == UPLOAD_ERR_OK) {
                    if (!@move_uploaded_file($tmp_name, $this->uploadDir . $name)) {
                        $errors .= "Could not move uploaded file '$tmp_name' to '$name'<br/>\n";
                    } else {
                        $check = new Check();
                        $check->delivery_date = date('Y-m-d');
                        $check->operator_id = $operator->id;
                        $check->filename = $name;
                        $check->status = Check::NEW;
                        CheckStorage::add($check);
                    }
                } else {
                    $errors .= "Upload error. [$error] on file '$name'<br/>\n";
                }
            }
        }
        $data = [
            'alert' => $errors,
            'user' => $operator,
        ];
        $this->view('load', $data);
    }

    public function processed(User $operator, int $id)
    {
        $check = CheckStorage::findByID($id);
        if ($check && $check->operator_id === $operator->id) {
            $checkFile = $this->uploadDir . $check->filename;
            $fileData = base64_encode(file_get_contents($checkFile));
            $fileType = mime_content_type($checkFile);
            $data = [
                'check_src' => "data:$fileType;base64,$fileData",
                'check' => $check,
                'user' => $operator,
            ];
            $this->view('processed', $data);
        }
        header('Location: http://' . $_SERVER['HTTP_HOST'] . '/checks', true, 302);
        exit();
    }

    public function update(Request $request, User $operator, int $id)
    {
        $check = CheckStorage::findByID($id);
        if ($check && $check->operator_id === $operator->id) {
            UpdateCheck::run($request, $check);
        }
        header('Location: http://' . $_SERVER['HTTP_HOST'] . '/checks', true, 302);
        exit();
    }

    public function statistic(User $operator)
    {

    }
}
