<?php
    require_once('./../templates/header.php');
    $articles = (new App\Controller\Admin\AdminController())->index();
?>


<div class="row">
    <div class="col-lg-6 col-lg-offset-3">
        <h3>Article List <a href="/admin/article/create.php"><button class="btn btnx-xs btn-success">create new article</button></a></h3>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>title</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($articles as $article ) : ?>
                    <tr>
                        <th scope="row"><?= $article->id ?></th>
                        <td><?= $article->title ?></td>
                        <td>
                            <a href="/admin/article/delete.php?id=<?= $article->id ?>"><button type="button" class="btn btn-danger btn-xs">delete</button></a>
                            <a href="/admin/article/edit.php?id=<?= $article->id ?>"><button type="button" class="btn btn-primary btn-xs">edit</button></a>
                        </td>
                    </tr>
                <?php endforeach; ?>

            </tbody>
        </table>
    </div>
</div>
