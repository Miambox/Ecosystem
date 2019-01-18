<div class="droit">

  <div class="card">
    <div class="card-header">
      Utilisateur de l'entreprise
    </div>
    <div class="card-body">
      <table>
        <tr>
          <th>Nom</th>
          <th>Prenom</th>
          <th>Type</th>
          <th>Actions</th>
        </tr>
      <?php
      foreach ($liste_utilisateur as $key => $value) {
        ?>
        <tr>
          <th><?= $value['nom'] ?></th>
          <th><?= $value['prenom'] ?></th>
          <th><?= $value['type'] ?></th>
          <th>
            <form class="" action="index.html" method="post">
              <input type="hidden" name="" value="<?= $value['id'] ?>">
              <input type="submit" name="" value="&times">
            </form>
          </th>
        </tr>
        <?php
      }
      ?>
      </table>

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

          <input type="prenom" name="prenom" placeholder="Prénom">
          <label for="prenom">*</label>

          <input type="" name="telephone" placeholder="Téléphone">
          <label for="telephone">*</label>

          <input type="email" name="mail" placeholder="E-mail">
          <label for="mail">*</label>

          <input type="password" name="password" placeholder="Mot de passe">
          <label for="password">*</label>

          <select class="" name="type">
            <option value="depanneur">dépanneur</option>
            <option value="service_après_vente">service après vente</option>
          </select>
        </div>

        <input type="submit" name="register" value="Inscrire l'employé" >
      </form>
    </div>
  </div>

</div>
