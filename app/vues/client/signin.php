<div class="container-signin">


  <div class="card-signin">
    <?php
    if (isset($information_user) && sizeof($information_user) != 0) {
      foreach ($information_user as $key => $user) {
        ?>
        <form class="" action="?Route=client&Ctrl=profil&Vue=updaterProfil" method="post">
          <p> Editez votre profil </p>

          <div class="">
            <input type="text" name="lastname" value="<?= $user['nom'] ?>" placeholder="Nom de famille" required>
            <label for="lastname">*</label>
          </div>

          <div class="">
            <input type="text" name="name" placeholder="Prénom" value="<?= $user['prenom'] ?>" required>
            <label for="name">*</label>
          </div>

          <label for="date">Veuillez saisir votre date de naissance :</label>
          <div class="">
            <input type="date" id="date" name="date" value="<?= $user['date_naissance'] ?>" required>
            <label for="date">*</label>
          </div>

          <div class="">
            <input type="phone" name="telephone" placeholder="Téléphone" value="0<?= $user['tel_portable'] ?>" required>
            <label for="telephone">*</label>
          </div>

          <div class="">
            <input type="email" name="mail" placeholder="E-mail" value="<?= $user['mail'] ?>" required>
            <label for="mail">*</label>
          </div>

          <div class="">
            <input type="password" name="password" placeholder="Mot de passe" value="<?= $user['mot_de_passe'] ?>" required>
            <label for="password">*</label>
          </div>

          <input class="inscrire" type="submit" name="register" value="Editer">
        </form>
      <?php
    }
  } else {
    ?>
      <form class="" action="?Route=client&Ctrl=signin&Vue=inscription" method="post">
        <h2> Inscrivez-vous </h2>

        <div class="">
          <input class="input" type="lastname" name="lastname" placeholder="Nom de famille" required>
          <label for="lastname">*</label>
        </div>

        <div class="">
          <input class="input" type="name" name="name" placeholder="Prénom" required>
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
          <input type="email" name="mail" placeholder="E-mail" id="email" onchange="checkNumberLetterMdp()" required>
          <label for="mail">*</label>
        </div>

        <div class="">
          <input type="email" name="mail_confirmation" placeholder="Confirmation de l'e-mail" id="email_confirm" onchange="checkSameEmail()" required>
          <label for="mail_confirmation">*</label>
        </div>
        <span id="alerte_email_confirm"></span>

        <div class="">
          <input type="password" name="password" placeholder="Mot de passe" id="mot_de_passe" required>
          <label for="password">*</label>
        </div>
        <span>
          <?php
          if (isset($alerte_mdp)) {
            echo $alerte_mdp;
          }
          ?>
        </span>

        <div class="">
          <input type="password" name="password_confirmation" placeholder="Confirmer mot de passe" id="mot_de_passe_confirm" onchange="checkSameMdp()" required>
          <label for="name">*</label>
          <span id="alerte_mdp_confirm"></span>

        </div>
        <script type="text/javascript" src="<?= ROOT_URL ?>static/js/client/inscription/inscription.js"></script>

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

        <div class="g-recaptcha" data-sitekey="6LeSY40UAAAAAAdGEK1Ooe_3tVt7zafBrx6MkLWW"></div>

        <label for="mentionLegale">Accepter les CGU</label>
        <div class="">
          <input type="checkbox" name="checkCGU" required>
          <label for="checkCGU">*</label>
        </div>



        <input class="inscrire" type="submit" name="register" value="S'inscrire">
      </form>
    <?php
  }
  ?>
  </div>
</div>