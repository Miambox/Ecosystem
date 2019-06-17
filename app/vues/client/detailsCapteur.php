<div class="container-details-capteur">
  <?php
  // View for the light sensor
  if (strcmp($sensor_type[0], 'ecolight') == 0 && $_SESSION['type'] == "utilisateur") {
    ?>
    <div class="container-logo">
      <!--BOUTON DE RETOUR-->
      <form class="back-btn" action="?Route=client&Ctrl=capteur&Vue=vuePrincipale" method="post">
        <input type="hidden" name="id_capteur" value="<?= $idCapteur ?>">
        <input type="hidden" name="id_piece" value="<?= $id_piece ?>">
        <button class="back-details" type="submit">Retour</button>
      </form>

      <!--BOUTON ON OFF AUTO LIGHT-->
      <div class="on_off" id="on_off">
        <form action="?Route=Client&Ctrl=capteur&Vue=updateStateSensor" id="formulaireActiveLight" method="post" onsubmit="refreshStateAutoMode()">
          <?php
          // SI BOUTON ON :
          if ($etatCapteur[0]['etat'] == 'on')  {
          ?>
          <img id="img_on_off" class="open-light" src="<?= ROOT_URL ?>/static/image/icon/ampoule-open-lp.png" width="100%" alt="">
          <div class="toggle-3-way" id="sensor_state" data-id="<?= $etatCapteur[0]['etat'] ?>" >
            <input type="radio" id="auto" name="state" value="auto" onchange="document.getElementById('formulaireActiveLight').submit();">
            <label for="auto">Auto</label>
            <input type="radio" name="state" id="on" value="on" onchange="document.getElementById('formulaireActiveLight').submit();" checked>
            <label for="on">ON</label>
            <input type="radio" name="state" id="off" value="off" onchange="document.getElementById('formulaireActiveLight').submit();">
            <label for="off">OFF</label>
          </div>
          <?php
          }

          // SI BOUTON OFF :
          if ($etatCapteur[0]['etat'] == 'off') {
          ?>
          <img id="img_on_off" class="close-light" src="<?= ROOT_URL ?>/static/image/icon/ampoule-close-lp.png" alt="">
          <div class="toggle-3-way" id="sensor_state" data-id="<?= $etatCapteur[0]['etat'] ?>" >
            <input type="radio" id="auto" name="state" value="auto" onchange="document.getElementById('formulaireActiveLight').submit();">
            <label for="auto">Auto</label>
            <input type="radio" name="state" id="on" value="on" onchange="document.getElementById('formulaireActiveLight').submit();">
            <label for="on">ON</label>
            <input checked type="radio" name="state" id="off" value="off" onchange="document.getElementById('formulaireActiveLight').submit();">
            <label for="off">OFF</label>
          </div>
          <?php
          }
        
          // SI BOUTON AUTO : 
          if ($etatCapteur[0]['etat'] == 'auto') {
          ?>
          <div class="auto-light">
            <img id="img_on_off" src="<?= ROOT_URL ?>/static/image/icon/auto_light.gif" alt="">
          </div>
          <!--Partie définissant la valeur allumé éteint quand le capteur est en auto-->
          <div id="sensor_state" data-id="<?= $etatCapteur[0]['etat'] ?>">
            <img class="auto-state" id="auto-state-on" src="<?= ROOT_URL ?>/static/image/icon/auto-light-on.png" alt="">
            <img class="auto-state" id="auto-state-off" src="<?= ROOT_URL ?>/static/image/icon/auto-light.png" alt="">
          </div>
          
          <div class="toggle-3-way" >
            <input checked type="radio" id="auto" name="state" value="auto" onchange="document.getElementById('formulaireActiveLight').submit();">
            <label for="auto">Auto</label>
            <input type="radio" name="state" id="on" value="on" onchange="document.getElementById('formulaireActiveLight').submit();">
            <label for="on">ON</label>
            <input type="radio" name="state" id="off" value="off" onchange="document.getElementById('formulaireActiveLight').submit();">
            <label for="off">OFF</label>
          </div>
          <?php
          }
          ?>
          <input type="hidden" name="id_capteur" id="sensorLight" data-id="<?= $idCapteur ?>" value="<?= $idCapteur ?>">
          <input type="hidden" name="id_piece" id="sensor_piece" data-id="<?= $id_piece ?>" value="<?= $id_piece ?>">
        </form>
      </div>
    </div>

    <div class="programme">
      <h2>Programme horaire</h2>
      <button class="button-ajouter" type="button" name="button" onclick="openAjouterHorairePopup(<?= $idCapteur ?>)">Ajouter</button>
      <div class="programme-horaire" id="container-programme">
        <?php
        foreach ($liste_programme as $key => $value) {
          ?>
          <div class="programme-information">

            <div class="date-heure">
              <div>
                <?= strftime("%d %B", strtotime($value['date'])) ?>
              </div>
              <div>
                <?= $value['heure_debut'] ?>
              </div>
              <div>
                <?= $value['heure_fin'] ?>
              </div>
            </div>

            <div class="active-programme" id="checkProgramme" data-id="<?=$value['etat']?>" >
              <form action="?Route=Client&Ctrl=capteur&Vue=activeProgramme" id="formulaireActiveProgramme<?= $value['id'] ?>" method="post">
                <label class="toggle-button" id="programme" data-id="<?=$value['id']?>">
                  <?php
                  if ($value['etat'] == 'on') {
                    ?>
                    <input type="checkbox" name="off_programme" onchange="document.getElementById('formulaireActiveProgramme<?= $value['id'] ?>').submit();" checked>
                  <?php
                } else {
                  ?>
                    <input type="checkbox" name="on_programme" onchange="document.getElementById('formulaireActiveProgramme<?= $value['id'] ?>').submit();">
                  <?php
                }
                ?>
                  <span class="slider round"></span>
                </label>
                <input type="hidden" name="id_capteur" value="<?= $idCapteur ?>">
                <input type="hidden" name="id_piece" value="<?= $id_piece ?>">
                <input type="hidden" name="id_programme" value="<?php echo $value['id'] ?>">
              </form>
            </div>

            <div class="nom-ambiance">
              <!-- <?= $ambiance ?> -->
              <?= $value['id_mode'] ?>
            </div>

            <div class="delete-programme">
              <form class="" action="?Route=Client&Ctrl=capteur&Vue=supprimerProgramme" method="post">
                <input type="hidden" name="id_capteur" value="<?= $idCapteur ?>">
                <input type="hidden" name="id_programme" value="<?php echo $value['id'] ?>">
                <input type="hidden" name="id_piece" value="<?= $id_piece ?>">
                <input type="submit" name="" value="&times">
              </form>
            </div>
          </div>

          <?php
        }
        ?>
        </div>
      </div>
    <?php
  }
  // View for the temperature sensor
  if (strcmp($sensor_type[0], 'ecotemperature') == 0 && $_SESSION['type'] == "utilisateur") {
    ?>
    <div class="container-temperature">
      <div class="first-part">
        <!--BOUTON DE RETOUR-->
        <form class="" action="?Route=client&Ctrl=capteur&Vue=vuePrincipale" method="post">
          <input type="hidden" name="id_capteur" value="<?= $idCapteur ?>">
          <input type="hidden" name="id_piece" value="<?= $id_piece ?>">
          <button class="back-details" type="submit">Retour</button>
        </form>

        <!--BOUTON AUTO OFF-->
        <div class="on_off" id="on_off">
          <form class="" action="?Route=Client&Ctrl=capteur&Vue=updateStateSensor" id="formulaireActiveCapteur" method="post">
            <?php
            // SI BOUTON OFF :
            if ($etatCapteur[0]['etat'] == 'off') {
            ?>
            <div class="image-temp">
            <img src="<?= ROOT_URL ?>/static/image/icon/temperature-off.png" width="100%" alt="">          
            </div>
            <div class="toggle-3-way" id="sensor_state" data-id="<?= $etatCapteur[0]['etat'] ?>" >
              <input type="radio" id="auto" name="state" value="auto" onchange="document.getElementById('formulaireActiveCapteur').submit();">
              <label for="auto">Auto</label>
              <input checked type="radio" name="state" id="off" value="off" onchange="document.getElementById('formulaireActiveCapteur').submit();">
              <label for="off">OFF</label>
            </div>
            <?php
            }
          
            // SI BOUTON AUTO : 
            if ($etatCapteur[0]['etat'] == 'auto') {
            ?>
            <div class="image-temp">
            <img src="<?= ROOT_URL ?>/static/image/icon/temperature.png" width="100%" alt="">          
            </div>
            <div class="toggle-3-way" id="sensor_state" data-id="<?= $etatCapteur[0]['etat'] ?>">
              <input checked type="radio" id="auto" name="state" value="auto" onchange="document.getElementById('formulaireActiveCapteur').submit();">
              <label for="auto">Auto</label>
              <input type="radio" name="state" id="off" value="off" onchange="document.getElementById('formulaireActiveCapteur').submit();">
              <label for="off">OFF</label>
            </div>
            
            <?php
            }
            ?>
            <input type="hidden" name="id_capteur" id="sensorTemperature" data-id="<?= $idCapteur ?>" value="<?= $idCapteur ?>">
            <input type="hidden" name="id_piece" id="sensor_piece" data-id="<?= $id_piece ?>" value="<?= $id_piece ?>">
          </form>
        </div>
      </div>

      <div class="second-part">
        <div class="programme">
        <h2>Programme horaire</h2>
        <button class="button-ajouter" type="button" name="button" onclick="openAjouterHorairePopup(<?= $idCapteur ?>)">Ajouter</button>
        <div class="programme-horaire"  id="container-programme">
          <?php
          foreach ($liste_programme as $key => $value) {
            ?>
            <div class="programme-information">

              <div class="date-heure">
                <div>
                  <?= strftime("%d %B", strtotime($value['date'])) ?>
                </div>
                <div>
                  <?= $value['heure_debut'] ?>
                </div>
                <div>
                  <?= $value['heure_fin'] ?>
                </div>
              </div>

              <div class="active-programme" id="checkProgrammeTemp" data-id="<?=$value['etat']?>">
                <form action="?Route=Client&Ctrl=capteur&Vue=activeProgramme" id="formulaireActiveProgramme<?= $value['id'] ?>" method="post">
                  <input type="hidden" name="id_programme" value="<?php echo $value['id'] ?>">
                  <label class="toggle-button"id="programmeTemp" data-id="<?=$value['id']?>">
                    <?php
                    if ($value['etat'] == 'on') {
                      ?>
                      <input type="checkbox" name="off_programme" onchange="document.getElementById('formulaireActiveProgramme<?= $value['id'] ?>').submit();" checked>
                    <?php
                  } else {
                    ?>
                      <input type="checkbox" name="on_programme" onchange="document.getElementById('formulaireActiveProgramme<?= $value['id'] ?>').submit();">
                    <?php
                  }
                  ?>
                    <span class="slider round"></span>
                  </label>
                  <input type="hidden" name="id_capteur" value="<?= $idCapteur ?>">
                  <input type="hidden" name="id_piece" value="<?= $id_piece ?>">
                </form>
              </div>

              <div class="nom-ambiance">
                <!-- <?= $ambiance ?> -->
                <?= $value['id_mode'] ?>
              </div>

              <div class="delete-programme">
                <form class="" action="?Route=Client&Ctrl=capteur&Vue=supprimerProgramme" method="post">
                  <input type="hidden" name="id_capteur" value="<?= $idCapteur ?>">
                  <input type="hidden" name="id_programme" value="<?php echo $value['id'] ?>">
                  <input type="hidden" name="id_piece" value="<?= $id_piece ?>">
                  <input type="submit" name="" value="&times">
                </form>
              </div>
            </div>

            <?php
          }
          ?>
          </div>
        </div>
      </div>

      <div class="third-part">
        <div class="display_temperature">
            <div class="title_temp">Température ambiante</div>
            <div id="ambiant_temperature" class="ambiant_temperature">
            </div>
            <div id="loading-ambiant" class="loading">
              <img src="<?= ROOT_URL ?>/static/image/icon/loading.gif" width="100%" alt="">          
            </div>
            <div id="sun-ambiant" class="loading">
              <img src="<?= ROOT_URL ?>/static/image/icon/sun.png" width="100%" alt="">            
            </div>
            <div id="snow-ambiant" class="loading">
              <img src="<?= ROOT_URL ?>/static/image/icon/flocon.png" width="100%" alt="">            
            </div>
        </div>
        <div class="container-circulaire" id="state-sensor-temp" data-id="<?= $etatCapteur[0]['etat'] ?>">
          <div class="title_temp">Température voulue</div>
          <input type="hidden" name="" value="" id="capteur" data-id="<?= $idCapteur ?>">
          <input type="hidden" name="" value="" id="piece" data-id="<?= $id_piece ?>">
          <div class="gauge">
            <div class="" id='diagrammeCirculaire'>
            </div>
          </div>
          <div id="loading-temp-choice" class="loading-temp-choice">
            <img src="<?= ROOT_URL ?>/static/image/icon/loading.gif" width="100%" alt="">          
          </div>
          <div class="plus_moins" id="plus_moins">
              <button type="button" name="button" class="ajouterLuminosite" id="ajouterLum">+</button>
              <button type="button" name="button" class="diminuerLuminosite" id="diminuerLum">-</button>
          </div>
        </div>
      </div>
      
    <?php
  }?>
