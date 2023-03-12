<?php
require_once 'fonction.ini.php';
$connexion = connexion();

$sql = "INSERT INTO `Films` (`nom`, `annee`, `realisateur`,`acteurs`,`genre` ) VALUES (:nom, :annee, :realisateur, :acteurs, :genre);";

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

            $sql = "INSERT INTO `Films` (`nom`, `annee`, `realisateur`,`acteurs`, `genre`) VALUES (:nom, :annee, :realisateur, :acteurs, :genre);";

            $query = $connexion->prepare($sql);

            $query->bindValue(':nom', $nom, PDO::PARAM_STR);
            $query->bindValue(':annee', $annee, PDO::PARAM_INT);
            $query->bindValue(':realisateur', $realisateur, PDO::PARAM_INT);
            $query->bindValue(':acteurs', $acteurs, PDO::PARAM_STR);
            $query->bindValue(':genre', $genre, PDO::PARAM_STR);


            $query->execute();
            $_SESSION['message'] = "Produit ajouté avec succès !";
            header('Location: read.php');
        }
}
           

?>

<form method="post">
    <label for="nom">Nom</label>
    <input type="text" name="nom" id="nom">
    <label for="annee">Année</label>
    <input type="number" name="annee" id="annee">
    <label for="realisateur">Réalisateur</label>
    <input type="text" name="realisateur" id="realisateur">
    <label for="acteurs">Acteurs</label>
    <input type="text" name="acteurs" id="acteurs">
    <label for="genre">Genre</label>
    <input type="text" name="genre" id="genre">
    <button>Enregistrer</button>
</form>






//TODO: Créer le formulaire HTML
//TODO: Si formulaire soumi, alors faire la requete d'insertion
//TODO: Bonus : Gérer les erreurs / Le typages des champs / Messages de succès / Message d'Echec / Redirection
