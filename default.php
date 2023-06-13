
<?php
include "./header.php";
include "./bddConn.php";
 
// Récupérer tous les pilotes
$query = "SELECT * FROM Pilote";
$data = $conn->query($query)->fetchAll(PDO::FETCH_BOTH);
?>

<title>Liste pilote</title>

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
        <div class="entete">
        <a href="formAddPilote.php" class="newPilote">
                <img src="image/iconaddpilote.png" alt="Nouveau pilote">    
        </a>

          <!-- Logo -->
          <a href="default.php" class="logo-container"><img src="image/logoskydokart.png" alt="Logo" class="logo"></a>
        </div>
    </div>

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
    
        
        <ul class="responsive-table">
            <!-- <li class="table-header">
                <form action="" method="POST" class="sortForm">
                    <div class="col.header1">
                        <input type="submit" name="tri_alphabetique" id="alphabetique" value="Nom &#8593; &#8595;" class="btn-sort">
                    </div>
                    <div class="col.header2">
                        <input type="submit" name="tri_numerique" id="numérique" value="Numéro &#8593; &#8595;" class="btn-sort">
                    </div>
                </form>
            </li> -->

            <?php foreach ($data as $el) { ?>
                <li class="table-row">
                    <!-- Ajout de l'image du pilote -->
                    <div class="piloteImg"> 
                        <img src="" alt="">
                    </div>
                    <!-------------------------------->
                    <div class="center">
                        <p class="col" style="font-size: 25px;"><?php echo $el[1] ?></p>
                        <p class="col" style="font-size: 25px;"><?php echo $el[2] ?></p>
                        <p class="col" style="font-size: 25px;"><?php echo $el[3] ?></p>
                    </div>  
                    <div class="col options">
                        <form method="get" action="formUpdatePilote.php">
                            <button class="fabutton">
                                <img src="image/iconedit.png" alt="Edit" style="width: 30px; height: 30px;">
                            </button>
                            <input type="hidden" id="id" name="id" value=<?php echo $el[0] ?>>
                        </form>
                        <br>
                        <form method="get" action="deletePilote.php">
                            <button class="fabutton" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce pilote ?')">
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
            <iframe src="formAddPilote.php" frameborder="0" width="100%" height="100%"></iframe>
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
</body>

<?php include "./footer.php" ?>

<style>
.entete {
  display: flex;
  flex-wrap: nowrap;
  justify-content: space-evenly;
  align-content: center;
  align-items: flex-end;
  flex-direction: row;
}

.logo-container {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 80px;
  margin-top: -50px;
}

.logo {
  width: 130px;
  height: 130px;
}

.search-container {
  text-align: right;
  margin-top: -150px;
  margin-right: 50px;
}

.newPilote {
  width: 50px;
  height: 50px;
  margin-top: 100px;
}

/* Media queries pour la tablette Samsung A7 */
@media only screen and (max-width: 767px) {
  .entete.logo-container {
    flex-basis: 40%;
    max-width: 40%;
  }

  .entete.search-container {
    flex-basis: 40%;
    max-width: 40%;
  }

  .entete.newPilote {
    flex-basis: 40%;
    max-width: 40%;
  }

  .logo-container {
    height: 80px;
    margin-top: 5px; 
    margin-right: 200px;
  }

  .logo {
    width: 100px;
    height: 100px;
  }
  .newPilote img {
    width: 100px;
    height: 100px;
    }
}

@media only screen and (max-width: 390px) {
.logo-container {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 56px;
  margin-top: 5px;
  margin-right: 97px;
}

.logo {
  width: 80px;
  height: 80px;
}

.search-container {
  text-align: right;
  margin-top: -150px;
  margin-right: 50px;
}

.newPilote {
    margin-top: 89px;
    margin-left: -18px;   
    margin-right: 16px;
}
.newPilote img{
    width: 50px;
    height: 50px;
}

}

</style>

