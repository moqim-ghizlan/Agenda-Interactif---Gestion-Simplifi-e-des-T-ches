<?php
    require("../functions.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styling/style.css">
    <link rel="stylesheet" href="../styling/style_main.css">
    <title>Ajouter un devoir</title>
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
    <form action="done.php" method="POST" class="add_form">
        <div class="top">
            <spam>Chossisez votre matière</spam>
            <select name="devoirs">
                <?php 
                foreach(get_list_matieres() as $m){
                    echo'<option value='.$m.'> '.$m.'</option>';
                }?>
            </select><br>
        </div>
        <div class="top">
            <spam>Chossisez le type de devoir</spam>
            <select name="type">
                <option value="tp">TP</option>
                <option value="td">TD</option>
            </select><br>
        </div>
        <div class="bottom">
        <textarea rows="10" cols="40" placeholder="Ajouter une note sur le devoir :" name="note"></textarea><br>
        <input type="date" value="<?php echo date('Y-m-d')?>"max="2025-1-1" name="date"><br>
        <input type="hidden" name="type_added" value="devoir"/>
        <button type="submit">Ajouter</button>
        </div>
        
    </form>
</body>
</html>