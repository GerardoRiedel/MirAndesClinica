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
    .hr {border: 1px dashed white; height: 0; width: 100%;}
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

<div style="margin-top: 250px;margin-left: -160px;page-break-after: always; width: 1400px !important" class="rotar">
            <div class="col-lg-12" align="right" style="margin-right: 40px">
                <img style="opacity: 0.0"src="<?php echo base_url();?>../assets/img/mirAndes.png" class="logo">
            </div>
        <blockquote>
            
            <div>
                <h1 class="fucsia">&nbsp;</h1>
            </div>
            <div class="hr">
            </div>
            <br><br>
            <div style="font-size:20px">&nbsp;
            <div align="right" style="margin-top:-21px">&nbsp;</div>
            </div>
            <br><br>
            <table style="width:1400px;border:none">
                <thead>
                    <td style="border: none; width: 85px ;height: 40px" align="center">&nbsp;</td>
                    <td style="border: none; width: 95px " align="center">&nbsp;</td>
                    <td style="border: none; width: 100px" align="center">&nbsp;</td>
                    <td style="border: none; width: 100px" align="center">&nbsp;</td>
                    <td style="border: none; width: 110px" align="center">&nbsp;</td>
                    <td style="border: none; width: 130px" align="center">&nbsp;</td>
                    <td style="border: none; width: 100px" align="center">&nbsp;</td>
                    <td style="border: none; width: 100px" align="center">&nbsp;</td>
                    <td style="border: none; width: 100px" align="center">&nbsp;</td>
                    <td style="border: none; width: 100px" align="center">&nbsp;</td>
                    <td style="border: none; width: 100px" align="center">&nbsp;</td>
                </thead>
            <?php $count = 0;
            //die(var_dump($fila));
                $fila = $fila->sigFila;
                $fila += 0;
            
                FOREACH ($signos as $sig){;?>
                <tr>
                    <?php 
                        
                        IF($fila !== $count)$color='transparent';
                        ELSE $color = 'black';

                        $count += 1;
                    ?>
                    <td class="fucsia" style=" height: 50px; color:<?php echo $color;?>;border: none;"><b></b></td>
                    <td style="color:<?php echo $color;?>;border: none;"> <?php $date = new DateTime($sig->sigFechaIngreso);echo $date->format('d-m-Y');?></td>
                    <td style="color:<?php echo $color;?>;border: none;" align="center"><?php $hora = new DateTime($sig->sigHoraIngreso);echo $hora->format('H:i');?></td>
                    <td style="color:<?php echo $color;?>;border: none;" align="center"><?php echo $sig->sigPeso;?></td>
                    <td style="color:<?php echo $color;?>;border: none;" align="center"><?php echo $sig->sigCA;?></td>
                    <?php 
                        IF($sig->sigIMC<18.5){
                            $peso  = 'BP';
                        }ELSEIF($sig->sigIMC>=18.5 && $sig->sigIMC<25){
                            $peso  = 'N';
                        }ELSEIF($sig->sigIMC>=25 && $sig->sigIMC<30){
                            $peso  = 'SP';
                        }ELSEIF($sig->sigIMC>=30 && $sig->sigIMC<40){
                            $peso  = 'O';
                        }ELSEIF($sig->sigIMC>=40){
                            $peso  = 'OM';
                        }
                    ?>
                    <td style="color:<?php echo $color;?>;border: none;" align="center"><?php echo $sig->sigIMC.' '.$peso;?></td>
                    <td style="color:<?php echo $color;?>;border: none;" align="center"><?php echo $sig->sigTem;?></td>
                    <td style="color:<?php echo $color;?>;border: none;" align="center"><?php echo $sig->sigPresion;?></td>
                    <td style="color:<?php echo $color;?>;border: none;" align="center"><?php echo $sig->sigFC;?></td>
                    <td style="color:<?php echo $color;?>;border: none;" align="center"><?php echo $sig->sigFR;?></td>
                    <td style="color:<?php echo $color;?>;border: none;"> <?php echo strtoupper($sig->uspNombre).' '.strtoupper($sig->uspApellidoP).' '.strtoupper($sig->uspApellidoM);?></td>
                </tr>
            <?php };?>
                <?php WHILE($count<15){?>
                    <tr>
                        <td class="fucsia" style="height: 50px;border:none"><b></b></td><td style="border:none"></td><td style="border:none"></td><td style="border:none"></td><td style="border:none"></td><td style="border:none"></td><td style="border:none"></td><td style="border:none"></td><td style="border:none"></td><td style="border:none"></td><td style="border:none"></td>
                    </tr>
                    <?php $count += 1;?>
                <?php } ?>
            </table>
            <div align="right" style="margin-top:-500px">
            <img style="width: 900px;bottom:30px;opacity: 0.0" src="<?php echo base_url();?>../assets/img/cerros.png">
            </div>
        </blockquote>
</div>
    