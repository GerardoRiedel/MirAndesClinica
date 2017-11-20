<?php


//crearUsuario($tipo, $usuario, $pass, $conectar);


function crearUsuario($tipo, $usuario, $pass,$arreglo, $conectar)
{	
	$existe=existeUsuario($usuario,  $conectar);
	
	if($existe > 0)
	{
	

		

	//	echo 'Error: El usuario ya existe';
		echo " <script language='JavaScript'> 
                alert('Error: El Usuario ya existe ....'); 
                </script>".$arreglo."";
	
		die();
	}
	else
	{
	$sql ="INSERT INTO usuarios (tipo, usuario, pass)
			VALUES('$tipo', '$usuario', '$pass')";
	echo $sql;
	$result= mysql_query($sql,$conectar);
		return mysql_insert_id();
	
	
		
	}
}


function asignarCiudad($idusuario,$arreglo, $conectar)
{	
	for($i=0;$i<count($arreglo);$i++) 
	{
		$idciudad=$arreglo[$i];
		
	
	$sql = "INSERT INTO usuario_ciudad(idusuario, idciudad)
	VALUES	($idusuario,$idciudad )";
	$resul=mysql_query($sql,$conectar);
	}
	
if($sql == false)
	{
		echo $sql;	
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
//		die('Error: no se editó el usuario');
		echo "<script language='JavaScript'>
                alert('Error: no se editó el usuario'); 
                </script>";
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

function nombreUsr($id, $conectar)
{
	$sql = mysql_query("
	SELECT 
		SUBSTR(u.`usuario`,INSTR(u.usuario,'compin'),6) as usuario
	FROM 
		usuarios u
	WHERE 
		u.`id`=$id
	", $conectar);
	
	$row = mysql_fetch_array($sql);
	
	return $row['usuario'];
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
	
	return $row['tipo'];
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




function escompin($id, $conectar) {
    $sql=mysql_query("SELECT INSTR(usuario,'compin') as usuario FROM  `usuarios` u WHERE u.`id`=$id ", $conectar);
    $row = mysql_fetch_array($sql);
    	return $row['usuario'];
    
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
		die('Error: no se cambi� la contrase�a');
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
	
	return $row['pass'];
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
function existeUsuario($usuario,  $conectar)
{
	$sql = "select count(*) as numuser from usuarios where usuario = '".$usuario."' ;";
	echo $sql;
	$resul=mysql_query($sql,$conectar);
	$row = mysql_fetch_array($resul);
	
	return $row['numuser'];
	
	
}
function id_usuarioisapre ($idUsuario,$conectar){

$sql="SELECT`isapre`FROM `usuario_isapre`WHERE usuario = '".$idUsuario."';";
    $resul=mysql_query($sql,$conectar);
    $row = mysql_fetch_array($resul);

    return $row['isapre'];
}
?>