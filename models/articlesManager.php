<?php
require_once('./models/connection.php');

function getLastArticles(int $limit):array{
    $sql = "SELECT id ,title, description , content , published_at FROM articles order by published_at desc LIMIT :limit";
    $query = dbConnect()->prepare($sql);
    $query->bindParam(':limit' , $limit , PDO::PARAM_INT);
    $query->execute();
    return $query->fetchAll();
}

function getArticle($id) {
        $id = intval($id);
        $sql = "SELECT title, description , content , published_at FROM articles where id = :id";
        $query = dbConnect()->prepare($sql);
        $query->bindParam(':id' , $id , PDO::PARAM_INT);
        $query->execute();
        $article = $query->fetch();
        if (!$article) {
            return [];
        }
    return $article;
}

function getALLArticleTitle() {
    $sql = "SELECT id, title FROM articles";
    $query = dbConnect()->prepare($sql);
    $query->execute();
    $articles = $query->fetchAll();
    if (!$articles) {
        return [];
    }
return $articles;
}
function addArticle(): bool{
    $result = false;
    $error_mess = "";
    if (!empty($_POST['title'])  && (!empty($_POST['description']) && (!empty($_POST['content']))) ){
        $dt = time();
        $date = date( "Y-m-d H:i:s", $dt );

        $sql = "INSERT INTO articles (title, description, content, published_at) 
        VALUES (:title , :description, :content, :published_at)";

        $query = dbConnect()->prepare($sql);
        $query->execute([
            ':title' => $_POST['title'],
            ':description' => $_POST['description'],
            ':content' => $_POST['content'],
            ':published_at' => $date,
        ]);
        $result = true;
    }
    return $result;

};