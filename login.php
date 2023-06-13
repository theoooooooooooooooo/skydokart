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

