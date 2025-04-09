<?php
require_once("./models/articlesManager.php");
require_once("./services/response.php");
require_once("./services/regex.php");
$template = './views/pages/book_update.php';


$errors = [];
$successes = [];
$current_data = getBookById($_GET['id']);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['title']) && trim($_POST['title']) !== '') { 
        $title = filter_input(INPUT_POST, 'title' , FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $titleLen = strlen($title);
        if ($titleLen < 2 || $titleLen > 150) { 

            $errors[] = "Le champ 'Titre' doit contenir entre 2 et 150 caractères.";
        }
    } else {
        $errors[] = "Le champ 'Titre' est obligatoire. Merci de saisir une valeur.";
    }

    if (isset($_POST['isbn']) && trim($_POST['isbn']) !== '') { 
        $isbn = filter_input(INPUT_POST, 'isbn' , FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        if (!preg_match($validPatterns['isbn'], $isbn)) { 
            $errors[] = "Le champ 'ISBN' doit contenir exactement 13 chiffres.";
        }
    } else {
        $errors[] = "Le champ 'ISBN' est obligatoire. Merci de saisir une valeur.";
    }

    if (isset($_POST['summary'])  && strlen($_POST["summary"]) > 65535) {
        $errors[] = "Le champ 'Résumé' doit contenir au plus 65535 caractères.";
    }

    if (isset($_POST['publication_year']) && trim($_POST['publication_year']) !== '') { 
        $publicationYear = filter_input(INPUT_POST, 'publication_year' , FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        if (!preg_match($validPatterns['year'], $publicationYear)) {
            $errors[] = "Le champ 'Année de publication' doit être au format YYYY (ex. : 1997).";
        }
    } else {
        $errors[] = "Le champ 'Année de publication' est obligatoire. Merci de saisir une valeur.";
    }
    if (empty($errors)) {
        updateBook($_GET['id']);
        $successes[] = "Le livre a bien été modifié";
    }
}