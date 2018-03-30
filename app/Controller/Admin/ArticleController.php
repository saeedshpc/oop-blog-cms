<?php namespace App\Controller\Admin;


use App\Helper\Auth;
use App\Model\Article;
use Carbon\Carbon;

class ArticleController extends AdminController
{
    public function create()
    {
        if(!request()->isPost())
            return;

        $rules = [
            'title' => 'required',
            'body' => 'required'
        ];

        if(! $this->validation(request()->all() , $rules)) {
            return;
        }

        (new Article())->create([
            'title' => request('title'),
            'body' => request('body'),
            'user_id' => Auth::user()->id,
            'created_at' => Carbon::now()
        ]);

        redirect('/admin');
    }

    public function delete()
    {
        if(empty(request('id')))
            redirect('/admin');

        (new Article())->delete(request('id'));
        redirect('/admin');
    }

    public function edit()
    {
        if(empty(request('id')))
            redirect('/admin');

        return (new Article())->find('id' , request('id'));
    }

    public function update($articleId)
    {
        $rules = [
            'title' => 'required',
            'body' => 'required'
        ];

        if(! $this->validation(request()->all() , $rules)) {
            return;
        }

        (new Article())->update($articleId , [
            'title' => request('title'),
            'body' => request('body')
        ]);

        redirect('/admin');
    }

}