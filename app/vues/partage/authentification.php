<!DOCTYPE html>
<?php
  require 'app/config/modules/Module.php';
?>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <?php
      // Chargement des librairies css/js
      Module::base();
      Module::login();
      Module::footer();
    ?>
  </head>
  <body>
    <?php
      // Chargement des composants
      require 'lib/composants/login/login.php';
      require 'lib/composants/footer/footer.php';
    ?>
  </body>
</html>
