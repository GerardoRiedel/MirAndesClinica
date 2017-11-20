<?php
/**
 * Created by PhpStorm.
 * User: llopez
 * Date: 16/03/2015
 * Time: 13:47
 */
include('../ lib/datos.php');
include('../lib/funciones.php');

$tabla =$_POST['tabla'] ;
$value = $_POST['value'] ;


$enlace = conectar();
$sql = "select * from";
$sql .=$tabla;
$sql .="ORDER BY 2 ASC";
$res = mysql_query($sql,$enlace) or die (mysql_error());
echo "<select name='$tabla' id='$value'>";
echo "<option value='x'>Seleccione..</option>" ;
while($fila = mysql_fetch_assoc($res)){
    echo  utf8_encode("<option value='$fila[$value]'> $fila[$opt1]</option>");
}
echo "</select>";
mysql_close($enlace);