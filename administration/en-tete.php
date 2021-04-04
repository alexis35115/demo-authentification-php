<?php 
session_start();
?>
<header>
    <h1>Exemple d'un système d'authentification</h1>
    <nav>
        <div style="float: right;">
            <?php 

            // Si l'utilisateur est authentifié
            if (!empty($_SESSION['utilisateur'])) {
                
                // Proposer à l'utilisateur de se déconnecter
            ?>
                <a href="deconnexion.php">Se deconnecter</a>
            <?php   
            } else {
                // Dans le cas où l'utilisateur n'est pas connecté
            ?>
                <a href="authentification.php">S'authentifier</a>
                <a href="../creer-compte.php">Créer un compte</a>
            <?php
            }
            ?>
        </div>
    </nav>
</header>