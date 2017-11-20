<?php 

include_once('../conectar.php');
include_once('../funciones.php');
include_once('../pacientes/funciones.php');
include_once('../horas/funciones.php');

$duplicado=0 ;
$idpaciente = $_POST['idpaciente'];
$desde = $_POST['desde'] ;
$hasta = $_POST['hasta'] ;
//echo $idpaciente.'-'.$desde.'-'.$hasta.':' ;
	$conectar = conectar();
	echo $duplicado= siExisteHoraPrevia($idpaciente,$desde,$hasta,$conectar) ;

?>