<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <title>Ajout_Produit</title>
</head>


<body>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="boutique.php">Boutique</a></li>
            <li class="breadcrumb-item active" aria-current="page">Ajout de produit</li>
        </ol>
    </nav>

    <?php
    //Connexion à la BDD
    include_once('connexion.php');
    ?>
    <!-- Formulaire d'insertion -->
    <!--Produit issus de cette boutique web :https://www.meublesconcept.fr/Tabourets-Design/Tabourets-de-Bar/tabouret-wisconsin -->
    <div class="container">
        <div class="row flex-d justify-content my-5 py-3 border rounded-lg shadow p-3 mb-5 bg-white rounded">
            <div class="col-lg-4">
                <h1 class="h-100" style="background-image: url('https://static.vecteezy.com/ti/vecteur-libre/p1/2467302-fond-naturel-avec-des-feuilles-de-palmier-tropical-et-monstera-gratuit-vectoriel.jpg'); background-repeat : no-repeat ;background-size :cover;"></h1>
            </div>
            <div class="col-lg-8">
                <form action="ajout_produit.php" method="post" enctype="multipart/form-data">
                    <fieldset>
                        <legend><b>Formulaire : AJOUT DE PRODUIT</b></legend>
                        <div class="form-group">
                            <label for="formGroupExampleInput">Titre du produit : </label>
                            <input type="text" class="form-control" name="titre">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput">Prix :</label>
                            <input type="text" class="form-control" name="prix">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput">Description : </label>
                            <input type="text" class="form-control" name="description">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlFile1">Photo du produit : </label>
                            <input type="file" class="form-control-file" name="photo">
                        </div>
                        <div class="form-group">
                            <input type="reset" name="effacer" value="Effacer" class="btn-secondary">
                            <input type="submit" name="enregistrer" value="Enregistrer" class="btn-success">
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
    <?php



    if (isset($_POST['enregistrer'])) {

        $titre = htmlspecialchars($_POST['titre']);
        $prix = $_POST['prix'];
        $description = $_POST['description'];
        //$photo = $_POST['photo'];

        $photo = $_FILES["photo"]["name"];
        $tempname = $_FILES["photo"]["tmp_name"];
        $folder = "photos/" . $photo;

        if (!empty($titre) && !empty($prix) && !empty($description) && !empty($photo)) { //si variable non vide alors...

            //1-preparation de la reqûete
            $requete = $pdo->prepare('INSERT INTO meubles.produit(titre, prix, description, photo) 
			VALUES (:titre, :prix, :description, :photo)'); //paramètres nommés

            //2-lier nos donnees du formulaire aux paramètres nommés
            $requete->bindvalue(':titre', $titre);
            $requete->bindvalue(':prix', $prix);
            $requete->bindvalue(':description', $description);
            //2.1-Enregistrer le chemin du dossier photos
            $requete->bindvalue(':photo', $folder); 

            //3-Execution de la requête
            $result = $requete->execute();

            //4-Messages d'alerte pour confirmer si tout est ok
            if (move_uploaded_file($tempname, $folder)) {
                echo "
                <div class='container text-center'>
                    <div class='row'>
                        <div class='col border border-success p-3 mb-2 bg-success text-white'>
                            <span class='text center'>Image enregistrée avec succès</span> 
                        </div>
                    </div>
                </div>
                ";
            } else {
                echo "
                <div class='container text-center'>
                    <div class='row'>
                        <div class='col border border-danger p-3 mb-2 bg-danger text-white'>
                            <span class='text center'>L'image n'a pas été uploadée. Ressayez</span>
                        </div>
                    </div>
                </div>
                ";
            }


            if (!$result) { //Si la requete est false pas d'enregistement des données du formulaire

                echo "
                <div class='container text-center'>
                    <div class='row'>
                        <div class='col border border-danger p-3 mb-2 bg-danger text-white'>
                            <span class='text center'>Un problème est survenu, l'enregistrement de votre produit n'a pas été effectué !</span> 
                        </div>
                    </div>
                </div>
                ";
            } else {
                //fenêtre d'alerte pour confirmer l'enregistrement
                echo "
				<script type=\"text/javascript\"> alert('L'image a été enregistrée 👍🏾. <br> Voici sa référence : " . $pdo->lastInsertId() . "')</script>";
            }
        } else {
            echo
            "
            <div class='container text-center'>
                <div class='row'>
                    <div class='col border border-danger p-3 mb-2 bg-danger text-white'>
                        <span class='text center'> Vous devez compléter tous les champs afin d'enregistrer votre produit</span> 
                    </div>
                </div>
            </div>
            ";
        }
    }

    ?>


    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>

</body>

</html>