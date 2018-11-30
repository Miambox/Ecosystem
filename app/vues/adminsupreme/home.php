<html>
  <head>
  <title>Admin Supreme - EcoSystem</title>
  <link rel="stylesheet" href="<? ROOT_URL?>/static/css/adminsupreme/home.css" />
  <link rel="stylesheet" href="<? ROOT_URL?>/static/css/utils/modal.css">
  <body id="all">


  <div class = "container-suprême-admin">
    <div class="titre-page-admin">
      <h1>Bienvenue au "Suprême administrateur"</h1>
    </div>
    <div class="container-card-sup-admin">
      <div class = "card-sup-admin">

        <ul>
          <li>
            <div class="titre-card-sup-admin">
              <h5>Service client</h5>
            </div>
          </li>
          <li>
            <button type="button" name="button" class="button-modifier" id="button_modifier">Modifier</button>
          </li>
          <div class="container-employe">

            <input type="image" name="button" class="employe" id="button-employe"
            src="<?ROOT_URL?>/static/image/icon/user.png" width="50%" alt="">

            <input type="image" name="button" class="employe" id="button-employe"
            src="<?ROOT_URL?>/static/image/icon/user.png" width="50%" alt="">

            <input type="image" name="button" class="employe" id="button-employe"
            src="<?ROOT_URL?>/static/image/icon/user.png" width="50%" alt="">

            <input type="image" name="button" class="employe" id="button-employe"
            src="<?ROOT_URL?>/static/image/icon/user.png" width="50%" alt="">

            <input type="image" name="button" class="ajouter-employe" id="button-ajout-employe"
            src="<?ROOT_URL?>/static/image/icon/ajouter.png" width="50%" alt="">


          </div>
        </ul>
      </div>

      <div class = "card-sup-admin">
        <ul>
          <li>
            <div class="titre-card-sup-admin">
              <h5>Dépannage</h5>
            </div>
          </li>
          <li>
            <button type="button" name="button" class="button-modifier" id="button_modifier">Modifier</button>
          </li>
          <div class="container-employe"
            <input type="image" name="button" class="employe" id="button-employe"
            src="<?ROOT_URL?>/static/image/icon/user.png" width="50%" alt="">

            <input type="image" name="button" class="employe" id="button-employe"
            src="<?ROOT_URL?>/static/image/icon/user.png" width="50%" alt="">

            <input type="image" name="button" class="employe" id="button-employe"
            src="<?ROOT_URL?>/static/image/icon/user.png" width="50%" alt="">

            <input type="image" name="button" class="employe" id="button-employe"
            src="<?ROOT_URL?>/static/image/icon/user.png" width="50%" alt="">

            <input type="image" name="button" class="employe" id="button-employe"
            src="<?ROOT_URL?>/static/image/icon/user.png" width="50%" alt="">

            <input type="image" name="button" class="ajouter-employe" id="button-ajout-employe"
            src="<?ROOT_URL?>/static/image/icon/ajouter.png" width="50%" alt="">

          </div>
        </ul>
      </div>


      <input type="image" name="button" class="ajouter-employe" id="button-ajout-employe"
      src="<?ROOT_URL?>/static/image/icon/ajouter.png" width="90%" alt="">
    </div>


    <form action="" class="conteneur_popup_ajout_employe">

      <label for="Nom"><b>Nom</b></label>
      <input type="text" placeholder="Nom" name="nom" required>

      <label for="Prenom"><b>Password</b></label>
      <input type="text" placeholder="Prenom" name="prenom" required>

      <label for="fct"><b>fonction</b></label>
      <input type="text" placeholder="Fonction" name="fonction" >

      <label for="genre"><b>Genre</b></label>
      <input type="text" placeholder="Genre" name="genre" >

      <label for="telephone"><b>Télephone portable</b></label>
      <input type="number" placeholder="XX XX XX XX XX" name="fonction" >

      <label for="email"><b>Email</b></label>
      <input type="text" placeholder="Entrer Email" name="email" required>

      <label for="confirm_email"><b>Confirmation de l'e-mail</b></label>
      <input type="text" placeholder="Confirmer Email" name="confirm_email" required>

      <label for="psw"><b>Mot de passe</b></label>
      <input type="password" placeholder="Enter Password" name="psw" required>
      <label for="confirm_psw"><b>Confirmation du mot de passe</b></label>
      <input type="password" placeholder="Mot de passe" name="confirm_psw" required>

      <button type="submit" class="confirmer-ajout-employe">envoyer</button>
      <button type="button" class="fermer-ajout-employe">Close</button>
    </form>
  </div>


  </body>
</html>
