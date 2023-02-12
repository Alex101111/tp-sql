<?php
    require "./fonctions/gestionMembres.php";

   // error messages 
    $errors = "";

    if (isset($_POST['pseudo'])) {
        $pseudo = $_POST['pseudo'];
    }
    else {
        $pseudo = "";
    }
    if (isset($_POST['nom'])) {
        $nom = $_POST['nom'];
    }
    else {
        $nom = "";
    }
    if (isset($_POST['email'])) {
        $email = $_POST['email'];
    }
    else {
        $email = "";
    }
    if (isset($_POST['mdp'])) {
        $mdp = $_POST['mdp'];
    }
    else {
        $mdp = "";
    }

    // test if the form isn't missing data
    if (isset($_POST['ajouter'])) {
        // show error msgs if the input is missing
        if (empty($pseudo)) {
            $errors .= "Le login doit être renseigné<br>";
        }
        if (empty($nom)) {
            $errors .= "Le nom doit être renseigné<br>";
        }
        if (empty($email)) {
            $errors .= "L'email doit être renseignée<br>";
        }
        if (empty($mdp)) {
            $errors .= "La mot de pass doit être renseignée<br>";
        }

        // si il n'y a pas d'erreurs
        if (empty($errors)) {

            // ajoute l'étudiant à la bdd avec addEtudiant
            addMembre( $nom, $pseudo, $mdp, $email,);

            // redirige sur la page d'acceuil
            header("location:membres.php");
        }
    }
?>

<!DOCTYPE>
<html>
<head>
    <meta charset="utf-8"/>
    <title>
    Recette Manager
    </title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
</head>
<body>

<div class="container">

    <div class="row">

        <div class="col-10 card shadow mx-auto mt-3">

            <div class="card-header text-center bg-dark text-light mt-2">
                <h3>AJOUT D'UN MEMBRE</h3>
            </div>

            <div class="card-content mt-3">

                <div class="alert alert—infok mb-3">
                    
                </div>

                <form method="post" action="membre-add.php">

                    <div class="mb-3">
                        <label for="pseudo" class="form-label">Login</label>
                        <input type="text" class="form-control" name="pseudo" id="pseudo" value="<?= $pseudo ?>" placeholder="Pseudo du membre.">
                    </div>

                    <div class="mb-3">
                        <label for="nom" class="form-label">Nom</label>
                        <input type="text" class="form-control" name="nom" id="nom" value="<?= $nom ?>" placeholder="Nom du membre.">
                    </div>                  

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" id="email" value="<?= $email ?>" placeholder="Email du membre.">
                    </div>

                    <div class="mb-3">
                        <label for="mdp" class="form-label">Mot de passe</label>
                        <input type="password" class="form-control" name="mdp" id="mdp" placeholder="Mot de passe du membre." value="<?= $mdp ?>">
                    </div>

                    <div class="d-grid gap-2 col-6 mx-auto">
                        <button type="submit" name="ajouter" class="btn btn-dark">AJOUTER</button>
                    </div>

                </form>

            </div>

        </div>

    </div>

</div>

</body>
</html>
