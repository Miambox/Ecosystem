<div class="container-logements">
  <?php
  if (isset($liste_logement)) {
    foreach ($liste_logement as $key => $value) {
      ?>
      <div class="card-logement">
        <div class="card-head">
          <div class="home-information">
            <?php
            echo ($value['numero'] . " rue " . $value['rue'] . " " . $value['code_postal'] . " " . $value['ville']);
            ?>
          </div>
          <!--POP up de suppression-->
          <div class="container-modal" id="container-modal-supprimer<?= $value[0] ?>">
            <div class="modal modal-supprimer">
              <div class="modal-head">
                <button class="close" onclick="closeDeletePopup(<?= $value[0] ?>)">&times;</button>
                <p>Etes-vous sûr de vouloir supprimer ce logement ?</p>
              </div>
              <div class="modal-text">
                <form class="" action="?Route=client&Ctrl=logement&Vue=supprimerLogement" method="post">
                  <div class="form-group">
                    <label for="code_postal">Rentrer le code postal du logement<br></label>
                    <input type="number" name="code_postal" placeholder="Code postal" required>
                    <input type="hidden" name="logement_id" value="<?php echo $value[0] ?>">
                  </div>
                  <button type="submit" name="" class="supprimerLogement">Valider</button>
                </form>
              </div>
            </div>
          </div>

          <!--POP up de partager-->
          <div class="container-modal" id="container-modal-partage<?= $value[0] ?>">
            <div class="modal modal-partage">
              <div class="modal-head">
                <button class="close" onclick="closeSharePopup(<?= $value[0] ?>)">&times;</button>
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
        <form class="card-body" action="?Route=client&Ctrl=piece&Vue=vuePrincipale" method="post">
          <input type="hidden" name="id_logement" value="<?php echo $value['id'] ?>">
          <button type="submit" class="piece-direction">
            <img src="<?= ROOT_URL ?>/static/image/entreprise/home.png" width="100%" alt="">
          </button>
        </form>
        <div class="card-footer">
          <a href="#" onclick="openDeletePopup(<?= $value[0] ?>)">
            Supprimer
          </a>
          <a href="#" onclick="openSharePopup(<?= $value[0] ?>)">
            Partager
          </a>
          <form class="" action="?Route=client&Ctrl=logement&Vue=editerLogement" method="post">
            <input type="hidden" name="id_logement" value="<?= $value['id'] ?>">
            <input type="submit" name="" value="Modifer">
          </form>
        </div>

      </div>
    <?php
  }
}
?>
</div>

<div class="container-logement-mobile">
  
  <div class="card-mobile">
    <div class="card-header-mobile">

    </div>
    <div class="card-body-mobile">
      <form action="" class="sensor">
        <button class="go-sensor">
          <img src="<?= ROOT_URL ?>/static/image/entreprise/capteur.png" alt="">
        </button>
      </form>
    </div>
  </div>

</div>