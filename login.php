
<?php include "./header.php";?>

<div class="content">
    <form method="post" action="connexion.php">
        <div class="formLogin">
            <label for="user">Identifiant:</label>
            <input type="text" id="user" name="user">
            <label for="password">Mot de passe:</label>
            <input type="password" id="password" name="password">
            <label>Afficher mot de passe</label>
            <input type="checkbox" onclick="showPassword()">
            <button type="submit" id="connBtn">Connexion</button>
        </div>
    </form>
</div>


<?php include "./headerLogin.php";?>
</br>
<div class="content">
    <form method="post" action="connexion.php" >
        <div class="formLogin" style="margin-left: 127px;">
            <label for="user" align="center">Identifiant:</label>
            <input type="text" id="user" name="user">
            <label for="password" align="center">Mot de passe:</label>
            <input type="password" id="password" name="password">
            <label style="font-size: 25px" align="center">Afficher mot de passe</label>
            <input type="checkbox" onclick="showPassword()">
            <button type="submit" id="connBtn">Connexion</button>
            </br>
        </div>
    </form>
</div>
<?php include "./footer.php";?>
 cfc03fd8f00ecfd041fcab1ef0a8b8d82d576c4a
<script>
    function showPassword() {
  var x = document.getElementById("password");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
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
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 25px;
        box-sizing: border-box;
        font-size: 16px;
        display: inline-block; /* Ajout de l'affichage en ligne */
    }

    input[type="password"] {
        width: 100%;
        padding: 4px;
        font-size: 25px;
    }

    .button {
        padding: 10px 20px;
        background-color: #f7c957;
        color: #fff;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 16px;
        display: inline-block; /* Ajout de l'affichage en ligne */
        vertical-align: middle; /* Alignement vertical */
    }

    button:hover {
        background-color: #f7c957;
    }

    .qr-reader {
        display: none;
        margin-top: 20px;
        text-align: center;
    }
</style>
 cfc03fd8f00ecfd041fcab1ef0a8b8d82d576c4a
