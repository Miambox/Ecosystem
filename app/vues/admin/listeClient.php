<div class="card-container-object">
<?php

switch($affiche){
    case 'oui':
        $infoClient = listeClient($bdd, $nomClient);
        foreach($infoClient as $info){
?>
        <form action="?Route=admin&Ctrl=client&Vue=logement" method="post">
        <input type="hidden" name='id' value="<?php echo $info['id']?>">
            <div class="card-n">
                <img src="<?=ROOT_URL?>static/image/icon/user-profil.png" width="100%" alt="">
                    <div class="banniere">
                        <?php echo $info['prenom']." ".$info['nom'];?>
                    </div>
                    <input type="submit" value="Voir">
            </div>
        </form>
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
