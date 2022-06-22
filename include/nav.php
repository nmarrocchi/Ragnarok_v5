<div id="navbar">
    <ul>
        <li><p onclick="nav_home()"><span class="material-icons">home</span> Home</p></li>
        <li><p onclick="nav_news()"><span class="material-icons">newspaper</span> News</p></li>
        <?php
            if($_SESSION['Logged'] == 1){
                echo '<li><p onclick="location.href = `account.php`;"><span class="material-icons">account_circle</span>Compte</p></li>
                <li><p onclick="location.href = `include/disconnection.php`;"><span class="material-icons">person_add_alt</span> Déconnexion</p></li>';
            }
            else{
                echo '<li><p onclick="nav_register()"><span class="material-icons">person_add_alt</span> S\'inscrire</p></li>
                <li><p onclick="nav_login()"><span class="material-icons">supervised_user_circle</span> Connexion</p></li>';
            }
        ?>
    </ul>
</div>