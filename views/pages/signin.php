<h1>Inscription</h1>
    <form action="" method="POST">
        <label for="nom">Nom :</label>
        <input type="text" id="nom" name="nom" required>

        <label for="prenom">Prénom :</label>
        <input type="text" id="prenom" name="prenom" required>

        <label for="email">Email :</label>
        <input type="email" id="email" name="email" required>

        <label for="birthdate">Date de naissance :</label>
        <input type="date" id="birthdate" name="birthdate" required>

        <label for="password">Mot de passe :</label>
        <ul>
        <li>minimum 10 caractère</li>
        <li>un @ doit etre présent</li>
        </ul>
        <input type="password" id="password" name="password" required>

        <label for="password_confirm">Répéter le mot de passe :</label>
        <input type="password" id="password_confirm" name="password_confirm" required>

        <button type="submit">S'inscrire</button>

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