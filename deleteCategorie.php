<?php
include "./bddConn.php";

// Alert confirmation


try {
    // Suppression de toute les roues associer au Pilote
    $stmt = $conn->prepare("DELETE FROM Pilote WHERE idcategorie = :id ");
    $stmt->bindParam(':id', $id);
    
    // Liaison des données
    $id = $_POST["id"];

    // Execution requête
    $stmt->execute();

    // Suppression du pilote
    $stmt2 = $conn->prepare("DELETE FROM Categorie WHERE id = :id ");
    $stmt2->bindParam(':id', $id);
    $id = $_POST["id"];
    $stmt2->execute();

    $newURL = "https://skydo-kart.com/ListeCateg.php"; 
    header('Location: '.$newURL);
    die();

} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
