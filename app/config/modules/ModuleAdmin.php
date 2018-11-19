<?php
class ModuleAdmin {
  /* Classe regroupant l'ensemble des librairies */

  public static function navbarAdmin() {
    ?>
    <link rel="stylesheet" href="<?=ROOT_URL?>lib/composants/barre-de-navigation/admin/css/navbar-admin-desktop.css">
    <link rel="stylesheet" href="<?=ROOT_URL?>lib/composants/barre-de-navigation/admin/css/navbar-admin-mobile.css">
    <?php
  }

  public static function clientProfil() {
    ?>
    <link rel="stylesheet" href="<?=ROOT_URL?>static/css/admin/clientProfil.css">
    <?php
  }

}
?>
