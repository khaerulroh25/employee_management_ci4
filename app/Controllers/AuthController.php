<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use CodeIgniter\HTTP\ResponseInterface;

class AuthController extends BaseController
{
    public function login()
    {
        return view('auth/login');
    }

    public function loginProcess()
    {
        $model = new UserModel();

        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $user = $model
            ->where('email', $email)
            ->first();

        if ($user && password_verify($password, $user['password'])) {

            session()->set([
                'user_id' => $user['id'],
                'user_name' => $user['name'],
                'isLoggedIn' => true
            ]);

            return redirect()->to('/dashboard');
        }

        return redirect()->back()
            ->with('error', 'Invalid credentials');
    }

    public function logout()
    {
        session()->destroy();

        return redirect()->to('/');
    }
}
