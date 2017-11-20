<style>
    td{border:1px solid grey}
    th{border:1px solid grey}
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
    <?php //var_dump($farmaMed);
        $primera = $horasMed[0]->medAdmHora;
        $ultima  = $horasMed[1]->medAdmHora;
        $actual  = $termino = date('Y-m-d H:00:00'); 
        $actual = strtotime('-10 hours',strtotime($actual));
        $actual = date('Y-m-d H:00:00',$actual);
        $termino = strtotime('+20 hours',strtotime($termino));
        $termino = date('Y-m-d H:00:00',$termino);
        $contar  = $last = $contador = 0;
        FOREACH($farmaMed as $con){$contar += 1;}
        WHILE($primera <= $ultima){$contador += 1;
                $primera = strtotime('+1 hours',strtotime($primera));
                $primera = date('Y-m-d H:00:00',$primera);
        }
        $primera = $horasMed[0]->medAdmHora;
        IF($contador < 26){$actual = $primera;$termino = $ultima;}
        $primera = $actual;
        $ultima  = $termino;
    ?>
    <div class="col-lg-12" style="overflow-x: auto;padding-left: 0px;" align="left">    
        <?php IF($contar>0){?>
        <table style=" min-width: 850px;">
    <thead>
        <tr>
            <td>Vía</td>
            <td>Fármaco</td>
            <?php WHILE($primera <= $ultima){
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
        <tr><td><?php echo $medicamento[0]->viaNombre;?></td><td><?php echo $medicamento[0]->descripcion;?></td>
        <?php 
        $primera = $actual;
        $ultima  = $termino;
        
            //var_dump($medicamento[10]->descripcion);
            $medic = $medicamento[0]->idfarmaco;
                FOREACH($medicamento as $med){
                //var_dump($med->medAdmHora.'----'.$primera.'<br>');
                        IF($medic === $med->idfarmaco){
                            IF($med->medAdmHora === $primera ){
                                $estado = $med->medAdmEstado;
                                IF($estado === '0')$estado = '<input type="text" class="cuadrado" >';
                                ELSE $estado = '<input type="text" class="cuadradoCheck" >';
                                
                                echo '<td class="linea">'.$estado.'</td>';
                                $primera = strtotime('+1 hours',strtotime($primera));
                                $primera = date('Y-m-d H:00:00',$primera);
                            }
                            ELSE { 
                                WHILE($med->medAdmHora >= $primera){
                                    IF($entro===1)echo '<td></td>';
                                    $entro = 1;
                                    //var_dump($med->medAdmHora.'-----'.$primera.'<br>');
                                    $primera = strtotime('+1 hours',strtotime($primera));
                                    $primera = date('Y-m-d H:00:00',$primera);
                                }
                                $estado = $med->medAdmEstado;
                                IF($estado === '0')$estado = '<input type="text" class="cuadrado" >';
                                ELSE $estado = '<input type="text" class="cuadradoCheck" >';
                                
                                echo '<td class="linea">'.$estado.'</td>';
                                $entro = '';
                            }
                        } ELSE {
                            $primera = $actual;
                            $ultima  = $termino;
                            echo '</tr><tr><td>'.$med->viaNombre.'</td><td>'.$med->descripcion.'</td>';
                            
                        }
                        $medic = $med->idfarmaco;
                }
        
            
        //}
        ?>
        </tr>
        
            
    
                
            </tbody>
</table>
        <?php }ELSE {?>
                <div align="left">
                    <table style="min-width: 850px;">
                        <thead>
                    <tr>
                        <td align="center"><b>Vía</b></td>
                        <td align="center"><b>Fármaco</b></td>
                        <td align="center" colspan="19"><b>Horario</b></td>
                    </tr>
                    </thead>
                    <tbody>
                        <?php FOR($i=0;$i<9;$i++){?>
                        <tr>
                            <td><input type="text" style="max-width:20px"></td>
                            <td><input type="text"></td>
                            <td><input type="text" style="max-width:20px"></td>
                            <td><input type="text" style="max-width:20px"></td>
                            <td><input type="text" style="max-width:20px"></td>
                            <td><input type="text" style="max-width:20px"></td>
                            <td><input type="text" style="max-width:20px"></td>
                            <td><input type="text" style="max-width:20px"></td>
                            <td><input type="text" style="max-width:20px"></td>
                            <td><input type="text" style="max-width:20px"></td>
                            <td><input type="text" style="max-width:20px"></td>
                            <td><input type="text" style="max-width:20px"></td>
                            <td><input type="text" style="max-width:20px"></td>
                            <td><input type="text" style="max-width:20px"></td>
                            <td><input type="text" style="max-width:20px"></td>
                            <td><input type="text" style="max-width:20px"></td>
                            <td><input type="text" style="max-width:20px"></td>
                            <td><input type="text" style="max-width:20px"></td>
                            <td><input type="text" style="max-width:20px"></td>
                            <td><input type="text" style="max-width:20px"></td>
                            <td><input type="text" style="max-width:20px"></td>
                        </tr>
                        <?php }?>
                    </tbody>
                    </table>
                </div>
        <?php }?>
    </div>
    

<input value="<?php echo $cantMedicamento;?>" id="cantMedicamento" type="hidden">
