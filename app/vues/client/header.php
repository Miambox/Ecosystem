<!DOCTYPE html>
<html lang="fr" dir="ltr">

<head>
  <meta charset="utf-8">
  <title><?php echo $title; ?></title>
  <!-- Ajout des fichiers CSS -->
  <!-- base -->
  <link rel="stylesheet" href="<?= ROOT_URL ?>static/css/client/body.css">
  <!-- login -->
  <link rel="stylesheet" href="<?= ROOT_URL ?>static/css/client/login/login-desktop.css">
  <link rel="stylesheet" href="<?= ROOT_URL ?>static/css/client/login/login-mobile.css">
  <!-- footer -->
  <link rel="stylesheet" href="<?= ROOT_URL ?>static/css/client/footer/footer-desktop.css">
  <link rel="stylesheet" href="<?= ROOT_URL ?>static/css/client/footer/footer-mobile.css">
  <!-- barre de navigation client -->
  <link rel="stylesheet" href="<?= ROOT_URL ?>static/css/client/barre-de-navigation/navbar-client-desktop.css">
  <link rel="stylesheet" href="<?= ROOT_URL ?>static/css/client/barre-de-navigation/navbar-client-mobile.css">
  <!-- page logement -->
  <link rel="stylesheet" href="<?= ROOT_URL ?>static/css/client/logements/logement-desktop.css">
  <link rel="stylesheet" href="<?= ROOT_URL ?>static/css/client/logements/logement-mobile.css">
  <!-- page piece -->
  <link rel="stylesheet" href="<?= ROOT_URL ?>static/css/client/pieces/card-piece-mobile.css">
  <link rel="stylesheet" href="<?= ROOT_URL ?>static/css/client/pieces/card-piece-desktop.css">
  <!-- page capteur -->
  <link rel="stylesheet" href="<?= ROOT_URL ?>static/css/client/capteurs/card-capteur-desktop.css">
  <link rel="stylesheet" href="<?= ROOT_URL ?>static/css/client/capteurs/card-capteur-mobile.css">
  <!-- page détails du capteur -->
  <link rel="stylesheet" href="<?= ROOT_URL ?>static/css/client/details-capteur/details-capteur-desktop.css">
  <link rel="stylesheet" href="<?= ROOT_URL ?>static/css/client/details-capteur/details-capteur-mobile.css">
  <!-- modal -->
  <link rel="stylesheet" href="<?= ROOT_URL ?>static/css/utils/modal/modal-desktop.css">
  <!-- big modal -->
  <link rel="stylesheet" href="<?= ROOT_URL ?>static/css/utils/modal/big-modal-desktop.css">
  <!-- page mention légale -->
  <link rel="stylesheet" href="<?= ROOT_URL ?>static/css/client/mention-legale/mention-legale-desktop.css">
  <link rel="stylesheet" href="<?= ROOT_URL ?>static/css/client/mention-legale/mention-legale-mobile.css">
  <!-- page profil -->
  <link rel="stylesheet" href="<?= ROOT_URL ?>static/css/client/profil/profil.css">
  <!-- page home -->
  <link rel="stylesheet" href="<?= ROOT_URL ?>static/css/client/home/home.css">
  <!-- page signin -->
  <link rel="stylesheet" href="<?= ROOT_URL ?>static/css/client/signin/signin-desktop.css">
  <!-- page password -->
  <link rel="stylesheet" href="<?= ROOT_URL ?>static/css/client/password/password-desktop.css">
  <!-- page ajout de Logement -->
  <link rel="stylesheet" href="<?= ROOT_URL ?>static/css/client/addLogement/addLogement-desktop.css">
  <!-- page ajout de Piece -->
  <link rel="stylesheet" href="<?= ROOT_URL ?>static/css/client/addPiece/addPiece-desktop.css">
  <!-- page ajout de capteur -->
  <link rel="stylesheet" href="<?= ROOT_URL ?>static/css/client/addCapteur/addCapteur-desktop.css">
  <link rel="stylesheet" href="<?= ROOT_URL ?>static/css/client/chat.css">
  <link rel="stylesheet" href="<?= ROOT_URL ?>static/css/client/faq.css">
  <link rel="stylesheet" href="<?= ROOT_URL ?>static/css/client/cgu.css">
  <link rel="stylesheet" href="<?= ROOT_URL ?>static/css/client/mentionsLegales.css">
  <!-- Mot de passe oubliée-->
  <link rel="stylesheet" href="<?= ROOT_URL ?>static/css/client/motdepasseoublie.css">
  <!-- 404 -->
  <link rel="stylesheet" href="<?= ROOT_URL ?>static/css/utils/erreur404.css">

</head>

<body id="body">
  <!--Barre de navigation-->
  <?php
  if (isset($_SESSION['id'])) {
    ?>
    <header>
      <div>
        <img src="<?= ROOT_URL ?>static/image/entreprise/ecosystem-logo.png" width="10%" alt="">
      </div>
      <div class="navbar">
        <a href="<?= ROOT_URL ?>?Route=client&Ctrl=profil&Vue=vuePrincipale">
          Profil
        </a>
      </div>
      <div class="navbar">
        <a href="<?= ROOT_URL ?>?Route=client&Ctrl=logement&Vue=vuePrincipale">
          Gestion
        </a>

      </div>
      <div class="navbar">
        <a href="<?= ROOT_URL ?>?Route=client&Ctrl=signin&Vue=deconnexion">
          Deconnexion
        </a>
      </div>
      <?php
      if ($vue != "details") {
        ?>
        <div class="navbar">
          <?php
          if ($vue == "logement") {
            ?>
            <form class="" action="?Route=client&Ctrl=logement&Vue=addLogement" method="post">
              <button class="add-logement" type="submit">Ajouter un logement</button>
            </form>
          <?php
        } else if ($vue == "piece") {
          ?>
            <form class="" action="?Route=client&Ctrl=piece&Vue=addPiece" method="post">
              <input type="hidden" name="id_logement" value="<?= $id_logement ?>">
              <button type="submit" class="add-logement" name="">Ajouter une pièce</button>
            </form>
          <?php
        } else if ($vue == "capteur") {
          ?>
            <form class="" action="?Route=client&Ctrl=capteur&Vue=addCapteur" method="post">
              <input type="hidden" name="id_piece" value="<?php echo $donneespiece['id']  ?>">
              <input type="hidden" name="id_logement" value="<?php echo $IDLOGEMENT  ?>">
              <button type="submit" class="add-logement" name="button">Ajouter un capteur</button>
            </form>
          <?php
        }
        ?>
        </div>
      <?php
    }
    ?>
    </header>
  <?php
}
?>