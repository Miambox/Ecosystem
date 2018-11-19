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
      ModuleClient::cardPieceClient();
      Module::footer();
    ?>
  </head>
  <body>
    <?php
      require 'lib/composants/barre-de-navigation/client/navbar-client.php';
      require 'lib/composants/pieces/client/card-piece.php';
      require 'lib/composants/footer/footer.php';
    ?>

  </body>
</html>
