<?php
    session_start();
    include 'include/functions.php';

  if(!isset($_SESSION['Logged']))
  {
    $_SESSION['Logged'] = 0;
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
    <link rel="stylesheet" href="style/index.css">
    <link rel="stylesheet" href="style/nav.css">
    <title>Ragnarök - News</title>
</head>
<body>
    <?php include 'include/nav.php' ?>

    <div class="content">
    
    <h1><img src="img/icon.png" alt="icon">Site du serveur Ragnarök en dev !</h1>

        <?php include 'include/news.php' ?>

        <?php include 'include/contact.php' ?>

        <?php include 'include/footer.php' ?>
    </div>
    
</body>
</html>