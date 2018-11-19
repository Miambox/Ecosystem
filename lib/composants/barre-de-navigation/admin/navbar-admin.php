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
          <li><a href="#"><img src="<?=ROOT_URL?>static/image/entreprise/ecosystem-text-logo.png" alt=""></a></li>
          <li><a href="#">Profil</a></li>
          <li><a href="#">Interface administrateur</a></li>
          <li>
              <a href="#" id="dropdown-contact">Service de contact<span class="toggle">Expand</span><span class="caret"></span></a>
              <nav>
                  <ul>
                      <li><a href="#">Chat</a></li>
                      <li><a href="#">Appel téléphonique</a></li>
                      <li><a href="#">Email</a></li>
                  </ul>
              </nav>
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
            <a href="#" id="dropdown-parameters-desktop"><img src="<?=ROOT_URL?>static/image/icon/parameters-logo-lp.png" alt=""></a>
            <nav>
                <ul>
                    <li><a href="#">Connexion</a></li>
                    <li><a href="#">Paramètres</a></li>
                </ul>
            </nav>
          </li>
      </ul>
  </nav>
</header>
