<?php
include "./bddConn.php";

try {
        $nom = $_POST["nom"];
        $id = $_POST["id"];

        $sql = "UPDATE Categorie SET nom = :nom WHERE id = :id";
        $stmt = $conn->prepare($sql);
           
        // Associer la valeur du paramètre
        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':id', $id);
      
        // Exécuter la requête
        $stmt->execute();
        
        $newURL = "https://skydo-kart.com/ListeCateg.php";
        header('Location: ' . $newURL);
            die();
    } catch (PDOException $e) {
        echo "Erreur: " . $e->getMessage();
    }

?>
