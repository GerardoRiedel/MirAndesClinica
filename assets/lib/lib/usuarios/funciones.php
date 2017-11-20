<?php

//include('../conectar.php');
//
//$conectar = conectar();
//
//$tipo = 'prestador';
//$usuario = 'prestador';
//$pass = md5(1);

//crearUsuario($tipo, $usuario, $pass, $conectar);

function crearUsuario($tipo, $usuario, $pass, $conectar)
{	
	$sql = mysql_query("
	INSERT INTO
		usuarios
		(tipo, usuario, pass)
	VALUES
		('$tipo', '$usuario', '$pass')
	", $conectar);
	
	if($sql == false)
	{
		echo 'Error: no se ingresó el usuario';
		die();
	}
	else
	{
		return mysql_insert_id();
	}
}

function editarUsuario($id, $usuario, $conectar)
{
	$sql = mysql_query("
	UPDATE
		usuarios
	SET
		usuario='$usuario'
	WHERE 
		id=$id
	", $conectar);
	
	if($sql == false)
	{
		die('Error: no se editó el usuario');
	}
	else
	{
		return true;
	}
}

function eliminarUsuario($id, $conectar)
{	
	mysql_query("
	UPDATE
		usuarios
	SET
		activo='no'
	WHERE 
		id=$id
	", $conectar);
}

function nombreUsuario($id, $conectar)
{
	$sql = mysql_query("
	SELECT 
		u.`usuario`
	FROM 
		usuarios u
	WHERE 
		u.`id`=$id
	", $conectar);
	
	$row = mysql_fetch_array($sql);
	
	return $row[usuario];
}

function tipoUsuario($id, $conectar)
{
	$sql = mysql_query("
	SELECT 
		u.`tipo` 
	FROM 
		usuarios u
	WHERE 
		u.`id`=$id
	", $conectar);
	
	$row = mysql_fetch_array($sql);
	
	return $row[tipo];
}

function cambiarPassUsuario($id, $pass, $conectar)
{
	$sql = mysql_query("
	UPDATE
		usuarios
	SET
		pass='$pass'
	WHERE 
		id=$id
	", $conectar);
	
	if($sql == false)
	{
		die('Error: no se cambió la contraseña');
	}
	else
	{
		return true;
	}
}

function passUsuario($id, $conectar)
{
	$sql = mysql_query("
	SELECT 
		u.`pass` 
	FROM 
		usuarios u
	WHERE 
		u.`id`=$id
	", $conectar);
	
	$row = mysql_fetch_array($sql);
	
	return $row[pass];
}

function vincularUsuarioIsapre($usuario, $isapre, $conectar)
{
	$sql = mysql_query("
	INSERT INTO
		usuario_isapre
		(usuario, isapre)
	VALUES
		($usuario, $isapre)
	", $conectar);
	
	if($sql == false)
	{
		die('Error: no se vinculó usuario-isapre');
	}
	else
	{
		return true;
	}
}
function id_usuarioisapre ($idUsuario,$conectar){

$sql="SELECT`isapre`FROM `usuario_isapre`WHERE usuario = '".$idUsuario."';";
    $resul=mysql_query($sql,$conectar);
    $row = mysql_fetch_array($resul);

    return $row['isapre'];
}
?>