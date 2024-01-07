<?php
require_once "../config.php";
session_start(); 
// Unset all session variables
$_SESSION = array();

// Destroy the session
session_destroy();
header("Location: " . INDEX_LOCATION, true, 301);
exit();
