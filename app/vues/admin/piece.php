<form action="?Route=admin&Ctrl=client&Vue=logement" method="post" class="retour-in">
    <input type="hidden" name="nomClient" value="<?php echo $nomClient?>">
    <input type="hidden" name="id" value="<?php echo $id?>">
    <input type="submit" name="" value="Retour aux logements">
</form>

<?php
$donneesLogement = donneesLogement($bdd,$idLogement)->fetch();
?>

<div class="container-all">
    <div class="element">
        <div class="photo">
            <img src="<?=ROOT_URL?>/static/image/icon/isep.jpg" width="100%" height=100% alt="">
            <!--
            <img src="<?=ROOT_URL?>/static/image/icon/<?php echo $donneesLogement['photo']?>" width="100%" height=100% alt="">
            -->
        </div>
        <!-- <div class="title">
            16 rue Clemenceau<br/>
            Paris, 75005
        </div> -->

        <div class="title">
            <?php echo $donneesLogement['numero'] . " ". $donneesLogement['rue']?><br/>
            <?php echo $donneesLogement['ville'] . ", " . $donneesLogement['code_postal']?>
        </div>

        <p>
            <!-- <strong>Surface : </strong>110m<sup>2</sup><br/>
            <strong>Nombre d'habitant : </strong>3<br/>
            <strong>Diagnostique énergétique : </strong>E<br/>
            <strong>Année de construction : </strong>1996<br/>
            <strong>Nombre totale de pièces : </strong>8<br/> -->
            
            <strong>Surface : </strong><?php echo $donneesLogement['surface']?>m<sup>2</sup><br/>
            <strong>Nombre d'habitant : </strong><?php echo $donneesLogement['nbr_habitant']?><br/>
            <strong>Année de construction : </strong><?php echo $donneesLogement['annee_construction']?><br/>
            
        </p>
    </div>


        <div class="card-container-object">

        <?php
        $donneesPiece = piece($bdd, $idLogement)->fetchAll();

        if($donneesPiece == null) {
        ?>
            <p id='textNoClient'>Aucune piece enregistrée pour ce logement</p>
        <?php
        }
        else{
            foreach($donneesPiece as $infoPiece) {
        ?>

        <form action="?Route=admin&Ctrl=client&Vue=capteur" method="post">
        <input type="hidden" name="nomClient" value="<?php echo $nomClient?>">
        <input type="hidden" name="id" value="<?php echo $id?>">
        <input type="hidden" name="id_logement" value="<?php echo $idLogement?>">
        <input type="hidden" name='id_piece' value="<?php echo $infoPiece['id']?>">
            <div class="card-n">
                <img src="<?=ROOT_URL?>/static/image/icon/piece.jpg" width="100%" alt="">
                <div class="banniere">
                    <?php echo $infoPiece['nom'];?>
                </div>
                <input type="submit" value="Voir">
            </div>
        </form>

            <!-- <div class="card-n">
                <img src="<?=ROOT_URL?>/static/image/icon/cuisine-image.bmp" width="100%" alt="">
                <div class="banniere">
                    Cuisine
                </div>
            </div>
            <div class="input">
            </div>

            <div class="card-n">
                <img src="<?=ROOT_URL?>/static/image/icon/veranda-image.bmp" width="100%" alt="">
                <div class="banniere">
                    Véranda
                </div>
            </div>
            <div class="input">
            </div>

            <div class="card-n">
                <img src="<?=ROOT_URL?>/static/image/icon/chambre-image.bmp" width="100%" alt="">
                <div class="banniere">
                    Chambre 1
                </div>
            </div>
            <div class="input">
            </div>

            <div class="card-n">
                <img src="<?=ROOT_URL?>/static/image/icon/salle-de-bain-image.bmp" width="100%" alt="">
                <div class="banniere">
                    Salle de bain
                </div>
            </div>
            <div class="input">
            </div> -->

        <?php
            }
        }
        ?>
        </div>

</div>
