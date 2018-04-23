<?php
    require('./../../templates/header.php');
    $article = (new \App\Controller\Admin\ArticleController())->edit();
?>

<div id="content">
    <div class="full-wrapper">
        <h2>Edit Article</h2>
        <?php
        if ($flash->hasMessages($flash::ERROR)) {
            $flash->display();
        }
        ?>
        <form action="/admin/article/update.php?id=<?= $article->id ?>" method="POST">
            <input type="hidden" name='article_id' value="<?= request('id') ?>">
            <div class="form-item">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" placeholder="Title..." value="<?= $article->title ?>">
            </div>

            <div class="form-item">
                <label for="body">Body</label>
                <textarea name="body" id="body" rows="10" placeholder="Body..."><?= $article->body ?></textarea>
            </div>
            <div class="form-item">
                <button type="submit">Edit</button>
            </div>
        </form>
    </div>
</div>
