<?php

require_once "../controler/session.controler.php";

if(!isset($place_reserve))
{
  die();
}

$i = count($place_reserve);


for($x = 0; $x < $i; $x++)
{?>
  <div class="col-md-6">
    <div class="card mb-3 shadow-sm">
      <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" src="https://upload.wikimedia.org/wikipedia/commons/8/89/Carr%C3%A9_gris.jpg" aria-label="Placeholder: Thumbnail">
        <title>Placeholder</title>
        <rect fill="#55595c" width="100%" height="100%"/>
        <text fill="#eceeef" dy="0.3em" x="50%" y="50%" class="textsvg"><?= $session[$x]->getNom(); ?></text>
      </svg>
      <div class="card-body">
        <div class="d-flex justify-content-between align-items-center">
          <div class ="btn-group">
            <?php
                  if($place_restante[$x] == 0)
                  {?>
                    <button type="button" class="btn btn-sm btn-outline-secondary" id="thebutton" disabled><a id="buttonvoir" href="#" disabled>Voir</a>
                  <?php
                  }
                  else
                  {?>
                    <button type="button" class="btn btn-sm btn-outline-secondary" id="thebutton" ><a id="buttonvoir" href="../controler/session.controler.php?id_session=<?php echo $session[$x]->getId();?>">Voir</a>
                  <?php
                    }
                  ?>
            <button type="button" class="btn btn-sm btn-outline-secondary"  disabled><text>Place libre :<?= $place_restante[$x]; ?></text></button>
          </div>
          <small class="text-muted">du <?= $session[$x]->getDated() ?> au <?= $session[$x]->getDatef(); ?> </small>
        </div>
      </div>
    </div>
  </div>
  <?php
}
?>
