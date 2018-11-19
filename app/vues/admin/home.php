<?php
  require 'app/config/modules/Module.php';
  require 'app/config/modules/ModuleAdmin.php';
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Dom'Isep - Admin</title>
    <?php
      // Chargement des librairies nécessaires
      Module::base();
      ModuleAdmin::navbarAdmin();
      Module::footer();
    ?>
  </head>
  <body>
    <?php
    // Chargements des différents composants de notre vue
    require 'lib/composants/barre-de-navigation/admin/navbar-admin.php';
    require 'lib/composants/footer/footer.php'
    ?>
  </body>
</html>
