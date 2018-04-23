<?php namespace App\Controller;

use App\Model\Users;
use Carbon\Carbon;
use App\Helper\Auth;

class UserController extends Controller
{
    public function __construct()
    {
        parent::__construct();

        if (checkLogin())
            redirect();
    }
    public function register()
    {
        if (!request()->isPost())
            return;

        $rules = [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|max:20',
            'confirm_password' => 'required|confirm:password'
        ];


        if (!$this->validation(request()->all(), $rules)) {
            return;
        }

        $success = (new Users())->create([
            'name' => request('name'),
            'email' => request('email'),
            'password' => password_hash(request('password'), PASSWORD_BCRYPT, ['cost' => 12]),
            'created_at' => carbon::now()
        ]);

        if ($success) {
            // Auto login after register or verification for activating account
        }

        $this->flash->success("Your Registeration has been done successfully");

        redirect();
        return;


    }

    public function login()
    {
        if (!request()->isPost())
            return;

        $rules = [
            'email' => 'required|email',
            'password' => 'required|min:6|max:20'
        ];

        if (! $this->validation(request()->all(), $rules)) {
            return;
        }

        $user = (new Users())->find('email', request('email'));

        if (!$user) {
            $this->flash->error("This email is not registered yet");
            return;
        }

        $login = password_verify(request('password'), $user->password);

        if (!$login) {
            $this->flash->error("Wrong password");
            return;
        }

        $remember = false;
        if(!empty(request('remember')))
            $remember = true;


        Auth::login($user, $remember);

        $this->flash->success("Login done Successfully");

        redirect();
        return;
    }


}