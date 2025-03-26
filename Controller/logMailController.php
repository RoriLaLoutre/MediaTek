<?php
require_once("./models/articlesManager.php");
require_once("./services/response.php");
require_once("./services/utils.php");
session_start();

$template = './views/pages/mailsign.php';

if (!isset($_SESSION['to_verify_mail'])) {
    $errors[] = "Aucune adresse e-mail trouvée en session.";
} else {
    $to = $_SESSION['to_verify_mail'];
    $subject = "Verification Code for login in";

    // Générer et stocker le code en session
    if (!isset($_SESSION['verification_code_log'])) {
        $_SESSION['verification_code_log'] = rand(100000, 999999);
    }

    // Envoyer le faux mail
    fakeMailSend($to, $subject, $_SESSION['verification_code_log']);
}


// Vérification du code soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['code'])) {
    $userCode = trim($_POST['code']); 
    $userCode = intval($userCode); 

    if ($userCode === $_SESSION['verification_code_log']) {
        $successes[] = "Création effectuée";        
        // Supprimer le code de session après validation pour éviter la réutilisation
        unset($_SESSION['verification_code_log']);
        $_SESSION["is_logged"] = true;
        $_SESSION["active_name"] = $_SESSION['to_verify_first_name'];
        $_SESSION["active_last_name"] = $_SESSION['to_verify_last_name'];
        $_SESSION["active_email"] = $_SESSION['to_verify_mail'];
        redirect('home');
    } else {
        $errors[] = "Code incorrect";
    }
}
