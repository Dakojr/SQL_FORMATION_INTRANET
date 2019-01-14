<?php

require_once '../db/dbconnect.class.php';

class SessionDAO extends DbConnect{

    public function __construct(){
        parent::connect();
    }

    public function getAll(){
        $sql = 'SELECT * FROM session';
        $results = parent::executeQuery($sql);
        return $results->fetchAll();
    }

    public function getPlaceReserved($id){
        $params = array(
            'id' => $id
        );
        $sql = 'SELECT COUNT(id_stagiaire) FROM stagiaire_session where id_session = :id';
        $results = parent::executeQuery($sql, $params);
        return $results->fetch();
    }

    public function addSession($nom, $dated, $datef, $nb){
        $sql = "INSERT INTO session (nom_session, dated, datef, nb_theorique)
                            value (:nom, :dated, :datef, :nb)";
        $results = parent::executeQuery($sql, array(
            "nom" => $nom,
            "dated" => $dated,
            "datef" => $datef,
            "nb" => $nb
        ));
    }

    public function getDateInOrder(){
        $sql = "SELECT * FROM `session` GROUP BY dated ASC LIMIT 1";
        $result = parent::executeQuery($sql);
        return $result->fetch();
    }

    public function getIdByNom($nom){
        $sql = "SELECT id_session FROM session WHERE nom_session = :nom";
        $params = array(
            "nom" =>$nom
        );
        $result = parent::executeQuery($sql, $params);
        return $result->fetchColumn();
    }

    public function getNomById($id){
        $sql = "SELECT nom_session FROM session WHERE id_session = :id";
        $params = array(
            "id" =>$id
        );
        $result = parent::executeQuery($sql, $params);
        return $result->fetchColumn();
    }

    public function getModuleFromSession($id_session){
        $sql = "SELECT id_module, nb_jours FROM session_module WHERE id_session = :id";
        $params = array(
            "id" =>$id_session
        );
        $result = parent::executeQuery($sql, $params);
        return $result->fetchAll();
    }

    public function setModuleToSession($id_session, $id_module, $nb){
        $sql = "INSERT INTO session_module (id_module, id_session, nb_jours) value (:id_module, :id_session, :nb)";
        $results = parent::executeQuery($sql, array(
            'id_module' => $id_module,
            'id_session' => $id_session,
            'nb' => $nb
        ));
    }
}
