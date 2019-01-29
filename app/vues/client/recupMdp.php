<div class="password-forget">
  <script type="text/javascript" src="<?=ROOT_URL?>static/js/client/inscription/inscription.js"></script>

  <div class="">
    <?php
    if($enterMail == 0) {
      ?>
      <form class="" action="?Route=client&Ctrl=signin&Vue=mdpOublie" method="post">
        <label for="email">Rentrez l'email de votre compte :</label>
        <input type="email" name="email" value="" required>
        <input type="submit" name="" value="Envoyer">
      </form>
      <div class="">
        <h4>Ne vous inquiétez pas, cela arrive à tout le monde</h4>
        <iframe src="https://giphy.com/embed/26BROFLJSFhP0cMGk" width="100%" height="240" frameBorder="0" class="giphy-embed" allowFullScreen></iframe>
      </div>
      <?php if(isset($alerte)) {
        echo $alerte;
      }
    } else if($enterMail == 2) {
      ?>
      <div class="head-recup">
        Changez votre mot de passe
      </div>
      <form class="" action="?Route=client&Ctrl=signin&Vue=updaterMdp" method="post">
        <input type="hidden" name="id_user" value="<?= $id_user ?>">
        <input type="password" name="password" id="mot_de_passe" placeholder="" value="" required>
        <input type="password" name="password_confirm" id="mot_de_passe_confirm" placeholder="Confirmer mot de passe" value="" onchange="checkSameMdp()" required>
        <span id="alerte_mdp_confirm"></span>
        <span>
          <?php
          if(isset($alerte_mdp)) {
            echo $alerte_mdp;
          }
          ?>
        </span>
        <input type="submit" name="" value="Changer">
      </form>
      <?php
    } else {
      ?>
      <div class="head-recup">
        Question de sécurité
      </div>
      <form class="" action="?Route=client&Ctrl=signin&Vue=recupMdpDeux" method="post">
        <input type="text" name="nom" placeholder="Nom" value="" required>
        <label for="name">*</label>
        <input type="text" name="prenom" placeholder="Prenom" value="" required>
        <label for="name">*</label>
        <div class="">
          <select class="" name="question_securite" required>
            <option value="Quel est le nom de jeune fille de ma mère ?">Quel est le nom de jeune fille de ma mère ?</option>
            <option value="Quel est le mon deuxième prenom ?">Quel est le mon deuxième prenom ?</option>
            <option value="Quel est le nom de mon animal de compagnie ?">Quel est le nom de mon animal de compagnie ?</option>
          </select>
          <label for="name">*</label>
        </div>
        <input type="text" name="reponse_securite" placeholder="Réponse" value="" required>

        <div class="g-recaptcha" data-sitekey="6LeSY40UAAAAAAdGEK1Ooe_3tVt7zafBrx6MkLWW"></div>
        <input type="submit" name="" value="Récupérer"><br>
        <?php if(isset($alerte)) {
          echo $alerte;
        }?>
      </form>
      <?php
    }
    ?>
  </div>

</div>
