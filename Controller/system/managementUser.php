<?php

include '../../Model/class/clsUser.php';

$type = (isset($_POST['type']) ? $_POST['type'] : "");
$id = (isset($_POST['id']) ? $_POST['id'] : "");
$user = (isset($_POST['user']) ? $_POST['user'] : "");
$name = (isset($_POST['name']) ? $_POST['name'] : "");
$lastName = (isset($_POST['lastName']) ? $_POST['lastName'] : "");
$password = (isset($_POST['password']) ? $_POST['password'] : "");
$rol = (isset($_POST['rol']) ? $_POST['rol'] : "");
$description = (isset($_POST['description']) ? $_POST['description'] : "");


$conex = new User($id,$user,$name,$lastName,$password,$rol,$description);

switch ($type) {
    case "save":
        $conex->save();
        break;

    case "update":
        $conex->update();
        break;

    case "load":
        $conex->load();
        break;

    case "erase":        
        $conex->erase();
        break;
    default:
}

?>


