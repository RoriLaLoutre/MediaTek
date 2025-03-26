<?php
require_once('./models/articlesManager.php');

$books = getAllBooks();
$illustrations = getAllIllustrations();

$template = './views/pages/home.php';



