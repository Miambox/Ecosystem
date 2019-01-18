<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <!-- body -->
    <link rel="stylesheet" href="<?=ROOT_URL?>static/css/admin/body.css">
    <!-- Barre de navigation -->
    <link rel="stylesheet" href="<?=ROOT_URL?>static/css/admin/barre-de-navigation/navbar-admin-desktop.css">
    <link rel="stylesheet" href="<?=ROOT_URL?>static/css/admin/barre-de-navigation/navbar-admin-mobile.css">
    <link rel="stylesheet" href="<?=ROOT_URL?>static/css/utils/modal/modal-desktop.css">
    <link rel="stylesheet" href="<?=ROOT_URL?>static/css/admin/clientProfil.css">
    <link rel="stylesheet" href="<?=ROOT_URL?>static/css/admin/detailsCapteur.css">
    <link rel="stylesheet" href="<?=ROOT_URL?>static/css/admin/general.css">
     <link rel="stylesheet" href="<?=ROOT_URL?>static/css/admin/faq.css">
    <link rel="stylesheet" href="<?=ROOT_URL?>static/css/admin/listeClient.css">
    <link rel="stylesheet" href="<?=ROOT_URL?>static/css/admin/droit.css">
    <link rel="stylesheet" href="<?=ROOT_URL?>static/css/utils/erreur404.css">
    <link rel="stylesheet" href="<?=ROOT_URL?>static/css/admin/mentionsLegales.css">

    <title>Eco'system - admin</title>
  </head>
  <body id="body">
    <header>
      <div id="logo" class="menuUp">
          <ul>
            <li>
              <a id="boutonMenu"href="#">
                  <div class="Menu">
                    <div class=""></div>
                    <div class=""></div>
                    <div class=""></div>
                  </div>
              </a>
            </li>
            <li>
                <form autocomplete="off" action="?Route=admin&Ctrl=general&Vue=listeClient" method="post">
                  <div id="searchbar-mobile" class="searchbar">
                    <input type="search" name="search" id="search-mobile" placeholder="Rentrez le nom du client ...">
                    <input type="submit">
                    <!-- <a href="?Route=admin&Ctrl=general&Vue=listeClient.php">
                      <img src="<?=ROOT_URL?>static/image/icon/search2-logo-grey-lp.png" alt="">
                    </a> -->
                  </div>
                </form>
            </li>
            <li>
              <a href="#" id="dropdown-parameters"><img src="<?=ROOT_URL?>static/image/icon/parameters-logo-lp.png" alt=""></a>
              <nav>
                  <ul>
                      <li><a href="#">Connexion</a></li>
                      <li><a href="#">Paramètres</a></li>
                  </ul>
              </nav>
            </li>
          </ul>
      </div>
      <nav>
          <ul>
              <li><a href="<?=ROOT_URL?>?Route=admin&Ctrl=general&Vue=general"><img src="<?=ROOT_URL?>static/image/entreprise/ecosystem-text-logo.png" alt=""></a></li>
              <li>
                <?php
                echo($_SESSION['user']['id']);
                if($_SESSION['user']['type'] == "administrateur") {
                  ?>
                  <a href="?Route=admin&Ctrl=droit&Vue=vuePrincipale">
                    Gérer les droits
                  <a href="<?=ROOT_URL?>?Route=admin&Ctrl=client&Vue=chatbis">
                    Chat
                  </a>
                  <?php
                }
                ?>
              </li>
              <li>
                <div class="container-searchbar">
                  <form autocomplete="off" action="?Route=admin&Ctrl=general&Vue=listeClient" method="post">
                    <div id="searchbar-desktop" class="searchbar">
                      <input type="search" name="nomClient" id="search-desktop" placeholder="Rentrez le nom du client ...">
                      <input type="image" value="Submit" id="loupe" src="<?=ROOT_URL?>/static/image/icon/search-logo-lp.png">
                    </div>
                  </form>
                </div>
              </li>
              <li>
                <?php if(isset($_SESSION['id'])) {
                  ?>
                  <a href="?Route=client&Ctrl=signin&Vue=deconnexion" >
                    Deconnexion
                  </a>
                  <?php
                } ?>
                <!-- <a href="#" id="ticket-alerte">
                  <img src="<?=ROOT_URL?>/static/image/icon/bell-logo-lp.png" alt="Alerte">
                </a> -->
              </li>
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
