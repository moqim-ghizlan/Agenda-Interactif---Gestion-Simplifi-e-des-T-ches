<?php
    function connexion(){
        try{
            //$connexion = new PDO('sqlite:/sqlite3/bd/bd.sqlite3'); //Connexion
		$connexion = new PDO('sqlite:/tmp/contacts.sqlite3'); //Connexion
    }
    catch (PDOException $e){
        printf("Erreur lors de la connexion ", $e->getMessage());
    }
    return $connexion;
    }
?>
