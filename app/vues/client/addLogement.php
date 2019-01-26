
<div class="card-addLogement">
  <?php
  if(isset($information_logement) && sizeof($information_logement) != 0) {
    foreach ($information_logement as $key => $logement) {
      ?>
      <form class="" action="?Route=client&Ctrl=logement&Vue=updaterLogement" method="post">
        <p> Editer votre logement </p>
        <input type="intval" name="numero" placeholder="numero" value=" <?= intval($logement['numero'])  ?> " required>
        <label for="numero">*</label>
        <input type="text" name="rue" placeholder="rue" value="<?= $logement['rue']?>" required>
        <label for="numero">*</label>
        <input type="text" name="ville" placeholder="ville" value="<?= $logement['ville']  ?>" required>
        <label for="numero">*</label>
        <input type="number" name="code_postal" placeholder="code postal" value="<?= $logement['code_postal']  ?>" required>
        <label for="numero">*</label>
        <input type="number" name="nbr_habitant" placeholder="nombre d'habitant" value="<?= $logement['nbr_habitant']  ?>" required>
        <label for="numero">*</label>
        <input type="number" name="surface" placeholder="surface" value="<?= $logement['surface']  ?>" required>
        <label for="numero">*</label>
        <input type="text" name="complement_adresse" placeholder="complement d'adresse" value="<?= $logement['complement_adresse']  ?>">
        <input type="number" name="annee_construction" placeholder="annee de construction" value="<?= $logement['annee_construction']  ?>">
        <input type="hidden" name="id_logement" value="<?= $logement['id'] ?>">
        <input class="bouton-ajouter" type="submit" name="ajouter" value="Editer">
      </form>
      <?php
    }
  } else {
    ?>
    <form class="" action="?Route=client&Ctrl=logement&Vue=addLogement" method="post">
      <p> Ajouter votre logement </p>
      <input type="number" name="numero" placeholder="Numéro" required>
      <label for="numero">*</label>
      <input type="text" name="rue" placeholder="Rue" required>
      <label for="numero">*</label>
      <input type="text" name="ville" placeholder="Ville" required>
      <label for="numero">*</label>
      <input type="number" name="code_postal" placeholder="Code postal" required>
      <label for="numero">*</label>
      <input type="number" name="nbr_habitant" placeholder="Nombre d'habitant" required>
      <label for="numero">*</label>
      <input type="number" name="surface" placeholder="Surface du logement" required>
      <label for="numero">*</label>
      <input type="text" name="complement_adresse" placeholder="Complement d'adresse">
      <input type="number" name="annee_construction" placeholder="Année de construction">
      <input class="bouton-ajouter" type="submit" name="ajouter" value="Ajouter">
    </form>
    <?php
  }
  ?>

</div>
