<?php
require_once 'fonction.ini.php';
$connexion = connexion();


// On écrit notre requête
$sql = 'SELECT * FROM `Films`';

// On prépare la requête
$query = $connexion->prepare($sql);

// On exécute la requête
$query->execute();

// On stocke le résultat dans un tableau associatif
$result = $query->fetchAll(PDO::FETCH_ASSOC);


?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des films</title>
</head>
<body>

    <h1>Liste des films</h1>
    <table>
        <thead>
            <th>Id</th>
            <th>Nom</th>
            <th>Année</th>
            <th>Réalisateur</th>
            <th>Acteurs</th>
            <th>Genre</th>
        </thead>
        <tbody>
        <?php
            foreach($result as $film){
        ?>
                <tr>
                    <td><?= $film['id'] ?></td>
                    <td><?= $film['nom'] ?></td>
                    <td><?= $film['annee'] ?></td>
                    <td><?= $film['realisateur'] ?></td>
                    <td><?= $film['acteurs'] ?></td>
                    <td><?= $film['genre'] ?></td>
                    <td><a href="details.php?id=<?= $film['id'] ?>">Voir</a>  <a href="update.php?id=<?= $film['id'] ?>">Modifier</a>  <a href="delete.php?id=<?= $film['id'] ?>">Supprimer</a></td>
                </tr>
        <?php
            }
        ?>
        </tbody>
    </table>
    <a href="create.php">Ajouter</a>
</body>
</html>

//TODO : Faire la requete Select pour avoir les bonnes données
//TODO : Faire le HTML avec  la boucle d'affichage des données

