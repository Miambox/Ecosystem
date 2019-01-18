
<div class="card-signin">
  <form class="" action="?Route=client&Ctrl=signin&Vue=inscription" method="post">
    <p> Inscription </p>
    <input type="lastname" name="lastname" placeholder="Nom de famille" required>
    <input type="name" name="name" placeholder="Prénom" required>
    <label for="date">Veuillez saisir votre date de naissance :</label>
    <input type="date" id="date" name="date" required>
    <input type="" name="telephone" placeholder="Téléphone" required>
    <input type="email" name="mail" placeholder="E-mail" required>
    <input type="email" name="mail_confirmation" placeholder="Confirmation de l'e-mail" required>
    <input type="password" name="password" placeholder="Mot de passe" required>
    <input type="password" name="password_confirmation" placeholder="Confirmer mot de passe" required>
    <input type="securityQuestion" name="securityQuestion" placeholder="Question de sécurité" required>
    <input type="securityResponse" name="securityResponse" placeholder="Réponse" required>
    <label for="mentionLegale">Accepter les CGU</label>
    <input type="checkbox" name="checkCGU" required>
   <div>
      <input class="inscrire" type="submit" name="register" value="S'inscrire" >
    </div>
  </form>
</div>
