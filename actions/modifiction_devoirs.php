<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styling/style.css">
    <link rel="stylesheet" href="../styling/style_main.css">
    <title>Modifier</title>
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
require("../functions.php");
session_start();
$id=$_POST['id_devoir'];

?>

<form action="done_modifier_supprimer.php" method="POST" class="add_form">
<div class="info_acc">
        <h3><?php
        echo '
        <h2>Vous tentez de modifer le devoir de <spam class="spam_info">'.$_POST['devoir_info1'].'</spam>, de type  <spam class="spam_info">'.$_POST['devoir_info4'].'</spam>, qui aura lieu le <spam class="spam_info">'.$_POST['devoir_info3'].'</spam></h2>
        ';
        ?></h3>
        </div>
        <div class="top">
            <spam>Matière</spam>
            <select name="devoir" value="<?php get_data_devoir($_POST['id_devoir'], $_SESSION['login'])[0][1] ?>">
                <?php 
                foreach(get_list_matieres($_SESSION['login']) as $m){
                    echo'<option value='.$m.'> '.$m.'</option>';
                }?>
            </select><br>
        </div>

        <div class="top">
            <spam>Type</spam>
            <select name="type" value=<?php get_data_devoir($_POST['id_devoir'], $_SESSION['login'])[0][4] ?>>
                <option value="tp">TP</option>
                <option value="td">TD</option>
                <option value="ds">DS</option>
            </select><br>
        </div>
        <textarea rows="10" cols="40" placeholder="Ajouter une note sur le devoir :" name="note" value=<?php get_data_devoir($_POST['id_devoir'], $_SESSION['login'])[0][2] ?>></textarea><br>
        <input type="date" value="value=<?php get_data_devoir($_POST['id_devoir'], $_SESSION['login'])[0][3] ?>"max="2025-1-1" name="date"><br>
        <?php echo '<input type="hidden" name="id_devoir555" value="'.$_POST['id_devoir'].'"/>';?>
        <input type="hidden" name="type_action" value="devoir" />

        

        <button type="submit">Modifier</button>
</form>


</body>
</html>