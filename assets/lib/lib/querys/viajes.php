<?php

function valorPasajeReal($id, $conectar)
{
	
		$sql = mysql_query("
	SELECT 
		f.`pasajeReal` 
	FROM 
		facturacion_viajes f
	WHERE 
		f.`id`='".$id."'
	", $conectar);
	
	$row = mysql_fetch_array($sql);
	
	return $row[pasajeReal];
}

function editarViaje($id, $viatico, $trasladoValor, $trasladoBoleta, $trasladoEmisor, $hotelValor, $hotelBoleta, $hotelEmisor, $consultaValor, $consultaBoleta, $consultaEmisor, $secretariaValor, $secretariaBoleta, $secretariaEmisor, $pasajeReal, $conectar)
{
	$sql = mysql_query("
	UPDATE
		facturacion_viajes
	SET
		viatico='".$viatico."', 
		trasladoValor='".$trasladoValor."', 
		trasladoBoleta='".$trasladoBoleta."', 
		trasladoEmisor='".$trasladoEmisor."', 
		hotelValor='".$hotelValor."', 
		hotelBoleta='".$hotelBoleta."', 
		hotelEmisor='".$hotelEmisor."', 
		consultaValor='".$consultaValor."', 
		consultaBoleta='".$consultaBoleta."', 
		consultaEmisor='".$consultaEmisor."', 
		secretariaValor='".$secretariaValor."', 
		secretariaBoleta='".$secretariaBoleta."', 
		secretariaEmisor='".$secretariaEmisor."',
		pasajeReal ='".$pasajeReal."'
	WHERE
		id=".$id."
	", $conectar);
	
	if($sql == false)
	{
		die('ERROR: No se editó el viaje');
	}
}

function cantidadViajesPrestador($ano, $mes, $idPrestador, $conectar)
{	
	$sql = mysql_query("
	SELECT 
		f.`id`
	FROM 	
		facturacion_viajes_datos f
	WHERE 
		f.`fecha` BETWEEN '".$ano."-".$mes."-01' AND '".$ano."-".$mes."-31' AND
		f.`idPrestador`=".$idPrestador."
	", $conectar);

	return mysql_num_rows($sql);
}

//Retorna true si los datos están dentro de un viaje
//Recibe: fecha yyyy-mm-dd
function siEstaEnViaje($fecha, $idCiudad, $idPrestador, $conectar)
{	
	$sql = mysql_query("
	SELECT 
		f.`id` 
	FROM 
		facturacion_viajes_datos f
	WHERE 
		f.`idCiudad`=".$idCiudad." AND 
		f.`idPrestador`=".$idPrestador." AND 
		f.`fecha`='".$fecha."'
	", $conectar);
	
	if(mysql_num_rows($sql) != 0)
	{
		return true;
	}
	else
	{
		return false;	
	}
}

//Retorna el total de honorarios de un perito en particular
//Sirve para la facturacion
function sumaHonorariosZonalesPeritoMes($perito, $ano, $mes, $conectar)
{	
	$sql = mysql_query("
	SELECT 
		f.`fecha`, 
		f.`idFacturacionViajes`
	FROM 
		facturacion_viajes_datos f
	WHERE 
		f.`idPrestador`=".$perito." AND 
		f.`fecha` BETWEEN '".$ano."-".$mes."-01' AND '".$ano."-".$mes."-31'
	", $conectar);
	
	$totalAsistentes = 0;
	$pagoAsistentes = 0;
	$totalInasistentes = 0;
	$pagoInasistentes = 0;
	
	while($row = mysql_fetch_array($sql))
	{
		$fecha = $row[fecha];
		$viaje = $row[idFacturacionViajes];
		
		$totalAsistentes = numeroAsistentesFacturacionPeritoCiudad($viaje, $conectar);
		$pagoAsistentes += pagoPorAsistenteViaje($viaje, $conectar) * $totalAsistentes;
		
		$totalInasistentes = numeroInasistentesFacturacionPeritoCiudad($viaje, $conectar);
		$pagoInasistentes += pagoPorInasistenteViaje($viaje, $conectar) * $totalInasistentes;
	}
	
	return $pagoAsistentes + $pagoInasistentes;
}

//Retorna el total de honorarios de un perito en particular
//Sirve para la facturacion
function sumaViaticosPeritoMes($perito, $ano, $mes, $conectar)
{	
	$sql = mysql_query("
	SELECT 
		f.`fecha`, 
		f.`idFacturacionViajes`
	FROM 
		facturacion_viajes_datos f
	WHERE 
		f.`idPrestador`=".$perito." AND 
		f.`fecha` BETWEEN '".$ano."-".$mes."-01' AND '".$ano."-".$mes."-31'
	", $conectar);
	
	$totalViaticos = 0;
	
	while($row = mysql_fetch_array($sql))
	{
		$fecha = $row[fecha];
		$viaje = $row[idFacturacionViajes];
		
		$totalViaticos += viaticoViaje($viaje, $conectar);
	}
	
	return $totalViaticos;
}

function pagoPorAsistenteViaje($id, $conectar)
{	
	$sql = mysql_query("
	SELECT 
		f.`pagoPorAsistente` 
	FROM 
		facturacion_viajes f
	WHERE 
		f.`id`='".$id."'
	", $conectar);
	
	$row = mysql_fetch_array($sql);
	
	return $row[pagoPorAsistente];
}

function pagoPorInasistenteViaje($id, $conectar)
{	
	$sql = mysql_query("
	SELECT 
		f.`pagoPorInasistente` 
	FROM 
		facturacion_viajes f
	WHERE 
		f.`id`='".$id."'
	", $conectar);
	
	$row = mysql_fetch_array($sql);

	return $row[pagoPorInasistente];
}

function viaticoViaje($id, $conectar)
{	
	$sql = mysql_query("
	SELECT 
		f.`viatico` 
	FROM 
		facturacion_viajes f
	WHERE 
		f.`id`='".$id."'
	", $conectar);
	
	$row = mysql_fetch_array($sql);
	
	return $row[viatico];
}

function trasladoValorViaje($id, $conectar)
{	
	$sql = mysql_query("
	SELECT 
		f.`trasladoValor` 
	FROM 
		facturacion_viajes f
	WHERE 
		f.`id`='".$id."'
	", $conectar);
	
	$row = mysql_fetch_array($sql);
	
	return $row[trasladoValor];
}

function trasladoBoletaViaje($id, $conectar)
{	
	$sql = mysql_query("
	SELECT 
		f.`trasladoBoleta` 
	FROM 
		facturacion_viajes f
	WHERE 
		f.`id`='".$id."'
	", $conectar);
	
	$row = mysql_fetch_array($sql);
	
	return $row[trasladoBoleta];
}

function trasladoEmisorViaje($id, $conectar)
{	
	$sql = mysql_query("
	SELECT 
		f.`trasladoEmisor` 
	FROM 
		facturacion_viajes f
	WHERE 
		f.`id`='".$id."'
	", $conectar);
	
	$row = mysql_fetch_array($sql);
	
	return $row[trasladoEmisor];
}




function hotelValorViaje($id, $conectar)
{	
	$sql = mysql_query("
	SELECT 
		f.`hotelValor` 
	FROM 
		facturacion_viajes f
	WHERE 
		f.`id`='".$id."'
	", $conectar);
	
	$row = mysql_fetch_array($sql);
	
	return $row[hotelValor];
}

function hotelBoletaViaje($id, $conectar)
{	
	$sql = mysql_query("
	SELECT 
		f.`hotelBoleta` 
	FROM 
		facturacion_viajes f
	WHERE 
		f.`id`='".$id."'
	", $conectar);
	
	$row = mysql_fetch_array($sql);
	
	return $row[hotelBoleta];
}

function hotelEmisorViaje($id, $conectar)
{	
	$sql = mysql_query("
	SELECT 
		f.`hotelEmisor` 
	FROM 
		facturacion_viajes f
	WHERE 
		f.`id`='".$id."'
	", $conectar);
	
	$row = mysql_fetch_array($sql);
	
	return $row[hotelEmisor];
}

function consultaValorViaje($id, $conectar)
{	
	$sql = mysql_query("
	SELECT 
		f.`consultaValor` 
	FROM 
		facturacion_viajes f
	WHERE 
		f.`id`='".$id."'
	", $conectar);
	
	$row = mysql_fetch_array($sql);
	
	return $row[consultaValor];
}

function consultaBoletaViaje($id, $conectar)
{	
	$sql = mysql_query("
	SELECT 
		f.`consultaBoleta` 
	FROM 
		facturacion_viajes f
	WHERE 
		f.`id`='".$id."'
	", $conectar);
	
	$row = mysql_fetch_array($sql);
	
	return $row[consultaBoleta];
}

function consultaEmisorViaje($id, $conectar)
{	
	$sql = mysql_query("
	SELECT 
		f.`consultaEmisor` 
	FROM 
		facturacion_viajes f
	WHERE 
		f.`id`='".$id."'
	", $conectar);
	
	$row = mysql_fetch_array($sql);
	
	return $row[consultaEmisor];
}

function secretariaValorViaje($id, $conectar)
{	
	$sql = mysql_query("
	SELECT 
		f.`secretariaValor` 
	FROM 
		facturacion_viajes f
	WHERE 
		f.`id`='".$id."'
	", $conectar);
	
	$row = mysql_fetch_array($sql);
	
	return $row[secretariaValor];
}

function secretariaBoletaViaje($id, $conectar)
{	
	$sql = mysql_query("
	SELECT 
		f.`secretariaBoleta` 
	FROM 
		facturacion_viajes f
	WHERE 
		f.`id`='".$id."'
	", $conectar);
	
	$row = mysql_fetch_array($sql);
	
	return $row[secretariaBoleta];
}

function secretariaEmisorViaje($id, $conectar)
{	
	$sql = mysql_query("
	SELECT 
		f.`secretariaEmisor` 
	FROM 
		facturacion_viajes f
	WHERE 
		f.`id`='".$id."'
	", $conectar);
	
	$row = mysql_fetch_array($sql);
	
	return $row[secretariaEmisor];
}

//DESCUENTOS
function montoDescuento($id, $conectar)
{	
	$sql = mysql_query("
	SELECT 
		f.`monto` 
	FROM 
		facturacion_descuentos f
	WHERE 
		f.`id`='".$id."'
	", $conectar);
	
	$row = mysql_fetch_array($sql);
	
	return $row[monto];
}

function fechaDescuento($id, $conectar)
{	
	$sql = mysql_query("
	SELECT 
		f.`fecha` 
	FROM 
		facturacion_descuentos f
	WHERE 
		f.`id`='".$id."'
	", $conectar);
	
	$row = mysql_fetch_array($sql);
	
	return $row[fecha];
}

function sumaMontoDescuentosPeritoMes($perito, $ano, $mes, $conectar)
{	
	$sql = mysql_query("
	SELECT 
		SUM(f.`monto`) as MONTO 
	FROM 
		facturacion_descuentos f
	WHERE 
		f.`prestador`='".$perito."' AND
		f.`fecha` BETWEEN '".$ano."-".$mes."-01' AND '".$ano."-".$mes."-31'
	", $conectar);
	
	$row = mysql_fetch_array($sql);
	
	return $row[MONTO];
}



?>