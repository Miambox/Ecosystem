<div class="container-logement-pieces">

  <div class="container-resume-logement">
    <?php if(isset($information_logement)) {
      foreach ($information_logement as $key => $value) {
        ?>
          <form class="" action="?Route=client&Ctrl=logement&Vue=vuePrincipale" method="post">
            <input type="submit" name="" value="Retour aux logements">
          </form>
          <div class="resume-logement">
            <img class="photo-logement" src="<?=ROOT_URL?>/static/image/icon/isep.jpg" width="100%" alt="">
            <div class="description-logement">
              <h4>
                <?= $value['numero'] ?> rue
                <?= $value['rue'] ?>,
                <?= $value['code_postal'] ?>
                <?= $value['ville'] ?>
              </h4>
              <?php if(isset($value['complement_adresse'])) {
                ?>
                <p>Complément d'adresse: <?= $value['complement_adresse'] ?></p>
                <?php
              } ?>
              <p>Surface: <?= $value['surface']?></p>
              <p>Habitants: <?= $value['nbr_habitant'] ?></p>
              <?php if(isset($value['annee_construction']) && $value['annee_construction']!=0 ) {
                ?>
                <p>Année de construction: <?= $value['annee_construction'] ?></p>
                <?php
              } ?>
            </div>
          </div>
        <?php
      }
    } ?>

  </div>

  <div class="container-pieces">
    <?php
    if(isset($liste_piece)) {
      foreach ($liste_piece as $key => $value) {
      ?>
      <div class="card-piece">
        <div class="card-head">
          <ul>
            <li><h5><?php echo $value['nom'] ?></h5></li>
            <li>
              <nav id="parametres-piece">
                <ul>
                  <li>
                    <a href="#" onclick="openDeletePopup(<?= $value[0]?>)">
                      Supprimer
                    </a>
                  </li>
                  <li>
                    <form class="" action="?Route=client&Ctrl=piece&Vue=editerPiece" method="post">
                      <input type="hidden" name="id_piece" value="<?= $value[0]?>">
                      <input type="hidden" name="id_logement" value="<?= $value['id_logement'] ?>">
                      <input type="submit" name="" value="Modifier">
                    </form>
                  </li>
                </ul>
              </nav>

              <!--POP up suppression-->
              <div class="container-modal" id="container-modal-supprimer<?= $value[0]?>">
                <div class="modal modal-supprimer">
                  <div class="modal-head">
                    <button class="close" onclick="closeDeletePopup(<?= $value[0]?>)">&times;</button>
                    <p>Etes-vous sûr de vouloir supprimer cette piece?</p>
                  </div>
                  <div class="modal-text">
                    <form class="" action="?Route=client&Ctrl=piece&Vue=supprimerPiece" method="post">
                      <div class="form-group">
                        <label for="code_postal">Rentrer le type de la piece<br></label>
                        <input type="text" name="type" value="" required>
                        <input type="hidden" name="id_piece" value="<?=$value[0] ?>">
                        <input type="hidden" name="id_logement" value="<?= $value['id_logement'] ?>">
                      </div>
                      <button type="submit" name="button" class="supprimerLogement">Valider</button>
                    </form>
                  </div>
                </div>
              </div>

            </li>
          </ul>
        </div>
        <div class="card-body">
          <img src="<?=ROOT_URL?>/static/image/icon/piece.jpg" width="100%" alt="">
        </div>
        <div class="card-banniere">
        </div>
        <div class="card-footer">
          <form class="" action="?Route=client&Ctrl=capteur&Vue=vuePrincipale" method="post">
            <input type="hidden" name="id_piece" value="<?= $value[0] ?>">
            <input type="hidden" name="id_logement" value="<?= $id_logement ?>">
            <input type="submit" name="" value="Les capteurs..">
          </form>
        </div>
      </div>
      <?php
      }
    }
    ?>
    <form class="" action="?Route=client&Ctrl=piece&Vue=addPiece" method="post">
      <input type="hidden" name="id_logement" value="<?= $id_logement ?>">
      <input type="submit" name="" value="Ajouter une pièce">
    </form>
  </div>
</div>
