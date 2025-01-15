<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styling/style.css">
    <link rel="stylesheet" href="styling/style_main.css">
    <title>Confirmer</title>
</head>
<body>
    <?php 
        require("./functions.php");
        $nom = $_POST['signup_name'];
        $prenom = $_POST['signup_prename'];
        $email = $_POST['signup_email'];
        $password1 = $_POST['signup_password1'];
        $password2 = $_POST['signup_password2'];
        if(empty($nom)==true || empty($prenom)==true || empty($email)==true || empty($password1)==true || empty($password2)==true){
            echo '<div class="div_form_centre"><h1>Vous devez remplire tout les chomps, voici la page de creation du compte</h1>';
            echo '<form action="./signup_page" class="form_error" method="POST"><button class="btn" type="submit">Créer un compte</button></form></div>';
        }
        else{
            if(email_exits($email)==true){
                echo "<div class='div_form_centre'><h1>L'email est déjà enregistré. Essagez avec un autre email\'</h1>";
                echo '<form action="./signup_page" class="form_error" method="POST"><button class="btn" type="submit">Créer un compte</button></form><div>';
            }
            else{
                if(strlen($password1)<=6){
                    echo '<h1>Mot de passe doit être plus de 6 lettres</h1>';
                }
                else{
                    new_user($nom, $prenom, $email, $password1, $password2);
                    session_start();
                    $_SESSION['login']=$email;
                    $_SESSION['password']=$password1;
                    header('Location: main_page.php');
                }
            }
        }
        
    ?>
</body>
</html>