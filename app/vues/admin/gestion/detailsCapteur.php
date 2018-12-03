<button type="button" class="goBack" onclick="goBack()">Retour à la page cuisine</button>

<div class="container">
    <div class="element">
        <div class="photo">
            <img src="<?=ROOT_URL?>/static/image/entreprise/eco-light.png" width="100%" alt="">
        </div>
        <div class="on_off">
            <span>Eteindre/Allumer le capteur</span>
            <label class="toggle-button">
            <input type="checkbox">
            <span class="slider round"></span>
            </label>
        </div>
    </div>
    <div class="info">
        <div class="tete">
        <div class="navbar">
            <ul>
              <li><button type="button" onclick="generale()">Générale</button></li>
              <li><button type="button" onclick="programme()">Programme</button></li>
              <li><button type="button" onclick="reglages()">Réglages</button></li>
              <li><button type="button" onclick="ambiances()">Ambiances</button></li>
            </ul>
        </div>
        </div>
        <div id="tableau_de_bord">
            texte
        </div>
        
    </div>
    
</div>

<script type="text/javascript">

function goBack() {
  document.location.href="<?=ROOT_URL?>?Route=admin&Ctrl=capteur&Vue=vuePrincipale";
}

function generale() {
    var div = document.getElementById("tableau_de_bord");  
    div.textContent = "generale";
}

function programme() {
    var div = document.getElementById("tableau_de_bord");  
    div.textContent = "programme";
}

function reglages() {
    var div = document.getElementById("tableau_de_bord");  
    div.textContent = "reglages";
}

function ambiances() {
    var div = document.getElementById("tableau_de_bord");  
    div.textContent = "ambiances";
}

</script>