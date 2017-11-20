<?php 
//retorna el total de gastos reembolsables
function datosFacturacion_viajes($facturacion_viajes, $conectar)
{
	$sql = mysql_query("
	SELECT 
		*
	FROM 
		facturacion_viajes f
	WHERE 
		f.`id`=".$facturacion_viajes."
	", $conectar);
	
	$row = mysql_fetch_array($sql);
	
	return $row;
}
//retorna el total de gastos reembolsables
function totalGastosReembolsablesViaje($viaje, $conectar)
{
	$sql = mysql_query("
	SELECT 
		f.`viatico`, 
		f.`trasladoValor`, 
		f.`hotelValor`, 
		f.`consultaValor`, 
		f.`secretariaValor` 
	FROM 
		facturacion_viajes f
	WHERE 
		f.`id`=".$viaje."
	", $conectar);
	
	$row = mysql_fetch_array($sql);
	
	return ($row[viatico] + $row[trasladoValor] + $row[hotelValor] + $row[consultaValor] + $row[secretariaValor]);
}

//retorna el total de gastos operacionales
function totalGastosOperacionalesViaje($viaje, $conectar)
{
	$sql = mysql_query("
	SELECT 
		SUM(f.`viatico` + f.`trasladoValor` + f.`hotelValor` + f.`consultaValor` + f.`secretariaValor`) as SUMA 
	FROM 
		facturacion_viajes f
	WHERE 
		f.`id`=".$viaje."
	GROUP BY
		f.`id`
	", $conectar);
	
	$row = mysql_fetch_array($sql);
	
	return ($row[SUMA]);
}

function numeroIsapresCiudadViaje($ciudad, $ano, $mes, $conectar)
{
	$sql = mysql_query("
	SELECT 
		h.`id` 
	FROM 
		facturacion_viajes_datos f, horas h
	WHERE 
		f.`idCiudad`=".$ciudad." AND 
		f.`fecha` BETWEEN '".$ano."-".$mes."-01' AND '".$ano."-".$mes."-31' AND
		h.`prestador`=f.`idPrestador` AND 
		h.`ciudad`=f.`idCiudad` AND 
		DATE(h.`hora`)=f.`fecha` 
	GROUP BY 
		h.`isapre`
	", $conectar);
	
	return mysql_num_rows($sql);
}

function numeroInasistentesCiudadViaje($ciudad, $ano, $mes, $conectar)
{
	$sql = mysql_query("
	SELECT 
		h.`id` 
	FROM 
		facturacion_viajes_datos f, horas h
	WHERE 
		f.`idCiudad`=".$ciudad." AND 
		f.`fecha` BETWEEN '".$ano."-".$mes."-01' AND '".$ano."-".$mes."-31' AND
		h.`prestador`=f.`idPrestador` AND 
		h.`ciudad`=f.`idCiudad` AND 
		DATE(h.`hora`)=f.`fecha` AND
	    h.`asiste`='no'		
	", $conectar);

	return mysql_num_rows($sql);
}


function numeroAsistentesCiudadViaje($ciudad, $ano, $mes, $conectar)
{
	$sql = mysql_query("
	SELECT 
		h.`id` 
	FROM 
		facturacion_viajes_datos f, horas h
	WHERE 
		f.`idCiudad`=".$ciudad." AND 
		f.`fecha` BETWEEN '".$ano."-".$mes."-01' AND '".$ano."-".$mes."-31' AND
		h.`prestador`=f.`idPrestador` AND 
		h.`ciudad`=f.`idCiudad` AND 
		DATE(h.`hora`)=f.`fecha` AND
	    h.`asiste`='si'		
	", $conectar);

	return mysql_num_rows($sql);
}



function numeroInasistentesCiudadIsapre($ciudad, $ano, $mes, $isapre, $fecha, $conectar)
{

	$sql = mysql_query("
	SELECT 
		h.`id` 
	FROM 
		facturacion_viajes_datos f, horas h
	WHERE 
		f.`idCiudad`=".$ciudad." AND 
		f.`fecha` ='".$fecha."' AND
		h.`prestador`=f.`idPrestador` AND 
		h.`ciudad`=f.`idCiudad` AND 
		DATE(h.`hora`)=f.`fecha` AND
    	h.`isapre`=".$isapre." AND
	    h.`asiste`='no'		
	", $conectar);

	return mysql_num_rows($sql);
}
function numeroInasistentesCiudadIsaprePrestador($ciudad, $ano, $mes, $isapre, $fecha,$idPrestador, $conectar)
{

	$sql = mysql_query("
	SELECT 
		h.`id` 
	FROM 
		horas h
	WHERE 
		h.`ciudad`='".$ciudad."' AND 
		DATE_FORMAT(h.`hora`,'%Y-%m-%d') = '".$fecha."' AND
		h.`prestador`='".$idPrestador."' AND 
	    h.`isapre`='".$isapre."' AND
		h.`asiste`='no'		
	", $conectar);

	return mysql_num_rows($sql);
}



function numeroAsistentesCiudadIsapre($ciudad, $ano, $mes, $isapre, $fecha, $conectar)
{
	$sql = mysql_query("
	SELECT 
		h.`id` 
	FROM 
		facturacion_viajes_datos f, horas h
	WHERE 
		f.`idCiudad`=".$ciudad." AND 
		f.`fecha` = '".$fecha."' AND
		h.`prestador`=f.`idPrestador` AND 
		h.`ciudad`=f.`idCiudad`  AND
		DATE(h.`hora`)=f.`fecha` AND
    	h.`isapre`=".$isapre." AND
	    h.`asiste`='si'		
	", $conectar);

	return mysql_num_rows($sql);
}

function numeroAsistentesCiudadIsaprePrestador($ciudad, $ano, $mes, $isapre, $fecha,$idPrestador, $conectar)
{
	$sql = mysql_query("
	SELECT 
		h.`id` 
	FROM 
		 horas h
	WHERE 
		h.`ciudad`='".$ciudad."' AND 
		DATE_FORMAT(h.`hora`,'%Y-%m-%d') = '".$fecha."' AND
		h.`prestador`='".$idPrestador."' AND 
		h.`isapre`=".$isapre." AND
	   	h.`asiste`='si'		
	", $conectar);

	return mysql_num_rows($sql);
}






function sumaGastosOperacionalesCiudadViaje($ciudad, $ano, $mes, $conectar)
{
	$sql = mysql_query("
	SELECT 
		f.`id`, 
		f.`idFacturacionViajes` 
	FROM 
		facturacion_viajes_datos f
	WHERE 
		f.`idCiudad` AND 
		f.`fecha` BETWEEN '".$ano."-".$mes."-01' AND '".$ano."-".$mes."-31' AND 
		f.`idCiudad`=".$ciudad."
	", $conectar);

	$total = 0;
	while($row = mysql_fetch_array($sql))
	{
		$viaje = $row[idFacturacionViajes];
		$total += totalGastosOperacionalesViaje($viaje, $conectar);
	}
	
	return $total;
}

function sumaCobroInasistentesUfCiudadViaje($ciudad, $ano, $mes, $conectar)
{
	$inasistentes = numeroInasistentesCiudadViaje($ciudad, $ano, $mes, $conectar);
	$valorPeritajeInasistenteRegion = valorPeritajeInasistenteRegion($mes, $ano, $conectar);
	$uf = valorUF($mes, $ano, $conectar);
	
	return ($inasistentes * $valorPeritajeInasistenteRegion * $uf);
}

function sumaCobroAsistentesUfCiudadViaje($ciudad, $ano, $mes, $conectar)
{
	$asistentes = numeroAsistentesCiudadViaje($ciudad, $ano, $mes, $conectar);
	$valorPeritajeAsistenteRegion = valorPeritajeAsistenteRegion($mes, $ano, $conectar);
	$uf = valorUF($mes, $ano, $conectar);
	
	return ($asistentes * $valorPeritajeAsistenteRegion * $uf);
}

function sumaCobroInasistentesUfCiudadIsapreViaje($ciudad, $ano, $mes, $isapre, $conectar)
{
	$inasistentes = numeroInasistentesCiudadIsapre($ciudad, $ano, $mes, $isapre, $conectar);
	$valorPeritajeInasistenteRegion = valorPeritajeInasistenteRegion($mes, $ano, $conectar);
	$uf = valorUF($mes, $ano, $conectar);
	
	return ($inasistentes * $valorPeritajeInasistenteRegion * $uf);
}

function sumaCobroAsistentesUfCiudadIsapreViaje($ciudad, $ano, $mes, $isapre, $conectar)
{
	$asistentes = numeroAsistentesCiudadIsapre($ciudad, $ano, $mes, $isapre, $conectar);
	$valorPeritajeAsistenteRegion = valorPeritajeAsistenteRegion($mes, $ano, $conectar);
	$uf = valorUF($mes, $ano, $conectar);
	
	return ($asistentes * $valorPeritajeAsistenteRegion * $uf);
}
?>