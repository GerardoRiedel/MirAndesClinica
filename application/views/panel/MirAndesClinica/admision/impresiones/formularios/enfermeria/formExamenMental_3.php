<?php 
    IF(!empty($enfermeria))$cuidados = explode('_', $enfermeria->enfCuidados);
    ELSE $cuidados[0] = $cuidados[1] = $cuidados[2] = $cuidados[3] = $cuidados[4] = $cuidados[5] = $cuidados[6] =$cuidados[7] =$cuidados[8] = '';
?>

<div align="left">
    <div>
        &nbsp;&nbsp;<input type="checkbox" name="vigilancia" <?php IF ($cuidados[0]=== 'on')echo 'checked';?>> &nbsp;VIGILANCIA ESTRICTA
        <br>
        &nbsp;&nbsp;<input type="checkbox" name="alteraciones" <?php IF ($cuidados[1]=== 'on')echo 'checked';?>> &nbsp;OBSERVAR ALTERACIONES DE CONDUCTA
        <br>
        &nbsp;&nbsp;<input type="checkbox" name="ansiedad" <?php IF ($cuidados[2]=== 'on')echo 'checked';?>> &nbsp;VALORAR NIVEL DE ANSIEDAD
        <br>
        &nbsp;&nbsp;<input type="checkbox" name="conciencia" <?php IF ($cuidados[3]=== 'on')echo 'checked';?>> &nbsp;VALORAR NIVEL DE CONCIENCIA
        <br>
        &nbsp;&nbsp;<input type="checkbox" name="contencion" <?php IF ($cuidados[4]=== 'on')echo 'checked';?>> &nbsp;CONTENCIÓN VERBAL, AMBIENTAL
        <br>
        &nbsp;&nbsp;<input type="checkbox" name="farmacologica" <?php IF ($cuidados[5]=== 'on')echo 'checked';?>> &nbsp;CUIDADOS CONTENCIÓN FARMACOLÓGICA
        <br>
        &nbsp;&nbsp;<input type="checkbox" name="protocolo" <?php IF ($cuidados[6]=== 'on')echo 'checked';?>> &nbsp;CUIDADOS DE ENFERMERÍA SEGÚN PROTOCOLO DE CONTENCIÓN FÍSICA
        <br>
        &nbsp;&nbsp;<input type="checkbox" name="tec" <?php IF ($cuidados[7]=== 'on')echo 'checked';?>> &nbsp;CUIDADOS DE ENFERMERÍA POST TEC
        <br>
        &nbsp;&nbsp;<input type="checkbox" name="bano" <?php IF ($cuidados[8]=== 'on')echo 'checked';?>> &nbsp;BAÑO / HIGIENE / ALIMENTACIÓN
        <br><br>
        <div align="center">
        <textarea placeholder="OTROS:" name="comentario" style=" width: 95%;height: 225px;border:none"><?php IF(!empty($enfermeria->enfComentario))echo $enfermeria->enfComentario;?></textarea>
        </div>
    </div>
</div>