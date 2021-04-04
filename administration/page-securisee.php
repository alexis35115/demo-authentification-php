<!DOCTYPE html>
<html lang="fr">
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
    // Dans le cas où l'utilisateur est authentifié.
    if (!empty($_SESSION['utilisateur'])) {

        echo("<pre>");
        print_r(htmlspecialchars($_SESSION['utilisateur'], ENT_QUOTES, 'UTF-8'));
        echo("</pre>");
        echo("</br>");
        echo("Si vous voyez cette page, c'est que vous êtes authentifiés. (⌐■_■)");
    } else {
        echo("Accès refusé, vous n'êtes pas authentifés.");
    }
    ?>

    </div>

    <?php
    include "../pied-page.php";
    ?> 
</body>
</html>