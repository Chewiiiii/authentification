<?php
// Informations d'identification
define('DB_SERVER', 'mysql:host=localhost;dbname=authentification');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');

// Connexion à la base de données MySQL 
try {
    $connexion = new PDO(DB_SERVER, DB_USERNAME, DB_PASSWORD,  array(
                                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                                PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
                                ));
    return $connexion;

} catch (PDOException $e) {
    //vérification de la connexion
    echo "Erreur : ".$e->getMessage();
    exit;
}
?>