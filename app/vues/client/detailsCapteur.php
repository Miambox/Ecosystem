<div class="container-details-capteur">
<?php
if($_SESSION['type'] == "utilisateur") {
?>
  <div class="container-logo">

    <div class="on_off">
      <form class="" action="?Route=Client&Ctrl=capteur&Vue=activeCapteur" id="formulaireActiveCapteur" method="post">
          <?php
          if($etatCapteur[0]['etat'] == 'on') {
            ?>
            <img class="open-light" src="<?=ROOT_URL?>/static/image/icon/ampoule-open-lp.png" width="100%" alt="">
            <label class="toggle-button">
              <input type="checkbox" name="off-capteur" onchange="document.getElementById('formulaireActiveCapteur').submit();" checked>
              <span class="slider round"></span>
            </label>
            <?php
          } else {
            ?>
            <img class="close-light" src="<?=ROOT_URL?>/static/image/icon/ampoule-close-lp.png" width="100%" alt="">
            <label class="toggle-button">
              <input type="checkbox" name="on_capteur" onchange="document.getElementById('formulaireActiveCapteur').submit();">
              <span class="slider round"></span>
            </label>
            <?php
          }
          ?>
        <input type="hidden" name="id_capteur" value="<?=$idCapteur?>">
        <input type="hidden" name="id_piece" value="<?= $id_piece ?>">
      </form>
    </div>
  </div>

  <div class="container-diagramme">

    <div class="programme">
      <h2>Programme horaire</h2>
      <button class="button-ajouter" type="button" name="button" onclick="openAjouterHorairePopup(<?=$idCapteur?>)">Ajouter</button>
      <div class="programme-horaire">
        <?php
        foreach ($liste_programme as $key => $value) {
          ?>
          <div class="programme-information">

            <div class="date-heure">
              <div>
                <?= strftime("%d %B",strtotime($value['date']))?>
              </div>
              <div>
                <?= $value['heure_debut'] ?>
              </div>
              <div>
                <?= $value['heure_fin'] ?>
              </div>
            </div>

            <div class="active-programme">
              <form action="?Route=Client&Ctrl=capteur&Vue=activeProgramme" id="formulaireActiveProgramme<?= $value['id']?>" method="post">
                <input type="hidden" name="id_programme" value="<?php echo $value['id'] ?>">
                <label class="toggle-button">
                  <?php
                  if($value['etat'] == 'on') {
                    ?>
                    <input type="checkbox" name="off_programme" onchange="document.getElementById('formulaireActiveProgramme<?= $value['id']?>').submit();" checked>
                    <?php
                  } else {
                    ?>
                    <input type="checkbox" name="on_programme" onchange="document.getElementById('formulaireActiveProgramme<?= $value['id']?>').submit();">
                    <?php
                  }
                  ?>
                  <span class="slider round"></span>
                </label>
                <input type="hidden" name="id_capteur" value="<?=$idCapteur?>">
                <input type="hidden" name="id_piece" value="<?=$id_piece?>">
              </form>
            </div>

            <div class="nom-ambiance">
              <?= $ambiance ?>
            </div>

            <div class="delete-programme">
              <form class="" action="?Route=Client&Ctrl=capteur&Vue=supprimerProgramme" method="post">
                <input type="hidden" name="id_capteur" value="<?=$idCapteur?>">
                <input type="hidden" name="id_programme" value="<?php echo $value['id'] ?>">
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


  <div class="container-programme">

    <div class="container-diagramme-circulaire">
      <h2>Taux de luminosité</h2>
      <input type="hidden" name="" value="" id="capteur" data-id="<?=$idCapteur ?>">
      <div class="diagramme-circulaire">
        <div class="" id='diagrammeCirculaire'>
          <img src="<?=ROOT_URL?>/static/image/icon/loading-gif-lp.gif" width="65%" alt="">
        </div>
        <div class="plus_moins">
          <button type="button" name="button" class="ajouterLuminosite" id="ajouterLum">+</button>
          <button type="button" name="button" class="diminuerLuminosite" id="diminuerLum">-</button>
        </div>
      </div>
    </div>

    <!--AFFICHAGE DES AMBIANCES-->
    <div class="ambiance">
      <h2>Gérer vos ambiances</h2>
      <button type="button" name="button" onclick="openAddAmbiance(<?=$idCapteur?>)">Ajouter une ambiance</button>
      <div class="ambiance-list">
        <?php
        if(sizeof($liste_ambiance) != 0) {
          foreach ($liste_ambiance as $key => $value) {
          ?>
          <form class="" action="?Route=client&Ctrl=capteur&Vue=supprimerAmbiance" method="post">
            <label for="nom"><?=$value['nom'] ?></label>
            <input type="hidden" name="id_capteur" value="<?=$idCapteur ?>">
            <input type="hidden" name="id_ambiance" value="<?= $value['id'] ?>">
            <input type="submit" name="" value="&times">
          </form>
          <?php
          }
        }
        ?>
      </div>
    </div>

  </div>
<?php
} else {
?>

<div class="container-logo">
    <img src="<?=ROOT_URL?>/static/image/icon/ampoule-close-lp.png" width="100%" alt="">
    <div class="on_off">
      <span>Eteindre/Allumer le capteur</span>
      <form class="" action="?Route=Client&Ctrl=capteur&Vue=activeCapteur" id="formulaireActiveCapteur" method="post">
        <label class="toggle-button">
          <?php
          if($etatCapteur[0]['etat'] == 'on') {
            ?>
            <input type="checkbox" name="off-capteur" onchange="document.getElementById('formulaireActiveCapteur').submit();" checked>
            <?php
          } else {
            ?>
            <input type="checkbox" name="on_capteur" onchange="document.getElementById('formulaireActiveCapteur').submit();">
            <?php
          }
          ?>
          <span class="slider round"></span>
        </label>
        <input type="hidden" name="id_capteur" value="<?=$idCapteur?>">
      </form>
    </div>
  </div>


  <div class="container-programme">

    <div class="container-diagramme-circulaire">
      <h2>Taux de luminosité</h2>
      <input type="hidden" name="" value="" id="capteur" data-id="<?=$idCapteur ?>">
      <div class="diagramme-circulaire">
        <div class="" id='diagrammeCirculaire'>
          <img src="<?=ROOT_URL?>/static/image/icon/loading-gif-lp.gif" width="65%" alt="">
        </div>
        <div class="plus_moins">
          <button type="button" name="button" class="ajouterLuminosite" id="ajouterLum">+</button>
          <button type="button" name="button" class="diminuerLuminosite" id="diminuerLum">-</button>
        </div>
      </div>
    </div>

  </div>
<?php
}
?>
</div>

<!--POPUP MODAL AJOUT AMBIANCE-->
<div class="container-modal" id="container-modal-add-ambiance<?=$idCapteur?>">
  <div class="modal modal-ambiance">
    <div class="modal-head">
      <button class="close" onclick="closeAddAmmbiancePopup(<?=$idCapteur?>)">&times;</button>
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
        <input type="hidden" name="id_capteur" value="<?=$idCapteur?>">
        <input type="hidden" name="id_piece" value="<?= $id_piece ?>">
        <input type="submit" name="" value="Ajouter">
      </form>
    </div>
  </div>
</div>

<!--POPUP AJOUT PROGRAMME-->
<div class="container-modal" id="container-modal-ajouter-programme<?=$idCapteur?>">
  <form class="modal modal-ajouter-programme" action="?Route=Client&Ctrl=capteur&Vue=addProgramme" method="post">
      <div class="modal-head">
        <button class="close" onclick="closeAjouterHorairePopup(<?=$idCapteur?>)">&times;</button>
        <p>Ajouter un programme</p>
      </div>
      <div class="modal-text">
        <h3>Selectionner date et heure</h3>
        <p>
          <label for="">Activez l'alarme :</label>
          <input type="time" name="heure_debut" value="" required>
          <label for="">à</label>
          <input type="time" name="heure_fin" value="" required>
          <label for="">le</label>
          <input type="date" name="date" value="" required>
        </p>
        <div class="">
          <h3>Selectionner une ambiance</h3>
          <select name="ambiance" required>
            <?php
              foreach ($liste_ambiance as $key => $value) {
            ?>
            <option value="<?php echo $value['id']  ?>"><?php echo $value['nom']  ?></option>
            <?php
            }
            ?>
          </select>
        </div>
        <input type="hidden" name="id_capteur" value="<?=$idCapteur?>">
        <input type="hidden" name="id_piece" value="<?= $id_piece ?>">
        <input type="submit" name="" class="ajouterProgramme" value="Ajouter">
    </div>
  </form>
</div>

<!--POP VISUALISER SES programmes-->
<div class="container-big-modal" id="container-modal-visualiser-programme<?=$idCapteur?>">
  <div class="modal-big modal-visualiser-programme">
    <div class="modal-big-head">
      <button class="close" onclick="closeVisualiserHorairePopup(<?=$idCapteur?>)">&times;</button>
      <p>Vos différents programmes</p>
    </div>
    <div class="modal-big-text">
      <table>
        <?php
        foreach ($liste_programme as $key => $value) {
          ?>
          <tr>
            <td><?php echo $value['date']?></td>
            <td>
              <p class="heure"><?php echo $value['heure_debut'] ?></p>
              <span><?php echo $value['heure_fin'] ?></span>
            </td>
            <td>
              <form class="" action="?Route)Client&Ctrl=capteur&Vue=activeProgramme" id="formulaireActiveProgramme" method="post">
                <input type="hidden" name="id_programme" value="<?php echo $value['id'] ?>">
                <label class="toggle-button">
                  <?php
                  if($value['etat'] == 'on') {
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
                <input type="hidden" name="id_capteur" value="<?=$idCapteur?>">
                <input type="hidden" name="id_piece" value="<?=$id_piece?>">
              </form>
            </td>
            <td>
              <?php echo $ambiance ?>
            </td>
            <td>
              <form class="" action="?Route=Client&Ctrl=capteur&Vue=supprimerProgramme" method="post">
                <input type="hidden" name="id_capteur" value="<?=$idCapteur?>">
                <input type="hidden" name="id_programme" value="<?php echo $value['id'] ?>">
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
<script type="module" src="<?=ROOT_URL?>static/js/client/details-capteur/diagrammeCirculaire.js"></script>
