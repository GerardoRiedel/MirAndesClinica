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

                    <div class="col-lg-12" align="center">
                        <h2> DEPOSITO <?php IF(($datos->esGes === 'Si' || $datos->ges === '1')&& $deposito->depConcepto!=='10' && $deposito->depConcepto!=='8')echo 'POR INSUMOS PACIENTE GES'; 
                        ELSE IF ($deposito->depConcepto!=='10' && $deposito->depConcepto!=='8')echo 'DIA CAMA PACIENTE LIBRE ELECCIÓN';
                        ELSE IF ($deposito->depConcepto==='8')echo 'EXAMENES MÉDICOS';
                        ELSE echo 'HONORARIOS MÉDICOS PACIENTE LIBRE ELECCIÓN';?></h2>
                    </div>
                    <br>
                    <div class="col-lg-12" align="justify"><?php IF (!empty($apoNombre))$apoderado = strtoupper($apoNombre).' '.strtoupper($apoApePat).' '.strtoupper($apoApeMat);ELSE $apoderado = '........................................................................................'; ?>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;MirAndes Clínica</label>&nbsp; recibe de don/ña <label> <?php echo $apoderado; ?>. </label>Cédula Nacional de Identidad N° <label><?php IF(!empty($apoRut)) echo formatearRut($apoRut);ELSE echo '...........................................................';?></label>
                        el depósito para asegurar el pago de gastos <?php IF($datos->esGes === 'Si' || $datos->ges === '1')echo 'de hospitalización no garantizados dentro de la canasta GES (medicamentos, interconsultas, etc.) Por la hospitalización de corta estadía del paciente, Don/ña'; ELSE echo 'del día cama de la hospitalización de corta estadía del paciente, don/ña';?>
                        <label><?php echo strtoupper($datos->nombres).' '.strtoupper($datos->apellidoPaterno).' '.strtoupper($datos->apellidoMaterno);?></label> Rut <label><?php echo formatearRut($datos->rut);?></label>, ello mediante:<br><br>

                        <input <?php IF($deposito->depTipo==='1')echo 'class="cuadradoCheck"'; ELSE echo 'class="cuadrado"'?>> <?php IF($deposito->depTipo==='1')echo 'DINERO EFECTIVO, Por la suma de $ '.$deposito->depSuma; ELSE echo 'DINERO EFECTIVO, Por la suma de $ ..............';?>
                        <h5 <?php IF($deposito->depTipo==='1')echo 'id="sumaTexto"';?>></h5>

                        <input <?php IF($deposito->depTipo==='2')echo 'class="cuadradoCheck"'; ELSE echo 'class="cuadrado"'?>> <?php IF($deposito->depTipo==='2')echo 'CHEQUE del banco '.strtoupper($deposito->banNombre).', serie '.$deposito->depSerie.', cuenta corriente N° '.$deposito->depCuenta.', Por la suma de $ '.$deposito->depSuma; ELSE echo 'CHEQUE del banco .............., serie .............., cuenta corriente N° .............., Por la suma de $ ..............';?>
                        <h5 <?php IF($deposito->depTipo==='2')echo 'id="sumaTexto"';?>></h5>

                        <input <?php IF($deposito->depTipo==='3')echo 'class="cuadradoCheck"'; ELSE echo 'class="cuadrado"'?>> <?php IF($deposito->depTipo==='3')echo 'TRANSFERENCIA, Por la suma de $ '.$deposito->depSuma; ELSE echo 'TRANSFERENCIA, Por la suma de $ ..............';?>
                        <h5 <?php IF($deposito->depTipo==='3')echo 'id="sumaTexto"';?>></h5>
                        
                        <input <?php IF($deposito->depTipo==='4')echo 'class="cuadradoCheck"'; ELSE echo 'class="cuadrado"'?>> <?php IF($deposito->depTipo==='4')echo 'WEBPAY, Por la suma de $ '.$deposito->depSuma; ELSE echo 'WEBPAY, Por la suma de $ ..............';?>
                        <h5 <?php IF($deposito->depTipo==='4')echo 'id="sumaTexto"';?>></h5>

                        <input <?php IF($deposito->depTipo==='5')echo 'class="cuadradoCheck"'; ELSE echo 'class="cuadrado"'?>> <?php IF($deposito->depTipo==='5')echo 'TARJETA DE CRÉDITO, Por la suma de $ '.$deposito->depSuma; ELSE echo 'TARJETA DE CRÉDITO, Por la suma de $ ..............';?>
                        <h5 <?php IF($deposito->depTipo==='5')echo 'id="sumaTexto"';?>></h5>

                        <input <?php IF($deposito->depTipo==='6')echo 'class="cuadradoCheck"'; ELSE echo 'class="cuadrado"'?>> <?php IF($deposito->depTipo==='6')echo 'TARJETA DE DÉBITO, Por la suma de $ '.$deposito->depSuma; ELSE echo 'TARJETA DE DÉBITO, Por la suma de $ ..............';?>
                        <h5 <?php IF($deposito->depTipo==='6')echo 'id="sumaTexto"';?>></h5>

                        <?php 
                            $formatoRutDev = $devolucion->ctaRut;
                            IF(!empty($formatoRutDev))
                            $formatoRutDev = formatearRut($devolucion->ctaRut);
                            ELSE $formatoRutDev='';
                        ?>
                        <?php 
                        IF(($datos->esGes === 'Si' || $datos->ges === '1' )&& $deposito->depConcepto!=='10'){
                        ?>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Declaro estar en conocimiento que el depósito entregado garantiza los gastos de hospitalización no cubiertos por la canasta Ges. Durante la hospitalización, MirAndes Clínica podrá solicitar un nuevo depósito por insumos si los gastos sobrepasan al monto indicado en este documento.<br>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Posterior al alta, MirAndes Clínica procederá a calcular los gastos incurridos durante la hospitalización. Si los gastos fueren inferiores a la garantía entregada, se procederá a hacer devolución del excedente; asimismo, si la deuda fuere superior al total de los depósitos, el paciente o su responsable financiero deberán cancelar la diferencia. <label>La devolución se realizará aproximadamente después de 90 días posteriores al alta.</label><br><br><br>
                            <label><u>PARA DEVOLUCIÓN (SI APLICA):</u></label><br><br>
                            
                            Transferencia Bancaria<br><br>
                            <b>Banco: </b><?php echo strtoupper($devolucion->banNombre); ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <b>Tipo de cta: </b><?php echo strtoupper($devolucion->tipNombre); ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <b>Cta N°: </b><?php echo $devolucion->ctaNumero; ?>
                            <br>
                            <b>Nombre: </b> <?php echo strtoupper($devolucion->ctaNombre).' '.strtoupper($devolucion->ctaApellido).' '.strtoupper($devolucion->ctaApellidoM); ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <br>
                            <b>Rut: </b>    <?php echo $formatoRutDev;?>
                            <br>
                            <b>Correo: </b> <?php echo strtoupper($devolucion->ctaEmail);?>
                            <br>
                            <b>Teléfono: </b> <?php IF(!empty($ecoCelular))echo $ecoCelular; ?>
                            <br><br><br><br><br><br><br>
                            <label>NOMBRE</label>.............................................................................................. <label> FIRMA</label>................................................<br><br>
                            
                        <?php
                        }ELSE{
                        ?>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Declaro estar en conocimiento que el depósito entregado garantiza los gastos <?php IF($deposito->depConcepto==='10')echo 'de Honorarios Médicos.';ELSE echo 'del valor del día cama de la hospitalización para 3 días. Durante la hospitalización, MirAndes Clínica le solicitará un nuevo depósito en garantía cada 3 días hasta que el paciente sea dado de alta y se asegure el pago total de la hospitalización.';?> <br><br>

                            <b><u>DATOS DEL COTIZANTE:</u></b><br><br>
                            <?php IF(!empty($formatoRutDev) && !empty($devolucion->ctaNombre)): ;?>
                                <b>Nombre: </b><?php echo strtoupper($devolucion->ctaNombre).' '.strtoupper($devolucion->ctaApellido).' '.strtoupper($devolucion->ctaApellidoM);?>
                                <b>Rut titular: </b><?php echo $formatoRutDev; ?>
                            <?php ELSE: ;?>
                                <b>Nombre: </b>.........................................................................................
                                <b>Rut titular: </b>..............................................
                            <?php ENDIF;?>
                            <br><br>
                            <input <?php IF($datos->isapre==='6')echo 'class="cuadradoCheck"'; ELSE echo 'class="cuadrado"';?>> FONASA &nbsp;&nbsp;
                            <input <?php IF($datos->isapre!='6')echo 'class="cuadradoCheck"'; ELSE echo 'class="cuadrado"';?>> ISAPRE: <?php IF($datos->isapre!='6')echo strtoupper($datos->isapreNombre); ELSE echo '..................';?>
                            <br><br>
                        
                            <label><u>DATOS DE TRANSFERENCIA:</u></label><br><br>
                            <?php IF(!empty($devolucion->banNombre) && !empty($devolucion->ctaNumero)): ;?>
                                <label>Banco: </label><?php echo strtoupper($devolucion->banNombre);?>&nbsp;&nbsp;
                                <label>Tipo de cuenta: </label><?php echo strtoupper($devolucion->tipNombre);?>&nbsp;&nbsp;
                                <label>Cuenta N°: </label><?php echo $devolucion->ctaNumero;?>
                                <br>
                                <label>Nombre: </label><?php echo strtoupper($devolucion->ctaNombre).' '.strtoupper($devolucion->ctaApellido).' '.strtoupper($devolucion->ctaApellidoM);?>&nbsp;&nbsp;
                                <label>Rut: </label><?php echo formatearRut($devolucion->ctaRut);?>&nbsp;&nbsp;
                                <br>
                                <label>Correo electrónico: </label><?php echo strtoupper($devolucion->ctaEmail);?>&nbsp;&nbsp;
                                <br>
                                <b>Teléfono: </b> <?php IF(!empty($ecoCelular))echo $ecoCelular; ?>
                            <?php ELSE: ;?>
                                <label>Banco: </label>.............................................................&nbsp;&nbsp;
                                <label>Tipo de cuenta: </label>.............................................................&nbsp;&nbsp;
                                <label>Cuenta N°: </label>.............................................................
                                <br>
                                <label>Nombre: </label>.............................................................&nbsp;&nbsp;
                                <label>Rut: </label>.............................................................&nbsp;&nbsp;
                                <br>
                                <label>Correo electrónico: </label>.............................................................&nbsp;&nbsp;
                                <br>
                                <b>Teléfono: </b> <?php IF(!empty($ecoCelular))echo $ecoCelular; ?>
                            <?php ENDIF;?>
                            
                            <br><br><br>
                            <label>NOMBRE</label>.............................................................................................. <label> FIRMA</label>................................................<br><br>
                           
                        <?php
                        }
                        ?>

                    </div>
                    <div align="right" style="margin-top:-270px">
                    <img style="width: 560px;bottom:30px;right:30px;opacity: 0.4" src="<?php echo base_url();?>../assets/img/cerros.png">
                </div>
                </blockquote>
                </div>
            <?php ENDFOREACH; ?>
    <?php } ?>
</div>