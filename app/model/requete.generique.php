<?php

/*
Ce fichier permet de définir les principales requêtes utilisées
dans des fonctions.
- INSERT
- SELECTWhere
- SELECTall
*/

include("app/model/dbconnect.php"); // On connecte la base de donnée

/** Récupère tous les éléments d'une table
 * @param PDO $bdd
 * @param string $table
 * @return array
 */
function selectAll(PDO $bdd, string $table): array {
    $query = 'SELECT * FROM ' . $table;
    return $bdd->query($query)->fetchAll();
}

/** Recherche des éléments en fonction des attributs passés en paramètre
 * @param PDO $bdd
 * @param string $table
 * @param array $attributs
 * @return array
 */
function selectWhereAttributs(PDO $bdd, string $table, array $attributs): array {

    $where = "";
    foreach($attributs as $key => $value) {
        $where .= "$key = :$key" . ", ";
    }
    /* http://php.net/manual/fr/function.substr-replace.php */
    $where = substr_replace($where, '', -2, 2);

    /* http://php.net/manual/fr/pdo.prepare.php */
    $statement = $bdd->prepare('SELECT * FROM ' . $table . ' WHERE ' . $where);

    foreach($attributs as $key => $value) {
        $statement->bindParam(":$key", $value);
    }
    $statement->execute();

    return $statement->fetchAll();

}

/** Insère un nouvel élément dans une table
 * @param PDO $bdd
 * @param array $values
 * @param string $table
 * @return boolean
 */
function insert(PDO $bdd, array $values, string $table): bool {

    $attributs = '';
    $valeurs = '';

    foreach ($values as $key => $value) {

        $attributs .= $key . ', ';
        $valeurs .= ':' . $key . ', ';
        $v[] = $value;
    }
    /* http://php.net/manual/fr/function.substr-replace.php */
    $attributs = substr_replace($attributs, '', -2, 2);
    $valeurs = substr_replace($valeurs, '', -2, 2);

    $query = ' INSERT INTO ' . $table . ' (' . $attributs . ') VALUES (' . $valeurs . ')';

    /* http://php.net/manual/fr/pdo.prepare.php */
    $donnees = $bdd->prepare($query);
    $requete = "";
    foreach ($values as $key => $value) {
        $requete = $requete . $key . ' : ' . $value . ', ';
        /* http://php.net/manual/fr/pdostatement.bindparam.php */
        $donnees->bindParam($key, $values[$key], PDO::PARAM_STR);
    }

    return $donnees->execute();
}

function securitePourXSSFail($string) {
  $string = htmlspecialchars($string);
	$string = htmlentities($string);
	return $string;
}

?>
