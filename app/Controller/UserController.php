<?php namespace App\Controller;

class UserController extends Controller
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

        if (! $this->validation($_POST, $rules)) {
            return;
        }
   }
}