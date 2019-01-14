<?php
require_once '../model/categorie.class.php';
require_once '../model/categorieDAO.class.php';
require_once '../model/module.class.php';
require_once '../model/moduleDAO.class.php';
require_once 'session.controler.php';

$moduleDAO = new ModuleDAO();
$categorieDAO = new categorieDAO();

$i = 0;
foreach($categorieDAO->getAllCategorie() as $v) {
    $categorie[$i] = new Categorie($v);
    foreach($moduleDAO->getNomModule($v['id_categorie']) as $data){
        $module[$i][] = new Module($data);
    }
    $i++;
}
