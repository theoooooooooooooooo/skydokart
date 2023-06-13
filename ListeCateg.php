<?php
include "./header.php";
include "./bddConn.php";

// Récupérer tous les Categories
$query = "SELECT * FROM Categorie";
$data = $conn->query($query)->fetchAll(PDO::FETCH_BOTH);


?>


<title>Liste Categorie Test25</title>

<title>Liste Categorie</title>
 cfc03fd8f00ecfd041fcab1ef0a8b8d82d576c4a

<body>
    <div class="content">
        <?php
            session_start();
            // Vérifier si l'utilisateur est connecté
            if (!isset($_SESSION["user"])) {
                $newURL = "https://skydo-kart.com/login.php";
                header('Location: ' . $newURL);
                die();
            }
        ?>

        <!-- Barre de recherche -->
        <div class="search-container" style="text-align: right;">
            <span id="search-icon" class="material-icons" style="cursor: pointer;">search</span>
            <input type="text" id="search-input" placeholder="Rechercher..." style="display: none;">
        </div>
        <script>
        const searchIcon = document.getElementById('search-icon');
        const searchInput = document.getElementById('search-input');

        searchIcon.addEventListener('click', function() {
        searchInput.style.display = 'inline-block';
        searchInput.focus();
        });
        </script>

        <!-- Logo -->
        <a href="default.php" class="logo-container">
            <img src="image/logoskydokart.png" alt="Logo" class="logo"></a>
        </div>
        <br>
        <br>
        <div class="center-container">

        <a href="formAddCategorie.php" class="newCategorie"><button class="button">Nouvelle Catégorie</button></a></div>

        <a href="formAddCategorie.php" class="newCategorie"><button class="button">Nouvelle Categorie</button></a></div>
cfc03fd8f00ecfd041fcab1ef0a8b8d82d576c4a
        <ul class="responsive-table">
            </br>
            </br>
             <?php foreach ($data as $el) { ?>

                <li class="table-row">
                    <!-------------------------------->
                    <div class="center">
                        <div class="col"><?php echo $el[0] ?></div>
                        <div class="col"><?php echo $el[1] ?></div>
                    </div>
                    <div class="col options">
                        <form method="post" action="singleCategorie.php">
                            <button class="fabutton"><span class="material-icons" style="font-size: 40px;">feed</span></button><input type="hidden" id="id" name="id" value=<?php echo $el[0] ?>></form>

                <li class="table-row" href="singleCategorie.php"> 
                    <!-------------------------------->
                    <div class="center">
                        <div class="col" style="font-size: 25px;"><?php echo $el[1] ?></div>
                    </div>
                    <div class="col options">
                        <form method="post" action="singleCategorie.php">
                            <button class="fabutton"><span class="material-icons" style="font-size: 40px; color: white;">feed</span></button><input type="hidden" id="id" name="id" value=<?php echo $el[0] ?>></form>
 cfc03fd8f00ecfd041fcab1ef0a8b8d82d576c4a
                            <br>
                            <form method="post" action="formUpdateCategorie.php">
                            <button class="fabutton">
                                <img src="image/iconedit.png" alt="Edit" style="width: 30px; height: 30px;">
                            </button>
                            <input type="hidden" id="id" name="id" value=<?php echo $el[0] ?>>
                        </form>
                        <br>
                        <form method="post" action="deleteCategorie.php">
                            <button class="fabutton" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette catégorie ?')">
                                <img src="image/iconsupp.png" alt="Delete" style="width: 30px; height: 30px;">
                            </button>
                            <input type="hidden" id="id" name="id" value=<?php echo $el[0] ?>>
                        </form>
                    </div>
                </li>
            <?php } ?>
        </ul>
    </div>

    <!-- <div id="myModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <iframe src="formAddCategorie.php" frameborder="0" width="100%" height="100%"></iframe>
        </div>
    </div> -->

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            // Fonction de recherche en temps réel
            $('#search-input').on('keyup', function() {
                var value = $(this).val().toLowerCase();
                $('.table-row').filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });

        function openModal() {
            var modal = document.getElementById('myModal');
            modal.style.display = 'block';
        }

        function closeModal() {
            var modal = document.getElementById('myModal');
            modal.style.display = 'none';
        }
    </script>
<style>

.center-container {
    display: flex;
    justify-content: center;
}

.button {
    padding: 10px 20px;
    background-color: #F7C957;
    color: black;
    border: none;
    border-radius: 30px;
    cursor: pointer;
    font-size: 16px;
}

.button:hover {
    background-color: #F7C957;
}

    .modal {
        display: none;
        position: fixed;
        z-index: 9999;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgba(0, 0, 0, 0.5);
    }

    .modal-content {
        background-color: #fefefe;
        margin: auto;
        padding: 20px;
        width: 80%;
        max-width: 800px;
        height: 80%;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        overflow: auto;
        border: none; /* Supprimer les bordures */
        box-shadow: none; /* Supprimer l'ombre */
    }

    .close {
        color: #aaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
        cursor: pointer;
    }

    .close:hover,
    .close:focus {
        color: black;
        text-decoration: none;
        cursor: pointer;
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


.search-container {
  text-align: right;
  margin-top: 80px; 
  margin-right: 50px;
}

#search-input {
  display: none;
}
</style>
</style>





</body>

<?php include "./footer.php" ?>


