<?php 

function editarValorPeritaje($ano, $mes, $valorSantiago, $valorRegiones, $valorNoRealizado, $conectar)
{
	$sql = mysql_query("
	SELECT 
		u.`id` 
	FROM 
		valor_peritaje u
	WHERE 
		u.`mes`=$mes AND 
		u.`ano`=$ano
	", $conectar);
	
	//SI no existe valor para esa fecha
	if(mysql_num_rows($sql) == 0)
	{
		mysql_query("
		INSERT INTO
			valor_peritaje
			(ano, mes, valorSantiago, valorRegiones, valorNoRealizado)
		VALUES
			('$ano', '$mes', '$valorSantiago', '$valorRegiones', '$valorNoRealizado')
		", $conectar);
	}
	else
	{		
		mysql_query("
		UPDATE
			valor_peritaje
		SET
			valorSantiago='$valorSantiago',
			valorRegiones='$valorRegiones',
			valorNoRealizado='$valorNoRealizado'
		WHERE
			ano=$ano AND
			mes=$mes
		", $conectar);
	}
}

function valorPeritajeAsistenteRegion($mes, $ano, $conectar)
{
	$sql = mysql_query("
	SELECT 
		v.`valorRegiones` 
	FROM 
		valor_peritaje v
	WHERE 
		v.`ano`='".$ano."' AND 
		v.`mes`='".$mes."'
	", $conectar);
	
	$row = mysql_fetch_array($sql);
	return $row[valorRegiones];
}

function valorPeritajeInasistenteRegion($mes, $ano, $conectar)
{
	$sql = mysql_query("
	SELECT 
		v.`valorNoRealizado` 
	FROM 
		valor_peritaje v
	WHERE 
		v.`ano`='".$ano."' AND 
		v.`mes`='".$mes."'
	", $conectar);
	
	$row = mysql_fetch_array($sql);
	return $row[valorNoRealizado];
}

function valorPeritajeAsistenteSantiago($mes, $ano, $conectar)
{
	$sql = mysql_query("
	SELECT 
		v.`valorSantiago` 
	FROM 
		valor_peritaje v
	WHERE 
		v.`ano`='".$ano."' AND 
		v.`mes`='".$mes."'
	", $conectar);
	
	$row = mysql_fetch_array($sql);
	
	return $row[valorSantiago];
}
?>