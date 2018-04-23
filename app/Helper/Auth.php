<?php namespace App\Helper;

use App\Contracts\AuthInterface;
use App\Model\Users;

class Auth implements AuthInterface
{

    /**
     * @param $user
     * @param bool $remember
     * @return mixed
     */
    public static function login($user, $remember = false)
    {
        session()->set('email', $user->email);
        if($remember == true) {
            $rememberToken = random(240);
            (new Users())->update($user->id, [
                'remember_token' => $rememberToken
            ]);
            cookie()->set('remember_token', $rememberToken);
        }
        return true;

    }

    /**
     * @return mixed
     */
    public static function check()
    {
        if (session('email')) {
            $user = (new Users())->find('email', session('email'));
            if ($user)
                return true;
            session()->forget('email');
        }
        elseif (cookie()->exists('remember_token')) {
            $remember_token = cookie('remember_token');

            $user = (new Users())->find('remember_token', $remember_token);
            if (!$user)
                return false;

            session()->set('email', $user->email);
            return true;
        }
        return false;
    }

    /**
     * @return mixed
     */
    public static function logout()
    {
        if (cookie()->exists('remember_token'))
            cookie()->forget('remember_token');

        session_destroy();
        redirect();
    }

    /**
     * @return mixed
     */
    public static function user()
    {
        return (new Users())->find('email', session('email'));
    }
}