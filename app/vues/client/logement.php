<div class="container-logements">
  <?php  foreach($liste_logement as $key => $value) {
  ?>
    <div class="card-logement">
      <div class="card-head">
        <ul>
          <li>
            <h5>
              <?php
                echo ($value['numero'] . " " . $value['rue'] . " " . $value['codePostal'] . " " . $value['ville']); 
              ?>
            </h5>
          </li>
          <li>
            <button type="button" name="button" class="button-config-logement" id="button-config">
              <img src="<?=ROOT_URL?>/static/image/icon/parameters-logo-lp.png" width="100%" alt="">
            </button>
            <nav id="parametres-logement">
              <ul>
                <li><a href="#" id="supprimerLogement">Supprimer</a></li>
                <li><a href="#" id="ajouterPartage">Partager</a></li>
              </ul>
            </nav>
          </li>
        </ul>
      </div>
      <div class="card-body">
        <img src="<?=ROOT_URL?>/static/image/icon/isep.jpg" width="100%" alt="">
      </div>
      <div class="card-banniere">
      </div>
      <div class="card-footer">
        <button type="button" name="button" class="button-go-to-piece" id="goTo">Plus de détails</button>
      </div>
    </div>
  <?php
  }
  ?>
  <button type="button" name="button" id='ajouterLogement'>+</button>

</div>

<div class="container-modal" id="container-modal-partage">
  <div class="modal modal-partage">
    <div class="modal-head">
      <button class="close" id="close-partage">&times;</button>
      <p>Partager votre logement</p>
    </div>
    <div class="modal-text">
      <form class="" action="#" method="post">
        <div class="form-group">
          <label for="numero_utilisateur">Numéro utilisateur<a href="#">?</a></label>
          <input type="text" name="numero_utilisateur" value="">
        </div>
        <div class="form-group">
          <label for="nom_utilisateur">Nom</label>
          <input type="text" name="" value="">
        </div>
        <div class="form-group">
          <label for="prenom_utilisateur">Prénom</label>
          <input type="text" name="prenom_utilisateur" value="">
        </div>
        <button type="submit" name="button" clas="ajouterpartage">Valider</button>
      </form>
    </div>
  </div>
</div>

<div class="container-modal" id="container-modal-supprimer">
  <div class="modal modal-supprimer">
    <div class="modal-head">
      <button class="close" id="close-supprimer">&times;</button>
      <p>Etes-vous sûr de vouloir supprimer ce logement ?</p>
    </div>
    <div class="modal-text">
      <form class="" action="#" method="post">
        <div class="form-group">
          <label for="code_postal">Rentrer le code postal du logement<br></label>
          <input type="number" name="code_postal" value="">
        </div>
        <button type="submit" name="button" clas="supprimerLogement">Valider</button>
      </form>
    </div>
  </div>
</div>
