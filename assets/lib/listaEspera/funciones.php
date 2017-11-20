<?php
//Retorna true si el prestador tiene consulta a esa hora
//Recibe la fecha y el id del prestador
function existeFechaPrestadorEspera($idPrestador, $fecha, $idCiudad, $hash, $conectar)
{
	$sql = mysql_query("
	SELECT 
		h.`id` 
	FROM 
		horas_prestadores_espera h
	WHERE 
		h.`prestador`=$idPrestador AND 
		h.`ciudad`=$idCiudad AND 
		h.`hora`='$fecha' AND
		h.`hash`='$hash'
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

function cambiarHoraPrestadorEspera($prestador, $hora, $idCiudad, $hash, $conectar)
{
	//Verifico si el usuario está asignando o borrando esa hora
	if(existeFechaPrestadorEspera($prestador, $hora, $idCiudad, $hash, $conectar) == false)//Si asigna
	{
		mysql_query("INSERT INTO horas_prestadores_espera  (prestador, hora, ciudad, hash)VALUES ($prestador, '$hora', '$idCiudad', '$hash') ", $conectar);
		
		return true;
	}
	else//Si borra
	{
		mysql_query(" DELETE FROM horas_prestadores_espera 	WHERE
			prestador=$prestador AND
			ciudad=".$idCiudad." AND
			hora='".$hora."' AND
			hash='".$hash."'
		", $conectar);
			
			return true;
	}
}

function datosPacienteEspera($idPaciente, $conectar)
{
	$sql = mysql_query("
	SELECT 
		p.`id`, 
		DATE(p.`fechaIngreso`) as fechaIngreso, 
		p.`rut`, 
		p.`nombres`, 
		p.`apellidoPaterno`, 
		p.`apellidoMaterno`, 
		p.`fechaVencimientoLic`,
		p.`telefono`, 
		p.`celular`, 
		p.`isapre`, 
		p.`observacion` 
	FROM 
		pacientes_espera p
	WHERE 
		p.`id`=".$idPaciente."
	", $conectar);
	
	return mysql_fetch_array($sql);
}

function siExistePacienteEspera($rut, $conectar)
{
	$sql = mysql_query("
	SELECT 
		p.`id`
	FROM 
		pacientes_espera p
	WHERE 
		p.`rut`=".$rut."
	", $conectar);
	
	if(mysql_num_rows($sql) == 0)
	{
		return false;
	}
	else
	{
		return true;
	}
}
?>