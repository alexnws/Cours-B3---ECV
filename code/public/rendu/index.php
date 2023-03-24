<?php
require_once 'fonction.ini.php';
$connexion = connexion();
//Acceder à la tableau users pour pouvoir se connecter//
if(isset($_POST['username']) && !empty($_POST['username'])) {
    $result = $connexion->query('select * from users where username="'.$_POST['username'].'" and password="'.sha1($_POST['password']).'"');

    if($result->rowCount() >=1 ) {
        // le message de succès / Redirection//
        header("location: read.php");
    } else {
        $error = "Erreur, verifier votre Username et Password";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/index.css">
    <title>Connexion</title>
</head>
<body class="connexion">
    <h1>Connexion</h1>
    <form method="POST" >
        <div>
            <input type="hidden" name="ninja" value="je suis un ninja"/>
        </div>
        <div>
            <label for="username">Username</label>
            <input type="text" name="username" />
        </div>
        <div>
            <label for="password">Password</label>
            <input type="password" name="password" />
        </div>
        <button typ="submit">Connexion</button>
    </form>
    <?php if(isset($error) && !empty($error)) {
        echo '<p>'.$error.'</p>';
    }
    ?>
</body>
</html>