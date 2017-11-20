<?php 
IF(!empty($enfermeria)){
    $habitos          = explode('_', $enfermeria->enfHabitos);
    IF(empty($habitos)){$habitos[0]='0';$habitos[1]='0';$habitos[2]='0';};
    $eliminacion      = explode('_', $enfermeria->enfEliminacion);
    $psiquiatrico     = explode('_', $enfermeria->enfPsiquiatrico);
    $vitales          = explode('_', $enfermeria->enfVitales);
}
ELSE {
    $eliminacion[0] = $eliminacion[1] ='';
    $psiquiatrico[0] = $psiquiatrico[1] ='';
    $habitos[0]='0';$habitos[1]='0';$habitos[2]='0';
}
?>


<div align="left">
    
<h4>SIGNOS VITALES Y PARÁMETROS NUTRICIONALES</h4>
    
</div>
<div>
    <div align="center">
        <table  style="border:1px solid grey !important; width:95% !important;">
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
                <td><input type="text" name="hora" value="<?php IF(!empty($vitales[0]))echo $vitales[0];?>" style="border:none;max-width: 50px"></td>
                <td><input type="text" name="pa" value="<?php IF(!empty($vitales[1]))echo $vitales[1];?>" style="border:none;max-width: 50px"></td>
                <td><input type="text" name="ft" value="<?php IF(!empty($vitales[2]))echo $vitales[2];?>" style="border:none;max-width: 50px"></td>
                <td><input type="text" name="temp" value="<?php IF(!empty($vitales[3]))echo $vitales[3];?>" style="border:none;max-width: 50px"></td>
                <td><input type="text" name="sat" value="<?php IF(!empty($vitales[4]))echo $vitales[4];?>" style="border:none;max-width: 50px"></td>
                <td><input type="text" name="talla" value="<?php IF(!empty($vitales[5]))echo $vitales[5];?>" style="border:none;max-width: 50px"></td>
                <td><input type="text" name="peso" value="<?php IF(!empty($vitales[6]))echo $vitales[6];?>" style="border:none;max-width: 50px"></td>
                <td><input type="text" name="imc" value="<?php IF(!empty($vitales[7]))echo $vitales[7];?>" style="border:none;max-width: 50px"></td>
            </tr>
        </table>
    </div>

</div>
<div align="left">
    <br>
<h4>EXAMEN FISICO GENERAL</h4>
<div align="center">
<textarea name="examenFisico" placeholder="Examen Fisico" style="width:95%;height: 100px"><?php IF(!empty($enfermeria->enfExamenFisico))echo $enfermeria->enfExamenFisico;?></textarea>
</div>
<br>
</div>

<div align="left">
    
