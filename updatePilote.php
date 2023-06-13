<?php
include "./bddConn.php";

try {
    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $numero = $_POST["numero"];
    $idCategorie = $_POST["categorie"];
    $id = $_POST["id"];


    $sql = "UPDATE Pilote SET Nom=?, Prenom=?, Numero=?, idCategorie =? WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$nom, $prenom, $numero, $idCategorie, $id]);

    // Récupérer les informations des gants et du casque associés au pilote modifié
    $stmt1 = $conn->prepare("SELECT * FROM Accessoires WHERE Accessoires.idPilote = :id");
    $stmt1->bindParam(':id', $id);
    $stmt1->execute();
    $result1 = $stmt1->fetchAll(PDO::FETCH_ASSOC);

    // Récupérer les roues associer à l'id du pilote modifié
    $stmt2 = $conn->prepare("SELECT * from Roue WHERE piloteId = :id");
    $stmt2->bindParam(':id', $id);
    $stmt2->execute();
    $result2 = $stmt2->fetchAll(PDO::FETCH_ASSOC);


    // Pour chaque Accessoires modifier le code en bdd
        $casque = $_POST["casque"];
        $gants = $_POST["gants"];
        $combinaison = $_POST["combinaison"];
        $chassis = $_POST["chassis"];
        $moteur = $_POST["moteur"];
        // Modification 
        $sql4 = "UPDATE Accessoires SET casque=?, gants=?, combinaison=?, chassis=?, moteur=? WHERE idPilote=?";
        $stmt4 = $conn->prepare($sql4);
        $stmt4->execute([$casque, $gants, $id]);


    // Pour chaque Roue modifier le code en bdd
    foreach ($result2 as $key => $roue) {
        $codeRoueSlick = $_POST["roueSlick".($key+1)];
        $codeRouePluie = $_POST["rouePluie".($key+1)];
        // Modification
        $sql3 = "UPDATE Roue SET CodeRoueSLick=?, CodeRouePluie=? WHERE id=?";
        $stmt3 = $conn->prepare($sql3); 
        $stmt3->execute([$codeRoueSlick, $codeRouePluie, $roue["id"]]);

    }
    $newURL = "https://skydo-kart.com/";
    header('Location: ' . $newURL);
    die();
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

?>