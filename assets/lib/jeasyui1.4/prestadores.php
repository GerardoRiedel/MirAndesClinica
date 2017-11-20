<?php 
	include_once('lib/querys/ciudades.php');
	include_once('lib/isapres/funciones.php');
	include_once('lib/usuarios/funciones.php');
	include_once('lib/informe_entrevista/funciones.php');
	include_once('lib/prestadores/funciones.php');

	$idPrestador = $_GET['id'];
	$fecha = $_GET['fecha'];
	$idusuario=$_SESSION['idUsuario'];
	//para el calendario
	if($fecha != NULL)
	{
		$da = str_replace('-','/',$fecha);
	}
?>
<!--CABECERAS PARA EL CALENDARIO-->
    <script src="<?php echo $LIB; ?>/jscal2/js/jscal2.js"></script>
    <script src="<?php echo $LIB; ?>/jscal2/js/lang/es.js"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo $LIB; ?>/jscal2/css/jscal2.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo $LIB; ?>/jscal2/css/border-radius.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo $LIB; ?>/jscal2/css/steel/steel.css" />
<!--FIN CABECERAS PARA EL CALENDARIO-->

    <style type="text/css">
      .special { background-color: #000; color: #fff; }
    </style>

	<script>
function popUp2(URL) 
		{
			day = new Date();
			id = day.getTime();
			
			eval("page" + id + " = window.open(URL, 'popUp2', 'toolbar=0,scrollbars=1,location=0,statusbar=0,menubar=0,resizable=0,width=800,height=700,left=150,top=50');");
		}
function MM_jumpMenu(targ,selObj,restore){ //v3.0
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}
	</script>


	<link href="../../../templates/defecto/estilos.css" rel="stylesheet" type="text/css" />
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td align="left" style="padding-left:15px;">
		<?php
		if(tipoUsuario($_SESSION['idUsuario'], $conectar) == 'administrador' or tipoUsuario($_SESSION['idUsuario'], $conectar) == 'isapre' or tipoUsuario($_SESSION['idUsuario'], $conectar) == 'secretaria')
		{
		
			?>
			<form id="form1" name="form1" method="post" action="">
				<label><span class="letra7">Ciudad</span><br />
				<select name="ciudad" id="ciudad" onchange="MM_jumpMenu('parent',this,0)">
					<?php 
						$sql = mysql_query("
						SELECT
						    p.`idciudad` AS id
					    , f_ciudad(p.idciudad) AS ciudad
						FROM
					    `usuario_ciudad` p
						WHERE (`idusuario` =".$idusuario.")
						ORDER BY f_ciudad(p.idciudad) ASC;
						", $conectar);	
						
						if($_GET['ciudad'] != NULL)
						{
							?><option value="<?php echo $link; ?>"><?php echo nombreCiudad($_GET['ciudad'], $conectar) ?></option><?php 
						}	
						while($row = mysql_fetch_array($sql))
						{	
							$idCiudad = $row[id];
							$ciudad = $row[ciudad];
							
							$link = $HOME.'/?modulo=agenda&modulo2=prestador&fecha='.$fecha.'&ciudad='.$idCiudad;
							if($idPrestador != NULL)
							{
								$link = $link.'&id='.$idPrestador;
							}
							?><option value="<?php echo $link; ?>"><?php echo $ciudad; ?></option>
							<?php 
						}
					?>
				</select>
				</label>
				<br />
				<br />
				<span class="letra7">Prestador </span><br />
				<label>
				<select name="prestador" id="prestador" onchange="MM_jumpMenu('parent',this,0)">
					<?php
						if($idPrestador != NULL)//Si eligió algún prestador
						{
							?>
							<option value="<?php echo $HOME; ?>/?modulo=agenda&amp;modulo2=prestador&id=<?php echo $idPrestador; ?>'&fecha=<?php 
							
							echo $fecha;  
							
							//Si eligió una ciudad
							if($_GET['ciudad'] != NULL)
							{
								?>&ciudad=<?php 
								echo $_GET['ciudad'];
							}
							?>" selected="selected"><?php echo nombreCompletoPrestadorApellido($idPrestador, $conectar); ?></option>
							<?php
						}
					?>
					
					<option value="<?php echo $HOME; ?>/?modulo=agenda&amp;modulo2=prestador&fecha=<?php 
					echo $fecha; 
					
					//Si eligió una ciudad
					if($_GET['ciudad'] != NULL)
					{
						?>&ciudad=<?php 
						echo $_GET['ciudad'];
					}
					?>">Todos</option>
					
					<?php 
						$sql = mysql_query("
						SELECT 
							p.`id` 
						FROM 
							prestadores p
						WHERE
							p.`activo`='si'
						ORDER BY 
							p.`apellidoPaterno` ASC
						", $conectar);	
						
						while($row = mysql_fetch_array($sql))
						{	
							$prestador = $row[id];
							
							//ISAPRES
							//Muestro sólo los prestadores de la isapre
							if(tipoUsuario($_SESSION['idUsuario'], $conectar) == 'isapre')
							{
								$isapreUsuario = isapreUsuario($_SESSION['idUsuario'], $conectar);

								if(siIsaprePrestador($prestador, $isapreUsuario, $conectar) == false)
								{
									continue;
								}
							}
							?>
							<option value="<?php echo $HOME; ?>/?modulo=agenda&amp;modulo2=prestador&amp;id=<?php echo $row[id]; ?>&fecha=<?php 
							
							echo $fecha; 
							
							//Si eligió una ciudad
							if($_GET['ciudad'] != NULL)
							{
								?>&ciudad=<?php 
								echo $_GET['ciudad'];
							}
							?>"><?php echo nombreCompletoPrestadorApellido($row[id], $conectar); ?></option>
							<?php 
						}
					?>
				</select>
				</label>
			</form>
			<?php 

		}
		
		if(tipoUsuario($_SESSION['idUsuario'], $conectar) == 'prestador')
		{
		
			?>
			<form id="form1" name="form1" method="post" action="">
				<label><span class="letra7">Ciudad</span><br />
				<select name="ciudad" id="ciudad" onchange="MM_jumpMenu('parent',this,0)">
					<?php 
						$sql = mysql_query("
						SELECT
						    p.`idciudad` AS id
					    , f_ciudad(p.idciudad) AS ciudad
						FROM
					    `usuario_ciudad` p
						WHERE (`idusuario` =".$idusuario.")
						ORDER BY f_ciudad(p.idciudad) ASC;
						", $conectar);	
						
						if($_GET['ciudad'] != NULL)
						{
							?><option value="<?php echo $link; ?>"><?php echo nombreCiudad($_GET['ciudad'], $conectar) ?></option><?php 
						}	
						while($row = mysql_fetch_array($sql))
						{	
							$idCiudad = $row[id];
							$ciudad = $row[ciudad];
							
							$link = $HOME.'/?modulo=agenda&modulo2=prestador&fecha='.$fecha.'&ciudad='.$idCiudad;
							if($idPrestador != NULL)
							{
								$link = $link.'&id='.$idPrestador;
							}
							?><option value="<?php echo $link; ?>"><?php echo $ciudad; ?></option>
							<?php 
						}
					?>
				</select>
				</label>
				<br />
			</form>
			<?php 

		}
		
		?>		</td>
	</tr>
	<tr>
		<td height="42" align="center"><br />
			<div style="float: center; margin-bottom: 1em;" id="calendar-container"></div>
		<script type="text/javascript">
      // this handler is designed to work both for onSelect and onTimeChange
      // events.  It updates the input fields according to what's selected in
      // the calendar.
      function updateFields(cal) {
              var date = cal.selection.get();
              if (date) {
                      date = Calendar.intToDate(date);
					window.location = "<?php echo $HOME ?>/?modulo=agenda&modulo2=prestador&id=<?php echo $idPrestador; 
						
						if($_GET['ciudad'] != NULL)
						{
							?>&ciudad=<?php echo $_GET['ciudad'];
							$ciudad = $_GET['ciudad'];
						}
						
					?>&fecha=" + Calendar.printDate(date, "%Y-%m-%d");
					  
              }
      };

      Calendar.setup({
              cont         : "calendar-container",
              onSelect     : updateFields,
			  date		   : '<?php echo str_replace('/','-',$da); ?>',

      });
		</script>
		</td>
	</tr>
		<?php 
		if(tipoUsuario($_SESSION['idUsuario'], $conectar) == 'administrador' or tipoUsuario($_SESSION['idUsuario'], $conectar) == 'secretaria' or tipoUsuario($_SESSION['idUsuario'], $conectar) == 'prestador')
		{
			?>
			<tr>
				<td height="32" align="center" valign="top">
				<tr>
					<td height="22" align="center">
				<?php 

				//Confirmación de los informes Administrador
				if(tipoUsuario($idUsuario, $conectar) == 'administrador')
				{
					$informes = siInformesNoConfirmados($conectar);
					if(count($informes) != NULL){
						$colorTabla = 'tablaRoja';
					}
					else{
						$colorTabla = 'tablaVerde';
					}
					?>
					<table width="159" border="0" align="center" cellpadding="0" cellspacing="0" class="<?php echo $colorTabla; ?>" style="cursor:pointer">
						<tr>
							<td height="25" align="center" onClick="return parent.GB_showCenter('', '<?php echo $MODULOS; ?>/agenda/informesSinConfirmarLista.php?idUsuario=<?php echo $idUsuario; ?>&ciudad=<?php echo nombreCiudad($ciudad, $conectar); ?>', 1000, 950)">
							<?php echo count($informes); ?> informes por confirmar</td>
						</tr>
					</table>
					<?php 
				}elseif(tipoUsuario($idUsuario, $conectar) == 'prestador')
				{
					$prestador = prestadorUsuario($idUsuario, $conectar);

					$informes = siInformesNoConfirmadosPrestador($prestador, $conectar);
					if(count($informes) != NULL){
						$colorTabla = 'tablaRoja';
					}
					else{
						$colorTabla = 'tablaVerde';
					}
					?>
					<table width="159" border="0" align="center" cellpadding="0" cellspacing="0" class="<?php echo $colorTabla; ?>" style="cursor:pointer">
						<tr>
							<td height="25" align="center" onClick="return parent.GB_showCenter('', '<?php echo $MODULOS; ?>/agenda/informesSinConfirmarLista.php?idUsuario=<?php echo $idUsuario; ?>&ciudad=<?php echo nombreCiudad($ciudad, $conectar); ?>', 1000, 950)">
							<?php echo count($informes); ?> informes por confirmar</td>
						</tr>
					</table>
					<?php 
				}
				?><br />
                
					</td>
				</tr>
				</td>
			</tr>
			<tr>
				<td height="32" align="center" valign="top">
					<a href="<?php echo $MODULOS; ?>/agenda/buscadorPeritajes.php" title="Buscar Peritajes" rel="gb_page[500, 450]">
					<input name="Button" type="button" class="boton" value="Buscar Peritajes" style="cursor:pointer;"/>
				</a>				</td>
			</tr>
			<?php
		}
		if(tipoUsuario($_SESSION['idUsuario'], $conectar) == 'administrador' or tipoUsuario($_SESSION['idUsuario'], $conectar) == 'secretaria')
		{
			?>
			<tr>
				<td height="32" align="center" valign="top">
					<a href="<?php echo $MODULOS; ?>/horarios/horarios.php" rel="gb_page[800, 700]">
					<input name="Submit" type="submit" class="boton" value="Horarios" title="header=[Horarios] body=[* Asignar Horarios<br />* Cambiar Horarios<br />* Intercambiar Horarios]" style="cursor:pointer;"/>
					</a>				</td>
			</tr>
			<tr>
				<td height="32" align="center" valign="top"><a href="<?php echo $MODULOS; ?>/listaEspera/main.php" rel="gb_page[800, 700]">
					<input name="Submit2" type="submit" class="boton" value="Lista de Espera" title="header=[Lista de Espera] body=[* Ver Lista&lt;br /&gt;* Agregar Pacientes]" style="cursor:pointer;"/>
				</a></td>
			</tr>
			<?php
		}
		if(tipoUsuario($_SESSION['idUsuario'], $conectar) == 'administrador')
		{
			?>
			<tr>
				<td height="32" align="center" valign="top"><a href="<?php echo $MODULOS; ?>/configuraciones/configuraciones.php" rel="gb_page[700, 550]">
					<input name="Button3" type="button" class="boton" value="Configuraciones" title="header=[Configuraciones] body=[* Usuarios<br />* Ciudades<br />* UF Mensual<br />* Valor Peritaje<br />* Cobro Prestadores]" style="cursor:pointer;"/>
				</a></td>
	  </tr>
			<tr>
				<td height="32" align="center" valign="top"><a href="<?php echo $MODULOS; ?>/facturacion/main.php" rel="gb_page[900, 550]">
					<input name="Button2" type="button" class="boton" value="Facturaci&oacute;n" style="cursor:pointer;"/>
				</a></td>
			</tr>
			<tr>
				<td height="32" align="center" valign="top"><a href="<?php echo $MODULOS; ?>/informes/informes.php" rel="gb_page[600, 650]">
					<input name="Button4" type="button" class="boton" value="Informes" title="header=[Informes] body=[* Nº Peritajes<br />* Ingreso dinero<br />* Utilidades<br />* Encuestas<br />* Asistencia<br />* Historiales]" style="cursor:pointer;"/>
				</a></td>
			</tr>
			<tr>
				<td height="32" align="center" valign="top"><a href="<?php echo $MODULOS; ?>/configuraciones/configuraciones.php" rel="gb_page[500, 450]">
					</a><a href="<?php echo $HOME; ?>/backup/backup.php" rel="gb_page[500, 450]">
					<input name="Button22" type="button" class="boton" value="Respaldar" title="header=[Respaldar] body=[Respalde la base de datos de la agenda de peritajes. Hágalo periódicamente.]" style="cursor:pointer;"/>
					</a></td>
	  </tr>
			<?php
		}
		?>
</table>
