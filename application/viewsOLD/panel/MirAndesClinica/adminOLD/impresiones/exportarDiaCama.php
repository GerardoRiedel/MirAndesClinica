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



<div style="page-break-after: always; display:none"  id="exportar" >
 <style>
    td{border:1px solid black}
</style>       

<table style="font-size: 10px">
    <tr>
        <td colspan="3" align="center"><b>ANTECEDENTES DEL PACIENTE</b></td>
    </tr>
    <tr>
        <td>Nombres: <b><?php echo strtoupper($datos->nombres);?></b></td>
        <td>Ap. Paterno: <b><?php echo strtoupper($datos->apellidoPaterno);?></b></td>
        <td>Ap. Materno: <b><?php echo strtoupper($datos->apellidoMaterno);?></b></td>
    </tr>
     <tr>
         <td>Rut: <b><?php echo formatearRut ($datos->rut);?></b></td>
         <td>Fecha de Ingreso: <b><?php 
                                                            $date = new DateTime($datos->fechaIngreso);
                                                            echo date_format($date,'d-m-Y');
                                                            ?></b></td>
        <td></td>
    </tr>
</table>

    <table style="font-size: 10px">
        <thead>
            <tr>
                <td colspan="3"></td>
                <td colspan="10" align="center">DIA CAMA (DC)</td>
                <td colspan="4" align="center">HONORARIOS MEDICOS (HM)</td>
                <!--
                <td></td>
                -->
                <td colspan="3" align="center">Transferencia</td>
            </tr>
            <tr>
                <td style="width: 100px; background-color:#85C1E9"align="center">Nombre de quien<br>realiza el pago</td>
                <td style="width: 100px; background-color:#85C1E9"align="center">Rut de quien<br>realiza el pago</td>
                <td style="width: 100px; background-color:#85C1E9"align="center">Codigo</td>
                <td style="width: 100px; background-color:#85C1E9"align="justify">Glosa</td>
                <td style="width: 100px; background-color:#85C1E9"align="center">Detalle Dia Cama</td>
                <td style="width: 100px; background-color:#85C1E9"align="center">Dias a cancelar</td>
                <td style="width: 100px; background-color:#85C1E9"align="center">Dias Utilizados</td>
                <td style="width: 100px; background-color:#85C1E9"align="center">Fecha de Pago Real<br>(se registra en MirAndes)</td>
                <td style="width: 100px; background-color:#85C1E9"align="center">Valor Unitario Neto</td>
                <td style="width: 100px; background-color:#85C1E9"align="center">IVA</td>
                <td style="width: 100px; background-color:#85C1E9"align="center">Monto Total<br>Unitario con IVA</td>
                <td style="width: 100px; background-color:#85C1E9"align="center">Total Dias Cama</td>
                <td style="width: 100px; background-color:#85C1E9"align="center">Monto Total Utilizado</td>
                <td style="width: 100px; background-color:#F9E79F" align="center">Detalle Honorarios Medicos</td>
                <td style="width: 100px; background-color:#F9E79F" align="center">Cantidad</td>
                <td style="width: 100px; background-color:#F9E79F" align="center">Valor Unitario</td>
                <td style="width: 100px; background-color:#F9E79F" align="center">Total Honorario Medico</td>
                <!--
                <td style="width: 100px">TOTAL DC + HM</td>
                -->
                <td style="width: 100px; background-color:#82E0AA" align="center">Fecha Transferencia</td>
                <td style="width: 100px; background-color:#82E0AA" align="center">Banco</td>
                <td style="width: 100px; background-color:#82E0AA" align="center">Monto</td>
            </tr>
        </thead>
        <tbody>
            <?php $primera = $totalTotal = $totalHono = $totalUtilizado = 0; ?>
            <?php FOREACH ($depositos as $dep){ ?>
            <tr>
                <td><?php echo strtoupper($apoNombre).' '.strtoupper($apoApePat).' '.strtoupper($apoApeMat); ?></td>
                <td><?php echo formatearRut($datos->rutTitular); ?></td>
                <td>0203109</td>
                <td>Dia cama hosp. integral<br>psiquiatria corta estadia</td>
                <td>
                    <?php 
                        IF($dep->depConcepto==='9'){              
                            $dias = $depDescuento/122000; echo $dias; 
                        }
                    ?>
                </td>
                <td>
                    <?php 
                        IF($dep->depConcepto==='9'){
                            $fecha = date($dep->depFechaRegistro);
                            $nuevafecha = strtotime ( '+0 day' , strtotime ( $fecha ) ) ;
                            $nuevafecha = date ( 'd' , $nuevafecha );
                            echo $nuevafecha.' al ';
                            $nuevafecha = strtotime ( '+2 day' , strtotime ( $fecha ) ) ;
                            $nuevafecha = date ( 'd M' , $nuevafecha );
                            echo $nuevafecha;
                        }
                    ?>
                </td>
                <td>
                    <?php 
                        IF($dep->depConcepto==='9'){
                            IF($nuevafecha < date('d Y')){
                                $diasUsados = $dias;
                                echo $dias;
                            }
                            ELSE $diasUsados = 0;
                        }
                    ?>
                </td>
                <td>
                    <?php 
                        IF($dep->depConcepto==='9'){
                            $fecha = date($dep->depFechaRegistro);
                            $nuevafecha = strtotime ( '+0 day' , strtotime ( $fecha ) ) ;
                            $nuevafecha = date ( 'd-M' , $nuevafecha );
                            echo $nuevafecha;

                        }
                    ?>
                </td>
                <td>
                    <?php
                        IF($dep->depConcepto==='9'){
                            $valor = round(12200000/119);
                            echo $valor;
                        }
                    ?>
                </td>
                <td>
                    <?php
                        IF($dep->depConcepto==='9'){
                            $iva = round($valor*0.19);
                            echo $iva;
                        }
                    ?>
                </td>
                <td>
                    <?php 
                        IF($dep->depConcepto==='9'){
                            echo '122000';
                        }
                    ?>
                    
                </td>
                <td>
                    <?php
                        IF($dep->depConcepto==='9'){
                            echo $dias*122000; 
                        }
                    ?>
                </td>
                
                
                <td>
                    <!-- MONTO TOTAL UTILIZADO-->
                    <?php 
                        IF($dep->depConcepto==='9'){
                            echo $diasUsados*122000; 
                            $totalUtilizado += $diasUsados*122000;
                        }
                    ?>
                </td>
                
                
                
                
            <!-- HONORARIOS -->    
                <td align="left">
                    <?php 
                    //DETALLE DIAS HONORARIOS
                        IF($dep->depConcepto==='10'){
                            $hon = $dep->depSuma-89600;
                            $extra = $hon / 57500;
                            IF($extra > 0){
                                $fecha = date($dep->depFechaPrimer);
                                $nuevafecha = strtotime ( '+0 day' , strtotime ( $fecha ) ) ;
                                $mes = date('M', $nuevafecha);
                                $nuevafecha = date ( 'd-' , $nuevafecha );
                                echo $nuevafecha;
                                
                                IF(!empty($dep->depFechaSegundo)){
                                   $fecha = date($dep->depFechaSegundo);
                                   $nuevafecha = strtotime ( '+0 day' , strtotime ( $fecha ) ) ;
                                   $nuevafecha = date ( 'd-' , $nuevafecha );
                                   echo $nuevafecha;    
                                }
                                 IF(!empty($dep->depFechaTercer)){
                                   $fecha = date($dep->depFechaTercer);
                                   $nuevafecha = strtotime ( '+0 day' , strtotime ( $fecha ) ) ;
                                   $nuevafecha = date ( 'd-' , $nuevafecha );
                                   echo $nuevafecha;    
                                }
                                
                                echo $mes;
                                
                            }
                            ELSE {
                                
                                $fecha = date($dep->depFechaPrimer);
                                $nuevafecha = strtotime ( '+0 day' , strtotime ( $fecha ) ) ;
                                $nuevafecha = date ( 'd-M' , $nuevafecha );
                                echo $nuevafecha;
                            }
                        }
                    ?>
                </td>
                <td>
                    <?php 
                    //CANTIDAD HONORARIOS
                        IF($dep->depConcepto==='10'){
                            IF($primera === 0) $hon = $dep->depSuma-89600;
                            ELSE $hon = $dep->depSuma;
                            
                            $extra = $hon / 57500;
                            IF($extra > 0){
                                echo $extra;
                            }
                            ELSE {
                                echo '1';
                            }
                        }
                    ?>
                </td>
                <td>
                    <?php 
                        IF($dep->depConcepto==='10'){
                            IF($primera === 0) echo '89600';
                            ELSE echo '57500';
                        }
                    ?>
                </td>
                <td>
                    <?php 
                    //TOTAL HONORARIOS MEDICO
                        IF($dep->depConcepto==='10'){
                            IF($primera === 0) $hon = $dep->depSuma-89600;
                            ELSE $hon = $dep->depSuma;
                            
                            $extra = $hon / 57500;
                            IF($extra > 0){
                                $honorarios = $extra*57500;
                                echo $honorarios;
                            }
                            ELSE {
                                $honorarios = 89600;
                                echo $honorarios;
                            }
                            $totalHono += $honorarios;
                        }
                    ?>
                </td>
                <!--
                <td>
                    <?php 
                        IF($dep->depConcepto==='10'){
                            IF($primera === 0) $hon = $dep->depSuma-89600;
                            ELSE $hon = $dep->depSuma;
                            
                            $extra = $hon / 57500;
                            IF($extra > 0){
                                echo 'mas';
                            }
                            ELSE {
                                echo '1';
                            }
                        }
                    ?>
                </td>
                
                
                
                
                <!-- TRANSFERENCIA -->
                <td style=" background-color:#82E0AA">
                    <?php 
                                $fecha = date($dep->depFechaRegistro);
                                $nuevafecha = strtotime ( '+0 day' , strtotime ( $fecha ) ) ;
                                $nuevafecha = date ( 'd-m-Y' , $nuevafecha );
                                echo $nuevafecha;
                    ?>
                </td>
                 <td style=" background-color:#82E0AA">
                    <?php 
                        echo $dep->banCtaNombre;
                    ?>
                </td>
                <td style=" background-color:#82E0AA">
                    <?php 
                        IF($dep->depConcepto==='9'){
                            echo $diasUsados*122000; 
                            $totalTotal +=  $diasUsados*122000;
                        }
                        ELSEIF($dep->depConcepto==='10'){
                             IF($primera === 0) $hon = $dep->depSuma-89600;
                            ELSE $hon = $dep->depSuma;
                            
                            $extra = $hon / 57500;
                            IF($extra > 0){
                                echo $extra*57500;
                                $totalTotal +=  $extra*57500;
                            }
                            ELSE {
                                echo $honorarios;
                                $totalTotal +=  $honorarios;
                            }
                            
                            $primera = 1;
                        }
                    ?>
                </td>
            </tr>
            <?php }?>
            <tr>
                <td colspan="12"></td>
                <td style="background-color:#F5B7B1 "><b><?php echo $totalUtilizado;?></b></td>
                <td colspan="3"></td>
                <td style="background-color:#F5B7B1 "><b><?php echo $totalHono;?></b></td>
                <!--
                <td></td>
                -->
                <td colspan="2"></td>
                <td style="background-color:#F5B7B1 "><b><?php echo $totalTotal;?></b></td>
            </tr>
        </tbody>
        
    </table>
    
    
    
    
    
            
        
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
        '2017-05-01', // Dia Nacional del Trabajo (irrenunciable) 
        '2017-05-21', // Dia de las Glorias Navales 
        '2017-06-26', // San Pedro y San Pablo (feriado religioso) 
        '2017-07-16', // Virgen del Carmen (feriado religioso) 
        '2017-08-15', // Asunción de la Virgen (feriado religioso) 
        '19-9', // Dia Festivo De Prueba EN EL EJEMPLO <-----
        '12-10', // Aniversario del Descubrimiento de América 
        '31-10', // Dia Nacional de las Iglesias Evangélicas y Protestantes (feriado religioso) 
        '1-11', // Dia de Todos los Santos (feriado religioso) 
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
        tmpElemento.download = 'Dias Camas.xls';
        // Simulamos el click al elemento creado para descargarlo
        tmpElemento.click();

        //var htmltable= document.getElementById('imprimir');
        //var html = htmltable.outerHTML;
        //window.open('data:application/vnd.ms-excel,' + encodeURIComponent(html));
        window.history.go(-1);
    });

</script>
