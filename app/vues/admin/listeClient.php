<div class="card-container-object">
<?php

switch($affiche){
    case 'oui':
        $infoClient = listeClient($nomClient)->fetchAll();
        foreach($infoClient as $info){
?>
            <div class="card-n"  onclick="goToClient()">
                <img src="app/static/image/loading-gif-lp.gif" width="100%" alt="">
                    <div class="banniere">
                        <?php echo $info['prenom']." ".$info['nom'];?>
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
