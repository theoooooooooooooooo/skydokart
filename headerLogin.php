<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- CSS Import-->
    <link href="/css/containerMain.css" rel="stylesheet">
    <link href="/css/navMenu.css" rel="stylesheet">
    <link href="/css/footer.css" rel="stylesheet">
    <link href="/css/checkingQrCode.css" rel="stylesheet">
    <link href="/css/anthony.css" rel="stylesheet">
    <link href="/css/formAddPilote.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- JS Import -->
    <!-- <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script> -->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/html5-qrcode"></script>
</head>


<!-- <header>
    <div class="container">
        <div class="bottom-menu">
            <nav class="navbar bottom-menu">
                <ul class="navbar-nav ml-auto nav-list">
                  <li class="nav-item"><a href="https://skydo-kart.com" class="nav-link text-uppercase font-weight-bold"><img src="image/iconcasque.png" style="width: 30px; height: 30px;"></a></li>
                  <li class="nav-item"><a href="https://skydo-kart.com/ListeCateg.php" class="nav-link text-uppercase font-weight-bold">Categorie</a></li>
                  <li class="nav-item"><a href="https://skydo-kart.com/checkingQrCode.php" class="nav-link text-uppercase font-weight-bold"><img src="image/iconscan.png" style="width: 30px; height: 30px;"></a></li>
                  <li class="nav-item"><a href="https://skydo-kart.com/deconnexion.php"><img src="image/icondeco.png" style="width: 30px; height: 30px;"></a></li>
                </ul>
            </nav>
        </div>
    </div>
</header> -->

<?php
$timeout = 86400;

//Set the maxlifetime of the session
ini_set( "session.gc_maxlifetime", $timeout );

//Set the cookie lifetime of the session
ini_set( "session.cookie_lifetime", $timeout );

?>

<style>
.navbar-nav.ml-auto {
  margin: auto;
}

.navbar-center {
    display: flex;
    justify-content: center;
}

.nav-list {
    display: flex;
    flex-direction: row;
    align-items: center;
    gap: 10px; /* Ajustez l'espacement selon vos besoins */
}

.nav-item {
    margin-right: 70px; /* Ajustez l'espace horizontal entre les éléments selon vos besoins */
}
</style>