<h4>ANTECEDENTES GENERALES DE SALUD</h4>
<div align="center">
    <table style="border:none;width:95%">
        
        <tr><td style="border:none"><b>Alergias</b>&nbsp;</td>  <td style="border:none"><input type='radio' name="alergiaR" <?php IF(!empty($datos->alergia) && $datos->alergia !== 'no' && $datos->alergia !== 'NO')echo 'checked';?>> Si <input type='radio' name="alergiaR" <?php IF($datos->alergia === 'no' || $datos->alergia === 'NO')echo 'checked';?>> No,   <input type="text"  style="border:none" name="alergia" value="<?php IF(!empty($datos->alergia))echo $datos->alergia;?>"></td></tr>
        
        
        <!--
        <tr><td style="border:none"><b>Tabaco</b>&nbsp;</td>    <td style="border:none"><input type='radio' name="tabacoR" value="1" <?php IF(!empty($habitos[0])&& $habitos[0]!=='0')echo 'checked';?>> Si <input type='radio' name="tabacoR" value="0" <?php IF(empty($habitos[0])&& $habitos[0]!=='0')echo 'checked';?>> No,             <input type="text"  style="border:none" name="tabaco" value="<?php IF(!empty($habitos[0])&& $habitos[0]!=='0')echo $habitos[0];?>"></td></tr>
        <tr><td style="border:none"><b>Alcohol</b>&nbsp;</td>   <td style="border:none"><input type='radio' name="alcoholR" value="1" <?php IF(!empty($habitos[1])&& $habitos[1]!=='0')echo 'checked';?>> Si <input type='radio' name="alcoholR" value="0" <?php IF(empty($habitos[1])&& $habitos[1]!=='0')echo 'checked';?>> No,           <input type="text"  style="border:none" name="alcohol" value="<?php IF(!empty($habitos[1])&& $habitos[1]!=='0')echo $habitos[1];?>"></td></tr>
        <tr><td style="border:none"><b>Drogas</b>&nbsp;</td>    <td style="border:none"><input type='radio' name="drogasR" value="1" <?php IF(!empty($habitos[2])&& $habitos[2]!=='0')echo 'checked';?>> Si <input type='radio' name="drogasR" value="0" <?php IF(empty($habitos[2])&& $habitos[2]!=='0')echo 'checked';?>> No,             <input type="text"  style="border:none" name="drogas" value="<?php IF(!empty($habitos[2])&& $habitos[2]!=='0')echo $habitos[2];?>"></td></tr>
        -->
        <tr><td style="border:none"><b>Tabaco</b>&nbsp;</td>    <td style="border:none"><input type='radio' name="tabacoR" value="1" <?php IF(!empty($enfermeria->enfTabaco)&&$enfermeria->enfTabaco==='1')echo 'checked';?>> Si    <input type='radio' name="tabacoR" value="0" <?php IF(empty($enfermeria->enfTabaco)&&$enfermeria->enfTabaco==='0')echo 'checked';?>> No,    <input type="text" style="border:none" value="<?php IF(!empty($habitos[0]))echo $habitos[0];?>"></td></tr>
        <tr><td style="border:none"><b>Alcohol</b>&nbsp;</td>   <td style="border:none"><input type='radio' name="alcoholR" value="1" <?php IF(!empty($enfermeria->enfAlcohol)&&$enfermeria->enfAlcohol==='1')echo 'checked';?>> Si <input type='radio' name="alcoholR" value="0" <?php IF(empty($enfermeria->enfAlcohol)&&$enfermeria->enfAlcohol==='0')echo 'checked';?>> No, <input type="text" style="border:none" value="<?php IF(!empty($habitos[1]))echo $habitos[1];?>"></td></tr>
        <tr><td style="border:none"><b>Drogas</b>&nbsp;</td>    <td style="border:none"><input type='radio' name="drogasR" value="1" <?php IF(!empty($enfermeria->enfDrogas)&&$enfermeria->enfDrogas==='1')echo 'checked';?>> Si    <input type='radio' name="drogasR" value="0" <?php IF(empty($enfermeria->enfDrogas)&&$enfermeria->enfDrogas==='0')echo 'checked';?>> No,    <input type="text" style="border:none" value="<?php IF(!empty($habitos[2]))echo $habitos[2];?>"></td></tr>
            
    </table>
</div>
</div>
<br>
<div align="left">
    <div align="center">
    <textarea name="morbidos" placeholder="Antecedentes Morbidos" style="width:95%;height: 40px"><?php IF(!empty($enfermeria->enfMorbidos))echo $enfermeria->enfMorbidos;?></textarea>
    
    </div>
    <br>

<div>
    
    <div><h4>ANTECEDENTES DE LA ALIMENTACIÓN</h4></div>
    <div align="center">
<table style="border:none; width:95%">
    <tr>
        <td style="border:none">TIPO DE RÉGIMEN: </td>
        <td style="border:none">
            <select name="regimen" required  style="border:none">
                <?php foreach($regimen as $reg) { ;?>
                <option value="<?php echo $reg->regId;?>" <?php IF ($datos->regimen === $reg->regNombre)echo 'selected';?>><?php echo strtoupper($reg->regNombre);?></option>
                <?php }; ?>
            </select>
        </td>
    </tr>
</table>
</div>
    <div><h4>ANTECEDENTES DEL PATRÓN DE ELIMINACIÓN</h4></div>
    <div align="center">
