<?php

include_once('clsConnect.php');

class Login extends Connect {

    private $user;
    private $password;

    public function __Construct($user, $password) {
        $this->user = $user;
        $this->password = $password;
        $this->connecting();
    }

    /**
     * Ejecuta una consulta login con los parametros usuario y contraseña
     *
     * @return void      
     * @author Johnny Alexander Salazar
     * @version 0.1
     */
    public function signin() {
        $query = parent::buildQuery("login", array((string) $this->user, (string) md5($this->password)));
        //$query = "select login('" . $this->user . "','" . md5($this->password) . "', 'result'); FETCH ALL IN result";
        parent::verifyLogin($query);
    }

    /**
     * Destruye la sesion que se encuentra activa
     *
     * @return string response:0 en formato JSON
     * @author Johnny Alexander Salazar
     * @version 0.1
     */
    public function signout() {
        session_start();
        session_destroy();
        echo '[{"response" : "1"}]';
    }

}
