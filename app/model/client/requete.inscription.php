<?php

// On connecte la base de donnée

function inscription($bdd, $value) {
  $type = "utilisateur";
  $stmt = $bdd->prepare('INSERT INTO `utilisateur`
    ( `nom`,
      `prenom`,
      `date_naissance`,
      `tel_portable`,
      `mail`,
      `mot_de_passe`,
      `question_securite`,
      `reponse_securite`,
      `type`
    ) VALUES(
      :nom,
      :prenom,
      :date_naissance,
      :tel_portable,
      :mail,
      :mot_de_passe,
      :question_securite,
      :reponse_securite,
      :type
    )');
// bindParam chercher et remplacer
   $stmt->bindParam(':nom', $value['lastname']);
   $stmt->bindParam(':prenom', $value['name']);
   $stmt->bindParam(':date_naissance', $value['date']);
   $stmt->bindParam(':tel_portable', $value['telephone']);
   $stmt->bindParam(':mail', $value['mail']);
   $stmt->bindParam(':mot_de_passe', $value['password']);
   $stmt->bindParam(':question_securite', $value['securityQuestion']);
   $stmt->bindParam(':reponse_securite', $value['securityResponse']);
   $stmt->bindParam(':type', $type);
   //execute la requete
   $stmt->execute();
}


?>
