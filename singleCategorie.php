<?php
include "./bddConn.php";
include "./header.php";

// Vérifier si user connecté
session_start();
if(!$_SESSION["user"]){
    $newURL = "https://skydo-kart.com/login.php"; 
    header('Location: '.$newURL);
    die();
}



try {
    $id = $_POST['id'];

    // Préparer la requête avec un paramètre lié
    $stmt = $conn->prepare("SELECT Categorie.nom AS nomCategorie, Pilote.id, Pilote.Nom AS nomPilote, Prenom, Numero FROM Categorie INNER JOIN Pilote ON idCategorie = Categorie.id WHERE Categorie.id = :id");

  
    // Associer la valeur du paramètre
    $stmt->bindParam(':id', $id);
  
    // Exécuter la requête
    $stmt->execute();

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);


} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();   
}
?>

<title>Détails de la Categorie</title>
<body>
    </br>
    </br>
    <div class="content">
        <a href="https://skydo-kart.com/ListeCateg.php"><img src="image/iconback.png" alt="back" style="width: 45px; height: 45px;"></a>
        </br>
        </br>
        <p class="id" align='center'>Nom Catégorie: <?php echo $result["nomCategorie"]; ?></p>
        </br>
        <table align='center'>
			<thead>
				<tr>
					<th>Nom Pilote</th>
					<th>Prénom Pilote</th>
					<th>Numéro</th> 
				</tr>
			</thead>
            <?php 
                foreach($result as $ligne){
                    echo "
                        <tr>
                            <td>" . $ligne["nomPilote"] . "</td>
                            <td>" . $ligne["Prenom"] . "</td>
                            <td>" . $ligne["Numero"] . "</td>
                            <td> <a href=\"formUpdatePilote.php?id=" . $ligne['id'] . "\"><img src=\"image/iconcasquejaune.png\" width=\"30\" height=\"30\"/></a> </td>  
  
                        </tr>";

                }
            ?>
        </table>
    </div>
</body>
<?php include "./footer.php" ?>
<style> 
        .content {
            max-width: 570px;
            margin: 0 auto;
            padding: 20px;
            background-color: rgb(0, 0, 0);  
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 25px;
            opacity: 70%;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }

        table th,
        table td {
            border: 1px solid black;
            padding: 8px;
        }

        table th:first-child,
        table td:first-child {
            border-top-left-radius: 8px;
            border-bottom-left-radius: 8px;
        }

        table th:last-child,
        table td:last-child {
            border-top-right-radius: 8px;
            border-bottom-right-radius: 8px;
        }

        th, td {
            border: 2px solid #000000;
            padding: 8px;
            text-align: center;
            color: white;
        }

        th {
            background-color: #f7c957;
        }

        p{
            color: white;
        }

        .footer-content p{
            color: black;
        }
    </style>