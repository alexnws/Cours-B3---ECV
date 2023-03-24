<?php 
 require_once 'fonction.ini.php';

 $connexion = connexion();

if(isset($_GET['id']) && !empty($_GET['id'])){
   
    $sql = 'SELECT * FROM `Films` WHERE `id` = :id;';

    $id = strip_tags($_GET['id']);
    // On prépare la requête//
    $query = $connexion->prepare($sql);
    $query->bindValue(':id', $id, PDO::PARAM_INT);
    // On exécute la requête//
    $query->execute();
    $films = $query->fetch();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/voir.css">
    <title>Détails du film</title>
</head>
<body>
<main>
    <h1>Information sur le film <?= $films['nom'] ?></h1>
    <table>
        <thead>
            <th>id</th>
            <th>Nom</th>
            <th>Année</th>
            <th>Réalisateur</th>
            <th>Acteurs</th>
            <th>Genre</th>
        </thead>
        <tbody>
        <tr>
            <td><?= $films['id'] ?></td>
            <td><?= $films['nom'] ?></td>
            <td><?= $films['annee'] ?></td>
            <td><?= $films['realisateur'] ?></td>
            <td><?= $films['acteurs'] ?></td>
            <td><?= $films['genre'] ?></td>
           
    </table>
    <a class="btn-retour" href="read.php">Retour</a>
    </main>
</body>
</html>