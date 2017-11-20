<hr>
<div class="col-lg-12" align="left" style=" margin-left: -15px">
    <label class="titulo">Control Signos Vitales</label>
</div>    
<br>
<table>
    <tr>
        <td colspan="7" class="cabeza" align="center">Signos Vitales</td>
        <td colspan="4" class="cabeza" align="center">Egresos</td>
        <td colspan="7" class="cabeza" align="center">Alimentación</td>
    </tr>
    <tr>
                            <th class="cabeza"style="border:none" align="center">Hora</th>
                            <th class="cabeza"style="border:none" align="center">T°</th>
                            <th class="cabeza"style="border:none" align="center">Pulso</th>
                            <th class="cabeza"style="border:none" align="center">Frec Resp</th>
                            <th class="cabeza"style="border:none" align="center">Pres Art</th>
                            <th class="cabeza"style="border:none" align="center">Fi 02</th>
                            <th class="cabeza"style="border:none" align="center">Sat 02</th>
                            <th class="cabeza"style="border:none" align="center">Diuresis</th>
                            <th class="cabeza"style="border:none" align="center">Deposic</th>
                            <th class="cabeza"style="border:none" align="center">Vomitos</th>
                             
                            <th class="cabeza"style="border:none" align="center">Tipo</th>
                            <th class="cabeza"style="border:none" align="center">Horario</th>
                            <th class="cabeza"style="border:none" align="center">Metodo</th>
                            <th class="cabeza"style="border:none" align="center">Cant Indic</th>
                            <th class="cabeza"style="border:none" align="center">Cant Rec</th>
                            <th class="cabeza"style="border:none" align="center">Med R</th>
                            <th class="cabeza"style="border:none" align="center">Hidratación</th>
    </tr>
                            <tr>
                                <?php $CSV0 = explode('_',$evo->evoCSV0); ?>
                                <td style="border:none"><input type="time" name="evoCSV00" value="<?php IF($CSV0[0]!=='00:00:00')echo $CSV0[0];?>"></td>
                                <td style="border:none"><input type="text" class="cuerpo" name="evoCSV01" value="<?php echo $CSV0[1];?>"></td>
                                <td style="border:none"><input type="text" class="cuerpo" name="evoCSV02" value="<?php echo $CSV0[2];?>"></td>
                                <td style="border:none"><input type="text" class="cuerpo" name="evoCSV03" value="<?php echo $CSV0[3];?>"></td>
                                <td style="border:none"><input type="text" class="cuerpo" name="evoCSV04" value="<?php echo $CSV0[4];?>"></td>
                                <td style="border:none"><input type="text" class="cuerpo" name="evoCSV05" value="<?php echo $CSV0[5];?>"></td>
                                <td style="border:none"><input type="text" class="cuerpo" name="evoCSV06" value="<?php echo $CSV0[6];?>"></td>
                                <td style="border:none"><input type="text" class="cuerpo" name="evoCSV07" value="<?php echo $CSV0[7];?>"></td>
                                <td style="border:none"><input type="text" class="cuerpo" name="evoCSV08" value="<?php echo $CSV0[8];?>"></td>
                                <td style="border:none"><input type="text" class="cuerpo" name="evoCSV09" value="<?php echo $CSV0[9];?>"></td>
                                
                                
                                 <?php $Ali0 = explode('_',$evo->evoAli0)?>
                                <td style="border:none"><input type="text" class="cuerpo" name="evoAli01" value="<?php echo $Ali0[0];?>"></td>
                                <td style="border:none"><input type="text" class="cuerpo" name="evoAli02" value="<?php echo $Ali0[1];?>"></td>
                                <td style="border:none"><input type="text" class="cuerpo" name="evoAli03" value="<?php echo $Ali0[2];?>"></td>
                                <td style="border:none"><input type="text" class="cuerpo" name="evoAli04" value="<?php echo $Ali0[3];?>"></td>
                                <td style="border:none"><input type="text" class="cuerpo" name="evoAli05" value="<?php echo $Ali0[4];?>"></td>
                                <td style="border:none"><input type="text" class="cuerpo" name="evoAli06" value="<?php echo $Ali0[5];?>"></td>
                                <td style="border:none"><input type="text" class="cuerpo" name="evoAli07" value="<?php echo $Ali0[6];?>"></td>
                            </tr>
                            <tr>
                                <?php $CSV1 = explode('_',$evo->evoCSV1); ?>
                                <td style="border:none"><input type="time" name="evoCSV10" value="<?php IF($CSV1[0]!=='00:00:00')echo $CSV1[0];?>"></td>
                                <td style="border:none"><input type="text" class="cuerpo" name="evoCSV11" value="<?php echo $CSV1[1];?>"></td>
                                <td style="border:none"><input type="text" class="cuerpo" name="evoCSV12" value="<?php echo $CSV1[2];?>"></td>
                                <td style="border:none"><input type="text" class="cuerpo" name="evoCSV13" value="<?php echo $CSV1[3];?>"></td>
                                <td style="border:none"><input type="text" class="cuerpo" name="evoCSV14" value="<?php echo $CSV1[4];?>"></td>
                                <td style="border:none"><input type="text" class="cuerpo" name="evoCSV15" value="<?php echo $CSV1[5];?>"></td>
                                <td style="border:none"><input type="text" class="cuerpo" name="evoCSV16" value="<?php echo $CSV1[6];?>"></td>
                                <td style="border:none"><input type="text" class="cuerpo" name="evoCSV17" value="<?php echo $CSV1[7];?>"></td>
                                <td style="border:none"><input type="text" class="cuerpo" name="evoCSV18" value="<?php echo $CSV1[8];?>"></td>
                                <td style="border:none"><input type="text" class="cuerpo" name="evoCSV19" value="<?php echo $CSV1[9];?>"></td>
                                 <?php $Ali0 = explode('_',$evo->evoAli1)?>
                                <td style="border:none"><input type="text" class="cuerpo" name="evoAli11" value="<?php echo $Ali0[0];?>"></td>
                                <td style="border:none"><input type="text" class="cuerpo" name="evoAli12" value="<?php echo $Ali0[1];?>"></td>
                                <td style="border:none"><input type="text" class="cuerpo" name="evoAli13" value="<?php echo $Ali0[2];?>"></td>
                                <td style="border:none"><input type="text" class="cuerpo" name="evoAli14" value="<?php echo $Ali0[3];?>"></td>
                                <td style="border:none"><input type="text" class="cuerpo" name="evoAli15" value="<?php echo $Ali0[4];?>"></td>
                                <td style="border:none"><input type="text" class="cuerpo" name="evoAli16" value="<?php echo $Ali0[5];?>"></td>
                                <td style="border:none"><input type="text" class="cuerpo" name="evoAli17" value="<?php echo $Ali0[6];?>"></td>
                            </tr>
                            <tr>
                                <?php $CSV2 = explode('_',$evo->evoCSV2); ?>
                                <td style="border:none"><input type="time" name="evoCSV20" value="<?php IF($CSV2[0]!=='00:00:00')echo $CSV2[0];?>"></td>
                                <td style="border:none"><input type="text" class="cuerpo" name="evoCSV21" value="<?php echo $CSV2[1];?>"></td>
                                <td style="border:none"><input type="text" class="cuerpo" name="evoCSV22" value="<?php echo $CSV2[2];?>"></td>
                                <td style="border:none"><input type="text" class="cuerpo" name="evoCSV23" value="<?php echo $CSV2[3];?>"></td>
                                <td style="border:none"><input type="text" class="cuerpo" name="evoCSV24" value="<?php echo $CSV2[4];?>"></td>
                                <td style="border:none"><input type="text" class="cuerpo" name="evoCSV25" value="<?php echo $CSV2[5];?>"></td>
                                <td style="border:none"><input type="text" class="cuerpo" name="evoCSV26" value="<?php echo $CSV2[6];?>"></td>
                                <td style="border:none"><input type="text" class="cuerpo" name="evoCSV27" value="<?php echo $CSV2[7];?>"></td>
                                <td style="border:none"><input type="text" class="cuerpo" name="evoCSV28" value="<?php echo $CSV2[8];?>"></td>
                                <td style="border:none"><input type="text" class="cuerpo" name="evoCSV29" value="<?php echo $CSV2[9];?>"></td>
                                 <?php $Ali0 = explode('_',$evo->evoAli2)?>
                                <td style="border:none"><input type="text" class="cuerpo" name="evoAli21" value="<?php echo $Ali0[0];?>"></td>
                                <td style="border:none"><input type="text" class="cuerpo" name="evoAli22" value="<?php echo $Ali0[1];?>"></td>
                                <td style="border:none"><input type="text" class="cuerpo" name="evoAli23" value="<?php echo $Ali0[2];?>"></td>
                                <td style="border:none"><input type="text" class="cuerpo" name="evoAli24" value="<?php echo $Ali0[3];?>"></td>
                                <td style="border:none"><input type="text" class="cuerpo" name="evoAli25" value="<?php echo $Ali0[4];?>"></td>
                                <td style="border:none"><input type="text" class="cuerpo" name="evoAli26" value="<?php echo $Ali0[5];?>"></td>
                                <td style="border:none"><input type="text" class="cuerpo" name="evoAli27" value="<?php echo $Ali0[6];?>"></td>
                            </tr>
                            
                            <tr>
                                <td style="border:none">
                                    <i id="more" class="fa fa-plus-circle" aria-hidden="true" style=" cursor: pointer;color: red;"></i>
                                </td>
                                <td colspan="5"  style="border:none"></td>
                            </tr>
                            <tr class="csv4">
                                <?php $CSV3 = explode('_',$evo->evoCSV3); ?>
                                <td style="border:none"><input type="time" name="evoCSV30" value="<?php IF($CSV3[0]!=='00:00:00')echo $CSV3[0];?>"></td>
                                <td style="border:none"><input type="text" class="cuerpo" name="evoCSV31" value="<?php echo $CSV3[1];?>"></td>
                                <td style="border:none"><input type="text" class="cuerpo" name="evoCSV32" value="<?php echo $CSV3[2];?>"></td>
                                <td style="border:none"><input type="text" class="cuerpo" name="evoCSV33" value="<?php echo $CSV3[3];?>"></td>
                                <td style="border:none"><input type="text" class="cuerpo" name="evoCSV34" value="<?php echo $CSV3[4];?>"></td>
                                <td style="border:none"><input type="text" class="cuerpo" name="evoCSV35" value="<?php echo $CSV3[5];?>"></td>
                                <td style="border:none"><input type="text" class="cuerpo" name="evoCSV36" value="<?php echo $CSV3[6];?>"></td>
                                <td style="border:none"><input type="text" class="cuerpo" name="evoCSV37" value="<?php echo $CSV3[7];?>"></td>
                                <td style="border:none"><input type="text" class="cuerpo" name="evoCSV38" value="<?php echo $CSV3[8];?>"></td>
                                <td style="border:none"><input type="text" class="cuerpo" name="evoCSV39" value="<?php echo $CSV3[9];?>"></td>
                                 <?php $Ali0 = explode('_',$evo->evoAli3)?>
                                <td style="border:none"><input type="text" class="cuerpo" name="evoAli31" value="<?php echo $Ali0[0];?>"></td>
                                <td style="border:none"><input type="text" class="cuerpo" name="evoAli32" value="<?php echo $Ali0[1];?>"></td>
                                <td style="border:none"><input type="text" class="cuerpo" name="evoAli33" value="<?php echo $Ali0[2];?>"></td>
                                <td style="border:none"><input type="text" class="cuerpo" name="evoAli34" value="<?php echo $Ali0[3];?>"></td>
                                <td style="border:none"><input type="text" class="cuerpo" name="evoAli35" value="<?php echo $Ali0[4];?>"></td>
                                <td style="border:none"><input type="text" class="cuerpo" name="evoAli36" value="<?php echo $Ali0[5];?>"></td>
                                <td style="border:none"><input type="text" class="cuerpo" name="evoAli37" value="<?php echo $Ali0[6];?>"></td>
                            </tr>
                            <tr class="csv4">
                                <?php $CSV4 = explode('_',$evo->evoCSV4); ?>
                                <td style="border:none"><input type="time" name="evoCSV40" value="<?php IF($CSV4[0]!=='00:00:00')echo $CSV4[0];?>"></td>
                                <td style="border:none"><input type="text" class="cuerpo" name="evoCSV41" value="<?php echo $CSV4[1];?>"></td>
                                <td style="border:none"><input type="text" class="cuerpo" name="evoCSV42" value="<?php echo $CSV4[2];?>"></td>
                                <td style="border:none"><input type="text" class="cuerpo" name="evoCSV43" value="<?php echo $CSV4[3];?>"></td>
                                <td style="border:none"><input type="text" class="cuerpo" name="evoCSV44" value="<?php echo $CSV4[4];?>"></td>
                                <td style="border:none"><input type="text" class="cuerpo" name="evoCSV45" value="<?php echo $CSV4[5];?>"></td>
                                <td style="border:none"><input type="text" class="cuerpo" name="evoCSV46" value="<?php echo $CSV4[6];?>"></td>
                                <td style="border:none"><input type="text" class="cuerpo" name="evoCSV47" value="<?php echo $CSV4[7];?>"></td>
                                <td style="border:none"><input type="text" class="cuerpo" name="evoCSV48" value="<?php echo $CSV4[8];?>"></td>
                                <td style="border:none"><input type="text" class="cuerpo" name="evoCSV49" value="<?php echo $CSV4[9];?>"></td>
                                <?php $Ali0 = explode('_',$evo->evoAli4)?>
                                <td style="border:none"><input type="text" class="cuerpo" name="evoAli41" value="<?php echo $Ali0[0];?>"></td>
                                <td style="border:none"><input type="text" class="cuerpo" name="evoAli42" value="<?php echo $Ali0[1];?>"></td>
                                <td style="border:none"><input type="text" class="cuerpo" name="evoAli43" value="<?php echo $Ali0[2];?>"></td>
                                <td style="border:none"><input type="text" class="cuerpo" name="evoAli44" value="<?php echo $Ali0[3];?>"></td>
                                <td style="border:none"><input type="text" class="cuerpo" name="evoAli45" value="<?php echo $Ali0[4];?>"></td>
                                <td style="border:none"><input type="text" class="cuerpo" name="evoAli46" value="<?php echo $Ali0[5];?>"></td>
                                <td style="border:none"><input type="text" class="cuerpo" name="evoAli47" value="<?php echo $Ali0[6];?>"></td>
                            </tr>
                            <tr class="csv4">
                                <?php $CSV5 = explode('_',$evo->evoCSV5); ?>
                                <td style="border:none"><input type="time" name="evoCSV50" value="<?php IF($CSV5[0]!=='00:00:00')echo $CSV5[0];?>"></td>
                                <td style="border:none"><input type="text" class="cuerpo" name="evoCSV51" value="<?php echo $CSV5[1];?>"></td>
                                <td style="border:none"><input type="text" class="cuerpo" name="evoCSV52" value="<?php echo $CSV5[2];?>"></td>
                                <td style="border:none"><input type="text" class="cuerpo" name="evoCSV53" value="<?php echo $CSV5[3];?>"></td>
                                <td style="border:none"><input type="text" class="cuerpo" name="evoCSV54" value="<?php echo $CSV5[4];?>"></td>
                                <td style="border:none"><input type="text" class="cuerpo" name="evoCSV55" value="<?php echo $CSV5[5];?>"></td>
                                <td style="border:none"><input type="text" class="cuerpo" name="evoCSV56" value="<?php echo $CSV5[6];?>"></td>
                                <td style="border:none"><input type="text" class="cuerpo" name="evoCSV57" value="<?php echo $CSV5[7];?>"></td>
                                <td style="border:none"><input type="text" class="cuerpo" name="evoCSV58" value="<?php echo $CSV5[8];?>"></td>
                                <td style="border:none"><input type="text" class="cuerpo" name="evoCSV59" value="<?php echo $CSV5[9];?>"></td>
                                <?php $Ali0 = explode('_',$evo->evoAli5)?>
                                <td style="border:none"><input type="text" class="cuerpo" name="evoAli51" value="<?php echo $Ali0[0];?>"></td>
                                <td style="border:none"><input type="text" class="cuerpo" name="evoAli52" value="<?php echo $Ali0[1];?>"></td>
                                <td style="border:none"><input type="text" class="cuerpo" name="evoAli53" value="<?php echo $Ali0[2];?>"></td>
                                <td style="border:none"><input type="text" class="cuerpo" name="evoAli54" value="<?php echo $Ali0[3];?>"></td>
                                <td style="border:none"><input type="text" class="cuerpo" name="evoAli55" value="<?php echo $Ali0[4];?>"></td>
                                <td style="border:none"><input type="text" class="cuerpo" name="evoAli56" value="<?php echo $Ali0[5];?>"></td>
                                <td style="border:none"><input type="text" class="cuerpo" name="evoAli57" value="<?php echo $Ali0[6];?>"></td>
                                
                            </tr>
                            <tr class="csv4">
                                <?php $CSV6 = explode('_',$evo->evoCSV6); ?>
                                <td style="border:none"><input type="time" name="evoCSV60" value="<?php IF($CSV6[0]!=='00:00:00')echo $CSV6[0];?>"></td>
                                <td style="border:none"><input type="text" class="cuerpo" name="evoCSV61" value="<?php echo $CSV6[1];?>"></td>
                                <td style="border:none"><input type="text" class="cuerpo" name="evoCSV62" value="<?php echo $CSV6[2];?>"></td>
                                <td style="border:none"><input type="text" class="cuerpo" name="evoCSV63" value="<?php echo $CSV6[3];?>"></td>
                                <td style="border:none"><input type="text" class="cuerpo" name="evoCSV64" value="<?php echo $CSV6[4];?>"></td>
                                <td style="border:none"><input type="text" class="cuerpo" name="evoCSV65" value="<?php echo $CSV6[5];?>"></td>
                                <td style="border:none"><input type="text" class="cuerpo" name="evoCSV66" value="<?php echo $CSV6[6];?>"></td>
                                <td style="border:none"><input type="text" class="cuerpo" name="evoCSV67" value="<?php echo $CSV6[7];?>"></td>
                                <td style="border:none"><input type="text" class="cuerpo" name="evoCSV68" value="<?php echo $CSV6[8];?>"></td>
                                <td style="border:none"><input type="text" class="cuerpo" name="evoCSV69" value="<?php echo $CSV6[9];?>"></td>
                            </tr>
                            <tr class="csv4">
                                <?php $CSV7 = explode('_',$evo->evoCSV7); ?>
                                <td style="border:none"><input type="time" name="evoCSV70" value="<?php IF($CSV7[0]!=='00:00:00')echo $CSV7[0];?>"></td>
                                <td style="border:none"><input type="text" class="cuerpo" name="evoCSV71" value="<?php echo $CSV7[1];?>"></td>
                                <td style="border:none"><input type="text" class="cuerpo" name="evoCSV72" value="<?php echo $CSV7[2];?>"></td>
                                <td style="border:none"><input type="text" class="cuerpo" name="evoCSV73" value="<?php echo $CSV7[3];?>"></td>
                                <td style="border:none"><input type="text" class="cuerpo" name="evoCSV74" value="<?php echo $CSV7[4];?>"></td>
                                <td style="border:none"><input type="text" class="cuerpo" name="evoCSV75" value="<?php echo $CSV7[5];?>"></td>
                                <td style="border:none"><input type="text" class="cuerpo" name="evoCSV76" value="<?php echo $CSV7[6];?>"></td>
                                <td style="border:none"><input type="text" class="cuerpo" name="evoCSV77" value="<?php echo $CSV7[7];?>"></td>
                                <td style="border:none"><input type="text" class="cuerpo" name="evoCSV78" value="<?php echo $CSV7[8];?>"></td>
                                <td style="border:none"><input type="text" class="cuerpo" name="evoCSV79" value="<?php echo $CSV7[9];?>"></td>
                            </tr>
                            <tr class="csv4">
                                <?php $CSV8 = explode('_',$evo->evoCSV8); ?>
                                <td style="border:none"><input type="time" name="evoCSV80" value="<?php IF($CSV8[0]!=='00:00:00')echo $CSV8[0];?>"></td>
                                <td style="border:none"><input type="text" class="cuerpo" name="evoCSV81" value="<?php echo $CSV8[1];?>"></td>
                                <td style="border:none"><input type="text" class="cuerpo" name="evoCSV82" value="<?php echo $CSV8[2];?>"></td>
                                <td style="border:none"><input type="text" class="cuerpo" name="evoCSV83" value="<?php echo $CSV8[3];?>"></td>
                                <td style="border:none"><input type="text" class="cuerpo" name="evoCSV84" value="<?php echo $CSV8[4];?>"></td>
                                <td style="border:none"><input type="text" class="cuerpo" name="evoCSV85" value="<?php echo $CSV8[5];?>"></td>
                                <td style="border:none"><input type="text" class="cuerpo" name="evoCSV86" value="<?php echo $CSV8[6];?>"></td>
                                <td style="border:none"><input type="text" class="cuerpo" name="evoCSV87" value="<?php echo $CSV8[7];?>"></td>
                                <td style="border:none"><input type="text" class="cuerpo" name="evoCSV88" value="<?php echo $CSV8[8];?>"></td>
                                <td style="border:none"><input type="text" class="cuerpo" name="evoCSV89" value="<?php echo $CSV8[9];?>"></td>
                            </tr>
                            <tr class="csv4">
                                <?php $CSV9 = explode('_',$evo->evoCSV9); ?>
                                <td style="border:none"><input type="time" name="evoCSV90" value="<?php IF($CSV9[0]!=='00:00:00')echo $CSV9[0];?>"></td>
                                <td style="border:none"><input type="text" class="cuerpo" name="evoCSV91" value="<?php echo $CSV9[1];?>"></td>
                                <td style="border:none"><input type="text" class="cuerpo" name="evoCSV92" value="<?php echo $CSV9[2];?>"></td>
                                <td style="border:none"><input type="text" class="cuerpo" name="evoCSV93" value="<?php echo $CSV9[3];?>"></td>
                                <td style="border:none"><input type="text" class="cuerpo" name="evoCSV94" value="<?php echo $CSV9[4];?>"></td>
                                <td style="border:none"><input type="text" class="cuerpo" name="evoCSV95" value="<?php echo $CSV9[5];?>"></td>
                                <td style="border:none"><input type="text" class="cuerpo" name="evoCSV96" value="<?php echo $CSV9[6];?>"></td>
                                <td style="border:none"><input type="text" class="cuerpo" name="evoCSV97" value="<?php echo $CSV9[7];?>"></td>
                                <td style="border:none"><input type="text" class="cuerpo" name="evoCSV98" value="<?php echo $CSV9[8];?>"></td>
                                <td style="border:none"><input type="text" class="cuerpo" name="evoCSV99" value="<?php echo $CSV9[9];?>"></td>
                            
                            </tr>
                        </table>
<?php $cantCSV = strlen($evo->evoCSV9)+strlen($evo->evoCSV8)+strlen($evo->evoCSV7)+strlen($evo->evoCSV6)+strlen($evo->evoCSV5)+strlen($evo->evoCSV4)+strlen($evo->evoCSV3);?>
<input value="<?php echo $cantCSV;?>" id="cantCSV" type="hidden">
<hr>