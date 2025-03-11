<div id = "home">
    <h1>Home</h1>
    <div id = 'articles'>
        <?php foreach($lastArticles as $article) {?>
            <h2><?= $article['title'] ?></h2>
            <p><?= $article['description'] ?></p>
            <p><?= $article['content'] ?></p>
            <a href="index.php?page=info&id=<?= $article["id"] ?>">lirus articulus </a>

        <?php } ?>

    </div>
</div>