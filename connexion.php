<?php
    include "./bddConn.php";
    session_start();

   $identifiant = $_POST["user"];
   $password = $_POST["password"];

    // Hacher le mot de passe
    $hash = md5($password);

    // Vérifier le login en bdd
    $stmt1 = $conn->prepare("SELECT * FROM user WHERE identifiant = :identifiant AND password = :password");
    $stmt1->bindParam(':identifiant', $identifiant);
    $stmt1->bindParam(':password', $hash);
    $stmt1->execute();
    $isFind = $stmt1->fetch(PDO::FETCH_ASSOC);

    if($isFind){
        // Initialiser variable session
        $_SESSION["user"] = $isFind["identifiant"];
        // Redirection page home
        $newURL = "https://skydo-kart.com"; 
        header('Location: '.$newURL);
        die();
    } else {
        // Redirection vers login
        $newURL = "https://skydo-kart.com/login.php"; 
        header('Location: '.$newURL);
        die();
    }
   