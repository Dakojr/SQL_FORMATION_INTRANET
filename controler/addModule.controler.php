<?php

require_once '../model/moduleDAO.class.php';
require_once '../model/categorieDAO.class.php';
require_once '../model/sessionDAO.class.php';

session_start();

var_dump($_POST);

$moduleDAO = new moduleDAO();
$categorieDAO = new categorieDAO();
$sessionDAO = new sessionDAO();

if (isset($_POST['nom_categorie']) && $_POST['nom_categorie'] !== ""){
  $nom_categorie = $_POST['nom_categorie'];
}
if (isset($_POST['nom_categorieSelect']) && $_POST['nom_categorieSelect'] !== ""){
  $nom_categorie = $_POST['nom_categorieSelect'];
}

if (isset($nom_categorie) && isset($_POST['id_session'])){
    if (!$categorieDAO->getIdbyNom($nom_categorie)){
        $categorieDAO->addCategorie($nom_categorie);
    }
    $id_categorie = $categorieDAO->getIdbyNom($nom_categorie);
    if (isset($_POST['nom_module'])){
        $nom_module = filter_input(INPUT_POST, 'nom_module', FILTER_SANITIZE_STRING);
        $moduleDAO->addModule($nom_module, $id_categorie);
        if (isset($_POST['duree'])){
            $id_module = $moduleDAO->getIdByNom($nom_module);
            var_dump($id_module);
            $moduleDAO->addModuleToSession($id_module, $_POST['id_session'], $_POST['duree']);
            header("Location: ../view/formations.html?id_session=" . $_POST['id_session']);
        }
    }
}
else {
    header('Location: ../view/addAModule.html');
}
