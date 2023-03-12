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
    <link rel="stylesheet" href="styles/read.css">
    <title>Liste des films</title>
</head>
<body>

    <h1>Liste des films</h1>
    <table class="tableau">
        <thead>
            <th>Id</th>
            <th>Nom</th>
            <th>Année</th>
            <th>Réalisateur</th>
            <th>Acteurs</th>
            <th>Genre</th>
            <th>Edition</th>
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
                    <td><a class="voir" href="voir.php?id=<?= $film['id'] ?>">Voir</a>  <a class="modifier" href="update.php?id=<?= $film['id'] ?>">Modifier</a>  <a class="supprimer"href="delete.php?id=<?= $film['id'] ?>">Supprimer</a></td>
                </tr>
        <?php
            }
        ?>
        </tbody>
    </table>
    <a href="create.php" class="ajout-film">Ajouter</a>
</body>
</html>


