<?php

namespace Youcode\GestionLivreurs\MisEnSituation;


class Auteur {
    private int $id;
    private string $nom;

    private array  $listLivres;

    public function __construct(string $nom){
        $this->nom = $nom;
    }
}