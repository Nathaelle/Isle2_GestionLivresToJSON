<?php
//var_dump($toTemplate);
//var_dump($toTemplate["datas"]);

$livres = $toTemplate["datas"];

?>

<form action="index.php?route=ajoutlivre" method="POST">
    <input type="text" id="titre" placeholder="Titre du livre" name="titre">
    <input type="text" id="resume" placeholder="Resume du livre" name="resume">
    <input type="text" id="auteur" placeholder="Auteur du livre" name="auteur">
    <input type="text" id="categorie" placeholder="Catégorie du livre" name="categorie">
    <input type="submit">
</form>

<ul>
<?php foreach($livres as $livre):?>
    <li><?= $livre->titre ?>, écrit par <?= $livre->auteur ?></li>
<?php endforeach ?>
</ul>