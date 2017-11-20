<?php 
	session_name("agenda2");
	session_start();

	include_once('../../../lib/datos.php');
	include_once('../../../lib/funciones.php');
	include_once('../../../lib/conectar.php');
	
	$conectar = conectar();
	
?><head>
    <script type='text/javascript' src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){

            // cada vez que se cambia el valor del combo
            $("#ciudad").change(function() {

                // obtenemos el valor seleccionado
                var ciudad = $(this).val();

                // si es 0, no es un país
                if(ciudad > 0)
                {
                    //creamos un objeto JSON
                    var datos = {
                        id : $(this).val()
                    };

                    // utilizamos la función post, para hacer una llamada AJAX
                    $.post("genera_select.php", datos, function(isapres) {

                        // obtenemos el combo de ciudades
                        var $comboisapre = $("#isapre");

                        // lo vaciamos
                        $comboisapre.empty();
                        var json_string = JSON.stringify(isapres);
                        var obj = $.parseJSON(json_string);

                        /*asignar los valores obtenidos del objeto
                         * a cada unos de losc controlres deseados
                         * en el formulario*/
                        $('#idisapre').html(obj.idisapre);

                        // iteramos a través del arreglo de ciudades
                        $.each(isapres, function(index, isapre) {

                            // agregamos opciones al combo
                            $comboisapre.append("<option value=" + isapre.id + ">" + isapre.nombre + "</option>");
                        });
                    }, 'json');
                }
                else
                {
                    // limpiamos el combo e indicamos que se seleccione un país
                    var $comboisapre = $("#isapre");
                    $comboisapre.empty();
                    $comboisapre.append("<option>Seleccione una Ciudad...!</option>");
                }
            });
        });


    </script>
    <script type="text/javascript">
        $(document).ready(function(){

            $("select[name=isapre]").change(function(){
                var id = $('select[name=isapre]').val();
                 // var id = $("#isapre").find(':selected').val();
                $('input[name=idisapre').val($(this).val());
            });


        });

    </script>



<link href="../../templates/defecto/estilos.css" rel="stylesheet" type="text/css">
</head>
<?php include('../../../lib/mensajes.php'); ?>

<br />
<table width="90%" border="0" align="center" cellpadding="0" cellspacing="0" class="bordeTabla1">
	<tr>
		<td height="211"><form id="form1" name="form1" method="post" action="verLista2.php">
			<table width="514" border="0" align="center" cellpadding="0" cellspacing="0">
				<tr>
					<td height="44" colspan="2" align="center" valign="top" class="titulo2">Lista de Espera</td>
				</tr>
				<tr>
					<td width="201" height="37" align="right" class="letraDocumento">Ciudad:</td>
					<td width="313" align="left" style="padding-left:10px;">
                        <select name="ciudad" id="ciudad">
						<?php 
						$sql = mysql_query("
						SELECT 
							p.`id`, 
							p.`ciudad` 
						FROM 
							ciudades p
						WHERE p.`id` != '16'
						and p.`id` != '23'
						and p.`id` != '14'				
						and p.`id` != '22'										
						ORDER BY 
							p.`ciudad` ASC
						", $conectar);

						if($_GET['ciudad'] != NULL)
						{
							?>
						<option value="<?php echo $_GET['ciudad']; ?>" onclick="window.location.href='<?php echo $link; ?>'"><?php echo nombreCiudad($_GET['ciudad'], $conectar) ?></option>
						<?php 
						}	
						while($row = mysql_fetch_array($sql))
						{	
							$idCiudad = $row['id'];
							$ciudad = $row['ciudad'];
                          	$sql2 = mysql_query("
							SELECT 
								p.`id` 
							FROM 
								pacientes_espera p
							WHERE 
								p.`ciudad`=".$idCiudad."				
							", $conectar);
							
							$num = mysql_num_rows($sql2);


                            ?>
							<option value="<?php echo $idCiudad; ?>"><?php echo $ciudad; ?> (<?php echo $num; ?>)</option>
							<?php 
						}
					?>
					</select>
				  <input type="hidden" name="valor" id="valor">
                    </td>
				</tr>
				<tr>
					<td height="37"  align="right" class="letraDocumento">Isapre</td>
					<td width="313" align="left" style="padding-left:10px;">
                    <select name="isapre" id="isapre">
					  </select>
                     </td>
				</tr>
				<tr>
				  <td height="37" colspan="2" align="center" class="letraDocumento">
                      <input name="button" type="submit" class="boton" id="button" value="Siguiente" /></td>
			  </tr>
			</table>
	  </form></td>
	</tr>
</table>
