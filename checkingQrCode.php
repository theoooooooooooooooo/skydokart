<?php 
include "./header.php";
include "./bddConn.php";
?>

<?php
// Vérifier si user connecté
session_start();
if(!$_SESSION["user"]){
    $newURL = "https://skydo-kart.com/login.php"; 
    header('Location: '.$newURL);
    die();
}

?>
<!-- Logo -->
<a href="default.php" class="logo-container">
            <img src="image/logoskydokart.png" alt="Logo" class="logo"></a>
        </div>
<br>
<br>
<br>
<div class="content">
  <br>
  <form method="post" align="center">
    <input type="text" id="codeBar" name="codeBar" required="required" autofocus>
    <input type="hidden" value="Enregistrer">
  </form>
</div>
<h1 class=scan-code align="center">Veuillez scanner le code barre</h1>

<section>
<?php
  $codeBar = $_POST["codeBar"];

  if($codeBar != NULL){
    $stmt = $conn->prepare("SELECT Pilote.id AS ID, Categorie.nom AS nomCateg, Pilote.Nom AS nomPilote, Prenom, Numero, CodeRoueSlick, CodeRouePluie, gants, casque 
    FROM Pilote 
      LEFT JOIN Roue ON Pilote.id = Roue.piloteId
      LEFT JOIN Accessoires ON Pilote.id = Accessoires.idPilote
      LEFT JOIN Categorie ON Pilote.idCategorie = Categorie.id
      WHERE codeRoueSlick = :codeBar OR codeRouePluie = :codeBar OR gants = :codeBar OR casque = :codeBar;");

    $stmt->bindParam(':codeBar', $codeBar);

    // Exécuter la requête
    $stmt->execute();

    // Récupérer les résultats
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if($result != NULL){
      echo "
      <div class=\"content\">
      <style>
        .p{
          color:green;
        }
      </style>
        <p class=\"p\">Nom: ".$result["nomPilote"]."</p>
        <p class=\"p\">Prénom: ".$result["Prenom"]."</p>
        <p class=\"p\">Numéro: ".$result["Numero"]."</p>
      </div>";
    } else {
      echo "
      <div class=\"content\">
      <style>
        .p{
          color:red;
        }
      </style>
        <p class=\"p\">Erreur: Cette objet n'a pas était scanner.
      </div>";
    }
  }
    
?>
</section>



<!-- Pop up
<div class="popupCheckingQrCode" id="popupCheckingQrCode">
        <div class="closePopup"><button class="fabutton" onclick="closePopup('popupCheckingQrCode')"><span class="material-icons" style="font-size: 75px;">close</span></button></div>
        <p id="nomPilote">Nom:</p>
        <p id="prenomPilote">Prénom:</p>
        <p id="numeroPilote">Numéro:</p>
</div> -->

<?php include "./footer.php" ?>

<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f5f5f5;
        margin: 0;
        padding: 0;
    }

    .content {
        max-width: 600px;
        margin: 0 auto;
        padding: 20px;
        background-color: rgb(0, 0, 0);  
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        border-radius: 25px;
        opacity: 70%;
    }

    h1 {
        text-align: center;
        color: white;
        font-size: 50px;
    }

    form { 
        margin-top: 30px;
    }

    label {
        display: block;
        margin-bottom: 5px;
        color: white;
        font-size: 35px;
    }

    input[type="text"] {
        width: 70%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 25px;
        box-sizing: border-box;
        font-size: 16px;
        display: inline-block; /* Ajout de l'affichage en ligne */
    }

    .p{
      text-align: center;
      font-size: 35px;
    }

    .logo-container {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100px; 
  margin-top: -10px; 
}

.logo {
  width: 150px;
  height: 150px;
  
}

/* Media queries pour la tablette Samsung A7 Lite */
@media only screen and (max-width: 800px) {
  .logo-container {
    height: 80px; 
    margin-top: 35px; 
  }

  .logo {
    width: 150px; 
    height: 150px; 
  }
}
</style>