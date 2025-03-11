<div>
<form action="" method="POST">
    <label for="title">Titre de l'article</label>
    <input type="text" name = "title" id="title">

    <label for="description">Description du sujet</label>
    <input type="text" name = "description" id="description">

    <label for="content">contenu</label>
    <input type="text" name = "content" id="content">

    <input type="submit" text="Soumettre">

</form>
<?php if(isset($message) && isset($result)){ ?>
    <span class="<?= $message['class'] ?>"> <?= $message["message"]?></span>

<?php
}
?>


</div>