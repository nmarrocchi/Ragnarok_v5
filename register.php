<?php
    session_start();
    include 'include/functions.php';
    CheckIfCanLog();

    if (isset($_POST["submit"])) {
        if($_POST['password'] == $_POST['password-retape']){
            $countReq = $bdd->query("SELECT COUNT(*) FROM utilisateurs WHERE pseudo = '".$_POST['username']."'");
            $count = $countReq->fetch();
            
            if($count["COUNT(*)"] > 0){
                $Error = 'Ce pseudo est déja pris par un autre utilisateur';
            }else{
                $date = date('Y-m-d H:i:s');
                $bdd->query("INSERT INTO utilisateurs (pseudo, email, date_inscription, password) VALUES('".$_POST['username']."','".$_POST['email']."','".$date."','".$_POST['password']."')");
                $Error = "Votre compte a été créé, vous pouvez maintenant vous connecter";
            }
        }
        else {
            $Error = 'Les mots de passe de correspondent pas';
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
    <title>Ragnarök - Register</title>
</head>
<body>
    <?php include 'include/nav.php' ?>
    <div class="Form">
        <form action="" method="post">
            <h1>Inscription</h2>
            <p><?php echo $Error ?></p>
            <input type="text" name="username" placeholder="Pseudo" required>
            <input type="mail" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Mot de passe" required>
            <input type="password" name="password-retape" placeholder="Re-tapez votre mot de passe" required autocomplete='off'>
            
            <input type="submit" name="submit" value="Inscription">
        </form>
    </div>
    <?php include 'include/cube.php' ?>

    
</body>
</html>