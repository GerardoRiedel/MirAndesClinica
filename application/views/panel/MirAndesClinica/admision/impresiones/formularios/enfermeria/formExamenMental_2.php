<?php 
IF(!empty($enfermeria)){
    $afectividad  = explode('_', $enfermeria->enfAfectividad);
    $conducta     = explode('_', $enfermeria->enfConducta);
    $sueno        = explode('_', $enfermeria->enfSueno);
    $riesgos      = explode('_', $enfermeria->enfRiesgos);
}
ELSE {
    $afectividad[0]  = $afectividad[1]    = $afectividad[2] = $afectividad[3] = $afectividad[4] = $afectividad[5] = $afectividad[6] =$afectividad[7] =$afectividad[8] =$afectividad[9] =$afectividad[10] =$afectividad[11] = '';
    $conducta[0]  = $conducta[1]    = $conducta[2] = $conducta[3] = $conducta[4] = $conducta[5] = $conducta[6] =$conducta[7] =$conducta[8] =$conducta[9] =$conducta[10] =$conducta[11] = '';
$sueno[0]  = $sueno[1]    = $sueno[2] = $sueno[3] = $sueno[4] = $sueno[5] = $sueno[6] =$sueno[7] =$sueno[8] =$sueno[9] =$sueno[10] =$sueno[11] = '';
$riesgos[0]  = $riesgos[1]    = $riesgos[2] = $riesgos[3] = $riesgos[4] = $riesgos[5] = $riesgos[6] =$riesgos[7] =$riesgos[8] =$riesgos[9] = $riesgos[10] = '';
}
?>

<div style="<?php IF(!empty($imprimir))echo 'margin-top: -20px';ELSE echo 'margin-top: 20px';?>">
<div align="center" >
    <div style=" display: inline-block">
        <table style="border:2px solid grey">
            <tr><td colspan="4" align="center"><b>7. Alteración de la Afectividad</b></td></tr>
            <tr><td colspan="2" align="center" style="border-bottom: 1px solid grey;"><b>Cualitativo</b></td><td align="center" colspan="2" style="border-bottom: 1px solid grey;"><b>Cuantitativo</b></td></tr>
            <tr>
                <td>&nbsp;&nbsp;Desánimo</td>
                <td style="width: 30px" align="center"><input type="checkbox" name="desanimo" <?php IF($afectividad[0]==='on')echo 'checked';?>></td>
                <td>&nbsp;&nbsp;Normal</td>
                <td style="width: 30px" align="center"><input type="checkbox" name="cuantnormal" <?php IF($afectividad[1]==='on')echo 'checked';?>></td>
            </tr>
            <tr>
                <td>&nbsp;&nbsp;Labilidad</td>
                <td align="center"><input type="checkbox" name="labilidad" <?php IF($afectividad[2]==='on')echo 'checked';?>></td>
                <td>&nbsp;&nbsp;Hipertimia</td>
                <td align="center"><input type="checkbox" name="hipertimia" <?php IF($afectividad[3]==='on')echo 'checked';?>></td>
            </tr>
            <tr>
                <td>&nbsp;&nbsp;Aplanamiento</td>
                <td align="center"><input type="checkbox" name="aplanamiento" <?php IF($afectividad[4]==='on')echo 'checked';?>></td>
                <td rowspan="2">&nbsp;&nbsp;Hipotimia</td>
                <td rowspan="2" align="center"><input type="checkbox" name="hipotimia" <?php IF($afectividad[5]==='on')echo 'checked';?>></td>
            </tr>
            <tr>
                <td>&nbsp;&nbsp;Disforia</td>
                <td align="center"><input type="checkbox" name="disforia" <?php IF($afectividad[6]==='on')echo 'checked';?>></td>
            </tr>
            <tr>
                <td rowspan="3">&nbsp;&nbsp;Ansiedad/Angustia</td>
                <td colspan="2">&nbsp;&nbsp;Leve</td>
                <td align="center"><input type="radio" name="ansiedad" value="1" <?php IF($afectividad[7] === '1')echo 'checked';?>></td>
            </tr>
            <tr>
                <td colspan="2">&nbsp;&nbsp;Moderada</td>
                <td align="center"><input type="radio" name="ansiedad" value="2" <?php IF($afectividad[7] === '2')echo 'checked';?>></td>
            </tr>
            <tr>
                <td colspan="2">&nbsp;&nbsp;Severa</td>
                <td align="center"><input type="radio" name="ansiedad" value="3" <?php IF($afectividad[7] === '3')echo 'checked';?>></td>
            </tr>
            <tr>
                <td>&nbsp;&nbsp;Irritabilidad</td>
                <td align="center"><input type="checkbox" name="irritabilidad" <?php IF($afectividad[8]==='on')echo 'checked';?>></td>
                <td colspan="2" rowspan="3"></td>
            </tr>
            <tr>
                <td>&nbsp;&nbsp;Incontinencia Emocional</td>
                <td align="center"><input type="checkbox" name="incontinencia" <?php IF($afectividad[9]==='on')echo 'checked';?>></td>
            </tr>
            <tr>
                <td>&nbsp;&nbsp;Indiferencia/Embotamiento</td>
                <td align="center"><input type="checkbox" name="indiferencia" <?php IF($afectividad[10]==='on')echo 'checked';?>></td>
            </tr>
            <tr>
                <td>&nbsp;&nbsp;Otros</td>
                <td colspan="3"><input style="border:none" type="text" name="cuantOtro" value="<?php echo $afectividad[11];?>" placeholder="Otros"></td>
            </tr>
        </table>
    </div>
