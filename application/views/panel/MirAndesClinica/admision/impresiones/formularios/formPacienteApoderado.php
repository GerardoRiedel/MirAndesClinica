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
                                $apoComuna      = $datosApo[1]->comuna;
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
                            foreach ($datosApo[0] as $apo){
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
                                $apoComuna      = $datosApo[0]->comuna;
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
                                $ecoComuna      = $datosApo[1]->comuna;
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

<style>
    .cerros {position: absolute; height: 360px;width: 560px;bottom:30px;right:30px;opacity: 0.4}
</style>

<div style="page-break-after: always;">
            <div class="col-lg-10" align="right" style="margin-right: 40px">
                <img src="<?php echo base_url();?>../assets/img/mirAndes.png" class="logo">
            </div>
        <blockquote>
                            <div class="col-lg-1" align="left">
                                <h2>ALERGIAS: </h2><h2 style="color: red; margin-top: -39px;margin-left: 110px"><?php IF (!empty($datos->alergia))echo strtoupper($datos->alergia); ELSE echo '..........';?></h2>
                            </div>
                            <div class="col-lg-12" align="center">
                                <h2>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;N° FICHA: <?php echo $datos->ficha; ?>&nbsp;&nbsp;&nbsp;&nbsp;N° PISO: <?php IF(!empty($datos->piso))echo $datos->piso;ELSE echo '..........' ?></h2>
                            </div>
                            <div class="col-lg-12" align="center">
                                <h2> FORMULARIO DE IDENTIFICACION DE PACIENTE Y APODERADO</h2>
                            </div>
                <br>
                            <div class="col-lg-10" align="right">
                                <label>FECHA INGRESO: </label> <?php IF(!empty($fecha))echo $fecha;?>
                            </div>
                            <div class="col-lg-10" align="right">
                                <label>FECHA TERMINO LICENCIA: </label> <?php IF(!empty($licencia))echo $licencia;?>
                            </div>
                <!--
                            <div class="col-lg-10" align="right">
                                <label>ALERGIAS: </label> <?php IF (!empty($datos->alergia))echo $datos->alergia; ELSE echo '..........';?>
                            </div>
                -->
                <br>
                            <div class="col-lg-12" align="left">
                                <label>Nombre del Paciente: </label>&nbsp;<?php echo strtoupper($datos->nombres).' '.strtoupper($datos->apellidoPaterno).' '.strtoupper($datos->apellidoMaterno);?>
                            </div>
                <br>
                            <div class="col-lg-12">
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
                                <label>Rut: </label><?php IF($datos->nacionalidad !== '2')echo formatearRut($datos->rut); ELSE echo $datos->rut; ?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label>Edad:</label> <?php echo $edad;?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label>Isapre: </label><?php echo strtoupper($datos->isapreNombre);?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label>Titular: </label><?php IF(!empty($datos->rutTitular))echo formatearRut($datos->rutTitular); ?>
                            </div>
                <br>
                            <div class="col-lg-12" align="left">
                                <label>Dirección: </label><?php IF(!empty($datos->direccion))echo strtoupper($datos->direccion); ?>
                            </div>
                            <div class="col-lg-12" align="right" style=" margin-top:-15px">
                                <label>Comuna: </label><?php IF(!empty($datos->comuna))echo strtoupper($datos->comuna); ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            </div>
                <br>
                            <div class="col-lg-12">
                                <label>Teléfono Fijo: </label><?php IF(!empty($datos->telefono))echo $datos->telefono; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label>Móvil: </label><?php IF(!empty($datos->celular))echo $datos->celular; ?></label>
                            </div>
                <br>
                            <div class="col-lg-12">
                                <label>Fecha de Nacimiento:</label> <?php echo $fecha ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label>Nacionalidad: </label><?php IF ($datos->nacionalidad === '2') echo 'EXTRANJERO'; ELSE echo 'CHILENA'; ?></label>
                            </div>
                <br>
                            <div class="col-lg-12">
                                <label>Diagnóstico: </label><?php echo strtoupper($datos->diagnostico); ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label>Ocupación: </label><?php echo strtoupper($datos->ocupacion); ?>
                            </div>
                <br>
                            <div class="col-lg-12">
                                <label>Correo Electrónico: </label><?php echo strtoupper($datos->email); ?>
                            </div>
                <br>
                            <div class="col-lg-12">
                                <label>Información Adicional: </label><?php echo strtoupper($datos->comentario); ?>
                            </div>
                <br>
                            <div class="col-lg-6" >
                                <label>En caso de emergencia médica, derivar a: </label><?php echo strtoupper($datos->emergenciaDerivar); ?>
                            </div>
                <?php IF (strlen($datos->emergenciaDerivar)>16 )$div = "-5";ELSE $div = "-15" ;?>
                            <div class="col-lg-6" align="right" style=" margin-right: 80px; margin-top: <?php echo $div;?>px">
                                <label>FIRMA PACIENTE: </label>......................
                            </div>
                <br>
                            <div class="col-lg-12">
                                <label>Médico Tratante: </label><?php echo strtoupper($datos->nombresmedicoAsignado).' '.strtoupper($datos->apellidomedicoAsignado); ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label>Alimentación: </label><?php IF(!empty($datos->regimen))echo strtoupper($datos->regimen);ELSE echo '_______________' ?>
                            </div>
                <br>
            <!--APODERADO NORMAL-->
                            <div class="col-lg-12" ><hr></div>
                <br>
                            <div class="col-lg-6" style=" margin-bottom: -15px">
                                <label>Nombre Apoderado: </label><?php echo strtoupper($apoNombre).' '.strtoupper($apoApePat).' '.strtoupper($apoApeMat) ?> 
                            </div>
                            <div class="col-lg-6" align="right" style=" margin-right: 80px">
                                <label>FIRMA: </label>......................
                            </div>
                <br>
                            <div class="col-lg-12">
                                <label>Rut: </label><?php IF(!empty($apoRut))echo formatearRut($apoRut); ?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label>Parentesco:</label> <?php echo strtoupper($apoParentesco);?>
                            </div>
                <br>
                            <div class="col-lg-12">
                                <label>Teléfono Fijo: </label><?php echo $apoTelefono?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label>Móvil: </label><?php echo $apoCelular;?>
                            </div>
                <br>
                            <div class="col-lg-12">
                                <label>Dirección: </label> <?php echo strtoupper($apoDireccion).', '.strtoupper($apoComuna)?>
                            </div>
                <br>
                            <div class="col-lg-12">
                                <label>Correo Electrónico: </label><?php echo strtoupper($apoEmail)?>
                            </div>
                <br>
                            <div class="col-lg-12">
                                <label>Otro número de contacto en caso de emergencia: </label><?php IF(!empty($telUnoOtroContacto))echo $telUnoOtroContacto;IF(!empty($telDosOtroContacto))echo ' - '.$telDosOtroContacto?>
                            </div>
                <br>
                            <div class="col-lg-6" style=" margin-bottom: -15px">
                                <label>Nombre y Parentesco: </label><?php IF(!empty($nombreOtroContacto))echo strtoupper($nombreOtroContacto);IF(!empty($parentescoOtroContacto))echo ' - '.strtoupper($parentescoOtroContacto);?>
                            </div>
                            <div class="col-lg-6" align="right" style=" margin-right: 80px">
                                <label>FIRMA: </label>......................
                            </div>
                <br>

                            <!--APODERADO ECONOMICO-->
                            <div class="col-lg-12" ><hr></div>
                <br><br>
                            <div class="col-lg-6" style=" margin-bottom: -15px">
                                <label>Nombre Apoderado Economico: </label><?php echo strtoupper($ecoNombre).' '.strtoupper($ecoApePat).' '.strtoupper($ecoApeMat); ?> 
                            </div>
                            <div class="col-lg-6" align="right" style=" margin-right: 80px">
                                <label>FIRMA: </label>......................
                            </div>
                <br>
                            <div class="col-lg-12">
                                <label>Rut: </label><?php IF(!empty($ecoRut))echo formatearRut($ecoRut); ?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label>Parentesco: </label><?php echo strtoupper($ecoParentesco);?>
                            </div>
                <br>
                            <div class="col-lg-12">
                                <label>Teléfono Fijo: </label><?php echo $ecoTelefono?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label>Móvil: </label><?php echo $ecoCelular;?>
                            </div>
                <br>
                            <div class="col-lg-12">
                                <label>Dirección: </label><?php echo strtoupper($ecoDireccion).', '.strtoupper($ecoComuna);?>
                            </div>
                <br>
                            <div class="col-lg-12">
                                <label>Correo Electrónico: </label><?php echo strtoupper($ecoEmail)?>
                            </div>
                <div align="right" style="margin-top:-330px">
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
    