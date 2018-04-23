<?php namespace App\Controller;

use App\Helper\Auth;
use App\Model\Users;

class MemberController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!checkLogin())
            redirect();
    }

    public function changePassword()
    {
        if(! request()->isPost())
            return;

        $rules = [
            'old_password' => 'required|min:6',
            'password' => 'required|min:6|max:20',
            'confirm_password' => 'required|confirm:password'
        ];

        if (! $this->validation(request()->all(), $rules)) {
            return;
        }

        $user = Auth::user();

        $login = password_verify(request('old_password'), $user->password);
        if (!$login) {
            $this->flash->error("The old password is not correct!");
            return;
        }

        (new Users())->update($user->id, [
            'password' => password_hash(request('password'), PASSWORD_BCRYPT, ['cost' => 12])
        ]);

        redirect();
        return;
    }
}