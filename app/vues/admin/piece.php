<button type="button" class="goBack" onclick="goBack()">Retour à la page profil client</button>

<div class="container">
    <div class="element">
        <div class="photo">
            <img src="<?=ROOT_URL?>/static/image/icon/maison-image.bmp" width="100%" height=100% alt="">
        </div>
        <div class="title">16 rue Clemenceau<br/>
           Paris, 75005
        </div>
        <p>
            <strong>Surface : </strong>110m<sup>2</sup><br/>
            <strong>Nombre d'habitant : </strong>3<br/>
            <strong>Diagnostique énergétique : </strong>E<br/>
            <strong>Année de construction : </strong>1996<br/>
            <strong>Nombre totale de pièces : </strong>8<br/>
        </p>
    </div>


        <div class="card-container-object">

            <div class="card-n">
                <img src="<?=ROOT_URL?>/static/image/icon/salon-image.bmp" width="100%" alt="">
                <div class="banniere">
                    Salon
                </div>
            </div>
            <div class="input">
            </div>

            <div class="card-n" onclick="goToCuisine()">
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
            </div>

        </div>

</div>

<script type="text/javascript">

function goBack() {
  document.location.href="<?=ROOT_URL?>?Route=admin&Ctrl=client&Vue=logement";
}

function goToCuisine() {
  document.location.href="<?=ROOT_URL?>?Route=admin&Ctrl=client&Vue=capteur";
}
</script>
