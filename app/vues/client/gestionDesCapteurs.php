<!DOCTYPE html>
<?php
  require 'app/config/modules/Module.php';
  require 'app/config/modules/ModuleClient.php';
?>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Gestion des capteurs</title>
    <?php
      Module::base();
      Module::bouton();
      ModuleClient::navbarClient();
      ModuleClient::cardLogementClient();
      Module::footer();
    ?>
  </head>
  <body>
    <?php
      if(!isset($_POST['capteur'])) {
        $capteur = false;
      } else {
        $capteur = $_POST['capteur'];
      }
      var_dump($capteur);
      require 'lib/composants/barre-de-navigation/client/navbar-client.php';
      if(!$capteur) {
        require 'lib/composants/logements/client/card-logement.php';
      }
      else {
        require 'lib/composants/pieces/client/card-piece.php';
      }
      require 'lib/composants/footer/footer.php';
    ?>

  </body>
</html>
