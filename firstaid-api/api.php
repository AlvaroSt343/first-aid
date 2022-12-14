<?php 

include('model.php');

$Polizas = new Polizas();
$Clientes = new Clientes();

$CargarPolizas = $Polizas->listar();

$ListaAsegurados = array();

$secret = $_GET['secret']; 

if($secret == 'dc04878646d8b095986e822114523391dede6495cdb5b7901423ecf78db7f8ae') {

    if($CargarPolizas>1) {

        foreach($CargarPolizas as $Poliza) {
    
            $informacion_cliente = $Clientes->ver($Poliza['client_id']);
    
            // almacenar el nombre del cliente de la poliza en un array con $informacion_cliente['name']
    
            $ListaAsegurados[] = array(
                'nombre' => $informacion_cliente['name'],
                'edad' => $informacion_cliente['age'],
                'cliente' => 'Titular'
            );
    
            $listar_beneficiarios = $Clientes->listar_beneficiarios($Poliza['client_id']);
    
            if($listar_beneficiarios>1) {
    
                foreach($listar_beneficiarios as $beneficiario) {
    
                    // almacenar el nombre del beneficiario en el array con  $beneficiario['name'] 
    
                    $ListaAsegurados[] = array(
                        'nombre' => $beneficiario['name'],
                        'edad' => $beneficiario['age'],
                        'cliente' => 'Beneficiario de ' . $informacion_cliente['name']
                    );
                
                }
    
            }        
    
        }
    
        header("Content-Type: application/json;charset=utf-8");
    
        echo json_encode($ListaAsegurados);
        
    } 
    
}