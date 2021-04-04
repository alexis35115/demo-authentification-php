<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../styles/style.css">
    <title>Page de confirmation de l'authentification</title>
</head>
<body>
	<?php
    session_start();

    // Si l'utilisateur est authentifié, le sortir d'ici
    if (!empty($_SESSION['utilisateur'])) {
        header('Location: page-securisee.php');
    }

	include "en-tete.php";

    try {

        include "../connexion.php";

        // Valider ce que l'on veut sanitiser...
        $utilsateur = filter_var_array($_POST, array(
            'courriel' => FILTER_SANITIZE_STRING,
            'mot_passe' => FILTER_SANITIZE_STRING
        ));

        // Pour ajouter un contexte, la date de suppression doit être vide.
        $sth = $dbh->prepare("SELECT `id_utilisateur`, `courriel`, `mot_passe`, `date_creation` FROM `utilisateur` WHERE `courriel` = :courriel AND `date_suppression` IS NULL;");

        $sth->bindParam(':courriel', $utilsateur['courriel'], PDO::PARAM_STR);
        ?>

        <div class="centrer centrer-texte">
        <?php
        if ($sth->execute()) {
            echo("Succès lors de la création du compte.");
            
            $utilisateurTrouve = $sth->fetch();

            if(password_verify($utilsateur["mot_passe"], $utilisateurTrouve['mot_passe'])) {

                // Conserver les informations de l'usager dans la variable `utilisateur` dans la super variable globale $_SESSION
                $_SESSION['utilisateur'] = array(
                    'id_utilisateur' => $utilisateurTrouve['id_utilisateur'],
                    'courriel' => $utilisateurTrouve['courriel'],
                    'mot_passe' => $utilisateurTrouve['mot_passe'],
                    'date_creation' => $utilisateurTrouve['date_creation']
                );
            
                // Rediriger l'utilisateur authentifé vers la page sécurisée
                header('Location: page-securisee.php');
            }
            else {
                echo("Impossible de se connecter avec ces informations.");
            }


            // Inviter l'usager à se connecter?
        } else {
            echo("Erreur lors de l'authentification.");
        }
        ?>
        </div>
        <?php
    } catch (\Throwable $e) {
        echo("Erreur lors de l'authentification.");
        echo($e->getMessage());
    }

	include "../pied-page.php";
	?>
</body>
</html>