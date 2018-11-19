<?php
class Module {
  /* Classe regroupant l'ensemble des librairies */

  public static function base() {
    /* Cette fonction charge toutes les librairies générales et les vendors.
    *  Librairies chargées: Jquery, body.js
    */
    ?>
    <script type="text/javascript" src="<?=ROOT_URL?>static/js/vendor/jquery-3-3-1.js"></script>
    <link rel="stylesheet" href="<?=ROOT_URL?>static/css/admin/body.css">
    <?php
  }

  public static function navbar() {
    /* Librairies de la barre de navigation
    *  Librairies chargées: navbar-mobile.css, navbar-desktop.css, navbar.js
    */
    ?>
    <link rel="stylesheet" href="<?=ROOT_URL?>lib/composants/barre-de-navigation/css/navbar-mobile.css">
    <link rel="stylesheet" href="<?=ROOT_URL?>lib/composants/barre-de-navigation/css/navbar-desktop.css">
    <script type="text/javascript" src="<?=ROOT_URL?>lib/composants/barre-de-navigation/js/navbar.js"></script>
    <?php
  }

  public static function bouton() {
    ?>
    <link rel="stylesheet" href="<?=ROOT_URL?>lib/composants/boutons/bouton-supprimer/css/bouton-supprimer.css">
    <link rel="stylesheet" href="<?=ROOT_URL?>lib/composants/boutons/bouton-valider/css/bouton-valider.css">
    <link rel="stylesheet" href="<?=ROOT_URL?>lib/composants/boutons/bouton-ajouter-logement/css/bouton-ajouter-logement.css">
    <link rel="stylesheet" href="<?=ROOT_URL?>lib/composants/boutons/bouton-ajouter-piece/css/bouton-ajouter-piece.css">
    <link rel="stylesheet" href="<?=ROOT_URL?>lib/composants/boutons/bouton-ajouter-capteur/css/bouton-ajouter-capteur.css">
    <link rel="stylesheet" href="<?=ROOT_URL?>lib/composants/boutons/bouton-capteur/css/bouton-capteur.css">
    <link rel="stylesheet" href="<?=ROOT_URL?>lib/composants/boutons/bouton-logement/css/bouton-logement.css">
    <link rel="stylesheet" href="<?=ROOT_URL?>lib/composants/boutons/bouton-piece/css/bouton-piece.css">
    <link rel="stylesheet" href="<?=ROOT_URL?>lib/composants/boutons/bouton-3-points/css/bouton-3-points.css">
    <link rel="stylesheet" href="<?=ROOT_URL?>lib/composants/boutons/bouton-retour/bouton-retour.css">
    <script type="text/javascript" src="<?=ROOT_URL?>lib/composants/boutons/bouton-3-points/js/bouton-3-points.js"></script>
    <link rel="stylesheet" href="<?=ROOT_URL?>lib/composants/boutons/css/boutons.css">

    <?php
  }

  public static function login() {
    ?>
    <link rel="stylesheet" href="<?=ROOT_URL?>lib/composants/login/css/login-desktop.css">
    <link rel="stylesheet" href="<?=ROOT_URL?>lib/composants/login/css/login-mobile.css">
    <?php
  }

  public static function footer() {
    ?>
    <link rel="stylesheet" href="<?=ROOT_URL?>lib/composants/footer/css/footer-desktop.css">
    <script type="text/javascript" src="<?=ROOT_URL?>lib/composants/footer/js/footer.js">

    </script>
    <?php
  }
}
?>
