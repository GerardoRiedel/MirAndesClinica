<?php 
//PERITAJES SOLICITADOS
//
function numeroPeritajesSolicitadosPorMes($mes, $ano, $conectar)
{
	$sql = mysql_query("
	SELECT 
		h.`id` 
	FROM 
		horas h
	WHERE 
		DATE(h.`hora`) BETWEEN '".$ano."-".$mes."-01' AND '".$ano."-".$mes."-31'
	", $conectar);
	
	return mysql_num_rows($sql);
}

function numeroPeritajesSolicitadosPorIsapre($isapre, $ano, $conectar)
{
	$sql = mysql_query("
	SELECT 
		h.`id` 
	FROM 
		horas h
	WHERE 
		YEAR(h.`hora`)=".$ano." AND
		h.`isapre`=".$isapre."
	", $conectar);
	
	return mysql_num_rows($sql);
}

function numeroPeritajesSolicitadosPorCiudad($ciudad, $ano, $conectar)
{
	$sql = mysql_query("
	SELECT 
		h.`id`
	FROM 
		horas h
	WHERE 
		YEAR(h.`hora`)=".$ano." AND
		h.`ciudad`=".$ciudad."
	", $conectar);
	
	return mysql_num_rows($sql);
}

function numeroPeritajesSolicitadosPorIsapreMes($isapre,  $fechaInicio, $fechaFin,  $conectar)
{
	$sql = mysql_query("
	SELECT 
		h.`id` 
	FROM 
		horas h
	WHERE 
		DATE(h.`hora`) BETWEEN '".$fechaInicio."' AND '".$fechaFin."' AND
		h.`isapre`=".$isapre."
	", $conectar);
	
	return mysql_num_rows($sql);
}

//
//PERITAJES SOLICITADOS

//ASISTENCIA
//
function asistenciaAno($fechaInicio, $fechaFin,  $conectar)
{
	$sql = mysql_query("
	SELECT 
		h.`id` 
	FROM 
		horas h
	WHERE 
		DATE(h.`hora`) BETWEEN '".$fechaInicio."' AND '".$fechaFin."' AND
		h.`asiste`='si' 
	", $conectar);
	
	return mysql_num_rows($sql);
}

function inasistenciaAno($fechaInicio, $fechaFin,  $conectar)
{
	$sql = mysql_query("
	SELECT 
		h.`id` 
	FROM 
		horas h
	WHERE 
		DATE(h.`hora`) BETWEEN '".$fechaInicio."' AND '".$fechaFin."' AND
		h.`asiste`='no' 
	", $conectar);
	
	return mysql_num_rows($sql);
}

function asistenciaPorMes($mes, $ano, $conectar)
{
	$sql = mysql_query("
	SELECT 
		h.`id` 
	FROM 
		horas h
	WHERE 
		DATE(h.`hora`) BETWEEN '".$ano."-".$mes."-01' AND '".$ano."-".$mes."-31' AND
		h.`asiste`='si' 
	", $conectar);
	
	return mysql_num_rows($sql);
}

function inasistenciaPorMes($mes, $ano, $conectar)
{
	$sql = mysql_query("
	SELECT 
		h.`id` 
	FROM 
		horas h
	WHERE 
		DATE(h.`hora`) BETWEEN '".$ano."-".$mes."-01' AND '".$ano."-".$mes."-31' AND
		h.`asiste`='no' 
	", $conectar);
	
	return mysql_num_rows($sql);
}

function asistenciaPorIsapreAno($isapre, $fechaInicio, $fechaFin,  $conectar)
{
	$sql = mysql_query("
	SELECT 
		h.`id` 
	FROM 
		horas h
	WHERE 
		DATE(h.`hora`) BETWEEN '".$fechaInicio."' AND '".$fechaFin."' AND
		h.`asiste`='si' AND
		h.`isapre`=".$isapre."
	", $conectar);
	
	return mysql_num_rows($sql);
}

function inasistenciaPorIsapreAno($isapre, $fechaInicio, $fechaFin,   $conectar)
{
	$sql = mysql_query("
	SELECT 
		h.`id` 
	FROM 
		horas h
	WHERE 
		DATE(h.`hora`) BETWEEN '".$fechaInicio."' AND '".$fechaFin."' AND
		h.`asiste`='no' AND
		h.`isapre`=".$isapre."
	", $conectar);
	
	return mysql_num_rows($sql);
}

function asistenciaPorIsapreCiudadAno($isapre, $ciudad, $fechaInicio, $fechaFin, $conectar)
{
	$sql = mysql_query("
	SELECT 
		h.`id` 
	FROM 
		horas h
	WHERE 
		DATE(h.`hora`) BETWEEN '".$fechaInicio."' AND '".$fechaFin."' AND
		h.`asiste`='si' AND
		h.`isapre`=".$isapre." AND
		h.`ciudad`='".$ciudad."' 		
	", $conectar);
	
	return mysql_num_rows($sql);
}

function inasistenciaPorIsapreCiudadAno($isapre, $ciudad, $fechaInicio, $fechaFin,  $conectar)
{
	$sql = mysql_query("
	SELECT 
		h.`id` 
	FROM 
		horas h
	WHERE 
		DATE(h.`hora`) BETWEEN '".$fechaInicio."' AND '".$fechaFin."' AND
		h.`asiste`='no' AND
		h.`isapre`=".$isapre." AND
		h.`ciudad`='".$ciudad."' 		
	", $conectar);
	
	return mysql_num_rows($sql);
}

//
//ASISTENCIA


//DISTRIBUCIÓN POR SEXO
//

function pacientesMujeresIsapreAno($isapre, $fechaInicio, $fechaFin, $conectar)
{
	$sql = mysql_query("
	SELECT 
		i.`hora`
	FROM 
		informe_entrevista i, 
		horas h
	WHERE 
		i.`hora`=h.`id` AND 
		i.`sexo`='F' AND 
		h.`isapre`=".$isapre." AND
		DATE(h.`hora`) BETWEEN '".$fechaInicio."' AND '".$fechaFin."'
	GROUP BY 
		i.`hora`
	", $conectar);
	
	return mysql_num_rows($sql);
}

function pacientesHombresIsapreAno($isapre, $fechaInicio, $fechaFin, $conectar)
{
	$sql = mysql_query("
	SELECT 
		i.`hora`
	FROM 
		informe_entrevista i, 
		horas h
	WHERE 
		i.`hora`=h.`id` AND 
		i.`sexo`='M' AND 
		h.`isapre`=".$isapre." AND
		DATE(h.`hora`) BETWEEN '".$fechaInicio."' AND '".$fechaFin."'	
	GROUP BY 
		i.`hora`
	", $conectar);
	
	return mysql_num_rows($sql);
}

//
//DISTRIBUCIÓN POR SEXO

//DISTRIBUCIÓN POR OCUPACIÓN
//
function pacientesOcupacionIsapreAno($ocupacion, $isapre, $fechaInicio, $fechaFin, $conectar)
{
	$sql = mysql_query("
	SELECT 
		i.`hora`
	FROM 
		informe_entrevista i, 
		horas h
	WHERE 
		i.`hora`=h.`id` AND 
		i.`ocupacion`='".$ocupacion."' AND 
		h.`isapre`=".$isapre." AND
		DATE(h.`hora`) BETWEEN '".$fechaInicio."' AND '".$fechaFin."'	
	GROUP BY 
		i.`hora`
	", $conectar);
	
	return mysql_num_rows($sql);
}
//
//DISTRIBUCIÓN POR OCUPACIÓN

//OPINIÓN DE LA LM
//
function pacientesOpinionLMIsapreAno($opinion, $isapre, $fechaInicio, $fechaFin, $conectar)
{
	$sql = mysql_query("
	SELECT 
		i.`hora`
	FROM 
		informe_entrevista i, 
		horas h
	WHERE 
		i.`hora`=h.`id` AND 
		i.`opinionSobreDiagnostico`='".$opinion."' AND 
		h.`isapre`=".$isapre." AND
		DATE(h.`hora`) BETWEEN '".$fechaInicio."' AND '".$fechaFin."'		
	GROUP BY 
		i.`hora`
	", $conectar);
	
	return mysql_num_rows($sql);
}
//
//OPINIÓN DE LA LM


//OPINIÓN TRATAMIENTO
//
function pacientesOpinionTratamientoIsapreAno($opinion, $isapre, $fechaInicio, $fechaFin, $conectar)
{
	$sql = mysql_query("
	SELECT 
		i.`hora`
	FROM 
		informe_entrevista i, 
		horas h
	WHERE 
		i.`hora`=h.`id` AND 
		i.`opinionTratamiento`='".$opinion."' AND 
		h.`isapre`=".$isapre." AND
		DATE(h.`hora`) BETWEEN '".$fechaInicio."' AND '".$fechaFin."'	
	GROUP BY 
		i.`hora`
	", $conectar);
	
	return mysql_num_rows($sql);
}
//
//OPINIÓN TRATAMIENTO

function numeroPeritajesSolicitadosPorIsapreCiudad($isapre, $ciudad, $fechaInicio, $fechaFin, $conectar)
{
	$sql = mysql_query("
	SELECT 
		h.`id` 
	FROM 
		horas h
	WHERE 
		DATE(h.`hora`) BETWEEN '".$fechaInicio."' AND '".$fechaFin."' AND
		h.`isapre`=".$isapre." AND 
		h.`ciudad`=".$ciudad."
	", $conectar);
	
	return mysql_num_rows($sql);
}

function peritajesRegionesRealizadosMes($mes, $ano, $conectar)
{
	$sql = mysql_query("
	SELECT 
		h.`id` 
	FROM 
		horas h
	WHERE 
		DATE(h.`hora`) BETWEEN '".$ano."-".$mes."-01' AND '".$ano."-".$mes."-31' AND
		h.`ciudad`!=1 AND
		h.`asiste`='si'
	", $conectar);
	
	return mysql_num_rows($sql);
}

function peritajeRealizadoRegionesPorCiudad($ciudad, $ano, $conectar)
{
	$sql = mysql_query("
	SELECT 
		h.`id` 
	FROM 
		horas h
	WHERE 
		DATE(h.`hora`) BETWEEN '".$ano."-01-01' AND '".$ano."-12-31' AND
		h.`ciudad`=".$ciudad." AND
		h.`asiste`='si'
	", $conectar);
	
	return mysql_num_rows($sql);
}

function numeroPeritajesRealizadosParaIsapreCiudad($isapre, $ciudad, $ano, $conectar)
{
	$sql = mysql_query("
	SELECT 
		h.`id` 
	FROM 
		horas h
	WHERE 
		DATE(h.`hora`) BETWEEN '".$ano."-01-01' AND '".$ano."-12-31' AND
		h.`isapre`=".$isapre." AND 
		h.`ciudad`=".$ciudad." AND
		h.`asiste`='si'
	", $conectar);
	
	return mysql_num_rows($sql);
}

function ventasPorMes($mes, $ano, $conectar)
{
	$sql = mysql_query("
	SELECT 
		h.`id`, 
		h.`asiste`, 
		h.`ciudad`, 
		MONTH(h.`hora`) as mes,
		YEAR(h.`hora`) as ano
	FROM 
		horas h
	WHERE 
		DATE(h.`hora`) BETWEEN '".$ano."-".$mes."-01' AND '".$ano."-".$mes."-31'
	", $conectar);
		
	$total = 0;
	while($row = mysql_fetch_array($sql))
	{
		$hora = $row[id];
		$asiste = $row[asiste];
		$ciudad = $row[ciudad];
		$mes = $row[mes];
		$ano = $row[ano];
		
		//Si es de región
		if($ciudad != 1)
		{
			//Si asiste
			if($asiste == 'si')
			{
				$total += valorPeritajeAsistenteRegion($mes, $ano, $conectar) * valorUF($mes, $ano, $conectar);
			}
			else //si no asiste
			{
				$total += valorPeritajeInasistenteRegion($mes, $ano, $conectar) * valorUF($mes, $ano, $conectar);
			}
		}
		else //Santiago
		{
			//Si asiste
			if($asiste == 'si')
			{
				$total += valorPeritajeAsistenteSantiago($mes, $ano, $conectar) * valorUF($mes, $ano, $conectar);
			}
		}
	}
	
	return $total;
}

function ventasPorIsapre($isapre, $ano, $conectar)
{
	$sql = mysql_query("
	SELECT 
		h.`id`, 
		h.`asiste`, 
		h.`ciudad`, 
		MONTH(h.`hora`) as mes,
		YEAR(h.`hora`) as ano
	FROM 
		horas h
	WHERE 
		DATE(h.`hora`) BETWEEN '".$ano."-01-01' AND '".$ano."-12-31' AND
		h.`isapre`=".$isapre." 
	", $conectar);
		
	$total = 0;
	while($row = mysql_fetch_array($sql))
	{
		$hora = $row[id];
		$asiste = $row[asiste];
		$ciudad = $row[ciudad];
		$mes = $row[mes];
		$ano = $row[ano];
		
		//Si es de región
		if($ciudad != 1)
		{
			//Si asiste
			if($asiste == 'si')
			{
				$total += valorPeritajeAsistenteRegion($mes, $ano, $conectar) * valorUF($mes, $ano, $conectar);
			}
			else //si no asiste
			{
				$total += valorPeritajeInasistenteRegion($mes, $ano, $conectar) * valorUF($mes, $ano, $conectar);
			}
		}
		else //Santiago
		{
			//Si asiste
			if($asiste == 'si')
			{
				$total += valorPeritajeAsistenteSantiago($mes, $ano, $conectar) * valorUF($mes, $ano, $conectar);
			}
		}
	}
	
	return $total;
}

function ventasPorCiudad($ciudad, $ano, $conectar)
{
	$sql = mysql_query("
	SELECT 
		h.`id`, 
		h.`asiste`, 
		MONTH(h.`hora`) as mes,
		YEAR(h.`hora`) as ano
	FROM 
		horas h
	WHERE 
		DATE(h.`hora`) BETWEEN '".$ano."-01-01' AND '".$ano."-12-31' AND
		h.`ciudad`=".$ciudad." 
	", $conectar);
		
	$total = 0;
	while($row = mysql_fetch_array($sql))
	{
		$hora = $row[id];
		$asiste = $row[asiste];
		$mes = $row[mes];
		$ano = $row[ano];
		
		//Si es de región
		if($ciudad != 1)
		{
			//Si asiste
			if($asiste == 'si')
			{
				$total += valorPeritajeAsistenteRegion($mes, $ano, $conectar) * valorUF($mes, $ano, $conectar);
			}
			else //si no asiste
			{
				$total += valorPeritajeInasistenteRegion($mes, $ano, $conectar) * valorUF($mes, $ano, $conectar);
			}
		}
		else //Santiago
		{
			//Si asiste
			if($asiste == 'si')
			{
				$total += valorPeritajeAsistenteSantiago($mes, $ano, $conectar) * valorUF($mes, $ano, $conectar);
			}
		}
	}
	
	return $total;
}

//////////////////////////////
//CALIDAD DEL SERVICIO

function opinionTratamientoGral($opinion, $fechaInicio, $fechaFin, $conectar)
{
	$sql = mysql_query("
	SELECT 
		i.`id` 
	FROM 
		informe_entrevista i, 
		horas h
	WHERE 
		DATE(h.`hora`) BETWEEN '".$fechaInicio."' AND '".$fechaFin."' AND 
		i.`hora`=h.`id` AND 
		i.`opinionTratamiento`='".$opinion."' AND
		h.`asiste`='si'
	GROUP BY 
		i.`hora`
	", $conectar);
	
	return mysql_num_rows($sql);
}

function opinionTratamientoMedico($medico, $opinion, $fechaInicio, $fechaFin, $conectar)
{
	$sql = mysql_query("
	SELECT 
		i.`id` 
	FROM 
		informe_entrevista i, 
		horas h
	WHERE 
		DATE(h.`hora`) BETWEEN '".$fechaInicio."' AND '".$fechaFin."' AND 
		i.`hora`=h.`id` AND 
		i.`opinionTratamiento`='".$opinion."' AND
		h.`asiste`='si' AND
		h.`prestador`=".$medico."
	GROUP BY 
		i.`hora`
	", $conectar);
	
	return mysql_num_rows($sql);
}

function opinionReposoSiCompleto($fechaInicio, $fechaFin, $conectar)
{
	$sql = mysql_query("
	SELECT 
		i.`id` 
	FROM 
		informe_entrevista i, 
		horas h
	WHERE 
		DATE(h.`hora`) BETWEEN '".$fechaInicio."' AND '".$fechaFin."' AND 
		i.`hora`=h.`id` AND 
		i.`correspondeReposo`='SI' AND
		i.`periodo`='COMPLETO' AND
		h.`asiste`='si'
	GROUP BY 
		i.`hora`
	", $conectar);
	
	return mysql_num_rows($sql);
}

function opinionReposoSiReducido($fechaInicio, $fechaFin, $conectar)
{
	$sql = mysql_query("
	SELECT 
		i.`id` 
	FROM 
		informe_entrevista i, 
		horas h
	WHERE 
		DATE(h.`hora`) BETWEEN '".$fechaInicio."' AND '".$fechaFin."' AND 
		i.`hora`=h.`id` AND 
		i.`correspondeReposo`='SI' AND
		i.`periodo`='REDUCIDO' AND
		h.`asiste`='si'
	GROUP BY 
		i.`hora`
	", $conectar);
	
	return mysql_num_rows($sql);
}

function opinionReposoNo($fechaInicio, $fechaFin, $conectar)
{
	$sql = mysql_query("
	SELECT 
		i.`id` 
	FROM 
		informe_entrevista i, 
		horas h
	WHERE 
		DATE(h.`hora`) BETWEEN '".$fechaInicio."' AND '".$fechaFin."' AND 
		i.`hora`=h.`id` AND 
		i.`correspondeReposo`='NO' AND
		h.`asiste`='si'
	GROUP BY 
		i.`hora`
	", $conectar);
	
	return mysql_num_rows($sql);
}

function opinionReposoMedicoSiCompleto($medico, $fechaInicio, $fechaFin, $conectar)
{
	$sql = mysql_query("
	SELECT 
		i.`id` 
	FROM 
		informe_entrevista i, 
		horas h
	WHERE 
		DATE(h.`hora`) BETWEEN '".$fechaInicio."' AND '".$fechaFin."' AND 
		i.`hora`=h.`id` AND 
		i.`correspondeReposo`='SI' AND
		i.`periodo`='COMPLETO' AND
		h.`asiste`='si' AND
		h.`prestador`=".$medico."
	GROUP BY 
		i.`hora`
	", $conectar);
	
	return mysql_num_rows($sql);
}

function opinionReposoMedicoSiReducido($medico, $fechaInicio, $fechaFin, $conectar)
{
	$sql = mysql_query("
	SELECT 
		i.`id` 
	FROM 
		informe_entrevista i, 
		horas h
	WHERE 
		DATE(h.`hora`) BETWEEN '".$fechaInicio."' AND '".$fechaFin."' AND 
		i.`hora`=h.`id` AND 
		i.`correspondeReposo`='SI' AND
		i.`periodo`='REDUCIDO' AND
		h.`asiste`='si' AND
		h.`prestador`=".$medico."
	GROUP BY 
		i.`hora`
	", $conectar);
	
	return mysql_num_rows($sql);
}

function opinionReposoMedicoNo($medico, $fechaInicio, $fechaFin, $conectar)
{
	$sql = mysql_query("
	SELECT 
		i.`id` 
	FROM 
		informe_entrevista i, 
		horas h
	WHERE 
		DATE(h.`hora`) BETWEEN '".$fechaInicio."' AND '".$fechaFin."' AND 
		i.`hora`=h.`id` AND 
		i.`correspondeReposo`='NO' AND
		h.`asiste`='si' AND
		h.`prestador`=".$medico."
	GROUP BY 
		i.`hora`
	", $conectar);
	
	return mysql_num_rows($sql);
}

function opinionReposoIsapreSiCompleto($isapre, $fechaInicio, $fechaFin, $conectar)
{
	$sql = mysql_query("
	SELECT 
		i.`id` 
	FROM 
		informe_entrevista i, 
		horas h
	WHERE 
		DATE(h.`hora`) BETWEEN '".$fechaInicio."' AND '".$fechaFin."' AND 
		i.`hora`=h.`id` AND 
		i.`correspondeReposo`='SI' AND
		i.`periodo`='COMPLETO' AND
		h.`asiste`='si' AND
		h.`isapre`=".$isapre."
	GROUP BY 
		i.`hora`
	", $conectar);
	
	return mysql_num_rows($sql);
}

function opinionReposoIsapreSiReducido($isapre, $fechaInicio, $fechaFin, $conectar)
{
	$sql = mysql_query("
	SELECT 
		i.`id` 
	FROM 
		informe_entrevista i, 
		horas h
	WHERE 
		DATE(h.`hora`) BETWEEN '".$fechaInicio."' AND '".$fechaFin."' AND 
		i.`hora`=h.`id` AND 
		i.`correspondeReposo`='SI' AND
		i.`periodo`='REDUCIDO' AND
		h.`asiste`='si' AND
		h.`isapre`=".$isapre."
	GROUP BY 
		i.`hora`
	", $conectar);
	
	return mysql_num_rows($sql);
}

function opinionReposoIsapreNo($isapre, $fechaInicio, $fechaFin, $conectar)
{
	$sql = mysql_query("
	SELECT 
		i.`id` 
	FROM 
		informe_entrevista i, 
		horas h
	WHERE 
		DATE(h.`hora`) BETWEEN '".$fechaInicio."' AND '".$fechaFin."' AND 
		i.`hora`=h.`id` AND 
		i.`correspondeReposo`='NO' AND
		h.`asiste`='si' AND
		h.`isapre`=".$isapre."
	GROUP BY 
		i.`hora`
	", $conectar);
	
	return mysql_num_rows($sql);
}

function opinionReposoCiudadSiCompleto($ciudad, $fechaInicio, $fechaFin, $conectar)
{
	$sql = mysql_query("
	SELECT 
		i.`id` 
	FROM 
		informe_entrevista i, 
		horas h
	WHERE 
		DATE(h.`hora`) BETWEEN '".$fechaInicio."' AND '".$fechaFin."' AND 
		i.`hora`=h.`id` AND 
		i.`correspondeReposo`='SI' AND
		i.`periodo`='COMPLETO' AND
		h.`asiste`='si' AND
		h.`ciudad`!=1
	GROUP BY 
		i.`hora`
	", $conectar);
		
	if($ciudad == 1)
	{
		$sql = mysql_query("
		SELECT 
			i.`id` 
		FROM 
			informe_entrevista i, 
			horas h
		WHERE 
			DATE(h.`hora`) BETWEEN '".$fechaInicio."' AND '".$fechaFin."' AND 
			i.`hora`=h.`id` AND 
			i.`correspondeReposo`='SI' AND
			i.`periodo`='COMPLETO' AND
			h.`asiste`='si' AND
			h.`ciudad`=1
		GROUP BY 
			i.`hora`
		", $conectar);
	}
	
	return mysql_num_rows($sql);
}

function opinionReposoCiudadSiReducido($ciudad, $fechaInicio, $fechaFin, $conectar)
{
	$sql = mysql_query("
	SELECT 
		i.`id` 
	FROM 
		informe_entrevista i, 
		horas h
	WHERE 
		DATE(h.`hora`) BETWEEN '".$fechaInicio."' AND '".$fechaFin."' AND 
		i.`hora`=h.`id` AND 
		i.`correspondeReposo`='SI' AND
		i.`periodo`='REDUCIDO' AND
		h.`asiste`='si' AND
		h.`ciudad`!=1
	GROUP BY 
		i.`hora`
	", $conectar);
		
	if($ciudad == 1)
	{
		$sql = mysql_query("
		SELECT 
			i.`id` 
		FROM 
			informe_entrevista i, 
			horas h
		WHERE 
			DATE(h.`hora`) BETWEEN '".$fechaInicio."' AND '".$fechaFin."' AND 
			i.`hora`=h.`id` AND 
			i.`correspondeReposo`='SI' AND
			i.`periodo`='REDUCIDO' AND
			h.`asiste`='si' AND
			h.`ciudad`=1
		GROUP BY 
			i.`hora`
		", $conectar);
	}
	
	return mysql_num_rows($sql);
}

function opinionReposoCiudadNo($ciudad, $fechaInicio, $fechaFin, $conectar)
{
	$sql = mysql_query("
	SELECT 
		i.`id` 
	FROM 
		informe_entrevista i, 
		horas h
	WHERE 
		DATE(h.`hora`) BETWEEN '".$fechaInicio."' AND '".$fechaFin."' AND 
		i.`hora`=h.`id` AND 
		i.`correspondeReposo`='NO' AND
		h.`asiste`='si' AND
		h.`ciudad`!=1
	GROUP BY 
		i.`hora`
	", $conectar);

	if($ciudad == 1)
	{
		$sql = mysql_query("
		SELECT 
			i.`id` 
		FROM 
			informe_entrevista i, 
			horas h
		WHERE 
			DATE(h.`hora`) BETWEEN '".$fechaInicio."' AND '".$fechaFin."' AND 
			i.`hora`=h.`id` AND 
			i.`correspondeReposo`='NO' AND
			h.`asiste`='si' AND
			h.`ciudad`=1
		GROUP BY 
			i.`hora`
		", $conectar);
	}
	
	return mysql_num_rows($sql);
}


//CALIDAD DEL SERVICIO
//////////////////////////////
?>