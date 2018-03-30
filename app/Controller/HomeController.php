<?php namespace App\Controller;

use App\Model\Article;
use App\Model\DB;
use App\Model\Users;

class HomeController {
    public function index()
    {
        return (new Article())->all();
    }

    public function singleArticle()
    {
        return (new Article())->find('id' , request('id'));
    }
}