<?php 
require_once("./models/articlesManager.php");   
require_once("./services/response.php");

if(!isset($_GET['id']) || intval($_GET['id']) === 0){
    redirect('home');
}

$article = getArticle($_GET['id']);


if(!$article){
    redirect('home');
}

$template = './views/pages/modifier-article.php';