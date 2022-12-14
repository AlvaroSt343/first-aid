<?php 

class Conectar {

    public function a_firstaid() {

        $db_name = 'firstaid_laravel';
        $db_usuario = 'firstaid_plugin';
        $db_password = 'd_vPqe4C0KDq';
        $db_solicitud = 'mysql:host=localhost;dbname='.$db_name.';charset=utf8';


        /*

        $db_name = 'firstaid_laravel';
        $db_usuario = 'root';
        $db_password = 'root';
        $db_solicitud = 'mysql:host=localhost;dbname='.$db_name.';charset=utf8';

        */

        $conexion = new PDO($db_solicitud,$db_usuario,$db_password);

        return $conexion; 

    }

}

class Polizas {

    public function listar() {

        $Resultados = null;
        
        $Conectar = new Conectar();
        $Conn = $Conectar->a_firstaid();

        $Solicitud = "SELECT * from policies WHERE CURRENT_DATE BETWEEN `from` AND `to`";

        $Consulta = $Conn->prepare($Solicitud);

        $Consulta->execute();

        while($RetornoConsulta = $Consulta->fetch()) {
            $Resultados[] = $RetornoConsulta;
        }

        return $Resultados;

    }

}

class Clientes {

    public function ver($cliente) {

        $Resultados = null;

        $Conectar = new Conectar();
        $Conn = $Conectar->a_firstaid();

        $Solicitud = "SELECT * from clients WHERE id=:id";

        $Consulta = $Conn->prepare($Solicitud);

        $Consulta->bindParam(':id',$cliente);

        $Consulta->execute();

        $Resultados = $Consulta->fetch(PDO::FETCH_ASSOC);

        return $Resultados;

    }

    public function listar_beneficiarios($cliente) {

        $Resultados = null;
        
        $Conectar = new Conectar();
        $Conn = $Conectar->a_firstaid();

        $Solicitud = "SELECT * from companions WHERE client_id=:client_id";

        $Consulta = $Conn->prepare($Solicitud);

        $Consulta->bindParam(':client_id',$cliente);

        $Consulta->execute();

        while($RetornoConsulta = $Consulta->fetch()) {
            $Resultados[] = $RetornoConsulta;
        }

        return $Resultados;

    }

}
