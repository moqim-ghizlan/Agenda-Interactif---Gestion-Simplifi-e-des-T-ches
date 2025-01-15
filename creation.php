
<?php

require('connexion.php');

$table=connexion();

$table->exec("DROP TABLE IF EXISTS PERSONNE");
$table->exec("DROP TABLE IF EXISTS DEVOIR");
$table->exec("DROP TABLE IF EXISTS CONTROLE");


$table->exec("CREATE TABLE PERSONNE (
    nom VARCHAR(30),
    prenom VARCHAR(50),
    email varchar(50),
    mdp VARCHAR(150),
    PRIMARY KEY(nom, prenom, email)    
)"); 
//Création Table perso

$table->exec("CREATE TABLE DEVOIR (
    idD INT,
    matiere VARCHAR(20),
    descrption VARCHAR(100),
    dateD date,
    typeD VARCHAR(3),
    email VARCHAR(50),
    PRIMARY KEY (matiere, typeD, dateD),
    CONSTRAINT FK_email FOREIGN KEY (email) REFERENCES PERSONNE(email)
)");

$table->exec("CREATE TABLE CONTROLE (
    idC INT,
    matiere VARCHAR(20),
    descrption VARCHAR(100),
    dateC date,
    typeC VARCHAR(3),
    email VARCHAR(50),
    PRIMARY KEY (matiere, typeC, dateC),
    CONSTRAINT FK_email FOREIGN KEY (email) REFERENCES PERSONNE(email)
)");

echo "tables créés";
?>
