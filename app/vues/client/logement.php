<div class="container-logements">
  <?php
  if(isset($liste_logement)) {
      foreach($liste_logement as $key => $value) {
  ?>
    <div class="card-logement">
      <div class="card-head">
        <ul>
          <li>
            <h5>
              <?php
                echo ($value['numero'] . " rue " . $value['rue'] . " " . $value['code_postal'] . " " . $value['ville']);
              ?>
            </h5>
          </li>
          <li>
            <button type="button" name="button" class="button-config-logement" id="button-config">
              <img src="<?=ROOT_URL?>/static/image/icon/parameters-logo-lp.png" width="100%" alt="">
            </button>
            <nav id="parametres-logement">
              <ul>
                <li>
                  <a href="#" id="supprimerLogement">
                  Supprimer
                  </a>
                </li>
                <li><a href="#" id="ajouterPartage">Partager</a></li>
              </ul>
            </nav>
            <div class="container-modal" id="container-modal-supprimer">
              <div class="modal modal-supprimer">
                <div class="modal-head">
                  <button class="close" id="close-supprimer">&times;</button>
                  <p>Etes-vous sûr de vouloir supprimer ce logement ?</p>
                </div>
                <div class="modal-text">
                  <form class="" action="?Route=client&Ctrl=logement&Vue=supprimerLogement" method="post">
                    <div class="form-group">
                      <label for="code_postal">Rentrer le code postal du logement<br></label>
                      <input type="number" name="code_postal" placeholder="codePostal">
                      <input type="hidden" name="logement_id" value="<?php echo $value['id'] ?>">
                    </div>
                    <button type="submit" name="" class="supprimerLogement">Valider</button>
                  </form>
                </div>
              </div>
            </div>
          </li>
        </ul>
      </div>
      <div class="card-body">
        <img src="<?=ROOT_URL?>/static/image/icon/isep.jpg" width="100%" alt="">
      </div>
      <div class="card-banniere">
      </div>
      <div class="card-footer">
        <form class="" action="?Route=client&Ctrl=piece&Vue=vuePrincipale" method="post">
          <input type="hidden" name="id_logement" value="<?php echo $value['id'] ?>">
          <input type="submit" name="" value="Plus de détail">
        </form>
      </div>
    </div>
  <?php
      }
  }
  ?>
  <button type="button" name="button" id='ajouterLogement'></button>

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
