<?php
require_once("./models/articlesManager.php");
require_once("./services/response.php");

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = intval($_GET['id']); // Sécurisation de l'entrée
    if (deleteBook($id)) {
        redirect('home'); // Redirection propre après suppression
    } else {
        echo "Erreur lors de la suppression du livre.";
    }
} else {
    echo "ID invalide.";
}
?>