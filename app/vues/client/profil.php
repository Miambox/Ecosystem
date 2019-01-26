
        <!-- Corps de la page -->

    <div id="container">
        <div id="containerleft">
            <figure class="profil">
                        <img src="<?=ROOT_URL?>static/image/icon/user-profil.png" alt="">

            </figure>

            <div class="informations">
              <h3> Nom </h3>
              <h3> Prénom </h3>
              <h3> Date de naissance </h3>
              <h3> Numéro de téléphone </h3>
              <h3> Adresse mail </h3>
            </div>

        </div>

        <div id="containeright">

          <!--CARD PARTAGE LOGEMENT-->
          <div class= "partage">
            <div class="partage-header">Gérer vos partages de logement</div>
                <div class="card-logement-profil">
                    <?php
                    if(isset($liste_user_share_logement) && sizeof($liste_user_share_logement) != 0) {
                      foreach ($liste_user_share_logement as $key => $logement) {
                        ?>
                        <details close>
                          <summary>
                            <?= $logement['numero']?>
                            rue <?= $logement['rue']?>
                            <?= $logement['ville']?>
                            <?= $logement['code_postal']?>
                          </summary>
                          <?php
                          $liste_user = selectionnerUserWithLogementShare($bdd, $logement['id_logement']);
                          if(isset($liste_user)) {
                            foreach ($liste_user as $key => $user) {
                              ?>
                              <div class="">
                                <div class="">
                                  <?= $user['nom'] ?>
                                  <?= $user['prenom'] ?>
                                </div>
                                <form class="" action="?Route=client&Ctrl=profil&Vue=supprimerPartage" method="post">
                                  <input type="hidden" name="id_user" value="<?= $user['id_utilisateur'] ?>">
                                  <input type="submit" name="" value="&times">
                                </form>
                              </div>
                              <?php
                            }
                          }
                          ?>

                        </details>
                        <?php
                      }
                    }
                    ?>
                </div>
          </div>

                <!-- <div class="logements">
                    <h2> Mes logements </h2>
                    <figure class="maison">
                        <a href="<?=ROOT_URL?>?Route=client&amp;Ctrl=logement&amp;Vue=vuePrincipale" title="Voir mes logements"> <img src="<?=ROOT_URL?>static/image/icon/maison.png" alt="">
                        </a>
                    </figure>

                </div>

                <div class="capteurs">
                    <h2> Mes capteurs </h2>
                    <figure class="ecolight">
                    </figure>


                </div> -->
        </div>
    </div>
