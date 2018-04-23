<?php
    require('./templates/header.php');
    $article = (new \App\Controller\HomeController())->singleArticle();
?>

<div id="content">
    <div class="wrapper">
        <div class="single-page">
            <h2 class="single-page-title"><?= $article->title ?></h2>
            <div class="section">
                <div class="article-info">
                    <?php $user = (new \App\Model\Users())->find('id', $article->user_id) ?>
                    <span class="article-info-title">Written by: </span><span><?= $user->name ?></span>
                    <span class="article-info-title">Posted in: </span><span><?= \Carbon\Carbon::parse($article->created_at)?></span>
                </div>
                <div class="single-page-image">
                    <img src="https://dummyimage.com/800x250/f3f3f3/999999.jpg&text=Thumbnail" alt="blog id">
                </div>
                <div class="single-page-content">
                    <?= $article->body ?>
                </div>
            </div>
        </div>
    </div>
    <?php require('./templates/sidebar.php'); ?>
</div>
<?php require('./templates/footer.php');?>