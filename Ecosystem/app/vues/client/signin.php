
<div class="card-signin">
  <form class="" action="index.html" method="post">
    <p> Inscription </p>
    <input type="lastname" name="lastname" placeholder="Nom de famille">
    <input type="name" name="name" placeholder="Prénom">
    <label for="date">Veuillez saisir votre date de naissance :</label>
    <input type="date" id="date" name="date">
    <input type="telephone" name="telephone" placeholder="Téléphone">
    <input type="mail" name="mail" placeholder="E-mail">
    <input type="mail_confirmation" name="mail_confirmation" placeholder="Confirmation de l'e-mail">
    <div>
      <a href="<?=ROOT_URL?>?Route=client&Ctrl=password&Vue=vuePrincipale">Continuer</a>

    </div>
  </form>
</div>
