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
            <?php $primera = $totalTotal = $totalHono = $totalUtilizado = $totalInsumos = 0; ?>
            <?php $valorCama = $valorCama->parValor; ?>
            <?php $valorConsulta = $valorConsulta->parValor; ?>
            <?php FOREACH ($depositos as $dep){ ?>
            <tr>
                <td><?php echo strtoupper($apoNombre).' '.strtoupper($apoApePat).' '.strtoupper($apoApeMat); ?></td>
                <td><?php echo formatearRut($datos->rutTitular); ?></td>
                <td>0203109</td>
                <td>Dia cama hosp. integral<br>psiquiatria corta estadia</td>
                <td>
                    <?php 
                    //DETALLE DIA CAMA
                        IF($dep->depConcepto==='9'){      
                            //echo $dep->depSuma/$valorCama;
                            $dias = substr ($dep->depSuma/$valorCama,0,1);
                            echo $dias; 
                            //echo $depDescuento.'-';
                            //$dias = $depDescuento/122500; echo $dias; 
                        }
                    ?>
                </td>
                <td>
                    <?php 
                    //DIAS A CANCELAR
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
                    //DIAS UTILIZADOS
                        IF($dep->depConcepto==='9'){
                            IF($nuevafecha <= date('d Y')){
                                $diasUsados = $dias;
                                echo $diasUsados;
                            }
                            ELSE $diasUsados = 0;
                        }
                    ?>
                </td>
                <td>
                    <?php 
                    //FECHA DE PAGO REAL
                        IF($dep->depConcepto==='9'){
                            $fecha = new datetime($dep->depFechaRegistro);
                            echo date_format ( $fecha, 'd-M' );
                        }
                    ?>
                </td>
                <td>
                    <?php
                    //VALOR UNITARIO NETO
                        IF($dep->depConcepto==='9'){
                            $valor = $valorCama-round($valorCama*0.19);
                            echo $valor;
                        }
                    ?>
                </td>
                <td>
                    <?php
                    //IVA
                        IF($dep->depConcepto==='9'){
                            $iva = round($valorCama*0.19);
                            echo $iva;
                        }
                    ?>
                </td>
                <td>
                    <?php 
                    //MONTO TOTAL UNITARIO CON IVA
                        IF($dep->depConcepto==='9'){
                            echo $valorCama;
                        }
                    ?>
                    
                </td>
                <td>
                    <?php
                    //TOTAL DIAS CAMA
                        IF($dep->depConcepto==='9'){
                            echo $dias*$valorCama; 
                        }
                    ?>
                </td>
                
                
                <td>
                    <!-- MONTO TOTAL UTILIZADO-->
                    <?php 
                        IF($dep->depConcepto==='9'){
                            echo $diasUsados*$valorCama; 
                            $totalUtilizado += $diasUsados*$valorCama;
                        }
                    ?>
                </td>
                
                
                
                
            <!-- HONORARIOS -->    
                <td align="left">
                    <?php 
                    //DETALLE DIAS HONORARIOS
                        IF($dep->depConcepto==='10'){
                            $hon = $dep->depSuma-89600;
                            $extra = $hon / $valorConsulta;
                            IF($extra > 0){
                                IF(!empty($dep->depFechaPrimer) && $dep->depFechaPrimer !== '0000-00-00'){
                                    $fecha = new datetime($dep->depFechaPrimer);
                                    $mes = date_format($fecha,'M');
                                    echo date_format ($fecha, 'd-' );
                                    //echo $nuevafecha;

                                    IF(!empty($dep->depFechaSegundo) && $dep->depFechaSegundo != '0000-00-00'){
                                       $fecha = new datetime($dep->depFechaSegundo);
                                       echo date_format ( $fecha,'d-'  );
                                       //echo $nuevafecha;    
                                    }
                                     IF(!empty($dep->depFechaTercer) && $dep->depFechaTercer != '0000-00-00'){
                                       $fecha = new datetime($dep->depFechaTercer);
                                       echo date_format ($fecha, 'd-');
                                       //echo $nuevafecha;    
                                    }
                                    echo $mes;
                                }
                                
                            }
                            ELSE IF(!empty($dep->depFechaPrimer) && $dep->depFechaPrimer !== '0000-00-00'){
                                $fecha = new datetime($dep->depFechaPrimer);
                                echo date_format ($fecha, 'd-M');
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
                            
                            $extra = substr ($hon/$valorConsulta,0,1);
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
                    //VALOR UNITARIO
                        IF($dep->depConcepto==='10'){
                            IF($primera === 0) echo '89600';
                            ELSE echo $valorConsulta;
                        }
                    ?>
                </td>
                <td>
                    <?php 
                    //TOTAL HONORARIOS MEDICO
                        IF($dep->depConcepto==='10'){
                            IF($primera === 0) $hon = $dep->depSuma-89600;
                            ELSE $hon = $dep->depSuma;
                            
                            $extra = substr ($hon/$valorConsulta,0,1);
                            IF($extra > 0){
                                $honorarios = $extra*$valorConsulta;
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
                                $fecha = new datetime($dep->depFechaRegistro);
                                echo date_format ($fecha, 'd-m-Y');
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
                            echo $dep->depSuma; 
                            $totalTotal +=  $dep->depSuma;
                        }
                        ELSEIF($dep->depConcepto==='10'){
                            echo $dep->depSuma; 
                            $totalTotal +=  $dep->depSuma;
                            
                            //F($primera === 0) $hon = $dep->depSuma-89600;
                            //ELSE $hon = $dep->depSuma;
                            //
                            //$extra = $hon / 57500;
                            //F($extra > 0){
                            //  echo $extra*57500;
                            //  $totalTotal +=  $extra*57500;
                            //
                            //ELSE {
                            //  echo $honorarios;
                            //  $totalTotal +=  $honorarios;
                            //
                            
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
<br>
<table style="font-size: 11px">
    <tr>
        <td colspan="2">Total Anticipo Dia Cama</td>
        <td><?php echo $totalTotal;?></td>
    </tr>
    <tr>
        <td colspan="2">Camas Utilizadas</td>
        <td><?php echo $totalUtilizado;?></td>
    </tr>
    <tr>
        <td colspan="2">Honorarios Utilizados</td>
        <td><?php echo $totalHono;?></td>
    </tr>
     <tr>
        <td colspan="2">Diferencia a Devolver / Cobrar</td>
        <td><?php echo $totalTotal-($totalUtilizado+$totalHono);?></td>
    </tr>
    <tr>
        <td colspan="2">Insumos</td>
        <td><?php 
        FOREACH ($insumosAsignados as $ins) {
            $totalInsumos += $ins->inaValor;
            $totalInsumos += $ins->insValor;
            //$totalInsumos += $ins->exaValor;
        }
        
        //echo var_dump($insumosAsignados);
        echo $totalInsumos;?></td>
    </tr>
    <tr>
        <td colspan="2">Devolucion</td>
        <td><?php echo $totalTotal-($totalUtilizado+$totalHono+$totalInsumos);?></td>
    </tr>
    <tr>
        <td colspan="3" align="center"><b>Nota: </b>Total Pago o devolucion con signo positivo se devuelve</td>
    </tr>
</table>
    
<br><br>
<table>
                        <thead>
                            <tr>
                                <td colspan="6" align="center"><b>Detalle de Insumos/ Farmacos</b></td>
                            </tr>
                            <tr>
                                <td align="center">Fecha Asignacion</td>
                                <td align="center">Usuario</td>
                                <td align="center">Nombre</td>
                                <td align="center">Cantidad</td>
                                <td align="center">Valor</td>
                                <td align="center">Total</td>
                            </tr>
                        </thead>
                        <tbody>
                            
                            <?php $total = 0;?>
                            <?php foreach ($insumosAsignados as $item) : ?>
                            <tr>
                                    <td align="center"><?php echo $item->inaFechaRegistro; ?></td>
                                    <td align="center"><?php echo $item->uspNombre.' '.$item->uspApellidoP; ?></td>
                                    <?php IF($item->inaTipo==='2'){?>
                                    <td align="center"><?php echo strtoupper($item->descripcion); ?></td>
                                    <?php }ELSEIF($item->inaTipo==='1'){?>
                                    <td align="center"><?php echo strtoupper($item->insNombre); ?></td>
                                    <?php }ELSEIF($item->inaTipo==='3'){?>
                                    <td align="center"><?php echo strtoupper($item->exaNombre); ?></td>
                                    <?php };?>
                                    <td align="center"><?php echo $item->inaCantidad; ?></td>
                                    <td align="center"><?php IF($item->inaValor !=='0'&&!empty($item->inaValor))echo '$ '.$item->inaValor; ?></td>
                                    <td align="center"><?php IF($item->inaValor !=='0'&&!empty($item->inaValor))echo '$ '.$item->inaValor*$item->inaCantidad; ?></td>
                                    <?php $total += ($item->inaValor*$item->inaCantidad);?>
                            </tr>
                            <?php endforeach; ?>
                            <tr>
                                <td style="border:none"></td>
                                <td style="border:none"></td>
                                <td style="border:none"></td>
                                <td style="border:none"></td>
                                <td style="border:none" align="center"><b>TOTAL</b></td>
                                <td style="border:none" align="center">
                                    <b><?php echo '$ '.$total;?></b>
                                </td>
                               
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
