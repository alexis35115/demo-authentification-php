<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/style.css">
    <title>S'authentifier</title>
</head>
<body>
    <?php 
    session_start();

    // Si l'utilisateur est authentifié, le sortir d'ici
    if (!empty($_SESSION['utilisateur'])) {
        header('Location: page-securisee.php');
    }

    include "en-tete.php";
    ?>

    <h2>Authentification</h2>
    <form action="authentification-traitement.php" method="post">
        <div>
            <label for="courriel">Courriel :</label>
            <input type="text" name="courriel" id="courriel"/>
        </div>
        <div>
            <label for="mot_passe">Mot de passe :</label>
            <input type="password" name="mot_passe" id="mot_passe"/>
        </div>			
        <input type="submit" value="Connexion">
    </form>

    <?php
    include "pied-page.php";
    ?>
</body>
</html>