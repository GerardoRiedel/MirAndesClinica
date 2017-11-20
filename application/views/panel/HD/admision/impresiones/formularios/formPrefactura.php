<?php 
                    //error_reporting(E_ALL ^ E_NOTICE);
                        IF(!empty($datosApo[2]->apoNombre)){
                            foreach ($datosApo[2] as $con){
                                $nombreOtroContacto     = $datosApo[2]->apoNombre;
                                $parentescoOtroContacto = $datosApo[2]->apoParentesco;
                                $telUnoOtroContacto     = $datosApo[2]->apoTelefono;
                                $telDosOtroContacto     = $datosApo[2]->apoCelular;
                                IF($parentescoOtroContacto === '1')$parentescoOtroContacto='Padre';ELSEIF($parentescoOtroContacto === '2')$parentescoOtroContacto='Madre';ELSEIF($parentescoOtroContacto === '3')$parentescoOtroContacto='Hijo/a';ELSEIF($parentescoOtroContacto === '4')$parentescoOtroContacto='Conyuge';ELSEIF($parentescoOtroContacto === '5')$parentescoOtroContacto='Hermano/a';ELSEIF($parentescoOtroContacto === '6')$parentescoOtroContacto='Tío/a';ELSEIF($parentescoOtroContacto === '7')$parentescoOtroContacto='Primo/a';ELSEIF($parentescoOtroContacto === '8')$parentescoOtroContacto='Otro';
                            }
                        }
                        IF(!empty($datosApo[0]->apoRut)){
                            
                                $apoRut         = $datosApo[0]->apoRut;
                                $apoNombre      = $datosApo[0]->apoNombre;
                                $apoApePat      = $datosApo[0]->apoApePat;
                                $apoApeMat      = $datosApo[0]->apoApeMat;
                                $apoDireccion   = $datosApo[0]->apoDireccion;
                                $apoTelefono    = $datosApo[0]->apoTelefono;
                                $apoCelular     = $datosApo[0]->apoCelular;
                                $apoEmail       = $datosApo[0]->apoEmail;
                                $apoComuna      = $datosApo[0]->comuna;
                                $apoParentesco  = $datosApo[0]->apoParentesco;
                                IF($apoParentesco  === '1')$apoParentesco = 'Padre';ELSEIF($apoParentesco  === '2')$apoParentesco = 'Madre';ELSEIF($apoParentesco  === '3')$apoParentesco = 'Hijo/a';ELSEIF($apoParentesco  === '4')$apoParentesco = 'Conyuge';ELSEIF($apoParentesco  === '5')$apoParentesco = 'Hermano/a';ELSEIF($apoParentesco  === '6')$apoParentesco = 'Tío/a';ELSEIF($apoParentesco  === '7')$apoParentesco = 'Primo/a';ELSE$apoParentesco = 'Otro';

                        }
                        ELSE {
                                $ecoRut         = $apoRut ='';
                                $ecoNombre      = $apoNombre ='';
                                $ecoApePat      = $apoApePat ='';
                                $ecoApeMat      = $apoApeMat ='';
                                $ecoDireccion   = $apoDireccion ='';
                                $ecoTelefono    = $apoTelefono ='';
                                $ecoCelular     = $apoCelular ='';
                                $ecoEmail       = $apoEmail ='';
                                $ecoComuna      = $apoComuna ='';
                                $ecoParentesco  = $apoParentesco ='';
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
            
            <div style="margin-top:-40px" align="center">
                <h1 class="fucsia" >PREFACTURA</h1>
            </div>
            <div style="margin-top:-80px;margin-right: 0px" align="right">
                <table>
                    <tr>
                        <td style="border:none">N° de Folio: </td>
                        <td style="border:none" align="right"><?php IF(!empty($pref[0]->preFolio) && $pref[0]->preFolio!=='0')echo $pref[0]->preFolio;?></td>
                    </tr>
                    <tr>
                        <td style="border:none"></td>
                        <td>N° <?php IF(!empty($pref[0]->preNPrefactura))echo $pref[0]->preNPrefactura.'/'.date('y');?></td>
                    </tr>
                </table>
            </div>
            <br><br>
            
            <div>
                <table style="font-size:13px !important;width: 670px">
                    <tr>
                        <td colspan="2" style="border-top:none" align="center"><b>PRESTADOR</b></td>
                    </tr>
                    <tr>
                        <td style="border-right:none;width:80px">Centro:</td>
                        <td style="border-left:none" align="center">Centro de Atención Médico Psiquiátrica Integral SPA</td>
                    </tr>
                    <tr>
                        <td style="border-right:none">RUT:</td>
                        <td style="border-left:none" align="center">76.262.968 - 2</td>
                    </tr>
                </table>
            </div>
            
            <br><br>
            
            <div>
                <table style="font-size:13px !important;width: 670px">
                    <tr>
                        <td colspan="2" style="border-top:none" align="center"><b>USUARIO/A BENEFICIARIO/A</b></td>
                    </tr>
                    <tr>
                        <td style="border-right:none;width:150px">Apellido Paterno:</td>
                        <td style="border-left:none"><?php echo ' '.strtoupper($datos->apellidoPaterno);?></td>
                    </tr>
                    <tr>
                        <td style="border-right:none">Apellido Materno:</td>
                        <td style="border-left:none"><?php echo ' '.strtoupper($datos->apellidoMaterno);?></td>
                    </tr>
                    <tr>
                        <td style="border-right:none">Nombres:</td>
                        <td style="border-left:none"><?php echo ' '.strtoupper($datos->nombres);?></td>
                    </tr>
                    <tr>
                        <td style="border-right:none">RUT:</td>
                        <td style="border-left:none"><?php echo ' '. formatearRut($datos->rut);?></td>
                    </tr>
                </table>
            </div>
            
            <br><br>
            
            <div>
                <table style="font-size:13px !important;width: 670px">
                    <tr>
                        <td colspan="2" style="border-top:none" align="center"><b>AFILIADO A ISAPRE/COTIZANTE</b></td>
                    </tr>
                    <tr>
                        <td style="border-right:none;width:150px"><b>ISAPRE:</b></td>
                        <td style="border-left:none"><?php echo ' '.strtoupper($datos->isapreNombre);?></td>
                    </tr>
                    <tr>
                        <td style="border-right:none;width:150px">Apellido Paterno:</td>
                        <td style="border-left:none"><?php echo ' '.strtoupper($datos->apePatTitular);?></td>
                    </tr>
                    <tr>
                        <td style="border-right:none">Apellido Materno:</td>
                        <td style="border-left:none"><?php echo ' '.strtoupper($datos->apeMatTitular);?></td>
                    </tr>
                    <tr>
                        <td style="border-right:none">Nombres:</td>
                        <td style="border-left:none"><?php echo ' '.strtoupper($datos->nombreTitular);?></td>
                    </tr>
                    <tr>
                        <td style="border-right:none">RUT:</td>
                        <td style="border-left:none"><?php IF(!empty($datos->rutTitular)) echo ' '. formatearRut($datos->rutTitular);?></td>
                    </tr>
                </table>
            </div>
            <br><br>
            
            <div>
                <table style="font-size:13px !important;width: 670px">
                    <tr>
                        <td colspan="2" style="border-top:none" align="center"><b>PERIODO DE TRATAMIENTO</b></td>
                    </tr>
                    <tr>
                        <td style="border-right:none;width:150px">Programa:</td>
                        <td style="border-left:none"><?php IF($pref[0]->prePrograma==='1')echo 'Hospital de Día'; ELSEIF($pref[0]->prePrograma==='2')echo 'RH 1';ELSEIF($pref[0]->prePrograma==='3')echo 'RH 2'; ?></td>
                    </tr>
                    <tr>
                        <td style="border-right:none;width:150px">Ingreso a Programa:</td>
                        <td style="border-left:none"><?php $fecha = new DateTime($datos->fechaIngreso);echo $fecha->format('d-m-Y');?></td>
                    </tr>
                    <tr>
                        <td style="border-right:none">Periodo a Facturar:</td>
                        <td style="border-left:none"><?php $fechaD = new DateTime($pref[0]->preDesde);$fechaH = new DateTime($pref[0]->preHasta);echo $fechaD->format('d-m-Y').' al '.$fechaH->format('d-m-Y'); ?></td>
                    </tr>
                </table>
            </div>
            <br><br>
            <div>
                <table style="font-size:13px !important;width: 670px">
                    <tr>
                        <td colspan="2" style="border-top:none" align="center"><b>DETALLE DE FACTURACIÓN</b></td>
                    </tr>
                    <tr>
                        <td style="border-right:none;width:150px">N° de Días MirAndes:</td>
                        <?php IF($pref[0]->prePrograma==='2'){;?>
                            <td style="border-left:none; font-size:15px" align="center">
                                <?php //$interval = $fechaD->diff($fechaH);
                                $CantidadDiasHabiles = $pref[0]->preMirandesDias;
                                echo $CantidadDiasHabiles.' días';
                                ?>
                            </td>
                        <?php }ELSE {?>
                            <td style="border-left:none; font-size:15px" align="center">
                                <?php //$interval = $fechaD->diff($fechaH);
                                $CantidadDiasHabiles = getDiasHabiles($fechaD->format('Y-m-d'),$fechaH->format('Y-m-d')); 
                                echo $CantidadDiasHabiles.' días';
                                ?>
                            </td>
                        <?php } ?>
                    </tr>
                    <tr>
                        <td style="border-right:none">Valor Día MirAndes:</td>
                        <td style="border-left:none; font-size:15px" align="center"><?php echo '$ '.$pref[0]->preValor;?></td>
                    </tr>
                    <tr>
                        <td style="border-right:none"><b>Total MirAndes:</b></td>
                        <td style="border-left:none; font-size:15px" align="center"><b><?php echo '$ '.$CantidadDiasHabiles*$pref[0]->preValor ;?></b></td>
                    </tr>
                    <?php IF($pref[0]->prePrograma==='2'){;?>
                    <tr>
                        <td style="border-right:none">N° de Días NEXOS:</td>
                        <td style="border-left:none; font-size:15px" align="center"><?php echo $pref[0]->preNexosDias.' días' ;?></td>
                    </tr>
                    <tr>
                        <td style="border-right:none">Valor Día NEXOS:</td>
                        <td style="border-left:none; font-size:15px" align="center"><?php echo '$ '.$pref[0]->preNexosValor;?></td>
                    </tr>
                    <tr>
                        <td style="border-right:none"><b>Total NEXOS:</b></td>
                        <td style="border-left:none; font-size:15px" align="center"><b><?php echo '$ '.$pref[0]->preNexosValor*$pref[0]->preNexosDias ;?></b></td>
                    </tr>
                    <?php };?>
                </table>
            </div>
            <br><br>
            <div>
                <table style="font-size:13px !important;width: 670px;border:2px solid black">
                    <tr>
                        <td style="border-top:none; width:150px; font-size:15px" align="center"><b>Total Facturación<br>Centro RH MirAndes</b></td>
                        <td style="border-top:none; font-size:17px" align="center"><b><?php $total=($CantidadDiasHabiles*$pref[0]->preValor);  echo '$ '.$total;?></b></td>
                    </tr>
                </table>
            </div>
            <br><br>
            <div>
                <table style="font-size:13px !important;width: 670px;border:2px solid black">
                    <tr>
                        <td style="border-top:none;width:150px; font-size:15px" align="center"><b>FECHA FACTURACIÓN:</b></td>
                        <td style="border-top:none; font-size:15px" align="center"><?php $fecha = new DateTime($pref[0]->preFechaRegistro);echo $fecha->format('d-m-Y') ;?></td>
                    </tr>
                </table>
            </div>
            <br>
            <div>
                <table style="font-size:8px !important;width: 670px;border:none">
                    <tr>
                        <td colspan="2" style="border:none" align="center"><?php IF($pref[0]->prePrograma==='1')echo 'Hospital de Dia MirAndes. Avda Bilbao #370 Providencia, Santiago. Mail: hospitaldedia@mirandes.cl Fono: 226651384'; ELSEIF($pref[0]->prePrograma==='2')echo 'Centro de Rehabilitacion Psicosocial MirAndes. Avda Bilbao #370 Providencia, Santiago. Mail: rehabilitacion@mirandes.cl Fono: 226651384'; ?></td>
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
        '2017-09-18', // Dia Festivo De Prueba EN EL EJEMPLO <-----
        '2017-09-19', // Dia Festivo De Prueba EN EL EJEMPLO <-----
        '2017-10-09', // Aniversario del Descubrimiento de América 
        '2017-10-27', // Día Nacional de las Iglesias Evangélicas y Protestantes (feriado religioso) 
        '2017-11-01', // Día de Todos los Santos (feriado religioso) 
        '2017-12-08', // Inmaculada Concepción de la Virgen (feriado religioso) 
        '2017-12-25', // elecciones presidencial y parlamentarias (puede que se traslade al domingo 13) 
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
