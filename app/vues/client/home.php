<div class="container-home">
  <section class="first">
      <a href="#" class="scroll-down"> </a>
    <div class="inside">
      <form class="" action="?Route=client&Ctrl=signin&Vue=connexion" method="post">
        <label for="uname"><b> Identifiant </b></label>
        <input type="text" placeholder="Téléphone ou mail" name="email" required> <br>
        <label for="psw"><b> Mot de passe </b></label>
        <input type="password" placeholder="Mot de passe" name="mdp" required>
        <input type="submit" value="Connexion">
      </form>
      <button type="submit" id="gotoInscription"> Inscription </button>
      <br><a href="<?=ROOT_URL?>?Route=admin&amp;Ctrl=client&amp;Vue=logement">DEV: Go to admin</a>
      <a href="<?=ROOT_URL?>?Route=client&amp;Ctrl=logement&amp;Vue=vuePrincipale">DEV: Go to client</a>
      <a href="<?=ROOT_URL?>?Route=adminsupreme&amp;Ctrl=general&amp;Vue=home">DEV: Go to admin supreme</a>
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
