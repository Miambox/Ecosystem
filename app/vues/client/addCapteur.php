
<div class="card-addCapteur">
  <form class="" action="?Route=client&Ctrl=capteur&Vue=addCapteur" method="post">
    <p> Ajout d'un capteur par référence </p>
    <input type="hidden" name="id_logement" value="<?php echo $id_logement ?>">
    <input type="hidden" name="id_piece" value="<?php echo $id_piece ?>">
    <div>
      <input type="number" name="ref" placeholder="Référence" required>
      <label for="nom">*</label>
    </div>

    <label for="">Détails</label>
    <div>
      <input type="text" name="nom" placeholder="Nom" required>
      <label for="nom">*</label>
    </div>
    <div>
      <input type="text" name="unit" placeholder="Unité de mesure" required>
      <label for="nom">*</label>
    </div>

    <select type="number" name="type" size="1">
        <OPTION value="1">Eco'light</OPTION>
    </select>
    <input class="bouton-ajouter" type="submit" name="ajouter" value="Ajouter">
  </form>
</div>
