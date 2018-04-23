<?php namespace App\Controller\Admin;

use App\Model\Articles;
use App\Helper\Auth;
use Carbon\Carbon;

class ArticleController extends AdminController {

    public function create()
    {
        if(!request()->isPost())
            return;

        $rules = [
            'title' => 'required',
            'body' => 'required'
        ];

        if (!$this->validation(request()->all(), $rules)) {
            return;
        }

        (new Articles())->create([
            'title' => request('title'),
            'body' => request('body'),
            'user_id' => Auth::user()->id,
            'created_at' => carbon::now()
        ]);

        redirect('/admin');
    }

    public function delete()
    {
        if(empty(request('id')))
            redirect('/admin');

        (new Articles())->delete(request('id'));
        redirect('/admin');
    }

    public function edit()
    {
        if (empty(request('id')))
            redirect('/admin');

        return (new Articles())->find('id', request('id'));
    }

    public function update($articleId)
    {
        $rules = [
            'title' => 'required',
            'body' => 'required'
        ];

        if (! $this->validation(request()->all(), $rules)) {
            redirect('edit.php?id='. request('article_id'));
            return;
        }

        (new Articles())->update($articleId, [
            'title' => request('title'),
            'body' => request('body')
        ]);

        redirect('/admin');
    }
}