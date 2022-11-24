<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <title>Boutique</title>
</head>

<style>

</style>

<body>
    <header>
        <!-- Mennu -->
        <div class="container justify-content-center text-center">
            <img src=https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTdpMizrLPhaFR3LyBfkfiKGv49zaAv4AXe05HKCXZVWWaZK6k3wcyfmwEtxHxp1r7zSDU&usqp=CAU" width="5%" alt="">
        </div>
        <div class="container-fluid">
            <ul class="nav justify-content-center font-weight-bold">
                <li class="nav-item">
                    <a class="nav-link active text-dark" href="#">Celine's Products</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark" href="#">Produits</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark" href="#">Qui sommes-nous ?</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark">Contact</a>
                </li>
            </ul>
        </div>
    </header>

    <div class="hero">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="ajout_produit.php">Ajout de produit</a></li>
                <li class="breadcrumb-item active" aria-current="page">Boutique</li>
            </ol>
        </nav>
    </div>

    <?php
    //Connexion à la BDD
    include_once('connexion.php');

    //Extraction des données
    try {
        $sql = "SELECT * FROM produit ORDER BY id_produit ASC";
        $produits = $pdo->query($sql);

        if (!$produits) {
            die("Erreur");
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }

    ?>

    <main>
        <div class="container text-center">
            <h1 class="my-3">Notre sélection de produits</h1>
            <div class="row row-cols-4">
                <!-- Boucle pour renvoyer en front les enregistrements de la BDD -->
                <?php foreach ($produits as $key => $value) { ?>
                    <div class="col card my-5" style="width: 18rem;">
                        <div class="row d-inline">
                            <div class="col card-group ">
                                <img src="<?= $value['photo'] ?>" class=" card-img-top w-100 h-100 p-3" alt="<?php echo $value['titre'] ?> ">
                            </div>
                            <div class="col card-body bg-light text-dark overflow-auto" style=" height: 15rem;">
                                <h5 class="card-title text-capitalize"><?php echo $value['titre'] ?></h5>
                                <p class="card-text">Description : </p>
                                <p><?php echo $value['description'] ?></p>
                            </div>
                            <div class="col card-footer bg-dark text-white">
                                <span>Référence Produit : <?php echo $value['id_produit'] ?></span>
                                <p class="">Prix : <?php echo $value['prix'] ?> €</p>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </main>

    <div class="container-fluid">
        <footer>
            <ul class="nav justify-content-center bg-secondary font-weight-regular">
                <li class="nav-item">
                    <a class="nav-link active text-white" href="#">@ copyright</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="#">Céline's Company</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="#">Mention Légales</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href=" ajout_produit.php">Ajout de produit</a>
                </li>
            </ul>
        </footer>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
</body>

</html>