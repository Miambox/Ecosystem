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
  <div class="modal">
    <div class="modal-head">
      <button class="close" id="close">&times;</button>

      head
    </div>
    <div class="modal-text">
      text
    </div>
    <div class="modal-footer">
      footer
    </div>

  </div>

</div>
