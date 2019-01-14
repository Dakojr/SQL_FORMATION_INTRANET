<?php

require_once '../db/dbconnect.class.php';

class StagiaireDAO extends DbConnect {

    public function __construct(){
        parent::connect();
    }

    public function getAll(){
        $sql = "SELECT * from stagiaire";
        $results = parent::executeQuery($sql);
        return $results->fetchAll();
    }

    public function getStagiaireById($id){
        $params = array(
            'id' => $id
        );
        $sql = "SELECT * from stagiaire where id_stagiaire = :id";
        $results = parent::executeQuery($sql, $params);
        return $results->fetchAll();
    }

    public function getStagiaireForScrollBar($id){
        $sql = "SELECT st.id_stagiaire, st.nom_stagiaire, st.prenom_stagiaire from stagiaire st
        where st.id_stagiaire NOT IN (SELECT s.id_stagiaire FROM stagiaire_session s where s.id_session = :id)";
        $params = array(
            'id' => $id
        );
        $results = parent::executeQuery($sql, $params);
        return $results->fetchAll();
    }

    public function getStagiaireIdByIdSession($id){
        $params = array(
            'id' => $id
        );
        $sql = "SELECT st.id_stagiaire, st.nom_stagiaire, st.prenom_stagiaire from stagiaire_session s, stagiaire st where s.id_session = :id AND st.id_stagiaire = s.id_stagiaire";
        $results = parent::executeQuery($sql, $params);
        return $results->fetchAll();
    }

    public function addStagiaire($nom, $prenom, $sexe, $ville, $email, $phone){
        $sql = "INSERT INTO stagiaire (nom_stagiaire, prenom_stagiaire, sexe, ville,  email, phone)
                            value (:nom, :prenom, :sexe, :ville, :email, :phone)";
        $results = parent::executeQuery($sql, array(
            "nom" => $nom,
            "prenom" => $prenom,
            "sexe" => $sexe,
            "ville" => $ville,
            "email" => $email,
            "phone" => $phone
        ));
    }

    public function getIdByNom($nom){
        $sql = "SELECT id_stagiaire FROM stagiaire WHERE nom_stagiaire = :nom";
        $params = array(
            "nom" =>$nom
        );
        $result = parent::executeQuery($sql, $params);
        return $result->fetchColumn();
    }

    public function addStagiaireToSession($id_session, $id_stagiaire){
        $sql = "INSERT INTO stagiaire_session (id_session, id_stagiaire) value (:id_session, :id_stagiaire)";
        $results = parent::executeQuery($sql, array(
            'id_session' => $id_session,
            'id_stagiaire' => $id_stagiaire
        ));
    }
}