<div style=" display: inline-block">
    <table style="border:none">
        <tr><td style="width:84px;border:none"></td></tr>
    </table>
</div>
    <div style=" display: inline-block; margin-left: 50px;">
        <table style="border:none"><tr><td style="border:none;width: 280px"></td></tr></table>
        <table style="border:2px solid grey">
            <tr><td colspan="2" align="center" style="border:1px solid grey"><b>8. Motórica y Conducta</b></td></tr>
            <!--  style="width: 100px" -->
            <tr><td>&nbsp;&nbsp;Normal</td><td align='center'>                  <input type="checkbox" name="conductanormal" <?php IF($conducta[0]==='on')echo 'checked';?>></td></tr>
            <tr><td>&nbsp;&nbsp;Bradicinesia</td><td align='center'>            <input type="checkbox" name="bradicinesia" <?php IF($conducta[1]==='on')echo 'checked';?>></td></tr>
            <tr><td>&nbsp;&nbsp;Acinesia</td><td align='center'>                <input type="checkbox" name="acinesia" <?php IF($conducta[2]==='on')echo 'checked';?>></td></tr>
            <tr><td>&nbsp;&nbsp;Inhibición psicomotriz</td><td align='center'>  <input type="checkbox" name="inhibicion" <?php IF($conducta[3]==='on')echo 'checked';?>></td></tr>
            <tr><td>&nbsp;&nbsp;Inquietud</td><td align='center'>               <input type="checkbox" name="inquietud" <?php IF($conducta[4]==='on')echo 'checked';?>></td></tr>
            <tr><td>&nbsp;&nbsp;Agitación</td><td align='center'>               <input type="checkbox" name="agitacion" <?php IF($conducta[5]==='on')echo 'checked';?>></td></tr>
            <tr><td>&nbsp;&nbsp;Flexibilidad cérea</td><td align='center'>      <input type="checkbox" name="flexibilidad" <?php IF($conducta[6]==='on')echo 'checked';?>></td></tr>
            <tr><td>&nbsp;&nbsp;Tics</td><td align='center'>                    <input type="checkbox" name="tics" <?php IF($conducta[7]==='on')echo 'checked';?>></td></tr>
            <tr><td>&nbsp;&nbsp;Manierismos</td><td align='center'>             <input type="checkbox" name="manierismos" <?php IF($conducta[8]==='on')echo 'checked';?>></td></tr>
            <tr><td>&nbsp;&nbsp;Indiferencia</td><td align='center'>            <input type="checkbox" name="conductaindiferencia" <?php IF($conducta[9]==='on')echo 'checked';?>></td></tr>
            <tr><td>&nbsp;&nbsp;Negativismo</td><td align='center'>             <input type="checkbox" name="negativismo" <?php IF($conducta[10]==='on')echo 'checked';?>></td></tr>
            <tr><td>&nbsp;&nbsp;Colabora con la entrevista</td><td align='center'>  <input type="checkbox" name="colabora" <?php IF($conducta[11]==='on')echo 'checked';?>></td></tr>
        </table>
    </div>
</div>
    <br><br>
