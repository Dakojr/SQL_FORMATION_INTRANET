<?php

require_once '../model/stagiaire.class.php';
require_once '../model/stagiaireDAO.class.php';

session_start();

$stagiaireDAO = new stagiaireDAO();

foreach($stagiaireDAO->getAll() as $v){
    $stagiaire[] = new Stagiaire($v);
}

if (isset($_GET['id'])){
    foreach($stagiaireDAO->getStagiaireById($_GET['id']) as $v){
        foreach($v as $tab){
            $stagiaire_profile[] = $tab;
        }
    }
    $_SESSION['stagiaire'] = $stagiaire_profile;
    header('Location: ../view/profil.html');
}

if (isset($_GET['id_session'])){
  $first = $stagiaireDAO->getStagiaireForScrollBar($_GET['id_session']);
  $stagiaire_inscrit = $stagiaireDAO->getStagiaireIdByIdSession($_GET['id_session']);  
  if ($_SERVER['PHP_SELF'] == "/SQL_SESSION/controler/stagiaire.controler.php"){
        header("Location: ../view/home.html");
    }
}
