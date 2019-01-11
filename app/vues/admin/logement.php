<div class="container">

        <div class="card-container-profil">
            <div class="photo ">
                <img src="<?=ROOT_URL?>/static/image/icon/photo_de_profil.jpg" width="100%" alt="" >
                <!--
                <img src="<?=ROOT_URL?>/static/image/icon/<?php echo $donneesProfil['photo']?>" width="100%" alt="" >
                -->
            </div>
            <div class="description">
                <div class="title">
                    Dupont Charles
                </div>
               <div class="subtitle">
                    Sexe : Homme
                </div>
                <div class="text">
                    <strong>N°: </strong>198 0987 0567<br/>
                    <strong>N° de tel : </strong>06.XX.XX.XX.XX<br/>
                    <strong>Mail : </strong>example@eco.com
                    <!--
                    <strong>N°: </strong><?php echo $donnees['id']?><br/>
                    <strong>N° de tel : </strong><?php echo $donneesProfil['tel_portable']?><br/>
                    <strong>Mail : </strong><?php echo $donneesProfil['mail']?>
                    -->
                </div>
            </div>
        </div>

        <div class="card-container-object">

            <div class="card-n"  onclick="goToHome()">
            <img src="<?=ROOT_URL?>/static/image/icon/maison-image.bmp" width="100%" alt="">
                <div class="banniere">
                    16 rue Clemenceau<br/>
                    Paris, 75005
                </div>
            </div>


            <div class="card-n">
            <img src="<?=ROOT_URL?>/static/image/icon/maison-image2.bmp" width="100%" alt="">
                <div class="banniere">
                    86 rue Vaugirard<br/>
                    Paris, 75015
                </div>
            </div>

        </div>

</div>
