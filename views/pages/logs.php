<?php
session_start();
if (isset($_SESSION['is_logged']) && $_SESSION['is_logged']) {
?>
    <h1>Vos informations :</h1>
    <box class="box">
        <ul>
            <li><?=$_SESSION["active_email"]?></li>
            <li><?=$_SESSION["active_name"]?></li>
            <li><?=$_SESSION["active_last_name"]?></li>
            <li><a href="index.php?page=Deconnexion">Se deconnecter</a></li>
        </ul>
    </box>

<?php
} else {
?>
    <div id="logs">
        <ul>
            <li><a href="index.php?page=Login">Se connecter</a></li>
            <li><a href="index.php?page=SignIn">S'inscrire</a></li>
        </ul>
    </div>
<?php
}
?>