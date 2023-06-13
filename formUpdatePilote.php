<?php
include "./header.php";
include "./bddConn.php";

// Récupérer les info du pilote via l'id passé en GET
$query = "SELECT * FROM Pilote WHERE id = " . $_GET['id'] . "";
$dataPilote = $conn->query($query)->fetch(PDO::FETCH_BOTH); 

// Récupérer les roues slicks associée au pilote
$query = "SELECT CodeRoueSlick FROM Roue WHERE piloteId = " . $_GET['id'] . "";
$dataRoues = $conn->query($query)->fetchAll(PDO::FETCH_BOTH);

// Récupérer les roues pluies associée au pilote
$query = "SELECT CodeRouePluie FROM Roue WHERE piloteId = " . $_GET['id'] . "";
$dataRoues2 = $conn->query($query)->fetchAll(PDO::FETCH_BOTH);

// Récupérer les accessoires associée au pilote
$query = "SELECT casque, gants FROM Accessoires WHERE idPilote = " . $_GET['id'] . "";
$dataAccessoires = $conn->query($query)->fetch(PDO::FETCH_ASSOC);
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

<title>Modification d'un Pilote</title>

<body>
</br>
  <div class="content">
  <a href="https://skydo-kart.com"><img src="image/iconback.png" alt="back" style="width: 45px; height: 45px;"></a>
  <br>
  <br>  
    <h1>Modification d'un pilote</h1>
    <form method="post" action="updatePilote.php" id="UpdatePilote">
      <input id="id" name="id" type="hidden" value=<?php echo $dataPilote["id"] ?>>
      <label for="nom">Nom:</label>
      <input type="text" id="nom" name="nom" value="<?php echo $dataPilote["Nom"] ?>" required="required">
      <br><br>
      <label for="prenom">Prénom:</label> 
      <input type="text" id="prenom" name="prenom" value="<?php echo $dataPilote["Prenom"] ?>" required="required">
      <br><br>
      <label for="prenom">Numéro:</label>
      <input type="text" id="numero" name="numero" value="<?php echo $dataPilote["Numero"] ?>" required="required">
      <br><br>
      <label for="casque">Casque:</label>
      <input type="text" id="casque" name="casque" value="<?php echo $dataAccessoires["casque"] ?>">
      <br><br>
      <label for="gants">Gants:</label>
      <input type="text" id="gants" name="gants" value="<?php echo $dataAccessoires["gants"] ?>" >
      <br><br>
      <label for="roueSlick1">Roue Slick 1:</label>
      <input type="text" id="roueSlick1" name="roueSlick1" value="<?php echo $dataRoues[0]["CodeRoueSlick"] ?>">
      <br><br>
      <label for="roueSlick2">Roue Slick 2:</label>
      <input type="text" id="roueSlick2" name="roueSlick2" value="<?php echo $dataRoues[1]["CodeRoueSlick"] ?>">
      <br><br>
      <label for="roueSlick3">Roue Slick 3:</label>
      <input type="text" id="roueSlick3" name="roueSlick3" value="<?php echo $dataRoues[2]["CodeRoueSlick"] ?>">
      <br><br>
      <label for="rou4">Roue Slick 4:</label>
      <input type="text" id="roueSlick4" name="roueSlick4" value="<?php echo $dataRoues[3]["CodeRoueSlick"] ?>">
      <br><br>
      <label for="roueSlick5">Roue Slick 5:</label>
      <input type="text" id="roueSlick5" name="roueSlick5" value="<?php echo $dataRoues[4]["CodeRoueSlick"] ?>">
      <br><br>
      <label for="roueSlick6">Roue Slick 6:</label>
      <input type="text" id="roueSlick6" name="roueSlick6" value="<?php echo $dataRoues[5]["CodeRoueSlick"] ?>">
      <br><br>
      <label for="rouePluie1">Roue Pluie 1:</label>
      <input type="text" id="rouePluie1" name="rouePluie1" value="<?php echo $dataRoues2[0]["CodeRouePluie"] ?>">
      <br><br>
      <label for="rouePluie2">Roue Pluie 2:</label>
      <input type="text" id="rouePluie2" name="rouePluie2" value="<?php echo $dataRoues2[1]["CodeRouePluie"] ?>">
      <br><br>
      <label for="rouePluie3">Roue Pluie 3:</label>
      <input type="text" id="rouePluie3" name="rouePluie3" value="<?php echo $dataRoues2[2]["CodeRouePluie"] ?>">
      <br><br>
      <label for="rou4">Roue Pluie 4:</label>
      <input type="text" id="rouePluie4" name="rouePluie4" value="<?php echo $dataRoues2[3]["CodeRouePluie"] ?>">
      <br><br>
      <label for="rouePluie5">Roue Pluie 5:</label>
      <input type="text" id="rouePluie5" name="rouePluie5" value="<?php echo $dataRoues2[4]["CodeRouePluie"] ?>">
      <br><br>
      <label for="rouePluie6">Roue Pluie 6:</label>
      <input type="text" id="rouePluie6" name="rouePluie6" value="<?php echo $dataRoues2[5]["CodeRouePluie"] ?>">
      <br><br>
      <label for="categorie">Catégorie:
    <select name="categorie" id="categorie">
      <?php
      // Récupérer les catégories depuis la base de données
      $stmt = $conn->prepare("SELECT id, nom FROM Categorie");       
      $stmt->execute();
      $categories = $stmt->fetchAll(PDO::FETCH_ASSOC);

      // Générer les options
      foreach ($categories as $categorie) {
        if ($categorie['id'] == $dataPilote['idCategorie']){
          echo '<option selected value=' . $categorie['id'] . '>' . $categorie['nom'] . '</option>';
        } else {
          echo '<option value=' . $categorie['id'] . '>' . $categorie['nom'] . '</option>';
        }
        } 
        ?>

    </select></label>
    <br><br>
      <input class="button" type="submit" value="Enregistrer" onclick="return confirm('Êtes-vous sûr de vouloir modifier ce pilote?')">
    </form>
  </div>
  <p id="test"></p>
  <div id="qr-reader"></div>
</body>
<?php include "./footer.php" ?>

<script>
  document.addEventListener("DOMContentLoaded", function() {
    // Sélectionnez le formulaire par son ID
    var form = document.getElementById("UpdatePilote");

    // Écoutez l'événement de pression de touche sur le formulaire
    form.addEventListener("keydown", function(event) {
      // Vérifiez si la touche pressée est Entrée (code 13)
      if (event.keyCode === 13) {
        // Annulez l'action par défaut du formulaire
        event.preventDefault();
        return false;
      }
    });
  });
</script>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f5f5f5;
        margin: 0;
        padding: 0;
    }

    .content {
        max-width: 570px;
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
      width: 71%;
      padding: -6px;
      border: 1px solid #ccc;
      border-radius: 25px;
      box-sizing: border-box;
      font-size: 30px;
      display: inline-block;
    }

    .button {
        padding: 10px 20px;
        background-color: #f7c957;
        opacity: 1;
        color: #black;
        border: none;
        border-radius: 25px;
        cursor: pointer;
        font-size: 20px;
        display: inline-block; /* Ajout de l'affichage en ligne */
        vertical-align: middle; /* Alignement vertical */
        margin-left: 190px;
    }

    button:hover {
        background-color: #45a049;
    }

    .qr-reader {
        display: none;
        margin-top: 20px;
        text-align: center;
    }
</style>

</html>