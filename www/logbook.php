<?php
include('Guest.php');
include('User.php');
session_start();
if ($_SESSION['user'] == null || $_SESSION == '') {
    header('Location: login.php');
}
if ($_SESSION['user'] == "Guest") {

    $isGuest = true;
} else {
    $isGuest = false;
}
if ($isGuest) {
    $user = new Guest();
} else {
    $user = new User();
}
$credentials = $user->getUserCredentials();
$entries = $user->getEntriesForUser();

if (isset($_POST["updateEmail"])) {
    $user->setEmail($_POST["email"]);
    header("Location: logbook.php");
    exit();
}
if (isset($_POST["updatePassword"])) {
    $user->setPassword($_POST["password"]);
    header("Location: logbook.php");
    exit();

}
if (isset($_POST["addEntry"])) {
    $user->addEntryToLogbook($_POST["addEntry"]);
    header("Location: logbook.php");
    exit();
}

if ($isGuest) {
    $entryContainer = '<a href="#" class="list-group-item list-group-item-action text-left queueItem"><div class="row d-flex w-100 small font-weight-bold mr-5"><div class="col-sm-3 d-inline-block">ID</div><div class="col-sm-3">Date</div><div class="col-sm-3">Time</div><div class="col-sm-3">Log Entry Text</div></div></a>';
    for ($i = 0; $i < count($entries); $i++) {
        $entry = $entries[$i];
        $entryContainer = $entryContainer . '<a href="#" class="list-group-item list-group-item-action text-left queueItem"><div class="row d-flex w-100 small mr-5"><div class="col-sm-3 d-inline-block"> ' . $entry["id"] . '</div><div class="col-sm-3"> ' . $entry["date"] . '</div><div class="col-sm-3"> ' . $entry["time"] . '</div><div class="col-sm-3"> ' . $entry["text"] . '</div></div></a>';
    }
    $page = "<div class=\"container container-fluid pt-xl-5 text-center\">
    <div class=\"row pt-5 justify-content-center\">
        <div class=\"col-xl-4 col-xl-2 mb-4 text-center justify-content-center\">
            <div class=\"card shadow justify-content-center\">
                <div class=\"card-body text-center\">
                    <div class=\"card-text text-center\">
                        <h5 class=\"text-body text-center \">Profile</h5>
                        <p class='m-0 text-left'>ID: " . $credentials['id'] . "</p>
                        <p class='m-0 text-left'>Username: " . $credentials['user'] . "</p>
                        <p class='m-0 text-left'>Email: " . $credentials['email'] . "</p>
                    </div>
                </div>
            </div>
            </div>
            </div>
                <div class=\"row pt-2 justify-content-center\">
            <div class=\"col-xl-8 mt-2 mb-4 text-center justify-content-center\">
            <div class=\"card shadow justify-content-center mt-4\">
                <div class=\"card-body text-center\">
                    <div class=\"card-text text-center\">
                        <h5 class=\"text-body text-center \">Logbook Entries</h5>" . $entryContainer . "
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>";
} else {

    $password = $user->getPassword();
    $entryContainer = '<a href="#" class="list-group-item list-group-item-action text-left queueItem"><div class="row d-flex w-100 small font-weight-bold mr-5"><div class="col-sm-3 d-inline-block">ID</div><div class="col-sm-3">Date</div><div class="col-sm-3">Time</div><div class="col-sm-3">Log Entry Text</div></div></a>';
    for ($i = 0; $i < count($entries); $i++) {
        $entry = $entries[$i];
        $entryContainer = $entryContainer . '<a href="#" class="list-group-item list-group-item-action text-left queueItem"><div class="row d-flex w-100 small mr-5"><div class="col-sm-3 d-inline-block"> ' . $entry["id"] . '</div><div class="col-sm-3"> ' . $entry["date"] . '</div><div class="col-sm-3"> ' . $entry["time"] . '</div><div class="col-sm-3"> ' . $entry["text"] . '</div></div></a>';
    }
    $page = "<div class=\"container container-fluid pt-xl-5 text-center\">
    <div class=\"row pt-5 justify-content-center\">
        <div class=\"col-xl-4  mb-4 text-center justify-content-center d-inline-block\">
            <div class=\"card shadow justify-content-center\">
                <div class=\"card-body text-center\">
                    <div class=\"card-text text-center\">
                        <h5 class=\"text-body text-center \">Profile</h5>
                        <p class='m-0 text-left'>ID: " . $credentials['id'] . "</p>
                        <p class='m-0 text-left'>Username: " . $credentials['user'] . "</p>
                        <p class='m-0 text-left'>Password: " . $password . "</p>
                        <p class='m-0 text-left'>Email: " . $credentials['email'] . "</p>
                    </div>
                </div>
            </div>
        </div>
         <div class=\"col-xl-4 mb-4 text-center justify-content-center d-inline-block\">
            <div class=\"card shadow justify-content-center\">
                <div class=\"card-body text-center\">
                    <div class=\"card-text text-center\">
                        <h5 class=\"text-body text-center \">Change Credentials</h5>
                        <form id=\"loginForm\" action='logbook.php' method=\"POST\">
                      <div class=\"form-group my-2\">
                    <input type=\"text\" id=\"user\" name=\"email\" class=\"form-control\" placeholder=\"Email\"
                           autofocus=\"autofocus\">
                           <div class='container text-right justify-content-end'>
                                    <input type='submit' name='updateEmail' class=' mt-2 btn btn-info text-right' value='Update'></div>
                </div>
                <div class=\"form-group mb-2\">
                    <input type=\"password\" id=\"pass\" name=\"password\" class=\"form-control\" placeholder=\"Password\"
                           autofocus=\"autofocus\">
                          <div class='container text-right justify-content-end'>
                           <input type='submit' name='updatePassword' class=' mt-2 btn btn-info text-right' value='Update'></div>
                </div>
                </form>
                </div>
                    </div>
                </div>
            </div>
             <div class=\"col-xl-4 mb-4 text-center justify-content-center d-inline-block\">
            <div class=\"card shadow justify-content-center m-0 p-0\">
                <div class=\"card-body text-center\">
                                        <form id=\"loginForm\" action='logbook.php' method=\"POST\">
                   <div class=\"form-group mb-2\">
                                        <h5 class=\"text-body text-center \">New Entry</h5>

                    <textarea class=\"form-control\" rows=\"3\" name='addEntry'></textarea>
                      <div class=\"form-group mb-2\">
                          <div class='container text-right justify-content-end'>
                           <input type='submit' class=' mt-2 btn btn-info text-right' value='Add'></div>
                </div>
                </div>
                </form>
                </div>
            </div>\
        </div>
        </div>
        <div class=\"row pt-2 justify-content-center\">
            <div class=\"col-xl-8 mt-2 mb-4 text-center justify-content-center\">
              <div class=\"card shadow justify-content-center mt-4\">
                <div class=\"card-body text-center\">
                    <div class=\"card-text text-center\">
                        <h5 class=\"text-body text-center \">Logbook Entries</h5>" . $entryContainer . "
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>";

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Logbook</title>
    <meta name="author" content="Lyubomyr Bilyk">
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Karla" rel="stylesheet">
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="css/index.css" rel="stylesheet">
    <script src="https://www.google.com/jsapi"></script>
</head>
<body id="page-top" class="bg-white">
<?php require_once 'nav.php';
echo $page;
?>
<div class="text-center copyright text-white">
    <hr/>
    <span>Copyright © Lyubomyr Bilyk</span>
</div>
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="vendor/jquery/jquery.min.js"></script>
<script src="js/index.js"></script>
</body>
</html>