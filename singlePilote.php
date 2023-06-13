<?php
include "./bddConn.php";
include "./header.php";

// Vérifier si l'utilisateur est connecté
session_start();
if (!$_SESSION["user"]) {
    $newURL = "https://skydo-kart.com/login.php";
    header('Location: ' . $newURL);
    die();
}

try {
    $id = $_GET["id"];

    // Préparer la requête avec un paramètre lié
    $stmt = $conn->prepare("SELECT Categorie.nom AS nomCateg, Pilote.Nom AS nomPilote, Prenom, Numero 
    FROM Pilote LEFT JOIN Categorie 
        ON Pilote.idCategorie = Categorie.id 
    WHERE Pilote.id = :id;");

    // Associer la valeur du paramètre
    $stmt->bindParam(':id', $id);

    // Exécuter la requête
    $stmt->execute();

    // Récupérer les résultats
    $result = $stmt->fetch(PDO::FETCH_ASSOC); 

    // Récupérer les roues slick de ce pilote
    $stmt2 = $conn->prepare("SELECT CodeRoueSlick FROM Roue WHERE piloteId = :piloteId");
    $stmt2->bindParam(':piloteId', $id);
    $stmt2->execute();
    $result2Slick = $stmt2->fetchAll(PDO::FETCH_ASSOC);

    // Récupérer les roues pluie de ce pilote
    $stmt3 = $conn->prepare("SELECT CodeRouePluie FROM Roue WHERE piloteId = :piloteId");
    $stmt3->bindParam(':piloteId', $id);
    $stmt3->execute();
    $result3Pluie = $stmt3->fetchAll(PDO::FETCH_ASSOC);

    $stmt4 = $conn->prepare("SELECT * FROM Accessoires WHERE idPilote = :id");
    $stmt4->bindParam(':id', $id);
    $stmt4->execute();

    // Récupérer les résultats
    $result4 = $stmt4->fetch(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>

<title>Détails d'un pilote</title>
<body>
    <div class="content">
        <p class="nom">Nom: <?php echo $result["nomPilote"] ?></p>
        <p class="prenom">Prénom: <?php echo $result["Prenom"] ?></p>
        <p class="numero">Numéro: <?php echo $result["Numero"] ?></p>
        <p class="casque">Casque: <?php echo $result4["casque"] ?></p>
        <p class="gants">Gant: <?php echo $result4["gants"] ?></p>

        <?php
        for ($i = 0; $i < count($result2Slick); $i++) {
            ?>
            <p><?php echo "Roue Slick " . ($i + 1) . ": " . $result2Slick[$i]["CodeRoueSlick"] ?></p>
            <?php
        }
    
        for ($i = 0; $i < count($result3Pluie); $i++) {
            ?>
            <p><?php echo "Roue Pluie " . ($i + 1) . ": " . $result3Pluie[$i]["CodeRouePluie"] ?></p>
            <?php
        }
        ?>
        <p class="categ">Categorie: <?php echo $result["nomCateg"]?></p>

<a href="https://skydo-kart.com/"><button>Retour</button></a>

</div>
</body>
<?php include "./footer.php" ?>