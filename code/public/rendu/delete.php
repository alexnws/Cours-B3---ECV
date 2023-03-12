<?php

require_once 'fonction.ini.php';
$connexion = connexion();

if(isset($_GET['id']) && !empty($_GET['id'])){
    $id = strip_tags($_GET['id']);
    $sql = "DELETE FROM `Films` WHERE `id`=:id;";

    $query = $connexion->prepare($sql);

    $query->bindValue(':id', $id, PDO::PARAM_INT);
    $query->execute();

    header('Location: read.php');
}

require_once('close.php');
//todo: Recuperer l'id de l'url 
//todo: Faire la requete SQL correspondante
//todo: Bonus: mettre une confirmation de suppression avant d'exécuter la requete
//TODO: Bonus : Gérer les erreurs / Le typages des champs / Messages de succès / Message d'Echec / Redirection