<div align="center">
    <div style=" display: inline-block">
        <table style="border:2px solid grey">
            <tr><td align="center"style="border-bottom:1px solid grey"><b>9. Trastornos del Sueño</b></td><td style="width: 50px;border-bottom:1px solid grey" align="center"><b>SI</b></td><td align="center"style="width: 50px;border-bottom: 1px solid grey"><b>NO</b></td></tr>
            <tr>
                <td>&nbsp;&nbsp;Insomnio</td>
                <td align="center"><input type="radio" name="insomnio" value="1" <?php IF($sueno[0] === '1')echo 'checked';?>></td>
                <td align="center"><input type="radio" name="insomnio" value="0" <?php IF($sueno[0] === '0')echo 'checked';?>></td>
            
            </tr>
            <tr>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- de conciliación</td>
                <td align="center"><input type="radio" name="conciliacion" value="1" <?php IF($sueno[1] === '1')echo 'checked';?>></td>
                <td align="center"><input type="radio" name="conciliacion" value="0" <?php IF($sueno[1] === '0')echo 'checked';?>></td>
            </tr>
            <tr>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- despertar precoz</td>
                <td align="center"><input type="radio" name="precoz" value="1" <?php IF($sueno[2] === '1')echo 'checked';?>></td>
                <td align="center"><input type="radio" name="precoz" value="0" <?php IF($sueno[2] === '0')echo 'checked';?>></td>
            </tr>
            <tr>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- global</td>
                <td align="center"><input type="radio" name="global" value="1" <?php IF($sueno[3] === '1')echo 'checked';?>></td>
                <td align="center"><input type="radio" name="global" value="0" <?php IF($sueno[3] === '0')echo 'checked';?>></td>
            </tr>
            <tr>
                <td>&nbsp;&nbsp;Interrupciones del sueño</td>
                <td align="center"><input type="radio" name="interrupciones" value="1" <?php IF($sueno[4] === '1')echo 'checked';?>></td>
                <td align="center"><input type="radio" name="interrupciones" value="0" <?php IF($sueno[4] === '0')echo 'checked';?>></td>
            </tr>
            <tr>
                <td>&nbsp;&nbsp;Hipersomnia</td>
                <td align="center"><input type="radio" name="hipersomnia" value="1" <?php IF($sueno[5] === '1')echo 'checked';?>></td>
                <td align="center"><input type="radio" name="hipersomnia" value="0" <?php IF($sueno[5] === '0')echo 'checked';?>></td>
            </tr>
            <tr>
                <td>&nbsp;&nbsp;Pesadillas</td>
                <td align="center"><input type="radio" name="pesadillas" value="1" <?php IF($sueno[6] === '1')echo 'checked';?>></td>
                <td align="center"><input type="radio" name="pesadillas" value="0" <?php IF($sueno[6] === '0')echo 'checked';?>></td>
            </tr>
            <tr>
                <td>&nbsp;&nbsp;Terrores nocturnos</td>
                <td align="center"><input type="radio" name="terrores" value="1" <?php IF($sueno[7] === '1')echo 'checked';?>></td>
                <td align="center"><input type="radio" name="terrores" value="0" <?php IF($sueno[7] === '0')echo 'checked';?>></td>
            </tr>
            <tr>
                <td>&nbsp;&nbsp;Sonambulismo</td>
                <td align="center"><input type="radio" name="sonambulismo" value="1" <?php IF($sueno[8] === '1')echo 'checked';?>></td>
                <td align="center"><input type="radio" name="sonambulismo" value="0" <?php IF($sueno[8] === '0')echo 'checked';?>></td>
            </tr>
            <tr>
                <td>&nbsp;&nbsp;Horas de sueño nocturno</td>
                <td colspan="2">&nbsp;<input style='max-width:75px;border:none' type="text" name="nocturno" value="<?php echo $sueno[9];?>" placeholder="Nocturno"></td>
            </tr>
            <tr>
                <td>&nbsp;&nbsp;Horas de sueño nocturno</td>
                <td colspan="2">&nbsp;<input style='max-width:75px;border:none' type="text" name="dia" value="<?php echo $sueno[10];?>" placeholder="Día"></td>
            </tr>
            <tr>
                <td colspan="3">&nbsp;&nbsp;<input style='max-width:220px;border:none' type="text" name="suenoOtros" value="<?php echo $sueno[11];?>" placeholder="Otros"></td>
            </tr>
        </table>
    </div>
    
<div style=" display: inline-block">
    <table style="border:none">
        <tr><td style="width:6px;border:none"></td></tr>
    </table>
