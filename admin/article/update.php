<?php
    include __DIR__ . '/../../bootstrap/autoload.php';
    (new \App\Controller\Admin\ArticleController())->update(request()->input('id', false));