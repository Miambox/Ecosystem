<?php
include("app/model/requete.generique.php"); // On connecte la base de donnée

/**
* Fonction permettant de selectionner tous les logements d'un utilisateur
* ainsi que ceux qu'on lui a partagé.
**/
function selectionerLogement($bdd) {
  $utilisateurId = $_SESSION['id'];

  $query = 'SELECT * FROM logement WHERE id_utilisateur =:utilisateurId';
  $donnees = $bdd->prepare($query);
  $donnees->bindParam(":utilisateurId", $utilisateurId);
  $donnees->execute();
  $liste_logement = $donnees->fetchAll();

  $query = 'SELECT * FROM logement
            INNER JOIN partagelogement
            ON logement.id = partagelogement.id_logement
            AND partagelogement.id_utilisateur = :utilisateurId';
  $donnees = $bdd->prepare($query);
  $donnees->bindParam(":utilisateurId", $utilisateurId);
  $donnees->execute();
  return array_merge($liste_logement,$donnees->fetchAll());
}

function  selectionnerLogementById($bdd, $id_logement) {

  $query = 'SELECT * FROM logement WHERE id=:id_logement';
  $donnees = $bdd->prepare($query);
  $donnees->bindParam(":id_logement", $id_logement);
  $donnees->execute();
  return $donnees->fetchAll();

}

/**
* Fonction permettant d'ajouter un logement
**/
function insererNouveauLogement($bdd, $logement) {

  $id_utilisateur = $_SESSION['id'];

  $query = 'INSERT INTO logement(
    numero,
    rue,
    ville,
    code_postal,
    nbr_habitant,
    surface,
    annee_construction,
    id_utilisateur
  ) VALUES (
    :numero,
    :rue,
    :ville,
    :code_postal,
    :nbr_habitant,
    :surface,
    :annee_construction,
    :id_utilisateur
  )';

  $donnees = $bdd->prepare($query);

  $donnees->bindParam(":numero", $logement['numero']);
  $donnees->bindParam(":rue", $logement['rue']);
  $donnees->bindParam(":ville", $logement['ville']);
  $donnees->bindParam(":code_postal", $logement['code_postal']);
  $donnees->bindParam(":nbr_habitant", $logement['nbr_habitant']);
  $donnees->bindParam(":surface", $logement['surface']);
  $donnees->bindParam(":annee_construction", $logement['annee_construction']);
  $donnees->bindParam(":id_utilisateur", $id_utilisateur);

  $request = $donnees->execute();
  return $request;
}

function updaterLogement($bdd, $value, $id_logement) {
  $query = 'UPDATE logement SET
            numero              =:numero,
            rue                 =:rue,
            ville               =:ville,
            code_postal         =:code_postal,
            nbr_habitant        =:nbr_habitant,
            surface             =:surface,
            annee_construction  =:annee_construction
            WHERE id   =:id_logement';
  $donnees = $bdd->prepare($query);
  $donnees->bindParam(":id_logement", $id_logement);
  $donnees->bindParam(":numero", $value['numero']);
  $donnees->bindParam(":rue", $value['rue']);
  $donnees->bindParam(":ville", $value['ville']);
  $donnees->bindParam(":code_postal", $value['code_postal']);
  $donnees->bindParam(":nbr_habitant", $value['nbr_habitant']);
  $donnees->bindParam(":surface", $value['surface']);
  $donnees->bindParam(":annee_construction", $value['annee_construction']);
  return $donnees->execute();
}

/**
* Fonction permettant de supprimer un logement
**/
function supprimerLogement($bdd, $logement) {
  $queryVerif = 'SELECT code_postal FROM logement WHERE logement.id = :logement_id';
  $donneesVerif = $bdd->prepare($queryVerif);
  $donneesVerif->bindParam(":logement_id", $logement['id']);
  $donneesVerif->execute();
  $response = $donneesVerif->fetchAll();
  foreach ($response as $key => $value) {
    $code_postal = $value['code_postal'];
  }
  if($donneesVerif) {
    if($code_postal == $logement['code_postal']) {
      $query = 'DELETE FROM logement WHERE id = :logement_id';
      $donnees = $bdd->prepare($query);
      $donnees->bindParam(":logement_id", $logement['id']);
      return $donnees->execute();
    } else {
      return false;
    }
  } else {
    return false;
  }
}

/**
* Fonction permettant d'insérer un nouveau partage de logement
**/
function insererNouveauPartageLogement($bdd, $user_partage) {
  $query = 'SELECT * FROM utilisateur
            WHERE nom=:nom and prenom=:prenom and mail=:mail';
  $donnees = $bdd->prepare($query);
  $donnees->bindParam(":nom", $user_partage['nom']);
  $donnees->bindParam(":prenom", $user_partage['prenom']);
  $donnees->bindParam(":mail", $user_partage['mail']);
  $donnees->execute();
  $response = $donnees->fetchAll();
  foreach ($response as $key => $value) {
    $id_user_sharing = $value['id'];
  }
  if($response) {
    $query = 'INSERT INTO partagelogement(
      id_logement,
      id_utilisateur
    ) VALUES (
      :id_logement,
      :id_utilisateur
    )';

    $donnees = $bdd->prepare($query);

    $donnees->bindParam(":id_logement", intval($user_partage['id_logement']));
    $donnees->bindParam(":id_utilisateur", intval($id_user_sharing));
    return $donnees->execute();
  } else {
    return false;
  }

}

// function selectionnerSensor($bdd) {
//   $utilisateurId = $_SESSION['id'];

//   $query = 'SELECT * FROM logement WHERE id_utilisateur =:utilisateurId';
//   $donnees = $bdd->prepare($query);
//   $donnees->bindParam(":utilisateurId", $utilisateurId);
//   $donnees->execute();
//   $liste_logement = $donnees->fetchAll();


//   foreach($liste_logement as $key => $logem) {

//     $query = 'SELECT * FROM piece WHERE id_piece =:id_piece';
//     $donnees = $bdd->prepare($query);
//     $donnees->bindParam(":id_piece", $logem['id_piece']);
//     $donnees->execute();
//     $liste_logement = $donnees->fetchAll();

//   }
// }

?>
