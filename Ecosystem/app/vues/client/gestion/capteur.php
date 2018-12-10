<div class="container-piece-capteurs">
  <div class="container-resume-piece">
    <a href="javascript:history.back()">Retour aux pieces</a>

    <div class="resume-piece">
      <img class="photo-piece" src="<?=ROOT_URL?>/static/image/icon/salon-image.bmp" alt="">
      <div class="description-piece">
        <h4>Salon (16 rue Desnouettes)</h4>
        <p>Type: Salon</p>
        <p>Surface: 30m²</p>
        <p>Etage: 0</p>
      </div>
    </div>

  </div>

  <div class="container-capteurs">

    <div class="card-capteur">
      <div class="card-head">
        <ul>
          <li><h5>Eco'light - 1</h5></li>
          <li>
            <button type="button" name="button" class="button-config-capteur" id="button-config-capteur" onclick="ouvreParemetresLogement()">
              <img src="<?=ROOT_URL?>/static/image/icon/parameters-logo-lp.png" width="100%" alt="">
            </button>
            <nav id="parametres-capteur">
              <ul>
                <li><a href="#">Supprimer</a></li>
                <li><a href="#">Modifier</a></li>
              </ul>
            </nav>
          </li>
        </ul>
      </div>
      <div class="card-body">
        <img src="<?=ROOT_URL?>/static/image/entreprise/eco-light.png" alt="">
      </div>
      <div class="card-banniere">
      </div>
      <div class="card-footer">
        <button type="button" name="button" class="button-go-to-capteur" onclick="goTo()">Plus de détails</button>
      </div>
    </div>

    <div class="card-capteur">
      <div class="card-head">
        <ul>
          <li><h5>Eco'light - 2</h5></li>
          <li>
            <button type="button" name="button" class="button-config-capteur" id="button-config-capteur" onclick="ouvreParemetresLogement()">
              <img src="<?=ROOT_URL?>/static/image/icon/parameters-logo-lp.png" width="100%" alt="">
            </button>
            <nav id="parametres-capteur">
              <ul>
                <li><a href="#">Supprimer</a></li>
                <li><a href="#">Modifier</a></li>
              </ul>
            </nav>
          </li>
        </ul>
      </div>
      <div class="card-body">
        <img src="<?=ROOT_URL?>/static/image/entreprise/eco-light.png" alt="">
      </div>
      <div class="card-banniere">
      </div>
      <div class="card-footer">
        <button type="button" name="button" class="button-go-to-capteur" onclick="goTo()">Plus de détails</button>
      </div>
    </div>

    <button type="button" name="button" id="ajouterCapteur">+</button>
  </div>
</div>

<script type="text/javascript">

  function ouvreParemetresLogement() {
    $("#parametres-capteur").slideToggle("fast");
  }

  function goTo() {
    document.location.href="<?=ROOT_URL?>?Route=client&Ctrl=detailsCapteur&Vue=vuePrincipale";
  }
</script>
