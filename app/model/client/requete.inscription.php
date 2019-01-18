<?php

// On connecte la base de donnée

function inscription($bdd, $value) {
    $stmt = $bdd->prepare('INSERT INTO `utilisateur`
      ( `nom`,
        `prenom`,
        `date_naissance`,
        `tel_portable`,
        `mail`,
        `mot_de_passe`,
        `question_securite`,
        `reponse_securite`)
        VALUES(
          :nom,
          :prenom,
          :date_naissance,
          :tel_portable,
          :mail,
          :mot_de_passe,
          :question_securite,
          :reponse_securite
        )');
// bindParam chercher et remplacer
     $stmt->bindParam(':nom', $value['name']);
     $stmt->bindParam(':prenom', $value['lastname']);
     $stmt->bindParam(':date_naissance', $value['date']);
     $stmt->bindParam(':tel_portable', $value['telephone']);
     $stmt->bindParam(':mail', $value['mail']);
     $stmt->bindParam(':mot_de_passe', $value['password']);
     $stmt->bindParam(':question_securite', $value['securityQuestion']);
     $stmt->bindParam(':reponse_securite', $value['securityResponse']);
     //execute la requete
     $stmt->execute();
}


?>
