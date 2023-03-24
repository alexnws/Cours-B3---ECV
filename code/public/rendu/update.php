<?php 
require_once 'fonction.ini.php';
$connexion = connexion();

if(isset($_POST)){
    if(isset($_POST['id']) && !empty($_POST['id'])
        && isset($_POST['nom']) && !empty($_POST['nom'])
        && isset($_POST['annee']) && !empty($_POST['annee'])
        && isset($_POST['realisateur']) && !empty($_POST['realisateur'])
        && isset($_POST['acteurs']) && !empty($_POST['acteurs'])
        && isset($_POST['genre']) && !empty($_POST['genre'])){   
        $id = strip_tags($_GET['id']);
        $nom = strip_tags($_POST['nom']);
        $annee = strip_tags($_POST['annee']);
        $realisateur = strip_tags($_POST['realisateur']);
        $acteurs = strip_tags($_POST['acteurs']);
        $genre = strip_tags($_POST['genre']);


        $sql = "UPDATE `Films` SET `nom`=:nom, `annee`=:annee, `realisateur`=:realisateur, `acteurs`=:acteurs, `genre`=:genre WHERE `id`=:id;";
        // On prépare la requête//
        $query = $connexion->prepare($sql);

        $query->bindValue(':nom', $nom, PDO::PARAM_STR);
        $query->bindValue(':annee', $annee, PDO::PARAM_INT);
        $query->bindValue(':realisateur', $realisateur, PDO::PARAM_STR);
        $query->bindValue(':id', $id, PDO::PARAM_INT);
        $query->bindValue(':acteurs', $acteurs, PDO::PARAM_STR);
        $query->bindValue(':genre', $genre, PDO::PARAM_STR);
        $query->bindValue(':id', $id, PDO::PARAM_INT);
        // On exécute la requête//
        $query->execute();

        header('Location: read.php');
    }
}

if(isset($_GET['id']) && !empty($_GET['id'])){
    $id = strip_tags($_GET['id']);
    $sql = "SELECT * FROM `Films` WHERE `id`=:id;";
    // On prépare la requête//
    $query = $connexion->prepare($sql);

    $query->bindValue(':id', $id, PDO::PARAM_INT);
    //On execute la requête//
    $query->execute();

    $result = $query->fetch();
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/update.css">
    <title>Liste des films</title>
</head>
<body>
    <h1>Modifier un film</h1>
    <form method="post" class="update">
        <p>
            <label for="nom">Nom:</label>
            <input type="text" name="nom" id="nom" value="<?= $result['nom'] ?>">
        </p>
        <p>
            <label for="annee">Année:</label>
            <input type="number" name="annee" id="annee" value="<?= $result['annee'] ?>">
        </p>
        <p>
            <label for="realisateur">Réalisateur:</label>
            <input type="text" name="realisateur" id="realisateur" value="<?= $result['realisateur'] ?>">
        </p>
        <p>
            <label for="acteurs">Acteurs:</label>
            <input type="text" name="acteurs" id="acteurs" value="<?= $result['acteurs'] ?>">
        </p>
        <p>
            <label for="genre">Genre</label>
            <input type="text" name="genre" id="genre" value="<?= $result['genre'] ?>">
        </p>
        <p>
            <button>Enregistrer</button>
        </p>
        <input type="hidden" name="id" value="<?= $result['id'] ?>">
    </form>
</body>
</html>
