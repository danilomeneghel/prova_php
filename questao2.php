<?php

session_start();

if ((isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] === true) ||
    (isset($_COOKIE['loggedin']) && $_COOKIE['loggedIn'] === true)) {
    header("Location: http://www.google.com");
    exit();
}
?>