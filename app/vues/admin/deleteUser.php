<form action="?Route=admin&Ctrl=general&Vue=general" method="post">
    <input type="submit" value="Retour à l'accueil">
</form>
<?php

if(strcmp($mdp,$trueMdp['prenom'])==0) {
    deleteUser($bdd,$id);
?>
<div class='msg-container'>
    <p class="deleteMsg">Client supprimé</p>
</div>
<?php
} else {
?>
<div class='msg-container'>
    <p class="deleteMsg">Mot de passe incorrect</p>
</div>
<?php
}