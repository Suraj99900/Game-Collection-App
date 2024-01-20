<?php
session_start();

/*!
 * @class SessionManager
 * This class manages the user session.
 */

class SessionManager
{
    public $iUserID;
    public $sUserMobileNo;
    public $sUserName;
    public $sAccessToken;
    public $isLoggedIn;


    //constructor
    function __construct()
    {

        // Start session
        if (!session_status()) {


            session_start();
        }
        $this->iUserID = $_SESSION['iUserID'];
        $this->sUserMobileNo = $_SESSION['sUserMobileNo'];
        $this->sUserName = $_SESSION['sUserName'];
        // $this->sAccessToken = $_SESSION['sAccessToken'];
        $this->isLoggedIn = $_SESSION['isLoggedIn'];

        // Session close
        session_write_close();

    }

    public function fSetSessionData($aSessionData)
    {

        // Start session
        if (!session_status()) {


            session_start();
        }

        // Set session data
        $_SESSION['iUserID'] = $aSessionData['id'];
        $_SESSION['sUserName'] = $aSessionData['username'];
        $_SESSION['sUserMobileNo'] = $aSessionData['phoneNumber'];
        $_SESSION['isLoggedIn'] = $aSessionData['login'];

        // Set data
        $this->iUserID = $_SESSION['iUserID'];
        $this->sUserMobileNo = $_SESSION['sUserMobileNo'];
        $this->sUserName = $_SESSION['sUserName'];
        $this->isLoggedIn = $_SESSION['isLoggedIn'];

        // Session close
        session_write_close();
    }



    public function isLoggedIn()
    {

        return $this->isLoggedIn;
    }

}
