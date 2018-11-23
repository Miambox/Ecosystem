<div class="container-details-capteur">

  <div class="container-diagramme">
    <div class="diagramme-circulaire">

    </div>
    <div class="diagramme-baton">

    </div>
  </div>

  <div class="container-logo">
    <h1>Eco'light n°1</h1>
    <img src="<?=ROOT_URL?>/static/image/entreprise/eco-light.png" width="100%" alt="">
    <div class="on_off">
      <label class="toggle-button">
        <input type="checkbox">
        <span class="slider round"></span>
      </label>
      <span>On / Off</span>
    </div>
  </div>

  <div class="container-programme">
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
          <li>
            <span>Economie</span>
            <label class="toggle-button">
              <input type="checkbox">
              <span class="slider round"></span>
            </label>
          </li>
        </ul>
      </div>

    </div>
    <div class="programme">
      <h2>Programmer un horaire</h2>
      <button class="button-ajouter" type="button" name="button" id="ajouterProgramme">Ajouter</button>
      <button class="button-visualiser" type="button" name="button" id="visualiserProgramme">Visualiser</button>

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
