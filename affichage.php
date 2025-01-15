<?php
    function affichageC($liste){
        foreach($liste as $r){
            echo $r["matiere"].' | '.$r["descrption"].' | '.$r["dateC"].' | '.$r["typeC"].' | '.$r["email"].'\n'; //affichage des persos dans la base
        }
    }

    function affichageD($liste){
        foreach($liste as $r){
            echo $r["matiere"].' | '.$r["descrption"].' | '.$r["dateD"].' | '.$r["typeD"].' | '.$r["email"].'\n'; //affichage des persos dans la base
        }
    }

    function affichageP($liste){
        foreach($liste as $r){
            echo $r["nom"]." | ".$r["prenom"]." | ".$r["email"]." | ".$r["mdp"].'\n';
        }
    }
?>
