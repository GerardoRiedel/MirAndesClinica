<?php 
                    //die(var_dump($datosApo[1]));
                        IF(!empty($datosApo[2]->apoNombre)){
                            foreach ($datosApo[2] as $con){
                                $nombreOtroContacto     = $datosApo[2]->apoNombre;
                                $parentescoOtroContacto = $datosApo[2]->apoParentesco;
                                $telUnoOtroContacto     = $datosApo[2]->apoTelefono;
                                $telDosOtroContacto     = $datosApo[2]->apoCelular;
                                IF($parentescoOtroContacto === '1')$parentescoOtroContacto='Padre';ELSEIF($parentescoOtroContacto === '2')$parentescoOtroContacto='Madre';ELSEIF($parentescoOtroContacto === '3')$parentescoOtroContacto='Hijo/a';ELSEIF($parentescoOtroContacto === '4')$parentescoOtroContacto='Conyuge';ELSEIF($parentescoOtroContacto === '5')$parentescoOtroContacto='Hermano/a';ELSEIF($parentescoOtroContacto === '6')$parentescoOtroContacto='Tío/a';ELSEIF($parentescoOtroContacto === '7')$parentescoOtroContacto='Primo/a';ELSEIF($parentescoOtroContacto === '8')$parentescoOtroContacto='Otro';
                            }
                        }
                        IF(empty($datosApo[0]->apoRut) && !empty($datosApo[1]->apoRut)){die;
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
                        ELSEIF(!empty($datosApo[0]->apoRut) && empty($datosApo[1]->apoRut)){
                            
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
                                

                                $ecoRut         = $datosApo[0]->apoRut;
                                $ecoNombre      = $datosApo[0]->apoNombre;
                                $ecoApePat      = $datosApo[0]->apoApePat;
                                $ecoApeMat      = $datosApo[0]->apoApeMat;
                                $ecoDireccion   = $datosApo[0]->apoDireccion;
                                $ecoTelefono    = $datosApo[0]->apoTelefono;
                                $ecoCelular     = $datosApo[0]->apoCelular;
                                $ecoEmail       = $datosApo[0]->apoEmail;
                                $ecoComuna      = $datosApo[0]->apoComuna;
                                $ecoParentesco  = $datosApo[0]->apoParentesco;
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
    
                    <div class="col-lg-10" align="left" style=" margin-left: 40px">
                    <img src="<?php echo base_url();?>../assets/img/mirAndes.png" class="logo">
                </div>
                    <br>
                    <blockquote>
                <div class="col-lg-12" align="center">
                    <h3><u>CONSENTIMIENTO INFORMADO PARA LA APLICACIÓN<BR>DE TERAPIA ELECTROCONVULSIVA (T.E.C), MIRANDES CE</u></h3>
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
                    Paciente: <label><?php echo strtoupper($datos->nombres).' '.strtoupper($datos->apellidoPaterno).' '.strtoupper($datos->apellidoMaterno);?></label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Rut: <label><?php echo formatearRut($datos->rut);?></label>
                    <br>
                    Diagnóstico: <label><?php IF(!empty($datos->tecDiagnostico))echo strtoupper($datos->tecDiagnostico).'&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp';ELSE echo '...........................................................';?></label> Edad: <label><?php echo $edad;?></label>
                    <br><br>
                    <b>La terapia electroconvulsiva (T.E.C) es una opción terapéutica adecuada en ciertas enfermedades psiquiatricas como por ejemplo: riesgo grave de suicido, esquizofrenia catatónica y otros trastornos psiquiatricos resistentes a tratamientos farmacológicos.</b>
                    <br><br>
                    &#8226; Consiste en aplicar un estímulo eléctrico modificado de baja intensidad, proporcionado por una máquina especializada para este tipo de procedimiento, durante unos segundos sobre la cabeza. Se hace bajo anestesia general con relajación muscular. El paciente está dormido, no sufre dolores ni molestias durante el procedimiento.
                    <br>
                    &#8226; El procedimiento se realiza 3 veces por semana y entre unas 6 a 12 veces según el caso.
                    <br>
                    &#8226; En términos generales, la seguridad y la eficacia de la TEC están muy bien establecidas, siendo los beneficios de su aplicacion muy superiores a los posibles inconvenientes, sobre todo en los casos en que hay riesgo inmediato para el paciente en caso de no tratar rápidamente el cuadro clínico que padece, ya que habitualmente su acción es más rápida que otras modalidades como las farmacológicas.
                    <br>
                    &#8226; El tratamiento con medicamentos puede estar también indicado y ser eficaz, pero tiene sus propios riesgos y complicaciones y no es, generalmente, más seguro que la TEC.
                    <br>
                    &#8226; Tras la sesión de TEC el paciente puede despertarse confuso, con dolor de cabeza y muscular, desapareciendo estos sintomas en pocas horas o con analgésicos habituales.
                    <br>
                    &#8226; Durante en período de tiempo que se mantien la TEC, puede producirse una disminución de memoria principalmente para hechos cercanos, que puede ser mayor al final del tratamiento, pero al acabar la TEC la memoria empieza a rrecuperarse y 6 meses después es prácticamente normal en la mayoria de los pacientes. No se han descrito efectos a largo plazo sobre la capacidad de memoria o intelectual relacionados con la TEC.
                    <br>
                    &#8226; Debido a que es un procedimiento que se realiza bajo anestesia, es necesario además tener en consideración los riesgos derivados de ésta.
                    <br>
                    &#8226; Regulado según lo establecido en el artículo 14 de la Ley N&deg; 20.584, que regula los derechos y deberes que tiene las personas en relación con las acciones vinculadas a su atención de salud.
                    <br><br><br>
                    
                    <h3>Por lo tanto y habiendo leido lo anterior DECLARO:</h3>
                    <br><br>
                    &#8226; Que, se ha garantizado mi derecho a realizar las preguntas acerca de mi condición de salud y formas alternativas de tratamiento, asi como los riesgos inherentes al procedimiento indicado, con lo cual dispongo de toda la información necesaria para dar mi consentimiento.
                    <br>
                    &#8226; Conocer y comprender satisfactoriamente los propósitos de este procedimiento y/o intervención y sus riesgos. Se me ha permitido hacer todas las observaciones y preguntas aclaratorias.
                    <br>
                    &#8226; Manifiesto en este acto estas satisfecho(a) con la información recibida y otorgo mi consentimiento para someterme o no al procedimiento de terapia electroconvulsiva.
                    <br><br><br><br><br>
                    <div class="col-lg-12" align="right"> Página <b>1</b> de <b>2</b></div>
                </div>  
                
                
 <div style="page-break-before: always;">
    
                    <div class="col-lg-10" align="left" style=" margin-left: 40px">
                    <img src="<?php echo base_url();?>../assets/img/mirAndes.png" class="logo">
                </div>
                    <br>
                    <blockquote>
                <div class="col-lg-12" align="center">
                    <h3><u>CONSENTIMIENTO INFORMADO PARA LA APLICACIÓN<BR>DE TERAPIA ELECTROCONVULSIVA (T.E.C), MIRANDES CE</u></h3>
                </div>
                
                <br>
                <div class="col-lg-12" align="justify">                   
                    <b>CONSIENTO</b> que se me realice la APLICACIÓN DE LA T.E.C
                    <br><br>
                    Fecha: <?php echo '..... de '.$mes.' de '.$ano;?>
                    <br>
                    Nombre Paciente: <label>...............................................................</label>
                    <!--
                    Nombre Paciente: <label><?php echo strtoupper($datos->nombres).' '.strtoupper($datos->apellidoPaterno).' '.strtoupper($datos->apellidoMaterno);?></label>
                    -->
                    <div class="col-lg-12" align="right" style="margin-top: -13px"> Firma: ....................................</div>
                    Rut: <label>........................</label>
                    <!--
                    Rut: <label><?php echo formatearRut($datos->rut);?></label>
                    -->
                    <br>
                    Nombre Apoderado: <label>............................................................</label>
                    <!--
                    Nombre Apoderado: <label><?php echo strtoupper($apoNombre).' '.strtoupper($apoApePat).' '.strtoupper($apoApeMat);?></label>
                    -->
                    <div class="col-lg-12" align="right" style="margin-top: -13px"> Firma: ....................................</div>
                    Rut: <label>........................</label>
                    <!--
                    Rut: <label><?php echo formatearRut($apoRut);?></label>
                    -->
                    <br>
                    Médico Tratante: <label><?php echo strtoupper($datos->nombresmedicoAsignado).' '.strtoupper($datos->apellidomedicoAsignado).' '.strtoupper($datos->apellidoMmedicoAsignado);?></label>
                    <div class="col-lg-12" align="right" style="margin-top: -13px"> Firma: ....................................</div>
                    Rut: <label><?php echo formatearRut($datos->rutmedico);?></label>
                    <br><br><br>
                    
                    <b>RECHAZO</b> que se me realice la APLICACIÓN DE LA T.E.C
                    <br><br>
                    He sido informado de los beneficios y riesgos que esperan de la aplicación de la TEC e igualmente las consecuencias que se derivan de su no realización. He comprendido toda la información que se me ha proporcionado y mis dudas han sido resueltas, <b>declaro mi negativa</b> para que se realice el procedimiento, asumiendo todas las complicaciones que de esta desición puedan derivarse.
                    <br><br>
                    Fecha: <?php echo '..... de '.$mes.' de '.$ano;?>
                    <br>
                    Nombre Paciente: <label>...............................................................</label>
                    <!--
                    Nombre Paciente: <label><?php echo strtoupper($datos->nombres).' '.strtoupper($datos->apellidoPaterno).' '.strtoupper($datos->apellidoMaterno);?></label>
                    -->
                    <div class="col-lg-12" align="right" style="margin-top: -13px"> Firma: ....................................</div>
                    Rut: <label>........................</label>
                    <!--
                    Rut: <label><?php echo formatearRut($datos->rut);?></label>
                    -->
                    <br>
                    Nombre Apoderado: <label>............................................................</label>
                    <!--
                    Nombre Apoderado: <label><?php echo strtoupper($apoNombre).' '.strtoupper($apoApePat).' '.strtoupper($apoApeMat);?></label>
                    -->
                    <div class="col-lg-12" align="right" style="margin-top: -13px"> Firma: ....................................</div>
                    Rut: <label>........................</label>
                    <!--
                    Rut: <label><?php echo formatearRut($apoRut);?></label>
                    -->
                    <br>
                    Médico Tratante: <label><?php echo strtoupper($datos->nombresmedicoAsignado).' '.strtoupper($datos->apellidomedicoAsignado).' '.strtoupper($datos->apellidoMmedicoAsignado);?></label>
                    <div class="col-lg-12" align="right" style="margin-top: -13px"> Firma: ....................................</div>
                    Rut: <label><?php echo formatearRut($datos->rutmedico);?></label>
                    <br><br><br>
                    
                    <b>REVOCACIÓN</b>, por el presente acto expreso mi voluntad de <b>Revocar el Consentimiento</b>, de la aplicación de TEC. Me han sido explicados en detalle y lenguaje comprensible los riesgos y perjuicios que dicha decisión implica para mi salud actual y futura.
                    <br><br>
                    Fecha: <?php echo '..... de ................... de '.$ano;?>
                    <br>
                    Nombre Paciente: <label>...............................................................</label>
                    <!--
                    Nombre Paciente: <label><?php echo strtoupper($datos->nombres).' '.strtoupper($datos->apellidoPaterno).' '.strtoupper($datos->apellidoMaterno);?></label>
                    -->
                    <div class="col-lg-12" align="right" style="margin-top: -13px"> Firma: ....................................</div>
                    Rut: <label>........................</label>
                    <!--
                    Rut: <label><?php echo formatearRut($datos->rut);?></label>
                    -->
                    <br>
                    Nombre Apoderado: <label>............................................................</label>
                    <!--
                    Nombre Apoderado: <label><?php echo strtoupper($apoNombre).' '.strtoupper($apoApePat).' '.strtoupper($apoApeMat);?></label>
                    -->
                    <div class="col-lg-12" align="right" style="margin-top: -13px"> Firma: ....................................</div>
                    Rut: <label>........................</label>
                    <!--
                    Rut: <label><?php echo formatearRut($apoRut);?></label>
                    -->
                    <br>
                    Médico Tratante: <label><?php echo strtoupper($datos->nombresmedicoAsignado).' '.strtoupper($datos->apellidomedicoAsignado).' '.strtoupper($datos->apellidoMmedicoAsignado);?></label>
                    <div class="col-lg-12" align="right" style="margin-top: -13px"> Firma: ....................................</div>
                    Rut: <label><?php echo formatearRut($datos->rutmedico);?></label>
                    <br><br><br>
                    
                    <b>Médico que realiza la Terapia Electroconvulsiva:</b> ...................................
                    <div class="col-lg-12" align="right" style="margin-top: -13px"> <b>Firma:</b> .......................</div>
                    <br><b>Rut:</b> ...........................................
                    
                    <br><br><br><br><br>
                    <div class="col-lg-12" align="right"> Página <b>2</b> de <b>2</b></div>
                </div>
                    </blockquote>
</div>
                