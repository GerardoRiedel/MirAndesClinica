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
		echo 'Error: no se ingres� el usuario';
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
		die('Error: no se edito el usuario');
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
	
	return $row['usuario'];
}
function idUser($usuario, $conectar)
{
	$sql = mysql_query("
	SELECT
		u.`id`
	FROM
		usuarios u
	WHERE
		u.`usuario`='$usuario'
	", $conectar);

	$row = mysql_fetch_array($sql);


	return $row['id'];
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
		die('Error: no se cambio la contraseña');
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
		die('Error: no se vincul� usuario-isapre');
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

function cargaTodasCiudades()
{
	$link=conectar();
	$a=array();
	$x=0;
	$sql="SELECT id, ciudad FROM ciudades ";
	$res=mysql_query($sql, $link);
	while($f=mysql_fetch_array($res))
	{
		$a[$x]=$f;
		$x++;
	}
	mysql_close($link);
	return $a;
}

function cargaTodasCiudadesnoSelect($id)
{
	$link=conectar();
	$a=array();
	$x=0;
	$sql="SELECT `id`,`ciudad` FROM `ciudades`
WHERE ciudades.id NOT IN (
SELECT `idciudad` FROM
      `usuario_ciudad`
           WHERE  `usuario_ciudad`.`idusuario` =$id)";
//	echo $sql ;
	$res=mysql_query($sql, $link);
	while($f=mysql_fetch_array($res))
	{
		$a[$x]=$f;
		$x++;
	}
	mysql_close($link);
	return $a;
}


	function cargaCiudadesUsuario($id)
{
	$link=conectar();
	$a=array();
	$x=0;

	$sql="SELECT `ciudades`.`id`, `ciudades`.`ciudad`
		 FROM  `usuario_ciudad`
    	 INNER JOIN `ciudades`
        ON (`usuario_ciudad`.`idciudad` = `ciudades`.`id`)
        WHERE `usuario_ciudad`.`idusuario` =".$id." ";
//	echo $sql ;
	$res=mysql_query($sql, $link);
	while($f=mysql_fetch_array($res))
	{
		$a[$x]=$f;
		$x++;
	}
	mysql_close($link);
	return $a;
}


function asignarIsapreUsuario($id,$isapreusuario, $conectar)
{
	$sqleli="DELETE FROM `usuario_isapre` WHERE `usuario` =$id   " ;
	$resuleli=mysql_query($sqleli,$conectar);

	for($i=0;$i<count($isapreusuario);$i++)
	{
		$idisapre=$isapreusuario[$i];


		$sql = "INSERT INTO usuario_isapre (usuario, isapre)
	VALUES	($id,$idisapre )";

		$resul=mysql_query($sql,$conectar);
	}

	if($sql == false)
	{
		//echo $sql;
//		die('Error: no se vinculó usuario-Ciudad');
		echo "
                <script language='JavaScript'>
                alert('Error:no se asigno la Isapre');
                </script>";

	}
	else
	{
		return true;
	}



}


function cargaIsapre()
{
	$link=conectar();
	$a=array();
	$x=0;
	$sql="SELECT id, isapre FROM isapres ";
	$res=mysql_query($sql, $link);
	while($f=mysql_fetch_array($res))
	{
		$a[$x]=$f;
		$x++;
	}
	mysql_close($link);
	return $a;
}
function existeUsuario($usuario,  $conectar)
{
	$sql = "select count(*) as numuser from usuarios where usuario = '".$usuario."' ;";

	$resul=mysql_query($sql,$conectar);
	$row = mysql_fetch_array($resul);

	return $row['numuser'];


}

function asignarCiudad($idusuario,$arreglo, $conectar)
{


	$sqleli="DELETE FROM `usuario_ciudad` WHERE `idusuario` =$idusuario   " ;
	$resuleli=mysql_query($sqleli,$conectar);
	for($i=0;$i<count($arreglo);$i++)
	{
		$idciudad=$arreglo[$i];


		$sql = "INSERT INTO usuario_ciudad(idusuario, idciudad)
	VALUES	($idusuario,$idciudad )";
		$resul=mysql_query($sql,$conectar);
	}

	if($sql == false)
	{

//		die('Error: no se vinculó usuario-Ciudad');
		echo "
                <script language='JavaScript'>
                alert('Error:no se asigno la Ciudad');
                </script>";

	}
	else
	{
		return true;
	}



}

?>