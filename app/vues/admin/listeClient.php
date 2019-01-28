<div class="card-container-client">
<?php

switch($affiche){
    case 'oui':
        $infoClient = listeClient($bdd, $nomClient);
        foreach($infoClient as $info){
?>
        <form action="?Route=admin&Ctrl=client&Vue=logement" method="post">
        <input type="hidden" name="nomClient" value="<?php echo $nomClient?>">
        <input type="hidden" name='id' value="<?php echo $info['id']?>">
            <div class="card-n">
                <img src="<?=ROOT_URL?>static/image/icon/user4.png" alt="">
                    <div class="banniere">
                        <?php echo $info['prenom']." ".$info['nom'];?>
                    </div>
                    <div>
                        <input type="submit" value="Voir">
                        <button type="button" id="delete" onclick="openDeletePopup(<?= $info['id']?>)">Supprimer</button>
                    </div>
            </div>
            
        </form>
        <!--POP up de suppression-->
        <div class="container-modal" id="container-modal-supprimer<?= $info['id']?>">
              <div class="modal modal-supprimer">
                <div class="modal-head">
                  <button class="close" onclick="closeDeletePopup(<?= $info['id']?>)">&times;</button>
                  <p>Etes-vous sûr de vouloir supprimer ce client ?</p>
                </div>
                <div class="modal-text">
                  <form class="" action="?Route=admin&Ctrl=general&Vue=deleteUser" method="post">
                    <div class="form-group">
                      <label for="mdp-admin">Saisissez le prénom du client : <br></label>
                      <input type="text" name="mdp-admin" placeholder="Prénom du client" required>
                      <input type="hidden" name="id-client" value="<?php echo $info['id'] ?>">
                    </div>
                    <input type="submit" value="Valider">
                  </form>
                </div>
              </div>
            </div>
<?php
        }
?>


            
</div>
<?php
        
        break;
    case 'non':
?>
        <p id="textNoClient">Aucun utilisateur possède ce nom</p>
<?php
        break;
}
?>
