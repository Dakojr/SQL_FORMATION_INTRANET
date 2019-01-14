<?php

require_once '../model/stagiaireDAO.class.php';

$stagiaireDAO = new stagiaireDAO();

if (isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['sexe']) && isset($_POST['ville']) && isset($_POST['email']) && isset($_POST['phone'])){
    $nom = filter_input(INPUT_POST, 'nom', FILTER_SANITIZE_STRING);
    $prenom = filter_input(INPUT_POST, 'prenom', FILTER_SANITIZE_STRING);
    $ville = filter_input(INPUT_POST, 'ville', FILTER_SANITIZE_STRING);
    $phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $sexe = $_POST['sexe'];

    $stagiaireDAO->addStagiaire($nom, $prenom, $sexe, $ville, $email, $phone);
    header("Location: ../view/stagiaire.html");
}

if (isset($_GET['id_session']) && isset($_POST['id_stagiaire'])){
    $stagiaireDAO->addStagiaireToSession($_GET['id_session'], $_POST['id_stagiaire']);
    header("Location: ../view/formations.html?id_session=" . $_GET['id_session']);
}
