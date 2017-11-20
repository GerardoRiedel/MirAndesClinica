

<?php 
IF(!empty($enfermeria)){
    $conciencia   = explode('_', $enfermeria->enfConciencia);
    $orientacion  = explode('_', $enfermeria->enfOrientacion);
    $memoria      = explode('_', $enfermeria->enfMemoria);
    $percepcion   = explode('_', $enfermeria->enfPercepcion);
    $juicio       = explode('_', $enfermeria->enfJuicio);
    $lenguaje     = explode('_', $enfermeria->enfLenguaje);
}
ELSE {
    $conciencia[0]  = $conciencia[1]    = $conciencia[2] = $conciencia[3] = $conciencia[4] = $conciencia[5] = $conciencia[6] = '';
    $orientacion[0] = $orientacion[1]   = '';
    $memoria[0]     = $memoria[1]       = '';
    $percepcion[0]     = $percepcion[1]       = $percepcion[2]= $percepcion[3]= $percepcion[4]= $percepcion[5]= $percepcion[6]='';
    $juicio[0]     = $juicio[1]       = '';
    $lenguaje[0]  = $lenguaje[1]    = $lenguaje[2] = $lenguaje[3] = $lenguaje[4] = $lenguaje[5] = $lenguaje[6] =$lenguaje[7] =$lenguaje[8] =$lenguaje[9] =$lenguaje[10] =$lenguaje[11] =$lenguaje[12] =$lenguaje[13] =$lenguaje[14] =$lenguaje[15] =$lenguaje[16] =$lenguaje[17] =$lenguaje[18] =$lenguaje[19] =$lenguaje[20] =$lenguaje[21] =$lenguaje[22] =$lenguaje[23] =$lenguaje[24] = '';
    
    
}
?>

<div style=" display: inline-block">
    <table style="border:2px solid grey;">
        <tr><td style="width:215px;border-bottom: 1px solid grey;"><b>1. Alteración en la Conciencia</b></td><td style="width: 50px;border-bottom: 1px solid grey;" align="center"><b>SI</b></td><td style="min-width: 50px;border-bottom: 1px solid grey;" align="center"><b>NO</b></td></tr>
        <tr><td>&nbsp;&nbsp;Somnolencia</td>        <td align="center"><input type="radio" name="somnoliencia" <?php IF($conciencia[0]==='1')echo 'checked';?> value="1"></td>          <td align="center"><input type="radio" name="somnoliencia" value="0" <?php IF($conciencia[0]==='0')echo 'checked';?>></td></tr>
        <tr><td>&nbsp;&nbsp;Confusión</td>          <td align="center"><input type="radio" name="confusion" <?php IF($conciencia[1]==='1')echo 'checked';?> value="1"></td>             <td align="center"><input type="radio" name="confusion" value="0" <?php IF($conciencia[1]==='0')echo 'checked';?>></td></tr>
        <tr><td>&nbsp;&nbsp;Hipervigilancia</td>    <td align="center"><input type="radio" name="hipervigilancia" <?php IF($conciencia[2]==='1')echo 'checked';?> value="1"></td>       <td align="center"><input type="radio" name="hipervigilancia" value="0" <?php IF($conciencia[2]==='0')echo 'checked';?>></td></tr>
        <tr><td>&nbsp;&nbsp;Delirium</td>           <td align="center"><input type="radio" name="delirium" <?php IF($conciencia[3]==='1')echo 'checked';?> value="1"></td>              <td align="center"><input type="radio" name="delirium" value="0" <?php IF($conciencia[3]==='0')echo 'checked';?>></td></tr>
        <tr><td>&nbsp;&nbsp;Estado crepuscular</td> <td align="center"><input type="radio" name="crepuscular" <?php IF($conciencia[4]==='1')echo 'checked';?> value="1"></td>           <td align="center"><input type="radio" name="crepuscular" value="0" <?php IF($conciencia[4]==='0')echo 'checked';?>></td></tr>
        <tr><td>&nbsp;&nbsp;Despersonalización</td> <td align="center"><input type="radio" name="despersonalizacion" <?php IF($conciencia[5]==='1')echo 'checked';?> value="1"></td>    <td align="center"><input type="radio" name="despersonalizacion" value="0" <?php IF($conciencia[5]==='0')echo 'checked';?>></td></tr>
        <tr><td>&nbsp;&nbsp;Desrealización</td>     <td align="center"><input type="radio" name="desrealizacion" <?php IF($conciencia[6]==='1')echo 'checked';?> value="1"></td>        <td align="center"><input type="radio" name="desrealizacion" value="0" <?php IF($conciencia[6]==='0')echo 'checked';?>></td></tr>
    </table>
    
