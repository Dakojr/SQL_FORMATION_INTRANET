<?php

require_once '../model/sessionDAO.class.php';

session_start();

$sessionDAO = new sessionDAO();

if (isset($_POST['nom_session']) && strlen($_POST['nom_session']) == 0){
  $nom = $_POST['nom_session'];
}

if (isset($_POST['nom_sessionSelect']) && strlen($_POST['nom_sessionSelect']) == 0){
  $nom = $_POST['nom_sessionSelect'];
}

if (isset($nom) && isset($_POST['date_debut']) && isset($_POST['date_fin']) && isset($_POST['nb'])){
    $nom = filter_input(INPUT_POST, 'nom_session', FILTER_SANITIZE_STRING);
    $dated = filter_input(INPUT_POST, 'date_debut', FILTER_SANITIZE_STRING);
    $datef = filter_input(INPUT_POST, 'date_fin', FILTER_SANITIZE_STRING);
    if ($dated >= $datef){
        header('Location: ../view/addModuleSession.html');
    }
    else {
        $sessionDAO->addSession($nom, $dated, $datef, $_POST['nb']);
        $id_session = $sessionDAO->getIdByNom($nom);
        $_SESSION['id_session'] = $id_session;
        header("Location: ../view/addAModule.html");
    }
}

foreach($sessionDAO->getAll() as $v){
    $nom_session[] = $v['nom_session'];
}
