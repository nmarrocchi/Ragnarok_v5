<?php

  try
  {
      $bdd = new PDO('mysql:host=mysql-ragnarok.alwaysdata.net; dbname=ragnarok_v5', 'ragnarok', 'Ragnarok/V5/');
  }

  catch(Exception $e)
  {
      echo "J ai eu un problème erreur :".$e->getMessage();
  }


/* Check if user is logged and if isn't, return to index */
function CheckIfCanLog(){
    if(isset($_SESSION['Logged'])){
        if($_SESSION['Logged'] == 1){
            header('Location: index.php');
        }
    }
    else{
        $_SESSION['Logged'] = 0;
    }
}

/* Check if user is logged and if is log, return to index */
function CheckIfIsLog(){
    if(isset($_SESSION['Logged'])){
        if($_SESSION['Logged'] == 0){
            header('Location: index.php');
        }
    }
    else{
        $_SESSION['Logged'] = 0;
    }
}

?>