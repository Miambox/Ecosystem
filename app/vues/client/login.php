
<div class="card-login">
  <form class="" action="index.html" method="post">
    <input type="mail" name="mail" placeholder="Entrer votre adresse mail">
    <input type="password" name="password" placeholder="Mot de passe">
    <span>Mot de passe oublié ?</span>
    <div>
      <input class="connexion" type="submit" name="login" value="Connexion">
      <input class="inscrire" type="submit" name="register" value="S'inscrire" onclick="window.location=''">
    </div>
  </form>
</div>
<div class="" style="margin-left: 40%;">
  <!-- <a href="<?=ROOT_URL?>?Route=admin&amp;Ctrl=general&amp;Vue=home">DEV: Go to admin</a> -->
  <a href="<?=ROOT_URL?>?Route=client&amp;Ctrl=general&amp;Vue=home">DEV: Go to client</a>
  <a href="<?=ROOT_URL?>?Route=adminsupreme&amp;Ctrl=general&amp;Vue=home">DEV: Go to admin supreme</a>
</div>
