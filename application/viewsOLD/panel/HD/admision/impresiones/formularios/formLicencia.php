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
    .cubo2 {padding-top: 20px;text-align: left; vertical-align: bottom; width:665px;height: 38px;border:1px solid black; border-radius: 10px}
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
                <h2 class="fucsia" >SOLICITUD DE LICENCIAS MÉDICAS</h2>
            </div>
            <div style="margin-top:-13px" class="hr">
            </div>
            <br><br><br>
            <span class=" fucsia" style="font-size:15px"><b>A. IDENTIFICACIÓN DEL TRABAJADOR</b></span>
            <br><br>
            <div class="cubo2">&nbsp;&nbsp;
                <?php echo strtoupper($datoslic[0]->apellidoPaterno);?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <?php echo strtoupper($datoslic[0]->apellidoMaterno);?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <?php echo strtoupper($datoslic[0]->nombres);?>
            </div>
            <br>
            &nbsp;
            APELLIDO PATERNO&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            APELLIDO MATERNO&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            NOMBRE
            <br><br>
            <div class="cubo2">&nbsp;&nbsp;
                <?php IF(!empty($datoslic[0]->rut))echo formatearRut($datoslic[0]->rut);?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <?php IF(!empty($datoslic[0]->fechaNacimiento)){$date = new DateTime($datoslic[0]->fechaNacimiento); echo $date->format('d-m-Y');}?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <?php IF(!empty($datoslic[0]->fechaNacimiento))echo calculaedad($datoslic[0]->fechaNacimiento);?>
            </div>
            <br>
            &nbsp;
            RUT&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            FECHA NACIMIENTO&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            EDAD
            <br><br><br>
            <span  class=" fucsia" style="font-size:15px"><b>B. REGISTRO DE LICENCIAS MÉDICAS REQUERIDAS</b></span>
            <br><br>
            MÉDICO TRATANTE: <?php echo strtoupper($datoslic[0]->nombresmedicoAsignado).' '.strtoupper($datoslic[0]->apellidomedicoAsignado).' '.strtoupper($datoslic[0]->apellidoMmedicoAsignado);?>
            <br><br>
            <div class="col-lg-12">
                <table style="font-size:13px !important;">
                    <thead>
                        <tr><!--
                            <td style="min-width:30px;  border-top: none; height: 25px" align="center">N°</td>
                            -->
                            <td style="min-width:90px;  border-top: none" align="center">N° LICENCIA</td>
                            <td style="min-width:115px; border-top: none" align="center">FECHA INICIO LM</td>
                            <td style="min-width:55px;  border-top: none" align="center">N° DÍAS</td>
                            <td style="min-width:150px; border-top: none" align="center">MÉDICO EMISOR</td>
                            <td style="min-width:120px;  border-top: none" align="center">CENTRO EMISOR</td>
                            <td style="min-width:135px; border-top: none" align="center">FECHA TÉRMINO LM</td>
                        </tr>
                    </thead>
                <tbody>
                    <?php $count = 0;?>
            <?php FOREACH ($licencias as $lic){;?>
                    <?php $count += 1; ?>
                    <tr><!--
                        <td align="center" style="height: 40px"><?php echo $lic->licId;?></td>
                        -->
                        <td align="center" style="height: 40px"><?php echo $lic->licNumero;?></td>
                        <td align="center"><?php $date = new DateTime($lic->licDesde);echo $date->format('d-m-Y');?></td>
                        <td align="center"><?php echo $lic->licDias;?></td>
                        <td><?php IF(!empty($lic->licMedNombre))echo strtoupper($lic->licMedNombre).' '.strtoupper($lic->licMedApePat).' '.strtoupper($lic->licMedApeMat);ELSE echo strtoupper($lic->nombreMedico)?></td>
                        <td align="center"><?php echo strtoupper($lic->licCentro);?></td>
                        <td align="center"><?php $date = new DateTime($lic->licHasta);echo $date->format('d-m-Y');?></td>
                    </tr>
            <?php };?>
                    <?php WHILE($count<6){?>
                    <?php $count += 1;?>
                    <tr><td style="height: 40px"></td><td></td><td></td><td></td><td></td><td></td></tr>
                    <?php } ?>
                </tbody>
            </table>
                </div>
            
            
            
            <br><br>
            <span  class=" fucsia" style="font-size:15px"><b>C. OBSERVACIONES</b></span>
            <br><br>
            <div class="cubo3">
                &nbsp;&nbsp;
                <?php echo $datos->comentario;?>
            </div>
            
            
            <div align="right" style="margin-top:-270px">
            <img style="width: 560px;bottom:30px;right:30px;opacity: 0.4" src="<?php echo base_url();?>../assets/img/cerros.png">
            </div>
        </blockquote>
</div>
