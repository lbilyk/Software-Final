<?php

require_once 'server/dbconfig.php';
session_start();
$email = $_POST['email'];
$username = $_POST['username'];
$password = $_POST['password'];

if($username && $password && $email) {

    global $mysqli;
    $query = "SELECT * FROM credentials WHERE username = ?";
    $statement = $mysqli->prepare($query);
    $statement->bind_param('s', $username);
    $statement->execute();
    $result = $statement->get_result();
    if(mysqli_num_rows($result) >= 1) {
        echo "exists";
        return;
    }
    else {
        $query = "INSERT INTO credentials (username,password,email) VALUES (?,?,?)";
        $statement = $mysqli->prepare($query);
        $statement->bind_param('sss', $username, $password, $email);
        $statement->execute();
        echo "success";
        return;
    }

}
