<div class="container-logement-pieces">
  <a href="javascript:history.back()">Retour aux logements</a>
  <div class="container-resume-logement">
    <div class="resume-logement">
      <img class="photo-logement" src="<?=ROOT_URL?>/static/image/icon/maison-image.bmp" width="100%" alt="">
      <div class="description-logement">
        <h4>16 rue Desnouettes, Paris 75015</h4>
        <p>Surface: 110m²</p>
        <p>Habitants: 3</p>
        <p>Diagnostique énergétique: E</p>
        <p>Année de construction: 1996</p>
        <p>Nombre totale de pièces: 8</p>
      </div>
    </div>

  </div>
  <div class="container-pieces">

    <div class="card-piece">
      <div class="card-head">
        <ul>
          <li><h5>Salon</h5></li>
          <li>
            <button type="button" name="button" class="button-config-piece" id="button-config-piece" onclick="ouvreParemetresLogement()">
              <img src="<?=ROOT_URL?>/static/image/icon/parameters-logo-lp.png" width="100%" alt="">
            </button>
            <nav id="parametres-piece">
              <ul>
                <li><a href="#" id="supprimerPiece">Supprimer</a></li>
                <li><a href="#">Modifier</a></li>
              </ul>
            </nav>
          </li>
        </ul>
      </div>
      <div class="card-body">
        <img src="<?=ROOT_URL?>/static/image/icon/salon-image.bmp" width="100%" alt="">
      </div>
      <div class="card-banniere">
      </div>
      <div class="card-footer">
        <button type="button" name="button" class="button-go-to-capteur" id="goToPiece">Plus de détails</button>
      </div>
    </div>

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
                <li><a href="#" id="supprimerPiece">Supprimer</a></li>
                <li><a href="#">Modifier</a></li>
              </ul>
            </nav>
          </li>
        </ul>
      </div>
      <div class="card-body">
        <img src="<?=ROOT_URL?>/static/image/icon/cuisine-image.bmp" width="100%" alt="">
      </div>
      <div class="card-banniere">
      </div>
      <div class="card-footer">
        <button type="button" name="button" class="button-go-to-capteur" id="goToPiece">Plus de détails</button>
      </div>
    </div>

    <div class="card-piece">
      <div class="card-head">
        <ul>
          <li><h5>Véranda</h5></li>
          <li>
            <button type="button" name="button" class="button-config-piece" id="button-config-piece" onclick="ouvreParemetresLogement()">
              <img src="<?=ROOT_URL?>/static/image/icon/parameters-logo-lp.png" width="100%" alt="">
            </button>
            <nav id="parametres-piece">
              <ul>
                <li><a href="#" id="supprimerPiece">Supprimer</a></li>
                <li><a href="#">Modifier</a></li>
              </ul>
            </nav>
          </li>
        </ul>
      </div>
      <div class="card-body">
        <img src="<?=ROOT_URL?>/static/image/icon/veranda-image.bmp" width="100%" alt="">
      </div>
      <div class="card-banniere">
      </div>
      <div class="card-footer">
        <button type="button" name="button" class="button-go-to-capteur" id="goToPiece">Plus de détails</button>
      </div>
    </div>

    <div class="card-piece">
      <div class="card-head">
        <ul>
          <li><h5>Chambre 1</h5></li>
          <li>
            <button type="button" name="button" class="button-config-piece" id="button-config-piece" onclick="ouvreParemetresLogement()">
              <img src="<?=ROOT_URL?>/static/image/icon/parameters-logo-lp.png" width="100%" alt="">
            </button>
            <nav id="parametres-piece">
              <ul>
                <li><a href="#" id="supprimerPiece">Supprimer</a></li>
                <li><a href="#">Modifier</a></li>
              </ul>
            </nav>
          </li>
        </ul>
      </div>
      <div class="card-body">
        <img src="<?=ROOT_URL?>/static/image/icon/chambre-image.bmp" width="100%" alt="">
      </div>
      <div class="card-banniere">
      </div>
      <div class="card-footer">
        <button type="button" name="button" class="button-go-to-capteur" id="goToPiece">Plus de détails</button>
      </div>
    </div>

    <div class="card-piece">
      <div class="card-head">
        <ul>
          <li><h5>Salle de bain</h5></li>
          <li>
            <button type="button" name="button" class="button-config-piece" id="button-config-piece" onclick="ouvreParemetresLogement()">
              <img src="<?=ROOT_URL?>/static/image/icon/parameters-logo-lp.png" width="100%" alt="">
            </button>
            <nav id="parametres-piece">
              <ul>
                <li><a href="#" id="supprimerPiece">Supprimer</a></li>
                <li><a href="#">Modifier</a></li>
              </ul>
            </nav>
          </li>
        </ul>
      </div>
      <div class="card-body">
        <img src="<?=ROOT_URL?>/static/image/icon/salle-de-bain-image.bmp" width="100%" alt="">
      </div>
      <div class="card-banniere">
      </div>
      <div class="card-footer">
        <button type="button" name="button" class="button-go-to-capteur" id="goToPiece">Plus de détails</button>
      </div>
    </div>

    <button type="button" name="button" id="ajouterPiece">+</button>
  </div>
</div>

<div class="container-modal" id="container-modal-supprimer">
  <div class="modal modal-supprimer">
    <div class="modal-head">
      <button class="close" id="close-supprimer">&times;</button>
      <p>Etes-vous sûr de vouloir supprimer cette piece?</p>
    </div>
    <div class="modal-text">
      <form class="" action="#" method="post">
        <div class="form-group">
          <label for="code_postal">Rentrer le type de la piece<br></label>
          <input type="text" name="code_postal" value="">
        </div>
        <button type="submit" name="button" clas="supprimerLogement">Valider</button>
      </form>
    </div>
  </div>
</div>
