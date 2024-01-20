<?php
require_once "config.php";
include_once ABS_PATH_TO_PROJECT . "classes/sessionManager.php";


$aFunctionMap = array(
    'userLogin' => 'ajax_userLogin',
    'setSessionData' => 'ajax_setSessionData'
);

$iFunc = $_REQUEST['sFlag'];

if (isset($aFunctionMap[$iFunc])) {
    $method = $aFunctionMap[$iFunc];
    $aResponse = $method($_REQUEST);
    header("Content-Type: application/json");
    echo json_encode($aResponse);
} else {
    header("HTTP/1.1 401 Unauthorized");
    exit;
}

function ajax_setSessionData($aRequestData)
{
    $oSessionManager = new SessionManager();
    $oSessionManager->fSetSessionData($aRequestData);
    return ['iUserID' => $oSessionManager->iUserID];
}

function ajax_userLogin($aRequestData)
{

    $sUserName = $aRequestData['user_name'];
    $sPassword = $aRequestData['user_password'];
    $aResponse = array();

    if ($sUserName == 'admin' && $sPassword == "AjyaQ8%aEv") {

        $aResponse = [
            'user_id' => '1',
            'user_name' => 'Admin',
            'mobile_number' => '8888888888',
            'access_token' => 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpYXQiOjE2ODM4NzIyMTMsImNsaW5pY19pZCI6MSwiY2xpZW50X2lkIjoiNjYzMTRmOGQ5NTRmN2RhNTEyMzkiLCJ1c2VyX2lkIjoxLCJqdGkiOjk1NTk5MjMyNTcyfQ.3qjepfTnSOi0-2lNZ6KrOH7ID0H5LdNnp2sS1wQ4Vb4',
            'success' => true
        ];
    } else {
        $aResponse = ['success' => false, 'message' => 'Invalid login credentials'];
    }

    return $aResponse;
}
