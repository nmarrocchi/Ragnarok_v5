<?php
    session_start();
    require("include/functions.php");
    CheckIfCanLog();

    if (isset($_POST["submit"])) {
        $UserExist = $bdd->query("SELECT COUNT(*) FROM utilisateurs WHERE email = '".$_POST['email']."' AND password = '".$_POST['password']."'");
        $UserExist = $UserExist->fetch();

        if ($UserExist["COUNT(*)"] > 0) {
            $_SESSION['Logged'] = 1;
            $_SESSION['email'] = $_POST['email'];
            header("location: index.php");
        } 
        else {
            $Error = "Compte non trouvé, veuillez vous créer un compte avant de vous connecter";
            
        }
    }
    else{
        $Error = "";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/icon.png" type="image/x-icon">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <script src="script/script.js"></script>
    <link rel="stylesheet" href="style/nav.css">
    <link rel="stylesheet" href="style/form.css">
    <link rel="stylesheet" href="style/cube.css">
    <title>Ragnarök - Login</title>
</head>
<body>
    <?php include 'include/nav.php' ?>
    <div class="Form">
        <form action="" method="post">
            <h1>Connexion</h2>
            <p><?php echo $Error ?></p>
            <input type="mail" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Mot de passe" required>
            <label><input type="checkbox" name="remember"> Se souvenir</label>
            
            <input type="submit" name="submit" value="Connexion">
        </form>
    </div>
    <?php include 'include/cube.php' ?>

    
</body>
</html>