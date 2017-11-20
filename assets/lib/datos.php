<?php
////////////////////////////////////////////////////
//Datos generales
//Autor: Cetep 
//Fecha Creación: 
//Fecha Modificación: 
//Autor Modificación: 
////////////////////////////////////////////////////

//$HOST = '200.111.100.162';
//$HOST = 'www.cetep.cl';
$HOST = '10.0.0.155';
$CARPETA = 'agenda2';
$HOME = 'http://'.$HOST.'/'.$CARPETA;
$CONTENIDO = $HOME.'/contenido';
$MODULOS = $CONTENIDO.'/modulos';

$TEMPLATE_NOMBRE = 'defecto';
$TEMPLATE_DIR = 'contenido/templates/'.$TEMPLATE_NOMBRE;
$IMAGENES = $TEMPLATE_DIR.'/imagenes';

$TEMPLATE_DIR2 = $HOME.'/contenido/templates/'.$TEMPLATE_NOMBRE;
$IMAGENES2 = $TEMPLATE_DIR2.'/imagenes';

$LIB = $HOME.'/lib';
$JSVALIDATE = $LIB.'/jsvalidate';
$QUERYS = $LIB.'/querys';

$DISTANCIA_TOOLTIP=0;

$NOMBRE_SITIO = 'Agenda Cetep ';

$horaInicio = '08:00:00';
$horaTermino = '22:00:00';

$ANO_FIN = 2012;

//Pagos a peritos
$COBRO_NO_REALIZADO = 10000;
$PAGO_REALIZADO['1'] = 20000;//Primer viaje...
$PAGO_REALIZADO['2'] = 22000;
$PAGO_REALIZADO['3'] = 24000;
$HONORARIO_SANTIAGO = 18000;

//Fecha de la actualización de informes
$FECHA_NUEVO = '20-07-2009';

$IVA = 19;
?>