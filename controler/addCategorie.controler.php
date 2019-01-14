<?php

require_once '../model/categorieDAO.class.php';

$categorieDAO = new CategorieDAO();

if (isset($_POST['nom_categorie'])){
    $nom = filter_input(INPUT_POST, 'nom_categorie', FILTER_SANITIZE_STRING);
    $categorieDAO->addCategorie($nom);
    header("Location: ../view/home.html");
}

foreach($categorieDAO->getAllCategorie() as $categorie){
    $nom_categorie[] = $categorie['nom_categorie'];
}