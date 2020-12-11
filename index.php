<?php

$route = (isset($_GET["route"]))? $_GET["route"] : "accueil";

// TRADUCTION :
// if(isset($_GET["route"])) {
//     $route = $_GET["route"];
// } else {
//     $route = "accueil";
// }

// ROUTER :
switch($route) {

    case "accueil" : $toTemplate = showHome();
    break;
    case "autrepage" : $toTemplate = showAutrePage();
    break;
    case "formlivre" : $toTemplate = showFormLivre();
    break;
    case "ajoutlivre" : ajoutLivre();
    break;
    default : $toTemplate = "404.html";

}


// 

/**
 * Affichage de la page d'accueil 
 * Comptabilisation du nombre d'affichages
 * @return array : Retourne dans un tableau: le template à afficher (accueil.html)
 */
function showHome(): array {

    $ressource = fopen("compteur.txt", "r");
    $compteur = fgets($ressource);
    fclose($ressource);
    $compteur++;
    
    echo $compteur;
    
    $ressource = fopen("compteur.txt", "w");
    fwrite($ressource, $compteur);
    fclose($ressource);

    return ["template" => "accueil.html"];
}

/**
 * Affichage d'une page pour "l'exemple"
 * @return array : Retourne dans un tableau: le template à afficher (autrepage.html)
 */
function showAutrePage(): array {

    return ["template" => "autrepage.html"];
}

/**
 * Affichage du formulaire d'ajout d'un livre
 * @return array : Retourne dans un tableau: le template à afficher (formulaire.php)
 */
function showFormLivre(): array {

    return ["template" => "formulaire.php"];
}

/**
 * Ajout d'un livre à partir du modèle "Livre"
 * Création (instanciation) d'un nouveau livre, à partir des données du formulaire
 * Appel à sa méthode de sauvegarde
 * Redirection vers route formlivre (affichage du formulaire)
 */
function ajoutLivre() {

    require_once "models/Livre.php";

    $livre = new Livre($_POST["titre"], $_POST["resume"], $_POST["auteur"], $_POST["categorie"]);
    $livre->saveBook();

    // Pensez à commenter la redirection temporairement pour débuguer (voir vos var_dump)
    header("Location:index.php?route=formlivre");
    exit;
}



?>




<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <?php require "templates/" . $toTemplate['template']; ?>

</body>
</html>
