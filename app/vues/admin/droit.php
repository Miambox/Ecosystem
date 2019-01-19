<div class="droit">

  <div class="card">
    <div class="card-header">
      Utilisateur de l'entreprise
    </div>
    <div class="card-body">
      <ul>
        <li>Nom</li>
        <li>Prenom</li>
        <li>Type</li>
        <li>Actions</li>
      </ul>
      <?php
      foreach ($liste_utilisateur as $key => $value) {
        ?>
        <ul>
          <li><?= $value['nom'] ?></li>
          <li><?= $value['prenom'] ?></li>
          <li><?= $value['type'] ?></li>
          <li>
            <form class="" action="?Route=admin&Ctrl=droit&Vue=supprimerEmploye" method="post">
              <input type="hidden" name="id_user" value="<?= $value['id'] ?>">
              <input type="submit" name="" value="&times">
            </form>
          </li>
        </ul>

        <?php
      }
      ?>
    </div>
  </div>

  <div class="card">
    <div class="card-header">
      Inscrire un nouvel utilisateur
    </div>
    <div class="card-body">
      <form class="" action="?Route=admin&Ctrl=droit&Vue=inscrireUtilisateur" method="post">

        <div class="">
          <input type="text" name="nom" value="" placeholder="Nom" required>
          <label for="nom">*</label>
        </div>

        <div class="">
          <input type="prenom" name="prenom" placeholder="Prénom" required>
          <label for="prenom">*</label>
        </div>

        <div class="">
          <input type="" name="telephone" placeholder="Téléphone" required>
          <label for="telephone">*</label>
        </div>

        <div class="">
          <input type="email" name="mail" placeholder="E-mail" required>
          <label for="mail">*</label>
        </div>

        <div class="">
          <input type="password" name="password" placeholder="Mot de passe" required>
          <label for="password">*</label>
        </div>

        <div class="">
          <select class="" name="type" required>
            <option value="depanneur">dépanneur</option>
            <option value="service_après_vente">service après vente</option>
          </select>
          <label for="password">*</label>

        </div>

        <input type="submit" name="register" value="Inscrire l'employé" >
      </form>
    </div>
  </div>

</div>
