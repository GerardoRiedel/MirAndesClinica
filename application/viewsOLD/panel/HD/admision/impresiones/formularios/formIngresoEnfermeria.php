<?php 
                    error_reporting(E_ALL ^ E_NOTICE);
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
    .hr {border: 1px dashed #B404AE; height: 0; width: 100%;}
    .hr2 {border: 0; border-top: 1px solid #999; border-bottom: 1px solid #333; height:0;}
    .fucsia {color: #B404AE;}
    .cubo4 {padding-top: 20px;text-align: left; vertical-align: bottom; width:665px;height: 15px;border:1px solid black;}
    .cubo3 {padding-top: 20px;text-align: left; vertical-align: bottom; width:665px;height: 100px;border:1px solid black; border-radius: 10px}
    span {font-size: 12px; font-family: arial}
    table {
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
    .circulo {
        width: 25px;
        height: 25px;
        -moz-border-radius: 50%;
        -webkit-border-radius: 50%;
        border-radius: 50%;
        background-color: white;
        border: 2px solid #B404AE;
        color:transparent;
    }
    .circuloCheck{
        width: 20px;
        height: 20px;
        -moz-border-radius: 50%;
        -webkit-border-radius: 50%;
        border-radius: 50%;
        background-color: #B404AE;
        border: 11px solid #B404AE;
        color: #B404AE;
    }
    .circulo2 {
        width: 15px;
        height: 15px;
        -moz-border-radius: 50%;
        -webkit-border-radius: 50%;
        border-radius: 50%;
        background-color: white;
        border: 1px solid #B404AE;
        color:transparent;
    }
    .circuloCheck2{
        width: 15px;
        height: 15px;
        -moz-border-radius: 50%;
        -webkit-border-radius: 50%;
        border-radius: 50%;
        background-color: #B404AE;
        border: 8px solid #B404AE;
        color: #B404AE;
    }
</style>

<div style="page-break-after: always;" >
            <div class="col-lg-12" align="right" style="margin-right: 40px">
                <img src="<?php echo base_url();?>../assets/img/mirAndes.png" class="logo">
            </div>
        <blockquote>
            
            <div style="margin-top:-28px">
                <h2 class="fucsia" >INGRESO ENFERMERÍA</h2>
            </div>
            <div style="margin-top:-13px" class="hr">
            </div>
            <br>
            <div>
                <table style="font-size:13px !important; border:none;width: 670px">
                    <tr>
                        <td style="border:none">
                            Fecha de Ingreso HD: 
                        </td>
                        <td style="border:none;width:100px">
                            <?php 
                                $fecha = new DateTime($datos->fechaIngreso);
                                echo $fecha->format('d-m-Y');
                            ?>
                        </td>
                        <td style="border:none;width:100px">
                            N° Ficha HD:
                        </td>
                        <td style="border:none;width:70px">
                            <?php echo $datos->ficha;?>
                        </td>
                        <td style="border:none;width:100px">
                            Fecha de alta:
                        </td>
                        <td style="border-top:none;border-left:none;border-right: none;border-bottom: 1px solid black;width:130px">
                            
                        </td>
                    </tr>
                </table>
            </div>
            <br>
            <span class=" fucsia" style="font-size:15px"><b>1. Antecedentes Personales</b></span>
            <br><br>
            <div>
                <table style="font-size:13px !important; width: 670px">
                    <tr>
                        <td style="border:none;width: 160px">Nombre Usuario/a: </td>
                        <td colspan="3" style="border:none"><?php echo ' '.strtoupper($datos->nombres).' '.strtoupper($datos->apellidoPaterno).' '.strtoupper($datos->apellidoMaterno);?></td>
                        <td colspan="2" style="border:none">Edad: </td>
                        <td colspan="2" style="border:none"><?php IF(!empty($datos->fechaNacimiento))echo calculaedad($datos->fechaNacimiento);ELSE echo '___________________'?></td>
                    </tr>
                    <tr>
                        <td style="border:none;width: 70px">Ocupación: </td>
                        <td style="border:none;width: 160px"><?php echo strtoupper($datos->ocupacion);?></td>
                        <td style="border:none;width: 50px">¿LM?:</td>
                        <td style="border:none;width: 50px"><?php IF(!empty($licencias))echo 'SI';ELSE echo '_________';?></td>
                    
                        <td style="border:none;width: 160px">Fecha Última LM: </td>
                        <td style="border:none;width: 130px"><?php IF(!empty($licencias)){$fecha = new DateTime($licencias[0]->licDesde);echo $fecha->format('d-m-Y');}ELSE echo '___________';?></td>
                        <td style="border:none;width: 120px">Días reposo: </td>
                        <td style="border:none;width: 40px"><?php IF(!empty($licencias))echo $licencias[0]->licDias;ELSE echo '_________'?></td>
                    </tr>
                    <tr>
                        <td colspan="1" style="border:none;width: 120px">Derivado desde: </td>
                        <td colspan="3" style="border:none"><input style="border:none;width:100%;height: 25px" type="text" value="<?php echo ' '.strtoupper($datos->derNombre);?>"></td>
                        <td colspan="1" style="border:none;width: 120px">Alergias: </td>
                        <td colspan="3" style="border:none;width: 120px"><?php IF(!empty($datos->alergia))echo strtoupper($datos->alergia);ELSE echo '___________________'?></td>
                    </tr>
                </table>
            </div>
            <br><br><?php //die(var_dump($licencias));?>
            <span class=" fucsia" style="font-size:15px"><b>2. Signos Vitales y Parámetros Nutricionales</b></span>
            <br><br>
            <div>
                <table style="font-size:13px !important; width: 670px">
                    <tr>
                        <td style="width: 120px;border-top:none;height: 30px" align="center">Hora Medición</td>
                        <td style="width: 120px;border-top:none" align="center">Talla (T)</td>
                        <td style="width: 120px;border-top:none" align="center">Peso (P)</td>
                        <td style="width: 120px;border-top:none" align="center">Circunferencia Abdominal (CA)</td>
                        <td style="width: 120px;border-top:none" align="center">Índice Masa Corporal</td>
                    </tr>
                    <tr>
                        <td align="center" style="height: 30px">
                            <?php 
                                IF(!empty($registro->sigHoraIngreso)){
                                    $hora = new DateTime($registro->sigHoraIngreso);
                                    echo $hora->format('H:i');
                                }
                            ?>
                        </td>
                        <td align="center"><?php IF(!empty($registro->sigTalla))echo $registro->sigTalla;?></td>
                        <td align="center"><?php IF(!empty($registro->sigPeso))echo $registro->sigPeso;?></td>
                        <td align="center"><?php IF(!empty($registro->sigCA))echo $registro->sigCA;?></td>
                        <td align="center"><?php IF(!empty($registro->sigIMC))echo $registro->sigIMC;?></td>
                    </tr>
                    <tr>
                        <td align="center" style="height: 30px">Temperatura (T°)</td>
                        <td align="center">Presión Arterial (PA)</td>
                        <td align="center">Frecuencia Cardiaca (FC)</td>
                        <td align="center">Régimen</td>
                        <td align="center">Frecuencia Respiratoria (FR)</td>
                    </tr>
                    <tr>
                        <td align="center" style="height: 30px"><?php IF(!empty($registro->sigTem))echo $registro->sigTem;?></td>
                        <td align="center"><?php IF(!empty($registro->sigPresion))echo $registro->sigPresion;?></td>
                        <td align="center"><?php IF(!empty($registro->sigFC))echo $registro->sigFC;?></td>
                        <td align="center"><?php IF(!empty($registro->sigRegimen))echo $registro->regNombre;?></td>
                        <td align="center"><?php IF(!empty($registro->sigFR))echo $registro->sigFR;?></td>
                    </tr>
                </table>
                <table style="font-size:13px !important; width: 670px;border:none">
                    <tr>
                        <td align="center" style="border:none">IMC:</td>
                        <td align="center" style="border:none"><input type="text" <?php IF(!empty($registro->sigIMC)&& $registro->sigIMC < 18.5)echo 'class="circuloCheck"';ELSE echo 'class="circulo"';?>> Bajo peso (<18,5)</td>
                        <td align="center" style="border:none"><input type="text" <?php IF(!empty($registro->sigIMC)&& $registro->sigIMC >= 18.5 && $registro->sigIMC < 25)echo 'class="circuloCheck"';ELSE echo 'class="circulo"';?>> Normal (18,5-24,99)</td>
                        <td align="center" style="border:none"><input type="text" <?php IF(!empty($registro->sigIMC)&& $registro->sigIMC >= 25 && $registro->sigIMC < 30)echo 'class="circuloCheck"';ELSE echo 'class="circulo"';?>> Sobrepeso (25-29,99)</td>
                        <td align="center" style="border:none"><input type="text" <?php IF(!empty($registro->sigIMC)&& $registro->sigIMC >= 30)echo 'class="circuloCheck"';ELSE echo 'class="circulo"';?>> Obesidad (>30)</td>
                    </tr>
                </table>
            </div>
            <br><br>
            <span class=" fucsia" style="font-size:15px"><b>3. Hábitos Nocivos</b></span>
            <br><br>
            <div>
                <table style="font-size:13px !important; width: 670px">
                    <tr>
                        <td style="width: 120px;border-top:none;height: 30px" align="center"></td>
                        <td style="width: 120px;border-top:none" align="center">SÍ/NO</td>
                        <td style="width: 250px;border-top:none" align="center">CANTIDAD (espeficar día/semanal)</td>
                        <td style="width: 200px;border-top:none" align="center">EDAD DE INICIO CONSUMO</td>
                    </tr>
                    <tr>
                        <td align="right" style="height: 30px">Tabaco</td>
                        <td align="center"><?php IF(!empty($enfermeria->enfTabaco))echo 'SÍ';ELSEIF($enfermeria->enfTabaco === '0') echo 'NO';?></td>
                        <td align="center"><?php IF(!empty($enfermeria->enfTabacoCantidad))echo $enfermeria->enfTabacoCantidad;?></td>
                        <td align="center"><?php IF(!empty($enfermeria->enfTabacoEdad))echo $enfermeria->enfTabacoEdad;?></td>
                    </tr>
                    <tr>
                        <td align="right" style="height: 30px">Alcohol</td>
                        <td align="center"><?php IF(!empty($enfermeria->enfAlcohol))echo 'SÍ';ELSEIF($enfermeria->enfAlcohol === '0') echo 'NO';?></td>
                        <td align="center"><?php IF(!empty($enfermeria->enfAlcoholCantidad))echo $enfermeria->enfAlcoholCantidad;?></td>
                        <td align="center"><?php IF(!empty($enfermeria->enfAlcoholEdad))echo $enfermeria->enfAlcoholEdad;?></td>
                    </tr>
                    <tr>
                        <td align="right" style="height: 30px">Otras Drogas</td>
                        <td align="center"><?php IF(!empty($enfermeria->enfDrogas))echo 'SÍ';ELSEIF($enfermeria->enfDrogas === '0') echo 'NO';?></td>
                        <td align="center"><?php IF(!empty($enfermeria->enfDrogasCantidad))echo $enfermeria->enfDrogasCantidad;?></td>
                        <td align="center"><?php IF(!empty($enfermeria->enfDrogasEdad))echo $enfermeria->enfDrogasEdad;?></td>
                    </tr>
                </table>
            </div>
            <br><br>
            <span class=" fucsia" style="font-size:15px"><b>4. Antecedentes Médicos</b></span>
            <br><br>
            <div>
                <table style="font-size:13px !important; width: 670px">
                    <tr>
                        <td style="border-top:none;height: 25px" align="center">HIPERTENSIÓN ARTERIAL</td>
                        <td style="border-top:none;min-width: 50px" align="center"><?php IF(!empty($enfermeria->enfHipertension))echo 'SÍ';ELSEIF($enfermeria->enfHipertension === '0') echo 'NO' ;?></td>
                        <td style="border-top:none" align="center">ARRITMIAS CARDIACAS</td>
                        <td style="border-top:none;min-width: 50px" align="center"><?php IF(!empty($enfermeria->enfArritmias))echo 'SÍ';ELSEIF($enfermeria->enfArritmias === '0') echo 'NO' ;?></td>
                    </tr>
                    <tr>
                        <td style="height: 25px" align="center">DIABETES MELLITUS I</td>
                        <td align="center"><?php IF(!empty($enfermeria->enfDiabetes1))echo 'SÍ';ELSEIF($enfermeria->enfDiabetes1 === '0') echo 'NO' ;?></td>
                        <td align="center">INSUFICIENCIA RENAL CRÓNICA</td>
                        <td align="center"><?php IF(!empty($enfermeria->enfRenal))echo 'SÍ';ELSEIF($enfermeria->enfRenal === '0') echo 'NO' ;?></td>
                    </tr>
                    <tr>
                        <td style="height: 25px" align="center">DIABETES MELLITUS II</td>
                        <td align="center"><?php IF(!empty($enfermeria->enfDiabetes2))echo 'SÍ';ELSEIF($enfermeria->enfDiabetes2 === '0') echo 'NO' ;?></td>
                        <td align="center">HIPOTIROIDISMO</td>
                        <td align="center"><?php IF(!empty($enfermeria->enfHipotiroidismo))echo 'SÍ';ELSEIF($enfermeria->enfHipotiroidismo === '0') echo 'NO' ;?></td>
                    </tr>
                    <tr>
                        <td style="height: 25px" align="center">COLESTEROL ALTO/DISLIPIDEMIA</td>
                        <td align="center"><?php IF(!empty($enfermeria->enfDislipidemia))echo 'SÍ';ELSEIF($enfermeria->enfDislipidemia === '0') echo 'NO' ;?></td>
                        <td align="center">HIGADO GRASO</td>
                        <td align="center"><?php IF(!empty($enfermeria->enfHigado))echo 'SÍ';ELSEIF($enfermeria->enfHigado === '0') echo 'NO' ;?></td>
                    </tr>
                    <tr>
                        <td style="height:25px" align="center">EPILEPSIA</td>
                        <td align="center"><?php IF(!empty($enfermeria->enfEpilepsia))echo 'SÍ';ELSEIF($enfermeria->enfEpilepsia === '0') echo 'NO' ;?></td>
                        <td align="center">HEPATITIS</td>
                        <td align="center"><?php IF(!empty($enfermeria->enfHepatitis))echo 'SÍ';ELSEIF($enfermeria->enfHepatitis === '0') echo 'NO' ;?></td>
                    </tr>
                    <tr>
                        <td style="height: 25px" align="center">ASMA</td>
                        <td align="center"><?php IF(!empty($enfermeria->enfAsma))echo 'SÍ';ELSEIF($enfermeria->enfAsma === '0') echo 'NO' ;?></td>
                        <td align="center">GLAUCOMA</td>
                        <td align="center"><?php IF(!empty($enfermeria->enfGlaucoma))echo 'SÍ';ELSEIF($enfermeria->enfGlaucoma === '0') echo 'NO' ;?></td>
                    </tr>
                    <tr>
                        <td style="height: 25px" align="center">ARTRITIS</td>
                        <td align="center"><?php IF(!empty($enfermeria->enfArtritis))echo 'SÍ';ELSEIF($enfermeria->enfArtritis === '0') echo 'NO' ;?></td>
                        <td align="center">ASTROSIS</td>
                        <td align="center"><?php IF(!empty($enfermeria->enfArtrosis))echo 'SÍ';ELSEIF($enfermeria->enfArtrosis === '0') echo 'NO' ;?></td>
                    </tr>
                    <tr>
                        <td style="height: 30px;border-right: none" align="center">OTROS/Comentario</td>
                        <td colspan="3" style="border-left:none" align="center"><?php IF(!empty($enfermeria->enfOtros))echo $enfermeria->enfOtros;?></td>
                    </tr>
                </table>
            </div>
            <div align="right" style="margin-top:-320px">
            <img style="width: 560px;bottom:30px;right:30px;opacity: 0.4" src="<?php echo base_url();?>../assets/img/cerros.png">
            </div>
        </blockquote>
</div>


<div style="page-break-after: always;" >
            <div class="col-lg-12" align="right" style="margin-right: 40px">
                <img src="<?php echo base_url();?>../assets/img/mirAndes.png" class="logo">
            </div>
        <blockquote>
            
            <div style="margin-top:-28px">
                <h2 class="fucsia" >INGRESO ENFERMERÍA</h2>
            </div>
            <div style="margin-top:-13px" class="hr">
            </div>
            <br><br>
            <span class=" fucsia" style="font-size:15px"><b>5. Antecedentes Quirúrgicos</b></span>
            <br><br>
            <div>
                <table style="font-size:13px !important; width: 670px">
                    <tr>
                        <td style="border-top:none;height: 17px;width:150px" align="center">Fecha</td>
                        <td style="border-top:none" align="center">Intervención</td>
                    </tr>
                    <tr>
                        <td style="height: 30px" align="center"><?php IF(!empty($enfermeria->enfFecha1) && $enfermeria->enfFecha1 != '0000-00-00'){$fecha = new DateTime($enfermeria->enfFecha1);echo $fecha->format('d-m-Y');}?></td>
                        <td><?php IF(!empty($enfermeria->enfQuirurgico1))echo ' '.$enfermeria->enfQuirurgico1;?></td>
                    </tr>
                    <tr>
                        <td style="height: 30px" align="center"><?php IF(!empty($enfermeria->enfFecha2) && $enfermeria->enfFecha2 != '0000-00-00'){$fecha = new DateTime($enfermeria->enfFecha2);echo $fecha->format('d-m-Y');}?></td>
                        <td><?php IF(!empty($enfermeria->enfQuirurgico2))echo ' '.$enfermeria->enfQuirurgico2;?></td>
                    </tr>
                    <tr>
                        <td style="height: 30px" align="center"><?php IF(!empty($enfermeria->enfFecha3) && $enfermeria->enfFecha3 != '0000-00-00'){$fecha = new DateTime($enfermeria->enfFecha3);echo $fecha->format('d-m-Y');}?></td>
                        <td><?php IF(!empty($enfermeria->enfQuirurgico3))echo ' '.$enfermeria->enfQuirurgico3;?></td>
                    </tr>
                    <tr>
                        <td style="height: 30px" align="center"><?php IF(!empty($enfermeria->enfFecha4) && $enfermeria->enfFecha4 != '0000-00-00'){$fecha = new DateTime($enfermeria->enfFecha4);echo $fecha->format('d-m-Y');}?></td>
                        <td><?php IF(!empty($enfermeria->enfQuirurgico4))echo ' '.$enfermeria->enfQuirurgico4;?></td>
                    </tr>
                </table>
            </div>
            <br><br>
            <span class=" fucsia" style="font-size:15px"><b>6. Tratamientos Farmacológicos NO PSIQUIÁTRICOS</b></span>
            <br><br>
            <div>
                <table style="font-size:13px !important; width: 670px">
                    <tr>
                        <td style="border-top:none;height: 15px;" align="center">Medicamento / Dosis</td>
                        <td style="border-top:none;width:300px;" align="center">Horarios</td>
                    </tr>
                    <tr>
                        <td style="height: 15px" align="center"><?php IF(!empty($enfermeria->enfMed1))echo ' '.$enfermeria->enfMed1;?></td>
                        <td><?php IF(!empty($enfermeria->enfHor1))echo ' '.$enfermeria->enfHor1;?></td>
                    </tr>
                    <tr>
                        <td style="height: 15px" align="center"><?php IF(!empty($enfermeria->enfMed2))echo ' '.$enfermeria->enfMed2;?></td>
                        <td><?php IF(!empty($enfermeria->enfHor2))echo ' '.$enfermeria->enfHor2;?></td>
                    </tr>
                    <tr>
                        <td style="height: 15px" align="center"><?php IF(!empty($enfermeria->enfMed3))echo ' '.$enfermeria->enfMed3;?></td>
                        <td><?php IF(!empty($enfermeria->enfHor3))echo ' '.$enfermeria->enfHor3;?></td>
                    </tr>
                    <tr>
                        <td style="height: 15px" align="center"><?php IF(!empty($enfermeria->enfMed4))echo ' '.$enfermeria->enfMed4;?></td>
                        <td><?php IF(!empty($enfermeria->enfHor4))echo ' '.$enfermeria->enfHor4;?></td>
                    </tr>
                    <tr>
                        <td style="height: 15px" align="center"><?php IF(!empty($enfermeria->enfMed5))echo ' '.$enfermeria->enfMed5;?></td>
                        <td><?php IF(!empty($enfermeria->enfHor5))echo ' '.$enfermeria->enfHor5;?></td>
                    </tr>
                    <tr>
                        <td style="height: 15px" align="center"><?php IF(!empty($enfermeria->enfMed6))echo ' '.$enfermeria->enfMed6;?></td>
                        <td><?php IF(!empty($enfermeria->enfHor6))echo ' '.$enfermeria->enfHor6;?></td>
                    </tr>
                </table>
            </div>
            <br><br>
            <span class=" fucsia" style="font-size:15px"><b>7. Ayudas Técnicas</b></span>
            <br><br>
            <div>
                <table style="font-size:12px !important; width: 670px">
                    <tr>
                        <td style="border-top:none;height: 20px;width:150px"> PROTESIS DENTAL</td>
                        <td style="border-top:none" align="center"><input type="text" <?php IF(empty($enfermeria->enfProtesis) && $enfermeria->enfProtesis === '0')echo 'class="circuloCheck2"';ELSE echo 'class="circulo2"';?>> NO</td>
                        <td style="border-top:none" align="center"><input type="text" <?php IF(!empty($enfermeria->enfProtesis))echo 'class="circuloCheck2"';ELSE echo 'class="circulo2"';?>> SI</td>
                        <td style="border-top:none" align="left">&nbsp;<input type="text" <?php IF(!empty($enfermeria->enfProtesisInf))echo 'class="circuloCheck2"';ELSE echo 'class="circulo2"';?>> INFERIOR</td>
                        <td style="border-top:none" align="left">&nbsp;<input type="text" <?php IF(!empty($enfermeria->enfProtesisSup))echo 'class="circuloCheck2"';ELSE echo 'class="circulo2"';?>> SUPERIOR</td>
                        <td style="border-top:none" align="left">&nbsp;<input type="text" <?php IF(!empty($enfermeria->enfProtesisCom))echo 'class="circuloCheck2"';ELSE echo 'class="circulo2"';?>> COMPLETA</td>
                    </tr>
                    <tr>
                        <td style="height: 20px"> AUDÍFONOS</td>
                        <td align="center"><input type="text" <?php IF(empty($enfermeria->enfAudifono) && $enfermeria->enfAudifono === '0')echo 'class="circuloCheck2"';ELSE echo 'class="circulo2"';?>> NO</td>
                        <td align="center"><input type="text" <?php IF(!empty($enfermeria->enfAudifono))echo 'class="circuloCheck2"';ELSE echo 'class="circulo2"';?>> SI</td>
                        <td align="left">&nbsp;<input type="text" <?php IF(!empty($enfermeria->enfAudifonoIzq))echo 'class="circuloCheck2"';ELSE echo 'class="circulo2"';?>> IZQUIERDO</td>
                        <td align="left">&nbsp;<input type="text" <?php IF(!empty($enfermeria->enfAudifonoDer))echo 'class="circuloCheck2"';ELSE echo 'class="circulo2"';?>> DERECHO</td>
                        <td align="left">&nbsp;<input type="text" <?php IF(!empty($enfermeria->enfAudifonoAmb))echo 'class="circuloCheck2"';ELSE echo 'class="circulo2"';?>> AMBOS</td>
                    </tr>
                    <tr>
                        <td style="height: 20px"> OTROS</td>
                        <td colspan="5" align="left">&nbsp;<?php IF(!empty($enfermeria->enfOtro))echo $enfermeria->enfOtro;?></td>
                    </tr>
                </table>
            </div>
            <br><br>
            <span class=" fucsia" style="font-size:15px"><b>8. Necesidades Alteradas</b></span>
            <br><br>
            <div>
                <table style="font-size:13px !important; width: 670px">
                    <tr>
                        <td style="border-top:none;height: 15px;width:300px"> Retención</td>
                        <td style="border-top:none;width:150px" align="center"><input type="text" <?php IF(!empty($enfermeria->enfRetencion))echo 'class="circuloCheck2"';ELSE echo 'class="circulo2"';?>> SÍ</td>
                        <td style="border-top:none;width:150px" align="center"><input type="text" <?php IF(empty($enfermeria->enfRetencion) && $enfermeria->enfRetencion === '0')echo 'class="circuloCheck2"';ELSE echo 'class="circulo2"';?>> NO</td>
                    </tr>
                    <tr>
                        <td style="height: 15px;"> Incontinencia urinaria</td>
                        <td align="center"><input type="text" <?php IF(!empty($enfermeria->enfIncontinencia))echo 'class="circuloCheck2"';ELSE echo 'class="circulo2"';?>> SÍ</td>
                        <td align="center"><input type="text" <?php IF(empty($enfermeria->enfIncontinencia) && $enfermeria->enfIncontinencia === '0')echo 'class="circuloCheck2"';ELSE echo 'class="circulo2"';?>> NO</td>
                    </tr>
                    <tr>
                        <td style="height: 15px;"> Estreñimiento o constipación</td>
                        <td align="center"><input type="text" <?php IF(!empty($enfermeria->enfConstipacion))echo 'class="circuloCheck2"';ELSE echo 'class="circulo2"';?>> SÍ</td>
                        <td align="center"><input type="text" <?php IF(empty($enfermeria->enfConstipacion) && $enfermeria->enfConstipacion === '0')echo 'class="circuloCheck2"';ELSE echo 'class="circulo2"';?>> NO</td>
                    </tr>
                    <tr>
                        <td style="height: 15px;"> Diarrea</td>
                        <td align="center"><input type="text" <?php IF(!empty($enfermeria->enfDiarrea))echo 'class="circuloCheck2"';ELSE echo 'class="circulo2"';?>> SÍ</td>
                        <td align="center"><input type="text" <?php IF(empty($enfermeria->enfDiarrea) && $enfermeria->enfDiarrea === '0')echo 'class="circuloCheck2"';ELSE echo 'class="circulo2"';?>> NO</td>
                    </tr>
                    <tr>
                        <td style="height: 15px;"> Cantidad horas de sueño nocturno</td>
                        <td colspan="2" align="center"><input style=" border:none; width: 100%"type="text" <?php IF(!empty($enfermeria->enfSueno))echo $enfermeria->enfSueno;?>></td>
                    </tr>
                    <tr>
                        <td style="height: 15px;"> Interrupciones del sueño</td>
                        <td align="center"><input type="text" <?php IF(!empty($enfermeria->enfInterrupcion))echo 'class="circuloCheck2"';ELSE echo 'class="circulo2"';?>> SÍ</td>
                        <td align="center"><input type="text" <?php IF(empty($enfermeria->enfInterrupcion) && $enfermeria->enfInterrupcion === '0')echo 'class="circuloCheck2"';ELSE echo 'class="circulo2"';?>> NO</td>
                    </tr>
                    <tr>
                        <td style="height: 15px;"> Dificultad para conciliar sueño</td>
                        <td align="center"><input type="text" <?php IF(!empty($enfermeria->enfConciliar))echo 'class="circuloCheck2"';ELSE echo 'class="circulo2"';?>> SÍ</td>
                        <td align="center"><input type="text" <?php IF(empty($enfermeria->enfConciliar) && $enfermeria->enfConciliar === '0')echo 'class="circuloCheck2"';ELSE echo 'class="circulo2"';?>> NO</td>
                    </tr>
                    <tr>
                        <td style="height: 15px;"> Despertar precoz</td>
                        <td align="center"><input type="text" <?php IF(!empty($enfermeria->enfDespertar))echo 'class="circuloCheck2"';ELSE echo 'class="circulo2"';?>> SÍ</td>
                        <td align="center"><input type="text" <?php IF(empty($enfermeria->enfDespertar) && $enfermeria->enfDespertar === '0')echo 'class="circuloCheck2"';ELSE echo 'class="circulo2"';?>> NO</td>
                    </tr>
                    <tr>
                        <td style="height: 15px;"> Apetito</td>
                        <td align="center"><input type="text" <?php IF(!empty($enfermeria->enfApetito))echo 'class="circuloCheck2"';ELSE echo 'class="circulo2"';?>> SÍ</td>
                        <td align="center"><input type="text" <?php IF(empty($enfermeria->enfApetito) && $enfermeria->enfApetito === '0')echo 'class="circuloCheck2"';ELSE echo 'class="circulo2"';?>> NO</td>
                    </tr>
                </table>
            </div>
            <br><br>
            <div>
                <b>Nombre y Firma Equipo MirAndes (EU/TENS): ______________________________________________________</b>
                <br><br>
                <b>Fecha Ingreso Enfermeria: _______________________________________________________________________</b>
            </div>
            
            <div align="right" style="margin-top:-330px">
            <img style="width: 560px;bottom:30px;right:30px;opacity: 0.3" src="<?php echo base_url();?>../assets/img/cerros.png">
            </div>
        </blockquote>
</div>