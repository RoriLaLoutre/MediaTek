<?php
require_once("./models/articlesManager.php");
require_once("./services/response.php");
require_once("./services/regex.php");


$template = './views/pages/login.php';
session_start();


$errors = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (isset($_POST['email']) && trim($_POST['email']) !== '') { 
        $inputemail = $_POST['email'];
        if (!preg_match($validPatterns['mail'], $inputemail)) {
            $errors[] = "Le format mail n'est pas le bon";
        }
    } else {
        $errors[] = "Le champ 'Email' est obligatoire. Merci de saisir une valeur.";
    }

    if (isset($_POST['password']) && trim($_POST['password']) !== '') { 
        $inputpassword = $_POST['password'];
        echo $inputpassword;
        $userLogs = getUserByLogs($inputemail);

    } else {
        $errors[] = "Le champ 'mot de passe' est obligatoire. Merci de saisir une valeur.";
    }
    if (!$userLogs || !password_verify($inputpassword, $userLogs['password'])) {
        $errors[] = "Il semble que vos informations ne soient pas correctes";
    }

    if (empty($errors)) {
        $_SESSION['to_verify_mail'] = $inputemail;
        $_SESSION['to_verify_last_name'] = $userLogs["last_name"];
        $_SESSION['to_verify_first_name'] = $userLogs["first_name"];;
        redirect('Maillog');
    }
}