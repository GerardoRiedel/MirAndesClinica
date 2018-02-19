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
    .cubo2 {padding-top: 20px;text-align: left; vertical-align: bottom; width:665px;height: 38px;border:1px solid black; border-radius: 10px}
    .cubo20 {font-size:20px;padding-top: 20px;text-align: left; vertical-align: bottom; width:300px;height: 38px;border:1px solid black; border-radius: 10px}
    .cubo21 {padding-top: 20px;text-align: left; vertical-align: bottom; width:665px;height: 60px;border:1px solid black; border-radius: 10px}
    .cubo22 {padding-top: 20px;text-align: left; vertical-align: bottom; width:665px;height: 80px;border:1px solid black; border-radius: 10px}
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
        width: 25px;
        height: 25px;
        -moz-border-radius: 50%;
        -webkit-border-radius: 50%;
        border-radius: 50%;
        background-color: #B404AE;
        border: 13px solid #B404AE;
        color: #B404AE;
    }
    
    
</style>

<div style="page-break-after: always;" >
            <div class="col-lg-12" align="right" style="margin-right: 40px">
                <img src="<?php echo base_url();?>../assets/img/mirAndes.png" class="logo">
            </div>
        <blockquote>
            
            <div style="margin-top:-28px">
                <h2 class="fucsia" >SOLICITUD</h2>
            </div>
            <div style="margin-top:-13px" class="hr">
            </div>
            <br>
            <div class="cubo2">&nbsp;&nbsp;
                <span style="font-size:15px">Nombre<b> <?php echo strtoupper($datos->nombres).' '.strtoupper($datos->apellidoPaterno).' '.strtoupper($datos->apellidoMaterno);?></b></span>
            </div>
            <br>
            &nbsp;
            <span  class=" fucsia" style="font-size:15px"><b>Solicito autorización para:</b></span>
            <br><br>
            <table style="border:none">
                <tbody>
                <tr>
                    <td style=" width: 30px; border:none" align="center"><div><input type="text" name="motivoSolicitud" value="1"  <?php IF(!empty($datosSol->solTipo)){IF($datosSol->solTipo === '1')echo 'class="circuloCheck"';ELSE echo 'class="circulo"'; };?>></div></td>
                    <td style=" width: 200px; border:none">Llegar tarde</td>
                    <td style=" width: 30px; border:none" align="center"><div><input type="text" name="motivoSolicitud" value="2"  <?php IF(!empty($datosSol->solTipo)){IF($datosSol->solTipo === '2')echo 'class="circuloCheck"';ELSE echo 'class="circulo"'; };?>></div></td>
                    <td style=" width: 200px; border:none">Retirarme Antes</td>
                    <td style=" width: 30px; border:none" align="center"><div><input type="text" name="motivoSolicitud" value="3"  <?php IF(!empty($datosSol->solTipo)){IF($datosSol->solTipo === '3')echo 'class="circuloCheck"';ELSE echo 'class="circulo"'; };?>></div></td>
                    <td style=" width: 150px; border:none">Todo el día</td>
                </tr>
                </tbody>
            </table>
            <br><br>
            <div class="cubo20" align="left">&nbsp;
                <span style="font-size:15px">Indicar Fecha <b>
                <?php $date = new DateTime($datosSol->solFecha); echo $date->format('d-m-Y');?></b>
                </span>
            </div>
            <div class="cubo20" align="left" style="margin-top: -61px; margin-left: 363px">&nbsp;&nbsp;
                <span style="font-size:15px">Indicar Hora <b>
                <?php $date = new DateTime($datosSol->solHora); echo $date->format('H:i');?></b>
                </span>
            </div>
            <br>
            <div class="cubo22">&nbsp;&nbsp;
                <span style="font-size:15px">Motivo <b> <?php echo strtoupper($datosSol->solMotivo);?></b></span>
            </div>
            <br>
            <div class="cubo2">&nbsp;&nbsp;
                <span style="font-size:15px">Nombre de Usuario<b> <?php echo strtoupper($datos->nombres).' '.strtoupper($datos->apellidoPaterno).' '.strtoupper($datos->apellidoMaterno);?></b></span>
            </div>
            <br>
            <div class="cubo21">&nbsp;&nbsp;
                <span style="font-size:15px">Firma de Usuario </span>
            </div>
            <br>
            &nbsp;
            <span  class=" fucsia" style="font-size:15px"><b>Autorización por equipo</b></span>
            <br><br>
            <div class="cubo2">&nbsp;&nbsp;
                <span style="font-size:15px">Nombre<b> <?php IF(!empty($datosSol->uspNombre))echo strtoupper($datosSol->uspNombre).' '.strtoupper($datosSol->uspApellidoP); ELSEIF(!empty($datosSol->solProfesional))echo strtoupper($datosSol->solProfesional);?></b></span>
            </div>
            <br>
            <div class="cubo21">&nbsp;&nbsp;
                <span style="font-size:15px">Firma </span>
            </div>
            <br>
            <div style="text-align: justify">
            <span style="font-size:11px">IMPORTANTE<br>
            La autorización de permisos debe ser gestionada con su médico tratante, psicóloga, terapeuta ocupacional o enfermera, y debe ser firmado por alguno de ellos para que tenga validez.
            <br>
            Recuerde que si no asiste al control semanal con alguno de los profesionales del equipo, no es posible recuperar esa sesión. Las horas de atención son consideradas dentro del horario de funcionamiento de Hospital de Día (10:00 a 16:00 horas). De esr citado previo a este horario, será informado oportunamente.
            <br>
            Si usted presenta inasistencias o atrasos sin justificación previa, quedarán dentro de su registro de intervenciones, lo cuál podría ser motivo de alta de Hospitalización de Día.
            </span>
            </div>
            
            <div align="right" style="margin-top:-300px">
            <img style="width: 560px;bottom:30px;right:30px;opacity: 0.4" src="<?php echo base_url();?>../assets/img/cerros.png">
            </div>
        </blockquote>
</div>