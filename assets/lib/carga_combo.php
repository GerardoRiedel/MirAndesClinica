<?php
/**
 * Created by PhpStorm.
 * User: llopez
 * Date: 16/03/2015
 * Time: 13:47
 */
include('datos.php');
include('funciones.php');

$tabla =$_POST['tabla'] ;


$enlace = conectar();
$sql = "select id,ciudad from";
$sql .=$tabla;
$sql .="ORDER BY 2 ASC";
$res = mysql_query($sql,$enlace) or die (mysql_error());

while($fila = mysql_fetch_assoc($res)){

    $opciones.='<option value="'.$fila["id"].'">'.$fila["ciudad"].'</option>';
}
echo $opciones ;
mysql_close($enlace);
?>