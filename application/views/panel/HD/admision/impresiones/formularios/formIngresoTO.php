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

<div style="page-break-before: always;" ></div>
            <div class="col-lg-12" align="right" style="margin-right: 40px">
                <img src="<?php echo base_url();?>../assets/img/mirAndes.png" class="logo">
            </div>
        <blockquote>
            
            <div style="margin-top:-28px">
                <h2 class="fucsia" >INGRESO A HOSPITAL DE DÍA</h2>
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
                        <td style="border:none;width:120px">
                            Fecha de Registro:
                        </td>
                        <td style="width:90px; border:none">
                            <?php 
                            IF(!empty($ingresos->ingFechaRegistro)){
                                $fecha = new DateTime($ingresos->ingFechaRegistro);
                                echo $fecha->format('d-m-Y');
                            }ELSE echo '_________________'
                            ?>
                        </td>
                    </tr>
                </table>
            </div>
            <br>
            <span class=" fucsia" style="font-size:15px"><b>1. Antecedentes Generales</b></span>
            <br><br>
            <div>
                <table style="font-size:13px !important; width: 670px">
                    <tr>
                        <td style="border:none;height: 350px;vertical-align: top" align="justify"><tt><?php IF(!empty($ingresos->ingAntGenerales))echo $ingresos->ingAntGenerales; ?></tt></td>
                    </tr>
                   
                </table>
            </div>
            <br><br><?php //die(var_dump($licencias));?>
            <span class=" fucsia" style="font-size:15px"><b>2. Antecedentes de Salud Mental</b></span>
            <br><br>
            <div>
                <table style="font-size:13px !important; width: 670px">
                    <tr>
                        <td style="border:none;height: 350px;vertical-align: top" align="justify"><tt><?php IF(!empty($ingresos->ingAntSalud))echo $ingresos->ingAntSalud; ?></tt></td>
                    </tr>
                </table>
            </div>
            
            <div align="right"><br>Pág. 1/3&nbsp;&nbsp;</div>
            <div style="transform: rotate(-90deg);top:-155px;left:510px;position: relative;width:350px;">
                        <span style=" font-size: 9px;opacity: 0.6">
                            PACIENTE: <label><?php echo strtoupper($datos->nombres).' '.strtoupper($datos->apellidoPaterno).' '.strtoupper($datos->apellidoMaterno);?></label> &nbsp;&nbsp;
                            RUT: <label><?php echo formatearRut($datos->rut);?></label> &nbsp;&nbsp;
                            FICHA: <label> <?php echo $datos->ficha; ?></label>
                        </span> 
            </div>
            <div align="right" style="margin-top:-320px">
            <img style="width: 560px;bottom:30px;right:30px;opacity: 0.4" src="<?php echo base_url();?>../assets/img/cerros.png">
            </div>
            
        </blockquote>
            <div style="page-break-before: always;" ></div>
            <div class="col-lg-12" align="right" style="margin-right: 40px">
                <img src="<?php echo base_url();?>../assets/img/mirAndes.png" class="logo">
            </div>
        <blockquote>
            <div style="margin-top:-28px">
                <h2 class="fucsia" >INGRESO A HOSPITAL DE DÍA</h2>
            </div>
            <div style="margin-top:-13px" class="hr"></div>
            <br><br>
            
            
            
            
            <span class=" fucsia" style="font-size:15px"><b>3. Información del Familiar</b></span>
            <br><br>
            <div>
                <table style="font-size:13px !important; width: 670px">
                    <tr>
                        <td style="border:none;height: 350px;vertical-align: top" align="justify"><tt><?php IF(!empty($ingresos->ingInfFamiliar))echo $ingresos->ingInfFamiliar; ?></tt></td>
                    </tr>
                </table>
            </div>
            <br><br>
            <span class=" fucsia" style="font-size:15px"><b>4. Consideraciones Importantes</b></span>
            <br><br>
            <div>
                <table style="font-size:13px !important; width: 670px">
                    <tr>
                        <td style="border:none;height: 350px;vertical-align: top" align="justify"><tt"><?php IF(!empty($ingresos->ingConsideraciones))echo $ingresos->ingConsideraciones; ?></tt></td>
                    </tr>
                    
                </table>
            </div>
            <div align="right"><br>Pág. 2/3&nbsp;&nbsp;</div>
            <div style="transform: rotate(-90deg);top:-155px;left:510px;position: relative;width:350px;">
                        <span style=" font-size: 9px;opacity: 0.6">
                            PACIENTE: <label><?php echo strtoupper($datos->nombres).' '.strtoupper($datos->apellidoPaterno).' '.strtoupper($datos->apellidoMaterno);?></label> &nbsp;&nbsp;
                            RUT: <label><?php echo formatearRut($datos->rut);?></label> &nbsp;&nbsp;
                            FICHA: <label> <?php echo $datos->ficha; ?></label>
                        </span> 
            </div>
            <div align="right" style="margin-top:-320px">
            <img style="width: 560px;bottom:30px;right:30px;opacity: 0.4" src="<?php echo base_url();?>../assets/img/cerros.png">
            </div>
          
        </blockquote>
            <div style="page-break-before: always;" ></div>
            <div class="col-lg-12" align="right" style="margin-right: 40px">
                <img src="<?php echo base_url();?>../assets/img/mirAndes.png" class="logo">
            </div>
        <blockquote>
            <div style="margin-top:-28px">
                <h2 class="fucsia" >INGRESO A HOSPITAL DE DÍA</h2>
            </div>
            <div style="margin-top:-13px" class="hr"></div>
            <br><br>
        


            
        <span class=" fucsia" style="font-size:15px"><b>5. Genograma</b></span>
            <br><br>
            <div>
                <table style="font-size:13px !important; width: 670px">
                    <tr>
                        <td style="width: 120px;border-top:none;height: 750px" ></td>
                    </tr>
                    
                </table>
            </div>
            <div align="right"><br>Pág. 3/3&nbsp;&nbsp;</div>
            <div style="transform: rotate(-90deg);top:-155px;left:510px;position: relative;width:350px;">
                        <span style=" font-size: 9px;opacity: 0.6">
                            PACIENTE: <label><?php echo strtoupper($datos->nombres).' '.strtoupper($datos->apellidoPaterno).' '.strtoupper($datos->apellidoMaterno);?></label> &nbsp;&nbsp;
                            RUT: <label><?php echo formatearRut($datos->rut);?></label> &nbsp;&nbsp;
                            FICHA: <label> <?php echo $datos->ficha; ?></label>
                        </span> 
            </div>
            <div align="right" style="margin-top:-320px">
            <img style="width: 560px;bottom:30px;right:30px;opacity: 0.4" src="<?php echo base_url();?>../assets/img/cerros.png">
            </div>
            
        </blockquote>
</div>