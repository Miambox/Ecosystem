
<div class="card-addPiece">
  <?php
  if(isset($information_piece) && sizeof($information_piece) != 0) {
    foreach ($information_piece as $key => $piece) {
      ?>
      <form class="" action="?Route=client&Ctrl=piece&Vue=updaterPiece" method="post">
        <p> Editer d'une pièce </p>

        <input type="hidden" name="id_piece" value=" <?= $piece['id'] ?> ">
        <input type="hidden" name="id_logement" value="<?php echo $id_logement ?>">
        <div>
          <input type="text" name="nom" placeholder="nom" value=" <?= $piece['nom'] ?> " required>
          <label for="nom">*</label>
        </div>

        <div>
          <select name="type" required>
            <option value="Cuisine">Cuisine</option>
            <option value="Véranda">Véranda</option>
            <option value="Salon">Salon</option>
            <option value="Salle à manger">Salle à manger</option>
            <option value="Salle de bain">Salle de bain</option>
            <option value="Salle de jeu">Salle de jeu</option>
            <option value="Chambre">Chambre</option>
            <option value="Escalier">Escalier</option>
            <option value="Cours">Cours</option>
            <option value="Salle autre">Salle autre</option>
          </select>
          <label for="type">*</label>
        </div>

        <div>
          <input type="intval" name="etage" placeholder="etage" value=" <?= intval($piece['etage']) ?> " required>
          <label for="etage">*</label>
        </div>

        <div>
          <input type="intval" name="surface" placeholder="surface" value=" <?= intval($piece['surface']) ?> " required>
          <label for="surface">*</label>
        </div>

        <input type="submit" name="" value="Editer">
      </form>
      <?php
    }
  } else {
    ?>
    <form class="" action="?Route=client&Ctrl=piece&Vue=addPiece" method="post">
      <p> Ajout d'une pièce </p>

      <input type="hidden" name="id_logement" value="<?php echo $id_logement ?>">
      <div>
        <input type="text" name="nom" placeholder="Nom" required>
        <label for="nom">*</label>
      </div>

      <div>
        <select name="type" required>
          <option value="Cuisine">Cuisine</option>
          <option value="Véranda">Véranda</option>
          <option value="Salon">Salon</option>
          <option value="Salle à manger">Salle à manger</option>
          <option value="Salle de bain">Salle de bain</option>
          <option value="Salle de jeu">Salle de jeu</option>
          <option value="Chambre">Chambre</option>
          <option value="Escalier">Escalier</option>
          <option value="Cours">Cours</option>
          <option value="Salle autre">Salle autre</option>
        </select>
        <label for="type">*</label>
      </div>

      <div>
        <input type="number" name="etage" placeholder="Etage" required>
        <label for="etage">*</label>
      </div>

      <div>
        <input type="number" name="surface" placeholder="Surface" required>
        <label for="surface">*</label>
      </div>



      <input type="submit" name="" value="Ajouter">
    </form>
    <?php
  }
  ?>
</div>
