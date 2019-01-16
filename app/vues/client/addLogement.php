
<div class="card-addLogement">
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
</div>
