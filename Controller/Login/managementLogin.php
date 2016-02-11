<?php

include '../../Model/class/clsLogin.php';

$type = (isset($_POST['type']) ? $_POST['type'] : "");
$user = (isset($_POST['user']) ? $_POST['user'] : "");
$pass = (isset($_POST['password']) ? $_POST['password'] : "");


$conex = new Login($user, $pass);

switch ($type) {
    case "login":        
        $conex->signin();
        break;
    case "logout":
        $conex->signout();
        break;
    default:
}

?>

