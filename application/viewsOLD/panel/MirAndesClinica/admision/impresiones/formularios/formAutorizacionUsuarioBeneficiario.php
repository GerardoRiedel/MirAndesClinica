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
                    
                    <div class="col-lg-10" align="left">
                        <img src="<?php echo base_url();?>../assets/img/logo_vertical_cetep.png" class="logo">
                    </div>
                    <blockquote>
                    <div class="subir">
                        <div class="col-lg-10" align="right">
                            <?php 
                                $dia = date('d');$mes = date('m');$ano = date('Y');
                                if($mes==='10')$mes='Octubre';elseif($mes==='11')$mes='Noviembre';elseif($mes==='12')$mes='Diciembre';elseif($mes==='1')$mes='Enero';elseif($mes==='2')$mes='Febrero';elseif($mes==='3')$mes='Marzo';elseif($mes==='4')$mes='Abril';elseif($mes==='5')$mes='Mayo';elseif($mes==='6')$mes='Junio';elseif($mes==='7')$mes='Julio';elseif($mes==='8')$mes='Agosto';elseif($mes==='9')$mes='Septiembre';
                                echo '<br>Providencia, '.$dia.' de '.$mes.' de '.$ano.'<br>';
                            ?>
                        </div>

                        <div class="col-lg-12" align="center">
                            <h2>AUTORIZACION<br>(Usuario/Beneficiario)</h2>
                        </div>
                        <br>
                                <?php 
                                    IF($datos->fechaNacimiento !== '0000-00-00'){
                                        $edad = calculaedad($datos->fechaNacimiento);
                                        $date = new DateTime($datos->fechaNacimiento);
                                        $fecha = $date->format('d-m-Y');
                                    }
                                    ELSE {
                                        $fecha = '--/--/----';
                                        $edad  = '-';
                                    }
                                ?>
                        <div class="col-lg-12" align="justify">
                            Yo, <label><?php echo $apoNombre.' '.$apoApePat.' '.$apoApeMat ?></label>, R.U.T: <label><?php echo formatearRut($apoRut) ?></label>, domiciliado en <label><?php echo $apoDireccion ;?></label> Comuna de <label><?php echo $apoComuna ;?></label>. <label>Apoderado/a</label> del Sr(a) <label><?php echo $datos->nombres.' '.$datos->apellidoPaterno.' '.$datos->apellidoMaterno;?></label> Rut <label><?php echo formatearRut($datos->rut);?></label>, nacido/a el <label><?php echo $fecha;?></label>, domiciliado en <label><?php echo $datos->direccion;?></label> comuna de <label><?php echo $datos->comuna;?></label>.
                            Usuario/a de CETEP ASOCIADOS SPA., en adelante CETEP, y de acuerdo con el artículo 3° de la ley N° 20.584, autorizo lo siguiente:
                            <br><br>
                            1)<blockquote>Que médicos del Staff de CETEP accedan a la información de la ficha clínica que de mi mantenga la misma identidad, al igual que le personal administrativo de ella, todos los cuales deberán guardar debida reserva de mis datos sensibles.</blockquote>
                            <br>
                            2)<blockquote>Que CETEP gestione en mi representación ante la Isapre <label><?php echo $datos->isapreNombre;?></label>, del cual soy beneficiario, los trámites relacionados con la autorización y cobro del programa de Atención Médica de Garantía GES, correspondiente a Evaluaciones, Hospitalización y otras Prestaciones en <label>Clínica MirAndes</label> facultando a CETEP a retirar de dicha Isapre los bonos correspondientes, los cuales me obligo a no retirar personalmente, sino solo a través del personal de CETEP, el cual me entregará
                            una copia de tales documentos de ser solicitados. Asimismo, autorizo a CETEP para que, efectúe copagos y/o pagos asociados a las prestaciones y otros que corresponda realizar ante la mencionada Isapre en relación con dicho "Programa de Atención Médica".</blockquote>
                            <br><br>
                            Declaro haber sido informado de mis derechos como paciente y que para requerir información sobre mi Evaluación, tratamiento y hospitalización y copia de documentos, debo contactarme con la Unidad de Gestión de Hospitalización de CETEP al fono (02) 24068775.
                            <br><br><br><br><br><br>
                            <div class="col-lg-6" align="left" style=" margin-left: 80px">
                            Firma: ...........................<br><br>
                            R.U.T: <?php echo formatearRut($datos->rut);?>
                            </div>
                            <div class="col-lg-6" align="right" style=" margin-right: 200px">
                                Huella
                            </div>
                        </div>
                    </div>
                    </blockquote>
                </div>
                