    <!-- Footer -->
    <?php
    if (isset($_SESSION['id'])) {
      ?>
      <footer>
        <ul>
          <li><a href="<?= ROOT_URL ?>?Route=client&Ctrl=mentionsLegales&Vue=mentionsLegales">Mentions légales</a></li>
          <li><a href="<?= ROOT_URL ?>?Route=client&Ctrl=faq&Vue=faq">FAQ</a></li>
          <li><a href="<?= ROOT_URL ?>?Route=client&Ctrl=cgu&Vue=cgu">CGU</a></li>
          <li><a href="#"><img src="<?= ROOT_URL ?>/static/image/icon/fb-logo.png" width="15%" alt="Facebook"></a></li>
          <li><a href="#"><img src="<?= ROOT_URL ?>/static/image/icon/linkedin-logo.png" width="15%" alt="Linkedin"></a></li>
          <li><a href="#"><img src="<?= ROOT_URL ?>/static/image/icon/twitter-logo-lp.png" width="15%" alt="Twitter"></a></li>
          <li><a href="#" id="contact">Contact</a>
            <ul id="dropdown-contact">
              <li>
                <a href="#" id="phone" target="_top">
                  <img src="<?= ROOT_URL ?>/static/image/icon/phone-logo-lp.png" width="10%" alt="01-87-98-04-75">
                </a>
              </li>
              <li>
                <a href="mailto:ecosystem.admin@gmail.com" target="_top">
                  <img src="<?= ROOT_URL ?>/static/image/icon/mail-logo-lp.png" width="10%" alt="domisep@exemple.com">
                </a>
              </li>
              <li>
                <a href="http://maps.google.com/?q=10 rue Vanves, Issy Les Moulineaux 92" target="_blank">
                  <img src="<?= ROOT_URL ?>/static/image/icon/maps-logo-lp.png" width="10%" alt="16 rue des coquelicots">
                </a>
              </li>
            </ul>
          </li>
        </ul>

      </footer>
    <?php
  }
  ?>


    <!--  ajout des scripts JS -->
    <script type="text/javascript" src="<?= ROOT_URL ?>static/js/vendor/jquery-3-3-1.js"></script>
    <!-- logement -->
    <!-- <script type="text/javascript" src="<?= ROOT_URL ?>static/js/client/logement/logement.js"></script> -->
    <!-- navbar -->
    <!-- <script type="text/javascript" src="<?= ROOT_URL ?>static/js/client/barre-de-navigation/navbar-client.js"></script> -->
    <!-- footer -->
    <script type="text/javascript" src="<?= ROOT_URL ?>static/js/client/footer/footer.js"></script>
    <!-- modal -->
    <script type="text/javascript" src="<?= ROOT_URL ?>static/js/utils/modal/modal.js"></script>
    <script type="module" src="<?= ROOT_URL ?>static/js/utils/modal/modal-big.js"></script>
    <!-- détails capteurs-->
    <script type="module" src="<?= ROOT_URL ?>static/js/client/details-capteur/detailsCapteur.js"></script>
    <script src='https://www.google.com/recaptcha/api.js'></script>
    <!-- piece -->
    <script type="module" src="<?= ROOT_URL ?>static/js/client/home/home.js"></script>
    </body>

    </html>