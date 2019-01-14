<?php

require_once '../model/session.class.php';
require_once '../model/sessionDAO.class.php';
require_once '../model/moduleDAO.class.php';
require_once '../model/categorieDAO.class.php';

$sessionDAO = new SessionDAO();
$moduleDAO = new ModuleDAO();
$categorieDAO = new CategorieDAO();

foreach($sessionDAO->getAll() as $v){
  $session[] = new Session($v);
  $place_reserve[] = $sessionDAO->getPlaceReserved($v['id_session']);
  $i = intval(implode($sessionDAO->getPlaceReserved($v['id_session'])));
  $place_restante[] = intval($v['nb_theorique']) - $i;
}

if (isset($_GET['id_session'])){
  $nom_session = $sessionDAO->getNomById($_GET['id_session']);
  $module = $sessionDAO->getModuleFromSession($_GET['id_session']);
  foreach($module as $v){
    $id_module[] = $v['id_module'];
    $duree[] = $v['nb_jours'];
    if ($categorieDAO->getCategorieByIdModule($v['id_module'])){
      $categories[] = $categorieDAO->getCategorieByIdModule($v['id_module']);
    }
  }

  if (isset($categories)){
    $temp = null;
    foreach($categories as $k => $c){
      if($temp === $c){
        unset($categories[$k]);
      }
      $temp = $c;
    }


    foreach($categories as $key => $cat){
      $m = $moduleDAO->getModuleByIdCategorieAndSession($cat['id_categorie'], $_GET['id_session']);
      $categories[$key]["modules"] = $m;
    }
  }
  if($_SERVER['PHP_SELF'] == "/SQL_SESSION/controler_view/formations.controler.php")
  {
    return;
  }

  if($_SERVER['PHP_SELF'] != "/SQL_SESSION/view/formations.html")
  {
    header("Location: ../view/formations.html?id_session=".$_GET['id_session']);
  }
}

$date_first_session = $sessionDAO->getDateInOrder();
