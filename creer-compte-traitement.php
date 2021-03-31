<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="styles/style.css">
    <title>Page de la confirmation pour la création du compte</title>
</head>
<body>
	<?php
	include "en-tete.php";
    include "connexion.php";

    try {
        // Valider les données
        // valider le sanitize (avec tableau)

        

        $sth = $dbh->prepare("INSERT INTO `utilisateur`(`prenom`, `nom`, `courriel`, `mot_passe`) VALUES (:prenom,:nom,:courriel,:mot_passe);");

        $sth->bindParam(':titre', $_POST['titre'], PDO::PARAM_STR);
        $sth->bindParam(':resume', $_POST['resume'], PDO::PARAM_STR);
        $sth->bindParam(':description', $_POST['description'], PDO::PARAM_STR);
        $sth->bindParam(':realisateur', $_POST['realisateur'], PDO::PARAM_STR);
        ?>

        <div class="centrer centrer-texte">
        <?php
        if ($sth->execute()) {
            echo("Succès lors de la création du compte.");
        } else {
            echo("Erreur lors de la création du compte.");
        }
        ?>
        </div>
        <?php
    } catch (\Throwable $e) {
        echo("Erreur lors de la création du compte.");
        echo($e->getMessage());
    }

	include "pied-page.php";
	?>
</body>
</html>