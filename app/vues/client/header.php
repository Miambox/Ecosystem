<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title><?php echo $title; ?></title>
    <!-- Ajout des fichiers CSS -->
    <!-- base -->
    <link rel="stylesheet" href="<?=ROOT_URL?>static/css/client/body.css">
    <!-- login -->
    <link rel="stylesheet" href="<?=ROOT_URL?>static/css/client/login/login-desktop.css">
    <link rel="stylesheet" href="<?=ROOT_URL?>static/css/client/login/login-mobile.css">
    <!-- footer -->
    <link rel="stylesheet" href="<?=ROOT_URL?>static/css/client/footer/footer-desktop.css">
    <link rel="stylesheet" href="<?=ROOT_URL?>static/css/client/footer/footer-mobile.css">
    <!-- barre de navigation client -->
    <link rel="stylesheet" href="<?=ROOT_URL?>static/css/client/barre-de-navigation/navbar-client-desktop.css">
    <link rel="stylesheet" href="<?=ROOT_URL?>static/css/client/barre-de-navigation/navbar-client-mobile.css">
    <!-- page logement -->
    <link rel="stylesheet" href="<?=ROOT_URL?>static/css/client/logements/logement-desktop.css">
    <link rel="stylesheet" href="<?=ROOT_URL?>static/css/client/logements/logement-mobile.css">
    <!-- page piece -->
    <link rel="stylesheet" href="<?=ROOT_URL?>static/css/client/pieces/card-piece-mobile.css">
    <link rel="stylesheet" href="<?=ROOT_URL?>static/css/client/pieces/card-piece-desktop.css">
    <!-- page capteur -->
    <link rel="stylesheet" href="<?=ROOT_URL?>static/css/client/capteurs/card-capteur-desktop.css">
    <link rel="stylesheet" href="<?=ROOT_URL?>static/css/client/capteurs/card-capteur-mobile.css">
    <!-- page détails du capteur -->
    <link rel="stylesheet" href="<?=ROOT_URL?>static/css/client/details-capteur/details-capteur-desktop.css">
    <link rel="stylesheet" href="<?=ROOT_URL?>static/css/client/details-capteur/details-capteur-mobile.css">
    <!-- modal -->
    <link rel="stylesheet" href="<?=ROOT_URL?>static/css/utils/modal/modal-desktop.css">
    <!-- big modal -->
    <link rel="stylesheet" href="<?=ROOT_URL?>static/css/utils/modal/big-modal-desktop.css">
    <!-- page mention légale -->
    <link rel="stylesheet" href="<?=ROOT_URL?>static/css/client/mention-legale/mention-legale-desktop.css">
    <link rel="stylesheet" href="<?=ROOT_URL?>static/css/client/mention-legale/mention-legale-mobile.css">
    <!-- page profil -->
    <link rel="stylesheet" href="<?=ROOT_URL?>static/css/client/profil/profil.css">
    <!-- page home -->
    <link rel="stylesheet" href="<?=ROOT_URL?>static/css/client/home/home.css">
    <!-- page signin -->
    <link rel="stylesheet" href="<?=ROOT_URL?>static/css/client/signin/signin-desktop.css">
    <!-- page password -->
    <link rel="stylesheet" href="<?=ROOT_URL?>static/css/client/password/password-desktop.css">
    <!-- page ajout de Logement -->
    <link rel="stylesheet" href="<?=ROOT_URL?>static/css/client/addLogement/addLogement-desktop.css">
    <!-- page ajout de Piece -->
    <link rel="stylesheet" href="<?=ROOT_URL?>static/css/client/addPiece/addPiece-desktop.css">
    <!-- page ajout de capteur -->
    <link rel="stylesheet" href="<?=ROOT_URL?>static/css/client/addCapteur/addCapteur-desktop.css">
    <link rel="stylesheet" href="<?=ROOT_URL?>static/css/client/chat.css">
    <link rel="stylesheet" href="<?=ROOT_URL?>static/css/client/faq.css">
    <link rel="stylesheet" href="<?=ROOT_URL?>static/css/client/cgu.css">
    <link rel="stylesheet" href="<?=ROOT_URL?>static/css/client/mentionsLegales.css">
    <!-- Mot de passe oubliée-->
    <link rel="stylesheet" href="<?=ROOT_URL?>static/css/client/motdepasseoublie.css">
    <!-- 404 -->
    <link rel="stylesheet" href="<?=ROOT_URL?>static/css/utils/erreur404.css">

  </head>
  <body id="body">
    <!--Barre de navigation-->
    <header>
      <div id="logo" class="menuUp">
          <ul>
            <li><a href="<?=ROOT_URL?>?Route=client&Ctrl=general&Vue=home" class="logo"><img src="<?=ROOT_URL?>static/image/entreprise/ecosystem-text-logo.png" alt=""></a></li>
            <li>
              <a id="boutonMenu"href="#">
                  <div class="Menu">
                    <div class=""></div>
                    <div class=""></div>
                    <div class=""></div>
                  </div>
              </a>
            </li>
          </ul>
      </div>
      <nav id="menu">
          <ul>
              <li>
                <?php
                if(!isset($_SESSION['id'])) {
                  ?>
                  <a href="<?=ROOT_URL?>?Route=client&Ctrl=general&Vue=home">
                    <img src="<?=ROOT_URL?>static/image/entreprise/ecosystem-text-logo.png" alt="">
                  </a>
                  <?php
                } else {
                  ?>
                  <img src="<?=ROOT_URL?>static/image/entreprise/ecosystem-text-logo.png" width="10%" alt="">
                  <?php
                }
                ?>
              </li>
              <li>
                <?php
                if(isset($_SESSION['id'])) {
                  ?>
                  <a href="<?=ROOT_URL?>?Route=client&Ctrl=profil&Vue=vuePrincipale">
                  Profil
                  </a>
                  <?php
                }
                ?>
              </li>
              <li>
                <?php
                if(isset($_SESSION['id'])) {
                  ?>
                  <a href="<?=ROOT_URL?>?Route=client&Ctrl=logement&Vue=vuePrincipale">
                    Gestion des capteurs
                  </a>
                  <?php
                }
                ?>
              </li>
              <li>
                <?php
                if(isset($_SESSION['id'])) {
                  ?>
                  <a href="<?=ROOT_URL?>?Route=client&Ctrl=signin&Vue=deconnexion">
                    Deconnexion
                  </a>
                  <?php
                }
                ?>
              </li>
              <!-- <li>
                <a href="#" id="ticket-alerte">
                  <img src="<?=ROOT_URL?>/static/image/icon/bell-logo-lp.png" alt="Alerte">
                </a>
              </li> -->
          </ul>
      </nav>
    </header>

    <!--Ticket -->
    <div class="container-modal" id="container-modal-ticket">
      <div class="modal modal-ticket">
        <div class="modal-head">
          <button class="close" id="close-ticket">&times;</button>
          <p>Informations importantes</p>
        </div>
        <div class="modal-text">
          <div class="card-ticket">
              <ul>
                <li>N°122453</li>
                <li>Eco'Light 1</li>
                <li>Il ne va pas bien votre capteur</li>
                <li>11/12/2018</li>
              </ul>
          </div>
        </div>
      </div>
    </div>
