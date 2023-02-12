<?php

require "./fonctions/gestionMembres.php";

// get the id value from the URL
$id = (int) $_GET['id'];

// delete the membre
deleteMembre($id);

// redirect to homepage 
header("location:membres.php");    

?>
