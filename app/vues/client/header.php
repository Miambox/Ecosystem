<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <!-- Ajout des fichiers CSS -->
    <!-- base -->
    <link rel="stylesheet" href="<?=ROOT_URL?>static/css/client/body.css">
    <!-- login -->
    <link rel="stylesheet" href="<?=ROOT_URL?>static/css/client/login/login-desktop.css">
    <link rel="stylesheet" href="<?=ROOT_URL?>static/css/client/login/login-mobile.css">
    <!-- footer -->
    <link rel="stylesheet" href="<?=ROOT_URL?>static/css/client/footer/footer-desktop.css">
    <!-- barre de navigation client -->
    <link rel="stylesheet" href="<?=ROOT_URL?>static/css/client/barre-de-navigation/navbar-client-desktop.css">
    <link rel="stylesheet" href="<?=ROOT_URL?>static/css/client/barre-de-navigation/navbar-client-mobile.css">
    <!-- page logement -->
    <link rel="stylesheet" href="<?=ROOT_URL?>static/css/client/logements/card-logement-desktop.css">
    <link rel="stylesheet" href="<?=ROOT_URL?>static/css/client/logements/card-logement-mobile.css">
    <!-- page piece -->
    <link rel="stylesheet" href="<?=ROOT_URL?>static/css/client/pieces/card-piece-mobile.css">
    <link rel="stylesheet" href="<?=ROOT_URL?>static/css/client/pieces/card-piece-desktop.css">
    <!-- page capteur -->
    <link rel="stylesheet" href="<?=ROOT_URL?>static/css/client/capteurs/card-capteur-desktop.css">
    <!-- page détails du capteur -->
    <link rel="stylesheet" href="<?=ROOT_URL?>static/css/client/details-capteur/detailsCapteur.css">
    <!-- modal -->
    <link rel="stylesheet" href="<?=ROOT_URL?>static/css/utils/modal/modal-desktop.css">
    <!-- big modal -->
    <link rel="stylesheet" href="<?=ROOT_URL?>static/css/utils/modal/big-modal-desktop.css">
    <!-- page mention légale -->
    <link rel="stylesheet" href="<?=ROOT_URL?>static/css/client/mention-legale/mention-legale-desktop.css">
    <link rel="stylesheet" href="<?=ROOT_URL?>static/css/client/mention-legale/mention-legale-mobile.css">
    <link rel="stylesheet" href="<?=ROOT_URL?>static/css/client/profil/profil.css">
    <link rel="stylesheet" href="<?=ROOT_URL?>static/css/client/home/home.css">
  </head>
  <body>
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
              <li><a href="<?=ROOT_URL?>?Route=client&Ctrl=general&Vue=home"><img src="<?=ROOT_URL?>static/image/entreprise/ecosystem-text-logo.png" alt=""></a></li>
              <li><a href="<?=ROOT_URL?>?Route=client&Ctrl=profil&Vue=vuePrincipale"> Profil </a></li>
              <li><a href="<?=ROOT_URL?>?Route=client&Ctrl=logement&Vue=vuePrincipale">Gestion des capteurs</a></li>
              <li><a href="#">Connexion</a></li>
          </ul>
      </nav>
    </header>
