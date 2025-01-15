<?php
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styling/style.css">
    <link rel="stylesheet" href="../styling/style_main.css">
    <title>Ajouté</title>
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
        <!-- 
            <li><button type="=submit"><?php //echo get_nam_by_email($_POST['login_username'], $personnes);?></button></li>
        <li><form action="actions/modifier_profile.php" method="post"><button type="submit">Modifier</button></form></li>
        -->
        <li><form action="index.php" method="POST"><button type="submit">Déconnexion</button></form></li>
    </div>
</header>
<body>
    <?php
    require("../functions.php");
    session_start();
    add_data($_POST['devoirs'], $_POST['type'], $_POST['note'], $_POST['date'], $_SESSION['login'], $_POST['type_added']);
    //echo '<h2>Vous avez ajouté un '.$_POST['type_added'].'</h2><br>';
    //echo '<form action="../main_page.php" class="form_error" method="POST">
    //<input type="hidden" name="login_username" value="'.$_SESSION['login'].'"/>
    //<input type="hidden" name="login_password" value="'.$_SESSION['password'].'"/>
    //</form>';
    header('Location: ../main_page.php');
    ?>
    
</body>
</html>