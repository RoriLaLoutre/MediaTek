<?php
require_once("./models/articlesManager.php");
require_once("./services/response.php");
require_once("./services/regex.php");

$template = './views/pages/signin.php';
session_start();


$errors = [];
$successes = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (isset($_POST['nom']) && trim($_POST['nom']) !== '') { 
        // OK
        $nom = filter_input(INPUT_POST, 'nom' , FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $nomlen = strlen($nom);
        if ($nomlen > 50) { 

            $errors[] = "Le champ 'Nom' doit contenir maximum 50 caractères.";
        }
    } else {
        $errors[] = "Le champ 'Nom' est obligatoire. Merci de saisir une valeur.";
    }

    if (isset($_POST['prenom']) && trim($_POST['prenom']) !== '') { 
        // OK
        $prenom = filter_input(INPUT_POST, 'prenom' , FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $prenomlen = strlen($prenom);
        if ($prenomlen > 50) { 

            $errors[] = "Le champ 'Prenom' doit contenir maximum 50 caractères.";
        }
    } else {
        $errors[] = "Le champ 'Prenom' est obligatoire. Merci de saisir une valeur.";
    }

    if (!isset($_POST['birthdate'])) {
        $errors[] = "Le champs 'Date de naissance' est obligatoire. Merci de saisir une valeur.";
    }
    else {
        $birthdate = filter_input(INPUT_POST, 'birthdate' , FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }

    if (isset($_POST['email']) && trim($_POST['email']) !== '') { 

        $email = filter_input(INPUT_POST, 'email' , FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        if (!preg_match($validPatterns['mail'], $email)) {
            $errors[] = "Le format mail n'est pas le bon";
        }
    } else {
        $errors[] = "Le champ 'Email' est obligatoire. Merci de saisir une valeur.";
    }

    if (isset($_POST['password']) && trim($_POST['password']) !== '') { 
        $password = $_POST['password'];
        $passwordlen = strlen($password);
        if ($passwordlen < 10) {
            $errors[] = "Le mot de passe doit contenir au moins 10 caractères."; 
        }
        if (!preg_match($validPatterns['mail'], $password)) {
            $errors[] = "Le format du mot de passe doit etre du un format email ex : johnsmith@mail.com";
        }
    } else {
        $errors[] = "Le champ 'mot de passe' est obligatoire. Merci de saisir une valeur.";
    }

    if (isset($_POST['password_confirm']) && trim($_POST['password_confirm']) !== '') { 
        if ($_POST['password_confirm'] !== $_POST['password']) {
            $errors[] = "Les mots de passe ne correspondent pas.";
        }
    } else {
        $errors[] = "Le champ 'répétez le mot de passe' est obligatoire. Merci de saisir une valeur.";
    }
    if (getUserByMail($email)) {
        $errors[] = "Cette adresse e-mail est déjà utilisée.";
    }

    if (empty($errors)) {
        $_SESSION['email'] = $email;
        $_SESSION['password'] = $password;
        $_SESSION['nom'] = $nom;
        $_SESSION['prenom'] = $prenom;
        $_SESSION['birthdate'] = $birthdate;
        redirect('Mailsign');
    }
}