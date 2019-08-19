<?php
error_reporting(0);
session_start();
if ($_SESSION['logbook'] == null || $_SESSION == '') {
    $button = "Login";
    $href = "login.php";
    $register = "Register";
    $regHref = "register.php";
}
else {
    $button = "Log out";
    $href = "logout.php";
    $register = $_SESSION['logbook'];
    $regHref = "#";
}

echo "<nav class='navbar navbar-expand navbar-dark bg-light static-top'>
    <a class='navbar-brand mr-1 text-dark'>Logbook Hosting Website</a>
    <ul class='navbar-nav ml-auto mr-0 mr-md-3 my-2 my-md-0'>
        <li class=\"nav-item dropdown no-arrow\">
            <a href='$regHref' class=\"nav-link d-inline active text-dark\">$register</a>
            <a href='$href'; class=\"nav-link d-inline text-dark\">$button</a>
        </li>
    </ul>
</nav>";
