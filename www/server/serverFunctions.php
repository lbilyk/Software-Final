<?php
require_once 'serverRequests.php';
require_once 'dbconfig.php';

function getLogbookUsernames()
{

    global $mysqli;
    $usernames = array();
    $query = "SELECT *FROM credentials";
    $statement = $mysqli->prepare($query);
    $statement->execute();
    $result = $statement->get_result();
    while ($row = mysqli_fetch_assoc($result)) {
        $usernames[] = $row['username'];
    }
    return $usernames;
}

class Logbook
{
    public function getLogbookEntries($userID)
    {
        global $mysqli;
        $entries = array();
        $query = "SELECT * FROM logbookentries WHERE id = ?";
        $statement = $mysqli->prepare($query);
        $statement->bind_param('i', $userID);
        $statement->execute();
        $result = $statement->get_result();

        while ($row = mysqli_fetch_assoc($result)) {
            $entries[] = $row;
        }
        return $entries;
    }

    public function  addEntryToLogbook($id, $text) {
        global $mysqli;
        $query = "INSERT INTO logbookentries (id,date,time,text) VALUES (?,NOW(),NOW(),?)";
        $statement = $mysqli->prepare($query);
        $statement->bind_param('is', $id,$text);
        $statement->execute();
    }
}

class Credentials {

    public function getUserID($username)
    {
        global $mysqli;
        $query = "SELECT id FROM credentials WHERE username = ?";
        $statement = $mysqli->prepare($query);
        $statement->bind_param('s', $username);
        $statement->execute();
        $result = $statement->get_result();
        $id =$result->fetch_assoc();

        return $id['id'];
    }
    public function getUserEmail($username)
    {
        global $mysqli;
        $query = "SELECT email FROM credentials WHERE username = ?";
        $statement = $mysqli->prepare($query);
        $statement->bind_param('s', $username);
        $statement->execute();
        $result = $statement->get_result();
        $email =$result->fetch_assoc();

        return $email['email'];
    }

    public function getPassword($username)
    {
        global $mysqli;
        $query = "SELECT password FROM credentials WHERE username = ?";
        $statement = $mysqli->prepare($query);
        $statement->bind_param('s', $username);
        $statement->execute();
        $result = $statement->get_result();
        $pass =$result->fetch_assoc();
        return $pass['password'];
    }


    public function setPassword($username,$password)
    {
        global $mysqli;
        $query = "UPDATE credentials SET password = ? WHERE username = ?";
        $statement = $mysqli->prepare($query);
        $statement->bind_param('ss',$password, $username);
        $statement->execute();
        $result = $statement->get_result();
        return $result;
    }
    public function setEmail($username,$email)
    {
        global $mysqli;
        $query = "UPDATE credentials SET email = ? WHERE username = ?";
        $statement = $mysqli->prepare($query);
        $statement->bind_param('ss',$email, $username);
        $statement->execute();
        $result = $statement->get_result();
        return $result;
    }
}