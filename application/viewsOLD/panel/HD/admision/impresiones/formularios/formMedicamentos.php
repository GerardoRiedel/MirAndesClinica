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
                <h2 class="fucsia" >ENTREGA DE MEDICAMENTOS DE RESERVA</h2>
            </div>
            <div style="margin-top:-13px" class="hr">
            </div>
            <br><br>
            <div>
                <label style=" width:10%">Nombre Usuario/a: </label> 
                <input style="border:1px solid black;width:83%;height: 30px" type="text" value="<?php echo ' '.strtoupper($datos->nombres).' '.strtoupper($datos->apellidoPaterno).' '.strtoupper($datos->apellidoMaterno);?>">
            </div>
            <br>
            <div>
                <label style=" width:10%">Fecha de Entrega: </label> 
                <input style="border:1px solid black;width:83%;height: 30px" type="text" value="<?php IF(!empty($datos->fechaNacimiento))echo ' ';?>">
            </div>
            <br><br>
            
            <div class="col-lg-12" aling="center">
                <table style="font-size:13px !important; width: 650px">
                    <thead>
                        <tr>
                            <td style="min-width:350px; border-top: none; height: 25px" align="center">Medicamento / Dosis</td>
                            <td style="min-width:150px; border-top: none" align="center">Horarios</td>
                            <td style="min-width:150px; border-top: none" align="center">Cantidad Entregada</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $count = 0;?>

                        <?php WHILE($count<10){?>
                        <?php $count += 1;?>
                        <tr><td style="height: 40px"></td><td></td><td></td></tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            
            <br><br>
            <div>
                <table style="font-size:13px !important; width: 670px">
                    <tr>
                        <td rowspan="4" style="border-top: none;border-right: 1px solid black;width: 95px"><span class=" fucsia">INDICACIONES: </span></td>
                        <td style="border-top: none;border-left: none"><span class=" fucsia">1. </span>Asegúrese de aclarar todas sus dudas en relación a su tratamiento farmacológico ANTES de retirarse.</td>
                    </tr>
                    <tr>
                        <td><span class=" fucsia">2. </span>Administre los medicamentos en CANTIDAD Y HORARIO INDICADOS.</td>
                    </tr>
                    <tr>
                        <td><span class=" fucsia">3. </span>Dentro de sus fármacos se incluye medicamentos SOS. Hacer uso de ellos SÓLO en caso de ser necesario, acorde a lo aprendido en el transcurso de su Hospitalización Diurna.</td>
                    </tr>
                    <tr>
                        <td><span class=" fucsia">4. </span>Ante cualquier inconveniente, como por ejemplo error en la administración de sus medicamentos, o sentir malestar que no es posible manejar mediante las técnicas aprendidas en el transcurso de su Hospitalización Diurna, o uso de SOS, consultar a un SERVICIO DE URGENCIA.</td>
                    </tr>
                </table>
            </div>
            <br>
            <div>
                <table style="font-size:13px !important; border:none;width: 670px">
                    <tr>
                        <td style="border:none;width: 200px">Nombre y Firma Usuario/Familiar </td>
                        <td style="border:none"><input style="border:1px solid black;width:100%;height: 30px" type="text" value=""></td>
                    </tr>
                </table>
            </div>
            <br>
            <div>
                <table style="font-size:13px !important; border:none;width: 670px">
                    <tr>
                        <td style="border:none;width: 200px">Nombre y Firma Equipo MirAndes </td>
                        <td style="border:none"><input style="border:1px solid black;width:100%;height: 30px" type="text" value=""></td>
                    </tr>
                </table>
            </div>
            <div align="right" style="margin-top:-315px">
            <img style="width: 560px;bottom:30px;right:30px;opacity: 0.3" src="<?php echo base_url();?>../assets/img/cerros.png">
            </div>
        </blockquote>
</div>
