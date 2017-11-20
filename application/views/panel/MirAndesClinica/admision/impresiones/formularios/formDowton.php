
<div style="page-break-after: always; page-break-before: always">
<div id="imprimir" style="display:true">
    <div class="col-lg-10" align="right" style=" margin-right: 40px">
                    <img src="<?php echo base_url();?>../assets/img/mirAndes.png" class="logo">
                </div>
    
                    <label class="titulo">Datos Personales</label><br>
                    <label>Rut Paciente: </label> <u><?php echo formatearRut($datos->rut);?></u>&nbsp;&nbsp;&nbsp;&nbsp;
                    <label>Nombre: </label> <u><?php echo strtoupper($datos->nombres).' '.strtoupper($datos->apellidoPaterno).' '.strtoupper($datos->apellidoMaterno); ?></u>
                    <br><label>Fecha de Nacimiento: </label> <u><?php IF(!empty($datos->fechaNacimiento)){$date = new DateTime($datos->fechaNacimiento);echo $date->format('d-m-Y');}  ?></u>&nbsp;&nbsp;&nbsp;&nbsp;
                    <label>Edad: </label> <u><?php IF(!empty($datos->fechaNacimiento))echo calculaedad($datos->fechaNacimiento); ?></u>
                    <br><label>Dirección: </label> <u><?php IF(!empty($datos->direccion))echo strtoupper($datos->direccion).', '. strtoupper($datos->comuna); ?></u>&nbsp;&nbsp;&nbsp;&nbsp;
                    <label>Ocupación: </label> <u><?php IF(!empty($datos->ocupacion))echo strtoupper($datos->ocupacion); ?></u>
                    
                    
                    <br><br><hr><br>
                    <h2 align="center"><u>Escala Dowton</u></h2>
                    <label class="titulo">Datos de Evaluación</label>
                    <br><br>
                    <label>Caidas Previas</label><br><br>
                    <blockquote>
                    <u><?php IF(!empty($cai->caiPrevias) && $cai->caiPrevias === '1')echo 'Si';ELSE IF(empty($cai->caiPrevias) || $cai->caiPrevias === '0')echo 'No';?></u>
                    </blockquote>
                    <br>
                    <label>Medicamentos</label><br><br>
                    <blockquote>
                        <u>
                        <?php IF(!empty($cai->caiMedNinguno) && $cai->caiMedNinguno === '1')echo 'Ninguno<br>';?>
                        <?php IF(!empty($cai->caiMedSedantes) && $cai->caiMedSedantes === '1')echo 'Tranquilizantes-Sedantes<br>';?>
                        <?php IF(!empty($cai->caiMedDiureticos) && $cai->caiMedDiureticos === '1')echo 'Diuréticos<br>';?>
                        <?php IF(!empty($cai->caiMedHipo) && $cai->caiMedHipo === '1')echo 'Hipotensores<br>';?>
                        <?php IF(!empty($cai->caiMedParkinson) && $cai->caiMedParkinson === '1')echo 'Antiparkinsonianos<br>';?>
                        <?php IF(!empty($cai->caiMedDepresivos) && $cai->caiMedDepresivos === '1')echo 'Antidepresivos<br>';?>
                        <?php IF(!empty($cai->caiMedOtro) && $cai->caiMedOtro === '1')echo 'Otros Medicamentos<br>';?>
                        </u>
                    </blockquote>
                    <br>
                    <label>Déficit Sensorial</label><br><br>
                    <blockquote>
                        <u>
                    <?php IF(!empty($cai->caiDefNinguno) && $cai->caiDefNinguno === '1')echo 'Ninguno<br>';?>
                    <?php IF(!empty($cai->caiDefVisual) && $cai->caiDefVisual === '1')echo 'Alteración Visual<br>';?>
                    <?php IF(!empty($cai->caiDefAuditiva) && $cai->caiDefAuditiva === '1')echo 'Alteración Auditiva<br>';?>
                    <?php IF(!empty($cai->caiDefExtremidades) && $cai->caiDefExtremidades === '1')echo 'Extremidades<br>';?>
                        </u>
                    </blockquote>
                    <br> 
                    <label>Estado Mental</label><br><br>
                    <blockquote>
                     <u><?php IF(!empty($cai->caiEstado) && $cai->caiEstado === '0')echo 'Orientado';ELSE IF(empty($cai->caiEstado) || $cai->caiEstado === '1')echo 'Confuso';?></u>
                    </blockquote><br> 
                     <label>Deambulación</label><br><br>
                    <blockquote> 
                        <u>
                            <?php IF(!empty($cai->caiDeaNormal) && $cai->caiDeaNormal === '1')echo 'Normal<br>';?>
                            <?php IF(!empty($cai->caiDeaSegura) && $cai->caiDeaSegura === '1')echo 'Segura Con Ayuda<br>';?>
                            <?php IF(!empty($cai->caiDeaInsegura) && $cai->caiDeaInsegura === '1')echo 'Insegura Con o Sin Ayuda<br>';?>
                            <?php IF(!empty($cai->caiDeaImposible) && $cai->caiDeaImposible === '1')echo 'Imposible<br>';?>
                        </u>
                    </blockquote>
                     <br><br>
                    
                        <?php 
                        $suma = 0;
                        IF(!empty($cai))$suma = $cai->caiPrevias+$cai->caiMedSedantes+$cai->caiMedDiureticos+$cai->caiMedHipo+$cai->caiMedParkinson+$cai->caiMedDepresivos+$cai->caiMedOtro+$cai->caiDefVisual+$cai->caiDefAuditiva+$cai->caiDefExtremidades+$cai->caiEstado+$cai->caiDeaSegura+$cai->caiDeaInsegura+$cai->caiDeaImposible;
                        ?>
                         <label>Resultado de Escala</label>
                         <u><b><?php IF($suma >= '3')echo 'ALTO';ELSE IF($suma >= '1')echo 'BAJO';?></b></u>
                        
                    <br><br><br>
                    <label>Responsable: <?php IF(!empty($cai->uspNombre))echo strtoupper($cai->uspNombre).' '.strtoupper($cai->uspApellidoP).' '.strtoupper($cai->uspApellidoM);?></label>
                        
               <?php IF(empty($cai)){ ?>
                    <img style="width:100%; margin-top: -600px; opacity: 0.3" src="<?php echo base_url();?>../assets/img/sinDoc.png" class="logo">
               <?php } ?>
</div>
</div>
