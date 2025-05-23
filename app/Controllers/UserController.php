<?php

namespace App\Controllers;

use App\Models\UsersModel;

class UserController extends BaseController
{
    private $userModel;

    public function __construct()
    {
        $this->userModel = new UsersModel();
    }
    private function validateUser()
    {
        $validation = \Config\Services::validation();

        $rules = [
            'name' => 'required|min_length[3]',
            'email' => 'required|valid_email',
            'age' => 'required|integer',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }
    }
    public function index(): string
    {
        $response = $this->userModel->findAll();
        $data = [
            'title' => 'Users',
            'users' => $response,
            'copy' => '© 2025 Sebas Table',
        ];

        return view('users/index', $data);
    }

    public function create()
    {
        $this->validateUser();

        $this->userModel->save([
            'name' => $this->request->getPost('name'),
            'email' => $this->request->getPost('email'),
            'age' => $this->request->getPost('age'),
        ]);

        return redirect()->to(base_url())->with('message', 'Usuario creado correctamente.');
    }

    public function update($id)
    {
        $this->validateUser();

        $this->userModel->update($id, [
            'name' => $this->request->getPost('name'),
            'email' => $this->request->getPost('email'),
            'age' => $this->request->getPost('age'),
        ]);
        session()->setFlashdata('message', 'Usuario actualizado correctamente');
        return redirect()->to(base_url());
    }

    public function delete($id)
    {
        $this->userModel->delete($id);
        session()->setFlashdata('message', 'Usuario eliminado correctamente');
        return redirect()->to(base_url());
    }

}
