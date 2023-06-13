<?php
include "./header.php";
include "./bddConn.php"
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

<title>Ajout de Pilote</title>

<body>
</br>
  <div class="content">
    <a href="https://skydo-kart.com"><img src="image/iconback.png" alt="back" style="width: 45px; height: 45px;"></a>   
    <h1>Ajout d'un pilote</h1>
      <form method="post" action="createPilote.php" id="AddPilote">
        <label for="nom">Nom :
        <input type="text" id="nom" name="nom" required></label>
        <br><br>
        <label for="prenom">Prénom :
        <input type="text" id="prenom" name="prenom" required></label>
        <br><br>
        <label for="numero">Numéro :
        <input type="text" id="numero" name="numero" required></label>
        <br><br>
        <label for="gants">Gants : 
        <input type="text" id="gants" name="gants"></label>
        <br><br>
        <label for="casque">Casque :
        <input type="text" id="casque" name="casque"></label>
        <br><br>
        <label for="roueSlick1">Roue slick 1 :
        <input type="text" id="roueSlick1" name="roueSlick1"></label>
        <br><br>
        <label for="roueSlick2">Roue slick 2 :
        <input type="text" id="roueSlick2" name="roueSlick2"></label>
        <br><br>
        <label for="roueSlick3">Roue slick 3 :
        <input type="text" id="roueSlick3" name="roueSlick3"></label>
        <br><br>
        <label for="roueSlick4">Roue slick 4 :
        <input type="text" id="roueSlick4" name="roueSlick4"></label>
        <br><br>
        <label for="roueSlick5">Roue slick 5 :
        <input type="text" id="roueSlick5" name="roueSlick5"></label>
        <br><br>
        <label for="roueSlick6">Roue slick 6 :
        <input type="text" id="roueSlick6" name="roueSlick6"></label>
        <br><br>
        <label for="rouePluie1">Roue pluie 1 :
        <input type="text" id="rouePluie1" name="rouePluie1"></label>
        <br><br>
        <label for="rouePluie2">Roue pluie 2 :
        <input type="text" id="rouePluie2" name="rouePluie2"></label>
        <br><br>
        <label for="rouePluie3">Roue pluie 3 :
        <input type="text" id="rouePluie3" name="rouePluie3"></label>
        <br><br>
        <label for="rouePluie4">Roue pluie 4 :
        <input type="text" id="rouePluie4" name="rouePluie4"></label>
        <br><br>
        <label for="rouePluie5">Roue pluie 5 :
        <input type="text" id="rouePluie5" name="rouePluie5"></label>
        <br><br>
        <label for="rouePluie6">Roue pluie 6 :
        <input type="text" id="rouePluie6" name="rouePluie6"></label>
        <br><br>
        <label for="categorie">Catégorie:
        <select name="categorie" id="categorie" required>
        <option value= 0 >---Veuillez choisir une catégorie---</option>
          <?php
          // Récupérer les catégories depuis la base de données
          $stmt = $conn->prepare("SELECT id, nom FROM Categorie");        
          $stmt->execute();
          $categories = $stmt->fetchAll(PDO::FETCH_ASSOC);

          // Générer les options
          foreach ($categories as $categorie) {
              echo '<option value=' . $categorie['id'] . '>' . $categorie['nom'] . '</option>';
          }
          ?>
        </select></label>
        <br><br>
        <div class="button-container">
          <input class="button" type="submit" value="Enregistrer">
        </div>
      </form>
  </div>
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
      font-size: 31px;
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

    .button-container {
    display: flex;
    justify-content: center;
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
    <div id="qr-reader"></div>
  </div>
</body>
<?php include "./footer.php" ?>

<script>
  document.addEventListener("DOMContentLoaded", function() {
    // Sélectionnez le formulaire par son ID
    var form = document.getElementById("AddPilote");

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


</html>