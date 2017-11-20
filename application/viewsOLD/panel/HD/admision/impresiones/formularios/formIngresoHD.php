<?php 
                    
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
    .cuboC {text-align: left; vertical-align: top; width:200px;height: 135px;border:1px solid black; text-align: top;border-radius: 10px}
    .cubo5 {text-align: left; vertical-align: top; width:500px;height: 135px;border:1px solid black; text-align: top;border-radius: 10px}
    span {font-size: 12px; font-family: arial}
    .cerros {position: absolute; height: 360px;width: 560px;bottom:30px;right:30px;opacity: 0.4}
</style>

<div style="page-break-after: always;">
            <div class="col-lg-12" align="right" style="margin-right: 40px">
                <img src="<?php echo base_url();?>../assets/img/mirAndes.png" class="logo">
            </div>
        <blockquote>
            
            <div style="margin-top:-28px">
                <?php IF($datos->tipoIngreso === '2'){?>
                <h2 class="fucsia">HOSPITAL DE DÍA</h2>
                <?php }ELSEIF($datos->tipoIngreso === '3'){?>
                <h2 class="fucsia">REHABILITACIÓN</h2>
                <?php }?>
            </div>
            
            <div style="margin-top:-13px" class="hr">
            </div>
            <div style="margin-top:-13px">
                <?php IF($datos->tipoIngreso === '2'){?>
                <h3 class="fucsia" >Registros de Intervenciones</h3>
                <?php }ELSEIF($datos->tipoIngreso === '3'){?>
                <h3 class="fucsia">Centro de Rehabilitacion Psicosocial</h3>
                <?php }?>
            </div>
            <br><br><br>
            <div style="margin-top:-13px">
                <h4 class="fucsia" >NOMBRE USUARIO/A: <span style="color:black"><?php IF (!empty($datos->nombres))echo strtoupper($datos->nombres).' '.strtoupper($datos->apellidoPaterno).' '.strtoupper($datos->apellidoMaterno);?></span></h4>
            </div>
            
            <div style="margin-top:-13px" class="hr2">
            </div>
            <div style="margin-top:8px">
                <span>RUT: </span><span style="color:black"><?php IF(!empty($datos->rut))echo formatearRut($datos->rut);?></span>
            </div>
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
            <div style="margin-top:-13px;margin-left: 320px">
                <span>F. NACIMIENTO: </span><span style="color:black"><?php IF(!empty($fecha))echo ($fecha);?></span>
            </div>
             
            
            <div class="hr2">
            </div>
            <div style="margin-top:8px">
                <span>EDAD: </span><span style="color:black"><?php IF(!empty($edad))echo strtoupper($edad);?></span>
            </div>
            <div style="margin-top:-13px;margin-left: 320px">
                <span>OCUPACIÓN: </span><span style="color:black"><?php IF(!empty($datos->ocupacion))echo strtoupper($datos->ocupacion);?></span>
            </div>
             
            
            <div class="hr2">
            </div>
            <div style="margin-top:8px">
                <span>DIRECCIÓN: </span><span style="color:black"><?php IF(!empty($datos->direccion))echo strtoupper($datos->direccion);?></span>
            </div>
             
            <div class="hr2">
            </div>
            <div style="margin-top:8px">
                <span>COMUNA: </span><span style="color:black"><?php IF(!empty($datos->comuna))echo strtoupper($datos->comuna);?></span>
            </div>
            <div style="margin-top:-13px;margin-left: 320px" >
                <span>ISAPRE: </span><span style="color:black"><?php IF(!empty($datos->isapreNombre))echo strtoupper($datos->isapreNombre);?></span>
            </div>
              
            
            <div class="hr2">
            </div>
            <div style="margin-top:8px">
                <span>TELÉFONO CONTACTO: </span><span style="color:black"><?php IF(!empty($datos->celular))echo strtoupper($datos->celular);ELSEIF(!empty($datos->telefono))echo strtoupper($datos->telefono);?></span>
            </div>
             
            
            <div class="hr2">
            </div>
            <div style="margin-top:8px">
                <span>CORREO ELECTRÓNICO: </span><span style="color:black"><?php IF(!empty($datos->email))echo strtoupper($datos->email);?></span>
            </div>
            <div class="hr2">
            </div>
            
            
            
            
            
            <br><br>
            
            <div style="margin-top:-13px">
                <h4 class="fucsia" >FAMILIAR RESPONSABLE: <span style="color:black"><?php IF(!empty($apoNombre))echo strtoupper($apoNombre).' '.strtoupper($apoApePat).' '.strtoupper($apoApeMat);?></span></h4>
            </div>
            
            <div style="margin-top:-13px" class="hr2">
            </div>
            <div style="margin-top:8px">
                <span>RUT: </span><span style="color:black"><?php IF(!empty($apoRut))echo formatearRut($apoRut);?></span>
            </div>
            <div style="margin-top:-13px;margin-left: 320px" >
                <span>RELACIÓN: </span><span style="color:black"><?php IF(!empty($apoParentesco))echo strtoupper($apoParentesco);?></span>
            </div>
             
            <div class="hr2">
            </div>
            <div style="margin-top:8px">
                <span>TELÉFONO CONTACTO: </span><span style="color:black"><?php IF(!empty($apoCelular))echo strtoupper($apoCelular);ELSEIF(!empty($apoTelefono))echo strtoupper($apoTelefono)?></span>
            </div>
             
            <div class="hr2">
            </div>
            <div style="margin-top:8px">
                <span>DIRECCIÓN: </span><span style="color:black"><?php IF(!empty($apoDireccion))echo strtoupper($apoDireccion).', '.strtoupper($apoComuna);?></span>
            </div>
            
            <div class="hr2">
            </div>
            <div style="margin-top:8px">
                <span>CORREO ELECTRÓNICO: </span><span style="color:black"><?php IF(!empty($apoEmail))echo strtoupper($apoEmail);?></span>
            </div>
            
            
            <div class="hr2">
            </div>
            <div style="margin-top:8px">
                <span>OTRO NÚMERO CONTACTO EN CASO DE EMERGENCIA: </span><span style="color:black"><?php IF(!empty($telUnoOtroContacto))echo $telUnoOtroContacto.' - '.$telDosOtroContacto;?></span>
            </div>
            <div class="hr2">
            </div>
            <div style="margin-top:20px" class="hr2">
            </div>
            
            <div style="margin-top:8px">
                <span>EN CASO DE EMERGENCIA MÉDICA, DERIVAR A: </span><span style="color:black"><?php IF(!empty($datos->emergenciaDerivar))echo strtoupper($datos->emergenciaDerivar);?></span>
            </div>
            <div class="hr2">
            </div>
            
            <br><br>
            
            <div style="margin-top:-13px">
                <h4><b>MÉDICO TRATANTE:</b> <span style="color:black"><?php IF(!empty($datos->nombresmedicoAsignado))echo strtoupper($datos->nombresmedicoAsignado).' '.strtoupper($datos->apellidomedicoAsignado).' '.strtoupper($datos->apellidoMmedicoAsignado);?></span></h4>
            </div>
            <div style="margin-top:-13px" class="hr2">
            </div>
            <?php IF($datos->tipoIngreso === '3'){?>
            <div style="margin-top:-13px">
                <h4><b>CENTRO DE ATENCIÓN AMBULATORIA:</b></h4>
            </div>
            <div style="margin-top:-13px" class="hr2">
            </div>
            <?php } ELSEIF($datos->tipoIngreso === '2'){?>
            <div style="margin-top:-13px">
                <h4><b>PSICÓLOGO:</b><span><?php IF($datos->PSAsignado) echo ' '.strtoupper($datos->PSnombre).' '.strtoupper($datos->PSapePat).' '.strtoupper($datos->PSapeMat);?></span></h4>
            </div>
            <div style="margin-top:-13px" class="hr2">
            </div>
            <?php } ?>
            <div style="margin-top:-13px">
                <h4><b>TO. TRATANTE:</b><span><?php IF($datos->TOAsignado) echo ' '.strtoupper($datos->TOnombre).' '.strtoupper($datos->TOapePat).' '.strtoupper($datos->TOapeMat);?></span></h4>
            </div>
            <div style="margin-top:-13px" class="hr2">
            </div>
            <?php //die(var_dump($datos->fechaSalida));
                IF($datos->fechaIngreso !== '0000-00-00'){
                    $date = new DateTime($datos->fechaIngreso);
                    $datos->fechaIngreso = $date->format('d-m-Y');
                }
                IF(!empty($datos->fechaSalida)){
                    $date = new DateTime($datos->fechaSalida);
                    $datos->fechaSalida = $date->format('d-m-Y');
                }
            ?>
            <div style="margin-top:-13px">
                <h4><b>FECHA DE INGRESO RH: </b> <span style="color:black"><?php IF(!empty($datos->fechaIngreso))echo $datos->fechaIngreso;?></span></h4>
            </div>
            <div style="margin-top:-32px;margin-left: 300px" >
                <h4><b>FECHA DE EGRESO: </b>     <span style="color:black"><?php IF(!empty($datos->fechaSalida))echo $datos->fechaSalida;?></span></h4>
            </div>
            <div style="margin-top:-13px" class="hr2">
            </div>
            
            <div style="margin-top:-13px">
                <h4><b>DERIVADO DE: </b><span style="color:black"><?php IF(!empty($datos->derNombre))echo strtoupper($datos->derNombre);?><?php IF(!empty($datos->nombresMedicoSolicitante))echo ', '.strtoupper($datos->nombresMedicoSolicitante);?></span></h4>
            </div>
            <div style="margin-top:-13px" class="hr2">
            </div>
            <br>
            <div style="margin-top:-13px" align="center">
                <?php IF($datos->tipoIngreso === '2'){?>
                <h3 class="fucsia" >FICHA HD N° <span style="color: black" class="hr3">____<span style="color:black;font-size: 15px"><u><?php IF(!empty($datos->ficha))echo $datos->ficha;ELSE echo '______'?></u></span>______</span></h3>
                <?php }ELSEIF($datos->tipoIngreso === '3'){?>
                <h3 class="fucsia" >FICHA RH N° <span style="color: black" class="hr3">____<span style="color:black;font-size: 15px"><u><?php IF(!empty($datos->fichaRH))echo $datos->fichaRH;ELSE echo '______'?></u></span>______</span></h3>
                <?php }?>
            </div>
            
            <div align="center">
            <table style=" border:none;font-family: arial;font-size: 12px">
                <tr>
                    <?php IF($datos->tipoIngreso === '2'){?>
                    <td style="width:30%;border:none;" align="right">
                        <div class="cuboC" style="margin-right: 18px"><h4 class="fucsia" style=" margin-left: 7px;margin-top: 7px">ALERGIA: </h4><blockquote><br><?php IF (!empty($datos->alergia))echo strtoupper($datos->alergia);?></blockquote></div>
                    </td>
                    <td style="width:30%;border:none;">              
                        <div class="cuboC" ><h4 class="fucsia" style=" margin-left: 7px;margin-top: 7px">ENTREGA DE FÁRMACOS<br>DE EMERGENCIA:</h4></div>
                    </td>
                    <td style="width:30%;border:none;">              
                        <div class="cuboC" style="margin-left: 18px"><h4 class="fucsia" style=" margin-left: 7px;margin-top: 7px">LICENCIAS MÉDICAS:<br></h4></div>
                    </td>
                    <?php }ELSEIF($datos->tipoIngreso === '3'){?>
                    <td style="width:100%;border:none;" align="center">
                        <div class="cubo5"><h4 class="fucsia" style=" margin-left: 7px;margin-top: 7px">ALERGIA: </h4><blockquote><br><?php IF (!empty($datos->alergia))echo strtoupper($datos->alergia);?></blockquote></div>
                    </td>
                    <?php }?>
                </tr>
            </table>
            </div>
            <img style="position: absolute; height: 360px;width: 560px;bottom:30px;right:30px;opacity: 0.4" src="<?php echo base_url();?>../assets/img/cerros.png">
            
            
            
            
            
            
            <!--
                            <div class="col-lg-1" align="left">
                                <h2>ALERGIAS: </h2><h2 style="color: red; margin-top: -39px;margin-left: 110px"> ELSE echo '..........';?></h2>
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
                                <label>Rut: </label><?php echo formatearRut($datos->rut);?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label>Edad:</label> <?php echo $edad;?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label>Isapre: </label><?php echo strtoupper($datos->isapreNombre);?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label>Titular: </label><?php IF(!empty($datos->rutTitular))echo formatearRut($datos->rutTitular); ?>
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
                                <label>Médico Tratante: </label><?php echo strtoupper($datos->nombresmedicoAsignado).' '.strtoupper($datos->apellidomedicoAsignado); ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label>Alimentación: </label><?php echo strtoupper($datos->regimen); ?>
                            </div>
                <br>
            <!--APODERADO NORMAL
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

                            <!--APODERADO ECONOMICO
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
-->
        </blockquote>
    </div>
    