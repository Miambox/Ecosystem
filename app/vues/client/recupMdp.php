<div class="password-forget">

  <div class="">
    <form class="" action="?Route=client&Ctrl=signin&Vue=mdpOublie" method="post">
      <label for="email">Rentrez l'email de votre compte :</label>
      <input type="email" name="email" value="" required>
      <input type="submit" name="" value="Envoyer">
    </form>
    <?php if(isset($alerte)) {
      echo $alerte;
    } ?>
  </div>

  <div class="">
    <h4>Ne vous inquiétez pas, cela arrive à tout le monde</h4>
    <iframe src="https://giphy.com/embed/26BROFLJSFhP0cMGk" width="100%" height="240" frameBorder="0" class="giphy-embed" allowFullScreen></iframe>
  </div>

</div>
