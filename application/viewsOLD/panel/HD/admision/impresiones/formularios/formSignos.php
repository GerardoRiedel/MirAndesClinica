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
    .hrRotar{-webkit-transform: rotate(90deg);border: 1px dashed #B404AE; height: 0; width: 100%;}
    .hr2 {border: 0; border-top: 1px solid #999; border-bottom: 1px solid #333; height:0;}
    .fucsia {color: #B404AE;}
    .cubo {text-align: left; vertical-align: top; width:220px;height: 135px;border:1px solid black; text-align: top;border-radius: 10px}
    span {font-size: 12px; font-family: arial}
    .page {  
    writing-mode: tb-rl; 
    height: 80%; 
    margin: 10% 0%; 
    } 
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
    .rotar{
        -ms-transform: rotate(270deg); /* IE 9 */
        -webkit-transform: rotate(270deg); /* Safari */
        transform: rotate(270deg);
    }
</style>

<div style="margin-top: 220px;margin-left: -150px;page-break-after: always; width: 1400px !important" class="rotar">
            <div class="col-lg-12" align="right" style="margin-right: 40px">
                <img src="<?php echo base_url();?>../assets/img/mirAndes.png" class="logo">
            </div>
        <blockquote>
            
            <div>
                <h1 class="fucsia">REGISTRO DE SIGNOS VITALES Y PARÁMETROS NUTRICIONALES</h1>
            </div>
            <div class="hr">
            </div>
            <br><br>
            <div style="font-size:20px">
            Nombre Usuario/a: <?php echo strtoupper($datos->nombres).' '.strtoupper($datos->apellidoPaterno).' '.strtoupper($datos->apellidoMaterno)?>
            <div align="right" style="margin-top:-21px">Diagnóstico: <?php IF(!empty($datos->diagnostico))echo strtoupper($datos->diagnostico).'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';ELSE echo '_________________________________________________'?></div>
            </div>
            <br><br>
            <table style="width:1400px">
                <thead>
                    <td style="border-top: none; width: 85px ;height: 40px" align="center"></td>
                    <td style="border-top: none; width: 95px " align="center">Fecha</td>
                    <td style="border-top: none; width: 100px" align="center">Hora Medición</td>
                    <td style="border-top: none; width: 100px" align="center">Peso (P)</td>
                    <td style="border-top: none; width: 110px" align="center">Circunferencia<br>Abdominal (CA)</td>
                    <td style="border-top: none; width: 130px" align="center">Índice de<br>Masa Corporal<br>(Talla: <?php IF(!empty($signos[0]->sigTalla))echo $signos[0]->sigTalla;ELSE echo '.........';?>)</td>
                    <td style="border-top: none; width: 100px" align="center">Temperatura<br>(T°)</td>
                    <td style="border-top: none; width: 100px" align="center">Presión<br>Arterial (PA)</td>
                    <td style="border-top: none; width: 100px" align="center">Frecuencia<br>Cardiaca (FC)</td>
                    <td style="border-top: none; width: 100px" align="center">Frecuencia<br>Respiratoria<br>(FR)</td>
                    <td style="border-top: none; width: 100px" align="center">EU / TENS</td>
                </thead>
            <?php $count = 0;
            
                FOREACH ($signos as $sig){;?>
                <tr>
                    <?php $count += 1;
                            IF ($count===1)$semana = 'Ingreso';
                            ELSEIF($count===2)$semana = 'Semana 1';
                            ELSEIF($count===3)$semana = 'Semana 2';
                            ELSEIF($count===4)$semana = 'Semana 3';
                            ELSEIF($count===5)$semana = 'Semana 4';
                            ELSEIF($count===6)$semana = 'Semana 5';
                            ELSEIF($count===7)$semana = 'Semana 6';
                            ELSEIF($count===8)$semana = 'Semana 7';
                            ELSEIF($count===9)$semana = 'Semana 8';
                            ELSEIF($count===10)$semana = 'Semana 9';
                            ELSEIF($count===11)$semana = 'Semana 10';
                            ELSEIF($count===12)$semana = 'Semana 11';
                            ELSEIF($count===13)$semana = 'Semana 12';
                            ELSEIF($count===14)$semana = 'Semana 13';
                            ELSEIF($count===15)$semana = 'Semana 14';
                    ?>
                    <td class="fucsia" style=" height: 50px"><b><?php echo $semana;?></b></td>
                    <td align="center"> <?php $date = new DateTime($sig->sigFechaIngreso);echo $date->format('d-m-Y');?></td>
                    <td align="center"><?php $hora = new DateTime($sig->sigHoraIngreso);echo $hora->format('H:i');?></td>
                    <td align="center"><?php echo $sig->sigPeso;?></td>
                    <td align="center"><?php echo $sig->sigCA;?></td>
                    <?php 
                        IF($sig->sigIMC<18.5){
                            $peso  = 'BP';
                            $color = 'red';
                        }ELSEIF($sig->sigIMC>=18.5 && $sig->sigIMC<25){
                            $color = 'green';
                            $peso  = 'N';
                        }ELSEIF($sig->sigIMC>=25 && $sig->sigIMC<30){
                            $color = 'orange';
                            $peso  = 'SP';
                        }ELSEIF($sig->sigIMC>=30 && $sig->sigIMC<40){
                            $color = 'orangered';
                            $peso  = 'O';
                        }ELSEIF($sig->sigIMC>=40){
                            $color = 'red';
                            $peso  = 'OM';
                        }
                    ?>
                    <td align="center" style="color:<?php echo $color;?>"><?php echo $sig->sigIMC.' '.$peso;?></td>
                    <td align="center"><?php echo $sig->sigTem;?></td>
                    <td align="center"><?php echo $sig->sigPresion;?></td>
                    <td align="center"><?php echo $sig->sigFC;?></td>
                    <td align="center"><?php echo $sig->sigFR;?></td>
                    <td> <?php echo strtoupper($sig->uspNombre).' '.strtoupper($sig->uspApellidoP).' '.strtoupper($sig->uspApellidoM);?></td>
                </tr>
            <?php };?>
                <?php WHILE($count<15){?>
                    <tr>
                        <td class="fucsia" style="height: 50px"><b>Semana <?php echo $count;?></b></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                    </tr>
                    <?php $count += 1;?>
                <?php } ?>
            </table>
            <div align="right" style="margin-top:-500px">
            <img style="width: 900px;bottom:30px;opacity: 0.4" src="<?php echo base_url();?>../assets/img/cerros.png">
            </div>
        </blockquote>
    <div style=" font-size: 6px; margin-top: -15px;margin-left: 38px">
        <table>
            <tr>
                <td>Sigla</td>
                <td>Descripción</td>
                <td>Sigla</td>
                <td>Descripción</td>
                <td>Sigla</td>
                <td>Descripción</td>
                <td>Sigla</td>
                <td>Descripción</td>
                <td>Sigla</td>
                <td>Descripción</td>
            </tr>
            <tr>
                <td style="color:red" align="center">BP</td>
                <td align="center">Bajo Peso</td>
            
                <td style="color:green" align="center">N</td>
                <td align="center">Normal</td>
            
                <td style="color:orange" align="center">SP</td>
                <td align="center">Sobre Peso</td>
            
                <td style="color:orangered" align="center">O</td>
                <td align="center">Obesidad</td>
            
                <td style="color:red" align="center">OM</td>
                <td align="center">Obesidad Morbida</td>
            </tr>
        </table>
    </div>
</div>
    