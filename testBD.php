
<?php

require('connexion.php');

$table=connexion();

$perso = array("nom"=>"OMARI",
        "prenom"=>"Redwan",
        "email"=>"redwan.oma20@gmail.com",
        "mdp"=>"HelloYaZbi");
//insertion des données dans PERSONNE
$insert1 = "INSERT INTO PERSONNE(nom, prenom, email, mdp) VALUES (:nom, :prenom, :email, :mdp)"; 

$state = $table->prepare($insert1); //Prépare la requête SQL à être exécutée

$state->bindParam(":nom", $nom);
$state->bindParam(":prenom", $prenom);
$state->bindParam(":email", $email);
$state->bindParam(":mdp", $mdp);

$nom=$perso["nom"]; //on affecte les valeurs aux parametres
$prenom=$perso["prenom"];
$email=$perso["email"];
$mdp=$perso["mdp"];

$state->execute(); //execution du statement



//on passe à la table devoir
$devoir = array(
        "idD"=>1,
        "matiere"=>"maths",
        "descrption"=>"à faire pour lundi",
        "dateD"=>"2003-06-12",
        "typeD"=>"TP",
        "email"=>"redwan.oma20@gmail.com");

$insert1 = "INSERT INTO DEVOIR(idD,matiere, descrption, dateD, typeD, email) VALUES (:idD, :matiere, :descrption, :dateD, :typeD, :email)";

$state = $table->prepare($insert1); 

$state->bindParam(":idD", $idD);
$state->bindParam(":matiere", $matiere);
$state->bindParam(":descrption", $descrption);
$state->bindParam(":dateD", $dateD);
$state->bindParam(":typeD", $typeD);
$state->bindParam(":email", $email);

$idD=$devoir["idD"];
$matiere=$devoir["matiere"]; 
$descrption=$devoir["descrption"];
$dateD=$devoir["dateD"];
$typeD=$devoir["typeD"];
$email=$devoir["email"];

$state->execute(); //execution du statement



$controle = array(
        "idC"=>1,
        "matiere"=>"maths",
        "descrption"=>"à faire pour lundi",
        "dateC"=>"2003-06-12",
        "typeC"=>"TP",
        "email"=>"redwan.oma20@gmail.com");


$insert1 = "INSERT INTO CONTROLE(idC, matiere, descrption, dateC, typeC, email) VALUES (:idC, :matiere, :descrption, :dateC, :typeC, :email)"; 


$state = $table->prepare($insert1); 

$state->bindParam(":idC", $idC);
$state->bindParam(":matiere", $matiere);
$state->bindParam(":descrption", $descrption);
$state->bindParam(":dateC", $dateC);
$state->bindParam(":typeC", $typeC);
$state->bindParam(":email", $email);

$idC=$controle["idC"];
$matiere=$controle["matiere"]; 
$descrption=$controle["descrption"];
$dateC=$controle["dateC"];
$typeC=$controle["typeC"];
$email=$controle["email"];

$state->execute(); //execution du statement


    
//des données à inserer dans la BD

$table=null; 

?>