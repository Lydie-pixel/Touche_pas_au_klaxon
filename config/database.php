<?php

$host = 'localhost';
$port = '3306'; // Port par défaut de MySQL
$dbname = 'touche_pas_au_klaxon';
$username = 'root';
$password = '';

try {
    $db = new PDO(
    "mysql:host=$host;port=$port;dbname=$dbname;charset=utf8",
    $username,
    $password
    );

    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    die("Erreur de connexion à la base de données");
}