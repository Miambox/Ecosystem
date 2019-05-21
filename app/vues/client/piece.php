<div class="container-logement-pieces">

  <div class="container-resume-logement">

    <?php if (isset($information_logement)) {
      foreach ($information_logement as $key => $value) {
        ?>
        <div class="resume-logement">
          <div class="description-logement">
            <h3>
              <?= $value['numero'] ?> rue
              <?= $value['rue'] ?>,
              <?= $value['code_postal'] ?>
              <?= $value['ville'] ?>
            </h3>
            <?php if (isset($value['complement_adresse'])) {
              ?>
              <p>Complément d'adresse: <?= $value['complement_adresse'] ?></p>
            <?php
          } ?>
            <p>Surface: <?= $value['surface'] ?></p>
            <p>Habitants: <?= $value['nbr_habitant'] ?></p>
            <?php if (isset($value['annee_construction']) && $value['annee_construction'] != 0) {
              ?>
              <p>Année de construction: <?= $value['annee_construction'] ?></p>
            <?php
          } ?>
            <form class="" action="?Route=client&Ctrl=logement&Vue=vuePrincipale" method="post">
              <input type="hidden" name="id_piece" value="<?= $value['id'] ?>">
              <button class="back" type="submit">Retour</button>
            </form>
          </div>
        </div>
      <?php
    }
  } ?>

  </div>

  <div class="container-pieces">
    <?php
    if (isset($liste_piece)) {
      foreach ($liste_piece as $key => $value) {
        ?>
        <div class="card-piece">
          <div class="card-head">
            <div><?php echo $value['nom'] ?></div>
            <!--POP up suppression-->
            <div class="container-modal" id="container-modal-supprimer<?= $value[0] ?>">
              <div class="modal modal-supprimer">
                <div class="modal-head">
                  <button class="close" onclick="closeDeletePopup(<?= $value[0] ?>)">&times;</button>
                  <p>Etes-vous sûr de vouloir supprimer cette piece?</p>
                </div>
                <div class="modal-text">
                  <form class="" action="?Route=client&Ctrl=piece&Vue=supprimerPiece" method="post">
                    <div class="form-group">
                      <label for="code_postal">Rentrer le type de la piece<br></label>
                      <input type="text" name="type" value="" required>
                      <input type="hidden" name="id_piece" value="<?= $value[0] ?>">
                      <input type="hidden" name="id_logement" value="<?= $value['id_logement'] ?>">
                    </div>
                    <button type="submit" name="button" class="supprimerLogement">Valider</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <div class="card-body">
            <form class="" action="?Route=client&Ctrl=capteur&Vue=vuePrincipale" method="post">
              <input type="hidden" name="id_piece" value="<?= $value[0] ?>">
              <input type="hidden" name="id_logement" value="<?= $id_logement ?>">
              <button type="submit" class="piece-direction">
                <img src="<?= ROOT_URL ?>/static/image/entreprise/piece.png" width="100%" alt="">
              </button>
            </form>
          </div>
          <div class="card-banniere">
          </div>
          <div class="card-footer">
            <a href="#" onclick="openDeletePopup(<?= $value[0] ?>)">
              Supprimer
            </a>
            <form class="" action="?Route=client&Ctrl=piece&Vue=editerPiece" method="post">
              <input type="hidden" name="id_piece" value="<?= $value[0] ?>">
              <input type="hidden" name="id_logement" value="<?= $value['id_logement'] ?>">
              <input type="submit" name="" value="Modifier">
            </form>
          </div>
        </div>
      <?php
    }
  }
  ?>
  </div>
</div>