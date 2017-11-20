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
</style>

<div style="page-break-after: always;" >
            <div class="col-lg-12" align="right" style="margin-right: 40px">
                <img src="<?php echo base_url();?>../assets/img/mirAndes.png" class="logo">
            </div>
        <blockquote>
            
            <div style="margin-top:-28px">
                <h2 class="fucsia" >SOLICITUD DE RECETAS</h2>
            </div>
            <div style="margin-top:-13px" class="hr">
            </div>
            <br><br>
            <span class=" fucsia" style="font-size:15px"><b>1. Datos Personales</b></span>
            <br><br>
            <div>
                <table style="font-size:13px !important; border:none;width: 670px">
                    <tr>
                        <td style="border:none;width: 120px">Nombre Usuario/a: </td>
                        <td style="border:none"><input style="border:1px solid black;width:100%;height: 25px" type="text" value="<?php echo ' '.strtoupper($datos->nombres).' '.strtoupper($datos->apellidoPaterno).' '.strtoupper($datos->apellidoMaterno);?>"></td>
                    </tr>
                </table>
            </div>
            <br>
            <div>
                <table style="font-size:13px !important; border:none;width: 670px">
                    <tr>
                        <td style="border:none;width: 120px">Edad: </td>
                        <td style="border:none;width: 70px"><input style="border:1px solid black;width:100%;height: 25px" type="text" value="<?php IF(!empty($datos->fechaNacimiento))echo ' '.calculaedad($datos->fechaNacimiento);?>"></td>
                        <td style="border:none;width: 70px" align="right"> Rut:&nbsp;&nbsp;</td>
                        <td style="border:none"><input style="border:1px solid black;width:100%;height: 25px" type="text" value="<?php echo ' '.formatearRut($datos->rut);?>"></td>
                        <td style="border:none;width: 70px" align="right"> Comuna:&nbsp;&nbsp;</td>
                        <td style="border:none"><input style="border:1px solid black;width:100%;height: 25px" type="text" value="<?php echo ' '.$datos->comuna;?>"></td>
                    </tr>
                </table>
            </div>
            <br>
            <div>
                <table style="font-size:13px !important; border:none;width: 670px">
                    <tr>
                        <td style="border:none;width: 120px">Domicilio: </td>
                        <td style="border:none"><input style="border:1px solid black;width:100%;height: 25px" type="text" value="<?php IF(!empty($datos->direccion))echo ' '.strtoupper($datos->direccion);?>"></td>
                    </tr>
                </table>
            </div>
            <br>
            <div>
                <table style="font-size:13px !important; border:none;width: 670px">
                    <tr>
                        <td style="border:none;width: 120px">Médico Tratante: </td>
                        <td style="border:none"><input style="border:1px solid black;width:100%;height: 25px" type="text" value="<?php IF(!empty($datos->nombresmedicoAsignado))echo ' '.strtoupper($datos->nombresmedicoAsignado).' '.strtoupper($datos->apellidomedicoAsignado).' '.strtoupper($datos->apellidoMmedicoAsignado);?>"></td>
                    </tr>
                </table>
            </div>
            <br><br>
            <span class=" fucsia" style="font-size:15px"><b>2. Detalle Solicitud Recetas</b></span>
            <br><br>
            <div class="col-lg-12" aling="center">
                <table style="font-size:13px !important; width: 670px">
                    <thead>
                        <tr>
                            <td style="min-width:200px; border-top: none; height: 25px" align="center">Fármaco</td>
                            <td style="min-width:115px; border-top: none" align="center">Dosis</td>
                            <td style="width:75px; border-top: none" align="center">¿Aumento Dosis?<br>SI / NO</td>
                            <td style="width:75px; border-top: none" align="center">Fecha Solicitud</td>
                            <td style="min-width:120px;  border-top: none" align="center">Fecha Entrega y Firma Médico</td>
                        </tr>
                    </thead>
                <tbody>
                    <?php $count = 0;?>
            
                    <?php WHILE($count<13){?>
                    <?php $count += 1;?>
                    <tr><td style="height: 40px"></td><td></td><td></td><td></td><td></td></tr>
                    <?php } ?>
                </tbody>
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
                <h2 class="fucsia" >SOLICITUD DE RECETAS</h2>
            </div>
            <div style="margin-top:-13px" class="hr">
            </div>
            <br><br>
            <div class="col-lg-12" aling="center">
                <table style="font-size:13px !important; width: 670px">
                    <thead>
                        <tr>
                            <td style="min-width:200px; border-top: none; height: 25px" align="center">Fármaco</td>
                            <td style="min-width:115px; border-top: none" align="center">Dosis</td>
                            <td style="width:75px; border-top: none" align="center">¿Aumento Dosis?<br>SI / NO</td>
                            <td style="width:75px; border-top: none" align="center">Fecha Solicitud</td>
                            <td style="min-width:120px;  border-top: none" align="center">Fecha Entrega y Firma Médico</td>
                        </tr>
                    </thead>
                <tbody>
                    <?php $count = 0;?>
            
                    <?php WHILE($count<18){?>
                    <?php $count += 1;?>
                    <tr><td style="height: 40px"></td><td></td><td></td><td></td><td></td></tr>
                    <?php } ?>
                </tbody>
            </table>
            </div>
            <div align="right" style="margin-top:-300px">
            <img style="width: 560px;bottom:30px;right:30px;opacity: 0.4" src="<?php echo base_url();?>../assets/img/cerros.png">
            </div>
        </blockquote>
</div>