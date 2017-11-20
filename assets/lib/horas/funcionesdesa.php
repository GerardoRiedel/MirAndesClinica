<?php

function crearHora($usuario, $hora, $idCiudad, $paciente, $prestador, $isapre, $confirmada, $observacion, $conectar)
{
	setlocale(LC_ALL,"SP");
	$fechaActual = strftime("%d")." de ".strftime("%B")." de ".strftime("%Y");
	$fechaActual = editames($fechaActual);
	$fechaActual = cambiaf_a_mysql($fechaActual);
	mysql_query("
	INSERT INTO 
		horas 
		(usuario, hora, fecha, ciudad, paciente, prestador, isapre, confirmada, observacion)
	VALUES
		($usuario, '$hora', '$fechaActual', '$idCiudad',  $paciente, $prestador, $isapre, '$confirmada', '$observacion')
	", $conectar);
	
	return mysql_insert_id();
}


function crearHoraPrestador($prestador, $hora, $ciudad, $conectar)
{
	//Verifico si la ciudad es o no una región
	$sql = mysql_query("
	SELECT 
		c.`region` 
	FROM 
		ciudades c
	WHERE 
		c.`id`=$ciudad
	", $conectar);
	
	$row = mysql_fetch_array($sql);
	$siRegion = $row[region];
	
	$sqlRegion = mysql_query("
	SELECT 
		p.`cobroSantiago`, 
		p.`cobroRegiones` 
	FROM 
		prestadores p
	WHERE 
		p.`id`=$prestador
	", $conectar);
	
	$rowRegion = mysql_fetch_array($sqlRegion);

	$cobroSantiago = $rowRegion[cobroSantiago];
	$cobroRegiones = $rowRegion[cobroRegiones];
		
	mysql_query("
	INSERT INTO 
		horas_prestadores
		(prestador, hora, ciudad, cobroSantiago, cobroRegiones)
	VALUES
		($prestador, '$hora', '$ciudad', '$cobroSantiago', '$cobroRegiones')
	", $conectar);
	
	return mysql_insert_id($conectar);
}

function datosHora($id, $conectar)
{
	$sql = mysql_query("
	SELECT 
		h.`id`, 
		h.`usuario`, 
		h.`hora`, 
		h.`fecha`, 
		h.`ciudad`, 
		h.`paciente`, 
		h.`prestador`, 
		h.`isapre`, 
		h.`confirmada`, 
		h.`asiste`, 
		h.`observacion` 
	FROM 
		horas h
	WHERE 
		h.`id`=".$id."
	", $conectar);
		
	$row = mysql_fetch_array($sql);
	
	return $row;		
}

function siExisteHora($hora, $idCiudad, $prestador, $conectar)
{
	$sql = mysql_query("
	SELECT 
		h.`id` 
	FROM 
		horas h
	WHERE 
		h.`hora`='".$hora."' AND 
		h.`ciudad`=".$idCiudad." AND 
		h.`prestador`=".$prestador."
	", $conectar);	
	
	if(mysql_num_rows($sql) != 0)
	{
		$row = mysql_fetch_array($sql);
		return $row['id'];
	}
	else
	{
		return false;	
	}
}

function eliminarHora($id, $usuario, $hora, $paciente, $prestador, $isapre, $conectar)
{
	$datosHora = datosHora($id, $conectar);
	
	$sql = mysql_query("
	INSERT INTO 
		horas_eliminadas
		(usuario, fecha, idHora, hora, ciudad, paciente, prestador, isapre)
	VALUES
		($usuario, now(), ".$id.", '$hora', ".$datosHora['ciudad'].", $paciente, $prestador, $isapre)
	", $conectar);	

	if($sql == false)
	{
		die('No se insertó la eliminación de hora');
	}

	$sql = mysql_query("
	DELETE FROM 
		horas 
	WHERE
		id=$id
	", $conectar);
	
	if($sql == false)
	{
		die('No se eliminó la hora');
	}
}

//Sólo para el enroque de horas
function eliminarHora2($id, $conectar)
{
	mysql_query("
	DELETE FROM 
		horas 
	WHERE
		id=$id
	", $conectar);
}

function editarHora($id, $isapre, $observacion, $conectar)
{
	mysql_query("
	UPDATE 
		horas 
	SET	 
		isapre=$isapre,  
		observacion='$observacion'
	WHERE
		id=$id
	", $conectar);
}

function editarHora2($id, $paciente, $isapre, $observacion, $conectar)
{
	mysql_query("
	UPDATE 
		horas 
	SET
		paciente=".$paciente.",
		isapre=".$isapre.",  
		observacion='".$observacion."'
	WHERE
		id=$id
	", $conectar);
}

//////////////////////////////////////////////////////
////////////////////  ISAPRE - HORA  /////////////////
function vincularIsapreHora($isapre, $hora, $conectar)
{
	mysql_query("
	INSERT INTO 
		isapres_hora
		(isapre, hora)
	VALUES
		($isapre, $hora)
	", $conectar);	
}

//Si la isapre está vinculada a la hora del prestador
function siIsapresHoraPrestador($isapre, $idHoraPrestador, $conectar)
{
	$sql = mysql_query("
	SELECT 
		i.`id` 
	FROM 
		isapres_hora i
	WHERE 
		i.`isapre`=".$isapre." AND 
		i.`hora`=".$idHoraPrestador."
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
////////////////////  ISAPRE - HORA  /////////////////
//////////////////////////////////////////////////////

function editarIsapreHora($id, $isapre, $conectar)
{
	mysql_query("
	UPDATE 
		horas 
	SET	 
		isapre=$isapre
	WHERE
		id=$id
	", $conectar);
}

//Retorna el id del paciente
//Recibe el id de la hora
function idPacienteHora($id, $conectar)
{
	$sql = mysql_query("
	SELECT 
		h.`paciente` 
	FROM 
		horas h
	WHERE 
		h.`id`=$id
	", $conectar);
	
	$row = mysql_fetch_array($sql);
	
	return $row[paciente];
}

//Retorna el id del prestador
//Recibe el id de la hora
function idPrestadorHora($id, $conectar)
{
	$sql = mysql_query("
	SELECT 
		h.`prestador` 
	FROM 
		horas h
	WHERE 
		h.`id`=$id
	", $conectar);
	
	$row = mysql_fetch_array($sql);
	
	return $row[prestador];
}

function fechaFormateadaHora($id, $conectar)
{
	$sql = mysql_query("
	SELECT 
		DATE_FORMAT(h.`hora`, '%Y-%m-%d') as fecha 
	FROM 
		horas h
	WHERE 
		h.`id`=$id
	", $conectar);

	$row = mysql_fetch_array($sql);
	
	return $row[fecha];
}

function fechaHora($id, $conectar)
{
	$sql = mysql_query("
	SELECT 
		h.`hora` 
	FROM 
		horas h
	WHERE 
		h.`id`=$id
	", $conectar);

	$row = mysql_fetch_array($sql);
	
	return $row[hora];
}

function horaHora($id, $conectar)
{
	$sql = mysql_query("
	SELECT 
		h.`hora` 
	FROM 
		horas h
	WHERE 
		h.`id`=$id
	", $conectar);

	$row = mysql_fetch_array($sql);
	
	return $row[hora];
}

function usuarioHora($id, $conectar)
{
	$sql = mysql_query("
	SELECT 
		h.`usuario` 
	FROM 
		horas h
	WHERE 
		h.`id`=$id
	", $conectar);

	$row = mysql_fetch_array($sql);
	
	return $row[usuario];
}

function observacionHora($id, $conectar)
{
	$sql = mysql_query("
	SELECT 
		h.`observacion` 
	FROM 
		horas h
	WHERE 
		h.`id`=$id
	", $conectar);
		
	$row = mysql_fetch_array($sql);
	
	return $row[observacion];
}

function isapreHora($id, $conectar)
{
	$sql = mysql_query("
	SELECT 
		h.`isapre` 
	FROM 
		horas h
	WHERE 
		h.`id`=$id
	", $conectar);
	
	$row = mysql_fetch_array($sql);
	
	return $row[isapre];
}

function ciudadHora($id, $conectar)
{
	$sql = mysql_query("
	SELECT 
		h.`ciudad` 
	FROM 
		horas h
	WHERE 
		h.`id`=$id
	", $conectar);
	
	$row = mysql_fetch_array($sql);

	return $row[ciudad];
}

function horaConfirmada($id, $conectar)
{
	$sql = mysql_query("
	SELECT 
		h.`confirmada` 
	FROM 
		horas h
	WHERE 
		h.`id`=$id
	", $conectar);
	
	$row = mysql_fetch_array($sql);
	
	if($row[confirmada] == 'si')
	{
		return true;
	}
	else
	{
		return false;
	}
}

function fechaAscenso($id, $fechoraAscenso, $conectar)
{
	mysql_query("
	UPDATE  
		horas
	SET
		 fechaAscenso = '$fechoraAscenso'
	WHERE 
		id='$id'
	", $conectar);
}


function fechaIngresoLista($id, $fechaIngreso, $conectar)
{
	mysql_query("
	UPDATE  
		horas
	SET
		 fechaIngresoALista = '$fechaIngreso'
	WHERE 
		id='$id'
	", $conectar);
}



function confirmarHora($id, $fechoraConfirmacion, $conectar)
{
	mysql_query("
	UPDATE  
		horas
	SET
		confirmada='si', fechoraConfirmacion = '$fechoraConfirmacion'
	WHERE 
		id='$id'
	", $conectar);
}

/*
function confirmarHora($id, $conectar)
{
	mysql_query("
	UPDATE  
		horas
	SET
		confirmada='si'
	WHERE 
		id=$id
	", $conectar);
}
*/

function confirmarAsistencia($id, $conectar)
{
	mysql_query("
	UPDATE  
		horas
	SET
		asiste='si'
	WHERE 
		id='".$id."'
	", $conectar);	
}

//Cambia el estado de la asistencia
function confirmarAsistenciaHora($id, $conectar)
{
	$sql = mysql_query("
	SELECT 
		h.`asiste` 
	FROM 
		horas h
	WHERE 
		h.`id`=$id
	", $conectar);
	
	$row = mysql_fetch_array($sql);
	
	if($row[asiste] == 'si')
	{
		mysql_query("
		UPDATE  
			horas
		SET
			asiste='no'
		WHERE 
			id=$id
		", $conectar);
		
		agregarLog($MODULOS.'/agenda/chk_confirmarAsistenciaHora.php?hora='.$id, $_SESSION['idUsuario'], nombreUsuario($_SESSION['idUsuario'], $conectar), date('Y-m-d H:i:s'), 'Confirma asistencia = no', $conectar);
	}	
	elseif($row[asiste] == 'no')
	{
		mysql_query("
		UPDATE  
			horas
		SET
			asiste='si'
		WHERE 
			id=$id
		", $conectar);	
		
		agregarLog($MODULOS.'/agenda/chk_confirmarAsistenciaHora.php?hora='.$id, $_SESSION['idUsuario'], nombreUsuario($_SESSION['idUsuario'], $conectar), date('Y-m-d H:i:s'), 'Confirma asistencia = si', $conectar);
	}
}

function asisteHora($id, $conectar)
{
	$sql = mysql_query("
	SELECT 
		h.`asiste` 
	FROM 
		horas h
	WHERE 
		h.`id`=$id
	", $conectar);
	
	$row = mysql_fetch_array($sql);

	if($row[asiste] == 'si')
	{
		return true;		
	}	
	elseif($row[asiste] == 'no')
	{
		return false;	
	}
}

//Diferencia de la hora actual now con la fecha de la hora
function diferenciaFechaHora($id, $conectar)
{
	$fecha = date('Y-m-d H:i:s');
	
	$sql = mysql_query("
	SELECT 
		TIMEDIFF(h.`hora`, '$fecha') as diferencia,
		h.`hora`
	FROM 
		horas h
	WHERE 
		h.`id`=$id
	", $conectar);
	
	$row = mysql_fetch_array($sql);
	
	//Si es negativo, la fecha actual es mayor que la hora
	if($row[diferencia] < 0)
	{
		return true;
	}
	else
	{
		return false;
	}
}

//Elige prestador para ingresar una hora nueva
//Recibe la fecha en formato Y-m-d
function eligePrestadorHora($fecha, $ciudad, $conectar)
{
	$sql = mysql_query("
	SELECT 
		h.`prestador` 
	FROM 
		horas_prestadores h
	WHERE 
		h.`hora`='".$fecha."' AND
		h.`ciudad`='".$ciudad."'
	ORDER BY
		RAND()
	", $conectar);
	
	$num1 = mysql_num_rows($sql);

	while($row = mysql_fetch_array($sql))
	{
		$prestador = $row[prestador];
		
		$sql2 = mysql_query("
		SELECT 
			h.`id` 
		FROM 
			horas h
		WHERE 
			h.`hora`='".$fecha."' AND 
			h.`ciudad`='".$ciudad."' AND 
			h.`prestador`=".$prestador."
		", $conectar);
		
		$num = mysql_num_rows($sql2);
		
		if($num == 0)
		{
			return $prestador;
			break;
		}
	}	
}

//Diferencia de la hora actual now con la fecha de la hora
function diferenciaHoraActualHora($id, $conectar)
{
	$fecha = date('Y-m-d H:i:s');
	
	$sql = mysql_query("
	SELECT 
		TIMESTAMPDIFF(HOUR,h.`hora`, '$fecha') as diferencia
	FROM 
		horas h
	WHERE 
		h.`id`=$id
	", $conectar);
	
	$row = mysql_fetch_array($sql);
	
	//Si es negativo, la fecha actual es mayor que la hora
	return $row[diferencia];
}


function numeroCitadosFechaPeritoCiudad($fecha, $perito, $ciudad, $conectar)
{
	$sql = mysql_query("
	SELECT 
		h.`id` 
	FROM 
		horas h
	WHERE 
		h.`prestador`=".$perito." AND 
		h.`ciudad`=".$ciudad." AND 
		DATE(h.`hora`)='".$fecha."'
	", $conectar);
	
	return mysql_num_rows($sql);
}

function numeroCitadosFechaPeritoCiudadIsapre($fecha, $perito, $ciudad,$idIsapre, $conectar)
{
	$sql = mysql_query("
	SELECT 
		h.`id` 
	FROM 
		horas h
	WHERE 
		h.`prestador`=".$perito." AND 
		h.`ciudad`=".$ciudad." AND 
		h.`isapre`=".$idIsapre." AND
		DATE(h.`hora`)='".$fecha."'
	", $conectar);
	
	return mysql_num_rows($sql);
}




function numeroAsistentesFacturacionPeritoCiudad($facturacion, $conectar)
{
	//Si la fecha de la facturación es múltiple
	$sqlFechas = mysql_query("
	SELECT 
		f.`fecha`, 
		f.`idCiudad`, 
		f.`idPrestador` 
	FROM 
		facturacion_viajes_datos f
	WHERE 
		f.`idFacturacionViajes`=".$facturacion."
	", $conectar);
	
	$asistentes = 0;

	while($rowFechas = mysql_fetch_array($sqlFechas))
	{	
		$fecha = $rowFechas[fecha];
		$ciudad = $rowFechas[idCiudad];
		$prestador = $rowFechas[idPrestador];
		
		$sql = mysql_query("
		SELECT 
			h.`id` 
		FROM 
			horas h
		WHERE 
			h.`asiste`='si' AND 
			h.`prestador`=".$prestador." AND 
			h.`ciudad`=".$ciudad." AND 
			DATE(h.`hora`)='".$fecha."'
		", $conectar);
		
		$asistentes += mysql_num_rows($sql);
	}
	
	return $asistentes;
}

function numeroInasistentesFacturacionPeritoCiudad($facturacion, $conectar)
{
	//Si la fecha de la facturación es múltiple
	$sqlFechas = mysql_query("
	SELECT 
		f.`fecha`, 
		f.`idCiudad`, 
		f.`idPrestador` 
	FROM 
		facturacion_viajes_datos f
	WHERE 
		f.`idFacturacionViajes`=".$facturacion."
	", $conectar);
	
	$inasistentes = 0;
	
	while($rowFechas = mysql_fetch_array($sqlFechas))
	{	
		$fecha = $rowFechas[fecha];
		$ciudad = $rowFechas[idCiudad];
		$prestador = $rowFechas[idPrestador];
		
		$sql = mysql_query("
		SELECT 
			h.`id` 
		FROM 
			horas h
		WHERE 
			h.`asiste`='no' AND 
			h.`prestador`=".$prestador." AND 
			h.`ciudad`=".$ciudad." AND 
			DATE(h.`hora`)='".$fecha."'
		", $conectar);
		
		$inasistentes = $inasistentes + mysql_num_rows($sql);
	}
	
	return $inasistentes;
}

//Para datos específicos de isapre
function numeroAsistentesFacturacionPeritoCiudadIsapre($facturacion, $isapre, $conectar)
{
	//Si la fecha de la facturación es múltiple
	$sqlFechas = mysql_query("
	SELECT 
		f.`fecha`, 
		f.`idCiudad`, 
		f.`idPrestador` 
	FROM 
		facturacion_viajes_datos f
	WHERE 
		f.`idFacturacionViajes`=".$facturacion."
	", $conectar);
	
	$asistentes = 0;

	while($rowFechas = mysql_fetch_array($sqlFechas))
	{	
		$fecha = $rowFechas[fecha];
		$ciudad = $rowFechas[idCiudad];
		$prestador = $rowFechas[idPrestador];
		
		$sql = mysql_query("
		SELECT 
			h.`id` 
		FROM 
			horas h
		WHERE 
			h.`asiste`='si' AND 
			h.`isapre`='".$isapre."' AND 
			h.`prestador`=".$prestador." AND 
			h.`ciudad`=".$ciudad." AND 
			DATE(h.`hora`)='".$fecha."'
		", $conectar);
		
		$asistentes += mysql_num_rows($sql);
	}
	
	return $asistentes;
}

function numeroInasistentesFacturacionPeritoCiudadIsapre($facturacion, $isapre, $conectar)
{
	//Si la fecha de la facturación es múltiple
	$sqlFechas = mysql_query("
	SELECT 
		f.`fecha`, 
		f.`idCiudad`, 
		f.`idPrestador` 
	FROM 
		facturacion_viajes_datos f
	WHERE 
		f.`idFacturacionViajes`=".$facturacion."
	", $conectar);
	
	$asistentes = 0;

	while($rowFechas = mysql_fetch_array($sqlFechas))
	{	
		$fecha = $rowFechas[fecha];
		$ciudad = $rowFechas[idCiudad];
		$prestador = $rowFechas[idPrestador];
		
		$sql = mysql_query("
		SELECT 
			h.`id` 
		FROM 
			horas h
		WHERE 
			h.`asiste`='no' AND 
			h.`isapre`='".$isapre."' AND 
			h.`prestador`=".$prestador." AND 
			h.`ciudad`=".$ciudad." AND 
			DATE(h.`hora`)='".$fecha."'
		", $conectar);
		
		$asistentes += mysql_num_rows($sql);
	}
	
	return $asistentes;
}

//Número de asistentes de un viaje por perito
function numeroAsistentesPeritoFecha($idPerito, $ano, $mes, $conectar)
{
	//Si la fecha de la facturación es múltiple
	$sqlFechas = mysql_query("
	SELECT
		f.`idFacturacionViajes`
	FROM 
		facturacion_viajes_datos f
	WHERE
		f.`idPrestador`=".$idPerito." AND 
		f.`fecha` BETWEEN '".$ano."-".$mes."-01' AND '".$ano."-".$mes."-31'
	GROUP BY 
		f.`idFacturacionViajes`
	", $conectar);
	
	$asistentes = 0;

	while($rowFechas = mysql_fetch_array($sqlFechas))
	{	
		$idFacturacion = $rowFechas[idFacturacionViajes];
		
		$asistentes += numeroAsistentesFacturacionPeritoCiudad($idFacturacion, $conectar);
	}
	
	return $asistentes;
}

//Número de asistentes de un viaje por perito
function numeroInasistentesPeritoFecha($idPerito, $ano, $mes, $conectar)
{
	//Si la fecha de la facturación es múltiple
	$sqlFechas = mysql_query("
	SELECT
		f.`idFacturacionViajes`
	FROM 
		facturacion_viajes_datos f
	WHERE
		f.`idPrestador`=".$idPerito." AND 
		f.`fecha` BETWEEN '".$ano."-".$mes."-01' AND '".$ano."-".$mes."-31'
	GROUP BY 
		f.`idFacturacionViajes`
	", $conectar);
	
	$inasistentes = 0;

	while($rowFechas = mysql_fetch_array($sqlFechas))
	{	
		$idFacturacion = $rowFechas[idFacturacionViajes];
		
		$inasistentes += numeroInasistentesFacturacionPeritoCiudad($idFacturacion, $conectar);
	}
	
	return $inasistentes;
}


//Número de asistentes de en santiago en un mes
function numeroAsistentesSantiagoPeritoFecha($idPerito, $ano, $mes, $conectar)
{
	//Si la fecha de la facturación es múltiple
	$sql = mysql_query("
	SELECT 
		h.`id` 
	FROM 
		horas h
	WHERE 
		h.`asiste`='si' AND 
		h.`prestador`=".$idPerito." AND 
		h.`ciudad`=1 AND 
		DATE(h.`hora`) BETWEEN '".$ano."-".$mes."-01' AND '".$ano."-".$mes."-31'
	", $conectar);
		
	return mysql_num_rows($sql);
}

//Número de INASISTENTES de en santiago en un mes
function numeroInasistentesSantiagoPeritoFecha($idPerito, $ano, $mes, $conectar)
{
	//Si la fecha de la facturación es múltiple
	$sql = mysql_query("
	SELECT 
		h.`id` 
	FROM 
		horas h
	WHERE 
		h.`asiste`='no' AND 
		h.`prestador`=".$idPerito." AND 
		h.`ciudad`=1 AND 
		DATE(h.`hora`) BETWEEN '".$ano."-".$mes."-01' AND '".$ano."-".$mes."-31'
	", $conectar);
		
	return mysql_num_rows($sql);
}

///////HORAS PRESTADOR///////////////

function fechaHoraPrestador($id, $conectar)
{
	$sql = mysql_query("
	SELECT 
		h.`hora` 
	FROM 
		horas_prestadores h
	WHERE 
		h.`id`=$id
	", $conectar);

	$row = mysql_fetch_array($sql);
	
	return $row[hora];
}
function ciudadHoraPrestador($id, $conectar)
{
	$sql = mysql_query("
	SELECT 
		h.`ciudad` 
	FROM 
		horas_prestadores h
	WHERE 
		h.`id`=$id
	", $conectar);

	$row = mysql_fetch_array($sql);
	
	return $row[ciudad];
}

function prestadorHoraPrestador($id, $conectar)
{
	$sql = mysql_query("
	SELECT 
		h.`prestador` 
	FROM 
		horas_prestadores h
	WHERE 
		h.`id`=$id
	", $conectar);

	$row = mysql_fetch_array($sql);
	
	return $row[prestador];
}

//Retorna la hora del prestador según la hora de la agenda y la ciudad
function idHoraPrestadorHoraCiudad($prestador, $hora, $ciudad, $conectar)
{
	$sql = mysql_query("
	SELECT 
		h.`id` 
	FROM 
		horas_prestadores h
	WHERE 
		h.`prestador`='".$prestador."' AND
		h.`hora`='".$hora."' AND
		h.`ciudad`='".$ciudad."'
	", $conectar);

	$row = mysql_fetch_array($sql);
	
	return $row[id];
}

//Retorna los montos cobrados por el perito de santiago
function cobroSantiagoHoraPrestadorHoraCiudad($prestador, $hora, $ciudad, $conectar)
{
	$sql = mysql_query("
	SELECT 
		h.`cobroSantiago`
	FROM 
		horas_prestadores h
	WHERE 
		h.`prestador`='".$prestador."' AND
		h.`hora`='".$hora."' AND
		h.`ciudad`='".$ciudad."'
	", $conectar);

	$row = mysql_fetch_array($sql);
	
	return $row[cobroSantiago];
}

//Retorna los montos cobrados por el perito den regiones
function cobroRegionesHoraPrestadorHoraCiudad($prestador, $hora, $ciudad, $conectar)
{
	$sql = mysql_query("
	SELECT 
		h.`cobroRegiones`
	FROM 
		horas_prestadores h
	WHERE 
		h.`prestador`='".$prestador."' AND
		h.`hora`='".$hora."' AND
		h.`ciudad`='".$ciudad."'
	", $conectar);
	
	$row = mysql_fetch_array($sql);
	
	return $row[cobroRegiones];
}

function siPacienteTienePeritaje($paciente, $conectar)
{
	$sql = mysql_query("
	SELECT 
		i.`id` 
	FROM 
		informe_entrevista i
	WHERE 
		i.`paciente`=".$paciente."
	GROUP BY 
		i.`id`
	ORDER BY 
		i.`fecha` DESC
	LIMIT
	0,1
	", $conectar);
	
	if(mysql_num_rows($sql) != 0)
	{
		$row = mysql_fetch_array($sql);
		return $row;
	}
	else
	{
		return false;
	}
}
?>