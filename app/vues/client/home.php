<div class="container-home">
  <div class="authentification">
    <form action="?Route=client&Ctrl=signin&Vue=connexion" method="post">
      <div class="form-control">
        <label for="uname"><b> Identifiant </b></label>
        <input type="text" placeholder="Email" name="email" required>
      </div>

      <div class="form-control">
        <label for="psw"><b> Mot de passe </b></label>
        <input type="password" placeholder="Mot de passe" name="mdp" required>
      </div>

      <a class="forget-pass" href="?Route=client&Ctrl=signin&Vue=mdpOublie">Mot de passe oublié ?</a>

      <input class="connexion" type="submit" value="Connexion">
    </form>

    <form class="inscription-form" action="?Route=client&Ctrl=signin&Vue=inscription" method="post">
      <p>Vous n'êtes toujours pas inscrit ?</p>
      <input class="inscription" type="submit" name="" value="Inscrivez-vous">
    </form>

    <div class="alerte-connexion">
      <?php
      if (isset($alerte)) {
        echo $alerte;
      } ?>
    </div>
  </div>
</div>