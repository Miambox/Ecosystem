<div class="container-piece-capteurs">
  <div class="container-resume-piece">
    <a href="javascript:history.back()">Retour aux pieces</a>

    <div class="resume-piece">
      <img class="photo-piece" src="<?=ROOT_URL?>/static/image/icon/cours-isep.jpg" alt="">
      <div class="description-piece">
        <h4>Amphithéatre</h4>
        <p>Type: Amphithéatre</p>
        <p>Surface: 60m²</p>
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
                <li><a href="#" onclick="supprimer()">Supprimer</a></li>
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
                <li><a href="#" onclick="supprimer()">Supprimer</a></li>
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

    <button type="button" name="button" onclick="ajouterCapteur()">+</button>
  </div>
</div>

<div class="container-modal" id="container-modal-supprimer">
  <div class="modal modal-supprimer">
    <div class="modal-head">
      <button class="close" id="close-supprimer">&times;</button>
      <p>Etes-vous sûr de vouloir supprimer ce capteur?</p>
    </div>
    <div class="modal-text">
      <form class="" action="#" method="post">
        <div class="form-group">
          <label for="code_postal">Rentrer le nom de la piece<br></label>
          <input type="text" name="code_postal" value="">
        </div>
        <button type="submit" name="button" class="supprimerLogement">Valider</button>
      </form>
    </div>
  </div>
</div>

<script type="text/javascript">
  function modal(modal, close) {
    modal.css("display", "block");

    close.click(function(e) {
      modal.css("display", "none");
    });
    window.onclick = function(event) {
      if (event.target == modal) {
          modal.css("display", "none");
      }
    };
  }

  function ouvreParemetresLogement() {
    $("#parametres-capteur").slideToggle("fast");
  }

  function goTo() {
    document.location.href="<?=ROOT_URL?>?Route=client&Ctrl=capteur&Vue=details";
  }

  function ajouterCapteur() {
    document.location.href="<?=ROOT_URL?>?Route=client&Ctrl=capteur&Vue=addCapteur";
  }

  function supprimer() {
    console.log("supprimer mon logement");
    $("#parametres-logement").slideToggle("fast");
    var containerModal = $("#container-modal-supprimer");
    var close = $("#close-supprimer");
    modal(containerModal, close);
  }
</script>
