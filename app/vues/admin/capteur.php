<form action="?Route=admin&Ctrl=client&Vue=piece" method="post" class="retour-in">
    <input type="hidden" name="nomClient" value="<?php echo $nomClient?>">
    <input type="hidden" name="id" value="<?php echo $id?>">
    <input type="hidden" name="id_logement" value="<?php echo $idLogement?>">
    <input type="submit" name="" value="Retour aux pieces">
</form>

<?php
$donneesPiece = donneesPiece($bdd,$idPiece)->fetch();
?>

<div class="container-all">
    <div class="element">
        <div class="photo">
            <img src="<?=ROOT_URL?>/static/image/icon/cuisine-image.bmp" width="100%" height="100%" alt="">
        </div>
        <div class="title">
            <?php echo $donneesPiece['nom'];?>
        </div>
        <p>
            <strong>Surface : </strong><?php echo $donneesPiece['surface'];?>m<sup>2</sup><br/>
            <strong>Etage : </strong><?php echo $donneesPiece['etage']?><br/>
        </p>
    </div>

        <div class="card-container-object">

        <?php
        $donneesCapteur = capteur($bdd, $idPiece)->fetchAll();

        if($donneesCapteur == null) {
        ?>
            <p id='textNoClient'>Aucun capteur enregitré pour cette pièce</p>
        <?php
        }
        else{
            foreach($donneesCapteur as $infoCapteur) {
        ?>

        <!-- <form action="?Route=admin&Ctrl=client&Vue=detailsCapteur" method="post"> -->
        <form action="?Route=client&Ctrl=capteur&Vue=details&id_capteur=<?=$infoCapteur['id'] ?>" method="post">
            <input type="hidden" name="nomClient" value="<?php echo $nomClient?>">
            <input type="hidden" name="id" value="<?php echo $id?>">
            <input type="hidden" name="id_logement" value="<?php echo $idLogement?>">
            <input type="hidden" name='id_piece' value="<?php echo $idPiece?>">
            <input type="hidden" name='id_capteur' value="<?php echo $infoCapteur['id']?>">
            <div class="card-n">
                <img src="<?=ROOT_URL?>/static/image/entreprise/eco-light.png" width="80%" alt="">
                <div class="banniere">
                    <?php echo $infoCapteur['nom']?>
                </div>
                <input type="submit" value="Voir">
            </div>
        </form>

        <?php
            }
        }
        ?>

        </div>
</div>
