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
      <button type="button" name="button" class="button-go-to-piece" onclick="goTo()">Plus de détails</button>
    </div>
  </div>
  <div class="card-logement">
    <div class="card-head">
      <ul>
        <li><h5>15 rue trinité, 75013 Paris</h5></li>
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
      <button type="button" name="button" class="button-go-to-piece" onclick="goTo()">Plus de détails</button>
    </div>
  </div>
  <div class="card-logement">
    <div class="card-head">
      <ul>
        <li><h5>46 rue balzac, 75006 Paris</h5></li>
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
      <button type="button" name="button" class="button-go-to-piece" onclick="goTo()">Plus de détails</button>
    </div>
  </div>
  <div class="card-logement">
    <div class="card-head">
      <ul>
        <li><h5>578 rue des catacombes, 75007 Paris</h5></li>
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
  <button type="button" name="button" id='ajouterLogement'>+</button>

</div>


<script type="text/javascript">

  function ouvreParemetresLogement() {
    $("#parametres-logement").slideToggle("fast");
  }

  function goTo() {
    document.location.href="<?=ROOT_URL?>?Route=client&Ctrl=piece&Vue=vuePrincipale";
  }
</script>
