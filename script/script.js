var path = window.location.pathname;
var file = path.split("/").pop();
var filename = file.split('.').slice(0, -1).join('.');

// nav functions
function nav_home(){
    if (filename != 'index') {
        window.location.href = "index.php";
    }
}

function nav_news(){
    if (filename != 'news') {
        window.location.href = "news.php";
    }
}

function nav_register(){
    if (filename != 'register') {
        window.location.href = "register.php";
    }
}

function nav_login(){
    if (filename != 'login') {
        window.location.href = "login.php";
    }
}

// Show all news in index.php if nav_news()
function show_All_News(){

}