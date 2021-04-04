<?php
// Si un veut intéragir avec la session, on doit appeler cette fonction
session_start();

// Détruire la session courante
session_destroy();

// Rediriger vers la page index à la racine du site
header('location: ../index.php');

exit;
?>