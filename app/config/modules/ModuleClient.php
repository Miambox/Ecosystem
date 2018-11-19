<?php
class ModuleClient {
  /* Classe regroupant l'ensemble des librairies */

  public static function navbarClient() {
    ?>
    <link rel="stylesheet" href="<?=ROOT_URL?>lib/composants/barre-de-navigation/client/css/navbar-client-desktop.css">
    <link rel="stylesheet" href="<?=ROOT_URL?>lib/composants/barre-de-navigation/client/css/navbar-client-mobile.css">
    <script type="text/javascript" src="<?=ROOT_URL?>lib/composants/barre-de-navigation/client/js/navbar-client.js"></script>
    <?php
  }

  public static function cardLogementClient() {
    ?>
      <link rel="stylesheet" href="<?=ROOT_URL?>lib/composants/logements/client/css/card-logement-desktop.css">
      <link rel="stylesheet" href="<?=ROOT_URL?>lib/composants/logements/client/css/card-logement-mobile.css">
      <script type="text/javascript" href="<?=ROOT_URL?>lib/composants/logements/client/js/logement-client.js"></script>
    <?php
  }

  public static function cardPieceClient() {
    ?>
      <link rel="stylesheet" href="<?=ROOT_URL?>lib/composants/pieces/client/css/card-piece-desktop.css">
      <link rel="stylesheet" href="<?=ROOT_URL?>lib/composants/pieces/client/css/card-piece-mobile.css">
      <script type="text/javascript" href="<?=ROOT_URL?>lib/composants/pieces/client/js/piece-client.js"></script>
    <?php
  }

  public static function mentionLegale() {
    ?>
    <link rel="stylesheet" href="<?=ROOT_URL?>lib/composants/mention-legale/css/mention-legale-desktop.css">
    <link rel="stylesheet" href="<?=ROOT_URL?>lib/composants/mention-legale/css/mention-legale-mobile.css">
    <?php
  }

}
?>
