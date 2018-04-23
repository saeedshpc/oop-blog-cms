<?php namespace App\Controller\Admin;


use App\Helper\Auth;
use App\Controller\Controller;
use App\Model\Articles;

class AdminController extends Controller
{
    public function __construct()
    {
        parent::__construct();

        if (!checklogin())
            redirect('/login.php');

        $user = Auth::user();
        if($user->type != 'admin')
            redirect();

    }

    public function index()
    {
        return (new Articles())->select('id', 'title')->get();
    }
}