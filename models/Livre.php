<?php

class Livre {

    private $titre;
    private $resume;
    private $auteur;
    private $categorie;

    function __construct(string $titre, string $resume, string $auteur, string $categorie) {
        $this->titre = $titre;
        $this->resume = $resume;
        $this->auteur = $auteur;
        $this->categorie = $categorie;
    }

    function saveBook() {

        $livres = json_decode(file_get_contents("datas/livres.json"));
        array_push($livres, get_object_vars($this));

        $handle = fopen("datas/livres.json", "w");
        $json = json_encode($livres);
        fwrite($handle, $json);
        fclose($handle);
    }
}