<h1>Connexion</h1>
    <form action="" method="POST">
        <label for="email">Email :</label>
        <input type="email" id="email" name="email" required>

        <label for="password">Mot de passe :</label>
        <input type="password" id="password" name="password" required>

        <button type="submit">Se connecter</button>

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
</div>