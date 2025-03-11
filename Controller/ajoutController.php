<?php
require_once("./models/articlesManager.php");
require_once("./services/response.php");
$template = './views/pages/ajouter.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $result = addArticle();
    getLastArticles(3);
    if ($result){
        $message =[
                "message" => "ca marche",
                "class" => "success_error"
            ];

    }
    else{
        $message =[
            "message" => "ca marche pas",
            "class" => "alert_error",
        ];
    }
}