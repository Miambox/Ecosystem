
        <!-- Corps de la page -->

    <div id="container">
        <div id="containerleft">
            <figure class="profil">
                        <img src="<?=ROOT_URL?>static/image/icon/user-profil.png" alt="">

            </figure>

            <div class="informations">

                            <h3 id="num"> Numéro d'identification </h3>
                            <h3> Nom </h3>
                            <h3> Prénom </h3>
                            <h3> Date de naissance </h3>
                            <h3> Numéro de téléphone </h3>
                            <h3> Adresse mail </h3>
            </div>

            <div class = "partage">
                <h2> Mes partages </h2>
                <a href="<?=ROOT_URL?>?Route=client&amp;Ctrl=logement&amp;Vue=vuePrincipale" title="mes partages"> <img src="<?=ROOT_URL?>static/image/icon/add.png" alt="">
                </a>

            </div>
        </div>

        <div id="containeright">

                <div class="logements">
                    <h2> Mes logements </h2>
                    <figure class="maison">
                        <a href="<?=ROOT_URL?>?Route=client&amp;Ctrl=logement&amp;Vue=vuePrincipale" title="Voir mes logements"> <img src="<?=ROOT_URL?>static/image/icon/maison.png" alt="">
                        </a>
                    </figure>

                </div>

                <div class="capteurs">
                    <h2> Mes capteurs </h2>
                    <figure class="ecolight">
                    </figure>


                </div>
        </div>
    </div>
