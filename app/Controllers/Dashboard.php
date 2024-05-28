<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Controllers\Service\UserService;
use App\Models\UserModel;
use CodeIgniter\HTTP\ResponseInterface;

class Dashboard extends BaseController
{
    public function index()
    {
        $userService = new UserService();
        $userData = $userService->getUser(session('id'));
        $data = [
            'title' => 'Dashboard',
            'userData' => $userData,
        ];
        return view('user/dashboard', $data);
    }

    
}
