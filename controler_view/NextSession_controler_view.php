<?php
  require_once '../controler/session.controler.php';

?>

<h3 class="jumbotron-heading">Prochaine Session</h3>
<h1 class="jumbotron-heading"><?= $date_first_session['nom_session'];?></h1>
<h5 class="h5">du <?= $date_first_session['dated'] . " au " . $date_first_session['datef'];?></h5>
<p class="lead text-muted">Pour avoir plus d'informations pour la prochaine session disponible cliquez ci-dessous</p>
<p>
  <button type="button" class="btn btn-sm btn-outline-secondary" id="thebutton" ><a id="buttonvoir" href="../controler/session.controler.php?id_session=<?php echo $date_first_session['id_session'];?>">Information</a>
</p>
