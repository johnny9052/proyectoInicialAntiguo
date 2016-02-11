<?php

include '../../Model/class/clsRol.php';

$type = (isset($_POST['type']) ? $_POST['type'] : "");
$name = (isset($_POST['name']) ? $_POST['name'] : "");
$description = (isset($_POST['description']) ? $_POST['description'] : "");
$id = (isset($_POST['id']) ? $_POST['id'] : "");

$conex = new Rol($id, $name, $description);

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


