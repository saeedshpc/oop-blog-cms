<?php
    require_once('./../templates/header.php');
    $articles = (new App\Controller\Admin\AdminController())->index();
?>

<div id="content">
    <div class="full-wrapper">
        <h3>Article List <a href="/admin/article/create.php"><button class="button success-button">create new article</button></a></h3>
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($articles as $article) : ?>
                    <tr>
                        <th><?= $article->id ?></th>
                        <td><?= $article->title ?></td>
                        <td>
                            <a href="/admin/article/delete.php?id=<?= $article->id ?>"><button class="button danger-button small">delete</button></a>
                            <a href="/admin/article/edit.php?id=<?= $article->id ?>"><button class="button main-button small">edit</button></a>
                        </td>
                    </tr>
                <?php endforeach; ?>

            </tbody>
        </table>
    </div>
</div>
