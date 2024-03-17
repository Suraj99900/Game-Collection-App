<?php
session_start();

/*!
 * @class AdminSessionManager
 * This class manages the user session.
 */

class AdminSessionManager
{
    public $iStaffID;
    public $sStaffMobileNo;
    public $sStaffName;
    public $sAccessToken;
    public $isStaffLoggedIn;


    //constructor
    function __construct()
    {

        // Start session
        if (!session_status()) {
            session_start();
        }
        if (isset($_SESSION["isStaffLoggedIn"])) {
            $this->iStaffID = $_SESSION['iStaffId'];
            $this->sStaffMobileNo = $_SESSION['sStaffMobileNo'];
            $this->sStaffName = $_SESSION['sStaffName'];
            // $this->sAccessToken = $_SESSION['sAccessToken']; 
            $this->isStaffLoggedIn = $_SESSION['isStaffLoggedIn'];

            // Session close
            session_write_close();
        }

    }

    public function fSetSessionData($aSessionData)
    {

        // Start session
        if (!session_status()) {
            session_start();
        }

        // Set session data
        $_SESSION['iStaffId'] = $aSessionData['id'];
        $_SESSION['sStaffName'] = $aSessionData['username'];
        $_SESSION['sStaffMobileNo'] = $aSessionData['phoneNumber'];
        $_SESSION['isStaffLoggedIn'] = $aSessionData['login'];

        // Set data
        $this->iStaffID = $_SESSION['iStaffId'];
        $this->sStaffMobileNo = $_SESSION['sStaffMobileNo'];
        $this->sStaffName = $_SESSION['sStaffName'];
        $this->isStaffLoggedIn = $_SESSION['isStaffLoggedIn'];

        // Session close
        session_write_close();
    }



    public function isLoggedIn()
    {

        return $this->isStaffLoggedIn;
    }

}
