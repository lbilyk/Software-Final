<?php
require_once "server/serverFunctions.php";
require_once "Guest.php";

class User extends Guest {

    public function addEntryToLogbook($text) {
        $id = $this->userID;
        Logbook::addEntryToLogbook($id,$text);
    }
    public function setPassword($password) {
        $user = $this->user;
        Credentials::setPassword($user,$password);
    }
    public function setEmail($email) {
        $user = $this->user;
        Credentials::setEmail($user,$email);
    }

    public function getPassword() {
        $user = $this->user;
        return Credentials::getPassword($user);
    }
}
?>