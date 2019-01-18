
<div class="card-signin">
  <form class="" action="?Route=client&Ctrl=signin&Vue=valide" method="post">
    <p> Inscription </p>
    <input type="lastname" name="lastname" placeholder="Nom de famille" required>
    <input type="name" name="name" placeholder="Prénom">
    <label for="date">Veuillez saisir votre date de naissance :</label>
    <input type="date" id="date" name="date">
    <input type="" name="telephone" placeholder="Téléphone">
    <input type="email" name="mail" placeholder="E-mail">
    <input type="email" name="mail_confirmation" placeholder="Confirmation de l'e-mail">
    <input type="password" name="password" placeholder="Mot de passe">
    <input type="password" name="password_confirmation" placeholder="Confirmer mot de passe">
    <input type="securityQuestion" name="securityQuestion" placeholder="Question de sécurité">
    <input type="securityResponse" name="securityResponse" placeholder="Réponse">
    <label for="mentionLegale">Accepter les CGU</label>
    <input type="checkbox" name="checkCGU">
   <div>
      <input class="inscrire" type="submit" name="register" value="Envoyer" >

     <a href="<?=ROOT_URL?>?Route=client&Ctrl=logement&Vue=addLogement">Ajouter un logement</a>




    </div>
  </form>
</div>
