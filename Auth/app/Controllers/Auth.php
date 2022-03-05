<?php

namespace App\Controllers;

use Codeigniter\Controller;
use App\Libraries\Hash;

class Auth extends BaseController
{
    public function __construct()
    {
        helper(['url','form']);
    }
    public function index()
    {
        return view('auth/login');
    }
    public function register()
    {
        return view('auth/register');
    }
    public function save()
    {
        //Validate
        // $validation = $this->validate([
        //     'name'      => 'required',
        //     'email'     => 'required|valid_email|is_unique[users.email]',
        //     'password'  => 'required|min_length[5]|max_length[12]',
        //     'cpassword' => 'required|min_length[5]|max_length[12]|matches[password]'
        // ]);

        $validation = $this->validate([
            'name' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Your full name is required'
                ]
            ],
            'email' => [
                'rules'  => 'required|valid_email|is_unique[users.email]',
                'errors' => [
                    'required'    => 'Email is required',
                    'valid_email' => 'Your must enter a valid email',
                    'is_unique'   => 'Email already taken',
                ]
            ],
            'password' => [
                'rules'  => 'required|min_length[5]|max_length[12]',
                'errors' => [
                    'required'   => 'Password is required',
                    'min_length' => 'Password must have atleast 5 characters in length',
                    'max_length' => 'Password must have not have characters more than 12 in length',
                ]
            ],
            'cpassword' => [
                'rules'  => 'required|min_length[5]|max_length[12]|matches[password]',
                'errors' => [
                    'required'   => 'Confirm password is required',
                    'min_length' => 'Confirm password must have atleast 5 characters in length',
                    'max_length' => 'Confirm password must have not have characters more than 12 in length',
                    'matches'    => 'Confirm password not matches to password'
                ]
            ],
        ]);

        if(!$validation){
            return view('auth/register',['validation' => $this->validator]);
        } else {
            // Register use into db
            $name      = $this->request->getPost('name');
            $email     = $this->request->getPost('email');
            $password  = $this->request->getPost('password');

            $values = [
                'name'     => $name,
                'email'    => $email,
                'password' => Hash::make($password),
            ];

            $usersModel = new \App\Models\UsersModel();
            $query = $usersModel->insert($values);
            if(!$query)
            {
                return redirect()->back()->with('fail','something went wrong');
            } else {
                // return redirect()->to('auth/register')->with('success','You are now registered successfully');
                $last_id = $usersModel->insertID();
                session()->set('loggedUser',$last_id);
                return redirect()->to('/dashboard');
            }
        }
    }
    public function check()
    {
        //validation
        $validation = $this->validate([
            'email' => [
                'rules'  => 'required|valid_email|is_not_unique[users.email]',
                'errors' => [
                    'required'      => 'Email is required',
                    'valid_email'   => 'Enter a valid email address',
                    'is_not_unique' => 'This email is not registered on our service'
                ]
            ],
            'password' => [
                'rules' => 'required|min_length[5]|max_length[12]',
                'errors' => [
                    'required'   => 'Password is required',
                    'min_length' => 'Password must have atleast 5 characters in length',
                    'max_length' => 'Password must not have more than 12 characters in length'
                ]
            ]
        ]);

        if(!$validation)
        {
            return view('auth/login',['validation'=>$this->validator]);
        } else {
            $email      = $this->request->getPost('email');
            $password   = $this->request->getPost('password');
            $usersModel = new \App\Models\UsersModel();
            $user_info  = $usersModel->where('email',$email)->first();
            // 입력한 패스워드 , 입력한 이메일에서 추출한 패스워드를 비교한다
            $check_password = Hash::check($password, $user_info['password']);
            echo $check_password;
            if(!$check_password) {
                session()->setFlashdata('fail', 'Incorrect password');
                return redirect()->to('/auth')->withInput();
            } else {
                $user_id = $user_info['id'];
                session()->set('loggedUser',$user_id);
                return redirect()->to('/dashboard');
            }
        }
    }
    public function logout()
    {
        if(session()->has('loggedUser')) {
            session()->remove('loggedUser');
            return redirect()->to('/auth?access=out')->with('fail','You are logged out');
        }
    }
}