</div>
<div style=" display: inline-block">
    <table style="border:none">
        <tr><td style="width:1px;border:none"></td></tr>
    </table>
</div>
<div style=" display: inline-block; margin-left: 50px;" align="left">
    <table style="border:2px solid grey;">
        <tr><td style="width:220px;border-bottom: 1px solid grey;"><b>2. Alteración en la Orientación</b></td><td style="width: 50px;border-bottom: 1px solid grey;" align="center"><b>SI</b></td><td style="min-width: 50px;border-bottom: 1px solid grey;" align="center"><b>NO</b></td></tr>
        <tr><td>&nbsp;&nbsp;Espacio</td>            <td align="center"><input type="radio" name="espacio" <?php IF($orientacion[0]==='1')echo 'checked';?> value="1"></td>              <td align="center"><input type="radio" name="espacio" value="0" <?php IF($orientacion[0]==='0')echo 'checked';?>></td></tr>
        <tr><td>&nbsp;&nbsp;Tiempo</td>             <td align="center"><input type="radio" name="tiempo" <?php IF($orientacion[1]==='1')echo 'checked';?> value="1"></td>               <td align="center"><input type="radio" name="tiempo" value="0" <?php IF($orientacion[1]==='0')echo 'checked';?>></td></tr>
    </table>
    <table style=" border:none">
        <tr><td colspan="3" style="border:none"><br><br></td></tr>
    </table>
    <table style="border:2px solid grey;">
        <tr><td style="width:200px;border-bottom: 1px solid grey;"><b>3. Atención/Memoria</b></td><td align="center" style="width: 50px;border-bottom: 1px solid grey;"><b>DISMI</b></td><td align="center" style="width: 50px;border-bottom: 1px solid grey;"><b>NORM</b></td><td align="center" style="width: 50px;border-bottom: 1px solid grey;"><b>AUME</b></td></tr>
        <tr><td>&nbsp;&nbsp;Atención</td>           <td align="center"><input type="radio" name="atencion" <?php IF($memoria[0]==='1')echo 'checked';?> value="1"></td>                 <td align="center"><input type="radio" name="atencion" value="0" <?php IF($memoria[0]==='0')echo 'checked';?>></td>             <td align="center"><input type="radio" name="atencion" value="2" <?php IF($memoria[0]==='2')echo 'checked';?>></td></tr>
        <tr><td>&nbsp;&nbsp;Memoria</td>            <td align="center"><input type="radio" name="memoria" <?php IF($memoria[1]==='1')echo 'checked';?> value="1"></td>                  <td align="center"><input type="radio" name="memoria" value="0" <?php IF($memoria[1]==='0')echo 'checked';?>></td>              <td align="center"><input type="radio" name="memoria" value="2" <?php IF($memoria[1]==='2')echo 'checked';?>></td></tr>
    </table>
