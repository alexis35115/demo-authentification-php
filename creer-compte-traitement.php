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

        // Que veut-on faire si l'usager est connecté?

        // valider que l'on vient de la page précédente?

        //on voudrait normalement valider le courriel avec deux champs

        // Hashage du mot de passe saisit par l'utilisateur
        $motPasseSecurise = password_hash($_POST['mot_passe'], PASSWORD_BCRYPT);
      

        $sth = $dbh->prepare("INSERT INTO `utilisateur`(`courriel`, `mot_passe`) VALUES (:courriel,:mot_passe);");

        $sth->bindParam(':courriel', $_POST['courriel'], PDO::PARAM_STR);
        $sth->bindParam(':mot_passe', $motPasseSecurise, PDO::PARAM_STR);
        ?>

        <div class="centrer centrer-texte">
        <?php
        if ($sth->execute()) {
            echo("Succès lors de la création du compte.");

            // Inviter l'usager à se connecter?
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