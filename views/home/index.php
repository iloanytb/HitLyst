<?php
//titre
$pageTitle = "Page d'accueil";
//contenu
//demarage temporisation
ob_start();
?>
<h2>Bienvenue sur le site !</h2>
<?php
//fin tempo et recup contenu
$contenu = ob_get_clean();
//Inclusion du template
include 'views/includes/template.php';
