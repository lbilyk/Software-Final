<?php
require_once 'dbconfig.php';
require_once 'serverFunctions.php';

$action = filter_input(INPUT_POST, 'action');

switch ($action) {
    case 'getLogbookUsernames':
        echo json_encode(getLogbookUsernames());
        break;
    default:
        echo null;
        break;
}