</div>
<br><br>
<div align="center">
<div style=" display: inline-block">
    <table style="border:2px solid grey;">
        <tr><td style="width:300px;border-bottom: 1px solid grey;" colspan="4"><b>4. Alteraciones de la Percepción</b></td><td style="width: 50px;border-bottom: 1px solid grey;" align="center"><b>SI</b></td><td style="min-width: 50px;border-bottom: 1px solid grey;" align="center"><b>NO</b></td></tr>
        <tr><td colspan="4">&nbsp;&nbsp;Alucinaciones</td>  <td align="center"><input type="radio" name="alucinaciones" <?php IF($percepcion[0]==='1')echo 'checked';?> value="1"></td> <td align="center"><input type="radio" name="alucinaciones" value="0" <?php IF($percepcion[0]==='0')echo 'checked';?>></td></tr>
        <tr><td colspan="4">&nbsp;&nbsp;Iluciones</td>      <td align="center"><input type="radio" name="ilusiones" <?php IF($percepcion[1]==='1')echo 'checked';?> value="1"></td>     <td align="center"><input type="radio" name="ilusiones" value="0" <?php IF($percepcion[1]==='0')echo 'checked';?>></td></tr>
        <tr><td>&nbsp;&nbsp;<b>Tipo</b></td>                <td align="center"><input type="checkbox" name="tipo1" <?php IF($percepcion[2]==='on') echo 'checked';?> > Visual</td>      <td align="center"><input type="checkbox" name="tipo2" <?php IF($percepcion[3]==='on') echo 'checked';?> > Auditiva</td>          <td align="center"><input type="checkbox" name="tipo3" <?php IF($percepcion[4]==='on') echo 'checked';?> > Gustativa</td>     <td align="center" style="min-width:72px"><input type="checkbox" name="tipo4" <?php IF($percepcion[5]==='on') echo 'checked';?> > Olfativa</td>      <td align="center"><input type="checkbox" name="tipo5" <?php IF($percepcion[6]==='on') echo 'checked';?> > Táctil</td></tr>
    </table>
</div>
<div style=" display: inline-block">
    <table style="border:none">
        <tr><td style="width:31px;border:none"></td></tr>
    </table>
</div>
<div style=" display: inline-block; margin-left: 95px;">
    <table style="border:2px solid grey;">
        <tr><td style="width:150px;border-bottom: 1px solid grey;" align="center" colspan="2"><b>5. Alteración del Juicio</b></td></tr>
        <tr><td align="right"><input type="radio" name="juicio" <?php IF($juicio[0]==='1')echo 'checked';?> value="1"><b> Si&nbsp;&nbsp;</b></td>      <td align="left">&nbsp;&nbsp;<input type="radio" name="juicio" <?php IF($juicio[0]==='0')echo 'checked';?> value="0"><b> No</b></td></tr>
        <tr><td style="height: 50px" colspan="2" align="center">&nbsp;&nbsp;<input type="text" name="obs" value="<?php echo $juicio[1];?>" placeholder="OBS:" style=" border:none"> </td></tr>
    </table>
