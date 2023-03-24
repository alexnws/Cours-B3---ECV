<?php

require_once 'fonction.ini.php';
$connexion = connexion();

if(isset($_GET['id']) && !empty($_GET['id'])){
    $id = strip_tags($_GET['id']);
    $sql = "DELETE FROM `Films` WHERE `id`=:id;";
    //On prépare la requête//
    $query = $connexion->prepare($sql);

    $query->bindValue(':id', $id, PDO::PARAM_INT);
     // On exécute la requête//
    $query->execute();

    header('Location: read.php');
}

require_once('close.php');
