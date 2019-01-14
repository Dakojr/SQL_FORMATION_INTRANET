<?php

require_once 'entity.class.php';

class Session extends Entity{

    private $id;
    private $nom;
    private $dated;
    private $datef;
    private $nb;

    public function __construct($variable){
        parent::hydrate($variable);
    }

    public function getId(){
        return $this->id;
    }
    
    public function getNom(){
        return $this->nom;
    }
    
    public function getDated(){
        return $this->dated;
    }
    
    public function getDatef(){
        return $this->datef;
    }
    
    public function getNb(){
        return $this->nb;
    }
    public function setId($id){
        $this->id = $id;
    }
    
    public function setNom($nom){
        $this->nom = $nom;
    }
    
    public function setDated($date){
        $this->dated = $date;
    }
    
    public function setDatef($date){
        $this->datef = $date;
    }
    
    public function setNb($nb){
        $this->nb = $nb;
    }
}