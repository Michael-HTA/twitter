<?php

namespace App\Services;

use App\Services\UserService;

class FileService
{
    private $userService;
    private  $path = __DIR__ . '/../../storage/profile/';

    public function __construct()
    {
        $this->userService = new UserService();
    }
    public function store()
    {
        $user = $this->userService->login();

        $name = $_FILES['profile']['name'];
        $error = $_FILES['profile']['error'];
        $tmp = $_FILES['profile']['tmp_name'];
        $type = $_FILES['profile']['type'];


        if ($error) {
            return false;
        }

        if ($type === "image/jpeg" || $type === "image/png" || $type === "image/jpg") {

            if(file_exists($this->path . $user->photo)){
                unlink($this->path . $user->photo);
            }

            $this->userService->updateProfile("{$user->first_name}{$user->last_name}{$name}", $user->id);

            move_uploaded_file($tmp,$this->path . $user->first_name . $user->last_name . $name );

            return true;
        } else {

            return false;
        }
    }

    public function imageResponse()
    {

        $photo = $_GET['photo'];

        return readfile($this->path . '/' . $photo);
    }

    public function getPath()
    {

        return "{$this->path}/{$_GET['photo']}";
    }
}
