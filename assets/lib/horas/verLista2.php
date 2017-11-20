<?php 
	session_name("agenda2");
	session_start();

	include_once('../../../lib/datos.php');
	include_once('../../../lib/funciones.php');
	include_once('../../../lib/isapres/funciones.php');
	include_once('../../../lib/usuarios/funciones.php');
	include_once('../../../lib/querys/ciudades.php');
	include_once('../../../lib/conectar.php');
	
	$conectar = conectar();
    $isapre =  $_POST['isapre'];
    $codisapre= idIsapre($isapre,$conectar) ;

	if($_POST['ciudad']) {
        $idCiudad = $_POST['ciudad'];

    }
	else
	{
		$idCiudad = $_GET['ciudad'];
	}
		
	$sql = mysql_query("
	SELECT 
		p.`id`, 
		DATE(p.`fechaIngreso`) as fechaIngreso, 
		p.`rut`, 
		p.`nombres`, 
		p.`apellidoPaterno`, 
		p.`apellidoMaterno`, 
		p.`fechaVencimientoLic`,
		p.`telefono`, 
		p.`celular`, 
		p.`isapre`,
		p.`idusuario`,
    	`f_nombreusuario`(`idusuario`) AS usuario,
		p.`observacion`
	FROM 
		pacientes_espera p
	WHERE 
		p.`ciudad`=".$idCiudad." AND isapre = ".$isapre."
	ORDER BY 
		p.`fechaIngreso` ASC, 
		p.`id` ASC, 
		p.`apellidoPaterno`, 
		p.`apellidoMaterno`, 
		p.`nombres`				
	", $conectar);
	
	$num = mysql_num_rows($sql);
?>
<!--Ayuda-->
<script type="text/javascript" src="<?php echo $LIB; ?>/boxover.js"></script>
<!--Ayuda-->
<script>
	function confirmar(paciente)
	{
		if(confirm('Est\u00e1  seguro de eliminar este paciente?'))
		{
			window.location.href = '<?php echo $MODULOS; ?>/listaEspera/chk_eliminarPaciente.php?id='+paciente+'&ciudad=<?php echo $idCiudad; ?>';
		}
	}	
</script>

<link href="../../templates/defecto/estilos.css" rel="stylesheet" type="text/css">
<br />
<table width="90%" border="0" align="center" cellpadding="0" cellspacing="0" class="bordeTabla1">
    <input type="hidden" id="isapre" name="isapre" value="<?php echo $isapre;?>">

    <tr>
		<td height="211">
            <form id="form1" name="form1" method="post" action="verLista2.php">
			<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
				<tr>
					<td height="44" align="center" valign="top" class="titulo2">Lista de Espera <?php echo nombreCiudad($idCiudad, $conectar); ?></td>
				</tr>
				<tr>
					<td align="left"><table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
						<tr>
							<td height="30" colspan="3" align="center" class="letraDocumento"><?php include_once('../mensajesTop.php'); ?></td>
							</tr>
						<tr>
							<td width="24%" height="30" align="left" class="letraDocumento">
							<?php 
							if($num != 0)
							{
								?>
								<label onclick="window.location.href='ascender.php?ciudad=<?php echo $idCiudad; ?>&isapre=<?php echo $isapre; ?>'" style="cursor:pointer;">
								<img src="<?php echo $IMAGENES2; ?>/arrow_up.png" width="16" height="16" alt="ascender" />Ascender a horario
								</label>
								<?php 
							}
							?>
							</td>
							<td width="42%" align="left" class="letraDocumento"><a href="verLista2Excel.php?ciudad=<?php echo $idCiudad; ?>" class="letraDocumento"><img src="../../templates/defecto/imagenes/excel.png" width="16" height="16" border="0" /> Exportar lista</a></td>
							<td width="34%" align="right" class="letraDocumento"><a href="ficha.php?ciudad=<?php echo $idCiudad; ?>" class="letraDocumento"><img src="<?php echo $IMAGENES2 ?>/add.png" width="16" height="16" border="0" />Agregar paciente</a></td>
						</tr>
					</table></td>
				</tr>
				<tr>
					<td height="37" align="left"><table width="95%" border="0" align="center" cellpadding="0" cellspacing="0" class="borde_tabla" id="cambio_color" style="border-collapse:collapse;">
						<tr>
							<td width="3%" style="border:none; background:none;">&nbsp;</td>
							<td width="37%" align="center" bgcolor="#9FCFFF" class="tituloTablas">Paciente</td>
							<td width="14%" align="center" bgcolor="#9FCFFF" class="tituloTablas">F. Venc. Lic</td>
							<td width="14%" align="center" bgcolor="#9FCFFF" class="tituloTablas">Fecha ingreso</td>
							<td width="8%" align="center" bgcolor="#9FCFFF" class="tituloTablas">RUT</td>
							<td width="11%" align="center" bgcolor="#9FCFFF" class="tituloTablas">Tel&eacute;fono</td>
							<td width="13%" align="center" bgcolor="#9FCFFF" class="tituloTablas">Isapre</td>
                            <td width="13%" align="center" bgcolor="#9FCFFF" class="tituloTablas">Ingresado Por</td>
						</tr>
						<?php 
						
						while($row = mysql_fetch_array($sql))
						{
							//MUESTRO LOS DATOS S�LO SI ES DE LA ISAPRE
							
							if(
                                (tipoUsuario($_SESSION['idUsuario'], $conectar) == 'isapre' && isapreUsuario($_SESSION['idUsuario'], $conectar) == $row['isapre']) || tipoUsuario($_SESSION['idUsuario'], $conectar) != 'isapre')
							{
									
								$idPaciente = $row['id'];
								$fechaVencimientoLic = VueltaFecha($row['fechaVencimientoLic']);
								$fechaIngreso = VueltaFecha($row['fechaIngreso']);
								$nombrePaciente = $row['apellidoPaterno'].' '.$row['apellidoMaterno'].', '.$row['nombres'];
								$rut = PonerPunto($row['rut']).'-'.DigitoVerificador($row['rut']);
								$telefono = $row['telefono'];
								$celular = $row['celular'];
                                $usuario = $row['usuario'];
                                $idusuario= $row['idusuario'];
								$isapre = nombreIsapre($row['isapre'], $conectar);
								$observacion = $row['observacion'];
								?>
								<tr title="header=[Observaci&oacute;n] body=[<?php echo $observacion; ?>]">
									<td height="23" align="center"><img src="<?php echo $IMAGENES2; ?>/eliminar.png" width="16" height="16" alt="eliminar" title="header=[Eliminar] body=[]" onclick="confirmar(<?php echo $idPaciente; ?>);" style="cursor:pointer;"/></td>
									<td class="letraDocumento" style="padding-left:5px;"><?php echo $nombrePaciente; ?></td>
									<td align="center" class="letraDocumento"><?php echo $fechaVencimientoLic; ?></td>
									<td align="center" class="letraDocumento"><?php echo $fechaIngreso; ?></td>
									<td class="letraDocumento" style="padding-left:5px;"><?php echo $rut; ?></td>
									<td class="letraDocumento" style="padding-left:5px;"><?php echo $telefono.' '.$celular; ?></td>
									<td class="letraDocumento" style="padding-left:5px;"><?php echo $isapre; ?></td>
                                    <td class="letraDocumento" style="padding-left:5px;"><?php echo $usuario; ?></td>
								</tr>
								<?php 
							}
							else
							{
								?>
								<tr title="header=[Observaci&oacute;n] body=[<?php echo $observacion; ?>]">
									<td height="23" align="center" bgcolor="#ffff99">&nbsp;</td>
									<td bgcolor="#ffff99" class="letraDocumento" style="padding-left:5px;">&nbsp;</td>
									<td align="center" bgcolor="#ffff99" class="letraDocumento">&nbsp;</td>
									<td align="center" bgcolor="#ffff99" class="letraDocumento">&nbsp;</td>
									<td bgcolor="#ffff99" class="letraDocumento" style="padding-left:5px;">&nbsp;</td>
									<td bgcolor="#ffff99" class="letraDocumento" style="padding-left:5px;">&nbsp;</td>
									<td bgcolor="#ffff99" class="letraDocumento" style="padding-left:5px;">&nbsp;</td>
								</tr>
								<?php 
							}
						}
						?>
					</table></td>
					</tr>
				<tr>
					<td height="37" align="center" class="letraDocumento">&nbsp;</td>
					</tr>
			</table>

		</form></td>
	</tr>
</table>
