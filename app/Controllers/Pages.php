<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\FeedbackModel;
use CodeIgniter\Email\Email;

class Pages extends BaseController
{
    protected $user;
    protected $feedback;

    public function __construct()
    {
        $this->user = new UserModel();
        $this->feedback = new FeedbackModel();
    }

    public function index()
    {
        echo view('templates/header');
        echo view('home');
        echo view('templates/footer');
    }

    public function login()
    {
        $email
            = $this->request->getVar('email');
        $password =
            $this->request->getVar('password');
        $userData = $this->user->where('email', $email)
            ->where('password', $password)
            ->findAll();
        if ($userData == null) {
            return redirect()->to('/pages');
        } else {
            $_SESSION['logonUser'] = 'aktif';
            return redirect()->to('/pages');
        }
    }

    public function logout()
    {
        session_destroy();
        return redirect()->to('/pages');
    }

    public function testInputData()
    {
        $this->feedback->save([
            'id' => 123,
            'use_email' => 'test@test.com',
            'feedbackMessage' => 'Testing doang'
        ]);
    }

    //--------------------------------------------------------------------

}