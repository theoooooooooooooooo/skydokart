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


<header>
    <div class="container">
        <div class="bottom-menu">
            <nav class="navbar bottom-menu">
                    <a href="https://skydo-kart.com/" class="navbar-brand text-uppercase font-weight-bold">Skydo Kart</a>
                    <button type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler navbar-toggler-right"><i class="fa fa-bars"></i></button>

                    <div id="navbarSupportedContent" class="collapse navbar-collapse">
                        <ul class="navbar-nav ml-auto">
                            <!-- <li class="nav-item active"><a href="#" class="nav-link text-uppercase font-weight-bold">Home</a></li> -->
                            <li class="nav-item"><a href="https://skydo-kart.com/" class="nav-link text-uppercase font-weight-bold">Liste Pilote</a></li>
                            <li class="nav-item"><a href="https://skydo-kart.com/ListeCateg.php" class="nav-link text-uppercase font-weight-bold">Liste de Categorie</a></li>
                            <li class="nav-item"><a href="https://skydo-kart.com/checkingQrCode.php" class="nav-link text-uppercase font-weight-bold">Scanner code-barres</a></li>
                        </ul>
                        <div class="ml-auto"> <!-- Ajout de la classe ml-auto pour décaler le bouton vers la droite -->
                            <a href="https://skydo-kart.com/deconnexion.php" class="btn btn-outline-info mb-2">Déconnexion</a>
                        </div>
                    </div> 
                </nav>
        </div>
    </div>
</header>

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
</style>
