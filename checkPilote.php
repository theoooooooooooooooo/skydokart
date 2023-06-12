<?php
header('Content-Type: application/json');
checkPilote();

function checkPilote()
{
    include "./bddConn.php";

    // Récupérer piloteId
    $stmt1 = $conn->prepare("SELECT piloteId FROM Roue WHERE code = :code");
    $stmt1->bindParam(':code', $_POST["code"]);
    $stmt1->execute();
    $piloteId = $stmt1->fetchAll(PDO::FETCH_ASSOC);

    // Check Pilote
    $stmt2 = $conn->prepare("SELECT Pilote.*, Accessoires.gants, Accessoires.casque FROM Pilote INNER JOIN Accessoires ON Pilote.id = Accessoires.idPilote
    WHERE Pilote.id = :id;");
    $stmt2->bindParam(':id', $piloteId[0]["piloteId"]);
    $stmt2->execute();
    $piloteInfo = $stmt2->fetch(PDO::FETCH_ASSOC);

    if ($piloteInfo["id"] != "") {
        echo json_encode($piloteInfo);
    } else {
        echo json_encode("Non trouvé");
    }
}
