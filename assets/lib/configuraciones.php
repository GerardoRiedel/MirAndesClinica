<?php 
	session_name("agenda2");
session_start();
	
	include('../../../lib/prestadores/funciones.php');
	include('../../../lib/usuarios/funciones.php');
	include('../../../lib/horas/funciones.php');
	include('../../../lib/querys/comunas.php');
	include('../../../lib/funciones.php');
	include('../../../lib/datos.php');
	include('../../../lib/conectar.php');
	
	$conectar = conectar();
	
?>
	
<link href="../../../contenido/templates/defecto/estilos.css" rel="stylesheet" type="text/css">
<br />
<table width="300" border="0" align="center" cellpadding="0" cellspacing="0">
	<tr>
		<td align="center" class="titulo3">Seleccione la opci&oacute;n</td>
	</tr>
</table>
<br />
	<table width="400" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" class="bordeTabla1">
		<tr align="right">
			<td width="100%" align="center" style="padding-left:10px;">
				<br />
					<input name="Submit" type="submit" class="boton" value="Usuarios" onclick="window.location.href='../usuarios/listado.php'"/>
					<br />
					<br />
				<input name="Submit" type="submit" class="boton" value="Prestadores" onclick="window.location.href='../agenda/maestros/prestadores/prestadores.php'"/>
				<br />
				<br />
				<input name="Submit2" type="submit" class="boton" value="Ciudades" onclick="window.location.href='ciudades.php'"/>
				<br />
				<br />
				<input name="Submit2" type="submit" class="boton" value="UF Mensual" onclick="window.location.href='uf.php'"/>
				<br />
			<br />
			<input name="Submit3" type="submit" class="boton" value="Valor Peritaje" onclick="window.location.href='valorPeritaje.php'"/>
			<br />
			<br />
			<input name="Submit" type="submit" class="boton" value="Cobro Prestadores" onclick="window.location.href='../contabilidad/cobroPrestadores.php'"/>
			<br />
			<br />
			</td>
		</tr>
</table>
<br />