<?php 

include_once('../conectar.php');
include_once('../funciones.php');
include_once('../pacientes/funciones.php');
include_once('../horas/funciones.php');


$rut = $_GET['rut'];
$fecha = $_GET['fecha'];
$fechaAntes = strtotime ( '-7 day' , strtotime ( $fecha ) ) ;
$fechaAntes=date ( 'Y-m-j' , $fechaAntes );
$nuevafecha = strtotime ( '+7 day' , strtotime ( $fecha ) ) ;
$nuevafecha = date ( 'Y-m-j' , $nuevafecha );


if($rut)
{
	$conectar = conectar();
	$rut = SacarPunto($rut);

	$datosPacienteRut = datosPacienteRut($rut, $conectar);

	$apellidoMaterno = utf8_encode(html_entity_decode($datosPacienteRut[apellidoMaterno]));

    $numerohoras = siExisteHoraPrevia($datosPacienteRut[id],$fechaAntes,$nuevafecha,$conectar);
	$json = array(
                array('field' => 'idpaciente',
                    'value' => $datosPacienteRut[id]),
				array('field' => 'nombres',  
					'value' => utf8_encode(html_entity_decode($datosPacienteRut[nombres]))),  
				array('field' => 'apellidoPaterno',  
					'value' => utf8_encode(html_entity_decode($datosPacienteRut[apellidoPaterno]))), 
				array('field' => 'apellidoMaterno',  
					'value' => utf8_encode(html_entity_decode($datosPacienteRut[apellidoMaterno]))),  
				array('field' => 'direccion',  
					'value' => utf8_encode(html_entity_decode($datosPacienteRut[direccion]))), 
				array('field' => 'telefono',  
					'value' => $datosPacienteRut[telefono]),
                array('field' => 'numhoras',
                          'value' => $numerohoras),
				array('field' => 'celular',  
					'value' => utf8_encode(html_entity_decode($datosPacienteRut[celular]))),
				array('field' => 'comuna',  
					'value' => utf8_encode(html_entity_decode($datosPacienteRut[comuna]))),
				array('field' => 'email',  
					'value' => utf8_encode(html_entity_decode($datosPacienteRut[email])))
					); 
echo json_encode($json); 
}
?>