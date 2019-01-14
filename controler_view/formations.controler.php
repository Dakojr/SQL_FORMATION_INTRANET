<?php

require_once "../controler/session.controler.php";
require_once "../controler/stagiaire.controler.php";

$i = count($place_reserve);

$a = 0;
?>

<div class="d-md-flex flex-md-equal ">
  <div class="bg-light text-center text-white overflow-hidden">
    <div class="my-3 py-3">
      <div class="mx-auto" style="width: 60%;  border-radius: 1em 1em 1em 1em; color: black;" id="box">
        <div class="container ">
          <h2 class="display-5"><?= $nom_session ;?></h2>
          <hr class="mb-4">
          <?php
          if(isset($categories))
          {
            foreach ($categories as $key => $value)
            {?>
              <h4><?= $value['nom_categorie'] ;?></h4>
              <hr class="mb-4" style="width: 30%;">
              <?php
              foreach ($categories[$key]['modules'] as $module)
              {?>
                <p><?= "Module : " . $module['nom_module'];?></p>
                <p><?= "Durée : " . $duree[$a] . " jours";?></p>
                <hr class="mb-3" style="width: 20%;">
                <?php
                $a++;
              }
            }
            $a++;

          }?>

          <hr class="mb-4">
          <div class="container" id="contain">
            <div class="py-1 text-center">
              <h3 class="mb-3" style="color: black;">Stagiaire Inscrit</h3>
</div>
<?php
foreach ($stagiaire_inscrit as $key => $value)
{?>
  <a href="../controler/stagiaire.controler.php?id=<?php echo  $value['id_stagiaire'];?>" style="width: 100%;"><?= $value['nom_stagiaire'] . " " . $value['prenom_stagiaire'];?></a>
<?php
}
?>
</div>

          <hr class="mb-4">
          <div class="container" id="contain">
            <div class="py-1 text-center">
              <h3 class="mb-3" style="color: black;">Inscrire un stagiaire</h3>
            </div>

            <form action="../controler/addStagiaire.controler.php?id_session=<?= $_GET['id_session'];?>" method="post" >

              <div class="container-form">
                <div class="mb-3">
                  <select class="form-control" id="inputGroupSelect01" name="id_stagiaire">
                    <option selected>Choisir un stagiaire</option>
                    <?php
                    foreach ($first as $key => $value)
                    {?>
                      <option value="<?= $value['id_stagiaire'];?>"><?= $value['nom_stagiaire'] . " " . $value['prenom_stagiaire'];?></option>
                      <?php
                    }?>
                  </select>
                </div>
                <hr class="mb-4">

                <div id="formcontainer"></div>
                  <input type="submit" value="L'inscrire" class="btn btn-primary btn-lg btn-block" id="thebutton">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
