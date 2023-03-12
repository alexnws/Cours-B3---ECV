<?php 
session_start();
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

        $query = $connexion->prepare($sql);

        $query->bindValue(':nom', $nom, PDO::PARAM_STR);
        $query->bindValue(':annee', $realisateur, PDO::PARAM_INT);
        $query->bindValue(':realisateur', $realisateur, PDO::PARAM_STR);
        $query->bindValue(':id', $id, PDO::PARAM_INT);
        $query->bindValue(':acteurs', $acteurs, PDO::PARAM_STR);
        $query->bindValue(':genre', $genre, PDO::PARAM_STR);
        $query->bindValue(':id', $id, PDO::PARAM_INT);

        $query->execute();

        header('Location: read.php');
    }
}

if(isset($_GET['id']) && !empty($_GET['id'])){
    $id = strip_tags($_GET['id']);
    $sql = "SELECT * FROM `Films` WHERE `id`=:id;";

    $query = $connexion->prepare($sql);

    $query->bindValue(':id', $id, PDO::PARAM_INT);
    $query->execute();

    $result = $query->fetch();
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des films</title>

    <link rel="stylesheet" href="" integrity="" >
</head>
<body>
    <h1>Modifier un film</h1>
    <form method="post">
        <p>
            <label for="nom">Nom</label>
            <input type="text" name="nom" id="nom" value="<?= $result['nom'] ?>">
        </p>
        <p>
            <label for="annee">Année</label>
            <input type="number" name="annee" id="annee" value="<?= $result['annee'] ?>">
        </p>
        <p>
            <label for="realisateur">Réalisateur</label>
            <input type="text" name="realisateur" id="realisateur" value="<?= $result['realisateur'] ?>">
        </p>
        <p>
            <label for="acteurs">Acteurs</label>
            <input type="text" name="acteurs" id="acteurs" value="<?= $result['acteurs'] ?>">
        </p>
        <p>
            <label for="genre">Genre</label>
            <input type="text" name="genre" id="genre" value="<?= $result['genre'] ?>">
        </p>
        <p>
            <button>Enregistrer</button>
        </p>
        <p><a class="btn-retour" href="read.php">Retour</a></p>
        <input type="hidden" name="id" value="<?= $result['id'] ?>">
    </form>
</body>
</html>

//Todo : Récupérer l'id depuis l'url
//TODO : Remplir le forumaire HTML avec les valeur récupérées depuis la requete correspondante
//TODO: Penser a mettre un input hidden pour l'ID
//TODO: mettre a jour le contenu avec une requete correspondante. 
//TODO: Bonus : Gérer les erreurs / Le typages des champs / Messages de succès / Message d'Echec / Redirection
