<form action="?Route=admin&Ctrl=general&Vue=listeClient" method="post" class="retour-in">
    <input type="hidden" name="nomClient" value="<?php echo $nomClient?>">
    <input type="submit" value="Retour à la liste des clients">
</form>

<?php 
$donneesProfil = donneesProfil($bdd, $id)->fetch();
?>

<div class="container-all">

        <div class="card-container-profil">
            <div class="photo ">

                <img src="<?=ROOT_URL?>/static/image/icon/user4.png" width="100%" alt="" >
                <!-- <img src="<?=ROOT_URL?>/static/image/icon/<?php echo $donneesProfil['photo']?>" width="100%" alt="" > -->
                
            </div>
            <div class="description">
                <div class="title">
                    <?php echo $donneesProfil['prenom'] . " " . $donneesProfil['nom']?>
                </div>
               <div class="subtitle">
                    <!-- Sexe : Homme -->
                </div>
                <br />
                <div class="text">
                    <!-- <strong>N°: </strong>198 0987 0567<br/>
                    <strong>N° de tel : </strong>06.XX.XX.XX.XX<br/>
                    <strong>Mail : </strong>example@eco.com -->
                    
                    <strong>N°: </strong><?php echo $donneesProfil['id']?><br/>
                    <strong>N° de tel : </strong>0<?php echo $donneesProfil['tel_portable']?><br/>
                    <strong>Mail : </strong><?php echo $donneesProfil['mail']?>
                    
                </div>
            </div>
        </div>



        <div class="card-container-object">
        
        <?php
        $donneesLogement = logement($bdd, $id)->fetchAll();
        //var_dump($donneesLogement);
        //echo "</pre>";
        if($donneesLogement == null) {
        ?>
            <p id='textNoClient'>Aucun logement enregistré dans ce compte</p>
        <?php
        }
        else{
            foreach($donneesLogement as $infoLogement) {
        ?>

        <form action="?Route=admin&Ctrl=client&Vue=piece" method="post">
        <input type="hidden" name="nomClient" value="<?php echo $nomClient?>">
        <input type="hidden" name='id' value="<?php echo $donneesProfil['id']?>">
        <input type="hidden" name='id_logement' value="<?php echo $infoLogement['id']?>">
        
            <div class="card-n">
            <img src="<?=ROOT_URL?>/static/image/icon/isep.jpg" height="100%" alt="">
                <div class="banniere">
                    <?php echo $infoLogement['numero'] . " " . $infoLogement['rue']?><br/>
                    <?php echo $infoLogement['ville'] . " " . $infoLogement['code_postal']?>
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
