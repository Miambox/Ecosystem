<div class="container-logements">
  <div class="card-logement">
    <div class="card-head">
      <ul>
        <li><h5>16 rue Desnouettes, Paris 75015</h5></li>
        <li>
          <button type="button" name="button" class="button-config-logement" id="button-config" onclick="ouvreParemetresLogement()">
            <img src="<?=ROOT_URL?>/static/image/icon/parameters-logo-lp.png" width="100%" alt="">
          </button>
          <nav id="parametres-logement">
            <ul>
              <li><a href="#">Supprimer</a></li>
              <li><a href="#">Modifier</a></li>
              <li><a href="#">Partager</a></li>
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
      <button type="button" name="button" class="button-go-to-piece" onclick="goTo()">Détails</button>
    </div>
  </div>
</div>

<script type="text/javascript">

  function ouvreParemetresLogement() {
    $("#parametres-logement").slideToggle("fast");
  }

  function goTo() {
    document.location.href="<?=ROOT_URL?>?Route=client&Ctrl=ControleurClient&Vue=gestionPieces";
  }
</script>
