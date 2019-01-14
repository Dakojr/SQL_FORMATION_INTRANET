<?php
require_once '../controler/addCategorie.controler.php';
require_once '../controler/session.controler.php';

?>

<form action="../controler/addModule.controler.php" method="post" >
  <div class="container-form">
    <div class="mb-3">
      <label id="firstcolorletter" for="id_session">Session</label>
      <select class="form-control" name="id_session" >
        <option value="" selected>Choisir une session...</option>
        <?php
        foreach ($session as $key => $value)
        {?>
          <option value="<?= $value->getId();?>"><?= $value->getNom() . " du " . $value->getDated() . " au " . $value->getDatef();?></option>
          <?php
        }?>
      </select>
    </div>


    <div class="mb-3">
      <label id="firstcolorletter" for="nom_categorie">Catégorie</label>
      <div  class="input-group">
      <select class="form-control" name="nom_categorieSelect" id="nomsession2" style="display: none;" >
        <option value="" selected>Choisir une catégorie...</option>
        <?php
        foreach ($nom_categorie as $key => $value)
        {?>
          <option value="<?= $value ;?>"><?= $value;?></option>
          <?php
        }?>
      </select>
      <input type="text" name="nom_categorie" placeholder="Nom de la categorie" class="form-control" id="nomsession" >
      </div>
      <input type="button" name="" value="Choisir un nom de categorie existant" id="btn1" style="background-color: Transparent; background-repeat:no-repeat; border: none; cursor:pointer; overflow: hidden; color: #AD1511">
      <input type="button" name="" value="Nouveau Nom" id="btn2" style="display: none; background-color: Transparent; background-repeat:no-repeat; border: none; cursor:pointer; overflow: hidden; color: #AD1511;">
    </div>
    <script>
    $(document).ready(function(){
      $("#btn1").click(function(){
        $("#nomsession").hide();
        $("#btn1").hide();
        $("#btn2").show();
        $("#nomsession2").show();
      });
      $("#btn2").click(function(){
        $("#nomsession").show();
        $("#btn1").show();
        $("#btn2").hide();
        $("#nomsession2").hide();
      });
    });
    </script>

    <div class="mb-3">
      <label id="firstcolorletter" for="nom_module">Nom du Module</label>
      <div class="input-group">
        <input type="text" name="nom_module" placeholder="Nom du module..." class="form-control" required>
      </div>
    </div>

    <div class="mb-3">
      <label id="firstcolorletter" for="duree">Durée du Module</label>
      <div class="input-group">
        <input type="number" name="duree" placeholder="Durée du module..." class="form-control" required>
      </div>
    </div>

    <div id="formcontainer"></div>

    <hr class="mb-4">

    <input type="submit" value="Finaliser" class="btn btn-primary btn-lg btn-block" id="thebutton">
  </div>
</form>