</div>
    <div style=" display: inline-block; margin-left: 100px;">
        <table style="border:2px solid grey">
            <tr><td align="center" style=" border-bottom: 1px solid grey"><b>10. Evaluación de Riesgos</b></td><td align="center" style="width: 50px;border-bottom: 1px solid grey"><b>SI</b></td><td align="center" style="width: 50px;border-bottom: 1px solid grey"><b>NO</b></td></tr>
            <tr>
                <td>&nbsp;&nbsp;Ideación suicida</td>
                <td align="center"><input type="radio" name="ideacion" value="1" <?php IF($riesgos[0] === '1')echo 'checked';?>></td>
                <td align="center"><input type="radio" name="ideacion" value="0" <?php IF($riesgos[0] === '0')echo 'checked';?>></td></td>
            </tr>
            <tr>
                <td>&nbsp;&nbsp;Impulso suicida</td>
                <td align="center"><input type="radio" name="impulso" value="1" <?php IF($riesgos[1] === '1')echo 'checked';?>></td>
                <td align="center"><input type="radio" name="impulso" value="0" <?php IF($riesgos[1] === '0')echo 'checked';?>></td></td>
            </tr>
            <tr>
                <td>&nbsp;&nbsp;Fuga</td>
                <td align="center"><input type="radio" name="fuga" value="1" <?php IF($riesgos[2] === '1')echo 'checked';?>></td>
                <td align="center"><input type="radio" name="fuga" value="0" <?php IF($riesgos[2] === '0')echo 'checked';?>></td></td>
            </tr>
            <tr>
                <td>&nbsp;&nbsp;Autoagresión</td>
                <td align="center"><input type="radio" name="autoagresion" value="1" <?php IF($riesgos[3] === '1')echo 'checked';?>></td>
                <td align="center"><input type="radio" name="autoagresion" value="0" <?php IF($riesgos[3] === '0')echo 'checked';?>></td></td>
            </tr>
            <tr>
                <td>&nbsp;&nbsp;Heteroagresión</td>
                <td align="center"><input type="radio" name="heteroagresion" value="1" <?php IF($riesgos[4] === '1')echo 'checked';?>></td>
                <td align="center"><input type="radio" name="heteroagresion" value="0" <?php IF($riesgos[4] === '0')echo 'checked';?>></td></td>
            </tr>
            <tr>
                <td>&nbsp;&nbsp;Caídas</td>
                <td align="center"><input type="radio" name="caidas" value="1" <?php IF($riesgos[5] === '1')echo 'checked';?>></td>
                <td align="center"><input type="radio" name="caidas" value="0" <?php IF($riesgos[5] === '0')echo 'checked';?>></td></td>
            </tr>
            <tr>
                <td>&nbsp;&nbsp;Síndrome de abstinencia</td>
                <td align="center"><input type="radio" name="sindrome" value="1" <?php IF($riesgos[6] === '1')echo 'checked';?>></td>
                <td align="center"><input type="radio" name="sindrome" value="0" <?php IF($riesgos[6] === '0')echo 'checked';?>></td></td>
            </tr>
            <tr>
                <td>&nbsp;&nbsp;Nutricional (déficit/exceso)</td>
                <td align="center"><input type="radio" name="nutricional" value="1" <?php IF($riesgos[7] === '1')echo 'checked';?>></td>
                <td align="center"><input type="radio" name="nutricional" value="0" <?php IF($riesgos[7] === '0')echo 'checked';?>></td></td>
            </tr>
            <tr>
                <td colspan="3" style="height: 50px">&nbsp;&nbsp;<input type="text" name="riesgosotro" value="<?php echo $riesgos[10];?>" placeholder="Otros" style="border:none"></td>
            </tr>
            <tr>
                <td>&nbsp;&nbsp;Conciencia enfermedad</td>
                <td align="center"><input type="radio" name="conciencia" value="1" <?php IF($riesgos[8] === '1')echo 'checked';?>></td>
                <td align="center"><input type="radio" name="conciencia" value="0" <?php IF($riesgos[8] === '0')echo 'checked';?>></td></td>
            </tr>
            <tr>
                <td>&nbsp;&nbsp;Adherencia tratamiento</td>
                <td align="center"><input type="radio" name="adherencia" value="1" <?php IF($riesgos[9] === '1')echo 'checked';?>></td>
                <td align="center"><input type="radio" name="adherencia" value="0" <?php IF($riesgos[9] === '0')echo 'checked';?>></td></td>
            </tr>
        </table>
    </div>
</div>

</div>