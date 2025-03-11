<?php
require_once('./models/articlesManager.php');

$lastArticles = getLastArticles(3);

$template = './views/pages/home.php';



