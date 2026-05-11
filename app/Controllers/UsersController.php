<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\UserModel;

class UsersController extends BaseController
{
    protected $userModel;
    public function __construct()
    {
        $this->userModel = new UserModel();
    }
    public function index()
    {
        $data = [
            'title' => 'Management Users',
            'users' => $this->userModel->findAll()
        ];

        return view('users/index', $data);
    }

    public function new()
    {
        $data = [
            'title' => 'Add User'
        ];

        return view('users/create', $data);
    }

    public function create()
    {
        $password = password_hash(
            $this->request->getPost('password'),
            PASSWORD_DEFAULT
        );

        $this->userModel->save([
            'name' => $this->request->getPost('name'),
            'email' => $this->request->getPost('email'),
            'password' => $password
        ]);

        return redirect()->to('/users')
                ->with(
                    'success',
                    'User created successfully.'
                );
    }
    public function edit($id)
    {
        $data = [
            'title' => 'Edit User',
            'user' => $this->userModel->find($id)
        ];

        return view('users/edit', $data);
    }
    public function update($id)
    {
        $user = $this->userModel->find($id);

        $password = $user['password'];

        if ($this->request->getPost('password')) {

            $password = password_hash(
                $this->request->getPost('password'),
                PASSWORD_DEFAULT
            );
        }

        $this->userModel->update($id, [
            'name' => $this->request->getPost('name'),
            'email' => $this->request->getPost('email'),
            'password' => $password

        ]);

        return redirect()->to('/users')
                ->with(
                    'success',
                    'User updated successfully.'
                );
    }

    public function delete($id)
    {
        if ($id == session()->get('user_id')) {

            return redirect()->back()
                ->with(
                    'error',
                    'You cannot delete your own account.'
                );
        }

        $this->userModel->delete($id);

        return redirect()->to('/users')
            ->with(
                'success',
                'User deleted successfully.'
            );
    }
}
