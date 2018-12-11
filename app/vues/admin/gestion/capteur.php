<button type="button" class="goBack" onclick="goBack()">Retour à la page logement</button>

<div class="container">
    <div class="element">
        <div class="photo">
            <img src="<?=ROOT_URL?>/static/image/icon/cuisine-image.bmp" width="100%" height="100%" alt="">
        </div>
        <div class="title">Cuisine
        </div>
        <p>
            <strong>Surface : </strong>30m<sup>2</sup><br/>
            <strong>Etage : </strong>0<br/>
        </p>
    </div>

        <div class="card-container-object" onclick="goTo()">
            <div class="card-n">
                <img src="<?=ROOT_URL?>/static/image/entreprise/eco-light.png" width="80%" alt="">
                <div class="banniere">
                    Eco'Light
                </div>
            </div>
            <div class="input">
            </div>

        </div>

</div>

<script type="text/javascript">

function goBack() {
  document.location.href="<?=ROOT_URL?>?Route=admin&Ctrl=logement&Vue=vuePrincipale";
}

function goTo() {
  document.location.href="<?=ROOT_URL?>?Route=admin&Ctrl=detailsCapteur&Vue=vuePrincipale";
}
</script>
