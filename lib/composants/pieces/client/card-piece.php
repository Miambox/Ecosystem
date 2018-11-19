<div class="container-logement-pieces">
  <div class="container-resume-logement">
    <div class="resume-logement">
      <div class="photo-logement">

      </div>
      <div class="description-logement">
        <h4>16 rue Desnouettes, Paris 75015</h4>
        <p></p>
      </div>
    </div>

  </div>
  <div class="container-pieces">

    <div class="card-piece">
      <div class="card-head">
        <ul>
          <li><h5>Cuisine</h5></li>
          <li>
            <button type="button" name="button" class="button-config-piece" id="button-config-piece" onclick="ouvreParemetresLogement()">
              <img src="<?=ROOT_URL?>/static/image/icon/parameters-logo-lp.png" width="100%" alt="">
            </button>
            <nav id="parametres-piece">
              <ul>
                <li><a href="#">Supprimer</a></li>
                <li><a href="#">Modifier</a></li>
              </ul>
            </nav>
          </li>
        </ul>
      </div>
      <div class="card-body">
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
    $("#parametres-piece").slideToggle("fast");
  }

  function goTo() {
    document.location.href="<?=ROOT_URL?>?Route=client&Ctrl=ControleurClient&Vue=gestionCapteurs";
  }
</script>
