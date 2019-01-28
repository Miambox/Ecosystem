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
            <nav>
              <ul>
                <li>
                  <a href="#" onclick="openDeletePopup(<?= $value[0] ?>)">
                  Supprimer
                  </a>
                </li>
                <li>
                  <a href="#" onclick="openSharePopup(<?=$value[0]?>)">
                    Partager
                  </a>
                </li>
                <li>
                  <form class="" action="?Route=client&Ctrl=logement&Vue=editerLogement" method="post">
                    <input type="hidden" name="id_logement" value="<?= $value['id'] ?>">
                    <input type="submit" name="" value="Modifer">
                  </form>
                </li>
              </ul>
            </nav>
            <!--POP up de suppression-->
            <div class="container-modal" id="container-modal-supprimer<?=$value[0]?>">
              <div class="modal modal-supprimer">
                <div class="modal-head">
                  <button class="close" onclick="closeDeletePopup(<?=$value[0]?>)">&times;</button>
                  <p>Etes-vous sûr de vouloir supprimer ce logement ?</p>
                </div>
                <div class="modal-text">
                  <form class="" action="?Route=client&Ctrl=logement&Vue=supprimerLogement" method="post">
                    <div class="form-group">
                      <label for="code_postal">Rentrer le code postal du logement<br></label>
                      <input type="number" name="code_postal" placeholder="codePostal" required>
                      <input type="hidden" name="logement_id" value="<?php echo $value[0] ?>">
                    </div>
                    <button type="submit" name="" class="supprimerLogement">Valider</button>
                  </form>
                </div>
              </div>
            </div>

            <!--POP up de partager-->
            <div class="container-modal" id="container-modal-partage<?=$value[0]?>">
              <div class="modal modal-partage">
                <div class="modal-head">
                  <button class="close" onclick="closeSharePopup(<?=$value[0]?>)">&times;</button>
                  <p>Partager votre logement</p>
                </div>
                <div class="modal-text">
                  <form class="" action="?Route=client&Ctrl=logement&Vue=partageLogement" method="post">
                    <div class="form-group">
                      <label for="nom_utilisateur">Nom</label>
                      <input type="text" name="nom" value="" required>
                    </div>
                    <div class="form-group">
                      <label for="prenom_utilisateur">Prénom</label>
                      <input type="text" name="prenom" value="" required>
                    </div>
                    <div class="form-group">
                      <label for="prenom_utilisateur">mail</label>
                      <input type="text" name="mail" value="" required>
                    </div>
                    <input type="hidden" name="id_logement" value="<?= $value[0] ?>">
                    <button type="submit" name="button" class="ajouterpartage">Valider</button>
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
          <input type="submit" name="" value="Les pièces..">
        </form>
      </div>
    </div>
  <?php
      }
  }
  ?>
  <form class="" action="?Route=client&Ctrl=logement&Vue=addLogement" method="post">
    <input type="submit" name="" value="Ajouter un logement">
  </form>
</div>
