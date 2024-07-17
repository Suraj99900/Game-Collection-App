<?php
header('Content-Type: application/json');

require_once "../classes/DB-Connection.php";
require_once "../classes/UserManage.php";
include_once "../classes/clientCode.php";
include_once "../classes/sessionManager.php";
include_once "../classes/class.Input.php";
$sFlag = Input::request('sFlag');

if ($sFlag == 'addUser') {
    $name = Input::request('username') ? Input::request('username') : '';
    $password = Input::request('password') ? Input::request('password') : '';
    $type = Input::request('type') ? Input::request('type') : 1;
    $secretCode = Input::request('secretCode') ? Input::request('secretCode') : '';

    // check client code
    $oClient = new clientCode();
    $oClientResult = $oClient->getClientCodeByByCode($secretCode);
    if (!$oClientResult) {
        echo json_encode(array("error" => "Wrong Code", "status" => 500));
    }
    if ($name == '' || $password == '' || $secretCode == '') {
        echo json_encode(array("error" => "Missing Parameters", "status" => 500));
        return false;
    }
    $userManage = new UserManage();
    $userManage->addUser($name, $password, $type);
    echo json_encode(array("message" => "User created successfully", "status" => 200));
}
if ($sFlag == 'updateUser') {
    $id = Input::request('id');
    $name = Input::request('name');
    $password = Input::request('password');
    $type = Input::request('type');
    if ($id == '' || $name == '' || $password == '' || $type == '') {
        echo json_encode(array("error" => "Missing Parameters", "status" => 500));
        return false;
    }
    $userManage = new UserManage();
    $userManage->updateUser($id, $name, $password, $type);
    echo json_encode(array("message" => "User updated successfully", "status" => 200));
}
if ($sFlag == 'delete') {
    $id = Input::request('id');
    if ($id == '') {
        echo json_encode(array("error" => "Missing ID parameter", "status" => 500));
        return false;
    }
    $userManage = new UserManage();
    $userManage->deleteUser($id);
    echo json_encode(array("message" => "User deleted successfully", "status" => 200));
}
if ($sFlag == 'fetch') {
    $userManage = new UserManage();
    $users = $userManage->fetchAll();
    echo json_encode($users);
}
if ($sFlag == 'fetchById') {
    $id = Input::request('id');
    if ($id == '') {
        echo json_encode(array("error" => "Missing ID parameter", "status" => 500));
        return false;
    }
    $userManage = new UserManage($id);
    echo json_encode(array('name' => $userManage->sName, 'type' => $userManage->iType, "status" => 200));
}
if ($sFlag == "login") {
    $name = Input::request('name') ? Input::request('name') : '';
    $password = Input::request('password') ? Input::request('password') : '';

    $userManage = new UserManage();
    $oResult = $userManage->login($name, $password);
    echo json_encode(array($oResult, "status" => 200));
}
?>