<?php

require_once "database.php";

function getRecettes() {
    
    $bdd = getDatabase();

    $sql = "select * from recette";

    // exexute the sql statement 
    $reponse = $bdd->query($sql);

    // get the data from database 
    $recettes = $reponse->fetchAll();

    // close the connection
    $reponse->closeCursor();

    return $recettes;
}
function getRecette($id) {

    $bdd = getDatabase();

    $sql = "select * from recette where id = :id";

    // prepare the sql statememnt 
    $pst = $bdd->prepare($sql);

    // using bindvalue function to protect against SQL injections 
    $pst->bindValue("id", $id);

    // execute the query
    $pst->execute();

    // fetch the data from database 
    $recette = $pst->fetch();

    // close connection
    $pst->closeCursor();

    return $recette;
}

// get ingredients based on recette id 
function getIngredients($id){
    $bdd = getDatabase();
    $sql = "SELECT nom, quantitie, unit FROM ingredient WHERE ingredient.recette_id = :id;
    ";

      // prepare the sql statememnt 
      $pst = $bdd->prepare($sql);

          // using bindvalue function to protect against SQL injections 
    $pst->bindValue("id", $id);

    // execute the query
    $pst->execute();

    // fetch the data from database 
    $ingredients = $pst->fetchAll();

       // close connection
       $pst->closeCursor();

       return $ingredients;
}



function addRecette($titre, $description, $photo, $auteur, $auteurId) {

    $bdd = getDatabase();

    // requete insert avec les paramètres
    $sql = "insert into recette (titre, description, photo, auteur, membre_id ) "
        ."values (:titre, :description, :photo, :auteur, :auteurId)";

    // prepare the sql statement
    $pst = $bdd->prepare($sql);

    // using bindvalue function to protect against SQL injections
    $pst->bindValue("titre", $titre);
    $pst->bindValue("description", $description);
    $pst->bindValue("photo", $photo);
    $pst->bindValue("auteur", $auteur);
    $pst->bindValue("auteurId", $auteurId);


    // execute the sql query
    $pst->execute();

    // close connection
    $pst->closeCursor();
}

// get memebre id by using auteur name
function getmembreId($nom){
    $bdd = getDatabase();

    // requete insert avec les paramètres
    $sql = "SELECT id from membre where nom = :nom";

    // prepare the sql statement
    $pst = $bdd->prepare($sql);
   
    $pst->bindValue("nom", $nom);

        // execute the query
        $pst->execute();

        // fetch the data from database 
        $membreId = $pst->fetch();
    
        // close connection
        $pst->closeCursor();

        return $membreId; 
}

function updateRecette($id, $titre, $description, $photo, $auteur, $auteurId) {

    $bdd = getDatabase();


    // update database statemnet 
    $sql = "update recette set titre = :titre, 
    description = :description,  
    photo = :photo, 
    auteur = :auteur 
    auteurId = :auteurId
    where id = :id";

    // prepare the sql statement
    $pst = $bdd->prepare($sql);

    // using bindvalue function to protect against SQL injections
    $pst->bindValue("titre", $titre);
    $pst->bindValue("description", $description);
    $pst->bindValue("photo", $photo);
    $pst->bindValue("auteur", $auteur);
    $pst->bindValue("auteurId", $auteurId);
    $pst->bindValue("id", $id);


    // execute the sql query
    $pst->execute();

    // close connection
    $pst->closeCursor();
  
}