</div>








<!--POPUP MODAL AJOUT AMBIANCE-->
<!-- <div class="container-modal" id="container-modal-add-ambiance<?= $idCapteur ?>">
  <div class="modal modal-ambiance">
    <div class="modal-head">
      <button class="close" onclick="closeAddAmmbiancePopup(<?= $idCapteur ?>)">&times;</button>
      <p>Ajouter une ambiance</p>
    </div>
    <div class="modal-text">
      <form class="" action="?Route=client&Ctrl=capteur&Vue=addAmbiance" method="post">
        <div class="">
          <label for="nom">Nom</label>
          <input type="text" name="nom" value="" required>
        </div>
        <div class="">
          <label for="valeur">Pourcentage de luminosité:</label>
          <input type="number" name="valeur" value="" required>%
        </div>
        <input type="hidden" name="id_capteur" value="<?= $idCapteur ?>">
        <input type="hidden" name="id_piece" value="<?= $id_piece ?>">
        <input type="submit" name="" value="Ajouter">
      </form>
    </div>
  </div>
</div> -->

<!--POPUP AJOUT PROGRAMME-->
<div class="container-modal" id="container-modal-ajouter-programme<?= $idCapteur ?>">
  <form class="modal modal-ajouter-programme" action="?Route=Client&Ctrl=capteur&Vue=addProgramme" method="post">
    <div class="modal-head">
      <button class="close" onclick="closeAjouterHorairePopup(<?= $idCapteur ?>)">&times;</button>
      <p>Configuration du programme</p>
    </div>
    <div class="modal-text">
      <div class="description-programme-horaire">
        <p>Période horaire</p>
        <input type="time" name="heure_debut" value="" required>
        <input type="time" name="heure_fin" value="" required>
      </div>
      <div class="description-programme-date">
        <p>Journée d'activation</p>
        <input type="date" name="date" value="" required>
      </div>

      <div class="description-programme-mode">
        <?php
        // Si capteur de lumière
        if (strcmp($sensor_type[0], 'ecolight') == 0) {
        ?>
        <p>Sélectionnez un mode</p>
        <select name="mode" id="">
          <option value="auto">AUTO</option>
          <option value="on">ON</option>
          <option value="off">OFF</option>
        </select>
        <?php
        } else {
        ?>
        <p>Sélectionnez un mode</p>
        <select name="mode" id="">
          <option value="auto">AUTO</option>
          <option value="off">OFF</option>
        </select>
        <?php
        }
        ?>
      </div>
      <input type="hidden" name="id_capteur" value="<?= $idCapteur ?>">
      <input type="hidden" name="id_piece" value="<?= $id_piece ?>">
      <input class="btn-add-programme" type="submit" name="" class="ajouterProgramme" value="Ajouter">
    </div>
  </form>
