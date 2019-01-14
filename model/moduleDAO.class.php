<?php

require_once '../db/dbconnect.class.php';

class ModuleDAO extends DbConnect {

    public function __construct(){
        parent::connect();
    }

    public function getNomByIdCategorie($id){
        $params = array(
            'id' => $id
        );
        $sql = "SELECT nom_module from module where id_categorie = :id";
        $results = parent::executeQuery($sql, $params);
        return $results->fetchAll();
    }

    public function getModuleByIdCategorieAndSession($id_categorie, $id_session){
        $sql = "SELECT m.nom_module FROM module m , session_module sm WHERE m.id_categorie = :id_c AND sm.id_session = :id_s AND m.id_module = sm.id_module";
        $params = array(
            'id_s' => $id_session,
            'id_c' => $id_categorie
        );
        $results = parent::executeQuery($sql, $params);
        return $results->fetchAll();
    }

    public function getNomModule($id){
        $params = array(
            'id' => $id
        );
        $sql = "SELECT nom_module from module where id_module = :id";
        $results = parent::executeQuery($sql, $params);
        return $results->fetchColumn();
    }

    public function addModule($nom, $id_categorie){
        $sql = "INSERT INTO module (nom_module, id_categorie)
                            value (:nom, :id)";
        $params = array(
            "nom" => $nom,
            "id" => $id_categorie
        );
        $results = parent::executeQuery($sql, $params);
    }

    public function getIdByNom($nom){
        $params = array(
            "nom" => $nom
        );
        $sql = "SELECT id_module from module where nom_module = :nom";
        $results = parent::executeQuery($sql, $params);
        return $results->fetchColumn();
    }

    public function addModuleToSession($id_module, $id_session, $nb){
        $sql = "INSERT INTO session_module (id_module, id_session, nb_jours)
                            value (:id_module, :id_session, :nb)";
        $params = array(
            "id_module" => $id_module,
            "id_session" => $id_session,
            "nb" => $nb
        );
        $results = parent::executeQuery($sql, $params);
    }
}
