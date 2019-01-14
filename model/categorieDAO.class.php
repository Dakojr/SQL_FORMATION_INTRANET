<?php

require_once '../db/dbconnect.class.php';

class CategorieDAO extends DbConnect {

    public function __construct(){
        parent::connect();
    }

    public function getAllCategorie(){
        $sql = "SELECT nom_categorie, id_categorie from categorie";
        $results = parent::executeQuery($sql);
        return $results->fetchAll();
    }

    public function getCategorieByIdModule($id_module){
        $sql = "SELECT c.id_categorie, c.nom_categorie FROM categorie c, module m WHERE m.id_module = :id AND m.id_categorie = c.id_categorie";
        $params = array(
            "id" =>$id_module
        );
        $result = parent::executeQuery($sql, $params);
        return $result->fetch();
    }

    public function getIdByNom($nom){
        $sql = "SELECT id_categorie FROM categorie WHERE nom_categorie = :nom";
        $params = array(
            "nom" =>$nom
        );
        $result = parent::executeQuery($sql, $params);
        return $result->fetchColumn();
    }

    public function getNomById($id){
        $sql = "SELECT nom_categorie FROM categorie WHERE id_categorie = :id";
        $params = array(
            "id" =>$id
        );
        $result = parent::executeQuery($sql, $params);
        return $result->fetchColumn();
    }

    public function addCategorie($nom){
        $sql = "INSERT INTO categorie (nom_categorie)
                            value (:nom)";
        $params = array(
            "nom" => $nom
        );
        $results = parent::executeQuery($sql, $params);
    }
}
