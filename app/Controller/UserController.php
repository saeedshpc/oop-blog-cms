<?php namespace App\Controller;

use App\Helper\Auth;
use App\Model\Users;
use Carbon\Carbon;

class UserController extends Controller
{
    public function __construct()
    {
        parent::__construct();

        if(checkLogin())
            redirect();
    }

    public function register()
    {
        if(! request()->isPost())
            return;

        $rules = [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|max:20',
            'confirm_password' => 'confirm:password'
        ];

        if(! $this->validation(request()->all() , $rules)) {
            return;
        }

        $success = (new Users())->create([
            'name' => request('name'),
            'email' => request('email'),
            'password' => password_hash(request('password') , PASSWORD_BCRYPT , ['cost' => 12]),
            'created_at' => Carbon::now()
        ]);

        $this->flash->success('عضویت شما با موفقیت انجام شد');

        redirect();
        return;
    }
    public function login()
    {
        if(! request()->isPost())
            return;

        $rules = [
            'email' => 'required|email',
            'password' => 'required|min:6|max:20',
        ];

        if(! $this->validation(request()->all() , $rules)) {
            return;
        }

        $user = (new Users())->find('email',request('email'));

        if(!$user) {
            $this->flash->error('چنین ایمیلی وجود ندارد');
            return;
        }

        $login = password_verify(request('password') , $user->password );

        if(!$login) {
            $this->flash->error('پسورد اشتباه است');
            return;
        }

        $remember = false;
        if(!empty(request('remember')))
            $remember = true;

        Auth::login($user , $remember);

        $this->flash->success('ورود شما با موفقیت انجام شد');
        redirect();
        return;
    }
}