</div>

<!--POP VISUALISER SES programmes-->
<div class="container-big-modal" id="container-modal-visualiser-programme<?= $idCapteur ?>">
  <div class="modal-big modal-visualiser-programme">
    <div class="modal-big-head">
      <button class="close" onclick="closeVisualiserHorairePopup(<?= $idCapteur ?>)">&times;</button>
      <p>Vos différents programmes</p>
    </div>
    <div class="modal-big-text">
      <table>
        <?php
        foreach ($liste_programme as $key => $value) {
          ?>
          <tr>
            <td><?php echo $value['date'] ?></td>
            <td>
              <p class="heure"><?php echo $value['heure_debut'] ?></p>
              <span><?php echo $value['heure_fin'] ?></span>
            </td>
            <td>
              <form class="" action="?Route=Client&Ctrl=capteur&Vue=activeProgramme" id="formulaireActiveProgramme" method="post">
                <input type="hidden" name="id_programme" value="<?php echo $value['id'] ?>">
                <label class="toggle-button">
                  <?php
                  if ($value['etat'] == 'on') {
                    ?>
                    <input type="checkbox" name="off_programme" onchange="document.getElementById('formulaireActiveProgramme').submit();" checked>
                  <?php
                } else {
                  ?>
                    <input type="checkbox" name="on_programme" onchange="document.getElementById('formulaireActiveProgramme').submit();">
                  <?php
                }
                ?>
                  <span class="slider round"></span>
                </label>
                <input type="hidden" name="id_capteur" value="<?= $idCapteur ?>">
                <input type="hidden" name="id_piece" value="<?= $id_piece ?>">
              </form>
            </td>
            <td>
              <?php echo $ambiance ?>
            </td>
            <td>
              <form class="" action="?Route=Client&Ctrl=capteur&Vue=supprimerProgramme" method="post">
                <input type="hidden" name="id_capteur" value="<?= $idCapteur ?>">
                <input type="hidden" name="id_programme" value="<?php echo $value['id'] ?>">
                <input type="hidden" name="id_piece" value="<?= $id_piece ?>">
                <input type="submit" name="" value="&times">
              </form>
            </td>
          </tr>

        <?php
      }
      ?>
      </table>
    </div>
  </div>

</div>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<!-- Diagramme circulaire -->
<script type="module" src="<?= ROOT_URL ?>static/js/client/details-capteur/diagrammeCirculaire.js"></script>
<script type="module" src="<?= ROOT_URL ?>static/js/client/details-capteur/refreshLightState.js"></script>
<script type="module" src="<?= ROOT_URL ?>static/js/client/details-capteur/refreshTemperature.js"></script>