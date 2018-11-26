<div class="container-details-capteur">

  <div class="container-logo">
    <a type="button" href="javascript:history.back()" class="btn-retour-piece">Retour véranda</a>
    <img src="<?=ROOT_URL?>/static/image/entreprise/eco-light.png" width="100%" alt="">
    <div class="on_off">
      <span>Eteindre/Allumer le capteur</span>
      <label class="toggle-button">
        <input type="checkbox">
        <span class="slider round"></span>
      </label>
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
      </div>
    </div>
  </div>


  <div class="container-programme">
    <div class="container-diagramme-circulaire">
      <h2>Taux de luminosité</h2>
      <div class="diagramme-circulaire">
        <div class="" id='diagrammeCirculaire'>

        </div>
        <div class="plus_moins">
          <button type="button" name="button" class="ajouterLuminosite">+</button>
          <button type="button" name="button" class="diminuerLuminosite">-</button>
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
    </div>
    <div class="modal-footer">
      <button type="button" name="button" clas="ajouterAmbiance">Ajouter</button>
    </div>
  </div>
</div>

<div class="container-big-modal" id="container-modal-ajouter-programme">
  <div class="modal-big modal-ajouter-programme">
    <div class="modal-big-head">
      <button class="close" id="close-ajouter-programme">&times;</button>
      <p>Ajouter un programme</p>
    </div>
    <div class="modal-big-text">
      <div class="modal-big-text-one">
          <h3>Selectionner date et heure</h3>
          <p>
            <form class="" action="index.html" method="post">
              <div class="form-group">
                <select class="" id="heure">
                  <?php
                  for ($i=0; $i <= 23 ; $i++) {
                    ?>
                    <option value="<?php echo $i ?>"><?php echo $i ?></option>
                    <?php
                  }
                  ?>
                </select>
                <span>:</span>
                <select class="" id="minute">
                  <?php for ($i=0; $i <= 60 ; $i++) {
                    ?>
                    <option value="<?php echo $i ?>"><?php echo $i ?></option>
                    <?php
                  } ?>
                </select>
              </div>
              <div class="form-group">
                <select class="" id="jour">
                  <option value="lundi">lundi</option>
                  <option value="mardi">mardi</option>
                  <option value="mercredi">mercredi</option>
                  <option value="jeudi">jeudi</option>
                  <option value="vendredi">vendredi</option>
                  <option value="samedi">samedi</option>
                  <option value="dimanche">dimanche</option>


                </select>
              </div>
              <div class="toujours">
                <label for="">Tous les jours</label>
                <label class="toggle-button">
                  <input type="checkbox">
                  <span class="slider round"></span>
                </label>
              </div>
            </form>
          </p>
      </div>
      <div class="modal-big-text-two select-ambiance">
        <h3>Selectionner une ambiance</h3>
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
    <div class="modal-big-footer">
      <button type="button" name="button" clas="ajouterProgramme">Valider</button>
    </div>
  </div>
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
        for ($i=0; $i < 20; $i++) {
          ?>
          <tr>
            <td>Lundi</td>
            <td>
              <p class="heure">22:30</p>
              <span>Tamisé</span>
            </td>
            <td>
              <span>Tamisé</span>
              <label class="toggle-button">
                <input type="checkbox">
                <span class="slider round"></span>
              </label>
            </td>
            <td>
              <a href="#">
                <img src="<?=ROOT_URL?>/static/image/icon/modifier-icon-lp.png" width="20%" alt="">
              </a>
            </td>
            <td>
              <a href="#">
                <img src="<?=ROOT_URL?>/static/image/icon/delete-icon-lp.png" width="20%" alt="">
              </a>
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
