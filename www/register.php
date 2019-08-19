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
<?php require_once 'nav.php';?>
<div class="container">
    <div class="card card-credentials mx-auto mt-5">
        <div class="card-header  mb-1 form-title font-weight-bold text-dark">Register</div>
        <div class="card-body">
            <form id="signUpForm" action="" method="POST">
                <div class="form-group my-2">
                    <input type="text" id="username" name="username" class="form-control" placeholder="Username" onchange="validateCorrectLength(this.id)"
                           required="required" autofocus="autofocus">
                    <div id="usernameErr" class="text-muted small text-center"></div>
                </div>
                <div class="form-group mb-2">
                    <input type="email" id="email" name="email" class="form-control"
                           placeholder="Email"
                           required="required" autofocus="autofocus">
                </div>
                <div class="form-group mb-2">
                    <input type="password" id="userPassword" name="password" class="form-control" placeholder="Password" onchange="validateCorrectLength(this.id)"
                           required="required" autofocus="autofocus">
                    <div id="userPasswordErr" class="text-muted small text-center"></div>
                </div>
                <div class="form-group">
                    <input type="password" id="confirmPassword" name="password" class="form-control" onchange="validateCorrectLength(this.id)"
                           placeholder="Confirm Password"
                           required="required" autofocus="autofocus">
                    <div id="confirmPasswordErr" class="text-muted small text-center"></div>
                </div>
                <div id="signUp" class="justify-content-center pt-2">
                    <input id="signUpBtn" type="button" value="Add Me" class="btn btn-primary btn-block" onclick="validateSignUpForm()">
                </div>
            </form>
        </div>
        <hr/>
        <div id="signUpError" class="text-muted small text-center pb-3 pt-0"></div>
    </div>
</div>
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="vendor/jquery/jquery.min.js"></script>
<script src="js/index.js"></script>
</body>
</html>
