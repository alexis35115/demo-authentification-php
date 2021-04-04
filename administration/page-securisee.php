<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/style.css">
    <title>Page sécurisée</title>
</head>
<body>
    <?php 
    session_start();

    include "en-tete.php";

    ?>

    <div class="centrer centrer-texte">

    <?php
    // Si l'utilisateur authentifé
    if (!empty($_SESSION['utilisateur'])) {

        echo("<pre>");
        print_r($_SESSION['utilisateur']);
        echo("</pre>");
        echo("</br>");
        echo("Si vous voyez cette page, c'est que vous êtes authentifiés. (⌐■_■)");
    } else {
        echo("Erreur, vous n'êtes pas authentifés.");
    }
    ?>

    </div>

    <?php
    include "../pied-page.php";
    ?> 
</body>
</html>