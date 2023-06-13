<?php
include "./bddConn.php";

try {
    // Suppression des accessoires associés au pilote
    $stmt1 = $conn->prepare("DELETE FROM Accessoires WHERE idPilote = :id");
    $stmt1->bindParam(':id', $id);

    // Liaison des données
    $id = $_GET["id"];

    // Execution requête
    $stmt1->execute();

    // Suppression de toutes les roues associées au pilote
    $stmt2 = $conn->prepare("DELETE FROM Roue WHERE piloteId = :id");
    $stmt2->bindParam(':id', $id);

    // Execution requête
    $stmt2->execute();

    // Suppression du pilote
    $stmt3 = $conn->prepare("DELETE FROM Pilote WHERE id = :id");
    $stmt3->bindParam(':id', $id);

    // Execution requête
    $stmt3->execute();

    $newURL = "https://skydo-kart.com";
    header('Location: ' . $newURL);
    die();
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>