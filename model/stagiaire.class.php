<?php

require_once 'entity.class.php';

class Stagiaire extends Entity {

    private $id;
    private $nom;
    private $prenom;
    private $sexe;
    private $ville;
    private $email;
    private $phone;

    public function __construct($data){
        parent::hydrate($data);
    }

    public function getNom() {
        return $this->nom;
    }

    public function getId() {
        return $this->id;
    }
    
    public function getPrenom() {
     return $this->prenom;
    }

    public function getSexe() {
        return $this->sexe;
    }

    public function getVille() {
        return $this->ville;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getPhone() {
        return $this->phone;
    }

    public function setNom($nom) {
        $this->nom = $nom;
    }
    
    public function setPrenom($prenom) {
        $this->prenom = $prenom;
    }
    
    public function setSexe($sexe) {
        $this->sexe = $sexe;
    }
    
    public function setId($id) {
        $this->id = $id;
    }

    public function setVille($ville) {
        $this->ville = $ville;
    }
    
    public function setEmail($email) {
        $this->email = $email;
    }
    
    public function setPhone($phone) {
        $this->phone = $phone;
    }
        
}