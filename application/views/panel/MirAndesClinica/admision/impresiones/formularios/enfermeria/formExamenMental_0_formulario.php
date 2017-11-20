<?php $vitales = explode('_', $enfermeria->enfVitales);?>
<?php $habitos = explode('_', $enfermeria->enfHabitos);?>
<?php IF(empty($habitos)){$habitos[0]='0';$habitos[1]='0';$habitos[2]='0';};?>
<?php $ingreso = explode('_', $enfermeria->enfIngreso);?>
<?php $motivo  = $enfermeria->enfMotivo;?>
<?php $eliminacion      = explode('_', $enfermeria->enfEliminacion);?>
<?php $psiquiatrico     = explode('_', $enfermeria->enfPsiquiatrico);?>


<div class="col-lg-12"></div>

<div align="left" style="margin-left:30px">
    
    <div style=" display: inline-block">
        <div align="left">
        <table style="border:none">
            <tr>
                <td>
                    TIPO DE INGRESO:&nbsp;&nbsp;
                </td>
                <td>
                    <input type="radio" value="0" name="tipoIngreso" <?php IF($ingreso[0]==='0') echo 'checked';?>> Voluntario &nbsp;&nbsp;&nbsp;<input type="radio" value="1" name="tipoIngreso" <?php IF($ingreso[0]==='1') echo 'checked';?>> Involuntario. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    PROCEDENCIA: <input type="text" name="procedencia" value="<?php echo $ingreso[1];?>">
                </td>
            </tr>
        </table>
        </div>
        <br>
        <div align="left">
        MOTIVO DE INGRESO
        </div>
        <textarea placeholder="Breve" style=" width: 100%;height: 50px" name="motivo"><?php echo $motivo;?></textarea>
        <br><br>
        <table >
            <tr>
                <td>&nbsp;&nbsp;HORA</td>
                <td>&nbsp;&nbsp;P/A</td>
                <td>&nbsp;&nbsp;FC</td>
                <td>&nbsp;&nbsp;T°</td>
                <td>&nbsp;&nbsp;SAT 02%</td>
                <td>&nbsp;&nbsp;TALLA</td>
                <td>&nbsp;&nbsp;PESO</td>
                <td>&nbsp;&nbsp;IMC</td>
            </tr>
            <tr>
                <td><input type="text" name="hora" value="<?php IF(!empty($vitales[0]))echo $vitales[0];?>" style="max-width: 60px"></td>
                <td><input type="text" name="pa" value="<?php IF(!empty($vitales[1]))echo $vitales[1];?>"></td>
                <td><input type="text" name="fc" value="<?php IF(!empty($vitales[2]))echo $vitales[2];?>"></td>
                <td><input type="text" name="temp" value="<?php IF(!empty($vitales[3]))echo $vitales[3];?>" style="max-width: 50px"></td>
                <td><input type="text" name="sat" value="<?php IF(!empty($vitales[4]))echo $vitales[4];?>" ></td>
                <td><input type="text" name="talla" value="<?php IF(!empty($vitales[5]))echo $vitales[5];?>"></td>
                <td><input type="text" name="peso" value="<?php IF(!empty($vitales[6]))echo $vitales[6];?>" style="max-width: 50px"></td>
                <td><input type="text" name="imc" value="<?php IF(!empty($vitales[7]))echo $vitales[7];?>" style="max-width: 50px"></td>
            </tr>
        </table>
        <br>
        <div align="left">
        EXAMEN FISICO GENERAL
        </div>
        <textarea name="examenFisico" placeholder="Examen Fisico" style="width:100%;height: 50px"><?php echo $enfermeria->enfExamenFisico;?></textarea>
        <br><br>
        <div align="left"><?php  //echo $enfermeria->enfAlcohol;?>
            <table>
                <tr>
                        <td>&nbsp;&nbsp;&nbsp;&nbsp;<b>Alergias</b>&nbsp;</td>  
                        <td><input type='radio' name="alergiaR" <?php IF(!empty($datos->alergia))echo 'checked';?>> Si <input type='radio' name="alergiaR" <?php IF(empty($datos->alergia))echo 'checked';?>> No, <input type="text" placeholder="Cual" name="alergia" value="<?php IF(!empty($datos->alergia))echo $datos->alergia;?>"></td>
                        <td>
                                &nbsp;<label>Escala Riesgo:&nbsp; </label>
                                <?php IF(!empty($suicidio)){$sui = explode('_',$suicidio->suiDatos); $suicidio = $sui[0]+$sui[1]+$sui[2]+$sui[3]+$sui[4]+$sui[5]+$sui[6]+$sui[7]+$sui[8]+$sui[9]+$sui[10]+$sui[11]+$sui[12]+$sui[13]+$sui[14];}ELSE $suicidio = 0;?>
                                <input type="text" value="<?php IF($suicidio >= '6')echo 'ALTO'; ELSEIF($suicidio >= '1')echo 'BAJO';?>">
                                <a href="<?php echo base_url("clinica_enfermeria/ingresos/cargarEscalaSuicidio/".$evo->evoId.'_'.$datos->id )?>"><i class="fa fa-plus-circle" aria-hidden="true" style=" cursor: pointer;color: red"></i></a>
                        </td>
                </tr>
                <tr>
                        <td>&nbsp;&nbsp;&nbsp;&nbsp;<b>Tabaco</b>&nbsp;</td>    
                        <td><input type='radio' name="tabacoR" value="1" <?php IF(!empty($enfermeria->enfTabaco)&&$enfermeria->enfTabaco==='1')echo 'checked';?>> Si    <input type='radio' name="tabacoR" value="0" <?php IF(empty($enfermeria->enfTabaco)&&$enfermeria->enfTabaco==='0')echo 'checked';?>> No,    <input type="text" placeholder="Cantidad" name="tabaco" value="<?php IF(!empty($habitos[0]))echo $habitos[0];?>"></td>
                        <td>
                                &nbsp;<label>Escala Dowton: </label>
                                <?php IF(empty($caida))$caida = 0; ?>
                                <input type="text" value="<?php IF($caida >= '3')echo 'ALTO'; ELSEIF($caida >= '1')echo 'BAJO';?>">
                                <a href="<?php echo base_url("clinica_enfermeria/ingresos/cargarEscalaCaida/".$evo->evoId.'_'.$datos->id )?>"><i class="fa fa-plus-circle" aria-hidden="true" style=" cursor: pointer;color: red"></i></a>
                        </td>
                </tr>
                <tr>
                        <td>&nbsp;&nbsp;&nbsp;&nbsp;<b>Alcohol</b>&nbsp;</td>   
                        <td><input type='radio' name="alcoholR" value="1" <?php IF(!empty($enfermeria->enfAlcohol)&&$enfermeria->enfAlcohol==='1')echo 'checked';?>> Si <input type='radio' name="alcoholR" value="0" <?php IF(empty($enfermeria->enfAlcohol)&&$enfermeria->enfAlcohol==='0')echo 'checked';?>> No, <input type="text" placeholder="Cantidad" name="alcohol" value="<?php IF(!empty($habitos[1]))echo $habitos[1];?>"></td>
                        <td>
                                &nbsp;<label>Plan de Atención: </label>
                                <!--
                                <?php IF(empty($caida))$caida = 0; ?>
                                <input type="text" value="<?php IF($caida >= '3')echo 'ALTO'; ELSEIF($caida >= '1')echo 'BAJO';?>">
                                -->
                                <a href="<?php echo base_url("clinica_enfermeria/ingresos/cargarPlanDeAtencion/".$evo->evoId.'_'.$datos->id )?>"><i class="fa fa-plus-circle" aria-hidden="true" style=" cursor: pointer;color: red"></i></a>
                        </td>
                </tr>
                <tr>
                        <td>&nbsp;&nbsp;&nbsp;&nbsp;<b>Drogas</b>&nbsp;</td>   
                        <td><input type='radio' name="drogasR" value="1" <?php IF(!empty($enfermeria->enfDrogas)&&$enfermeria->enfDrogas==='1')echo 'checked';?>> Si    <input type='radio' name="drogasR" value="0" <?php IF(empty($enfermeria->enfDrogas)&&$enfermeria->enfDrogas==='0')echo 'checked';?>> No,    <input type="text" placeholder="Cual" name="drogas" value="<?php IF(!empty($habitos[2]))echo $habitos[2];?>"></td>
                </tr>
            </table>
        </div>
        <br>
        <div align="left">
        ANTECEDENTES MORBIDOS
        </div>
        <textarea name="morbidos" placeholder="Antecedentes Morbidos" style="width:100%;height: 50px"><?php echo $enfermeria->enfMorbidos;?></textarea>

        
        <br> <br>
