
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $seo['title'] ?></title>
    <link rel="stylesheet" href="style/404.css">
    <link rel="stylesheet" href="public/css/app.css">
    <meta name="description" content=<?= $seo["description"] ?>>
</head>
<body>
    <?php require('views/partials/_header.html') ?>
    <main>
        <?php require($template) ?>
    </main>
    <?php require('views/partials/_footer.html') ?>
</body>
</html>