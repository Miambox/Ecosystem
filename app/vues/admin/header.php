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
                <form class="" action="index.html" method="post">
                  <div id="searchbar-mobile" class="searchbar">
                    <input type="search" name="search" id="search-mobile" placeholder="Rentrez le nom du client ...">
                    <a href="<?=ROOT_URL?>">
                      <img src="<?=ROOT_URL?>static/image/icon/search2-logo-grey-lp.png" alt="">
                    </a>
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
              <li><a href="<?=ROOT_URL?>?Route=admin&Ctrl=client&Vue=logement"><img src="<?=ROOT_URL?>static/image/entreprise/ecosystem-text-logo.png" alt=""></a></li>
              <li>
                  <a href="#" id="dropdown-contact">
                    Chat
                  </a>
              </li>
              <li>
                <div class="container-searchbar">
                  <form class="" action="index.html" method="post">
                    <div id="searchbar-desktop" class="searchbar">
                      <input type="search" name="search" id="search-desktop" placeholder="Rentrez le nom du client ...">
                      <a href="<?=ROOT_URL?>">
                        <img src="<?=ROOT_URL?>static/image/icon/search2-logo-grey-lp.png" alt="">
                      </a>
                    </div>
                  </form>
                </div>
              </li>
              <li>
                <a href="#" id="ticket-alerte">
                  <img src="<?=ROOT_URL?>/static/image/icon/bell-logo-lp.png" alt="Alerte">
                </a>
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
