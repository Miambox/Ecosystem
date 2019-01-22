<div class="container-piece-capteurs">
  <div class="container-resume-piece">

    <form class="" action="?Route=client&Ctrl=piece&Vue=vuePrincipale" method="post">
      <input type="hidden" name="id_logement" value="<?php echo $IDLOGEMENT ?>">
      <input type="submit" name="" value="retour aux pieces">
    </form>

    <div class="resume-piece">
      <img class="photo-piece" src="<?=ROOT_URL?>/static/image/icon/piece.jpg" alt="">
      <div class="description-piece">
        <h4><?php echo $donneespiece['nom'] ?></h4>
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
            <nav id="parametres-capteur">
              <ul>
                <li>
                  <a href="#" onclick="openDeletePopup(<?= $donnees['id']?>)">
                  Supprimer
                </a>

                </li>
              </ul>
            </nav>
            <!--POP up suppression-->
            <div class="container-modal" id="container-modal-supprimer<?= $donnees['id']?>">
              <div class="modal modal-supprimer">
                <div class="modal-head">
                  <button class="close" onclick="closeDeletePopup(<?= $donnees['id']?>)">&times;</button>
                  <p>Etes-vous sûr de vouloir supprimer ce capteur?</p>
                </div>
                <div class="modal-text">
                  <form class="" action="?Route=client&Ctrl=capteur&Vue=supprimerCapteur" method="post">
                    <div class="form-group">
                      <label for="code_postal">Rentrer le nom du capteur<br></label>
                      <input type="text" name="nom" value="" required>
                      <input type="hidden" name="id_capteur" value="<?=$donnees['id'] ?>">
                      <input type="hidden" name="id_piece" value="<?=$donneespiece['id'] ?>">
                      <input type="hidden" name="id_logement" value="<?= $IDLOGEMENT ?>">
                    </div>
                    <button type="submit" name="button" class="supprimerLogement">Valider</button>
                  </form>
                </div>
              </div>
            </div>

          </li>
        </ul>
      </div>
      <div class="card-body">
        <img src="<?=ROOT_URL?>/static/image/entreprise/eco-light.png" alt="">
      </div>
      <div class="card-banniere">
      </div>
      <div class="card-footer">
        <form class="" action="?Route=client&Ctrl=capteur&Vue=details" method="post">
          <input type="hidden" name="id_capteur" value="<?php echo $donnees['id'] ?>">
          <input type="submit" name="" class='button-config-capteur' value="Plus de détails">
        </form>
      </div>
    </div>

		<?php
		}
		 ?>

    <form class="" action="?Route=client&Ctrl=capteur&Vue=addCapteur" method="post">
      <input type="hidden" name="id_piece" value="<?php echo $donneespiece['id']  ?>">
      <input type="hidden" name="id_logement" value="<?php echo $IDLOGEMENT  ?>">
      <input type="submit" name="button" value="Ajouter un capteur">
    </form>
  </div>
</div>

<!--
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
-->













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
