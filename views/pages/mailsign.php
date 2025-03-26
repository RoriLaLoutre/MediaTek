<h1>Rentrez le code de vérification envoyer par mail pour finaliser la création de votre compte</h1>
<form action="" method="post">
    <label for="code">code</label>
    <input type="number" id="code" name="code" required>
    <button type="submit">Valider</button>

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
</form>