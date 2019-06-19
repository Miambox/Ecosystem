<div class="card-addCapteur">
  <?php
  if (isset($information_capteur) && sizeof($information_capteur) != 0) {
    foreach ($information_capteur as $key => $capteur) {
      ?>
      <form class="" action="?Route=client&Ctrl=capteur&Vue=updaterCapteur" method="post">
        <p> Ajout d'un capteur par référence </p>
        <input type="hidden" name="id_logement" value="<?php echo $id_logement ?>">
        <input type="hidden" name="id_piece" value="<?php echo $id_piece ?>">
        <input type="hidden" name="id_capteur" value="<?= $id_capteur ?>">
        <div>
          <input type="number" name="ref" placeholder="Référence" value="<?= $capteur['numero_ref'] ?>" required>
          <label for="nom">*</label>
        </div>

        <div>
          <input type="text" name="nom" placeholder="Nom" value="<?= $capteur['nom'] ?>" required>
          <label for="nom">*</label>
        </div>

        <input class="bouton-ajouter" type="submit" value="Editer">
      </form>
    <?php
  }
} else {
  ?>
    <form class="" action="?Route=client&Ctrl=capteur&Vue=addCapteur" method="post">
      <p> Ajout d'un capteur par référence </p>
      <input type="hidden" name="id_logement" value="<?php echo $id_logement ?>">
      <input type="hidden" name="id_piece" value="<?php echo $id_piece ?>">
      <div>
        <input type="number" name="ref" placeholder="Référence" required>
        <label for="nom">*</label>
      </div>

      <div>
        <select name="nom" required>
          <option value="" disabled>--Choisissez un type de capteur--</option>
          <?php
          if (isset($sensor_type) != 0) {
            foreach ($sensor_type as $key => $type) {
              ?>
              <option value="<?php echo $type[0]; ?>"><?php echo $type[0]; ?></option>
              <?php
            }
          }
          ?>
        </select>
        <label for="nom">*</label>
      </div>

      <input class="bouton-ajouter" type="submit" value="Ajouter">
    </form>
  <?php
}
?>
</div>