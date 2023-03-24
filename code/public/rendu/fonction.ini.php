<?php 
require 'config.ini.php';

// Cette fontion permet de se connecter//
function connexion() {  
    try {  
        $pdo = new PDO('mysql:host='.HOTE.';port='.PORT.';dbname='.BASE, USERNAME, MDP);
        $pdo->exec("SET CHARACTER SET utf8");
        return $pdo;
    }catch(PDOException $e) {
        echo 'Problème de connexion '.$e->getMessage();
        return false;
    }
}