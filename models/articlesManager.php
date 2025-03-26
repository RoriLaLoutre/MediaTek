<?php
require_once('./models/connection.php');


function getBookById($id) {
    $sql = "SELECT * FROM book where id = :id";
    $query = dbConnect()->prepare($sql);
    $query->execute([
        ':id' => $id
    ]);
    $books = $query->fetch();
    if (!$books) {
        return [];
    }
return $books;
}

function getAllBooks() {
    $sql = "SELECT * FROM book";
    $query = dbConnect()->prepare($sql);
    $query->execute();
    $books = $query->fetchAll();
    if (!$books) {
        return [];
    }
return $books;
}
function addBook(){
    if ((!empty($_POST['isbn']))
    && (!empty($_POST['title']))
    && (!empty($_POST['publication_year']))){

    
        $dt = time();
        $datetime = date( "Y-m-d H:i:s", $dt );
        $date = date("Y-m-d", $dt);

        $sql = "INSERT INTO book (isbn, title, summary, publication_year, issue_date, created_at, updated_at) 
        VALUES (:isbn, :title, :summary, :publication_year, :issue_date, :created_at, :updated_at)";

        $query = dbConnect()->prepare($sql);
        $query->execute([
            ':isbn' => $_POST['isbn'],
            ':title' => $_POST['title'],
            ':summary' => $_POST['summary'],
            ':publication_year' => $_POST['publication_year'],
            ':issue_date' => $date,
            ':created_at' => $datetime,
            ':updated_at' => $datetime
        ]);
    }
};

function updateBook($id){
    if ((!empty($_POST['isbn']))
    && (!empty($_POST['title']))
    && (!empty($_POST['publication_year']))){

        $dt = time();
        $datetime = date( "Y-m-d H:i:s", $dt );

        $sql = "UPDATE book SET isbn = :isbn, title = :title, summary = :summary, publication_year = :publication_year, updated_at = :updated_at WHERE id = :id";

        $query = dbConnect()->prepare($sql);
        $query->execute([
            ':isbn' => $_POST['isbn'],
            ':title' => $_POST['title'],
            ':summary' => $_POST['summary'],
            ':publication_year' => $_POST['publication_year'],
            ':updated_at' => $datetime,
            ':id' => $id
        ]);
    }
};

function addIllustration($isCover , $filename) {
    $db = dbConnect();
    $sql = "INSERT INTO illustration (book_id, description, filename, isCover) 
            VALUES (:book_id, :description, :filename, :isCover)";
    
    $query = $db->prepare($sql);
    return $query->execute([
        ':book_id' => $_GET['id'],
        ':description' => $_POST['description'],
        ':filename' => $filename,
        ':isCover' => $isCover
    ]);
}

function getAllIllustrations() {
    $sql = "SELECT * FROM illustration";
    $query = dbConnect()->prepare($sql);
    $query->execute();
    $illustrations = $query->fetchAll();
    if (!$illustrations) {
        return [];
    }
    return $illustrations;
}

function deleteBook($id) {
    $db = dbConnect();
    
    // Supprimer d'abord les illustrations associées
    $sqlIllustration = "DELETE FROM illustration WHERE book_id = :id";
    $queryIllustration = $db->prepare($sqlIllustration);
    $queryIllustration->execute([':id' => $id]);

    // Ensuite, supprimer le livre
    $sqlBook = "DELETE FROM book WHERE id = :id";
    $queryBook = $db->prepare($sqlBook);
    return $queryBook->execute([':id' => $id]);
}

function addUser($nom , $prenom , $birthdate, $email, $password){
    $dt = time();
    $datetime = date( "Y-m-d H:i:s", $dt );

    $sql = "INSERT INTO user (last_name, first_name, birth_date, email, password, created_at, updated_at) 
    VALUES (:last_name, :first_name,:birth_date, :email, :password, :created_at, :updated_at)";

    $query = dbConnect()->prepare($sql);
    $query->execute([
        ':last_name' => $nom,
        ':first_name' => $prenom,
        ':birth_date' => $birthdate,
        ':email' => $email,
        ':password' => $password,
        ':created_at' => $datetime,
        ':updated_at' => $datetime
    ]);
}

function getUserByLogs($mail){
    $sql = "SELECT email , password , first_name , last_name FROM user where email = :email";
    $query = dbConnect()->prepare($sql);
    $query->execute([
        ':email' => $mail,
    ]);
    $user = $query->fetch(PDO::FETCH_ASSOC);

    return $user ?: []; 
}
