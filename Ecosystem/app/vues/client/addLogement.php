
<div class="card-addLogement">
  <form class="" action="index.html" method="post">
    <p> Ajout du logement </p>
    <input type="rue" name="rue" placeholder="N° et rue">
    <input type="ville" name="ville" placeholder="Ville">
    <input type="postal" name="postal" placeholder="Code postal">
    <input type="pays" name="pays" placeholder="Pays">
    <input type="telephone" name="telephone" placeholder="Téléphone">
    <input type="complementAdresse" name="complementAdresse" placeholder="Complement d'adresse">
    <input type="surface" name="surface" placeholder="Surface du logement">
    <input type="diagnotisqueenergetique" name="diagnotisqueenergetique" placeholder="Diagnostique energetique">
    <div>
      <a href="<?=ROOT_URL?>?Route=client&Ctrl=addPiece&Vue=vuePrincipale">Ajout d'une pièce</a>
    </div>
  </form>
</div>

