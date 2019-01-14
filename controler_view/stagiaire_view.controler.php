<?php

require_once "../controler/stagiaire.controler.php";

if(!isset($stagiaire))
{
  die();
}

foreach ($stagiaire as $key => $value)
{?>
  <a href="../controler/stagiaire.controler.php?id=<?php echo  $value->getId();?>" style="width: 100%;"><?= $value->getPrenom() . " " . $value->getNom();?></a>
<?php
}
