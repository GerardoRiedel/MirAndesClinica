<?php 
                    //die(var_dump($datosApo[0]));
                        IF(!empty($datosApo[2]->apoNombre)){
                            foreach ($datosApo[2] as $con){
                                $nombreOtroContacto     = $datosApo[2]->apoNombre;
                                $parentescoOtroContacto = $datosApo[2]->apoParentesco;
                                $telUnoOtroContacto     = $datosApo[2]->apoTelefono;
                                $telDosOtroContacto     = $datosApo[2]->apoCelular;
                                IF($parentescoOtroContacto === '1')$parentescoOtroContacto='Padre';ELSEIF($parentescoOtroContacto === '2')$parentescoOtroContacto='Madre';ELSEIF($parentescoOtroContacto === '3')$parentescoOtroContacto='Hijo/a';ELSEIF($parentescoOtroContacto === '4')$parentescoOtroContacto='Conyuge';ELSEIF($parentescoOtroContacto === '5')$parentescoOtroContacto='Hermano/a';ELSEIF($parentescoOtroContacto === '6')$parentescoOtroContacto='Tío/a';ELSEIF($parentescoOtroContacto === '7')$parentescoOtroContacto='Primo/a';ELSEIF($parentescoOtroContacto === '8')$parentescoOtroContacto='Otro';
                            }
                        }
                        IF(empty($datosApo[0]->apoRut) && !empty($datosApo[1]->apoRut)){
                            foreach ($datosApo[1] as $apo){
                                $apoRut         = $datosApo[1]->apoRut;
                                $apoNombre      = $datosApo[1]->apoNombre;
                                $apoApePat      = $datosApo[1]->apoApePat;
                                $apoApeMat      = $datosApo[1]->apoApeMat;
                                $apoDireccion   = $datosApo[1]->apoDireccion;
                                $apoTelefono    = $datosApo[1]->apoTelefono;
                                $apoCelular     = $datosApo[1]->apoCelular;
                                $apoEmail       = $datosApo[1]->apoEmail;
                                $apoComuna      = $datosApo[1]->apoComuna;
                                $apoParentesco  = $datosApo[1]->apoParentesco;
                                
                                IF($apoParentesco  === '1')$apoParentesco = 'Padre';ELSEIF($apoParentesco  === '2')$apoParentesco = 'Madre';ELSEIF($apoParentesco  === '3')$apoParentesco = 'Hijo/a';ELSEIF($apoParentesco  === '4')$apoParentesco = 'Conyuge';ELSEIF($apoParentesco  === '5')$apoParentesco = 'Hermano/a';ELSEIF($apoParentesco  === '6')$apoParentesco = 'Tío/a';ELSEIF($apoParentesco  === '7')$apoParentesco = 'Primo/a';ELSE$apoParentesco = 'Otro';
                                $ecoRut         = $apoRut;
                                $ecoNombre      = $apoNombre;
                                $ecoApePat      = $apoApePat;
                                $ecoApeMat      = $apoApeMat;
                                $ecoDireccion   = $apoDireccion;
                                $ecoTelefono    = $apoTelefono;
                                $ecoCelular     = $apoCelular;
                                $ecoEmail       = $apoEmail;
                                $ecoComuna      = $apoComuna;
                                $ecoParentesco  = $apoParentesco;
                            }
                        }
                        ELSEIF(!empty($datosApo[0]->apoRut) && !empty($datosApo[1]->apoRut)){
                            
                                $apoRut         = $datosApo[0]->apoRut;
                                $apoNombre      = $datosApo[0]->apoNombre;
                                $apoApePat      = $datosApo[0]->apoApePat;
                                $apoApeMat      = $datosApo[0]->apoApeMat;
                                $apoDireccion   = $datosApo[0]->apoDireccion;
                                $apoTelefono    = $datosApo[0]->apoTelefono;
                                $apoCelular     = $datosApo[0]->apoCelular;
                                $apoEmail       = $datosApo[0]->apoEmail;
                                $apoComuna      = $datosApo[0]->apoComuna;
                                $apoParentesco  = $datosApo[0]->apoParentesco;
                                IF($apoParentesco  === '1')$apoParentesco = 'Padre';ELSEIF($apoParentesco  === '2')$apoParentesco = 'Madre';ELSEIF($apoParentesco  === '3')$apoParentesco = 'Hijo/a';ELSEIF($apoParentesco  === '4')$apoParentesco = 'Conyuge';ELSEIF($apoParentesco  === '5')$apoParentesco = 'Hermano/a';ELSEIF($apoParentesco  === '6')$apoParentesco = 'Tío/a';ELSEIF($apoParentesco  === '7')$apoParentesco = 'Primo/a';ELSE$apoParentesco = 'Otro';
                                

                                $ecoRut         = $datosApo[1]->apoRut;
                                $ecoNombre      = $datosApo[1]->apoNombre;
                                $ecoApePat      = $datosApo[1]->apoApePat;
                                $ecoApeMat      = $datosApo[1]->apoApeMat;
                                $ecoDireccion   = $datosApo[1]->apoDireccion;
                                $ecoTelefono    = $datosApo[1]->apoTelefono;
                                $ecoCelular     = $datosApo[1]->apoCelular;
                                $ecoEmail       = $datosApo[1]->apoEmail;
                                $ecoComuna      = $datosApo[1]->apoComuna;
                                $ecoParentesco  = $datosApo[1]->apoParentesco;
                                IF($ecoParentesco  === '1')$ecoParentesco = 'Padre';ELSEIF($ecoParentesco  === '2')$ecoParentesco = 'Madre';ELSEIF($ecoParentesco  === '3')$ecoParentesco = 'Hijo/a';ELSEIF($ecoParentesco  === '4')$ecoParentesco = 'Conyuge';ELSEIF($ecoParentesco  === '5')$ecoParentesco = 'Hermano/a';ELSEIF($ecoParentesco  === '6')$ecoParentesco = 'Tío/a';ELSEIF($ecoParentesco  === '7')$ecoParentesco = 'Primo/a';ELSE $ecoParentesco = 'Otro';
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


<div style="page-break-after: always;">
                    <div class="col-lg-10" align="right" style=" margin-right: 40px">
                    <img src="<?php echo base_url();?>../assets/img/mirAndes.png" class="logo">
                </div>
                    <br>
                    <blockquote>
                <div class="col-lg-12" align="center">
                    <h2>TOMA CONOCIMIENTO INDICACION DE CIUDADOR(A)</h2>
                </div>
                <div class="col-lg-10" align="right">
                    <?php 
                        $dia = date('d');$mes = date('m');$ano = date('Y');
                        if($mes==='10')$mes='Octubre';elseif($mes==='11')$mes='Noviembre';elseif($mes==='12')$mes='Diciembre';elseif($mes==='01')$mes='Enero';elseif($mes==='02')$mes='Febrero';elseif($mes==='03')$mes='Marzo';elseif($mes==='04')$mes='Abril';elseif($mes==='05')$mes='Mayo';elseif($mes==='06')$mes='Junio';elseif($mes==='07')$mes='Julio';elseif($mes==='08')$mes='Agosto';elseif($mes==='09')$mes='Septiembre';
                            echo '<br>Providencia, '.$dia.' de '.$mes.' de '.$ano.'<br>';
                    ?>
                </div>
                <br>
                <div class="col-lg-12" align="justify">
                    &nbsp;&nbsp;&nbsp;&nbsp;El paciente individualizado como <label><?php echo strtoupper($datos->nombres).' '.strtoupper($datos->apellidoPaterno).' '.strtoupper($datos->apellidoMaterno);?></label> Rut <label><?php echo formatearRut($datos->rut);?></label>, declara que ha sido informado por Clínica MirAndes de lo siguiente:
                    <br>
                    &nbsp;&nbsp;&nbsp;&nbsp;Que la indicación de cuidador(a) personal por 12 ó 24 horas, es una decisión que el médico tratante realiza de acuerdo al estado y evolución del paciente, y puede ser dada al ingreso del paciente a la Clínica o durante el proceso de hospitalización, de acuerdo a su evolución. Para el cumplimiento de la indicación terapéutica de cuidador(a), MirAndes mantiene convenios con empresas externas proveedoras de esta clase de servicios, con las cuales no tiene ninguna relación comercial. Los turnos convenidos con dichos proveedores son de 12 horas y los <b>valores</b> son <b>estimados</b> y pueden variar de acuerdo al proveedor.
                    La jornada o turno que realice una cuidadora contratada para el paciente, deberá ser pagado en el tiempo y forma en que el paciente o algún familiar acuerde con la empresa proveedora.
                    <br>
                    &nbsp;&nbsp;&nbsp;&nbsp;El control de la asistencia del cuidador(a) a los turnos, se hará mediante libro de firmas que el efecto mantendrá MirAndes.
                    <br><br>
                    <h3>SOBRE EL RECHAZO DE CUIDADOR(A)</h3>
                    &nbsp;&nbsp;&nbsp;&nbsp;El no cumplimiento de la indicación de cuidador(a) puede poner en riesgo la seguridad del paciente y de la Clínica, por lo que Mirandesse reserva el derecho de admitir o no su ingreso, o a solicitar su alta médica, si la indicación se produce durante la hospitalización.
                    <br>
                    &nbsp;&nbsp;&nbsp;&nbsp;Clínica Mirandes siempre trabaja y vela por la calidad del cuidado de sus pacientes hospitalizados, sin embargo no cuenta con personal de enfermería para observar y vigilar a un paciente que requiere supervisión alta o intensiva, según los estándares de observación National Institute for Health and Care Excellence(NICE);
                    Mirandes entrega a su pacientes los cuidados generales y un nivel de observación y vigilancia intermedio, acordes con las supervisión que requiere la mayoría de los pacientes con patología de salud mental que requiere hospitalización.
                    <br><br><br>
                    <h3>FIRMA DE QUIEN TOMA CONOCIMIENTO Y RESPONSABILIDAD</h3>
                    <br>
                    <h3>TOMA CONOCIMIENTO INDICACION DE CUIDADOR(A)</h3>
                    <br><br>
                    NOMBRE DEL PACIENTE: <b><?php echo strtoupper($datos->nombres).' '.strtoupper($datos->apellidoPaterno).' '.strtoupper($datos->apellidoMaterno);?></b>
                    <br>
                    C.I. N° <?php echo formatearRut($datos->rut);?> &nbsp;&nbsp;FIRMA.............................
                    <br><br>
                    NOMBRE DEL APODERADO DEL PACIENTE: <b><?php IF(!empty($apoNombre))echo strtoupper($apoNombre).' '.strtoupper($apoApePat).' '.strtoupper($apoApeMat);ELSE echo '...............................................' ?></b>
                    <br>
                    C.I. N° <?php IF(!empty($apoRut))echo formatearRut($apoRut);ELSE echo '.............................'?> &nbsp;&nbsp;FIRMA.............................
                    <br><br><br>
                    Yo, ............................................................................ Rut: ..........................................., he sido testigo que se ha entregado y leído el consentimiento por el familiar y el paciente. Certifico que las personas que aquí firman son las que dicen ser, lo que he verificado con sus respectivas cédulas de identidad.
                    
                </div>
                <div align="right" style="margin-top:-250px">
                    <img style="width: 560px;bottom:30px;right:30px;opacity: 0.4" src="<?php echo base_url();?>../assets/img/cerros.png">
                </div>
                <div style="transform: rotate(-90deg);top:-360px;left:340px;position: relative;width:700px;">
                        <span style=" font-size: 9px;opacity: 0.6">
                            PACIENTE: <label><?php echo strtoupper($datos->nombres).' '.strtoupper($datos->apellidoPaterno).' '.strtoupper($datos->apellidoMaterno);?></label> &nbsp;&nbsp;
                            RUT: <label><?php echo formatearRut($datos->rut);?></label> &nbsp;&nbsp;
                            FICHA: <label> <?php echo $datos->ficha; ?></label>
                        </span> 
                    </div>
                    </blockquote>
                </div>
                