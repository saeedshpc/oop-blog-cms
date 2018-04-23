<?php
    require("./templates/header.php");
    $articles = (new \App\Controller\HomeController())->index();
?>


<div id="content">
    <div class="wrapper">

        <?php foreach ($articles as $article) : ?>
            <!-- Article -->
            <div class="article">
                <div class="image"><a href="/article.php?id=<?= $article->id ?>"><img src="https://dummyimage.com/120x120/f3f3f3/999999.jpg&text=Thumbnail" alt="dummy"></a></div>
                <div class="section">
                    <a href="/article.php?id=<?= $article->id ?>" class="article-title"><?= $article->title ?></a>
                    <div class="article-info">
                        <?php $user = (new \App\Model\Users())->find('id', $article->user_id) ?>
                        <span class="article-info-title">Written by: </span><span><?= $user->name ?></span>
                        <span class="article-info-title">Posted in: </span><span><?= \Carbon\Carbon::parse($article->created_at) ?></span>
                    </div>
                    <div class="article-short-content">
                        <p><?= substr($article->body , 0 , 200) ?></p>
                    </div>
                    <a href="/article.php?id=<?= $article->id ?>" class="btn">Read More</a>
                </div>
            </div>
        <?php endforeach; ?>


    </div>
    <?php require("./templates/sidebar.php"); ?>
</div>
<?php require("./templates/footer.php"); ?>