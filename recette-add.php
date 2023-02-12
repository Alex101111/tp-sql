<?php
    require "./fonctions/gestionRecettes.php";
    require "./fonctions/gestionMembres.php";

    $membres = getMembres();
   // error messages 
    $errors = "";

    if (isset($_POST['titre'])) {
        $titre = $_POST['titre'];
    }
    else {
        $titre = "";
    }
    if (isset($_POST['description'])) {
        $description = $_POST['description'];
    }
    else {
        $description = "";
    }
    if (isset($_POST['photo'])) {
        $photo = $_POST['photo'];
    }
    else {
        $photo = "";
    }
    if (isset($_POST['auteur'])) {
        $auteur = $_POST['auteur'];
    }
    else {
        $auteur = "";
    }

    // get the membre id by using membre name 

    $auteurId = getmembreId($auteur);
    
 
    // test if the form isn't missing data
    if (isset($_POST['ajouter'])) {
       
        // show error msgs if the input is missing
        if (empty($titre)) {
            $errors .= "Le titre doit être renseigné<br>";
        }
        if (empty($description)) {
            $errors .= "Le description doit être renseigné<br>";
        }
        if (empty($photo)) {
            $errors .= "L'photo doit être renseignée<br>";
        }
        if (empty($auteur)) {
            $errors .= "La auteur doit être renseignée<br>";
        }
    
        // si il n'y a pas d'erreurs
        if (empty($errors)) {
            
            // ajoute l'étudiant à la bdd avec addEtudiant
            addRecette( $titre, $description, $photo, $auteur, $auteurId);
            
            // redirige sur la page d'acceuil
            header("location:recettes.php");
        }else{
            echo $errors;
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
                <h3>AJOUT D'UNE RECETTE</h3>
            </div>

            <div class="card-content mt-3">

                <div class="alert alert—infok mb-3">

                </div>

                <form method="post" action="recette-add.php">

                    <div class="mb-3">
                        <label for="titre" class="form-label">Nom</label>
                        <input type="text" class="form-control" name="titre" id="titre" value="<?= $titre ?>" placeholder="Titre de la recette.">
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <input type="text" class="form-control" name="description" id="description" value="<?= $description ?>" placeholder="Description de la recette.">
                    </div>                    

                    <div class="mb-3">
                        <label for="photo" class="form-label">Photo</label>
                        <input type="text" class="form-control" name="photo" id="photo" value="<?= $photo ?>" placeholder="Photo de la recette.">
                    </div>

                    <div class="mb-3">
                        <label for="author" class="form-label">Auteur</label>
                        <select name="auteur" class="selectpicker" id="auteur">">
                        <?php foreach($membres as $membre) { ?>
 
                        <option name="auteur" value="<?= $membre['nom'] ?>"><?=$membre['nom']?></option>
                            <?php } ?> 
                        </select>
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
