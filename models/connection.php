<?php

require_once('./config/database.php');
function dbConnect(){
    try {
      $db = new PDO(DB_CONFIG['db'] . ':host='. DB_CONFIG['host'] . ';port=' . DB_CONFIG['port'] . ' ;dbname=' . DB_CONFIG['dbname']  . ';charset=utf8',   DB_CONFIG['username'], DB_CONFIG['password']);
    } catch (PDOException $e) {
      die('Erreur : ' . $e->getMessage());
    }

    $db -> setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    $db -> exec('SET NAMES utf8');
    return $db;
    
 }