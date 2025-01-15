<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styling/style.css">
    <link rel="stylesheet" href="styling/style_main.css">
    <title>Notes</title>
</head>
<?php 
        require("./functions.php");
        session_start();


        if(empty($_SESSION["login"])== true|| empty($_SESSION["password"])==true){
            $_SESSION["login"] = $_POST["login_username"];
            $_SESSION["password"] = $_POST["login_password"];
        }
        if(empty($_SESSION["login"])==true || empty($_SESSION["password"])==true){
            echo '<h1 class="h1_no_ac">Vous devez enter des informations valides.</h1><br>
            <form action="./index.php" class="form_error" method="POST"><button class="btn" type="submit">Log in</button></form></h1>';
        }   
        else{
            if(is_user($_SESSION["login"], $_SESSION["password"])==false){
                echo "<h1 class='h1_no_ac'>Votre compte n'est pas correcte</h1>
                <form action='./index.php' class='form_error' method='POST'><button class='btn' type='submit'>Log in</button></form>;
                <form action='./signup_page.php' class='form_error' method='POST'><button class='btn' type='submit'>Créer un compte</button></form>";
            }
            else{
                echo '
                    <header>
                        <h1 class="header_h1">NOTES : <spam class="top_name">'.get_nam_by_email($_SESSION['login']).'</spam></a></h1>
                        <div class="header_actions">
                            <ul class="liste_bottoms_top">
                                <form action="actions/add_devoir.php" method="POST"><button type="submit">Ajouter un devoir</button></form>
                                <form action="actions/add_controle.php" method="POST"><button type="submit">Ajouter un contôle</button></form>
                            </ul>
                        </div>
                        <div class="account">
                            <li><form action="index.php" method="POST"><button type="submit">Déconnexion</button></form></li>
                            </div>
                    </header>
                    <body>
                    <section class="devoirs">
                    <h2>Vos devoirs à faire :</h2>
                    <table class="blueTable">
                        <thead>
                            <tr>
                                <th>Matière</th>
                                <th>Description</th>
                                <th>Date</th>
                                <th>Type</th>
                                <th class="actions">Actions</th>
                            </tr>
                        </thead>
                    <tbody>
                    ';
                    foreach(get_list_devoirs($_SESSION['login']) as $devoir){
                        echo '
                            <tr>
                                <td>'.$devoir[1].'</td>
                                <td>'.$devoir[2].'</td>
                                <td>'.$devoir[3].'</td>
                                <td>'.$devoir[4].'</td>
                                <td class="pere_main_actions">
                                    <form action="actions/modifiction_devoirs.php" method="POST">
                                        <button type="submit" class="main_actions_btn">Modifier</button>';
                                        echo '<input type="hidden" name="id_devoir" value="'.$devoir[0].'"/>';
                                        echo '<input type="hidden" name="devoir_info1" value="'.$devoir[1].'"/>';
                                        echo '<input type="hidden" name="devoir_info2" value="'.$devoir[2].'"/>';
                                        echo '<input type="hidden" name="devoir_info3" value="'.$devoir[3].'"/>';
                                        echo '<input type="hidden" name="devoir_info4" value="'.$devoir[4].'"/>';
                                        echo '
                                    </form>
                                    <form action="actions/supprission_devoirs_controle.php" method="POST">
                                        <button type="submit" class="main_actions_btn">Supprimer</button>
                                        <input type="hidden" name="id_truc" value="'.$devoir[0].'"/>
                                        <input type="hidden" name="type_deledet" value="devoir"/>
                                    </form>
                                </td>';
                        }
                    echo '
                    </tbody>
                    </table>';
                    echo '<h3>Vous avez '.get_nb_devoirs($_SESSION['login']).' devoir(s) à faire.</h3>';
                    echo '
                    </section>
                    <section class="controles">
                    <h2>Vos controles à faire :</h2>
                    <table class="blueTable">
                    <thead>
                        <tr>
                            <th>Matière</th>
                            <th>Description</th>
                            <th>Date</th>
                            <th>Type</th>
                            <th class="actions">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    ';
                    foreach(get_list_contoles($_SESSION['login']) as $contole){
                        echo '
                            <tr>
                                <td>'.$contole[1].'</td>
                                <td>'.$contole[2].'</td>
                                <td>'.$contole[3].'</td>
                                <td>'.$contole[4].'</td>
                                <td class="pere_main_actions">
                                        <form action="actions/modifiction_controles.php" method="POST">
                                        <button type="submit" class="main_actions_btn">Modifier</button>
                                        <input type="hidden" name="id_devoir" value="'.$devoir[0].'"/>';
                                        echo '<input type="hidden" name="controle_info1" value="'.$devoir[1].'"/>';
                                        echo '<input type="hidden" name="controle_info2" value="'.$devoir[2].'"/>';
                                        echo '<input type="hidden" name="controle_info3" value="'.$devoir[3].'"/>';
                                        echo '<input type="hidden" name="controle_info4" value="'.$devoir[4].'"/>';
                                        echo '
                                    </form>
                                    <form action="actions/supprission_devoirs_controle.php" method="POST">
                                        <button type="submit" class="main_actions_btn">Supprimer</button>
                                        <input type="hidden" name="id_controle" value="'.$contole[0].'"/>
                                        <input type="hidden" name="type_deledet" value="controle"/>
                                    </form>
                                </td>
                            </tr>';}
                    echo '</tbody>
                        </table>';
                        echo '<h3>Vous avez '.get_nb_controle($_SESSION['login']).' contrôle(s) à faire.</h3>';
                        echo '</section>
                    
                    </body>
                    ';
            }
        }

?>