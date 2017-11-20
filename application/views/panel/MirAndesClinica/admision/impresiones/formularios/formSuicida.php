
<div style="page-break-after: always; page-break-before: always">
<div id="imprimir" style="display:true" >
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
               
                <?php //die(var_dump($suicidio));
                    IF(!empty($suicidio))$sui = explode('_',$suicidio->suiDatos);
                    ELSE $sui[0]=$sui[1]=$sui[2]=$sui[3]=$sui[4]=$sui[5]=$sui[6]=$sui[7]=$sui[8]=$sui[9]=$sui[10]=$sui[11]=$sui[12]=$sui[13]=$sui[14]='';
                ?>
                    <br><hr><br>
                    <h2 align="center"><u>Escala de Riesgo de Suicidio</u></h2>
                    <label class="titulo">Datos de Evaluación</label>
                    <br><br>
                        <label>¿Toma habitualmente medicamentos o pastillas para dormir?</label>
                         <u><?php IF($sui[0] === '1')echo 'Si'; ELSE IF($sui[0] === '0')echo 'No'?></u>
                    <br>
                        <label>¿Tiene dificultades para conciliar el sueño?</label>
                        <u><?php IF($sui[1] === '1')echo 'Si';ELSEIF($sui[1] === '0')echo 'No'?></u>
                    <br>
                        <label>¿A veces nota que podría perder el control sobre sí mismo/a?</label>
                        <u><?php IF($sui[2] === '1')echo 'Si';ELSE IF($sui[2] === '0')echo 'No';?></u>
                    <br>
                        <label>¿Tiene poco interés en relacionarse con la gente?</label>
                        <u><?php IF($sui[3] === '1')echo 'Si';ELSEIF($sui[3] === '0')echo 'No';?></u>
                    <br>
                        <label>¿Ve su futuro con más pesimismo que optimismo?</label>
                        <u><?php IF($sui[4] === '1')echo 'Si';ELSEIF($sui[4] === '0')echo 'No';?></u>
                        <br>
                        <label>¿Se ha sentido alguna vez inútil o inservible?</label>
                        <u><?php IF($sui[5] === '1')echo 'Si';ELSEIF($sui[5] === '0')echo 'No';?></u>
                        <br>
                        <label>¿Ve su futuro sin ninguna esperanza?</label>
                        <u><?php IF($sui[6] === '1')echo 'Si';ELSE IF($sui[6] === '0')echo 'No';?></u>
                        <br>
                        <label>¿Se ha sentido alguna vez fracasado que sólo quería meterse en la cama y abandonarlo todo?</label>
                        <u><?php IF($sui[7] === '1')echo 'Si';ELSEIF($sui[7] === '0')echo 'No';?></u>
                        <br>
                        <label>¿Está deprimido/a ahora?</label>
                        <u><?php IF($sui[8] === '1')echo 'Si';ELSEIF($sui[8] === '0')echo 'No';?></u>
                        <br>
                        <label>¿Está usted separado/a, dicorciado/a o viudo/a?</label>
                        <u><?php IF($sui[9] === '1')echo 'Si';ELSEIF($sui[9] === '0')echo 'No';?></u>
                        <br>
                        <label>¿Sabe si alguien de su familia ha intentado suicidarse alguna vez?</label>
                        <u><?php IF($sui[10] === '1')echo 'Si';ELSEIF($sui[10] === '0')echo 'No';?></u>
                        <br>
                        <label>¿Alguna vez se ha sentido tan enojado/a que habría sido capaz de matar a alguien?</label>
                        <u><?php IF($sui[11] === '1')echo 'Si';ELSE IF($sui[11] === '0')echo 'No';?></u>
                        <br>
                        <label>¿Ha pensado alguna vez en suicidarse?</label>
                        <u><?php IF($sui[12] === '1')echo 'Si';ELSEIF($sui[12] === '0')echo 'No';?></u>
                        <br>
                        <label>¿Le ha comentado a alguien, en alguna ocasión que quería suicidarse?</label>
                        <u><?php IF($sui[13] === '1')echo 'Si';ELSEIF($sui[13] === '0')echo 'No';?></u>
                        <br>
                        <label>¿Ha intentado alguna vez quitarse la vida?</label>
                        <u><?php IF($sui[14] === '1')echo 'Si';ELSE IF($sui[14] === '0')echo 'No';?></u>
                        <br><br>
                        <?php 
                        $suma= 0; $suma = $sui[0]+$sui[1]+$sui[2]+$sui[3]+$sui[4]+$sui[5]+$sui[6]+$sui[7]+$sui[8]+$sui[9]+$sui[10]+$sui[11]+$sui[12]+$sui[13]+$sui[14]; ?>
                         <label>Resultado de Escala</label>
                         <u><b>
                                <?php IF($suma >= '6')echo 'ALTO';ELSE IF($suma >= '1')echo 'BAJO';?>
                        </b></u>
                        <br><br><br>
                        <label>Responsable: <?php IF(!empty($suicidio->uspNombre))echo strtoupper($suicidio->uspNombre).' '.strtoupper($suicidio->uspApellidoP).' '.strtoupper($suicidio->uspApellidoM);?></label>
          <?php IF(empty($suma)){ ?>
                    <img style="width:100%; margin-top: -520px; opacity: 0.3" src="<?php echo base_url();?>../assets/img/sinDoc.png" class="logo">
            <?php } ?>
</div>
</div>