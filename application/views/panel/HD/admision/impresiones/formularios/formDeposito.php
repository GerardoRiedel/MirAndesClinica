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
                        ELSEIF(!empty($datosApo[0]->apoRut) && empty($datosApo[1]->apoRut)){
                            foreach ($datosApo[0] as $apo){
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
<style>
    .hr {border: 1px dashed #B404AE; height: 0; width: 100%;}
    .cuboD {padding-top: 20px;text-align: left; vertical-align: bottom; width:665px;height: 50px;border:1px solid black; border-radius: 10px}
    .hr2 {border: 0; border-top: 1px solid #999; border-bottom: 1px solid #333; height:0;}
    .fucsia {color: #B404AE;}
    .letra{font-size: 14px; font-family: arial; }
    .cuadro {font-size: 12px; font-family: arial; color: black; border:1px solid black; height: 25px}
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

<div style="page-break-after: always;">
    <?php IF(empty($depositos)){ ;?>
    <div align="center" >
        <img style=" width: 70%; margin-top: 250px" src="<?php echo base_url();?>../assets/img/sin-deposito.jpg" >
    </div>
    <?php } ELSE { ;?>
        
                <?php FOREACH($depositos as $deposito): ;?>
                <div style="page-break-before: always;">
                <input type="hidden" value="<?php echo $deposito->depSuma;?>" id="suma">

                <div class="col-lg-10" align="right"  style="margin-right: 40px">
                    <img src="<?php echo base_url();?>../assets/img/mirAndes.png" class="logo">
                </div>
                <blockquote>
                    <div class="col-lg-10" align="right">
                        <?php 
                            $dia = date('d');$mes = date('m');$ano = date('Y');
                            if($mes==='10')$mes='Octubre';elseif($mes==='11')$mes='Noviembre';elseif($mes==='12')$mes='Diciembre';elseif($mes==='01')$mes='Enero';elseif($mes==='02')$mes='Febrero';elseif($mes==='03')$mes='Marzo';elseif($mes==='04')$mes='Abril';elseif($mes==='05')$mes='Mayo';elseif($mes==='06')$mes='Junio';elseif($mes==='07')$mes='Julio';elseif($mes==='08')$mes='Agosto';elseif($mes==='09')$mes='Septiembre';
                            echo '<br>Providencia, '.$dia.' de '.$mes.' de '.$ano.'<br>';
                        ?>
                    </div>
            <div style="margin-top:-28px">
                <h2 class="fucsia" >RECIBO DE DINERO HOSPITAL DE DÍA</h2>
            </div>
            <div style="margin-top:-13px" class="hr">
            </div>
                    <br><br>
                    <div>
                        <table style="border:none">
                            <tbody>
                            <tr>
                                <td style="border:none"><b>Isapre:</b></td>
                                <td style=" width: 30px; border:none" align="center"><div><input type="text" <?php IF(!empty($datos->isapre)){IF($datos->isapre === '1')echo 'class="circuloCheck"';ELSE echo 'class="circulo"'; };?>></div></td>
                                <td style=" width: 140px; border:none">Banmédica</td>
                                <td style=" width: 30px; border:none" align="center"><div><input type="text" <?php IF(!empty($datos->isapre)){IF($datos->isapre === '3')echo 'class="circuloCheck"';ELSE echo 'class="circulo"'; };?>></div></td>
                                <td style=" width: 180px; border:none">Cruz Blanca</td>
                                <td style=" width: 30px; border:none" align="center"><div><input type="text" <?php IF(!empty($datos->isapre)){IF($datos->isapre === '17')echo 'class="circuloCheck"';ELSE echo 'class="circulo"'; };?>></div></td>
                                <td style=" width: 140px; border:none">Fundación</td>
                                <td style=" width: 30px; border:none" align="center"><div><input type="text" <?php IF(!empty($datos->isapre)){IF($datos->isapre === '5')echo 'class="circuloCheck"';ELSE echo 'class="circulo"'; };?>></div></td>
                                <td style=" width: 150px; border:none">Mas Vida</td>
                                <td style=" width: 30px; border:none" align="center"><div><input type="text" <?php IF(!empty($datos->isapre)){IF($datos->isapre === '2')echo 'class="circuloCheck"';ELSE echo 'class="circulo"'; };?>></div></td>
                                <td style=" width: 150px; border:none">Vida Tres</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    
                    <br>
                    <div class="col-lg-12 letra" align="justify" ><?php IF (!empty($apoNombre))$apoderado = strtoupper($apoNombre).' '.strtoupper($apoApePat).' '.strtoupper($apoApeMat);ELSE $apoderado = '........................................................................................'; ?>
                        Según lo indicado en el documento de Consentimiento Informado y Contrato Terapéutico del Hospital de Día MirAndes, 
                        con fecha <b><?php echo $dia.' de '.$mes.' de '.$ano;?></b>, hemos recibido la suma de $ <b><?php echo $deposito->depSuma;?> <span id="sumaTexto"></span></b>, de parte del Sr(a)
                        <b> <?php echo $apoderado; ?>. </b>Cédula Nacional de Identidad N° <b><?php IF(!empty($apoRut)) echo formatearRut($apoRut);ELSE echo '...........................................................';?></b>
                        <br><br>
                        Este dinero será destinado para cubrir gastos de copago de la Hospitalización de Día del Sr(a)
                        <br>
                        <b><?php echo strtoupper($datos->nombres).' '.strtoupper($datos->apellidoPaterno).' '.strtoupper($datos->apellidoMaterno);?></b> Rut <b><?php echo formatearRut($datos->rut);?></b>.
                        <br><br>
                        De no ser empleado, este dinero le será devuelto una vez que sea liquidado el programa médico de esta hospitalización por parte de su Isapre. De emplearse alguna parte de lo dejado en el centro, de igual forma el remanente le será devuelto cuando la Isapre genere los bonos correspondientes a esta hospitalización.
                        <br><br>
                        <b>La devolución del dinero o el remanente de éste se realizará aproximadamente DESPUÉS DE 90 DÍAS POSTERIORES AL ALTA, mediante transferencia electrónica.</b>
                        <br><br>
                        
                        <span class="fuscia letra">&nbsp;&nbsp;&nbsp;&nbsp;<b><u>I.</u>&nbsp;&nbsp;&nbsp;&nbsp;<u>Recepción del dinero</u></b></span>
                        <br><br>
                        <div>
                            <table style="border:none">
                            <tbody>
                                <tr>
                                    <td style="min-width:140px;border:none">
                                        Efectivo: 
                                    </td>
                                    <td style="border:none">
                                        <input <?php IF($deposito->depTipo==='1')echo 'class="circuloCheck"'; ELSE echo 'class="circulo"'?>> <?php IF($deposito->depTipo==='1')echo ' Por la suma de $ '.$deposito->depSuma; ELSE echo ' Por la suma de $ ..............';?>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="border:none">
                                        Cheque:
                                    </td>
                                    <td style="border:none">
                                        <input <?php IF($deposito->depTipo==='2')echo 'class="circuloCheck"'; ELSE echo 'class="circulo"'?>> <?php IF($deposito->depTipo==='2')echo ' Del banco '.strtoupper($deposito->banNombre).', serie '.$deposito->depSerie.', cuenta corriente N° '.$deposito->depCuenta.', Por la suma de $ '.$deposito->depSuma; ELSE echo ' Del banco .............., serie .............., cuenta corriente N° .............., Por la suma de $ ..............';?>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="border:none">
                                        Transferencia
                                    </td>
                                    <td style="border:none">
                                        <input <?php IF($deposito->depTipo==='3')echo 'class="circuloCheck"'; ELSE echo 'class="circulo"'?>> <?php IF($deposito->depTipo==='3')echo ' Por la suma de $ '.$deposito->depSuma; ELSE echo ' Por la suma de $ ..............';?>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="border:none">
                                        WebPay
                                    </td>
                                    <td style="border:none">
                                        <input <?php IF($deposito->depTipo==='4')echo 'class="circuloCheck"'; ELSE echo 'class="circulo"'?>> <?php IF($deposito->depTipo==='4')echo ' Por la suma de $ '.$deposito->depSuma; ELSE echo ' Por la suma de $ ..............';?>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="border:none">
                                        Tarjeta de Crédito
                                    </td>
                                    <td style="border:none">
                                        <input <?php IF($deposito->depTipo==='5')echo 'class="circuloCheck"'; ELSE echo 'class="circulo"'?>> <?php IF($deposito->depTipo==='5')echo ' Por la suma de $ '.$deposito->depSuma; ELSE echo ' Por la suma de $ ..............';?>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="border:none">
                                        Tarjeta de Débito
                                    </td>
                                    <td style="border:none">
                                        <input <?php IF($deposito->depTipo==='6')echo 'class="circuloCheck"'; ELSE echo 'class="circulo"'?>> <?php IF($deposito->depTipo==='6')echo ' Por la suma de $ '.$deposito->depSuma; ELSE echo ' Por la suma de $ ..............';?>
                                    </td>
                                </tr>
                            </tbody>
                            </table>
                        </div>
                        <br><br>
                        <span class="fuscia letra">&nbsp;&nbsp;&nbsp;&nbsp;<b><u>II.</u>&nbsp;&nbsp;&nbsp;&nbsp;<u>Datos para devolución</u></b></span>
                        <br><br>
                        <div>
                            <table style="border:none;width: 650px">
                                <tr>
                                    <td style="width: 100px; border:none">Nombre</td>
                                    <td class="cuadro" style="width: 300px;"> <?php IF(!empty($devolucion->ctaNombre))echo ' '.strtoupper($devolucion->ctaNombre).' '.strtoupper($devolucion->ctaApellido).' '.strtoupper($devolucion->ctaApellidoM); ?></td>
                                    <td style="border:none">&nbsp;&nbsp;Rut</td>
                                    <td class="cuadro" style="width: 150px;"> <?php IF(!empty($devolucion->ctaRut)&&$devolucion->ctaRut!==' ')echo ' '.formatearRut($devolucion->ctaRut);?></td>
                                </tr>
                                <tr>
                                    <td style="width: 100px; border:none">Banco</td>
                                    <td class="cuadro" style="width: 300px;"> <?php IF(!empty($devolucion->banNombre))echo ' '.strtoupper($devolucion->banNombre);?></td>
                                    <td style="border:none;width:100px">&nbsp;&nbsp;N° Cuenta</td>
                                    <td class="cuadro" style="width: 150px;"> <?php IF(!empty($devolucion->ctaNumero))echo ' '.$devolucion->ctaNumero; ?></td>
                                </tr>
                            </table>
                            <table style="border:none;width: 650px">
                                <tr>
                                    <td style="border:none">&nbsp;&nbsp;</td>
                                    <td style="border:none">
                                        <input <?php IF(!empty($devolucion->ctaTipo)){IF($devolucion->ctaTipo==='1')echo 'class="circuloCheck"'; ELSE echo 'class="circulo"';}ELSE echo 'class="circulo"';?>>
                                    </td>
                                    <td style="border:none">
                                        Cuenta Corriente
                                    </td>
                                    <td style="border:none">
                                        <input <?php IF(!empty($devolucion->ctaTipo)){IF($devolucion->ctaTipo==='2')echo 'class="circuloCheck"'; ELSE echo 'class="circulo"';}ELSE echo 'class="circulo"';?>>
                                    </td>
                                    <td style="border:none">
                                        Cuenta Ahorro
                                    </td>
                                    <td style="border:none">
                                        <input <?php IF(!empty($devolucion->ctaTipo)){IF($devolucion->ctaTipo==='3')echo 'class="circuloCheck"'; ELSE echo 'class="circulo"';}ELSE echo 'class="circulo"';?>>
                                    </td>
                                    <td style="border:none">
                                        Cuenta Vista
                                    </td>
                                </tr>
                            </table>
                            <table style="border:none;width: 650px">
                                <tr>
                                    <td style="width: 100px;border:none">Mail</td>
                                    <td class="cuadro" style="width: 300px"> <?php IF(!empty($devolucion->ctaEmail))echo ' '.strtoupper($devolucion->ctaEmail); ?></td>
                                    <td style="border:none">&nbsp;&nbsp;Teléfono</td>
                                    <td class="cuadro" style="width: 150px"> <?php IF(!empty($ecoCelular))echo ' '.$ecoCelular; ?></td>
                                </tr>
                            </table>

                            <br><br>
                            <div class="cuboD">
                                <table style="border:none;width: 650px">
                                    <tr>
                                        <td style="min-width: 50%;border:none">Firma Usuario/a - Familiar:</td>
                                        <td style="min-width: 50%;border:none">Colaborador MirAndes:</td>
                                    </tr>
                                </table>
                            </div>
                            
                        </div>  
                        

                    </div>
                </blockquote>
                </div>
            <?php ENDFOREACH; ?>
    <?php } ?>
</div>