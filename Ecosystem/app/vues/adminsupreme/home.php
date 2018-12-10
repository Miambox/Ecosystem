<html>
  <head>
  <title>Admin Supreme - EcoSystem</title>
  <link rel="stylesheet" href="<?=ROOT_URL?>/static/css/adminsupreme/home.css" />
  <link rel="stylesheet" href="<?=ROOT_URL?>/static/css/utils/modal/modal-desktop.css">
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
            src="<?=ROOT_URL?>/static/image/icon/user.png" alt="">

            <input type="image" name="button" class="employe" id="button-employe"
            src="<?=ROOT_URL?>/static/image/icon/user.png" alt="">

            <input type="image" name="button" class="employe" id="button-employe"
            src="<?=ROOT_URL?>/static/image/icon/user.png" alt="">

            <input type="image" name="button" class="employe" id="button-employe"
            src="<?=ROOT_URL?>/static/image/icon/user.png" alt="">

            <input type="image" name="button" class="employe" id="button-employe"
            src="<?=ROOT_URL?>/static/image/icon/user.png" alt="">

            <input type="image" name="button" class="employe" id="button-employe"
            src="<?=ROOT_URL?>/static/image/icon/user.png" alt="">

            <input type="image" name="button" class="employe" id="button-employe"
            src="<?=ROOT_URL?>/static/image/icon/user.png" alt="">

            <input type="image" name="button" class="ajouter-employe" id="button-ajout-employe-serviceclient"
            src="<?=ROOT_URL?>/static/image/icon/ajouter.png" alt="">

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
          <div class="container-employe">

            <input type="image" name="button" class="employe" id="button-employe"
            src="<?=ROOT_URL?>/static/image/icon/user.png"  alt="">

            <input type="image" name="button" class="employe" id="button-employe"
            src="<?=ROOT_URL?>/static/image/icon/user.png"  alt="">

            <input type="image" name="button" class="employe" id="button-employe"
            src="<?=ROOT_URL?>/static/image/icon/user.png"  alt="">

            <input type="image" name="button" class="employe" id="button-employe"
            src="<?=ROOT_URL?>/static/image/icon/user.png"  alt="">

            <input type="image" name="button" class="employe" id="button-employe"
            src="<?=ROOT_URL?>/static/image/icon/user.png"  alt="">

            <input type="image" name="button" class="ajouter-employe" id="button-ajout-employe-depanage"
            src="<?=ROOT_URL?>/static/image/icon/ajouter.png"  alt="">

          </div>
        </ul>
      </div>

      <button type="button" name="button" class="button-ajouter-client">+</button>

    </div>

    <div class= "container-modal" id="conteneur_modal_ajout_employe">
      <form action="" class="conteneur_popup_ajout_employe">

        <label for="Nom" class ="champ_popup"><b>Nom</b></label>
        <input type="text" class="entree_popup"placeholder="Nom" name="nom" required>

        <label for="Prenom"class ="champ_popup"><b>Prenom</b></label>
        <input type="text" class="entree_popup"placeholder="Prenom" name="prenom" required>

        <label for="fct"class ="champ_popup"><b>Fonction</b></label>
        <input type="text" class="entree_popup"placeholder="Fonction" name="fonction" >

        <label for="genre"class ="champ_popup"><b>Genre</b></label>
        <input type="text" class="entree_popup"placeholder="Genre" name="genre" >

        <label for="telephone"class ="champ_popup"><b>Télephone portable</b></label>
        <input type="number" class="entree_popup"placeholder="XX XX XX XX XX" name="fonction" >

        <label for="email"class ="champ_popup"><b>Email</b></label>
        <input type="text" class="entree_popup"placeholder="Entrer Email" name="email" required>

        <label for="confirm_email"class ="champ_popup"><b>Confirmation de l'e-mail</b></label>
        <input type="text" class="entree_popup"placeholder="Confirmer Email" name="confirm_email" required>

        <label for="psw"class ="champ_popup"><b>Mot de passe</b></label>
        <input type="password" class="entree_popup"placeholder="Enter Password" name="psw" required>
        <label for="confirm_psw"class ="champ_popup"><b>Confirmation du mot de passe</b></label>
        <input type="password" class="entree_popup"placeholder="Mot de passe" name="confirm_psw" required>

        <button type="submit" class="confirmer-ajout-employe send">Envoyer</button>
        <button type="button" class="fermer-ajout-employe close" id="fermer_modal_ajout_employe">Fermer</button>
      </form>
    </div>
  </div>
  <!--  ajout des scripts JS -->
  <script type="text/javascript" src="<?=ROOT_URL?>static/js/vendor/jquery-3-3-1.js"></script>
  <script type="text/javascript" src="<?=ROOT_URL?>static/js/adminsupreme/home.js"></script>


  </body>
</html>
