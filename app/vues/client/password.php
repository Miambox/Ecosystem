
<div class="card-password">
  <form class="" action="?Route=client&Ctrl=signin&Vue=valide" method="post">
    <p> Password </p>
 
    <input type="password" name="password" placeholder="Mot de passe">
    <input type="password_confirmation" name="password_confirmation" placeholder="Confirmer mot de passe">
    <input type="securityQuestion" name="securityQuestion" placeholder="Question de sécurité">
    <input type="securityResponse" name="securityResponse" placeholder="Réponse">
    <label for="mentionLegale">Accepter les CGU</label>
    <input type="checkbox" name="checkCGU">

    <div>
      <input class="inscrire" type="submit" name="register" value="Envoyer" onclick="window.location=''">

     <a href="<?=ROOT_URL?>?Route=client&Ctrl=logement&Vue=addLogement">Ajouter un logement</a>




    </div>
  </form>
</div>
