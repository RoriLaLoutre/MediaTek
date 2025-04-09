<div>
<form action="" method="POST">
    <label for="title">Titre du livre</label>
    <input type="text" name = "title" id="title" required>

    <label for="isbn">isbn du livre (13 chiffre)</label>
    <input type="number" name = "isbn" id="isbn" required>

    <label for="summary">Résumé du livre</label>
    <input type="text" name = "summary" id="summary" >

    <label for="publication_year">Année de publication</label>
    <input type="number" name = "publication_year" id="publication_year" required>

    <?php if (!empty($errors)): ?>
        <message class="error-messages">
            <ul>
                <?php foreach ($errors as $error): ?>
                    <li style="color: red;"><?php echo htmlspecialchars($error); ?></li>
                <?php endforeach; ?>
            </ul>
        </message>
    <?php endif; ?>
    <?php if (!empty($successes)): ?>
        <message class="error-messages">
            <ul>
                <?php foreach ($successes as $success): ?>
                    <li style="color: green;"><?php echo htmlspecialchars($success); ?></li>
                <?php endforeach; ?>
            </ul>
        </message>
    <?php endif; ?>

    <input type="submit" text="Soumettre">

</form>
</div>