<table style="border:none; width:95%">
    
    <tr>
        <td style="border:none">
            INTESTINAL
        </td>
        <td style="border:none">
            <input type="radio" name="intestinal" value="0" <?php IF($eliminacion[0]==='0')echo 'checked';?> >&nbsp;&nbsp;NORMAL&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="intestinal" value="1" <?php IF($eliminacion[0]==='1')echo 'checked';?> >&nbsp;&nbsp;ESTREÑIMIENTO&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="intestinal" value="2" <?php IF($eliminacion[0]==='2')echo 'checked';?> >&nbsp;&nbsp;DIARREA
        </td>
    </tr>
    <tr>
        <td style="border:none">
            VESICAL
        </td>
        <td style="border:none">
            <input type="radio" name="vesical" value="0" <?php IF($eliminacion[1]==='0')echo 'checked';?> >&nbsp;&nbsp;NORMAL&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="vesical" value="1" <?php IF($eliminacion[1]==='1')echo 'checked';?> >&nbsp;&nbsp;INCONTINENCIA&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="vesical" value="2" <?php IF($eliminacion[1]==='2')echo 'checked';?> >&nbsp;&nbsp;NICTURIA&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="vesical" value="3" <?php IF($eliminacion[1]==='3')echo 'checked';?> >&nbsp;&nbsp;DISURIA&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="vesical" value="4" <?php IF($eliminacion[1]==='4')echo 'checked';?> >&nbsp;&nbsp;ANURIA
        </td>
    </tr>
</table>
    </div>
    <div style="transform: rotate(-90deg);top:-360px;left:420px;position: relative;width:700px;">
                        <span style=" font-size: 9px;opacity: 0.6">
                            PACIENTE: <label><?php echo strtoupper($datos->nombres).' '.strtoupper($datos->apellidoPaterno).' '.strtoupper($datos->apellidoMaterno);?></label> &nbsp;&nbsp;
                            RUT: <label><?php echo formatearRut($datos->rut);?></label> &nbsp;&nbsp;
                            FICHA: <label> <?php echo $datos->ficha; ?></label>
                        </span> 
                    </div>
        <div class="col-lg-10" align="right">1/3</div>              
    <div align="right" style="margin-top:-330px">
                    <img style="width: 560px;bottom:30px;right:30px;opacity: 0.4" src="<?php echo base_url();?>../assets/img/cerros.png">
                </div>
    
    
    
    
    <div style="page-break-before: always;"></div>
    
    
    <div><h4>ANTECEDENTES DEL PATRÓN DE ELIMINACIÓN</h4></div>
    <div align="center">
<table style="border:none;width:95%">
    
    <tr>
        <td style="border:none">
            HOSPITALIZACIONES PREVIAS&nbsp;
        </td>
        <td style="border:none">
            <input type='radio' name="previasR" <?php IF(!empty($psiquiatrico[0])||$psiquiatrico[0] === '0' )echo 'checked';?>> Si <input type='radio' name="previasR" <?php IF(empty($psiquiatrico[0]))echo 'checked';?>> No, <input type="text" style="border:none" placeholder="Cantidad" name="previas" value="<?php IF(!empty($psiquiatrico[0]))echo $psiquiatrico[0];?>">
        </td>
    </tr>
    <tr>
        <td style="border:none">
            DIAGNOSTICO PREVIO
        </td>
        <td style="border:none">    
            <input type="text" style="width: 100%;border:none" name="diagnostico" value="<?php IF(!empty($psiquiatrico[1]))echo $psiquiatrico[1];?>">
        </td>
    </tr>
    <tr>
        <td style="border:none">
            PSICOFARMACOS DE USO HABITUAL: 
        </td>
        <td style="border:none">
            <input type="text" style="width: 100%;border:none" name="farmacos" value="<?php IF(!empty($enfermeria->enfFarmacos))echo $enfermeria->enfFarmacos;?>">
        </td>
    </tr>
</table>
    </div>
</div>
</div>