<?php namespace App\Controller;

use App\Model\Articles;
use App\Model\Users;

class HomeController
{
    public function index()
    {
        return (new Articles)->all();
    }

    public function singleArticle()
    {
        return (new Articles())->find('id', request('id'));
    }
}