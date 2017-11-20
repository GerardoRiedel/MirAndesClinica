<?php 

function editarUF($ano, $mes, $valor, $conectar)
{
	$sql = mysql_query("
	SELECT 
		u.`id` 
	FROM 
		uf u
	WHERE 
		u.`mes`=$mes AND 
		u.`ano`=$ano
	", $conectar);
	
	//SI no existe valor para esa fecha
	if(mysql_num_rows($sql) == 0)
	{
		mysql_query("
		INSERT INTO
			uf
			(ano, mes, valor)
		VALUES
			('$ano', '$mes', '$valor')
		", $conectar);
	}
	else
	{		
		mysql_query("
		UPDATE
			uf
		SET
			valor='$valor'
		WHERE
			ano=$ano AND
			mes=$mes
		", $conectar);
	}
}


function valorUF($mes, $ano, $conectar)
{
	$sql = mysql_query("
	SELECT 
		v.`valor` 
	FROM 
		uf v
	WHERE 
		v.`ano`='".$ano."' AND 
		v.`mes`='".$mes."'
	", $conectar);
	
	$row = mysql_fetch_array($sql);
	
	return $row[valor];
}
?>