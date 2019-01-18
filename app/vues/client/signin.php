
<div class="card-signin">
  <form class="" action="?Route=client&Ctrl=signin&Vue=inscription" method="post">
    <p> Inscrivez-vous </p>

    <div class="">
      <input type="lastname" name="lastname" placeholder="Nom de famille" required>
      <label for="lastname">*</label>
    </div>

    <div class="">
      <input type="name" name="name" placeholder="Prénom" required>
      <label for="name">*</label>
    </div>

    <label for="date">Veuillez saisir votre date de naissance :</label>
    <div class="">
      <input type="date" id="date" name="date" required>
      <label for="date">*</label>
    </div>

    <div class="">
      <input type="phone" name="telephone" placeholder="Téléphone" required>
      <label for="telephone">*</label>
    </div>

    <div class="">
      <input type="email" name="mail" placeholder="E-mail" required>
      <label for="mail">*</label>
    </div>

    <div class="">
      <input type="email" name="mail_confirmation" placeholder="Confirmation de l'e-mail" required>
      <label for="mail_confirmation">*</label>
    </div>

    <div class="">
      <input type="password" name="password" placeholder="Mot de passe" required>
      <label for="password">*</label>
    </div>

    <div class="">
      <input type="password" name="password_confirmation" placeholder="Confirmer mot de passe" required>
      <label for="name">*</label>

    </div>

    <div class="">
      <select class="" name="securityQuestion">
        <option value="Quel est le nom de jeune fille de ma mère ?">Quel est le nom de jeune fille de ma mère ?</option>
        <option value="Quel est le mon deuxième prenom ?">Quel est le mon deuxième prenom ?</option>
        <option value="Quel est le nom de mon animal de compagnie ?">Quel est le nom de mon animal de compagnie ?</option>
      </select>
      <label for="name">*</label>
    </div>

    <div class="">
      <input type="text" name="securityResponse" placeholder="Réponse" required>
      <label for="securityResponse">*</label>
    </div>


    <label for="mentionLegale">Accepter les CGU</label>
    <div class="">
      <input type="checkbox" name="checkCGU" required>
      <label for="checkCGU">*</label>
    </div>



    <input class="inscrire" type="submit" name="register" value="S'inscrire" >
  </form>
</div>
