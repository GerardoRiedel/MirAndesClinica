<?php 
	if($_SESSION['msj'])
	{
?>
		<table width="60%" border="0" align="center" cellpadding="0" cellspacing="0" class="tabla_mensajes">
			<tr>
				<td height="23" align="center" valign="middle" class="letra2"><?php echo $_SESSION['msj']; ?> </td>
			</tr>
		</table>
		<br />
<?php 
	}

	$_SESSION['msj'] = NULL;
?>
