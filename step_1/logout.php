<?php

session_start();
if (isset($_SESSION["name"]) || !empty($_SESSION['name'])){
    session_unset();
    session_destroy();
}
if (isset($_COOKIE["name"])){
    setcookie("name", "", time()- 3600); 
    setcookie("email", "", time()- 3600); 
    setcookie("idUser", "", time()- 3600); 
    setcookie("isAdmin", "", time()- 3600); 
}
header("Location: login.php", true, 302);
exit;

