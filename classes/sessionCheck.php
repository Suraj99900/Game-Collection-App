<?php
require_once "../config.php";
include_once ABS_PATH_TO_PROJECT . "classes/sessionManager.php";
include_once ABS_PATH_TO_PROJECT . "classes/class.Input.php";


if (isset($sScreenURL) && $sScreenURL != "") {
    $sScreenURL = $sScreenURL;
} else if (Input::sanitize($_SERVER['REQUEST_METHOD'], ['addslashes' => true]) !== null && Input::sanitize($_SERVER['REQUEST_METHOD'], ['addslashes' => true]) == "GET") {
    if (!isset($sScreenURL) || $sScreenURL != false) {
        $sScreenURL = Input::sanitize($_SERVER["REQUEST_URI"], ['addslashes' => true]);
    } else {
        $sScreenURL = false;
    }
} else {
    $sScreenURL = false;
}

try {
    if (session_status()) {
        $oSessionManager = new SessionManager();
    }
} catch (Exception $e) {
    if (Input::request('_isAjax') !== null && Input::request('_isAjax', ['addslashes' => true])) {
        header("HTTP/1.1 401 Unauthorized");
        exit;
    } else {
        $sLoginURL = "login.php";
        header("Location: {$sLoginURL}");
        exit;
    }
}
