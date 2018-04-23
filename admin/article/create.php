<?php
    require('./../../templates/header.php');
    (new \App\Controller\Admin\ArticleController())->create();
?>

<div id="content">
    <div class="full-wrapper">
        <h2>Create Article</h2>
        <?php
            if ($flash->hasMessages($flash::ERROR)) {
                $flash->display();
            }
        ?>
        <form action="/admin/article/create.php" method="POST">
            <div class="form-item">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" placeholder="Title..." value="<?= old('title')?>">
            </div>

            <div class="form-item">
                <label for="body">Body</label>
                <textarea name="body" id="body" rows="10" placeholder="Body..."><?= old('body')?></textarea>
            </div>
            <div class="form-item">
                <button type="submit">Create</button>
            </div>
        </form>
    </div>
</div>
