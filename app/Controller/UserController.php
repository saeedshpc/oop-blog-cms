<?php namespace App\Controller;


class UserController
{
    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] != "POST")
        {
            return;
        }

        $rule = [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' =>'required|min:6|max:20',
            'confirm_password' => 'required|confirm:password'
        ];

//        if (!$this->validation($data, $rule)) {
//            return;
//        }
        var_dump($_POST);die;
    }
}