<div class="container-piece-capteurs">

  <div class="container-resume-piece">
    <div class="resume-piece">
      <div class="photo-piece">

      </div>
      <div class="description-piece">
        <h4>Véranda (16 rue Desnouettes)</h4>
        <p>Type: Véranda</p>
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
        <button type="button" name="button" class="button-go-to-capteur" onclick="goTo()">Détails</button>
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
        <button type="button" name="button" class="button-go-to-capteur" onclick="goTo()">Détails</button>
      </div>
    </div>


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
