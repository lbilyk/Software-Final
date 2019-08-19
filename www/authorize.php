<?php
require_once 'server/dbconfig.php';
session_start();

$username = $_POST['username'];
$password = $_POST['password'];

if ($username) {
    global $mysqli;
    $query = "SELECT * FROM credentials WHERE username = ?";
    $statement = $mysqli->prepare($query);
    $statement->bind_param('s', $username);
    $statement->execute();
    $result = $statement->get_result();
    $user = $result->fetch_assoc();
    if($user["username"] == $username) {
        if(strlen($password) < 1) {
            $_SESSION['user'] = "Guest";
            $_SESSION['logbook'] = $user["username"];
            echo "guest";
            return;
        }
        if ($user["password"] == $password) {
            $_SESSION['user'] = $user["username"];
            $_SESSION['logbook'] = $user["username"];
            echo "user";
            return;
        }
        else {
            echo "invalid";
            return;
        }
    }
    else {
        echo "not exist";
        return;
    }
}