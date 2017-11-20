<style>
    
    .rotar{
        max-width:21px;
        font-size: 10px;
        word-wrap: break-word;
        text-align:center;
    }
    .linea{
        max-width: 10px;
    }
</style>
    <br><hr>
    <div class="col-lg-12" align="left" style=" margin-left: -15px">
        <label class="titulo">Datos Medicamentos</label> 
        <i onclick="redirect(<?php echo $datos->id;?>)" class="fa fa-plus-circle" aria-hidden="true" style=" cursor: pointer;color: red" title="modificar farmacos"></i>
    </div><br>
    
    <?php //var_dump($farmaMed);
        $primera = $horasMed[0]->medAdmHora;
        $ultima  = $horasMed[1]->medAdmHora;
        $contar  = $last = 0;
        FOREACH($farmaMed as $con){$contar += 1;}
        
    ?>
    <div class="col-lg-12" style="overflow-x: auto; padding-left: 0px" align="left">  
        <?php IF($contar>0){?>
        <table onclick="redirect(<?php IF(!empty($medicamento[0]->medAdmRegistro)) echo $medicamento[0]->medAdmRegistro; ELSEIF (!empty($datos->id))echo $datos->id; ?>)" style="min-width: 900px;cursor: pointer;">
    <thead>
        <tr>
            <td align="center"><b>Vía</b></td>
            <td align="center"><b>Fármaco</b></td>
            <?php WHILE($primera <= $ultima){
                $contador += 1;
                $mostrar = strtotime('+1 hours',strtotime($primera));
                $dia    = date('D',$mostrar);
                IF($dia === 'Mon')$dia = 'Lu';ELSEIF($dia === 'Tue')$dia = 'Ma';ELSEIF($dia === 'Wed')$dia = 'Mi';ELSEIF($dia === 'Thu')$dia = 'Ju';ELSEIF($dia === 'Fri')$dia = 'Vi';ELSEIF($dia === 'Sat')$dia = 'Sa';ELSEIF($dia === 'Sun')$dia = 'Do';
                $mostrar = date('H',$mostrar);
                $mostrar = $dia.'<br>'.$mostrar.'h';
                echo '<td class="rotar"><b>'.$mostrar.'</b></td>';
                $primera = strtotime('+1 hours',strtotime($primera));
                $primera = date('Y-m-d H:00:00',$primera);
            }?>
        </tr>
    </thead>
    
    <tbody>
        <tr><td style="font-size: 11px"><?php echo $medicamento[0]->viaNombre;?></td><td style="font-size: 11px" align="center"><?php echo $medicamento[0]->descripcion;?></td>
        <?php 
        $primera = $horasMed[0]->medAdmHora;
        $ultima  = $horasMed[1]->medAdmHora;
        
            //var_dump($medicamento[10]->descripcion);
            $medic = $medicamento[0]->idfarmaco;
                FOREACH($medicamento as $med){
                //var_dump($med->medAdmHora.'----'.$primera.'<br>');
                        IF($medic === $med->idfarmaco){
                            IF($med->medAdmHora === $primera ){
                                $estado = $med->medAdmEstado;
                                IF($estado === '0')$estado = '<input type="number" readonly style="background-color:#82E0AA; color: black; width:20px; height:20px;border:none" value="1">';
                                ELSEIF ($estado === '1')$estado = '<input type="text" readonly style="background-color:green; color: black; width:20px; height:20px;border:none">';
                                ELSEIF ($estado === '2')$estado = '<input type="text" readonly style="background-color:#82E0AA; color: black; width:30px; height:20px;border:none" value="¼ de dosis">';
                                ELSEIF ($estado === '3')$estado = '<input type="text" readonly style="background-color:#82E0AA; color: black; width:30px; height:20px;border:none" value="½ de dosis">';
                                ELSEIF ($estado === '4')$estado = '<input type="text" readonly style="background-color:#82E0AA; color: black; width:30px; height:20px;border:none" value="¾ de dosis">';
                                //ELSE $estado = '<input type="text" readonly style="background-color:#82E0AA; color: black; width:30px; height:20px;border:none" value="1">';
                               
                                echo '<td class="linea" style="font-size: 11px" align="center" >'.$estado.'</td>';
                                $primera = strtotime('+1 hours',strtotime($primera));
                                $primera = date('Y-m-d H:00:00',$primera);
                            }
                            ELSE { 
                                WHILE($med->medAdmHora >= $primera){
                                    IF($entro===1)echo '<td style="font-size: 11px" align="center" ></td>';
                                    $entro = 1;
                                    //var_dump($med->medAdmHora.'-----'.$primera.'<br>');
                                    $primera = strtotime('+1 hours',strtotime($primera));
                                    $primera = date('Y-m-d H:00:00',$primera);
                                }
                                $estado = $med->medAdmEstado;
                                IF($estado === '0')$estado = '<input type="number" readonly style="background-color:#82E0AA; color: black; width:20px; height:20px;border:none;" value="1">';
                                ELSEIF ($estado === '1')$estado = '<input type="text" readonly style="background-color:green; color: black; width:20px; height:20px;border:none">';
                                ELSEIF ($estado === '2')$estado = '<input type="text" readonly style="background-color:#82E0AA; color: black; width:30px; height:20px;border:none" value="¼ de dosis">';
                                ELSEIF ($estado === '3')$estado = '<input type="text" readonly style="background-color:#82E0AA; color: black; width:30px; height:20px;border:none" value="½ de dosis">';
                                ELSEIF ($estado === '4')$estado = '<input type="text" readonly style="background-color:#82E0AA; color: black; width:30px; height:20px;border:none" value="¾ de dosis">';
                               //ELSE $estado = '<input type="text" readonly style="background-color:green; width:18px; height:20px;border:none">';
                                
                                echo '<td class="linea" style="font-size: 11px" align="center" >'.$estado.'</td>';
                                $entro = '';
                            }
                        } ELSE {
                            $primera = $horasMed[0]->medAdmHora;
                            $ultima  = $horasMed[1]->medAdmHora;
                            echo '</tr><tr><td style="font-size: 11px" align="center">'.$med->viaNombre.'</td><td style="font-size: 11px"  align="center">'.$med->descripcion.'</td>';
                            
                        }
                        $medic = $med->idfarmaco;
                }
        
            
        //}
        ?>
        </tr>
        
            
    
                
                
    <?php /* foreach($horasMed as $horas){?>
        
                <?php foreach ($medicamento as $item) { 
                    
                IF($horas->medAdmHora === $item->medAdmHora):
                     
                    
                    IF($per === $item->medHora)$per = '';                     ELSE $per       = $item->medHora; 
                    IF($id === $item->medRegistro)$id = '';                   ELSE $id        = $item->medRegistro;
                    IF($fechaReg === $item->medFechaRegistro)$fechaReg = '';  ELSE $fechaReg  = $item->medFechaRegistro;

                    IF($farm != $item->descripcion){
                        $farm = $item->descripcion;$tr = '';
                        $fecha60 = date('Y-m-d H:i:s');
                        $fecha60 = strtotime ( '+1 hours' , strtotime ( $fecha60 ) ) ;
                        $fecha60 = date ( 'Y-m-d H:i:s' , $fecha60 );
                        $fecha30 = date('Y-m-d H:i:s');
                        $fecha30 = strtotime ( '-1 hours' , strtotime ( $fecha30 ) ) ;
                        $fecha30 = date ( 'Y-m-d H:i:s' , $fecha30 );

                ?>
                
                        <td align="center" style=" border:1px solid #CCCCCC"><?php echo $item->viaNombre; ?></td>
                        <td align="center" style=" border:1px solid #CCCCCC"><?php echo $farm; ?></td>
                        <td align="center" style=" border:1px solid #CCCCCC">
                            <?php IF($item->estId==='0' && $item->medAdmHora <= $fecha60){?>
                            <a class="tip-bottom" title="Administrar Médicamento" style="color:red"  href="<?php echo base_url("clinica_enfermeria/medicamentos/administrar_medicamento/".$item->medAdmId.'_'.$item->medAdmRegistro )?>">
                                <b><?php echo 'NO'; ?></b><!--<i class="fa fa-ban" aria-hidden="true"></i>-->
                            </a>
                            <?php } ELSEIF($item->estId==='0' && $item->medAdmHora >= $fecha30){?>
                            <a class="tip-bottom" title="Administrar Médicamento" style="color:orange;"  href="<?php echo base_url("clinica_enfermeria/medicamentos/administrar_medicamento/".$item->medAdmId.'_'.$item->medAdmRegistro )?>">
                                <?php echo 'F'; ?><!--<i class="fa fa-ban" aria-hidden="true"></i>-->
                            </a>
                            <?php } ELSE {;?>
                            <a class="tip-bottom" title="Administrar Médicamento" style="color:green"  href="">
                                <?php echo 'OK'; ?><!--<i class="fa fa-ban" aria-hidden="true"></i>-->
                            </a>
                            <?php } ?>
                        </td>
                <?php
                    } ELSE {$tr = $farm =  '';
                ?>    
                        <td align="center" style=" border:1px solid #CCCCCC; min-width: 40px">
                            <?php IF($item->estId==='0' && $item->medAdmHora <= $fecha60){?>
                            <a class="tip-bottom" title="Administrar Médicamento" style="color:red"  href="<?php echo base_url("clinica_enfermeria/medicamentos/administrar_medicamento/".$item->medAdmId.'_'.$item->medAdmRegistro )?>">
                                <b><?php echo 'NO'; ?></b><!--<i class="fa fa-ban" aria-hidden="true"></i>-->
                            </a>
                            <?php } ELSEIF($item->estId==='0' && $item->medAdmHora >= $fecha30){?>
                            <a class="tip-bottom" title="Administrar Médicamento" style="color:orange;"  href="<?php echo base_url("clinica_enfermeria/medicamentos/administrar_medicamento/".$item->medAdmId.'_'.$item->medAdmRegistro )?>">
                                <?php echo 'F'; ?><!--<i class="fa fa-ban" aria-hidden="true"></i>-->
                            </a>
                            <?php } ELSE {;?>
                            <a class="tip-bottom" title="Administrar Médicamento" style="color:green"  href="">
                                <?php echo 'OK'; ?><!--<i class="fa fa-ban" aria-hidden="true"></i>-->
                            </a>
                            <?php } ?>
                        </td>

                <?php echo $tr;} ?>

                <?php //IF($farm === $item->descripcion)$farm = $item->descripcion;ELSE $farm = ''; IF($per != $item->medHora)$per = $item->medHora; ; IF($id != $item->medRegistro)$id = $item->medRegistro;?>
                <?php $farm = $item->descripcion; $per = $item->medHora; $id = $item->medRegistro?>
            <?php 
                ENDIF;
                }
            }*/
            ?>
            </tbody>
</table>
        <?php }ELSE {?>
                <div align="left">
                    <table style="min-width: 800px;">
                        <thead>
                    <tr>
                        <td align="center"><b>Vía</b></td>
                        <td align="center"><b>Fármaco</b></td>
                        <td align="center"><b>Horario</b></td>
                    </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td></td><td></td><td></td></tr>
                    </tbody>
                    </table>
                </div>
        <?php }?>
        <hr>
    </div>
    
    
<script>
    function redirect(id) {
        location.href="<?php echo base_url(); ?>"+"clinica_enfermeria/medicamentos/cargarMedicamentoAsignar/"+id;
           
        
    }
</script>
