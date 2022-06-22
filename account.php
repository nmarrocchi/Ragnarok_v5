<?php 
    session_start();
    include 'include/functions.php';

    CheckIfIsLog();
    
    $userInfos = $bdd->query("SELECT * FROM utilisateurs WHERE email = '".$_SESSION["email"]."' ");
    $userInfos = $userInfos->fetch();

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
    <link rel="stylesheet" href="style/index.css">
    <link rel="stylesheet" href="style/nav.css">
    <link rel="stylesheet" href="style/account.css">
    <title>Ragnarök - Compte</title>
</head>
<body>
    <?php include 'include/nav.php' ?>

    <div class="content">

      <div class="User_Infos">
        <div id="User_Banner">
          <img id="User_picture" src="img/users/Default/picture.png" alt="Picture">
          <h1 id="User_pseudo"><?php echo $userInfos[0] ?></h1>
          <p id="User_registration">Register Date : <?php echo $userInfos[2] ?></p>
        </div>

      </div>

      <!-- <div id="Web_Chat">
        <div id="Ragnarok_Chat">
          
        </div>

        <div id="Message_text">
            <label for="inputText" id="inputNick"><script>document.write(DefaultPseudo);</script></label>
            <input type="text" name="inputText" id="inputText">
            <button id="sendButton" onClick="sendMessage()">Envoyer</button>
        </div>
    
    </div>

  <script src="script/websocket.js"></script> -->
</body>
</html>