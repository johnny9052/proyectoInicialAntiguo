<?php

abstract class Connect {

    private $userbd;
    private $passworddb;
    private $database;
    private $port;
    private $host;
    private $chainConect;
    private $connect;

    public function connecting() {
        $this->userbd = "postgres";
        $this->passworddb = "admin";
        $this->database = "InitialProject";
        $this->port = 5432;
        $this->host = "localhost";
        $this->chainConect = "host=$this->host port=$this->port dbname=$this->database user=$this->userbd password=$this->passworddb";
        $this->connect = pg_connect($this->chainConect) or die("Error al realizar la conexion");
    }

    public function getConnect() {
        return $this->connect;
    }

    /**
     * Construye una consulta sql y retorna el resultado en un cursor
     *
     * @return string consulta armada
     * @param string $nameFunction Nombre de la funcion que se quiere ejecutar
     * @param array $array Vector que contiene los parametros que llevara la consulta
     * @author Johnny Alexander Salazar
     * @version 0.3
     */
    public function buildQuery($nameFunction, $array) {
        $query = "select " . $nameFunction . "(";
        
        if ($array) {//tiene parametros?
            for ($i = 0; $i < count($array); $i++) {
                (is_string($array[$i])) ? $query.="'" . $array[$i] . "'" : $query.=$array[$i]; //si es String pone comilla
                //echo $i. ' &&  '.count($array). ' ----';
                if ((int)($i) < (int)(count($array)-1)) { //si quedan mas parametros pone una ,
                    //echo 'entre';
                    $query.=",";
                }
            }
            $query.= ", 'result'); FETCH ALL IN result";
        } else {
            $query.= "'result'); FETCH ALL IN result";
        }
        return $query;
    }

    /**
     * Construye una consulta sql y retorna un dato con el nombre de res
     *
     * @return string consulta armada
     * @param string $nameFunction Nombre de la funcion que se quiere ejecutar
     * @param array $array Vector que contiene los parametros que llevara la consulta
     * @author Johnny Alexander Salazar
     * @version 0.1
     */
    public function buildQuerySimply($nameFunction, $array) {
        $query = "select " . $nameFunction . "(";

        for ($i = 0; $i < count($array); $i++) {
            (is_string($array[$i])) ? $query.="'" . $array[$i] . "'" : $query.=$array[$i]; //si es String pone comilla
            if ($i < count($array) - 1) { //si quedan mas parametros pone una ,
                $query.=",";
            }
        }
        $query.= ") as res;";
        return $query;
    }

    /**
     * Ejecuta una consulta sql y retorna su resultado, si encuentra algo inicia una sesion
     *
     * @return string Echo de resultado de la consulta en formato JSON
     * @param string $query Consulta a ejecutar     
     * @author Johnny Alexander Salazar
     * @version 0.1
     */
    public function verifyLogin($query) {

        $resultado = pg_query($this->getConnect(), $query) or die("Problemas en la consulta: " . pg_last_error());

        while ($reg = pg_fetch_array($resultado, null, PGSQL_ASSOC)) {
            $vec[] = $reg;
        }

        if (isset($vec)) {
            session_start();
            $_SESSION["user"] = pg_result($resultado, 0, 0);
            $_SESSION["username"] = pg_result($resultado, 0, 1) . " " . pg_result($resultado, 0, 2);
            echo(json_encode($vec));
        } else {
            echo '[{"response" : "0", "msg" : "El usuario no existe"}]';
        }
    }

    /**
     * Ejecuta una consulta sql y retorna su resultado
     *
     * @return string Echo de resultado de la consulta en formato JSON
     * @param string $query Consulta a ejecutar     
     * @author Johnny Alexander Salazar
     * @version 0.1
     */
    public function verify($query) {
        $resultado = pg_query($this->getConnect(), $query) or die("Problemas en la consulta: " . pg_last_error());

        while ($reg = pg_fetch_array($resultado, null, PGSQL_ASSOC)) {
            $vec[] = $reg;
        }

        if (isset($vec)) {
            echo(json_encode($vec));
        } else {
            echo '[{"res" : "Error en la operacion, comunique al administrador"}]';
        }
    }

    /**
     * Ejecuta una consulta sql y retorna una tabla HTML con el resultado de la consulta
     *
     * @return string Echo de resultado de la consulta en formato JSON, con variable res y conteniendo la talba
     * @param string $query Consulta a ejecutar     
     * @author Johnny Alexander Salazar
     * @version 0.1
     */
    public function verifyLoad($query) {

        $resultado = pg_query($this->getConnect(), $query) or die("Problemas en la consulta: " . pg_last_error());

        if ($resultado && pg_numrows($resultado) > 0) {
            $cadenaHTML = "<table class='list'>";
            $cadenaHTML .= "<tr>";
            $cadenaHTML .= "<th>sel.</th>";

            for ($cont = 1; $cont < pg_num_fields($resultado); $cont++) { //arma la cabecera de la tabla                
                $cadenaHTML .= "<th>" . pg_field_name($resultado, $cont) . "</th>";
                //VERIFICAR AQUI
            }

            $cadenaHTML .= "</tr>";

            for ($cont = 0; $cont < pg_numrows($resultado); $cont++) { //recorre registro por registro
                //variable que contiene el tr con la funcion del selradio y el update data
                $fila = "<tr onclick=%selRadio(" . pg_result($resultado, $cont, 0) . ");updateData([";
                //variable que contiene los valores de los campos de la tabla
                $campos = "";
                //en el registro que se encuentre pinta sus campos y los saca para la funcion selradio y update data
                for ($posreg = 0; $posreg < pg_num_fields($resultado); $posreg++) {//por cada valor del registro
                    $fila.='\'' . pg_result($resultado, $cont, $posreg) . "'"; //lo añade a la funcion updatedata
                    
                    
                    if ($posreg > 0) {//omite el id para no mostrarlo en los campos de la tabla
                        $campos.="<td>" . pg_result($resultado, $cont, $posreg) . "</td>";
                    }
                    //VERIFICAR AQUI
                    
                    if ($posreg < pg_num_fields($resultado) - 1) { //si quedan mas parametros por recorrer pone una ,
                        $fila.=",";
                    }
                }
                $fila.= "])%>"; //finaliza la funcion updatedata
                $cadenaHTML.=$fila . "<td class='sel'><input type='radio' id='radio" . pg_result($resultado, $cont, 0) . "' name='gradio'></td>";
                $cadenaHTML.=$campos . "</tr>";
            }

            $cadenaHTML.="</table>";
        } else {
            $cadenaHTML = "<label>No hay registros en la base de datos</label>";
        }

        echo '[{"res" :"' . $cadenaHTML . '"}]';
    }

}

?>