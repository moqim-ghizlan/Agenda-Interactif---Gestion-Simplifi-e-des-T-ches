<?php
session_start();
$_SESSION["login"] = 0;
$_SESSION["password"] = 0;
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>log in</title>
    <link rel="stylesheet" href="styling/style.css">
</head>
    <body>
        <form action="main_page.php" method="POST" class="login_form">
            <input type="text" name="login_username" placeholder="Entrez votre email :">
            <br>
            <input type="password" name="login_password"placeholder="Entrez votre mot de passe :">
            <br>
            <button type="submit">Connexion</button>
            <div class="login_bottom">
                <p>Ou créer un nouveau <a href="signup_page.php">compte</a></p>
            </div>
        </form>
        
    </body>
</html>