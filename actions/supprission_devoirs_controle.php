<?php
require("../functions.php");
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styling/style.css">
    <link rel="stylesheet" href="../styling/style_main.css">
    <title>Supprimer</title>
</head>
<header>
    <h1 class="header_h1">NOTE</a></h1>
    <div class="header_actions">
        <ul class="liste_bottoms_top">
            <form action="../main_page.php" method="POST"><button type="submit">Page d'accueil</button>
            <input type="hidden" name="login_username" value="<?php $_SESSION['login']?>"/>
            <input type="hidden" name="login_password" value="<?php $_SESSION['password'] ?>"/>
            </form>
        </ul>
    </div>
    <div class="account">
        <li><form action="index.php" method="POST"><button type="submit">Déconnexion</button></form></li>
    </div>
</header>
<body>    
    <?php
    if($_POST['type_deledet']=="devoir"){
        delete_devoir($_POST['id_truc'], $_SESSION['login']);
        header('Location: ../main_page.php');
    }
    else{
        delete_controle($_POST['id_controle'], $_SESSION['login']);
        header('Location: ../main_page.php');

    }
    ?>
</body>
</html>