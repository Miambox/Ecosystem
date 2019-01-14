<?php

/*
try
{
	// On se connecte à MySQL
	$bdd = new PDO('mysql:host=localhost;dbname=ecosystem;charset=utf8', 'root', 'root');
}
catch(Exception $e)
{
	// En cas d'erreur, on affiche un message et on arrête tout
        die('Erreur : '.$e->getMessage());
}


$capteur = $bdd->query('SELECT * FROM objet o
                        INNER JOIN piece p ON o.id_piece = p.id
                        WHERE p.id = 1
                        ');
$piece = $bdd->query('SELECT * FROM piece p
											WHERE p.id = 1
											');
$donneespiece = $piece->fetch()


<a href="javascript:history.back()">Retour aux pieces</a>
*/


?>


<div class="container-piece-capteurs">
  <div class="container-resume-piece">

    <form class="button" action="?Route=client&Ctrl=piece&Vue=vuePrincipale" method="post">
      <input type="hidden" name="id_logement" value="<?php echo $donneespiece['id'] ?>">
      <input type="submit" name="" value="retour aux pieces">
    </form>

    <div class="resume-piece">
      <img class="photo-piece" src="<?=ROOT_URL?>/static/image/icon/cours-isep.jpg" alt="">
      <div class="description-piece">
        <h4><?php echo $donneespiece['nom']; ?></h4>
        <p>Type: <?php echo $donneespiece['type'] ?></p>
        <p>Surface: <?php echo $donneespiece['surface'] ?>m²</p>
				<?php
					if ($donneespiece['etage'] != 9999)
					echo 'Etage: ' . $donneespiece['etage']
				 ?>
      </div>
    </div>
  </div>

  <div class="container-capteurs">
		<?php
		while ($donnees = $donneesCapteur->fetch())
		{
		?>
    <div class="card-capteur">
      <div class="card-head">
        <ul>
          <li><h5><?php echo $donnees['nom']; ?></h5></li>
          <li>
            <button type="button" name="button" class="button-config-capteur" id="button-config-capteur" onclick="ouvreParemetresLogement()">
              <img src="<?=ROOT_URL?>/static/image/icon/parameters-logo-lp.png" width="100%" alt="">
            </button>
            <nav id="parametres-capteur">
              <ul>
                <li><a href="#" onclick="supprimer()">Supprimer</a></li>
              </ul>
            </nav>
          </li>
        </ul>
      </div>
      <div class="card-body">
        <img src="<?=ROOT_URL?>/static/image/entreprise/eco-light.png" alt="">
      </div>
      <div class="card-banniere">
      </div>
      <div class="card-footer">
        <form class="btn-capteur" action="?Route=client&Ctrl=capteur&Vue=details" method="post">
          <input type="hidden" name="id_capteur" value="<?php echo $donnees['id'] ?>">
          <input type="submit" name="" value="Plus de détails">
        </form>
      </div>
    </div>

		<?php
		}
		 ?>

    <button type="button" name="button" onclick="ajouterCapteur()">+</button>
    <form class="" action="?Route=client&Ctrl=capteur&Vue=addCapteur" method="post">
      <input type="hidden" name="id_piece" value="<?php echo $donneespiece['id']  ?>">
      <input type="submit" name="button" value="+">
    </form>
  </div>
</div>

<div class="container-modal" id="container-modal-supprimer">
  <div class="modal modal-supprimer">
    <div class="modal-head">
      <button class="close" id="close-supprimer">&times;</button>
      <p>Etes-vous sûr de vouloir supprimer ce capteur?</p>
    </div>
    <div class="modal-text">
      <form class="" action="#" method="post">
        <div class="form-group">
          <label for="code_postal">Rentrer le nom de la piece<br></label>
          <input type="text" name="code_postal" value="">
        </div>
        <button type="submit" name="button" class="supprimerLogement">Valider</button>
      </form>
    </div>
  </div>
</div>

<script type="text/javascript">
  function modal(modal, close) {
    modal.css("display", "block");

    close.click(function(e) {
      modal.css("display", "none");
    });
    window.onclick = function(event) {
      if (event.target == modal) {
          modal.css("display", "none");
      }
    };
  }

  function ouvreParemetresLogement() {
    $("#parametres-capteur").slideToggle("fast");
  }

  function goTo() {
    document.location.href="<?=ROOT_URL?>?Route=client&Ctrl=capteur&Vue=details";
  }

  function ajouterCapteur() {
    document.location.href="<?=ROOT_URL?>?Route=client&Ctrl=capteur&Vue=addCapteur";
  }

  function supprimer() {
    console.log("supprimer mon logement");
    $("#parametres-logement").slideToggle("fast");
    var containerModal = $("#container-modal-supprimer");
    var close = $("#close-supprimer");
    modal(containerModal, close);
  }
</script>
