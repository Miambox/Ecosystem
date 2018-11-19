<!DOCTYPE html>
<?php
  require 'app/config/modules/ModuleClient.php';
  require 'app/config/modules/Module.php';
?>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Mention Légale @EcoSystem</title>
    <?php
      Module::bouton();
      ModuleClient::mentionLegale();
    ?>
  </head>
  <body style="background-image: linear-gradient(to right, orange, rgba(255,152,85));">
    <?php
      require 'lib/composants/mention-legale/mention-legale.php'
    ?>
  </body>
</html>
