<div id = "modifier">
    <h1>Choisissez l'articles à modifier</h1>
    <div id="articles">
    <?php foreach ($articles as $article) { ?>
        <h4>
            <a href="index.php?page=modifier-article&id=<?= $article['id'] ?>">
                <?= $article['title'] ?>
            </a>
        </h4>
    <?php } ?>
</div>
</div>