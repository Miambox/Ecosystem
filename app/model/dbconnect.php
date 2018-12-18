<?php

<<<<<<< HEAD:app/model/connexion.php
  try {
      $bdd = new PDO('mysql:host=localhost; dbname=eco_system_test; charset=utf8','root','root',
          array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)
      );
  }
  catch(Exception $e)
  {
      die('Erreur : '.$e->getMessage());
  }
=======
try {
    $bdd = new PDO('mysql:host=localhost; dbname=ecosystem; charset=utf8','root','root',
        array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)
    );
}
catch(Exception $e)
{
    die('Erreur : '.$e->getMessage());
}
>>>>>>> dev:app/model/dbconnect.php

?>
