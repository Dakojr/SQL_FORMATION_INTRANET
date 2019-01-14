<?php
  require_once '../controler/addSession.controler.php';
  require_once '../controler/session.controler.php';

 ?>

<form action="../controler/addSession.controler.php" method="post" >

<div class="mb-3">
  <label id="firstcolorletter" for="nom_session">Session</label>
  <div class="input-group">
  <input type="text" name="nom_session" placeholder="Nom de la session..." class="form-control" id="nomsession">
  <select name="nom_sessionSelect" class="form-control" id="nomsession2" style="display: none; border-radius: .25rem;">
    <option value="" selected>Choisir une session...</option>
    <?php
    foreach ($session as $key => $value)
    {?>
      <option value="<?= $value->getNom();?>"><?= $value->getNom();?></option>
      <?php
    }?>
  </select>
  </div>
  <input type="button" name="" value="Choisir un nom de session existant" id="btn1" style="background-color: Transparent; background-repeat:no-repeat; border: none; cursor:pointer; overflow: hidden; color: #AD1511;">
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
  <label id="firstcolorletter" for="date_debut">Date de debut</label>
  <div class="input-group">
  <input type="date" name="date_debut" placeholder="" class="form-control" required>
  </div>
</div>

<div class="mb-3">
  <label id="firstcolorletter" for="date_fin">Date de fin</label>
  <div class="input-group">
  <input type="date" name="date_fin" placeholder="" class="form-control" required>
  </div>
</div>

<div class="mb-3">
  <label id="firstcolorletter" for="nb">Nombre de place</label>
  <div class="input-group">
  <input type="number" name="nb" placeholder="Nombre de place..." class="form-control" required>
  </div>
</div>

<hr class="mb-4">

<input type="submit" value="Suivant" class="btn btn-primary btn-lg btn-block" id="buttonnext">

</form>
