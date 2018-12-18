
<div class="card-addLogement">
  <form class="" action="?Route=client&Ctrl=logement&Vue=addLogement" method="post">
    <p> Ajout du logement </p>
    <input type="file" name="photo" placeholder="Photo du logement">
    <input type="number" name="numero" placeholder="Numéro">
    <input type="text" name="rue" placeholder="Rue">
    <input type="text" name="ville" placeholder="Ville">
    <input type="number" name="codePostal" placeholder="Code postal">
    <input type="number" name="nbrHabitant" placeholder="Nombre d'habitant">
    <input type="text" name="pays" placeholder="Pays">
    <input type="number" name="surface" placeholder="Surface du logement">
    <input type="number" name="anneeConstruction" placeholder="Année de construction">
    <input type="text" name="complementAdresse" placeholder="Complement d'adresse">
    <input type="text" name="diagnotisqueE" placeholder="Diagnostique énergetique">
    <input class="bouton-ajouter" type="submit" name="" value="Ajouter">
    <!-- <div>
      <a class"bouton-ajouter" href="<?=ROOT_URL?>?Route=client&Ctrl=piece&Vue=addPiece">Ajout d'une pièce</a>
    </div> -->
  </form>
</div>
