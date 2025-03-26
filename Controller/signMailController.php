<?php
require_once("./models/articlesManager.php");
require_once("./services/response.php");
require_once("./services/utils.php");
session_start();  // Assurez-vous que la session démarre bien

$template = './views/pages/mailsign.php';

if (!isset($_SESSION['email'])) {
    $errors[] = "Aucune adresse e-mail trouvée en session.";
} else {
    $to = $_SESSION['email'];
    $subject = "Verification Code";

    // Générer et stocker le code en session
    if (!isset($_SESSION['verification_code'])) {  // Ne pas écraser le code existant si la page est rechargée
        $_SESSION['verification_code'] = rand(100000, 999999);
    }
    

    // Envoyer le faux mail
    fakeMailSend($to, $subject, $_SESSION['verification_code']);
}

$password = password_hash($_SESSION['password'], PASSWORD_DEFAULT);

// Vérification du code soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['code'])) {
    $userCode = trim($_POST['code']); // Supprimer les espaces
    $userCode = intval($userCode); // Convertir en entier

    if ($userCode === $_SESSION['verification_code']) {
        $successes[] = "Création effectuée";
        addUser($_SESSION["nom"], $_SESSION["prenom"], $_SESSION["birthdate"], $_SESSION["email"], $password);
        
        // Supprimer le code de session après validation pour éviter la réutilisation
        unset($_SESSION['verification_code']);
        $_SESSION["is_logged"] = true;
        $_SESSION["active_name"] = $_SESSION['prenom'];
        $_SESSION["active_last_name"] = $_SESSION['nom'];
        $_SESSION["active_email"] = $_SESSION['email'];
        redirect('home');
    } else {
        $errors[] = "Code incorrect";
    }
}
