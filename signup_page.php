<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styling/style.css">
    <title>Créer un compte</title>
</head>
<body>
    <form action="confirm_signup.php" method="POST" class="login_form">

        <input type="text" name="signup_name" placeholder="Entre votre nom:">
        <br>
        <input type="text" name="signup_prename" placeholder="Entre votre prénome :">
        <br>
        <input type="text" name="signup_email" placeholder="Entrez votre email :" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$">
        <br>
        <input type="password" name="signup_password1" placeholder="Entrez votre mot de passe :" size = 15 pattern=".{6,}">
        <br>
        <input type="password" name="signup_password2" placeholder="conformez votre mot de pass :" size = 15 pattern=".{6,}">
        <br>
        <br>
        <button type="submit" >Créer le compte</button>
    </form>
    
</body>
</html>