</div>
</div>
<br>
<div align="center">
    <div style=" display: inline-block">
        <table style="border:2px solid grey;">
            <tr><td style="border-bottom: 1px solid grey;" colspan="9" align="center"><b>6. Alteraciones del Pensamiento y Lenguaje</b></td></tr>
            <tr><td align="center" style="width: 150px"><b>Curso</b></td><td align="center" style="width: 50px"><b>SI</b></td><td align="center" style="width: 50px"><b>NO</b></td><td align="center" style="width: 150px"><b>Contenido</b></td><td align="center" style="width: 50px"><b>SI</b></td><td align="center" style="width: 50px"><b>NO</b></td><td align="center" style="width: 150px"><b>Lenguaje</b></td><td align="center" style="width: 50px"><b>SI</b></td><td align="center" style="width: 50px"><b>NO</b></td></tr>
            <tr>
                <td align="right">Normal&nbsp;</td>
                <td align="center"><input type="radio" name="cursonormal" <?php IF($lenguaje[0]==='1')echo 'checked';?> value="1"></td>     <td align="center"><input type="radio" name="cursonormal" value="0" <?php IF($lenguaje[0]==='0')echo 'checked';?>></td>
                <td align="right">Coherente&nbsp;</td>
                <td align="center"><input type="radio" name="coherente" <?php IF($lenguaje[1]==='1')echo 'checked';?> value="1"></td>       <td align="center"><input type="radio" name="coherente" value="0" <?php IF($lenguaje[1]==='0')echo 'checked';?>></td>
                <td align="right">Normal&nbsp;</td>
                <td align="center"><input type="radio" name="lenguanormal" <?php IF($lenguaje[2]==='1')echo 'checked';?> value="1"></td>    <td align="center"><input type="radio" name="lenguanormal" value="0" <?php IF($lenguaje[2]==='0')echo 'checked';?>></td>
            </tr>
            <tr>
                <td align="right">Aceleración&nbsp;</td>
                <td align="center"><input type="radio" name="acelerado" <?php IF($lenguaje[3]==='1')echo 'checked';?> value="1"></td>       <td align="center"><input type="radio" name="acelerado" value="0" <?php IF($lenguaje[3]==='0')echo 'checked';?>></td>
                <td align="right">Organizado&nbsp;</td>
                <td align="center"><input type="radio" name="organizado" <?php IF($lenguaje[4]==='1')echo 'checked';?> value="1"></td>      <td align="center"><input type="radio" name="organizado" value="0" <?php IF($lenguaje[4]==='0')echo 'checked';?>></td>
                <td align="right">Bradilalia&nbsp;</td>
                <td align="center"><input type="radio" name="bradilalia" <?php IF($lenguaje[5]==='1')echo 'checked';?> value="1"></td>      <td align="center"><input type="radio" name="bradilalia" value="0" <?php IF($lenguaje[5]==='0')echo 'checked';?>></td>
                
            </tr>
            <tr>
                <td align="right">Enlentecido&nbsp;</td>
                <td align="center"><input type="radio" name="enlentecido" <?php IF($lenguaje[6]==='1')echo 'checked';?> value="1"></td>     <td align="center"><input type="radio" name="enlentecido" value="0" <?php IF($lenguaje[6]==='0')echo 'checked';?>></td>
                <td align="right">Incoherente&nbsp;</td>
                <td align="center"><input type="radio" name="incoherente" <?php IF($lenguaje[7]==='1')echo 'checked';?> value="1"></td>     <td align="center"><input type="radio" name="incoherente" value="0" <?php IF($lenguaje[7]==='0')echo 'checked';?>></td>
                <td align="right">Mutismo&nbsp;</td>
                <td align="center"><input type="radio" name="mutismo" <?php IF($lenguaje[8]==='1')echo 'checked';?> value="1"></td>         <td align="center"><input type="radio" name="mutismo" value="0" <?php IF($lenguaje[8]==='0')echo 'checked';?>></td>
            </tr>
            <tr>
                <td align="right">Prolijo&nbsp;</td>
                <td align="center"><input type="radio" name="prolijo" <?php IF($lenguaje[9]==='1')echo 'checked';?> value="1"></td>         <td align="center"><input type="radio" name="prolijo" value="0" <?php IF($lenguaje[9]==='0')echo 'checked';?>></td>
                <td align="right">Delirante&nbsp;</td>
                <td align="center"><input type="radio" name="delirante" <?php IF($lenguaje[10]==='1')echo 'checked';?> value="1"></td>      <td align="center"><input type="radio" name="delirante" value="0" <?php IF($lenguaje[10]==='0')echo 'checked';?>></td>
                <td align="right">Taquilalia&nbsp;</td>
                <td align="center"><input type="radio" name="taquilalia" <?php IF($lenguaje[11]==='1')echo 'checked';?> value="1"></td>     <td align="center"><input type="radio" name="taquilalia" value="0" <?php IF($lenguaje[11]==='0')echo 'checked';?>></td>
            </tr>
            <tr>
                <td align="right">Estereotipado&nbsp;</td>
                <td align="center"><input type="radio" name="estereotipado" <?php IF($lenguaje[12]==='1')echo 'checked';?> value="1"></td>  <td align="center"><input type="radio" name="estereotipado" value="0" <?php IF($lenguaje[12]==='0')echo 'checked';?>></td>
                <td align="right">Obsesivo&nbsp;</td>
                <td align="center"><input type="radio" name="obsesivo" <?php IF($lenguaje[13]==='1')echo 'checked';?> value="1"></td>       <td align="center"><input type="radio" name="obsesivo" value="0" <?php IF($lenguaje[13]==='0')echo 'checked';?>></td>
                <td align="right">Ecolalia&nbsp;</td>
                <td align="center"><input type="radio" name="ecolalia" <?php IF($lenguaje[14]==='1')echo 'checked';?> value="1"></td>       <td align="center"><input type="radio" name="ecolalia" value="0" <?php IF($lenguaje[14]==='0')echo 'checked';?>></td>
            </tr>
            <tr>
                <td align="right">Perseverante&nbsp;</td>
                <td align="center"><input type="radio" name="perseverante" <?php IF($lenguaje[15]==='1')echo 'checked';?> value="1"></td>   <td align="center"><input type="radio" name="perseverante" value="0" <?php IF($lenguaje[15]==='0')echo 'checked';?>></td>
                <td align="right">Sobrevalorado&nbsp;</td>
                <td align="center"><input type="radio" name="sobrevalorado" <?php IF($lenguaje[16]==='1')echo 'checked';?> value="1"></td>  <td align="center"><input type="radio" name="sobrevalorado" value="0" <?php IF($lenguaje[16]==='0')echo 'checked';?>></td>
                <td align="right">Palilalia&nbsp;</td>
                <td align="center"><input type="radio" name="palilalia" <?php IF($lenguaje[17]==='1')echo 'checked';?> value="1"></td>      <td align="center"><input type="radio" name="palilalia" value="0" <?php IF($lenguaje[17]==='0')echo 'checked';?>></td>
            </tr>
            <tr>
                <td align="right">Disgregado&nbsp;</td>
                <td align="center"><input type="radio" name="disgregado" <?php IF($lenguaje[18]==='1')echo 'checked';?> value="1"></td>     <td align="center"><input type="radio" name="disgregado" value="0" <?php IF($lenguaje[18]==='0')echo 'checked';?>></td>
                <td align="right">Fóbico&nbsp;</td>
                <td align="center"><input type="radio" name="fobico" <?php IF($lenguaje[19]==='1')echo 'checked';?> value="1"></td>         <td align="center"><input type="radio" name="fobico" value="0" <?php IF($lenguaje[19]==='0')echo 'checked';?>></td>
                <td align="right">Disartria&nbsp;</td>
                <td align="center"><input type="radio" name="disartria" <?php IF($lenguaje[20]==='1')echo 'checked';?> value="1"></td>      <td align="center"><input type="radio" name="disartria" value="0" <?php IF($lenguaje[20]==='0')echo 'checked';?>></td>
            </tr>
            <tr>
                <td align="right">Verbigeración&nbsp;</td>
                <td align="center"><input type="radio" name="verbigeracion" <?php IF($lenguaje[21]==='1')echo 'checked';?> value="1"></td>  <td align="center"><input type="radio" name="verbigeracion" value="0" <?php IF($lenguaje[21]==='0')echo 'checked';?>></td>
                <td align="right">Impulsivo&nbsp;</td>
                <td align="center"><input type="radio" name="impulsivo" <?php IF($lenguaje[22]==='1')echo 'checked';?> value="1"></td>      <td align="center"><input type="radio" name="impulsivo" value="0" <?php IF($lenguaje[22]==='0')echo 'checked';?>></td>
                <td align="right">Coprolalia&nbsp;</td>
                <td align="center"><input type="radio" name="coprolalia" <?php IF($lenguaje[23]==='1')echo 'checked';?> value="1"></td>     <td align="center"><input type="radio" name="coprolalia" value="0" <?php IF($lenguaje[23]==='0')echo 'checked';?>></td>
            </tr>
            <tr>
                <td align="right">Observación&nbsp;</td>
                <td colspan="8"><input style="border:none;width:100%" type="text" name="lenguaobservacion" value="<?php echo $lenguaje[24];?>" placeholder="Observación"></td>
            </tr>
        </table>
    </div>
</div>