<div align="left">  
    
    <div class="col-lg-12" style="margin-left: -16px">
        <label class="titulo">ANTECEDENTES DE LA ALIMENTACIÓN</label>
    </div>
    <br><br>
        TIPO DE RÉGIMEN: 
    <select name="regimen" required>
        <?php foreach($regimen as $reg) { ;?>
        <option value="<?php echo $reg->regId;?>" <?php IF ($datos->regimen === $reg->regNombre)echo 'selected';?>><?php echo strtoupper($reg->regNombre);?></option>
        <?php }; ?>
    </select>

<br><br>
<b>ANTECEDENTES DEL PATRÓN DE ELIMINACIÓN</b>
<br>
INTESTINAL&nbsp;<input type="radio" name="intestinal" value="0" <?php IF($eliminacion[0]==='0')echo 'checked';?> >&nbsp;&nbsp;NORMAL&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="intestinal" value="1" <?php IF($eliminacion[0]==='1')echo 'checked';?> >&nbsp;&nbsp;ESTREÑIMIENTO&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="intestinal" value="2" <?php IF($eliminacion[0]==='2')echo 'checked';?> >&nbsp;&nbsp;DIARREA
<br>
VESICAL &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="vesical" value="0" <?php IF($eliminacion[1]==='0')echo 'checked';?> >&nbsp;&nbsp;NORMAL&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="vesical" value="1" <?php IF($eliminacion[1]==='1')echo 'checked';?> >&nbsp;&nbsp;INCONTINENCIA&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="vesical" value="2" <?php IF($eliminacion[1]==='2')echo 'checked';?> >&nbsp;&nbsp;NICTURIA&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="vesical" value="3" <?php IF($eliminacion[1]==='3')echo 'checked';?> >&nbsp;&nbsp;DISURIA&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="vesical" value="4" <?php IF($eliminacion[1]==='4')echo 'checked';?> >&nbsp;&nbsp;ANURIA
<br><br>
<b>ANTECEDENTES PSIQUIATRICOS</b>
<br>
HOSPITALIZACIONES PREVIAS&nbsp;<input type='radio' name="previasR" <?php IF(!empty($psiquiatrico[0])||$psiquiatrico[0] === '0' )echo 'checked';?>> Si <input type='radio' name="previasR" <?php IF(empty($psiquiatrico[0]))echo 'checked';?>> No, <input type="text" placeholder="Cantidad" name="previas" value="<?php IF(!empty($psiquiatrico[0]))echo $psiquiatrico[0];?>">
<br>
DIAGNOSTICO PREVIO&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" placeholder="Diagnostico" name="diagnostico" value="<?php IF(!empty($psiquiatrico[1]))echo $psiquiatrico[1];?>">
<br>
PSICOFARMACOS DE USO HABITUAL: <input type="text" placeholder="Psicofarmacos de Uso Habitual" name="farmacos" value="<?php IF(!empty($enfermeria->enfFarmacos))echo $enfermeria->enfFarmacos;?>">

</div>
    </div>
</div>

