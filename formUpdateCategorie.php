<?php
include "./header.php";
include "./bddConn.php";

// Récupérer les info du pilote via l'id passé en GET
$query = "SELECT * FROM Categorie WHERE id = " . $_POST['id'] .";";
$dataCategorie = $conn->query($query)->fetch(PDO::FETCH_BOTH);

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

<title>Modification d'une Categorie</title>

<body>
</br>
  <div class="content">
  <a href="https://skydo-kart.com/ListeCateg.php"><img src="image/iconback.png" alt="back" style="width: 45px; height: 45px;"></a>
    <h1>Modification d'une Catégorie</h1>
    <form method="post" action="updateCategorie.php">
      <input id="id" name="id" type="hidden" value=<?php echo $dataCategorie["id"] ?>>
      <label for="nom">Nom:
      <input type="text" id="nom" name="nom" value="<?php echo $dataCategorie["nom"] ?>" required="required"></label> 
      </br>      
      <input class="button" type="submit" value="Enregistrer" onclick="return confirm('Êtes-vous sûr de vouloir modifier cette catégorie?')">
    </form>
  </div>
</body>
<?php include "./footer.php" ?>

</html>

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