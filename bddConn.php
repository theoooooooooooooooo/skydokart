<?php
// Connexion bdd
$servername = "194.163.46.7";
$username = "u449106897_admin";
$password = "stagiaireDev974#";

try {
    $conn = new PDO("mysql:host=$servername;dbname=u449106897_skydokart", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 

} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
