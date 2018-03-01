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
    
    .fucsia {color: #B404AE;}
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
                <h2 class="fucsia" >EVOLUCIÓN MÉDICA</h2>
            </div>
            <div style="margin-top:-13px" class="hr">
            </div>
            <br><br>
            <div class="col-lg-12" aling="center">
                <table style="font-size:13px !important; width: 670px">
                    <thead>
                        <tr>
                            <td style="border:none;width: 120px"><b>Nombre Usuario/a: </b></td>
                            <td style="border:none;width: 250px"><b><?php echo ' '.strtoupper($datos->nombres).' '.strtoupper($datos->apellidoPaterno).' '.strtoupper($datos->apellidoMaterno);?></b></td>
                            <td style="width:50px; border: none" align="center"><b>Rut:</b></td>
                            <td style="min-width:75px; border: none" align="center"><b><?php echo formatearRut($datos->rut);?></b></td>
                            <td style="min-width:50px; border: none" align="center"><b>Ficha</b></td>
                            <td style="min-width:50px; border: none" align="center"><b><?php echo $datos->ficha;?></b></td>
                        </tr>
                    </thead>
                <tbody>
                    <tr style="height: 800px; text-align: justify; vertical-align: top">
                        <td colspan="6" style="max-width:670px; ">
                            <?php 
                                echo '<b>'.strtoupper($evaluacion->uspNombre).' '.strtoupper($evaluacion->uspApellidoP).' '.strtoupper($evaluacion->uspApellidoM).'. ';
                                 IF(!empty($evaluacion->fechaEdicion))$date = $evaluacion->fechaEdicion; ELSE $date = $evaluacion->fechaCreacion; 
                                 $date = new DateTime($date);echo $date->format('d-m-Y');
                                 //$date = new DateTime($evaluacion->evaFechaRegistro);echo $date->format('d-m-Y');
                                 IF($evaluacion->tipoReposo!='Seleccione...')$reposo = $evaluacion->tipoReposo; ELSE $reposo = '';
                                 IF(!empty($evaluacion->regimenAlimentario))$regimen = $evaluacion->regimenAlimentario; ELSE $reposo = '';
                                echo '</b><br>';
                                echo '<u>Evaluación</u>:<br><br><blockquote>'.$evaluacion->evaluacion.'</blockquote>';
                                echo '<u>Indicaciones Médicas</u>:<br><br><blockquote>Reposo: '.$reposo.'<br>'
                                        . 'Regimen Alimentario: '.$regimen.'<br>'
                                        . '</blockquote>';
                                echo '<u>Otras Indicaciones</u>:<br><br><blockquote>'.$evaluacion->indicacionesOtro.'</blockquote>';
                                echo '<u>Medicamentos</u>:<br><br><blockquote>'.$evaluacion->medicamentos.'</blockquote>';
                                echo '<u>Médicamentos SOS</u>:<br><br><blockquote>'.$evaluacion->medicamentosSOS.'</blockquote>';
                            ?>
                        </td>
                    </tr>
                </tbody>
            </table>
            </div>
            <div align="right" style="margin-top:-300px">
            <img style="width: 560px;bottom:30px;right:30px;opacity: 0.4" src="<?php echo base_url();?>../assets/img/cerros.png">
            </div>
        </blockquote>
</div>