<?php
require_once "server/serverFunctions.php";
class Guest
{
    protected $user;
    protected $userID;
    protected $entries;
    protected $email;

    protected function getUsername()
    {
        $this->user = $_SESSION['logbook'];
    }

    protected function getUserID()
    {
        $this->userID = Credentials::getUserID($this->user);
    }

    protected function getUserEmail()
    {
        $this->email = Credentials::getUserEmail($this->user);
    }

    protected function getLogbookEntries()
    {
        $this->entries = Logbook::getLogbookEntries($this->userID);
    }

    public function getUserCredentials()
    {

        $credentials = array();
        $this->getUsername();
        $this->getUserID();
        $this->getUserEmail();

        $credentials['id'] = $this->userID;
        $credentials['user'] = $this->user;
        $credentials['email'] = $this->email;

        return $credentials;
    }

    public function getEntriesForUser()
    {
        $this->getUsername();
        $this->getUserID();
        $this->getLogbookEntries();
        return $this->entries;
    }
}


?>