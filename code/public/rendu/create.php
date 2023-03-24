<?php
require_once 'fonction.ini.php';
$connexion = connexion();


//Acceder a la tableau souhaiter avec un INSERT//
$sql = "INSERT INTO `Films` (`nom`, `annee`, `realisateur`,`acteurs`,`genre` ) VALUES (:nom, :annee, :realisateur, :acteurs, :genre);";
// On prépare la requête//
$query = $connexion->prepare($sql);
if(isset($_POST)){
    if(isset($_POST['nom']) && !empty($_POST['nom'])
        && isset($_POST['annee']) && !empty($_POST['annee'])
        && isset($_POST['realisateur']) && !empty($_POST['realisateur'])
        && isset($_POST['acteurs']) && !empty($_POST['acteurs'])
        && isset($_POST['genre']) && !empty($_POST['genre'])){
            $nom = strip_tags($_POST['nom']);
            $annee = strip_tags($_POST['annee']);
            $realisateur = strip_tags($_POST['realisateur']);
            $acteurs = strip_tags($_POST['acteurs']);
            $genre = strip_tags($_POST['genre']);
            $query->bindValue(':nom', $nom, PDO::PARAM_STR);
            $query->bindValue(':annee', $annee, PDO::PARAM_INT);
            $query->bindValue(':realisateur', $realisateur, PDO::PARAM_STR);
            $query->bindValue(':acteurs', $acteurs, PDO::PARAM_STR);
            $query->bindValue(':genre', $genre, PDO::PARAM_STR);

            $query->execute();
            header('Location: read.php');
        }
}
           

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/create.css">
    <title>Ajouter un film</title>
</head>
<body>
   <h1>Ajouter un film</h1>

<form method="post" class="create">
    <label for="nom">Nom:</label>
    <input type="text" name="nom" id="nom">
    <label for="annee">Année:</label>
    <input type="number" name="annee" id="annee">
    <label for="realisateur">Réalisateur:</label>
    <input type="text" name="realisateur" id="realisateur">
    <label for="acteurs">Acteurs:</label>
    <input type="text" name="acteurs" id="acteurs">
    <label for="genre">Genre:</label>
    <input type="text" name="genre" id="genre">
    <button>Enregistrer</button>
</form>
</body>
</html>








