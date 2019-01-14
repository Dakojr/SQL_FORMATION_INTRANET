<?php

require_once '../controler/stagiaire.controler.php';

$id = $_SESSION['stagiaire'][0];
$nom = $_SESSION['stagiaire'][1];
$prenom = $_SESSION['stagiaire'][2];
$sexe = $_SESSION['stagiaire'][3];
$ville = $_SESSION['stagiaire'][4];
$email = $_SESSION['stagiaire'][5];
$phone = $_SESSION['stagiaire'][6];

if($sexe == 'M')
  {
    $sexe = "Masculin";
  }
else
  {
    $sexe = "Féminin";
  }
?>

<div class="jumbotron text-center" id="profiljumbotron">
  <div class="container" id="profilcontainer">
    <img src="https://grv-construction.com/wp-content/uploads/2016/08/User-red.png" alt="" width="140" height="140" id="profilpicture" class="img rounded-circle">
    <h1 class="jumbotron-heading"><?= $nom . " " . $prenom; ?></h1>
    <p style="font-size: 1.2em;">
      E-mail : <?=$email . "<br />" ;?>
      Téléphone : <?= $phone . "<br />"; ?>
      Ville : <?= $ville . "<br />";?>
      Genre : <?= $sexe . "<br />";?>
    </p>
  </div>
</div>
