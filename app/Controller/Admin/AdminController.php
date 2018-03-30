<?php namespace App\Controller\Admin;


use App\Controller\Controller;
use App\Helper\Auth;
use App\Model\Article;

class AdminController extends Controller
{
    public function __construct()
    {
        parent::__construct();

        if(!checkLogin())
            redirect('/login.php');

        $user = Auth::user();
        if($user->type != 'admin')
            redirect();
    }

    public function index()
    {
        return (new Article())->select('id' , 'title')->get();
    }

}