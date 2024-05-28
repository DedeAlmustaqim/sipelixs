<?php

namespace App\Controllers\Service;

use App\Controllers\BaseController;
use App\Models\UserModel;
use CodeIgniter\HTTP\ResponseInterface;

class UserService extends BaseController
{
    public function getUser($id)
    {
        $model = new UserModel();
        $data = $model->first($id);
        return $data;
    }
}
