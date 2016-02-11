<?php

include_once('clsConnect.php');

class User extends Connect {

    private $id;
    private $user;
    private $name;
    private $lastName;
    private $password;
    private $rol;
    private $description;

    public function __Construct($id,$user,$name,$lastName,$password,$rol,$description) {
        $this->id = $id;
        $this->user = $user;
        $this->name = $name;
        $this->lastName = $lastName;
        $this->password = $password;
        $this->rol = $rol;
        $this->description = $description;
        $this->connecting();
    }

    /**
     * Ejecuta un procedimiento almacenado de guardar, enviando los atributos necesarios del objeto
     * @return void      
     * @author Johnny Alexander Salazar
     * @version 0.1
     */
    public function save() {
        $query = parent::buildQuery("guardaRol", array((string) $this->name, (string) $this->description));
        parent::verify($query);
    }

    /**
     * Ejecuta un procedimiento almacenado de actualizar, enviando los atributos necesarios del objeto
     * @return void      
     * @author Johnny Alexander Salazar
     * @version 0.1
     */
    public function update() {
        $query = parent::buildQuery("editaRol", array($this->id, (string) $this->name, (string) $this->description));
        parent::verify($query);
    }

    /**
     * Ejecuta un procedimiento almacenado de listar, enviando los atributos necesarios del objeto
     * @return void      
     * @author Johnny Alexander Salazar
     * @version 0.1
     */
    public function load() {
        $query = parent::buildQuery("listaUsuario", array());
        parent::verifyLoad($query);
    }

    /**
     * Ejecuta un procedimiento almacenado de borrar, enviando los atributos necesarios del objeto
     * @return void      
     * @author Johnny Alexander Salazar
     * @version 0.1
     */
    public function erase() {
        $query = parent::buildQuery("eliminaRol", array($this->id));
        parent::verify($query);
    }

}
