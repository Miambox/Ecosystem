
<div class="card-addPiece">
  <form class="" action="index.html" method="post">
    <p> Ajout d'une pièce </p>
    <input type="nom" name="nom" placeholder="Nom">
    <input type="type" name="type" placeholder="Type">
    <input type="etage" name="etage" placeholder="Etage">
    <input type="surface" name="surface" placeholder="Surface">
    <div>
      <a class"bouton-ajouter" href="<?=ROOT_URL?>?Route=client&Ctrl=capteur&Vue=addCapteur">Ajout d'un capteur</a>
    </div>
  </form>
</div>
