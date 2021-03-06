<?php namespace App\Contracts;

interface AuthInterface
{
    /**
     * @param $user
     * @param bool $remember
     * @return mixed
     */
    public static function login($user, $remember = false);

    /**
     * @return mixed
     */
    public static function check();

    /**
     * @return mixed
     */
    public static function logout();

    /**
     * @return mixed
     */
    public static function user();
}