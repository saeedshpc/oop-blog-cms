<?php namespace App\Controller;

use App\Helper\Validation;

class UserController
{
   public function register()
   {
       if($_SERVER['REQUEST_METHOD'] != "POST")
            return;

       $rules = [
           'name' => 'required',
           'email' => 'required|email|unique:users',
           'password' => 'required|min:6|max:20',
           'confirm_password' => 'required|confirm:password'
       ];

       $validation = new validation();
       $valid = $validation->make($_POST, $rules);
       print_r($validation->getErrors()); die;

       if(!$valid) {
           var_dump($validation->getErrors());die;
       }
       var_dump($_POST);die;
   }
}