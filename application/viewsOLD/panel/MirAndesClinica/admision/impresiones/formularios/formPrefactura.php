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

<div style="page-break-after: always;" >
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
                <table style="font-size:13px !important;width: 670px">
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
                <table style="font-size:13px !important;width: 670px">
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
                <table style="font-size:13px !important;width: 670px">
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
                <table style="font-size:13px !important;width: 670px">
                    <tr>
                        <td colspan="2" style="border-left:none;border-top:none;border-right:none;" align="center"><b>PERIODO DE HOSPITALIZACIÓN</b></td>
                    </tr>
                    
                    <tr>
                        <td style="border-left:none;border-top:none;border-right:none;width:150px">Fecha Ingreso:</td>
                        <td style="border-left:none;border-top:none;border-right:none;"><?php $fecha = new DateTime($datos->fechaIngreso);echo $fecha->format('d-m-Y');?></td>
                    </tr>
                    <tr>
                        <td style="border:none;"><?php IF(empty($datos->fechaSalidaReal) || $datos->fechaSalidaReal ==='0000-00-00')echo 'Fecha';ELSE echo 'Fecha Alta';?>:</td>
                        <td style="border:none;"><?php IF(empty($datos->fechaSalidaReal) || $datos->fechaSalidaReal ==='0000-00-00'){$fechaD = date('Y-m-d');echo date('d-m-Y');} ELSE {$fechaD = new DateTime($datos->fechaSalidaReal); echo $fechaD->format('d-m-Y');$fechaD=$fechaD->format('d-m-Y');}?></td>
                    </tr>
                </table>
            </div>
            <br><br>
            <div>
                <!-- CHEQUEA GES Y LE -->
                <?php //die($datos->ges);?>
                <?php IF($prefacturas[0]->preGes === '1'){ ?>
                    <table style="font-size:13px !important;width: 670px">
                        <tr>
                            <td colspan="2" style="border-right: none; border-left:none; border-top:none" align="center"><b>DETALLE DE FACTURACIÓN</b></td>
                        </tr>
                        <tr>
                            <td style="border-right: none; border-left:none; border-top:none;width:150px">N° Días Hospitalización:</td>
                            <td style="border-right: none; border-left:none; border-top:none; font-size:15px" align="right"><b>
                                <?php 
                                    //$fechaD = new DateTime($fechaD);
                                    //$fecha  = new DateTime(date($datos->fechaIngreso));
                                    //$interval = $fechaD->diff($fecha);
                                    //$dias = $interval->format('%a');
                                    //echo $interval->format('%a días');
                                    $dias = $prefacturas[0]->preMirandesDias;
                                    echo $dias.' días';
                                ?></b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            </td>
                        </tr>
                        <tr>
                            <td style="border-right: none; border-left:none; border-top:none">Valor Día Cama sin IVA:</td>
                            <td style="border-right: none; border-left:none; border-top:none; font-size:15px" align="right"><b><?php echo $prefacturas[0]->preValor;?></b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        </tr>
                        <tr>
                            <td style="border-right: none; border-left:none; border-top:none">1. Día Cama:</td>
                            <?php IF($prefacturas[0]->preGes === '1') $depDescuento = 0;?>
                            <?php IF(empty($depDescuento))$calculo = $dias*$prefacturas[0]->preValor; ELSE $calculo = ($dias*$prefacturas[0]->preValor)-$depDescuento;?>
                            <td style="border-right: none; border-left:none; border-top:none; font-size:15px" align="right"><b><?php echo $calculo ;?></b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        </tr>
                        <tr>
                            <td style="border-right: none; border-left:none; border-top:none">2. Cuidados Personales:</td>
                            <td style="border-right: none; border-left:none; border-top:none; font-size:15px" align="right"><b><?php IF(!empty($prefacturas[0]->preCuidados)){$cuidados = $prefacturas[0]->preCuidados;echo $cuidados;} ELSE {$cuidados=0;echo '-';}?></b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        </tr>
                        <tr>
                            <td style="border-right: none; border-left:none; border-top:none">3. Examenes:</td>
                            <td style="border-right: none; border-left:none; border-top:none; font-size:15px" align="right"><b>
                                <?php 
                                    $insumos = 0;//die(var_dump($insumosAsignados));
                                    IF(!empty($insumosAsignados)){
                                        FOREACH($insumosAsignados as $ins){
                                            //echo $ins->insValor.'///'.$ins->inaValor.'///'.$ins->exaValor.'----';
                                            $insumos += $ins->insValor;
                                            $insumos += $ins->inaValor;
                                            $insumos += $ins->exaValor;
                                        }
                                        echo $insumos;
                                    }ELSE{echo '-';}

                                ?>
                                </b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        </tr>
                        
                        <tr>
                            <td style="border-right: none; border-left:none; border-top:none">Sub Total sin IVA</td>
                            <td style="border-right: none; border-left:none; border-top:none; font-size:15px" align="right"><b><?php $total=($dias*$prefacturas[0]->preValor)+$insumos+$cuidados; echo $total;?></b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        </tr>
                        <tr>
                            <td style="border:none">IVA 19%</td>
                            <td style="border:none; font-size:15px" align="right"><b><?php $iva= round($total*0.19);  echo $iva;?></b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        </tr>
                    </table>

                <?php }ELSE{ ?>
                    <table style="font-size:13px !important;width: 670px">
                        <tr>
                            <td colspan="2" style="border-right: none; border-left:none; border-top:none" align="center"><b>DETALLE DE FACTURACIÓN</b></td>
                        </tr>
                        <tr>
                            <td style="border-right: none; border-left:none; border-top:none;width:150px">N° Días Hospitalización:</td>
                            <td style="border-right: none; border-left:none; border-top:none; font-size:15px" align="right"><b>
                                <?php 
                                    //$fechaD = new DateTime($fechaD);
                                    //$fecha  = new DateTime(date($datos->fechaIngreso));
                                    //$interval = $fechaD->diff($fecha);
                                    //$dias = $interval->format('%a');
                                    //echo $interval->format('%a días');
                                    $dias = $prefacturas[0]->preMirandesDias;
                                    echo $dias.' días';
                                ?></b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            </td>
                        </tr>
                        <tr>
                            <td style="border-right: none; border-left:none; border-top:none">Valor Día Cama sin IVA:</td>
                            <td style="border-right: none; border-left:none; border-top:none; font-size:15px" align="right"><b><?php echo $prefacturas[0]->preValor;?></b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        </tr>
                        <tr>
                            <td style="border-right: none; border-left:none; border-top:none">1. Día Cama:</td>
                            <?php IF($prefacturas[0]->preGes === '1') $depDescuento = 0;?>
                            <?php IF(empty($depDescuento))$calculo = $dias*$prefacturas[0]->preValor; ELSE $calculo = ($dias*$prefacturas[0]->preValor)-$depDescuento;?>
                            <td style="border-right: none; border-left:none; border-top:none; font-size:15px" align="right"><b><?php echo $dias*$prefacturas[0]->preValor.' - '.$depDescuento.' = '.$calculo ;?></b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        </tr>
                        <tr>
                            <td style="border-right: none; border-left:none; border-top:none">2. Cuidados Personales:</td>
                            <td style="border-right: none; border-left:none; border-top:none; font-size:15px" align="right"><b><?php IF(!empty($prefacturas[0]->preCuidados)){$cuidados = $prefacturas[0]->preCuidados;echo $cuidados;} ELSE {$cuidados=0;echo '-';}?></b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        </tr>
                        <tr>
                            <td style="border-right: none; border-left:none; border-top:none">3. Examenes:</td>
                            <td style="border-right: none; border-left:none; border-top:none; font-size:15px" align="right"><b>
                                <?php 
                                    $insumos = 0;
                                    IF(!empty($insumosAsignados)){
                                        FOREACH($insumosAsignados as $ins){
                                            $insumos += $ins->insValor;
                                            $insumos += $ins->inaValor;
                                            $insumos += $ins->exaValor;
                                        }
                                        echo $insumos;
                                    }ELSE{echo '-';}
                                ?>
                                </b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        </tr>
                        <tr>
                            <td style="border-right: none; border-left:none; border-top:none">4. Consulta Psiquiátrica:</td>
                            <td style="border-right: none; border-left:none; border-top:none; font-size:15px" align="right"><b>
                                <?php 
                                $honorario = 0;
                                    IF(!empty($prefacturas[0]->preHonorarios)){
                                        WHILE($prefacturas[0]->preHonorarios > 1){
                                            $honorario += 57500;
                                            $prefacturas[0]->preHonorarios -=1;
                                        }
                                            $honorario += 89600;
                                    }
                                    IF(!empty($honorario)){$honorario = $honorario-$depHonorario; echo $honorario-$depHonorario;} ELSE {$depHonorario=0;echo '-';}
                                ?>
                                </b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        </tr>
                        <tr>
                            <td style="border-right: none; border-left:none; border-top:none">Sub Total sin IVA</td>
                            <td style="border-right: none; border-left:none; border-top:none; font-size:15px" align="right"><b><?php $total=($dias*$prefacturas[0]->preValor)+$insumos+$cuidados+$honorario-$depDescuento; echo $total;?></b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        </tr>
                        <tr>
                            <td style="border:none">IVA 19%</td>
                            <td style="border:none; font-size:15px" align="right"><b><?php $iva= round($total*0.19);  echo $iva;?></b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        </tr>
                    </table>
                <?php };?>
            </div>
            <br><br>
            <div>
                <table style="font-size:13px !important;width: 670px;border:2px solid black">
                    <tr>
                        <td style="border:none; width:150px; font-size:15px" align="center"><b>Total Cuenta Clínica</b></td>
                        <td style="border:none; font-size:17px" align="center"><b><?php $total=($total+$iva);  echo '$ '.$total;?></b></td>
                    </tr>
                </table>
            </div>
            <br><br>
            
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
