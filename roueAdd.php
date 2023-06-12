<?php 

include "./bddConn.php";

// Vérifier si user connecté
session_start();
if(!$_SESSION["user"]){
    $newURL = "https://skydo-kart.com/login.php"; 
    header('Location: '.$newURL);
    die();
}




$query = "SELECT * FROM Pilote";
$data = $conn->query($query)->fetchAll(PDO::FETCH_BOTH);



// Pour chaque pilote
foreach($data as $pilote){
    // Créer 2 roue associé à celui-ci
    echo "</br></br></br>";
    var_dump($pilote["id"]);
    echo "</br>";

    $query2 = "SELECT * FROM Roue WHERE piloteId=" . $pilote["id"] . "";
    $data2 = $conn->query($query2)->fetchAll(PDO::FETCH_BOTH);

    var_dump(count($data2));
    // for($i = 1; $i < 3; $i++) {
    //     // Créer roue
    //      // Insertion des roues
    //      $stmt = $conn->prepare("INSERT INTO Roue (code,piloteId) VALUES (:code, :piloteId)");
    //      $stmt->bindParam(':code', $code);
    //      $stmt->bindParam(':piloteId', $pilote["id"]);

    //      // Liaison des données
    //      $code = "";

    //      // Execution requête
    //      $stmt->execute();
    // }
}
