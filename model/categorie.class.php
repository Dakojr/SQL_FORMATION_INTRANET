<?php

require_once "entity.class.php";

class Categorie extends Entity {

    private $id;
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
    
    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }
}