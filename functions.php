<?php 

    require("connexion.php");
    
    $list=[
        'devoirs'=> [
            [1, "Maths", "Finir td 5", "01/01/2001", "td"],
            [2, "Maths", "Finir l'exo 13 de tp 6", "01/01/2001", "tp"],
            [3, "Web", "Avoir son ordi en cours", "01/01/2001", "cm"],
            [4, "Algo avancée", "Avancer sur les exo de feuille 6", "01/01/2001", "tp"],
        ],
        'contole'=> [
            [1, "Maths", "Devoir sur table", "01/01/2001", "ds"],
            [2, "Anglais", "Tp noté", "01/01/2001", "td"],
            [3, "web", "Devoir sur table de 1h30", "01/01/2001", "cm"],
        ],
        'matieres' =>[
            "maths",
            "anglais",
            "algo_avancee",
            "web",
            "c++",
            
        ]
        ];

    $personnes=[
        [
            "name" => "GHIZLAN Moqim",
            "id" => "moqim12345",
            "email" => "moqim.ghizlan@hotmail.com",
            "mdp" => "Mm12345%%"
        ],
        [
            "name" => "GHIZLAN Moqim",
            "id" => "moqim",
            "email" => "moqim.ghizlan@gmail.com",
            "mdp" => "Mm12345%%"
        ],
        [
            "name" => "GHIZLAN Moqim",
            "id" => "moqim",
            "email" => "m",
            "mdp" => "m"
        ]

        ];





    function get_nam_by_email($email){
        $connexion = connexion();
        $sql = "SELECT prenom, nom, email from PERSONNE where email='".$email."'";
        if(!$connexion->query($sql)){
            echo 'pb de requete';
        }
        else{
            foreach($connexion->query($sql) as $row){
                if($row["email"]=$email){
                    return $row["prenom"];
                }
            }
        }
    }





    function is_user($email, $password){
        $connexion = connexion();
        $sql = "SELECT email, mdp from PERSONNE where email='".$email."'";
        if(!$connexion->query($sql)){
            echo 'pb de requete';
        }
        else{
            foreach($connexion->query($sql) as $row){
                if($row["email"] == $email && $row["mdp"] == $password)
                {
                    return true;
                }
                    else{
                        return false;
                    }
                }
            }
        }




    function email_exits($email){
        $connexion = connexion();
        $sql = "SELECT email from PERSONNE group by email";
        if(!$connexion->query($sql)){
            echo 'pb de requete';
        }
        else{
            foreach($connexion->query($sql) as $row){
                if($row["email"]==$email){return true;}
                else{return false;}
            }
        }
    }





    function new_user($nom, $prenom, $email, $password1, $password2){
        if(email_exits($email)==true){
            return "<h1>ERROR</h1>
                    <h2>Email déjà utilisé.</h2>
                    <h2>Essayez avec un autre email<h2>";}
        if($password1 != $password2){
            return "<h1>ERROR</h1>
                    <h2>Les mots de passe ne correspondent pas.</h2>
                    <h2>Réessayez encore<h2>";}
        else{
            if(strlen($password1) >= 6){
                $connexion = connexion();
                $sql = "INSERT INTO PERSONNE(nom, prenom, email, mdp) VALUES (:nom, :prenom, :email, :mdp)"; 
                $state = $connexion->prepare($sql);
                $state->bindParam(":nom", $nom);
                $state->bindParam(":prenom", $prenom);
                $state->bindParam(":email", $email);
                $state->bindParam(":mdp", $password1);

                $state->execute();
                return true;
            }
            else{
                return false;
            }
        }
    }




    function modifier_devoir($id, $new_matiere, $new_desp, $new_date, $new_type, $user_email){
        $connexion = connexion();
        $sql = "UPDATE DEVOIR set matiere=:matiere,descrption=:descrption ,dateD=:dateD, typeD=:new_type where idD=:id and email=:user_email";
        $state=$connexion->prepare($sql);
        $state->bindParam(":matiere", $new_matiere);
        $state->bindParam(":descrption", $new_desp);
        $state->bindParam(":dateD", $new_date);
        $state->bindParam(":new_type", $new_type);
        $state->bindParam(":id", $id);
        $state->bindParam(":user_email", $user_email);
        $state->execute();
    }






function modifier_controle($id, $new_matiere, $new_desp, $new_date, $new_type, $user_email){
        $connexion = connexion();
        $sql = "UPDATE CONTROLE set matiere=:matiere,descrption=:descrption ,dateC=:dateC, typeC=:new_type where idC=:id and email=:user_email";
        $state=$connexion->prepare($sql);
        $state->bindParam(":matiere", $new_matiere);
        $state->bindParam(":descrption", $new_desp);
        $state->bindParam(":dateC", $new_date);
        $state->bindParam(":new_type", $new_type);
        $state->bindParam(":id", $id);
        $state->bindParam(":user_email", $user_email);
        $state->execute();
    }




    function delete_devoir($id, $user_email){
        $connexion=connexion();
        $sql = "DELETE FROM DEVOIR WHERE idD=:id and email=:user_email";
        $state = $connexion->prepare($sql);
        $state->bindParam(":id",$id);
        $state->bindParam(":user_email", $user_email);
        $state->execute();
    }


    function delete_controle($id, $user_email){
        $connexion=connexion();
        $sql = "DELETE FROM CONTROLE WHERE idC=:id and email=:user_email";
        $state = $connexion->prepare($sql);
        $state->bindParam(":id",$id);
        $state->bindParam(":user_email", $user_email);
        $state->execute();
    }    delete_controle(1, "moqim");





    function add_data($matiere, $type, $note, $date, $email, $type_added){
        $connexion = connexion();
        if($type_added == "devoir"){
            try{
                $sql = "INSERT INTO DEVOIR(idD, matiere, descrption, dateD, typeD, email) VALUES (:idD, :matiere, :descrption, :dateD, :typeD, :email)"; 
                $state = $connexion->prepare($sql);
                $nb = get_nb_devoirs($email)+1;
                $state->bindParam(":idD", $nb);
                $state->bindParam(":matiere", $matiere);
                $state->bindParam(":descrption", $note);
                $state->bindParam(":dateD", $date);
                $state->bindParam(":typeD", $type);
                $state->bindParam(":email", $email);
                $state->execute();
                return true;
            }catch(PDOException $e){return false;}
        }if($type_added != "devoir"){
            try{
                $sql = "INSERT INTO CONTROLE (idC, matiere, descrption, dateC, typeC, email) VALUES (:idC, :matiere, :descrption, :dateC, :typeC, :email)"; 
                $state = $connexion->prepare($sql);
                $nb = get_nb_controle($email)+1;
                $state->bindParam(":idC", $nb);
                $state->bindParam(":matiere", $matiere);
                $state->bindParam(":descrption", $note);
                $state->bindParam(":dateC", $date);
                $state->bindParam(":typeC", $type);
                $state->bindParam(":email", $email);
                $state->execute();
                return true;
            }catch(PDOException $e){return false;}
        }
        return false;
    }



    //add_data("Maths", "TD", "à faire", "1010-10-10", "moqim", "devoir");


    //add_data("droit", "ms", "testsss", "2020-10-20", "moqim", "controle");

    function get_list_devoirs($email){
        $list1 = array();
        $connexion = connexion();
        $sql = "SELECT idD, matiere, descrption, dateD, typeD from DEVOIR WHERE email='".$email."' order by dateD";
        if(!$connexion->query($sql)){
            echo 'pb de requete';
        }
        else{
            foreach($connexion->query($sql) as $row){
                array_push($list1, [$row['idD'], $row['matiere'],$row['descrption'], $row['dateD'], $row['typeD']]);
            }
            return $list1;
        }
    }



    function get_list_contoles($email){
        $list1 = array();
        $connexion = connexion();
        $sql = "SELECT idC, matiere, descrption, dateC, typeC from CONTROLE WHERE email='".$email."' order by dateC";
        if(!$connexion->query($sql)){
            echo 'pb de requete';
        }
        else{
            foreach($connexion->query($sql) as $row){
                array_push($list1, [$row['idC'], $row['matiere'],$row['descrption'], $row['dateC'], $row['typeC']]);
            }
            return $list1;
        }
    }




    function get_nb_devoirs($email){
        $connexion = connexion();
        $sql = "SELECT COUNT(idD) AS NB FROM DEVOIR WHERE email='".$email."'";
        if(!$connexion->query($sql)){
            echo 'pb de requete';
        }
        else{
            foreach($connexion->query($sql) as $row){
                return $row['NB'];
            }
        }
    }
    



    function get_nb_controle($id){
        $connexion = connexion();
        $sql = "SELECT COUNT(idC) AS NB FROM CONTROLE WHERE email='".$id."'";
        if(!$connexion->query($sql)){
            echo 'pb de requete';
        }
        else{
            foreach($connexion->query($sql) as $row){
                return $row['NB'];
            }
        }
    }




    function get_data_devoir($id_devoir, $id_user){
        $list1 = array();
        $connexion = connexion();
        $sql = "SELECT idD, matiere, descrption, dateD, typeD from DEVOIR WHERE email='".$id_user."'";
        if(!$connexion->query($sql)){
            echo 'pb de requete';
        }
        else{
            foreach($connexion->query($sql) as $row){
                array_push($list1, [$row['idD'], $row['matiere'],$row['descrption'], $row['dateD'], $row['typeD']]);
            }
            return $list1;
        }
    }

    function get_data_controle($id_controle, $id_user){
        $list1 = array();
        $connexion = connexion();
        $sql = "SELECT idC, matiere, descrption, dateC, typeC from CONTROLE WHERE email='".$id_user."'";
        if(!$connexion->query($sql)){
            echo 'pb de requete';
        }
        else{
            foreach($connexion->query($sql) as $row){
                array_push($list1, $row['idD'], $row['matiere'],$row['descrption'], $row['dateD'], $row['typeD']);
            }
            return $list1;
        }
    }



    function get_list_matieres(){
        $liste = [
            "Anglais",
            "Maths-proba",
            "Maths-modele",
            "Wab_serveur",
            "Algo_avancée",
            "EC",
            "GSI",
            "Droit",
            "Système",
            "BDA",
            "Projet",
            "MPA"
        ];
        return $liste;
    }
?>