<?php

function agregarCiudad($ciudad, $region, $direccion, $conectar)
{	
	$sql = mysql_query("
	INSERT INTO
		ciudades
		(ciudad, region, direccion)
	VALUES
		('$ciudad', '$region', '$direccion')
	", $conectar);
	
	if($sql == false)
	{
		echo 'Error: no se ingres� la ciudad';
		die();
	}
	else
	{
		return mysql_insert_id();
	}
}

function editarCiudad($idCiudad, $ciudad, $region, $direccion, $conectar)
{
	$sql = mysql_query("
	UPDATE
		ciudades
	SET
		ciudad='$ciudad',
		region='$region',
		direccion='$direccion'
	WHERE 
		id=$idCiudad
	", $conectar);
	
	if($sql == false)
	{
		die('Error: no se edit� la ciudad');
	}
	else
	{
		return true;
	}
}

function eliminarCiudad($id, $conectar)
{	
	mysql_query("
	DELETE FROM
		ciudades
	WHERE 
		id=$id
	", $conectar);
}

function datosCiudad($ciudad, $conectar)
{	
	$sql = mysql_query("
	SELECT 
		c.`ciudad`,
		c.`region`,
		c.`direccion` 
	FROM 
		ciudades c
	WHERE 
		c.`id`=".$ciudad."
	", $conectar);
	
	$row = mysql_fetch_array($sql);
	
	return $row;
}

function nombreCiudad($ciudad, $conectar)
{	
	$sql = mysql_query("
	SELECT 
		c.`ciudad` 
	FROM 
		ciudades c
	WHERE 
		c.`id`=".$ciudad."
	", $conectar);
	
	$row = mysql_fetch_array($sql);
	
	return $row[ciudad];
}

function siEsRegion($ciudad, $conectar)
{	
	$sql = mysql_query("
	SELECT 
		c.`region` 
	FROM 
		ciudades c
	WHERE 
		c.`id`=".$ciudad."
	", $conectar);

	$row = mysql_fetch_array($sql);
	
	return $row[region];
}

?>