<?php

require_once "entity.class.php";

class Module extends Entity {

    private $nom;

    public function __construct($data){
        parent::hydrate($data);
    }

    public function getNom(){
        return $this->nom;
    }

    public function setNom($nom){
        $this->nom = $nom;
    }
}