<button type="button" class="goBack" onclick="backToHome()">Retour à la page Piece</button>

<?php
$donneesPiece = donneesPiece($bdd,$idPiece)->fetch();
?>

<div class="container">
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
        foreach($donneesCapteur as $infoCapteur) {
        ?>

        <form action="?Route=admin&Ctrl=client&Vue=detailsCapteur" method="post">
        <input type="hidden" name='id' value="<?php echo $infoPiece['id']?>">
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
        ?>

        </div>
</div>
