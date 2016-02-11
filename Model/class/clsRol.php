<?php

include_once('clsConnect.php');

class Rol extends Connect {

    private $id;
    private $name;
    private $description;

    public function __Construct($id, $name, $description) {
        $this->id = $id;
        $this->name = $name;
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
        $query = parent::buildQuery("listaRol", array());
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
