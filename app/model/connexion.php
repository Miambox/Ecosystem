<?php

try {
    $bdd = new PDO('mysql:host=localhost; dbname=eco_system_test; charset=utf8','root','root',
        array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)
    );
}
catch(Exception $e)
{
    die('Erreur : '.$e->getMessage());
}

?>
