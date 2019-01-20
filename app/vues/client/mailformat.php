<style media="screen">
  .card{
    width: 400px;
    height: 400px;
    border: solid 1px rgba(0,0,0,0.3);
    border-radius: 4px;
    box-shadow: 1px 2px 2px 2px rgba(0,0,0,0.3);
    background-color: white;
  }
  .card-header {
    height: 50px;
    width: 100%;
    text-align: center;
    font-size: 20px;
    font-weight: 600px;
    margin-top: 4%;
    border-bottom: solid 1px rgba(0,0,0,0.3);
  }
  .card-body {
    text-align: justify;
  }
</style>
<?php $value['mail']; ?>
<div class="card">
  <div class="card-header">
    Demande de récupération de mot de passe
  </div>
  <div class="card-body">
    <p>Cher <?= $prenom?>,<br></p>
    <p>Vous venez d'effectuer une demande de récupération de mot de passe.<br>
    <p>Le voici: <?= $mdp ?>.<br></p>
    Si ce n'est pas vous qui avait fait cette demande de récupération, méfiez-vous !
    Changez votre mot de passe, via votre profil. <br></p>

    <p>En cas de soucis, nous sommes toujours là pour vous !<br></p>

    Bonne journée !
  </div>
</div>
