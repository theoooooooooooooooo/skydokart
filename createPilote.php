<?php
include "./bddConn.php";
include "./header.php";

// Vérifier si l'utilisateur est connecté
session_start();
if(!$_SESSION["user"]){
    $newURL = "https://skydo-kart.com/login.php"; 
    header('Location: '.$newURL);
    die();
}


try {
    $stmt = $conn->prepare("INSERT INTO Pilote (nom, prenom, numero, idCategorie) VALUES (:nom, :prenom, :numero, :idCategorie)");
    $stmt->bindParam(':nom', $nom);
    $stmt->bindParam(':prenom', $prenom);
    $stmt->bindParam(':numero', $numero);
    $stmt->bindParam(':idCategorie', $idCategorie);

    // Liaison des données
    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $numero = $_POST["numero"];
    $idCategorie = $_POST["categorie"];

    // Exécution de la requête
    $stmt->execute();
    $idPiloteInserted = $conn->lastInsertId();

    //Insertion des accessoires


    $stmt2 = $conn->prepare("INSERT INTO Accessoires (casque, gants, idPilote) VALUES (:casque, :gants, :id)");
    $stmt2->bindParam(':casque', $casque);
    $stmt2->bindParam(':gants', $gants);

    $stmt2 = $conn->prepare("INSERT INTO Accessoires (casque, gants, combinaison, chassis, moteur, idPilote) VALUES (:casque, :gants, :combinaison, :chassis, :moteur, :id)");
    $stmt2->bindParam(':casque', $casque);
    $stmt2->bindParam(':gants', $gants);
    $stmt2->bindParam(':combinaison', $combinaison);
    $stmt2->bindParam(':chassis', $chassis);
    $stmt2->bindParam(':moteur', $moteur);
 cfc03fd8f00ecfd041fcab1ef0a8b8d82d576c4a
    $stmt2->bindParam(':id', $idPiloteInserted);

    // Liaison des données
    $casque = $_POST["casque"];
    $gants = $_POST["gants"];

    $combinaison = $_POST["combinaison"];
    $chassis = $_POST["chassis"];
    $moteur = $_POST["moteur"];
cfc03fd8f00ecfd041fcab1ef0a8b8d82d576c4a

    // Exécution de la requête
    $stmt2->execute();


    if ($idPiloteInserted) {
        // Insertion des roues
        $stmt = $conn->prepare("INSERT INTO Roue (CodeRoueSlick, CodeRouePluie, piloteId) VALUES (:slick, :pluie, :piloteId)");
        $stmt->bindParam(':slick', $CodeRoueSlick);
        $stmt->bindParam(':pluie', $CodeRouePluie);
        $stmt->bindParam(':piloteId', $idPiloteInserted);

        for ($i = 1; $i < 7; $i++) {
            // Liaison des données
            $CodeRoueSlick = $_POST["roueSlick" . $i];
            $CodeRouePluie = $_POST["rouePluie" . $i];

            // Exécution de la requête
            $stmt->execute();
        }
    }

    $newURL = "https://skydo-kart.com/";
    header('Location: ' . $newURL);
    die();
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
