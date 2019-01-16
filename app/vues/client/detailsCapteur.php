<div class="container-details-capteur">
<?php

//echo $donneesCapteur['nom'];

?>
  <div class="container-logo">
    <a type="button" href="javascript:history.back()" class="btn-retour-piece">Retour véranda</a>
    <img src="<?=ROOT_URL?>/static/image/entreprise/eco-light.png" width="100%" alt="">
    <div class="on_off">
      <span>Eteindre/Allumer le capteur</span>
      <?php if ($donneesCapteur['etat']=="marche"): ?>
        <label class="toggle-button">
          <input type="checkbox" checked>
          <span class="slider round"></span>
        </label>
      <?php else : ?>
        <label class="toggle-button">
          <input type="checkbox" >
          <span class="slider round"></span>
        </label>
      <?php endif ?>


      <form action="?Route=client&Ctrl=piece&Vue=vuePrincipale" method="post">
        <input type="hidden" name="etat_capteur" value="<?php echo $donneespiece['id'] ?>">
        <input class = "retourPiece" type="submit" name="" value="retour aux pieces">
      </form>

    </div>
  </div>
  <div class="container-diagramme">
    <div class="programme">
      <h2>Programmer un horaire</h2>
      <button class="button-ajouter" type="button" name="button" id="ajouterProgramme">Ajouter</button>
      <button class="button-visualiser" type="button" name="button" id="visualiserProgramme">Visualiser</button>
    </div>
    <div class="diagramme-baton">
      <h2>Période d'utilisation</h2>
      <div class="chart_div" id="chart_div">
        <img src="<?=ROOT_URL?>/static/image/icon/loading-gif-lp.gif" width="40%" alt="">
      </div>
    </div>
  </div>


  <div class="container-programme">
    <div class="container-diagramme-circulaire">
      <h2>Taux de luminosité</h2>
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
    <div class="ambiance">
      <h2>Gérer vos ambiances <button type="button" name="button"id="ajouterAmbiance">+</button> </h2>
      <div class="">
        <ul>
          <li>
            <span>Tamisé</span>
            <label class="toggle-button">
              <input type="checkbox">
              <span class="slider round"></span>
            </label>
          </li>
          <li>
            <span>Travail</span>
            <label class="toggle-button">
              <input type="checkbox">
              <span class="slider round"></span>
            </label>
          </li>
          <li>
            <span>Illumination Max</span>
            <label class="toggle-button">
              <input type="checkbox">
              <span class="slider round"></span>
            </label>
          </li>
        </ul>
      </div>

    </div>

  </div>
</div>


<div class="container-modal" id="container-modal">
  <div class="modal modal-ambiance">
    <div class="modal-head">
      <button class="close" id="close">&times;</button>
      <p>Ajouter une ambiance</p>
    </div>
    <div class="modal-text">
      <form class="name-ambiance" action="#" method="post">
        <label for="name_ambiance">Nom</label>
        <input type="text" name="name_ambiance" value="">
      </form>
      <div class="modal-diagramme-circulaire">
        <div class="" id='diagrammeCirculaireModal'>

        </div>
        <div class="plus_moins_modal">
          <button type="button" name="button" class="ajouterLuminositeModal">+</button>
          <button type="button" name="button" class="diminuerLuminositeModal">-</button>
        </div>
      </div>
    </div>
    <div class="modal-footer">
      <button type="button" name="button" clas="ajouterAmbiance">Ajouter</button>
    </div>
  </div>
</div>
<!-- Ancien container pour ajouter un programme -->
<div class="container-big-modal" id="container-modal-ajouter-programme">
  <form class="modal-big modal-ajouter-programme" action="?Route=Client&Ctrl=capteur&Vue=addProgramme" method="post">
      <div class="modal-big-head">
        <button class="close" id="close-ajouter-programme">&times;</button>
        <p>Ajouter un programme</p>
      </div>
      <div class="modal-big-text">
        <div class="modal-big-text-one">
          <h3>Selectionner date et heure</h3>
          <p>
            <label for="">Activez l'alarme :</label>
            <input type="time" name="heure_debut" value="">
            <label for="">à</label>
            <input type="time" name="heure_fin" value="">
            <label for="">le</label>
            <input type="date" name="date" value="">
          </p>
      </div>
      <div class="modal-big-text-two select-ambiance">
        <h3>Selectionner une ambiance</h3>
        <span>( Vous devez sélectionner qu'un seule ambiance ..)</span>
        <ul>
          <li>
            <select name="ambiance">
              <?php
                foreach ($liste_ambiance as $key => $value) {
              ?>
              <option value="<?php echo $value['id']  ?>"><?php echo $value['nom']  ?></option>
              <?php
              }
              ?>
            </select>
          </li>
        </ul>
      </div>
    </div>
      <div class="modal-big-footer">
      <input type="submit" name="" class="ajouterProgramme" value="Ajouter">
    </div>
  </form>
</div>


<div class="container-big-modal" id="container-modal-visualiser-programme">
  <div class="modal-big modal-visualiser-programme">
    <div class="modal-big-head">
      <button class="close" id="close-visualiser-programme">&times;</button>
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
              </form>
            </td>
            <td>
              <?php echo $ambiance ?>
            </td>
            <td>
              <form class="" action="?Route=Client&Ctrl=capteur&Vue=supprimerProgramme" method="post">
                <input type="hidden" name="id_programme" value="<?php echo $value['id'] ?>">
                <input type="submit" name="" value="x">
              </form>
            </td>
          </tr>

          <?php
        }
        ?>
      </table>

    </div>
    <div class="modal-big-footer">

    </div>

  </div>

</div>
