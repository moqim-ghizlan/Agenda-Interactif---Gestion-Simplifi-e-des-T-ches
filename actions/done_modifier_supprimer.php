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
    <title>Document</title>
</head>
<header>
    <h1 class="header_h1">NOTE</a></h1>
    <div class="header_actions">
        <ul class="liste_bottoms_top">
            <form action="../main_page.php" method="POST"><button type="submit">Page d'accueil</button></form>
        </ul>
    </div>
    <div class="account">
        <li><form action="../index.php" method="POST"><button type="submit">Déconnexion</button></form></li>
    </div>
</header>
<body>
<?php 
//echo "Matière: ".$_POST['devoir']."<br>";
//echo "Type: ".$_POST['type']."<br>";
//echo "note: ".$_POST['note']."<br>";
//echo "date: ".$_POST['date']."<br>";
//echo "id: ".$_POST['id_devoir555']."<br>";
if($_POST['type_action']=="devoir"){
    modifier_devoir($_POST['id_devoir555'], $_POST['devoir'], $_POST['note'], $_POST['date'], $_POST['type'], $_SESSION['login']);
}
if ($_POST['type_action']=="controle"){
    modifier_controle($_POST['id_devoir555'], $_POST['devoir'], $_POST['note'], $_POST['date'], $_POST['type'], $_SESSION['login']);
}


echo '<h2>Vous avez modifié votre '.$_POST['type_action'].' </h2>';
?>
  
</body>
</html>