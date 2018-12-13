<div class="container">

        <div class="card-container-profil">
            <div class="photo ">
                <img src="<?=ROOT_URL?>/static/image/icon/photo_de_profil.jpg" width="100%" alt="" >
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
                </div>
            </div>
        </div>

        <div class="card-container-object">

            <div class="card-n"  onclick="goToHome1()">
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

<script type="text/javascript">

function goToHome1() {
  document.location.href="<?=ROOT_URL?>?Route=admin&Ctrl=client&Vue=piece";
}
</script>
