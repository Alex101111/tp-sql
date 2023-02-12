<?php

require_once "database.php";

function getMembres() {
    
    $bdd = getDatabase();

    $sql = "select * from membre";

    // exexute the sql statement 
    $reponse = $bdd->query($sql);

    // get the data from database 
    $membres = $reponse->fetchAll();

    // close the connection
    $reponse->closeCursor();

    return $membres;
}

function getMembre($id) {

    $bdd = getDatabase();

    $sql = "select * from membre where id = :id";

    // prepare the sql statememnt 
    $pst = $bdd->prepare($sql);

    // using bindvalue function to protect against SQL injections 
    $pst->bindValue("id", $id);

    // execute the query
    $pst->execute();

    // fetch the data from database 
    $membre = $pst->fetch();

    // close connection
    $pst->closeCursor();

    return $membre;
}

function addMembre($nom, $pseudo, $mdp, $email) {

    $bdd = getDatabase();

    // requete insert avec les paramètres
    $sql = "insert into membre (nom, pseudo, mdp, email) "
        ."values (:nom, :pseudo, :mdp, :email)";

    // prepare the sql statement
    $pst = $bdd->prepare($sql);

    // using bindvalue function to protect against SQL injections
    $pst->bindValue("mdp", $mdp);
    $pst->bindValue("nom", $nom);
    $pst->bindValue("pseudo", $pseudo);
    $pst->bindValue("email", $email);


    // execute the sql query
    $pst->execute();

    // close connection
    $pst->closeCursor();
}

function updateMembre($id, $pseudo, $nom, $email, $mdp) {

    $bdd = getDatabase();


    // update database statemnet 
    $sql = "update membre set pseudo = :pseudo, 
    nom = :nom,  
    email = :email, 
    mdp = :mdp 
    where id = :id";

    // prepare the sql statement
    $pst = $bdd->prepare($sql);

    // using bindvalue function to protect against SQL injections
    $pst->bindValue("id", $id);
    $pst->bindValue("pseudo", $pseudo);
    $pst->bindValue("nom", $nom);
    $pst->bindValue("email", $email);
    $pst->bindValue("mdp", $mdp);


    // execute the sql query
    $pst->execute();

    // close connection
    $pst->closeCursor();
  
}

function deleteMembre($id) {

    $bdd = getDatabase();


    // statment to delete member from the database 
    $sql = "delete from membre where id = :id";

    // prépare la requete
    $pst = $bdd->prepare($sql);

  // using bindvalue function to protect against SQL injections
    $pst->bindValue("id", $id);

    // execute the sql query
    $pst->execute();

    // close connection
    $pst->closeCursor();
}