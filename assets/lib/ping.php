<?php 
session_name("agenda2");
session_start();

if($_SESSION['idUsuario'] == NULL)
{
	?><div id="statusError">Status: Error de comunicación</div><?php
}
else
{
	?><div id="statusOk">Status: OK</div><?php
}
?>

