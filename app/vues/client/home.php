<div class="container-home">
  <section class="first">
      <a href="#" class="scroll-down"> </a>
    <div class="inside">

      <form class="" action="?Route=client&Ctrl=signin&Vue=connexion" method="post">

        <div class="">
          <label for="uname"><b> Identifiant </b></label>
          <input type="text" placeholder="Téléphone ou mail" name="email" required>
        </div>

        <div class="">
          <label for="psw"><b> Mot de passe </b></label>
          <input type="password" placeholder="Mot de passe" name="mdp" required>
        </div>

        <a href="?Route=client&Ctrl=signin&Vue=mdpOublie">Mot de passe oublié ?</a>

        <input class="connexion" type="submit" value="Connexion">
      </form>

      <form class="" action="?Route=client&Ctrl=signin&Vue=inscription" method="post">
        <p>Vous n'êtes toujours pas inscrit ?</p>
        <input class="inscription" type="submit" name="" value="Inscrivez-vous">
      </form>

      <div class="alerte-connexion">
        <?php
        if(isset($alerte)) {
          echo $alerte;
        } ?>
      </div>
  </div>

  </section>
  	<section class="ok">
  	<div class="bott">
  	<h2> Qui sommes nous ? </h2>
  	<p> Domisep est une société proposant des capteurs aux particuliers. Ces derniers ont la particularité d'être écologiques et économiques. </p> <br>
  	<p> Economisons de l'énergie et de l'argent ! </p>
  	</div>
  	<a href="javascript:" id="return-to-top"><i class="icon-chevron-up"></i></a>
  	<link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
  </section>
</div>
