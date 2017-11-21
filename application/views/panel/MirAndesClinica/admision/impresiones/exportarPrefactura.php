<?php 
    IF(!empty($datosApo[0])){
            $apoNombre      = $datosApo[0]->nombres;
            $apoApePat      = $datosApo[0]->apellidoPaterno;
            $apoApeMat      = $datosApo[0]->apellidoMaterno;
    }
    ELSEIF(!empty($datosApo[1])){
            $apoNombre      = $datosApo[1]->nombres;
            $apoApePat      = $datosApo[1]->apellidoPaterno;
            $apoApeMat      = $datosApo[1]->apellidoMaterno;
    }
    ELSE {
            $apoRut ='';
            $apoNombre ='';
            $apoApePat ='';
            $apoApeMat ='';
    }
    ?>

<style>
    .fucsia {color: #B404AE;}
    table {
        font-family: arial;
        border-collapse:separate;
        border:solid black 1px;
        border-radius:6px;
        -moz-border-radius:6px;
    }
    td{
        border-left:solid black 1px;
        border-top:solid black 1px;
    }
    td:first-child, th:first-child {
        border-left: none;
    }
    
</style>

<div style="page-break-after: always; display:none"  id="exportar" >
            <div class="col-lg-12" align="left" style="margin-left: 40px">
                <img src="<?php echo base_url();?>../assets/img/mirAndes.png" class="logo">
            </div>
        <blockquote>
            
            <div style="margin-top:-80px" align="right">
                <h5>FECHA PREFACTURA: 
                    <?php 
                        $fecha  = new DateTime($prefacturas[0]->preFechaRegistro);
                        echo date_format($fecha,"d/m/Y");
                
                    ?>
                </h5>
            </div>
            <div align="center">
                <h1 class="fucsia" >PREFACTURA CE <?php IF($prefacturas[0]->preGes === '2')echo 'LE '; echo $prefacturas[0]->preNPrefactura.'/'.date('y');?></h1>
            </div>
            <div>
                <table style="font-size:13px !important;width: 670px;border:1px solid black">
                    <tr>
                        <td colspan="2" style="border-left:none;border-right:none;border-top:none" align="center"><b>PRESTADOR</b></td>
                    </tr>
                    <tr>
                        <td style="border-left:none;border-right:none;border-top:none;width:50px">Centro:</td>
                        <td style="border-left:none;border-right:none;border-top:none" align="center">Centro de Atención Médico Psiquiátrica Integral SPA</td>
                    </tr>
                    <tr>
                        <td style="border:none">RUT:</td>
                        <td style="border:none" align="center">76.262.968 - 2</td>
                    </tr>
                </table>
            </div>
            
            <br><br>
            
            <div>
                <table style="font-size:13px !important;width: 670px;border:1px solid black">
                    <tr>
                        <td colspan="2" style="border-left:none;border-right:none;border-top:none" align="center"><b>USUARIO/A BENEFICIARIO/A</b></td>
                    </tr>
                    <tr>
                        <td style="border-left:none;border-right:none;border-top:none;width:150px">Apellido Paterno:</td>
                        <td style="border-left:none;border-right:none;border-top:none"><?php echo ' '.strtoupper($datos->apellidoPaterno);?></td>
                    </tr>
                    <tr>
                        <td style="border-left:none;border-right:none;border-top:none">Apellido Materno:</td>
                        <td style="border-left:none;border-right:none;border-top:none"><?php echo ' '.strtoupper($datos->apellidoMaterno);?></td>
                    </tr>
                    <tr>
                        <td style="border-left:none;border-right:none;border-top:none">Nombres:</td>
                        <td style="border-left:none;border-right:none;border-top:none"><?php echo ' '.strtoupper($datos->nombres);?></td>
                    </tr>
                    <tr>
                        <td style="border:none">RUT:</td>
                        <td style="border:none"><?php echo ' '. formatearRut($datos->rut);?></td>
                    </tr>
                </table>
            </div>
            
            <br><br>
            
            <div>
                <table style="font-size:13px !important;width: 670px;border:1px solid black">
                    <tr>
                        <td style="border-left:none;border-right:none;border-top:none;width:150px">ISAPRE:</td>
                        <td style="border-left:none;border-right:none;border-top:none"><?php echo ' '.strtoupper($datos->isapreNombre);?></td>
                    </tr>
                    <tr>
                        <td style="border-left:none;border-right:none;border-top:none">Apellido Paterno:</td>
                        <td style="border-left:none;border-right:none;border-top:none"><?php echo ' '.strtoupper($apoApePat);?></td>
                    </tr>
                    <tr>
                        <td style="border-left:none;border-right:none;border-top:none">Apellido Materno:</td>
                        <td style="border-left:none;border-right:none;border-top:none"><?php echo ' '.strtoupper($apoApeMat);?></td>
                    </tr>
                    <tr>
                        <td style="border-left:none;border-right:none;border-top:none">Nombres:</td>
                        <td style="border-left:none;border-right:none;border-top:none"><?php echo ' '.strtoupper($apoNombre);?></td>
                    </tr>
                    <tr>
                        <td style="border:none">RUT:</td>
                        <td style="border:none"><?php IF(!empty($datos->rutTitular)) echo ' '. formatearRut($datos->rutTitular);?></td>
                    </tr>
                </table>
            </div>
            <br><br>
            
            <div>
                <table style="font-size:13px !important;width: 670px;border:1px solid black">
                    <tr>
                        <td colspan="2" style="border-left:none;border-top:none;border-right:none;" align="center"><b>PERIODO DE HOSPITALIZACIÓN</b></td>
                    </tr>
                    
                    <tr>
                        <td style="border-left:none;border-top:none;border-right:none;width:150px">Fecha Ingreso:</td>
                        <td style="border-left:none;border-top:none;border-right:none;" align="left"><?php $fecha = new DateTime($datos->fechaIngreso);echo $fecha->format('d-m-Y');?></td>
                    </tr>
                    <tr>
                        <td style="border:none;"><?php IF(empty($datos->fechaSalidaReal) || $datos->fechaSalidaReal ==='0000-00-00')echo 'Fecha';ELSE echo 'Fecha Alta';?>:</td>
                        <td style="border:none;" align="left"><?php IF(empty($datos->fechaSalidaReal) || $datos->fechaSalidaReal ==='0000-00-00'){$fechaD = date('Y-m-d');echo date('d-m-Y');} ELSE {$fechaD = new DateTime($datos->fechaSalidaReal); echo $fechaD->format('d-m-Y');$fechaD=$fechaD->format('d-m-Y');}?></td>
                    </tr>
                </table>
            </div>
            <br><br>
            
            
            
            <div>
                <table style="font-size:13px !important;width: 670px;border:1px solid black">
                    <tr>
                        <td colspan="2" style="border-right: none; border-left:none; border-top:none" align="center"><b>DETALLE DE FACTURACIÓN</b></td>
                    </tr>
                    <tr>
                        <td style="border-right: none; border-left:none; border-top:none;width:150px">N° Días Hospitalización:</td>
                        <td style="border-right: none; border-left:none; border-top:none; font-size:15px" align="right"><b>
                            <?php 
                            $fechaSalida    = new DateTime($datos->fechaSalidaReal.$datos->horaSalidaReal);
                            $horaSalida     = $fechaSalida->format('H');
                            $fechaSalida    = $fechaSalida->format('Y-m-d');
                            //die($horaSalida);
                            IF($horaSalida >= 12){
                                $mas = 1;
                            }
                            ELSE{$mas = 0;
                            }
                    
                                $fechaD = new DateTime($fechaD);
                                $fecha  = new DateTime(date($datos->fechaIngreso));
                                $interval = $fechaD->diff($fecha);
                                 //die('sdas'.$interval.'asd');
                                $dias = $interval->format('%a');
                                $dias = $dias+$mas;
                               // die($dias.'s');
                                echo $dias.' días';
                                //echo $interval->format('%a días');
                            ?></b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        </td>
                    </tr>
                    <tr>
                        <td style="border-right: none; border-left:none; border-top:none">Valor Día Cama sin IVA:</td>
                        <td style="border-right: none; border-left:none; border-top:none; font-size:15px" align="right"><b>59.488</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                    </tr>
                    <tr>
                        <td style="border-right: none; border-left:none; border-top:none">1. Día Cama:</td>
                        <td style="border-right: none; border-left:none; border-top:none; font-size:15px" align="right"><b><?php echo $dias*59488 ;?></b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                    </tr>
                    <tr>
                        <td style="border-right: none; border-left:none; border-top:none">2. Cuidados Personales:</td>
                        <td style="border-right: none; border-left:none; border-top:none; font-size:15px" align="right"><b><?php IF(!empty($cuidados))echo $cuidados; ELSE {$cuidados=0;echo '-';}?></b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                    </tr>
                    <tr>
                        <td style="border-right: none; border-left:none; border-top:none">3. Examenes:</td>
                        <td style="border-right: none; border-left:none; border-top:none; font-size:15px" align="right"><b>
                            <?php 
                                $insumos = 0;
                                IF(!empty($insumosAsignados)){
                                    FOREACH($insumosAsignados as $ins){
                                        $insumos += $ins->insValor;
                                    }
                                    echo $insumos;
                                }ELSE{echo '-';}
                                
                            ?>
                            </b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                    </tr>
                    <tr>
                        <td style="border-right: none; border-left:none; border-top:none">Sub Total sin IVA</td>
                        <td style="border-right: none; border-left:none; border-top:none; font-size:15px" align="right"><b><?php $total=($dias*59488)+$insumos+$cuidados; echo $total;?></b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                    </tr>
                    <tr>
                        <td style="border:none">IVA 19%</td>
                        <td style="border:none; font-size:15px" align="right"><b><?php $iva= round($total*0.19);  echo $iva;?></b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                    </tr>
                </table>
            </div>
            <br><br>
            <div>
                <table style="font-size:13px !important;width: 670px;border:1px solid black">
                    <tr>
                        <td style="border:none; width:150px; font-size:15px" align="center"><b>Total Cuenta Clínica</b></td>
                        <td style="border:none; font-size:17px" align="center"><b><?php $total=($total+$iva);  echo '$ '.$total;?></b></td>
                    </tr>
                </table>
            </div>
            <div>
                <table style="font-size:9px !important;width: 1300px;border:none">
                    <tr>
                        <td colspan="2" style="border:none; " align="center">Clínica Mirandes SpA. Salvador 726, Providencia. Fono (562)26119540. Rut: 76.262.968-2</td>
                    </tr>
                </table>
            </div>
            
        </blockquote>
</div>
<?php

/**
 * Metodo getDiasHabiles
 * 
 * Permite devolver un arreglo con los dias habiles
 * entre el rango de fechas dado excluyendo los
 * dias feriados dados (Si existen)
 * 
 * @param string $fechainicio Fecha de inicio en formato Y-m-d
 * @param string $fechafin Fecha de fin en formato Y-m-d
 * @param array $diasferiados Arreglo de dias feriados en formato Y-m-d
 * @return array $diashabiles Arreglo definitivo de dias habiles
 */
function getDiasHabiles($fechainicio, $fechafin, $diasferiados = array()) {
	// Convirtiendo en timestamp las fechas
	$fechainicio = strtotime($fechainicio);
	$fechafin = strtotime($fechafin);
	
	// Incremento en 1 dia
	$diainc = 24*60*60;
	$diasferiados = array(
       //FORMATO Y-m-d   
        '2018-01-01', // Año Nuevo (irrenunciable) 
        '2017-04-14', // Viernes Santo (feriado religioso) 
        '2017-04-19', // Censo
        '2017-05-01', // Día Nacional del Trabajo (irrenunciable) 
        '2017-05-21', // Día de las Glorias Navales 
        '2017-06-26', // San Pedro y San Pablo (feriado religioso) 
        '2017-07-16', // Virgen del Carmen (feriado religioso) 
        '2017-08-15', // Asunción de la Virgen (feriado religioso) 
        '19-9', // Dia Festivo De Prueba EN EL EJEMPLO <-----
        '12-10', // Aniversario del Descubrimiento de América 
        '31-10', // Día Nacional de las Iglesias Evangélicas y Protestantes (feriado religioso) 
        '1-11', // Día de Todos los Santos (feriado religioso) 
        '8-12', // Inmaculada Concepción de la Virgen (feriado religioso) 
        '13-12', // elecciones presidencial y parlamentarias (puede que se traslade al domingo 13) 
        '25-12', // Natividad del Señor (feriado religioso) (irrenunciable) 
        );
	// Arreglo de dias habiles, inicianlizacion
	$diashabiles = array();
	$sumatoria=0;
	// Se recorre desde la fecha de inicio a la fecha fin, incrementando en 1 dia
	for ($midia = $fechainicio; $midia <= $fechafin; $midia += $diainc) {
		// Si el dia indicado, no es sabado o domingo es habil
		if (!in_array(date('N', $midia), array(6,7))) { 
			// Si no es un dia feriado entonces es habil
			if (!in_array(date('Y-m-d', $midia), $diasferiados)) {
                                //EL ARRAY MUESTRA EL DÍA
				array_push($diashabiles, date('Y-m-d', $midia));
                                $sumatoria += 1;
			}
		}
                
	}
	
	return $sumatoria;
}
?>



<?php
    function formatearRut( $rut ) {
         while($rut[0] == "0") {
                $rut = substr($rut, 1);
            }
            $factor = 2;
            $suma = 0;
            for($i = strlen($rut) - 1; $i >= 0; $i--) {
                $suma += $factor * $rut[$i];
                $factor = $factor % 7 == 0 ? 2 : $factor + 1;
            }
            $dv = 11 - $suma % 11;
            /* Por alguna razón me daba que 11 % 11 = 11. Esto lo resuelve. */
            $dv = $dv == 11 ? 0 : ($dv == 10 ? "K" : $dv);
            $rut=  $rut . $dv;
    return number_format( substr ( $rut, 0 , -1 ) , 0, "", ".") . '-' . substr ( $rut, strlen($rut) -1 , 1 );
    }
    function RutDv( $rut ) {
         while($rut[0] == "0") {
                $rut = substr($rut, 1);
            }
            $factor = 2;
            $suma = 0;
            for($i = strlen($rut) - 1; $i >= 0; $i--) {
                $suma += $factor * $rut[$i];
                $factor = $factor % 7 == 0 ? 2 : $factor + 1;
            }
            $dv = 11 - $suma % 11;
            /* Por alguna razón me daba que 11 % 11 = 11. Esto lo resuelve. */
            $dv = $dv == 11 ? 0 : ($dv == 10 ? "K" : $dv);
            
    return $dv;
    //return number_format( substr ( $rut, 0 , -1 ) , 0, "", ".") . '-' . substr ( $rut, strlen($rut) -1 , 1 );
    }

    function calculaedad($fecha){
            $date2  = date('Y-m-d');//
            $diff   = abs(strtotime($date2) - strtotime($fecha));
            $years  = floor($diff / (365*60*60*24));
            //$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
            //$days   = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
            return $years;
    }
?>

<script>
    $(document).ready(function(e) {

        //Creamos un Elemento Temporal en forma de enlace
        var tmpElemento = document.createElement('a');
        // obtenemos la informaciÃ³n desde el div que lo contiene en el html
        // Obtenemos la informaciÃ³n de la tabla
        var data_type = 'data:application/vnd.ms-excel';
        var tabla_div = document.getElementById('exportar');
        var tabla_html = tabla_div.outerHTML.replace(/ /g, '%20');
        tmpElemento.href = data_type + ', ' + tabla_html;
        //Asignamos el nombre a nuestro EXCEL
        tmpElemento.download = 'Prefactura.xls';
        // Simulamos el click al elemento creado para descargarlo
        tmpElemento.click();

        //var htmltable= document.getElementById('imprimir');
        //var html = htmltable.outerHTML;
        //window.open('data:application/vnd.ms-excel,' + encodeURIComponent(html));
        window.history.go(-1);
    });

</script>
