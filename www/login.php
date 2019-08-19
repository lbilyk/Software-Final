<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Sign Up</title>
    <meta name="author" content="Lyubomyr Bilyk">
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Karla" rel="stylesheet">
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="css/index.css" rel="stylesheet">
</head>
<body id="page-top" class="bg-secondary">
<?php require_once 'nav.php'; ?>
<div class="container">
    <div class="card card-credentials mx-auto mt-5">
        <div class="card-header mb-1 form-title font-weight-bold text-dark">Log In</div>
        <div class="card-body">
            <form id="loginForm" method="POST">
                <div class="form-group my-2">
                    <input type="text" id="user" name="username" class="form-control" placeholder="Username"
                           required="required" autofocus="autofocus">
                    <div id="usernameErr" class="text-muted small text-center"></div>
                </div>

                <div class="form-group mb-2">
                    <input type="password" id="pass" name="password" class="form-control" placeholder="Password"
                           required="required" autofocus="autofocus">
                    <div id="userPasswordErr" class="text-muted small text-center"></div>
                </div>
                <div id="login" class="justify-content-center pt-2">
                    <input id="signUpBtn" type="button" value="Log In" class="btn btn-primary btn-block" onclick="validateLogin()">
                </div>
            </form>
            <div class="container">
                <p class="pt-3 m-0 small">Guest level access (view only): Select logbook username from dropdown list</p>
                <p class="small">User level access (view and edit): Login with username and password</p>
                <h6 class="pt-5">Available logbook usernames</h6>
                <select class="form-control mt-4" id="logbookUsernames" onchange="selectUsername()"></select>
            </div>
        </div>
        <hr/>
    </div>
</div>
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="vendor/jquery/jquery.min.js"></script>
<script src="js/index.js"></script>
<script src="js/login.js"></script>
</body>
</html>
