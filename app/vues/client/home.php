<?php
  require 'app/config/modules/Module.php';
  require 'app/config/modules/ModuleClient.php';
?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Eco'System</title>
    <?php
      // Chargement des librairies nécessaires
      Module::base();
      ModuleClient::navbarClient();
      Module::footer();
    ?>
  </head>
  <body>
    <?php
    // Chargements des différents composants de notre vue
    require 'lib/composants/barre-de-navigation/client/navbar-client.php';
    require 'lib/composants/footer/footer.php'
    ?>
  </body>
</html>
