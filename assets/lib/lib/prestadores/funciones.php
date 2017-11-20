<?php
function especialidadPrestador($id, $conectar)
{
	$sql = mysql_query("
	SELECT
		p.`especialidad`
	FROM
		prestadores p
	WHERE
		p.`id`=$id
	", $conectar);

	$row = mysql_fetch_array($sql);

	return $row['especialidad'];
}






function crearPrestador($usuario, $rut, $nombres, $apellidoPaterno, $apellidoMaterno, $telefono, $celular, $especialidad, $conectar)
{
	$sql = mysql_query("
	SELECT 
		p.`rut` 
	FROM 
		prestadores p
	WHERE 
		p.`rut`=$rut
	", $conectar);
	
	if(mysql_num_rows($sql) == 0)//si no existe el prestador
	{
		mysql_query("
		INSERT INTO
			prestadores
			(usuario, rut, nombres, apellidoPaterno, apellidoMaterno, telefono, celular, especialidad)
		VALUES
			($usuario, '$rut', '$nombres', '$apellidoPaterno', '$apellidoMaterno', '$telefono', '$celular', '$especialidad')
		", $conectar);
		
		return mysql_insert_id();
	}
	else
	{
		return false;
	}
}

function editarPrestador($id, $rut, $nombres, $apellidoPaterno, $apellidoMaterno, $telefono, $celular, $especialidad, $conectar)
{
	mysql_query("
	UPDATE
		prestadores
	SET	
		rut='$rut', 
		nombres='$nombres', 
		apellidoPaterno='$apellidoPaterno', 
		apellidoMaterno='$apellidoMaterno', 
		telefono='$telefono', 
		celular='$celular', 
		especialidad='$especialidad'
	WHERE
		id=$id
	", $conectar);
}

function eliminarPrestador($id, $conectar)
{
	mysql_query("
	UPDATE
		prestadores
	SET
		activo='no'
	WHERE
		id=$id
	", $conectar);
}

function prestadoresOption($conectar)
{
	$sql = mysql_query("
	SELECT 
		p.`id` 
	FROM 
		prestadores p
	WHERE
		p.`activo`='si'
	ORDER BY 
		p.`apellidoPaterno` ASC
	", $conectar);	
	
	while($row = mysql_fetch_array($sql))
	{	
		$prestador = $row[id];
		
		?>
		<option value="<?php echo $prestador; ?>"><?php echo nombreCompletoPrestadorApellido($prestador, $conectar); ?></option>
		<?php 
	}
}

function vincularPrestadorIsapre($id, $isapre, $conectar)
{
	mysql_query("
	INSERT INTO
		prestador_isapre
		(prestador, isapre)
	VALUES
		($id, $isapre)
	", $conectar);
}

function nombrePrestador($id, $conectar)
{
	$sql = mysql_query("
	SELECT 
		p.`nombres`
	FROM 
		prestadores p
	WHERE 
		p.`id`=$id
	", $conectar);
	
	$row = mysql_fetch_array($sql);
	
	return $row[nombres];
}

function apellidoPaternoPrestador ($id, $conectar)
{
	$sql = mysql_query("
	SELECT 
		p.`apellidoPaterno`
	FROM 
		prestadores p
	WHERE 
		p.`id`=$id
	", $conectar);
	
	$row = mysql_fetch_array($sql);
	
	return $row[apellidoPaterno];
}


function apellidoMaternoPrestador ($id, $conectar)
{
	$sql = mysql_query("
	SELECT 
		p.`apellidoMaterno`
	FROM 
		prestadores p
	WHERE 
		p.`id`=$id
	", $conectar);
	
	$row = mysql_fetch_array($sql);
	
	return $row[apellidoMaterno];
}

function telefonoPrestador ($id, $conectar)
{
	$sql = mysql_query("
	SELECT 
		p.`telefono`
	FROM 
		prestadores p
	WHERE 
		p.`id`=$id
	", $conectar);
	
	$row = mysql_fetch_array($sql);
	
	return $row[telefono];
}

function celularPrestador ($id, $conectar)
{
	$sql = mysql_query("
	SELECT 
		p.`celular`
	FROM 
		prestadores p
	WHERE 
		p.`id`=$id
	", $conectar);
	
	$row = mysql_fetch_array($sql);
	
	return $row[celular];
}

function nombreCompletoPrestador($id, $conectar)
{
	$sql = mysql_query("
	SELECT 
		p.`nombres`, 
		p.`apellidoPaterno`, 
		p.`apellidoMaterno` 
	FROM 
		prestadores p
	WHERE 
		p.`id`=$id
	", $conectar);
	
	$row = mysql_fetch_array($sql);
	
	return $row[nombres].' '.$row[apellidoPaterno].' '.$row[apellidoMaterno];
}

function nombreCompletoPrestadorApellido($id, $conectar)
{
	$sql = mysql_query("
	SELECT 
		p.`nombres`, 
		p.`apellidoPaterno`, 
		p.`apellidoMaterno` 
	FROM 
		prestadores p
	WHERE 
		p.`id`=$id
	", $conectar);
	
	$row = mysql_fetch_array($sql);
	
	return $row[apellidoPaterno].' '.$row[apellidoMaterno].', '.$row[nombres];
}

function nombreCompletoPrestadorApellidoPaterno($id, $conectar)
{
	$sql = mysql_query("
	SELECT 
		p.`nombres`, 
		p.`apellidoPaterno`, 
		p.`apellidoMaterno` 
	FROM 
		prestadores p
	WHERE 
		p.`id`=$id
	", $conectar);
	
	$row = mysql_fetch_array($sql);
	
	return $row[apellidoPaterno].', '.$row[nombres];
}

function rutPrestador($id, $conectar)
{
	$sql = mysql_query("
	SELECT 
		p.`rut`
	FROM 
		prestadores p
	WHERE 
		p.`id`=$id
	", $conectar);
	
	$row = mysql_fetch_array($sql);
	
	return $row[rut];
}


//Retorna true si el prestador tiene consulta a esa hora
//Recibe la fecha y el id del prestador
function existeFechaPrestador($idPrestador, $fecha, $idCiudad, $conectar)
{
	$sql = mysql_query("
	SELECT 
		h.`id` 
	FROM 
		horas_prestadores h
	WHERE 
		h.`prestador`=$idPrestador AND 
		h.`ciudad`=$idCiudad AND 
		h.`hora`='$fecha'
	", $conectar);
	
	if(mysql_num_rows($sql) == 1)
	{
		return true;
	}
	else 
	{
		return false;
	}
}

//Verifica si el prestador tiene una hora en otra ciudad en un rango menor de 24 horas
//Retorna true si el prestador tiene una hora en el rango
//Retorna false si el prestador NO tiene una hora en el rango
function existeFechaPrestadorCiudadTiempo($idPrestador, $fecha, $idCiudad, $conectar)
{
	//Separo la fecha para la verificacion
	$fechaSeparada = explode('-', $fecha);
	$mes = $fechaSeparada[1];
	$ano = $fechaSeparada[0];
	$fechaSeparada = explode(' ', $fechaSeparada[2]);
	$dia = $fechaSeparada[0];

	$sql = mysql_query("
	SELECT 
		h.`id`
	FROM 
		horas_prestadores h
	WHERE 
		h.`prestador`=$idPrestador AND 
		h.`ciudad`<>$idCiudad AND 
		h.`hora` BETWEEN '".$ano."-".$mes."-".$dia." 00:00:00' AND '".$ano."-".$mes."-".$dia." 23:59:59'
	", $conectar);
	
	if(mysql_num_rows($sql) == 0)//Si no existen
	{
		return false;
	}
	else 
	{
		return true;
	}
}

function cambiarHoraPrestador($prestador, $hora, $idCiudad, $conectar)
{
	//Verifico si el usuario est� asignando o borrando esa hora
	if(existeFechaPrestador($prestador, $hora, $idCiudad, $conectar) == false)//Si asigna
	{
		//Verifico si tiene esa misma hora en otra ciudad
		if(existeFechaPrestadorCiudadTiempo($prestador, $hora, $idCiudad, $conectar) == true)
		{
			return false;
		}
		else
		{
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
				($prestador, '$hora', '$idCiudad', '$cobroSantiago', '$cobroRegiones')
			", $conectar);
			
			return true;
		}
	}
	else//Si borra
	{
		mysql_query("
		DELETE FROM
			horas_prestadores
		WHERE
			prestador=$prestador AND
			hora='".$hora."'
		", $conectar);
			
			return true;
	}
}

//Retorna el id de esa hora
//Recibe la fecha y el id del prestador
function idFechaPrestadorCiudad($idPrestador, $fecha, $ciudad, $conectar)
{
	$sql = mysql_query("
	SELECT 
		h.`id` 
	FROM 
		horas_prestadores h
	WHERE 
		h.`prestador`=$idPrestador AND 
		h.`hora`='$fecha' AND
		h.`ciudad`='$ciudad'
	", $conectar);
	
	$row = mysql_fetch_array($sql);
	
	return $row[id];

}

function siTieneAsignadoHorario ($idPrestador, $mes, $ano, $ciudad, $conectar)
{
	$sql = mysql_query("
	SELECT 
		h.`id` 
	FROM 
		horas_prestadores h
	WHERE 
		h.`prestador`=$idPrestador AND 
		h.`ciudad`=$ciudad AND 		
		h.`hora` BETWEEN '$ano-$mes-01' AND '$ano-$mes-31'
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

function prestadorUsuario($idUsuario, $conectar)
{
	$sql = mysql_query("
	SELECT 
		p.`id` 
	FROM 
		prestadores p
	WHERE 
		p.`usuario`=$idUsuario
	", $conectar);
	
	$row = mysql_fetch_array($sql);
	
	return $row[id];
}

function actualizarCobros($idPrestador, $cobroSantiago, $cobroRegiones, $conectar)
{
	mysql_query("
	UPDATE
		prestadores
	SET	
		cobroSantiago='$cobroSantiago', 
		cobroRegiones='$cobroRegiones' 
	WHERE
		id=$idPrestador
	", $conectar);
}




?>