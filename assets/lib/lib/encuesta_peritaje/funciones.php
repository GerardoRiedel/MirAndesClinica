<?php

//include('../conectar.php');
//
//$conectar = conectar();
//
//$id=1;
//$hora = 5;
//$paciente = 11;
//$prestador = 1;
//$isapre = 1;
//$sexo = 'M';
//$edad = 43;
//$comuna = 1;
//$actividad = 'secretaria';
//$tiempoDeLM = 3;
//$diagnosticoLM = 'nada';
//$opinionDiagnostico = 'De acuerdo con otro diagn&oacute;stico';
//$correspondeReposo = 'No';
//$tratante = 'Otro';
//$opinionTratamiento = 'De acuerdo';
//
//eliminarEncuestaPeritaje($id, $conectar);

function crearEncuestaPeritaje($paciente, $prestador, $hora, $sexo, $edad, $isapre, $comuna, $actividad, $tiempoDeLM, $diagnosticoLM, $opinionDiagnostico, $correspondeReposo, $tratante, $opinionTratamiento, $conectar)
{
	$sql = mysql_query("
	INSERT INTO
		encuesta_peritaje
		(paciente, prestador, hora, sexo, edad, isapre, comuna, actividad, tiempoDeLM, diagnosticoLM, opinionDiagnostico, correspondeReposo, tratante, opinionTratamiento)
	VALUES
		('$paciente', '$prestador', '$hora', '$sexo', '$edad', '$isapre', '$comuna', '$actividad', '$tiempoDeLM', '$diagnosticoLM', '$opinionDiagnostico', '$correspondeReposo', '$tratante', '$opinionTratamiento')
	", $conectar);

	if($sql == false)
	{
		die('No se ingres&oacute; la encuesta');
	}
}

function editarEncuestaPeritaje($id, $paciente, $prestador, $hora, $sexo, $edad, $isapre, $comuna, $actividad, $tiempoDeLM, $diagnosticoLM, $opinionDiagnostico, $correspondeReposo, $tratante, $opinionTratamiento, $conectar)
{
	$sql = mysql_query("
	UPDATE
		encuesta_peritaje
	SET
		paciente='$paciente', 
		prestador='$prestador', 
		hora='$hora', 
		sexo='$sexo', 
		edad='$edad', 
		isapre='$isapre', 
		comuna='$comuna', 
		actividad='$actividad', 
		tiempoDeLM='$tiempoDeLM', 
		diagnosticoLM='$diagnosticoLM', 
		opinionDiagnostico='$opinionDiagnostico', 
		correspondeReposo='$correspondeReposo', 
		tratante='$tratante', 
		opinionTratamiento='$opinionTratamiento'
	WHERE
		id=$id
	", $conectar);

	if($sql == false)
	{
		die('No se edit&oacute; la encuesta');
	}
}

function eliminarEncuestaPeritaje($id, $conectar)
{
	$sql = mysql_query("
	DELETE FROM
		encuesta_peritaje
	WHERE
		id=$id
	", $conectar);

	if($sql == false)
	{
		die('No se elimin&oacute; la encuesta');
	}
}

function existeEncuestaPeritaje($hora, $conectar)
{
	$sql = mysql_query("
	SELECT 
		e.`id` 
	FROM 
		encuesta_peritaje e
	WHERE 
		e.`hora`=$hora
	", $conectar);

	if(mysql_num_rows($sql) != 0)
	{
		$row = mysql_fetch_array($sql);
		return $row[id];
	}
	else
	{
		return false;
	}
}

function sexoEncuestaPeritaje($id, $conectar)
{
	$sql = mysql_query("
	SELECT 
		e.`sexo` 
	FROM 
		encuesta_peritaje e
	WHERE
		e.id=$id
	", $conectar);

	$row = mysql_fetch_array($sql);
	
	return $row[sexo];
}

function edadEncuestaPeritaje($id, $conectar)
{
	$sql = mysql_query("
	SELECT 
		e.`edad` 
	FROM 
		encuesta_peritaje e
	WHERE
		e.id=$id
	", $conectar);

	$row = mysql_fetch_array($sql);
	
	return $row[edad];
}

function actividadEncuestaPeritaje($id, $conectar)
{
	$sql = mysql_query("
	SELECT 
		e.`actividad` 
	FROM 
		encuesta_peritaje e
	WHERE
		e.id=$id
	", $conectar);

	$row = mysql_fetch_array($sql);
	
	return $row[actividad];
}

function tiempoDeLMEncuestaPeritaje($id, $conectar)
{
	$sql = mysql_query("
	SELECT 
		e.`tiempoDeLM` 
	FROM 
		encuesta_peritaje e
	WHERE
		e.id=$id
	", $conectar);

	$row = mysql_fetch_array($sql);
	
	return $row[tiempoDeLM];
}

function diagnosticoLMEncuestaPeritaje($id, $conectar)
{
	$sql = mysql_query("
	SELECT 
		e.`diagnosticoLM` 
	FROM 
		encuesta_peritaje e
	WHERE
		e.id=$id
	", $conectar);

	$row = mysql_fetch_array($sql);
	
	return $row[diagnosticoLM];
}

function opinionDiagnosticoEncuestaPeritaje($id, $conectar)
{
	$sql = mysql_query("
	SELECT 
		e.`opinionDiagnostico` 
	FROM 
		encuesta_peritaje e
	WHERE
		e.id=$id
	", $conectar);

	$row = mysql_fetch_array($sql);
	
	return $row[opinionDiagnostico];
}

function correspondeReposoEncuestaPeritaje($id, $conectar)
{
	$sql = mysql_query("
	SELECT 
		e.`correspondeReposo` 
	FROM 
		encuesta_peritaje e
	WHERE
		e.id=$id
	", $conectar);

	$row = mysql_fetch_array($sql);
	
	return $row[correspondeReposo];
}

function tratanteEncuestaPeritaje($id, $conectar)
{
	$sql = mysql_query("
	SELECT 
		e.`tratante` 
	FROM 
		encuesta_peritaje e
	WHERE
		e.id=$id
	", $conectar);

	$row = mysql_fetch_array($sql);
	
	return $row[tratante];
}

function opinionTratamientoEncuestaPeritaje($id, $conectar)
{
	$sql = mysql_query("
	SELECT 
		e.`opinionTratamiento` 
	FROM 
		encuesta_peritaje e
	WHERE
		e.id=$id
	", $conectar);

	$row = mysql_fetch_array($sql);
	
	return $row[opinionTratamiento];
}
?>