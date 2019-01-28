<div class="password-forget">
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
        Votre mot de passe est
      </div>
      <div class="display-mdp">
        <p style="font-weight: 600"><?= $mot_de_passe ?></p>
        <?php header("refresh:10;url=index.php"); ?>
        <p style="font-size:10px; color:red">Il ne sera afficher que quelques secondes, notez le bien !</p>
        <img src="<?=ROOT_URL?>/static/image/icon/loading-gif-lp.gif" width="30%" alt="">
      </div>
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
