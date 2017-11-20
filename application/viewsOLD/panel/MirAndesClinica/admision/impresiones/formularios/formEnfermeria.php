<?php error_reporting(E_ALL ^ E_NOTICE); 
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
<div style="page-break-before: always;">
                    <div class="col-lg-10" align="right" style=" margin-right: 40px">
                        <img src="<?php echo base_url();?>../assets/img/mirAndes.png" class="logo">
                    </div>
                    <div class="col-lg-10" align="right">
                        <?php 
                            $dia = date('d');$mes = date('m');$ano = date('Y');
                            if($mes==='10')$mes='Octubre';elseif($mes==='11')$mes='Noviembre';elseif($mes==='12')$mes='Diciembre';elseif($mes==='01')$mes='Enero';elseif($mes==='02')$mes='Febrero';elseif($mes==='03')$mes='Marzo';elseif($mes==='04')$mes='Abril';elseif($mes==='05')$mes='Mayo';elseif($mes==='06')$mes='Junio';elseif($mes==='07')$mes='Julio';elseif($mes==='08')$mes='Agosto';elseif($mes==='09')$mes='Septiembre';
                            echo '<br>Providencia, '.$dia.' de '.$mes.' de '.$ano.'<br>';
                        ?>
                    </div>
                        
                    <div class="col-lg-12" align="center">
                        <h4>VALORIZACIÓN DE ENFERMERIA AL INGRESO</h4>
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
                                    IF(!empty($enfermeria)){
                                        $ingreso = explode('_', $enfermeria->enfIngreso);
                                        $motivo  = $enfermeria->enfMotivo;
                                    }
                                    ELSE {
                                        $ingreso[0] = $motivo = '';
                                    }
                                    
                        ?>
    <style>table{font-size:12px}</style>
    <div align="justify" style="font-size:12px">
                        <div>
                        <b>NOMBRE: </b><?php IF(!empty($datos->nombres))echo strtoupper($datos->nombres).' '.strtoupper($datos->apellidoPaterno).' '.strtoupper($datos->apellidoMaterno); ?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b>EDAD:</b> <?php echo $edad; ?>
                        <br>
                        <b>DIAGNOSTICO INGRESO:</b> <?php IF(!empty($datos->diagnostico))echo strtoupper($datos->diagnostico); ELSE echo '...............................................................'?>
                        <br>
                        <b>OCUPACIÓN</b> <?php IF(!empty($datos->ocupacion))echo strtoupper($datos->ocupacion); ELSE echo '...............................................................'?>
                        <br>
                        <b>TIPO DE INGRESO:&nbsp;&nbsp;</b> <input type="radio" value="0" name="tipoIngreso" <?php IF($ingreso[0]==='0') echo 'checked';?>> VOLUNTARIO &nbsp;&nbsp;&nbsp;<input type="radio" value="1" name="tipoIngreso" <?php IF($ingreso[0]==='1') echo 'checked';?>> INVOLUNTARIO. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>PROCEDENCIA:</b> <input type="text" name="procedencia" value="<?php IF(!empty($ingreso[1]))echo $ingreso[1];?>" style="border:none">
                        
                        </div>
                        <h4>MOTIVO DE INGRESO: </h4>
                        <textarea placeholder="Breve" style=" width: 100%;height: 40px" name="motivo"><?php echo $motivo;?></textarea>
                        <div align="center">
                            <?php
                            $this->load->view('panel/MirAndesClinica/admision/impresiones/formularios/enfermeria/formExamenMental_0');
                            ?>
                        </div>
                    <br><br>
                    <div class="col-lg-10" align="right">1/3</div>  
                    
                    
                    <div style="page-break-before: always;"></div>
                    
                     
                     
                    <div style="page-break-before: always;"></div>
                    
                        <h4>VALORACIÓN DEL EXAMEN MENTAL</h4>
                        <!--Completar marcando con un ticket ó encerrando en un circulo segun 
                        -->
                    <div style="font-size: 12px !important;"> 
                        <div align="center">
                            <?php
                            $this->load->view('panel/MirAndesClinica/admision/impresiones/formularios/enfermeria/formExamenMental_1_formulario');
                            ?>
                        </div>
                        <div align="center">
                            <?php
                            //$this->load->view('panel/MirAndesClinica/admision/impresiones/formularios/enfermeria/formExamenMental_2');
                            ?>
                        </div>
                    </div>
                      
                        <br>
                        <h4>CUIDADOS DE ENFERMERÍA INMEDIATOS</h4>(Marcar con una cruz)
                        <br><br>
                        
                        <div align="center">
                            <?php
                            $this->load->view('panel/MirAndesClinica/admision/impresiones/formularios/enfermeria/formExamenMental_3');
                            ?>
                        </div>
                    
                        <br><br><br><br><br>
        
        <b>NOMBRE Y FIRMA EU:</b> ....................................................................................... &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>FECHA:</b> <?php echo $dia.' de '.$mes.' de '.$ano.'<br>';?>
        <br><br><br><br>
                        
                        <div class="col-lg-10" align="right">3/3</div>   
                </div>
                </div>