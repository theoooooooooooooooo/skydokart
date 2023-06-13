<?php
include "./header.php";
include "./bddConn.php";
 
// Récupérer tous les pilotes
$query = "SELECT * FROM Pilote";
$data = $conn->query($query)->fetchAll(PDO::FETCH_BOTH);

// // Tri numérique par défaut
// usort($data, function ($a, $b) {
//     return $a[3] - $b[3]; // Tri par le numéro (colonne 3)
// });

// // Vérifier le tri sélectionné
// if (isset($_POST['tri_alphabetique'])) {
//     usort($data, function ($a, $b) {
//         return strcmp($a[1], $b[1]); // Tri par le nom (colonne 1)
//     });
// } elseif (isset($_POST['tri_numerique'])) {
//     usort($data, function ($a, $b) {
//         return $a[3] - $b[3]; // Tri par le numéro (colonne 3)
//     });
// }
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

        <!-- Barre de recherche -->
        <div class="search-container">
            <input type="text" id="search-input" placeholder="Rechercher...">
        </div>

        <a href="formAddPilote.php" class="newPilote"><button>Nouveau pilote</button></a>
        <ul class="responsive-table">
            <li class="table-header">
                <form action="" method="POST" class="sortForm">
                    <div class="col ">
                        <input type="submit" name="tri_alphabetique" id="alphabetique" value="Nom &#8593; &#8595;" class="btn-sort">
                    </div>
                    <div class="col ">
                        <input type="submit" name="tri_alphabetique" id="alphabetique" value="Prénom &#8593; &#8595;" class="btn-sort">
                    </div>
                    <div class="col ">
                        <input type="submit" name="tri_numerique" id="numérique" value="Numéro &#8593; &#8595;" class="btn-sort">
                    </div>
                </form>
            </li>

            <?php foreach ($data as $el) { ?>
                <li class="table-row">
                    <!-- Ajout de l'image du pilote -->
                    <div class="piloteImg">
                        <img src="" alt="">
                    </div>
                    <!-------------------------------->
                    <div class="col" data-label="Nom"><?php echo $el[1] ?></div>
                    <div class="col" data-label="Prénom"><?php echo $el[2] ?></div>
                    <div class="col" data-label="Numéro"><?php echo $el[3] ?></div>
                    <div class="col options" data-label="Options">
                        <form method="get" action="singlePilote.php"><button class="fabutton"><span class="material-icons" style="font-size: 40px;">feed</span></button><input type="hidden" id="id" name="id" value=<?php echo $el[0] ?>></form>
                        <form method="get" action="formUpdatePilote.php"><button class="fabutton"><span class="material-icons" style="font-size: 40px;">edit</span></button><input type="hidden" id="id" name="id" value=<?php echo $el[0] ?>></form>
                        <form method="get" action="deletePilote.php"><button class="fabutton" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce pilote ?')"><span class="material-icons" style="font-size: 40px;">delete</span></button><input type="hidden" id="id" name="id" value=<?php echo $el[0] ?>></form>
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

    <style>
        .search-container {
            float: right;
            margin-bottom: 10px;
        }

        #search-input {
            padding: 5px;
            width: 200px;
            border-radius: 3px;
            border: 1px solid #ccc;
        }
    </style>

<style>
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

</style>





</body>

<?php include "./footer.php" ?>


