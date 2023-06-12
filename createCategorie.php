<?php
    include "./bddConn.php";

    try {
        $nom = $_POST["nom"];

        // Insertion bdd
        $stmt = $conn->prepare("INSERT INTO Categorie (nom) VALUES (:nom)");
        $stmt->bindParam(':nom', $nom);
    
    
        // Execution requête
        $stmt->execute();
        $idPiloteInserted = $conn->lastInsertId();
        $newURL = "https://skydo-kart.com/ListeCateg.php";
        header('Location: ' . $newURL);
        die();

    } catch (PDOException $e) {
        echo " Erreur: " . $e->getMessage();
    }
    
?>