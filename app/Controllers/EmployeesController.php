<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\EmployeeModel;

class EmployeesController extends BaseController
{
    protected $employeeModel;

    public function __construct()
    {
        $this->employeeModel = new EmployeeModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Management Employee',
            'employees' => $this->employeeModel->findAll()
        ];

        return view('employees/index', $data);
    }

    public function new()
    {
        $data = [
            'title' => 'Add Employee'
        ];

        return view('employees/create', $data);
    }

    public function create()
    {
        $validation = $this->validate([
        'photo' => [
           'rules' => 'uploaded[photo]'
               . '|max_size[photo,300]'
               . '|mime_in[photo,image/jpg,image/jpeg]',
           'errors' => [
               'uploaded' => 'Photo is required.',
               'max_size' => 'Photo max size is 300KB.',
               'mime_in' => 'Photo must be JPG/JPEG.'
           ]
        ]
    ]);

        if (!$validation) {

            return redirect()->back()
                ->withInput()
                ->with('error', $this->validator->getError('photo'));
        }

        $photo = $this->request->getFile('photo');

        $newName = null;

        if ($photo && $photo->isValid()) {
            $newName = $photo->getRandomName();
            $photo->move(
                'uploads/employees',
                $newName
            );
        }

        $this->employeeModel->save([
            'name' => $this->request->getPost('name'),
            'email' => $this->request->getPost('email'),
            'phone' => $this->request->getPost('phone'),
            'address' => $this->request->getPost('address'),
            'position' => $this->request->getPost('position'),
            'photo' => $newName,
            'created_by' => (int) session()->get('user_id')
        ]);

        return redirect()->to('/employees')
                ->with(
                    'success',
                    'Employee created successfully.'
                );
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Edit Employee',
            'employee' => $this->employeeModel->find($id)
        ];
        return view('employees/edit', $data);
    }

    public function update($id)
    {
        $employee = $this->employeeModel->find($id);

        $photoName = $employee['photo'];

        $photo = $this->request->getFile('photo');

        if ($photo && $photo->isValid()) {
            $validation = $this->validate([
                'photo' => [
                    'rules' => 'max_size[photo,300]'
                        . '|mime_in[photo,image/jpg,image/jpeg]',
                    'errors' => [
                        'max_size' => 'Photo max size is 300KB.',
                        'mime_in' => 'Photo must be JPG/JPEG.'
                    ]
                ]
            ]);

            if (!$validation) {
                return redirect()->back()
                    ->withInput()
                    ->with('error', $this->validator->getError('photo'));
            }

            $photoName = $photo->getRandomName();
            $photo->move(
                'uploads/employees',
                $photoName
            );

            if (
                !empty($employee['photo']) &&
                file_exists(
                    'uploads/employees/' . $employee['photo']
                )
            ) {
                unlink(
                    'uploads/employees/' . $employee['photo']
                );
            }
        }

        $this->employeeModel->update($id, [
            'name' => $this->request->getPost('name'),
            'email' => $this->request->getPost('email'),
            'phone' => $this->request->getPost('phone'),
            'address' => $this->request->getPost('address'),
            'position' => $this->request->getPost('position'),
            'photo' => $photoName
        ]);

        return redirect()->to('/employees')
                ->with(
                    'success',
                    'Employee updated successfully.'
                );
    }

    public function delete($id)
    {
        $employee = $this->employeeModel->find($id);

        if (
            !empty($employee['photo']) &&
            file_exists(
                'uploads/employees/' . $employee['photo']
            )
        ) {
            unlink(
                'uploads/employees/' . $employee['photo']
            );
        }
        $this->employeeModel->delete($id);

        return redirect()->to('/employees')
            ->with(
                'success',
                'Employee deleted successfully.'
            );
    }
}
