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

<div class="espacio">
                <div style="page-break-after: always;">
                <div style="page-break-before: always;">
                    <br>
                    <div class="col-lg-10" align="left" style="margin-left: 40px;margin-top: -30px">
                        <img src="<?php echo base_url();?>../assets/img/ministerio_salud_opt.gif" class="logo">
                    </div>
                    <div class="col-lg-10" align="center" style="margin-top: -55px">
                        <h3>INFORME ESTADÍSTICO DE EGRESO HOSPITALARIO</h3>
                    </div>
                    <div class="col-lg-10" align="right" style=" margin-right: 40px;margin-top: -45px">
                        <img src="<?php echo base_url();?>../assets/img/deis_opt.gif" class="logo">
                    </div>
                    <br><br><br><br>
               
                    <div style="font-size: 8px;margin-top:40px">
                        
                         <!-- LADOS NEGRO -->    
                    <div style="position: absolute;transform: rotate(-90deg);top:147px;left:-273px "><span style="position: relative; top:4px;">
                                <img src="<?php echo base_url();?>../assets/img/negro.png" style=" border-radius: 2px;width:335px; height:15px; border: 0px; padding: 0" /></span>
                            <span style="transform: rotate(-90deg);position: relative; left:-310px; color:white;font-size: 11px"><b>DATOS DE IDENTIFICACIÓN DEL (DE LA) PACIENTE</b></span>
                    </div>
                    <div style="position: absolute;transform: rotate(-90deg);top:598px;left:-289px "><span style="position: relative; top:4px;">
                                <img src="<?php echo base_url();?>../assets/img/negro.png" style=" border-radius: 2px;width:464px; height:15px; border: 0px; padding: 0" /></span>
                            <span style="transform: rotate(-90deg);position: relative; left:-303px; color:white;font-size: 11px"><b>DATOS DE LA HOSPITALIZACIÓN</b></span>
                    </div>
                    
                         
                    <blockquote>
                        
                            <span style="position: relative; top:4px;"><img src="<?php echo base_url();?>../assets/img/negro.png" style="border-radius: 2px;width:16px; height:16px; border: 0px; padding: 0" /></span>
                            <span style="position: relative; left:-13px; color:white;font-size: 11px"><b>1</b></span>
                            EGRESO N° <input class="cubo"><input class="cubo"><input class="cubo"><input class="cubo"><input class="cubo"><input class="cubo">&nbsp;&nbsp;&nbsp;&nbsp;
                        
                            <span style="position: relative; top:4px;"><img src="<?php echo base_url();?>../assets/img/negro.png" style="border-radius: 2px;width:16px; height:16px; border: 0px; padding: 0" /></span>
                            <span style="position: relative; left:-13px; color:white;font-size: 11px"><b>2</b></span>
                            NOMBRE ESTABLECIMIENTO <h10 style=" font-family: courier; font-size: 15px;">&nbsp;&nbsp;&nbsp;MIRANDES CLÍNICA</h10>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input class="cubo"><input class="cubo"><input class="cubo"><input class="cubo"><input class="cubo">
                        
                        <br><br>
                        
                            <span style="position: relative; top:4px;"><img src="<?php echo base_url();?>../assets/img/negro.png" style="border-radius: 2px;width:16px; height:16px; border: 0px; padding: 0" /></span>
                            <span style="position: relative; left:-13px; color:white;font-size: 11px"><b>3</b></span>
                            <?php IF(!empty($datos->ficha)): 
                              
                                $ficha = $datos->ficha;
                                IF (strlen($ficha)=== 1){
                                    $ff = $fff = $ffff = $fffff = $ffffff = '';
                                }
                                ELSEIF(strlen($ficha)=== 2){
                                    $ff = substr($ficha,-2,1);
                                    $fff = $ffff = $fffff = $ffffff = '';
                                }
                                ELSEIF(strlen($ficha)=== 3){
                                    $ff = substr($ficha,-2,1);
                                    $fff = substr($ficha,-3,1);
                                    $ffff = $fffff = $ffffff = '';
                                }
                                ELSEIF(strlen($ficha)=== 4){
                                    $ff = substr($ficha,-2,1);
                                    $fff = substr($ficha,-3,1);
                                    $ffff = substr($ficha,-4,1);
                                    $fffff = $ffffff = '';
                                }
                                ELSEIF(strlen($ficha)=== 5){
                                    $ff = substr($ficha,-2,1);
                                    $fff = substr($ficha,-3,1);
                                    $ffff = substr($ficha,-4,1);
                                    $fffff = substr($ficha,-5,1);
                                    $ffffff = '';
                                }
                                ELSEIF(strlen($ficha)=== 6){
                                    $ff = substr($ficha,-2,1);
                                    $fff = substr($ficha,-3,1);
                                    $ffff = substr($ficha,-4,1);
                                    $fffff = substr($ficha,-5,1);
                                    $ffffff = substr($ficha,-6,1);
                                }
                                
                            
                            ?>
                            
                            N° HISTORIA CLÍNICA <input class="cubo"><input class="cubo"><input class="cubo"><input class="cubo" value="<?php echo $ffffff;?>"><input class="cubo" value="<?php echo $fffff;?>"><input class="cubo" value="<?php echo $ffff;?>"><input class="cubo" value="<?php echo $fff ;?>"><input class="cubo" value="<?php echo $ff ;?>"><input class="cubo" value="<?php echo substr($ficha,-1,1);?>"> 
                            
                            <?php ELSE: ?>
                            N° HISTORIA CLÍNICA <input class="cubo"><input class="cubo"><input class="cubo"><input class="cubo"><input class="cubo"><input class="cubo"><input class="cubo"><input class="cubo"><input class="cubo"> 
                            <?php ENDIF; ?>
                        <br><br><br><br><br>
                    <!-- PRIMER LADO NEGRO -->    
                        <b>RESPONSABLE: ADMISIÓN</b>
                        <div class="di" style=" margin-top:5px">
                            <span style="position: relative; top:4px;"><img src="<?php echo base_url();?>../assets/img/negro.png" style="border-radius: 2px;width:16px; height:16px; border: 0px; padding: 0" /></span>
                            <span style="position: relative; left:-13px; color:white;font-size: 11px"><b>4</b></span>
                            <?php IF (!empty($datos->nombres)): ?>
                            PRIMER APELLIDO&nbsp;&nbsp;<span style="font-family:courier;font-size: 15px"><?php echo strtoupper($datos->apellidoPaterno);?></span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; SEGUNDO APELLIDO &nbsp;&nbsp;<span style="font-family:courier;font-size: 15px"><?php echo strtoupper($datos->apellidoMaterno);?></span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  NOMBRES &nbsp;&nbsp; <span style="font-family:courier;font-size: 15px"><?php echo strtoupper($datos->nombres);?></span>
                            <?php ELSE:; ?>
                            PRIMER APELLIDO ......................................................... &nbsp; SEGUNDO APELLIDO ......................................................... &nbsp; NOMBRES ............................................................................................
                            <?php ENDIF; ?>
                            <br><br>
                            
                            <span style="position: relative; top:4px;"><img src="<?php echo base_url();?>../assets/img/negro.png" style="border-radius: 2px;width:16px; height:16px; border: 0px; padding: 0" /></span>
                            <span style="position: relative; left:-13px; color:white;font-size: 11px"><b>5</b></span>
                            <?php 
                                    IF(!empty($datos->rut) && $datos->rut !== '0'){
                                        $rut     = $datos->rut;
                                        $rutCant = strlen($datos->rut);
                                        
                                        IF(strlen($rut)=='8') $ocho = substr($rut,-8,1);ELSE $ocho='';
                                        $digito = RutDv($rut);
                                        //die('digito'.$digito);
                                        IF(empty($digito) && $digito != '0')$digito='';
                                    
                            ?>
                                    RUN <input class="cubo" value="<?php echo $ocho;?>"><input class="cubo" value="<?php echo substr($rut,-7,1);?>"><input class="cubo" value="<?php echo substr($rut,-6,1);?>"><input class="cubo" value="<?php echo substr($rut,-5,1);?>"><input class="cubo" value="<?php echo substr($rut,-4,1);?>"><input class="cubo" value="<?php echo substr($rut,-3,1);?>"><input class="cubo" value="<?php echo substr($rut,-2,1);?>"><input class="cubo" value="<?php echo substr($rut,-1,1);?>">-<input class="cubo" value="<?php echo $digito;?>">&nbsp;&nbsp;
                            <?php }ELSE{;?>
                                    RUN <input class="cubo"><input class="cubo"><input class="cubo"><input class="cubo"><input class="cubo"><input class="cubo"><input class="cubo"><input class="cubo">-<input class="cubo">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <?php };?>
                            <!--
                                    RUN <input class="cubo"><input class="cubo"><input class="cubo"><input class="cubo"><input class="cubo"><input class="cubo"><input class="cubo"><input class="cubo">-<input class="cubo">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            -->
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <span style="position: relative; top:4px;"><img src="<?php echo base_url();?>../assets/img/negro.png" style="border-radius: 2px;width:16px; height:16px; border: 0px; padding: 0" /></span>
                            <span style="position: relative; left:-13px; color:white;font-size: 11px"><b>6</b></span>
                            <?php IF(!empty($datos->sexo)): 
                                IF($datos->sexo == 'MASCULINO')$sexo = '1';ELSEIF($datos->sexo == 'FEMENINO')$sexo = '2'
                            ?>
                                SEXO <input class="cubo" value="<?php echo $sexo;?>">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <?php ELSE: ?>
                                SEXO <input class="cubo">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <?php ENDIF; ?>
                            <span style="position: relative; top:4px;"><img src="<?php echo base_url();?>../assets/img/negro.png" style="border-radius: 2px;width:16px; height:16px; border: 0px; padding: 0" /></span>
                            <span style="position: relative; left:-13px; color:white;font-size: 11px"><b>7</b></span>
                            
                            <?php 
                                IF(!empty($datos->fechaNacimiento)&& $datos->fechaNacimiento !== '0000-00-00'): 
                                $fecha = $datos->fechaNacimiento;
                            ?>
                                FECHA DE NACIMIENTO&nbsp;<input class="cubo" value="<?php echo substr($fecha,-2,1);?>"><input class="cubo" value="<?php echo substr($fecha,-1,1);?>">&nbsp;<input class="cubo" value="<?php echo substr($fecha,-5,1);?>"><input class="cubo" value="<?php echo substr($fecha,-4,1);?>">&nbsp;<input class="cubo" value="<?php echo substr($fecha,-10,1);?>"><input class="cubo" value="<?php echo substr($fecha,-9,1);?>"><input class="cubo" value="<?php echo substr($fecha,-8,1);?>"><input class="cubo" value="<?php echo substr($fecha,-7,1);?>">
                            <?php ELSE: ?>
                                FECHA DE NACIMIENTO&nbsp;<input class="cubo"><input class="cubo">&nbsp;<input class="cubo"><input class="cubo">&nbsp;<input class="cubo"><input class="cubo"><input class="cubo"><input class="cubo">
                            <?php ENDIF; ?>
                            <br><br>
                            
                            <span style="position: relative; top:4px;"><img src="<?php echo base_url();?>../assets/img/negro.png" style="border-radius: 2px;width:16px; height:16px; border: 0px; padding: 0" /></span>
                            <span style="position: relative; left:-13px; color:white;font-size: 11px"><b>8</b></span>
                            <?php 
                                IF(!empty($datos->edadPaciente) && $datos->edadPaciente !== '0'): 
                                $edad = $datos->edadPaciente;
                                    IF(strlen($edad)=== 2){
                                        $dos = substr($edad,-2,1);
                                        $tres ='';
                                    }ELSE IF(strlen($edad)=== 3){
                                        $dos = substr($edad,-2,1);
                                        $tres =substr($edad,-3,1);
                                    }
                                    ELSE {
                                        $dos = $tres ='';
                                    }
                            ?>
                                EDAD <input class="cubo" value="<?php echo $tres;?>"><input class="cubo" value="<?php echo $dos;?>"><input class="cubo" value="<?php echo substr($edad,-1,1);?>">&nbsp;&nbsp;
                            <?php ELSE: ?>
                                EDAD <input class="cubo"><input class="cubo"><input class="cubo">&nbsp;&nbsp;
                            <?php ENDIF; ?>
                            <span style="position: relative; top:4px;"><img src="<?php echo base_url();?>../assets/img/negro.png" style="border-radius: 2px;width:16px; height:16px; border: 0px; padding: 0" /></span>
                            <span style="position: relative; left:-13px; color:white;font-size: 11px"><b>9</b></span>
                            <?php IF(!empty($datos->edadPaciente)&& $datos->edadPaciente !== '0')$unidad = 1;ELSE $unidad ='';?>
                            <input style=" margin-left: 52px"class="cubo" value="<?php echo $unidad;?>">&nbsp;&nbsp;
                            <span style="position: relative; top:4px;"><img src="<?php echo base_url();?>../assets/img/negro.png" style="border-radius: 2px;width:16px; height:16px; border: 0px; padding: 0" /></span>
                            <span style="position: relative; left:-16px; color:white;font-size: 11px"><b>10</b></span>
                            <input style=" margin-left: 60px" class="cubo">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <span style="position: relative; top:4px;"><img src="<?php echo base_url();?>../assets/img/negro.png" style="border-radius: 2px;width:16px; height:16px; border: 0px; padding: 0" /></span>
                            <span style="position: relative; left:-16px; color:white;font-size: 11px"><b>11</b></span>
                            <?php 
                                IF(!empty($datos->nacionalidad)){
                                    IF($datos->nacionalidad === '1'){
                                        $mas = '+';$cinco='5';$seis='6';$chileno='<span style="font-family:courier;font-size:15px">CHILENA</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
                                    }
                                    ELSE {$mas = $cinco = $seis = '';$chileno = '...................................................................';}
                                } 
                            ?>
                            <input style=" margin-left: 75px" class="cubo" value="<?php echo $mas;?>"><input class="cubo" value="<?php echo $cinco;?>"><input class="cubo" value="<?php echo $seis;?>">
                            <br><br><br><br>
                            <div align="right" style=" margin-top: 20px"><?php echo $chileno; ?></div>
                            <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                            <hr>
                            <div style="position: absolute;left:333px;top:165px">1) Hombre &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2) Mujer<br><br><br><br>3) Indeterminado &nbsp; 9) Desconocido</div>
                            <div style="position: absolute;left:587px;top:156px">DÍA&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;MES&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;AÑO</div>
                            <div style="position: absolute;left:175px;top:215px">1) Años &nbsp;&nbsp;&nbsp;&nbsp;2) Meses<br><br><br><br><br>3) Días &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;9) Horas</div>
                            <div style="position: absolute;left:175px;top:185px;width: 50px;">UNIDAD DE<br><br><br><br>MEDIDA DE<br><br><br><br>LA EDAD</div>
                            <div style="position: absolute;left:280px;top:185px;width: 50px;">PUEBLO<br><br><br><br>ORIGINARIO<br><br><br><br>DECLARADO</div>
                            <div style="position: absolute;left:370px;top:183px;width: 50px;">
                                    <table style="border: none; font-size: 9px">
                                        <tr><td style="padding: 0px;margin: 0px; height: 0px;border:none">01&nbsp;</td> <td style="padding: 0px;margin: 0px; height: 0px;min-width: 63px;border:none">Alacalufe</td>    <td style="padding: 0px;margin: 0px; height: 0px;border:none">06&nbsp;</td> <td style="padding: 0px;margin: 0px; height: 0px;min-width: 150px;border:none">Mapuche</td></tr>
                                        <tr><td style="padding: 0px;margin: 0px; height: 0px;border:none"></td>         <td style="padding: 0px;margin: 0px; height: 0px;border:none">(Kawáshkar)</td>                  <td style="padding: 0px;margin: 0px; height: 0px;border:none">07</td>       <td style="padding: 0px;margin: 0px; height: 0px;border:none">Quechua</td></tr>
                                        <tr><td style="padding: 0px;margin: 0px; height: 0px;border:none">02</td>       <td style="padding: 0px;margin: 0px; height: 0px;border:none">Atacameño</td>                    <td style="padding: 0px;margin: 0px; height: 0px;border:none">08</td>       <td style="padding: 0px;margin: 0px; height: 0px;border:none">Rapa Nui</td></tr>
                                        <tr><td style="padding: 0px;margin: 0px; height: 0px;border:none"></td>         <td style="padding: 0px;margin: 0px; height: 0px;border:none">(Lickan Antay)</td>               <td style="padding: 0px;margin: 0px; height: 0px;border:none">09</td>       <td style="padding: 0px;margin: 0px; height: 0px;border:none">Yámana (Yagán)</td></tr>
                                        <tr><td style="padding: 0px;margin: 0px; height: 0px;border:none">03</td>       <td style="padding: 0px;margin: 0px; height: 0px;border:none">Aimara</td>                       <td style="padding: 0px;margin: 0px; height: 0px;border:none">00</td>       <td style="padding: 0px;margin: 0px; height: 0px;border:none">Ninguno de los anteriores</td></tr>
                                        <tr><td style="padding: 0px;margin: 0px; height: 0px;border:none">04</td>       <td style="padding: 0px;margin: 0px; height: 0px;border:none">Colla</td>                        <td style="padding: 0px;margin: 0px; height: 0px;border:none">10</td>       <td style="padding: 0px;margin: 0px; height: 0px;border:none">No sabe</td></tr>
                                        <tr><td style="padding: 0px;margin: 0px; height: 0px;border:none">05</td>       <td style="padding: 0px;margin: 0px; height: 0px;border:none">Diaguita</td>                     <td style="padding: 0px;margin: 0px; height: 0px;border:none">11</td>       <td style="padding: 0px;margin: 0px; height: 0px;border:none">No responde</td></tr>
                                    </table>
                            </div>
                            <div style="position: absolute;left:580px;top:185px;width:90px;">NACIONALIDAD<br><br><br><br>DEL (DE LA) PACIENTE</div>
                            <div style="position: absolute;left:667px;top:177px;font-size: 7px">CÓDIGO PAÍS</div>
                            
                            <span style="position: relative; top:4px;"><img src="<?php echo base_url();?>../assets/img/negro.png" style="border-radius: 2px;width:16px; height:16px; border: 0px; padding: 0" /></span>
                            <span style="position: relative; left:-16px; color:white;font-size: 11px"><b>12</b></span>
                            <?php IF(!empty($datos->direccion)): ?>
                            DOMICILIO&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="font-family:courier;font-size:15px;"><?php echo strtoupper($datos->direccion);?></span>
                            <?php ELSE:; ?>
                            DOMICILIO ....................................................................................................................................................................................................................................................................................................
                            <?php ENDIF;?>
                            <div align="center" style="color:grey;font-size: 7px;margin-top: 3px">VÍA (CALLE, AVENIDA, PASAJE U OTRA) - NÚMERO - BLOCK - DEPARTAMENTO - VILLA - POBLACIÓN U OTRO</div>
                            <br>
                            <span style="position: relative; top:4px;"><img src="<?php echo base_url();?>../assets/img/negro.png" style="border-radius: 2px;width:16px; height:16px; border: 0px; padding: 0" /></span>
                            <span style="position: relative; left:-16px; color:white;font-size: 11px"><b>13</b></span>
                            <?php IF(!empty($datos->comuna)): 
                                $comId = $datos->comId;
                                IF(strlen($comId) == 1){
                                    $d = $dd = $ddd = $dddd = '';
                                }
                                ELSEIF(strlen($comId) == 2){
                                    $d = substr($comId,-2,1);
                                    $dd = $ddd = $dddd = '';
                                }
                                ELSEIF(strlen($comId) == 3){
                                    $d = substr($comId,-2,1);
                                    $dd = substr($comId,-3,1);
                                    $ddd = $dddd = '';
                                }
                                ELSEIF(strlen($comId) == 4){
                                    $d = substr($comId,-2,1);
                                    $dd = substr($comId,-3,1);
                                    $ddd = substr($comId,-4,1);
                                    $dddd = '';
                                }
                                 ELSEIF(strlen($comId) == 5){
                                    $d = substr($comId,-2,1);
                                    $dd = substr($comId,-3,1);
                                    $ddd = substr($comId,-4,1);
                                    $dddd = substr($comId,-5,1);
                                }
                            ?>

                            COMUNA RESIDENCIA &nbsp;&nbsp;<span style="font-family:courier;font-size:15px"><?php echo strtoupper($datos->comuna)?></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input class="cubo"value="<?php echo $dddd;?>"><input class="cubo"value="<?php echo $ddd;?>"><input class="cubo"value="<?php echo $dd;?>"><input class="cubo" value="<?php echo $d;?>"><input class="cubo" value="<?php echo substr($comId,-1,1);?>">&nbsp;&nbsp;
                            <?php ELSE:; ?>
                            COMUNA RESIDENCIA .................................................................................................... <input class="cubo"><input class="cubo"><input class="cubo"><input class="cubo"><input class="cubo">&nbsp;&nbsp;
                            <?php ENDIF;?>
                            <span style="position: relative; top:4px;"><img src="<?php echo base_url();?>../assets/img/negro.png" style="border-radius: 2px;width:16px; height:16px; border: 0px; padding: 0" /></span>
                            <span style="position: relative; left:-16px; color:white;font-size: 11px"><b>14</b></span>
                            <?php 
                            IF(!empty($datos->celular)):
                                $fono = $datos->celular;
                            ?>
                            TELÉFONO <input class="cubo" value="<?php echo $cinco;?>"><input class="cubo" value="<?php echo $seis;?>"><input class="cubo" value="<?php echo substr($fono,-9,1);?>">-<input class="cubo" value="<?php echo substr($fono,-8,1);?>"><input class="cubo" value="<?php echo substr($fono,-7,1);?>"><input class="cubo" value="<?php echo substr($fono,-6,1);?>"><input class="cubo" value="<?php echo substr($fono,-5,1);?>"><input class="cubo" value="<?php echo substr($fono,-4,1);?>"><input class="cubo" value="<?php echo substr($fono,-3,1);?>"><input class="cubo" value="<?php echo substr($fono,-2,1);?>"><input class="cubo" value="<?php echo substr($fono,-1,1);?>">
                            <?php
                            ELSEIF(!empty($datos->telefono)&&empty($datos->celular)):
                                $fono = $datos->telefono;
                            ?>
                            TELÉFONO <input class="cubo" value="<?php echo $cinco;?>"><input class="cubo" value="<?php echo $seis;?>"><input class="cubo" value="<?php echo substr($fono,-9,1);?>">-<input class="cubo" value="<?php echo substr($fono,-8,1);?>"><input class="cubo" value="<?php echo substr($fono,-7,1);?>"><input class="cubo" value="<?php echo substr($fono,-6,1);?>"><input class="cubo" value="<?php echo substr($fono,-5,1);?>"><input class="cubo" value="<?php echo substr($fono,-4,1);?>"><input class="cubo" value="<?php echo substr($fono,-3,1);?>"><input class="cubo" value="<?php echo substr($fono,-2,1);?>"><input class="cubo" value="<?php echo substr($fono,-1,1);?>">
                            <?php ELSE: ?>
                            TELÉFONO <input class="cubo"><input class="cubo"><input class="cubo">-<input class="cubo"><input class="cubo"><input class="cubo"><input class="cubo"><input class="cubo"><input class="cubo"><input class="cubo"><input class="cubo">
                            <?php ENDIF; ?>
                            
                            <hr>
                            
                            <span style="position: relative; top:4px;"><img src="<?php echo base_url();?>../assets/img/negro.png" style="border-radius: 2px;width:16px; height:16px; border: 0px; padding: 0" /></span>
                            <span style="position: relative; left:-16px; color:white;font-size: 11px"><b>15</b></span>
                            
                            <?php 
                            IF(!empty($datos->isapreNombre)){
                                IF($datos->isapreNombre === '6'){
                                    $prev = '1';
                                }
                                ELSE $prev = '2';
                            }
                            ELSE $prev = '';
                            ?>
                            <input class="cubo" style=" margin-left: 46px" value="<?php echo $prev; ?>">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <span style="position: relative; top:4px;"><img src="<?php echo base_url();?>../assets/img/negro.png" style="border-radius: 2px;width:16px; height:16px; border: 0px; padding: 0" /></span>
                            <span style="position: relative; left:-16px; color:white;font-size: 11px"><b>16</b></span>
                            <input class="cubo" style=" margin-left: 65px">&nbsp;&nbsp;
                            <span style="position: relative; top:4px;"><img src="<?php echo base_url();?>../assets/img/negro.png" style="border-radius: 2px;width:16px; height:16px; border: 0px; padding: 0" /></span>
                            <span style="position: relative; left:-16px; color:white;font-size: 11px"><b>17</b></span>
                            <input class="cubo" style=" margin-left: 50px">&nbsp;&nbsp;
                            <span style="position: relative; top:4px;"><img src="<?php echo base_url();?>../assets/img/negro.png" style="border-radius: 2px;width:16px; height:16px; border: 0px; padding: 0" /></span>
                            <span style="position: relative; left:-16px; color:white;font-size: 11px"><b>18</b></span>
                            <input class="cubo" style=" margin-left:150px">
                            <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                            <hr>
                            
                            <div style="position: absolute;left:70px;top:326px;width: 50px;">PREVISIÓN<br><br><br><br>EN<br><br><br><br>SALUD</div>
                            <div style="position: absolute;left:150px;top:321px;width: 50px;">
                                <table style="border: none; font-size: 9px">
                                    <tr><td style="padding: 0px;margin: 0px; height: 0px;border:none">1)&nbsp;</td> <td style="padding: 0px;margin: 0px; height: 0px;border:none;min-width: 145px">FONASA</td></tr>
                                    <tr><td style="padding: 0px;margin: 0px; height: 0px;border:none">2)</td>       <td style="padding: 0px;margin: 0px; height: 0px;border:none">ISAPRE</td></tr>
                                    <tr><td style="padding: 0px;margin: 0px; height: 0px;border:none">3)</td>       <td style="padding: 0px;margin: 0px; height: 0px;border:none">No tiene (cancela)</td></tr>
                                    <tr><td style="padding: 0px;margin: 0px; height: 0px;border:none">4)</td>       <td style="padding: 0px;margin: 0px; height: 0px;border:none">Cajas de Previsión FFAA</td></tr>
                                    <tr><td style="padding: 0px;margin: 0px; height: 0px;border:none">5)</td>       <td style="padding: 0px;margin: 0px; height: 0px;border:none">CAPREDENA</td></tr>
                                    <tr><td style="padding: 0px;margin: 0px; height: 0px;border:none">6)</td>       <td style="padding: 0px;margin: 0px; height: 0px;border:none">DIPRECA</td></tr>
                                    <tr><td style="padding: 0px;margin: 0px; height: 0px;border:none">7)</td>       <td style="padding: 0px;margin: 0px; height: 0px;border:none">Otra</td></tr>
                                </table>
                            </div>
                            <div style="position: absolute;left:285px;top:321px;width: 50px;">
                                <table style="border: none; font-size: 9px">
                                    <tr><td style="padding: 0px;margin: 0px; height: 0px;border:none" colspan="2">CLASE DE BENEFICIARIO FONASA</td> </tr>
                                    <tr><td style="padding: 0px;margin: 0px; height: 0px;border:none">1)&nbsp;A</td>    <td style="padding: 0px;margin: 0px; height: 0px;border:none">2)&nbsp;B</td></tr>
                                    <tr><td style="padding: 0px;margin: 0px; height: 0px;border:none">3)&nbsp;C</td>    <td style="padding: 0px;margin: 0px; height: 0px;border:none">4)&nbsp;D</td></tr>
                                </table>
                            </div>
                            <div style="position: absolute;left:405px;top:321px;width: 50px;">
                                <table style="border: none; font-size: 9px">
                                    <tr><td style="padding: 0px;margin: 0px; height: 0px;border:none">MODALIDAD DE ATENCIÓN</td></tr>
                                    <tr><td style="padding: 0px;margin: 0px; height: 0px;border:none">1)&nbsp;MAI</td></tr>    
                                    <tr><td style="padding: 0px;margin: 0px; height: 0px;border:none">2)&nbsp;MLE</td></tr>
                                </table>
                            </div>
                            <div style="position: absolute;left:508px;top:322px;width: 50px;">
                                <table style="border: none; font-size: 8px">
                                    <tr><td style="padding: 0px;margin: 0px; height: 0px;border:none" colspan="4">OTRAS LEYES PREVISIONALES O</td> </tr>
                                    <tr><td style="padding: 0px;margin: 0px; height: 0px;border:none" colspan="4">PROGRAMAS SOCIALES</td> </tr>
                                    <tr><td style="padding: 0px;margin: 0px; height: 0px;border:none">1)&nbsp;</td>     <td style="padding: 0px;margin: 0px; height: 0px;border:none;min-width: 100px">Ley 18.490 Accidentes</td>   <td style="padding: 0px;margin: 0px; height: 0px;border:none">4)&nbsp;</td>    <td style="padding: 0px;margin: 0px; height: 0px;border:none;min-width: 120px">Ley 19.650/99 de Urgencia</td></tr>
                                    <tr><td style="padding: 0px;margin: 0px; height: 0px;border:none"></td>             <td style="padding: 0px;margin: 0px; height: 0px;border:none">de Transporte</td>                            <td style="padding: 0px;margin: 0px; height: 0px;border:none">5)&nbsp;</td>    <td style="padding: 0px;margin: 0px; height: 0px;border:none;">PRAIS</td></tr>
                                    <tr><td style="padding: 0px;margin: 0px; height: 0px;border:none">2)</td>           <td style="padding: 0px;margin: 0px; height: 0px;border:none">Ley 16.744 Acc. Trabajo</td>                  <td style="padding: 0px;margin: 0px; height: 0px;border:none">6)&nbsp;</td>    <td style="padding: 0px;margin: 0px; height: 0px;border:none;">Chile Solidario</td></tr>
                                    <tr><td style="padding: 0px;margin: 0px; height: 0px;border:none"></td>             <td style="padding: 0px;margin: 0px; height: 0px;border:none">y Enf. Profesional</td>                       <td style="padding: 0px;margin: 0px; height: 0px;border:none">7)&nbsp;</td>    <td style="padding: 0px;margin: 0px; height: 0px;border:none;">Chile Crece Contigo</td></tr>
                                    <tr><td style="padding: 0px;margin: 0px; height: 0px;border:none">3)</td>           <td style="padding: 0px;margin: 0px; height: 0px;border:none">Ley 16.744 Accidente</td>                     <td style="padding: 0px;margin: 0px; height: 0px;border:none">8)&nbsp;</td>    <td style="padding: 0px;margin: 0px; height: 0px;border:none;">Otro Programa Social</td></tr>
                                    <tr><td style="padding: 0px;margin: 0px; height: 0px;border:none"></td>             <td style="padding: 0px;margin: 0px; height: 0px;border:none">Escolar</td>                                  <td style="padding: 0px;margin: 0px; height: 0px;border:none">9)&nbsp;</td>    <td style="padding: 0px;margin: 0px; height: 0px;border:none;">GES</td></tr>
                                </table>
                            </div>
                            
                            <span style="position: relative; top:4px;"><img src="<?php echo base_url();?>../assets/img/negro.png" style="border-radius: 2px;width:16px; height:16px; border: 0px; padding: 0" /></span>
                            <span style="position: relative; left:-16px; color:white;font-size: 11px"><b>19</b></span>
                            <input class="cubo" style="margin-left:60px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <span style="position: relative; top:4px;"><img src="<?php echo base_url();?>../assets/img/negro.png" style="border-radius: 2px;width:16px; height:16px; border: 0px; padding: 0" /></span>
                            <span style="position: relative; left:-16px; color:white;font-size: 11px"><b>20</b></span>
                            ESTABLECIMIENTO DE PROCEDENCIA&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;CÓDIGO&nbsp;
                            <input class="cubo"><input class="cubo"><input class="cubo"><input class="cubo"><input class="cubo">
                            <br><br><br><br>
                            <div align="right">................................................................................................................................................</div>
                            <br><br><div align="right">(LLENAR SÓLO SI SE REGISTRO OPCIÓN 2 Ó 4)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
                            <br><br><br><br><br><br><br><br><br><br><br><br>
                            <div style="position: absolute;left:70px;top:411px;width: 50px;">PROCEDENCIA<br><br><br><br><br>DEL (DE LA)<br><br><br><br><br>PACIENTE</div>
                            <div style="position: absolute;left:162px;top:408px;width: 50px;">
                                <table style="border: none; font-size: 9px">
                                    <tr><td style="padding: 0px;margin: 0px; height: 0px;border:none;min-width: 250px">1) Unidad de Emergencia (del mismo establecimiento)</td></tr>
                                    <tr><td style="padding: 0px;margin: 0px; height: 0px;border:none">2) Atención Primaria de Salud)</td></tr>
                                    <tr><td style="padding: 0px;margin: 0px; height: 0px;border:none">3) Atención Especialidades (del mismo establecimiento)</td></tr>
                                    <tr><td style="padding: 0px;margin: 0px; height: 0px;border:none">4) Otro Establecimiento</td></tr>
                                    <tr><td style="padding: 0px;margin: 0px; height: 0px;border:none">5) Otra Procedencia</td></tr>
                                </table>
                            </div>
                            
                        </div>
                        <br><br><br>
                        
                    <!-- SEGUNDO LADO NEGRO -->    
                        <b>RESPONSABLE: ADMISIÓN</b>
                        <div class="di" style=" margin-top:5px"><br>
                            <div style="font-size:6px;padding-top: 7px;padding-bottom: 0px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;HORA (HH:MM)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;FECHA (DD-MM-AA)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;SERVICIO ClÍNICO</div>
                            <span style="position: relative; top:4px;"><img src="<?php echo base_url();?>../assets/img/negro.png" style="border-radius: 2px;width:16px; height:16px; border: 0px; padding: 0" /></span>
                            <span style="position: relative; left:-16px; color:white;font-size: 11px"><b>21</b></span>
                            <?php IF(!empty($datos->fechaIngreso) && !empty($datos->horaIngreso)): 
                                $hora   = $datos->horaIngreso;
                                $fecha  = $datos->fechaIngreso;
                            ?>
                            INGRESO<input class="cubo" style="margin-left:55px" value="<?php echo substr($hora,-8,1);?>"><input class="cubo" value="<?php echo substr($hora,-7,1);?>">:<input class="cubo" value="<?php echo substr($hora,-5,1);?>"><input class="cubo" value="<?php echo substr($hora,-4,1);?>">&nbsp;<input class="cubo" value="<?php echo substr($fecha,-2,1);?>"><input class="cubo" value="<?php echo substr($fecha,-1,1);?>">&nbsp;<input class="cubo" value="<?php echo substr($fecha,-5,1);?>"><input class="cubo" value="<?php echo substr($fecha,-4,1);?>">&nbsp;<input class="cubo" value="<?php echo substr($fecha,-8,1);?>"><input class="cubo" value="<?php echo substr($fecha,-7,1);?>">&nbsp;................................................................................................................................................................ <input class="cubo"><input class="cubo"><input class="cubo">
                            <?php ELSE: ?>
                            INGRESO<input class="cubo" style="margin-left:55px"><input class="cubo">:<input class="cubo"><input class="cubo">&nbsp;<input class="cubo"><input class="cubo">&nbsp;<input class="cubo"><input class="cubo">&nbsp;<input class="cubo"><input class="cubo">&nbsp;................................................................................................................................................................ <input class="cubo"><input class="cubo"><input class="cubo">
                            <?php ENDIF; ?>
                            <br>
                            <span style="position: relative; top:4px;"><img src="<?php echo base_url();?>../assets/img/negro.png" style="border-radius: 2px;width:16px; height:16px; border: 0px; padding: 0" /></span>
                            <span style="position: relative; left:-16px; color:white;font-size: 11px"><b>22</b></span>
                            PRIMER TRASLADO<input class="cubo" style="margin-left:84px"><input class="cubo">&nbsp;<input class="cubo"><input class="cubo">&nbsp;<input class="cubo"><input class="cubo">&nbsp;................................................................................................................................................................ <input class="cubo"><input class="cubo"><input class="cubo">
                            <br>
                            <span style="position: relative; top:4px;"><img src="<?php echo base_url();?>../assets/img/negro.png" style="border-radius: 2px;width:16px; height:16px; border: 0px; padding: 0" /></span>
                            <span style="position: relative; left:-16px; color:white;font-size: 11px"><b>23</b></span>
                            SEGUNDO TRASLADO<input class="cubo" style="margin-left:75px"><input class="cubo">&nbsp;<input class="cubo"><input class="cubo">&nbsp;<input class="cubo"><input class="cubo">&nbsp;................................................................................................................................................................ <input class="cubo"><input class="cubo"><input class="cubo">
                            <br>
                            <span style="position: relative; top:4px;"><img src="<?php echo base_url();?>../assets/img/negro.png" style="border-radius: 2px;width:16px; height:16px; border: 0px; padding: 0" /></span>
                            <span style="position: relative; left:-16px; color:white;font-size: 11px"><b>24</b></span>
                            TERCER TRASLADO<input class="cubo" style="margin-left:82px"><input class="cubo">&nbsp;<input class="cubo"><input class="cubo">&nbsp;<input class="cubo"><input class="cubo">&nbsp;................................................................................................................................................................ <input class="cubo"><input class="cubo"><input class="cubo">
                            <br>
                            <span style="position: relative; top:4px;"><img src="<?php echo base_url();?>../assets/img/negro.png" style="border-radius: 2px;width:16px; height:16px; border: 0px; padding: 0" /></span>
                            <span style="position: relative; left:-16px; color:white;font-size: 11px"><b>25</b></span>
                            CUARTO TRASLADO<input class="cubo" style="margin-left:82px"><input class="cubo">&nbsp;<input class="cubo"><input class="cubo">&nbsp;<input class="cubo"><input class="cubo">&nbsp;................................................................................................................................................................ <input class="cubo"><input class="cubo"><input class="cubo">
                            <br>
                            <span style="position: relative; top:4px;"><img src="<?php echo base_url();?>../assets/img/negro.png" style="border-radius: 2px;width:16px; height:16px; border: 0px; padding: 0" /></span>
                            <span style="position: relative; left:-16px; color:white;font-size: 11px"><b>26</b></span>
                            <?php IF(!empty($datos->fechaSalidaReal) && !empty($datos->horaSalidaReal) && $datos->fechaSalidaReal != '0000-00-00'): 
                                $hora   = $datos->horaSalidaReal;
                                $fecha  = $datos->fechaSalidaReal;
                            ?>
                            EGRESO<input class="cubo" style="margin-left:59px" value="<?php echo substr($hora,-8,1);?>"><input class="cubo" value="<?php echo substr($hora,-7,1);?>">:<input class="cubo" value="<?php echo substr($hora,-5,1);?>"><input class="cubo" value="<?php echo substr($hora,-4,1);?>">&nbsp;<input class="cubo" value="<?php echo substr($fecha,-2,1);?>"><input class="cubo" value="<?php echo substr($fecha,-1,1);?>">&nbsp;<input class="cubo" value="<?php echo substr($fecha,-5,1);?>"><input class="cubo" value="<?php echo substr($fecha,-4,1);?>">&nbsp;<input class="cubo" value="<?php echo substr($fecha,-8,1);?>"><input class="cubo" value="<?php echo substr($fecha,-7,1);?>">&nbsp;................................................................................................................................................................ <input class="cubo"><input class="cubo"><input class="cubo">
                            <?php ELSE: ?>
                            EGRESO<input class="cubo" style="margin-left:59px"><input class="cubo">:<input class="cubo"><input class="cubo">&nbsp;<input class="cubo"><input class="cubo">&nbsp;<input class="cubo"><input class="cubo">&nbsp;<input class="cubo"><input class="cubo">&nbsp;................................................................................................................................................................ <input class="cubo"><input class="cubo"><input class="cubo">
                            <?php ENDIF; ?>
                            <br>
                            <span style="position: relative; top:4px;"><img src="<?php echo base_url();?>../assets/img/negro.png" style="border-radius: 2px;width:16px; height:16px; border: 0px; padding: 0" /></span>
                            <span style="position: relative; left:-16px; color:white;font-size: 11px"><b>27</b></span>
                            DÍAS DE ESTADA<input class="cubo" style="margin-left:29px"><input class="cubo"><input class="cubo"><input class="cubo">
                            <span style="position: relative; top:4px;"><img src="<?php echo base_url();?>../assets/img/negro.png" style="border-radius: 2px;width:16px; height:16px; border: 0px; padding: 0" /></span>
                            <span style="position: relative; left:-16px; color:white;font-size: 11px"><b>28</b></span>
                            <input class="cubo" style="margin-left:50px">
                            
                            <div style="position: absolute;left:655px;top:480px;width: 70px;font-size: 6px">CÓDIGO<br><br><br><br>SERVICIO CLÍNICO</div>
                            <div style="position: absolute;left:259px;top:615px;width: 70px;font-size: 8px">CONDICIÓN AL<br><br><br><br>EGRESO</div>
                            <div style="position: absolute;left:340px;top:615px;width: 70px;font-size: 8px">1) Vivo<br><br><br><br>2) Fallecido</div>
                        </div>
                        <br><br><br>
                        <b>RESPONSABLE: MÉDICO O PROFESIONAL TRATANTE</b>
                        
                        <div class="di" style=" margin-top:5px">
                            <br>
                            <span style="position: relative; top:4px;"><img src="<?php echo base_url();?>../assets/img/negro.png" style="border-radius: 2px;width:16px; height:16px; border: 0px; padding: 0" /></span>
                            <span style="position: relative; left:-16px; color:white;font-size: 11px"><b>29</b></span>
                            DIAGNÓSTICO PRINCIPAL ........................................................................................................................................................................................................................................ <input class="cubo"><input class="cubo"><input class="cubo"><input class="cubo">
                            <br>
                            <span style="position: relative; top:4px;"><img src="<?php echo base_url();?>../assets/img/negro.png" style="border-radius: 2px;width:16px; height:16px; border: 0px; padding: 0" /></span>
                            <span style="position: relative; left:-16px; color:white;font-size: 11px"><b>30</b></span>
                            CAUSA EXTERNA &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ........................................................................................................................................................................................................................................ <input class="cubo"><input class="cubo"><input class="cubo"><input class="cubo">
                            <br>
                            <span style="position: relative; top:4px;"><img src="<?php echo base_url();?>../assets/img/negro.png" style="border-radius: 2px;width:16px; height:16px; border: 0px; padding: 0" /></span>
                            <span style="position: relative; left:-16px; color:white;font-size: 11px"><b>31</b></span>
                            OTRO DIAGNÓSTICO &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ........................................................................................................................................................................................................................................ <input class="cubo"><input class="cubo"><input class="cubo"><input class="cubo">
                            <br>
                            <span style="position: relative; top:4px;"><img src="<?php echo base_url();?>../assets/img/negro.png" style="border-radius: 2px;width:16px; height:16px; border: 0px; padding: 0" /></span>
                            <span style="position: relative; left:-16px; color:white;font-size: 11px"><b>32</b></span>
                            OTRO DIAGNÓSTICO &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ........................................................................................................................................................................................................................................ <input class="cubo"><input class="cubo"><input class="cubo"><input class="cubo">
                            <br>
                            <span style="position: relative; top:4px;"><img src="<?php echo base_url();?>../assets/img/negro.png" style="border-radius: 2px;width:16px; height:16px; border: 0px; padding: 0" /></span>
                            <span style="position: relative; left:-16px; color:white;font-size: 11px"><b>33</b></span>
                            OTRO DIAGNÓSTICO &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ........................................................................................................................................................................................................................................ <input class="cubo"><input class="cubo"><input class="cubo"><input class="cubo">
                            <br>
                            <span style="position: relative; top:4px;"><img src="<?php echo base_url();?>../assets/img/negro.png" style="border-radius: 2px;width:16px; height:16px; border: 0px; padding: 0" /></span>
                            <span style="position: relative; left:-16px; color:white;font-size: 11px"><b>34</b></span>
                            OTRO DIAGNÓSTICO &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ........................................................................................................................................................................................................................................ <input class="cubo"><input class="cubo"><input class="cubo"><input class="cubo">
                            <br>
                            
                            <div style="position: absolute;left:645px;top:645px;width: 70px;font-size: 6px">CÓDIGO CIE-10</div>
                        </div>
                        <br><br>
                        
                        <b>DATOS DEL RECIÉN NACIDO:</b> (COMPLETAR EN CASO DE EGRESO OBSTÉTRICO QUE TERMIAN EN PARTO)
                        <div class="di" style=" margin-top: 3px">
                            <table style="border:none;font-size:8px;padding: none;margin: none">
                                <tr>
                                    <td style="width: 16px;border:none">
                                        <span style="position: relative; top:7px"><img src="<?php echo base_url();?>../assets/img/negro.png" style="border-radius: 2px;width:16px; height:16px; border: 0px; padding: 0" /></span>
                                        <span style="position: relative; left:2px;top:-6px; color:white;font-size: 11px"><b>35</b></span>
                                    </td>
                                    <td style="border:none;margin-left: 10px;width: 60px">
                                        ORDEN EN EL NACIMIENTO
                                    </td>
                                    <td style="width: 5px;border:none"></td>
                                    <td style="width: 16px;border:none">
                                        <span style="position: relative; top:7px"><img src="<?php echo base_url();?>../assets/img/negro.png" style="border-radius: 2px;width:16px; height:16px; border: 0px; padding: 0" /></span>
                                        <span style="position: relative; left:2px;top:-6px; color:white;font-size: 11px"><b>36</b></span>
                                    </td>
                                    <td style="border:none;margin-left: 10px;">
                                        CONDICIÓN AL NACER<br>1) Vivo&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2) Fallecido
                                    </td>
                                    <td style="width: 5px;border:none"></td>
                                    <td style="width: 16px;border:none">
                                        <span style="position: relative; top:7px"><img src="<?php echo base_url();?>../assets/img/negro.png" style="border-radius: 2px;width:16px; height:16px; border: 0px; padding: 0" /></span>
                                        <span style="position: relative; left:2px;top:-6px; color:white;font-size: 11px"><b>37</b></span>
                                    </td>
                                    <td style="border:none;margin-left: 10px;">
                                        SEXO<br>1) Hombre&nbsp;&nbsp;&nbsp;2) Mujer&nbsp;&nbsp;&nbsp;3) Indeterminado
                                    </td>
                                    <td style="width: 5px;border:none"></td>
                                    <td style="width: 16px;border:none">
                                        <span style="position: relative; top:7px"><img src="<?php echo base_url();?>../assets/img/negro.png" style="border-radius: 2px;width:16px; height:16px; border: 0px; padding: 0" /></span>
                                        <span style="position: relative; left:2px;top:-6px; color:white;font-size: 11px"><b>38</b></span>
                                    </td>
                                    <td style="border:none;margin-left: 10px;min-width: 190px">
                                        PESO EN GRAMOS
                                    </td>
                                    <td style="width: 5px;border:none"></td>
                                    <td style="width: 16px;border:none">
                                        <span style="position: relative; top:7px"><img src="<?php echo base_url();?>../assets/img/negro.png" style="border-radius: 2px;width:16px; height:16px; border: 0px; padding: 0" /></span>
                                        <span style="position: relative; left:2px;top:-6px; color:white;font-size: 11px"><b>39</b></span>
                                    </td>
                                    <td style="border:none;margin-left: 10px;">
                                        APGAR 5 MINUTOS
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2" align="center" style=" border-style: dashed;height: 5px !important;padding: 0px; margin: 0px; border-radius: 2px;width: 160px"><input style="width:10px;height: 10px; font-size: 8px;border-radius: 2px;text-align: center;border-color: grey;border-width:1px; " value="1"></td>
                                    <td style="width: 5px;border:none;height: 5px !important;padding: 0px; margin: 0px;"></td>
                                    <td colspan="2" align="center" style=" border-style: dashed;height: 5px !important;padding: 0px; margin: 0px; border-radius: 2px"><input style="width:10px;height: 10px; font-size: 8px;border-radius: 2px;border-color: grey;border-width:1px;"></td>
                                    <td style="width: 5px;border:none;height: 5px !important;padding: 0px; margin: 0px;"></td>
                                    <td colspan="2" align="center" style=" border-style: dashed;height: 5px !important;padding: 0px; margin: 0px; border-radius: 2px"><input style="width:10px;height: 10px; font-size: 8px;border-radius: 2px;border-color: grey;border-width:1px;"></td>
                                    <td style="width: 5px;border:none;height: 5px !important;padding: 0px; margin: 0px;"></td>
                                    <td colspan="2" align="center" style=" border-style: dashed;height: 5px !important;padding: 0px; margin: 0px; border-radius: 2px"><input style="width:10px;height: 10px; font-size: 8px;border-radius: 2px;border-color: grey;border-width:1px;"><input style="width:10px;height: 10px; font-size: 8px;border-radius: 2px;border-color: grey;border-width:1px;"><input style="width:10px;height: 10px; font-size: 8px;border-radius: 2px;border-color: grey;border-width:1px;"><input style="width:10px;height: 10px; font-size: 8px;border-radius: 2px;border-color: grey;border-width:1px;"></td>
                                    <td style="width: 5px;border:none;height: 5px !important;padding: 0px; margin: 0px;"></td>
                                    <td colspan="2" align="center" style=" border-style: dashed;height: 5px !important;padding: 0px; margin: 0px; border-radius: 2px"><input style="width:10px;height: 10px; font-size: 8px;border-radius: 2px;border-color: grey;border-width:1px;"><input style="width:10px;height: 10px; font-size: 8px;border-radius: 2px;border-color: grey;border-width:1px;"></td>
                                </tr>
                                <tr>
                                    <td colspan="2" align="center" style=" border-style: dashed;height: 5px !important;padding: 0px; margin: 0px; border-radius: 2px;width: 160px"><input style="width:10px;height: 10px; font-size: 8px;border-radius: 2px;text-align: center;border-color: grey;border-width:1px;" value="2"></td>
                                    <td style="width: 5px;border:none;height: 5px !important;padding: 0px; margin: 0px;"></td>
                                    <td colspan="2" align="center" style=" border-style: dashed;height: 5px !important;padding: 0px; margin: 0px; border-radius: 2px"><input style="width:10px;height: 10px; font-size: 8px;border-radius: 2px;border-color: grey;border-width:1px;"></td>
                                    <td style="width: 5px;border:none;height: 5px !important;padding: 0px; margin: 0px;"></td>
                                    <td colspan="2" align="center" style=" border-style: dashed;height: 5px !important;padding: 0px; margin: 0px; border-radius: 2px"><input style="width:10px;height: 10px; font-size: 8px;border-radius: 2px;border-color: grey;border-width:1px;"></td>
                                    <td style="width: 5px;border:none;height: 5px !important;padding: 0px; margin: 0px;"></td>
                                    <td colspan="2" align="center" style=" border-style: dashed;height: 5px !important;padding: 0px; margin: 0px; border-radius: 2px"><input style="width:10px;height: 10px; font-size: 8px;border-radius: 2px;border-color: grey;border-width:1px;"><input style="width:10px;height: 10px; font-size: 8px;border-radius: 2px;border-color: grey;border-width:1px;"><input style="width:10px;height: 10px; font-size: 8px;border-radius: 2px;border-color: grey;border-width:1px;"><input style="width:10px;height: 10px; font-size: 8px;border-radius: 2px;border-color: grey;border-width:1px;"></td>
                                    <td style="width: 5px;border:none;height: 5px !important;padding: 0px; margin: 0px;"></td>
                                    <td colspan="2" align="center" style=" border-style: dashed;height: 5px !important;padding: 0px; margin: 0px; border-radius: 2px"><input style="width:10px;height: 10px; font-size: 8px;border-radius: 2px;border-color: grey;border-width:1px;"><input style="width:10px;height: 10px; font-size: 8px;border-radius: 2px;border-color: grey;border-width:1px;"></td>
                                </tr>
                                <tr>
                                    <td colspan="2" align="center" style=" border-style: dashed;height: 5px !important;padding: 0px; margin: 0px; border-radius: 2px;width: 160px"><input style="width:10px;height: 10px; font-size: 8px;border-radius: 2px;text-align: center;border-color: grey;border-width:1px;" value="3"></td>
                                    <td style="width: 5px;border:none;height: 5px !important;padding: 0px; margin: 0px;"></td>
                                    <td colspan="2" align="center" style=" border-style: dashed;height: 5px !important;padding: 0px; margin: 0px; border-radius: 2px"><input style="width:10px;height: 10px; font-size: 8px;border-radius: 2px;border-color: grey;border-width:1px;"></td>
                                    <td style="width: 5px;border:none;height: 5px !important;padding: 0px; margin: 0px;"></td>
                                    <td colspan="2" align="center" style=" border-style: dashed;height: 5px !important;padding: 0px; margin: 0px; border-radius: 2px"><input style="width:10px;height: 10px; font-size: 8px;border-radius: 2px;border-color: grey;border-width:1px;"></td>
                                    <td style="width: 5px;border:none;height: 5px !important;padding: 0px; margin: 0px;"></td>
                                    <td colspan="2" align="center" style=" border-style: dashed;height: 5px !important;padding: 0px; margin: 0px; border-radius: 2px"><input style="width:10px;height: 10px; font-size: 8px;border-radius: 2px;border-color: grey;border-width:1px;"><input style="width:10px;height: 10px; font-size: 8px;border-radius: 2px;border-color: grey;border-width:1px;"><input style="width:10px;height: 10px; font-size: 8px;border-radius: 2px;border-color: grey;border-width:1px;"><input style="width:10px;height: 10px; font-size: 8px;border-radius: 2px;border-color: grey;border-width:1px;"></td>
                                    <td style="width: 5px;border:none;height: 5px !important;padding: 0px; margin: 0px;"></td>
                                    <td colspan="2" align="center" style=" border-style: dashed;height: 5px !important;padding: 0px; margin: 0px; border-radius: 2px"><input style="width:10px;height: 10px; font-size: 8px;border-radius: 2px;border-color: grey;border-width:1px;"><input style="width:10px;height: 10px; font-size: 8px;border-radius: 2px;border-color: grey;border-width:1px;"></td>
                                </tr>
                                <tr>
                                    <td colspan="2" align="center" style=" border-style: dashed;height: 5px !important;padding: 0px; margin: 0px; border-radius: 2px;width: 160px"><input style="width:10px;height: 10px; font-size: 8px;border-radius: 2px;text-align: center;border-color: grey;border-width:1px;" value="4"></td>
                                    <td style="width: 5px;border:none;height: 5px !important;padding: 0px; margin: 0px;"></td>
                                    <td colspan="2" align="center" style=" border-style: dashed;height: 5px !important;padding: 0px; margin: 0px; border-radius: 2px"><input style="width:10px;height: 10px; font-size: 8px;border-radius: 2px;border-color: grey;border-width:1px;"></td>
                                    <td style="width: 5px;border:none;height: 5px !important;padding: 0px; margin: 0px;"></td>
                                    <td colspan="2" align="center" style=" border-style: dashed;height: 5px !important;padding: 0px; margin: 0px; border-radius: 2px"><input style="width:10px;height: 10px; font-size: 8px;border-radius: 2px;border-color: grey;border-width:1px;"></td>
                                    <td style="width: 5px;border:none;height: 5px !important;padding: 0px; margin: 0px;"></td>
                                    <td colspan="2" align="center" style=" border-style: dashed;height: 5px !important;padding: 0px; margin: 0px; border-radius: 2px"><input style="width:10px;height: 10px; font-size: 8px;border-radius: 2px;border-color: grey;border-width:1px;"><input style="width:10px;height: 10px; font-size: 8px;border-radius: 2px;border-color: grey;border-width:1px;"><input style="width:10px;height: 10px; font-size: 8px;border-radius: 2px;border-color: grey;border-width:1px;"><input style="width:10px;height: 10px; font-size: 8px;border-radius: 2px;border-color: grey;border-width:1px;"></td>
                                    <td style="width: 5px;border:none;height: 5px !important;padding: 0px; margin: 0px;"></td>
                                    <td colspan="2" align="center" style=" border-style: dashed;height: 5px !important;padding: 0px; margin: 0px; border-radius: 2px"><input style="width:10px;height: 10px; font-size: 8px;border-radius: 2px;border-color: grey;border-width:1px;"><input style="width:10px;height: 10px; font-size: 8px;border-radius: 2px;border-color: grey;border-width:1px;"></td>
                                </tr>
                                <tr>
                                    <td colspan="2" align="center" style=" border-style: dashed;height: 5px !important;padding: 0px; margin: 0px; border-radius: 2px;width: 160px"><input style="width:10px;height: 10px; font-size: 8px;border-radius: 2px;text-align: center;border-color: grey;border-width:1px;" value="5"></td>
                                    <td style="width: 5px;border:none;height: 5px !important;padding: 0px; margin: 0px;"></td>
                                    <td colspan="2" align="center" style=" border-style: dashed;height: 5px !important;padding: 0px; margin: 0px; border-radius: 2px"><input style="width:10px;height: 10px; font-size: 8px;border-radius: 2px;border-color: grey;border-width:1px;"></td>
                                    <td style="width: 5px;border:none;height: 5px !important;padding: 0px; margin: 0px;"></td>
                                    <td colspan="2" align="center" style=" border-style: dashed;height: 5px !important;padding: 0px; margin: 0px; border-radius: 2px"><input style="width:10px;height: 10px; font-size: 8px;border-radius: 2px;border-color: grey;border-width:1px;"></td>
                                    <td style="width: 5px;border:none;height: 5px !important;padding: 0px; margin: 0px;"></td>
                                    <td colspan="2" align="center" style=" border-style: dashed;height: 5px !important;padding: 0px; margin: 0px; border-radius: 2px"><input style="width:10px;height: 10px; font-size: 8px;border-radius: 2px;border-color: grey;border-width:1px;"><input style="width:10px;height: 10px; font-size: 8px;border-radius: 2px;border-color: grey;border-width:1px;"><input style="width:10px;height: 10px; font-size: 8px;border-radius: 2px;border-color: grey;border-width:1px;"><input style="width:10px;height: 10px; font-size: 8px;border-radius: 2px;border-color: grey;border-width:1px;"></td>
                                    <td style="width: 5px;border:none;height: 5px !important;widht:200px;padding: 0px; margin: 0px;"></td>
                                    <td colspan="2" align="center" style=" border-style: dashed;height: 5px !important;padding: 0px; margin: 0px; border-radius: 2px"><input style="width:10px;height: 10px; font-size: 8px;border-radius: 2px;border-color: grey;border-width:1px;"><input style="width:10px;height: 10px; font-size: 8px;border-radius: 2px;border-color: grey;border-width:1px;"></td>
                                </tr>
                                
                            </table>
                            <hr>
                            <div style=" margin-top:-5px">
                            <span style="position: relative; top:4px;"><img src="<?php echo base_url();?>../assets/img/negro.png" style="border-radius: 2px;width:16px; height:16px; border: 0px; padding: 0" /></span>
                            <span style="position: relative; left:-16px; color:white;font-size: 11px"><b>40</b></span>
                            INTERVENCIÓN QUIRÚRGICA&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input class="cubo"><span style="font-size:7px"> 1) SI&nbsp;&nbsp;2) NO</span>
                            <div align="right">CÓDIGO FONASA&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
                            <span style="position: relative; top:4px;"><img src="<?php echo base_url();?>../assets/img/negro.png" style="border-radius: 2px;width:16px; height:16px; border: 0px; padding: 0" /></span>
                            <span style="position: relative; left:-16px; color:white;font-size: 11px"><b>41</b></span>
                            INTERVENCIÓN QUIRÚRGICA PRINCIPAL .................................................................................................................................................................................. <input class="cubo"><input class="cubo"><input class="cubo"><input class="cubo"><input class="cubo"><input class="cubo"><input class="cubo">
                            <br>
                            <span style="position: relative; top:4px;"><img src="<?php echo base_url();?>../assets/img/negro.png" style="border-radius: 2px;width:16px; height:16px; border: 0px; padding: 0" /></span>
                            <span style="position: relative; left:-16px; color:white;font-size: 11px"><b>42</b></span>
                            OTRA INTERVENCIÓN QUIRÚRGICA&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp................................................................................................................................................................................... <input class="cubo"><input class="cubo"><input class="cubo"><input class="cubo"><input class="cubo"><input class="cubo"><input class="cubo">
                            <br>
                            </div>
                            
                        </div>
                        <br><br><br>
                        <div style=" margin-left:-15px">
                            &nbsp;&nbsp;<b>DATOS DEL MÉDICO O PROFESIONAL</b><br><br><br>
                            <div class="di">
                                <span style="position: relative; top:4px;"><img src="<?php echo base_url();?>../assets/img/negro.png" style="border-radius: 2px;width:16px; height:16px; border: 0px; padding: 0" /></span>
                                <span style="position: relative; left:-16px; color:white;font-size: 11px"><b>43</b></span>
                                NOMBRE
                                    <?php   IF(!empty($datos->nombresmedicoAsignado)){echo '<span style="font-family:courier;font-size:15px">&nbsp;'.strtoupper($datos->nombresmedicoAsignado).' '.strtoupper($datos->apellidomedicoAsignado).' '.strtoupper($datos->apellidoMmedicoAsignado).'</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';}
                                            ELSE echo ".............................................................................................";
                                    ?>
                                <span style="position: relative; top:4px;"><img src="<?php echo base_url();?>../assets/img/negro.png" style="border-radius: 2px;width:16px; height:16px; border: 0px; padding: 0" /></span>
                                <span style="position: relative; left:-16px; color:white;font-size: 11px"><b>44</b></span>
                                ESPECIALIDAD
                                    <?php   IF(!empty($datos->espMedico)){echo '<span style="font-family:courier;font-size:15px">&nbsp;'.strtoupper($datos->espMedico).'</span>';}
                                            ELSE echo ".............................................................................................";
                                    ?>
                                <br><br>
                            </div>
                            <div class="di">
                                <span style="position: relative; top:4px;"><img src="<?php echo base_url();?>../assets/img/negro.png" style="border-radius: 2px;width:16px; height:16px; border: 0px; padding: 0" /></span>
                                <span style="position: relative; left:-16px; color:white;font-size: 11px"><b>45</b></span>
                                <?php 
                                    IF(!empty($datos->rutmedico) && $datos->rutmedico !== '0'){
                                        $rut     = $datos->rutmedico;
                                        $rutCant = strlen($datos->rutmedico);
                                        
                                                IF(strlen($rut)=='8') $ocho = substr($rut,-8,1);ELSE $ocho='';
                                                $digito = RutDv($rut);
                                                //die('digito'.$digito);
                                                IF(empty($digito) && $digito != '0')$digito='';
                                    
                                ?>
                                    RUN <input class="cubo" value="<?php echo $ocho;?>"><input class="cubo" value="<?php echo substr($rut,-7,1);?>"><input class="cubo" value="<?php echo substr($rut,-6,1);?>"><input class="cubo" value="<?php echo substr($rut,-5,1);?>"><input class="cubo" value="<?php echo substr($rut,-4,1);?>"><input class="cubo" value="<?php echo substr($rut,-3,1);?>"><input class="cubo" value="<?php echo substr($rut,-2,1);?>"><input class="cubo" value="<?php echo substr($rut,-1,1);?>">-<input class="cubo" value="<?php echo $digito;?>">&nbsp;&nbsp;
                                <?php }ELSE{;?>
                                    RUN <input class="cubo"><input class="cubo"><input class="cubo"><input class="cubo"><input class="cubo"><input class="cubo"><input class="cubo"><input class="cubo">-<input class="cubo">&nbsp;&nbsp;
                                <?php };?>
                                <span style="position: relative; top:4px;"><img src="<?php echo base_url();?>../assets/img/negro.png" style="border-radius: 2px;width:16px; height:16px; border: 0px; padding: 0" /></span>
                                <span style="position: relative; left:-16px; color:white;font-size: 11px"><b>46</b></span>
                                FIRMA................................................
                                <span style="position: relative; top:4px;"><img src="<?php echo base_url();?>../assets/img/negro.png" style="border-radius: 2px;width:16px; height:16px; border: 0px; padding: 0" /></span>
                                <span style="position: relative; left:-16px; color:white;font-size: 11px"><b>47</b></span>
                                CORREO ELECTRÓNICO
                                <?php   
                                //die('largo'.strlen($datos->emailmedico));
                                        IF(strlen($datos->emailmedico) < '26')$tamano = '13'; ELSEIF (strlen($datos->emailmedico) >= '26' && strlen($datos->emailmedico) < '29')$tamano = '12';ELSEIF (strlen($datos->emailmedico) >= '29')$tamano = '10';
                                        IF(!empty($datos->emailmedico)){echo '<span style="font-family:courier;font-size:'.$tamano.'px">'.strtoupper($datos->emailmedico).'</span>';}
                                        ELSE echo ".............................................................................................";
                                ?>
                            </div>
                        </div>
                        
                        <span style="position: relative; top:2px;left:-15px"><img src="<?php echo base_url();?>../assets/img/negro.png" style="width:685px; height:10px; border: 0px; padding: 0" /></span>
                        <span style="position: relative; left:25px;top:-4px;color:white;font-size: 7px"><b>INFORMACIÓN PROTEGIDA POR LEY N°19.628 SOBRE PROTECCIÓN DE LA VIDA PRIVADA Y CON GARANTÍA DEL SECRETO ESTADÍSTICO, ESTABLECIDO EN LA LEY N°17.374</b></span>
                                
                            
                    </blockquote>
                    </div>
                    </div>
                </div>
                </div>