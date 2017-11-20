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
    
    <div class="col-lg-12" style="overflow-x: auto;padding-left: 0px;" align="left">    
        <?php IF(!empty($medicamento)){?>
       
         <table class='table table-bordered table-hover table-striped data-table'>
                        <thead>
                        <tr>
                            <td style="width:160px;font-size: 13px">Farmaco</td>
                            <td style="font-size:13px">Vía</td>
                            <td style="font-size:13px">Fecha</td>
                            <td style="width:590px;font-size: 13px">Dosificación</td>
                        </tr>
                         </thead>
                        <tbody>
                        <?php FOREACH($medicamento as $med){ ?>
                        <tr>
                            <td><?php echo $med->descripcion ?></td>
                            <td><?php echo $med->viaNombre ?></td>
                            <td><?php $fecha = new datetime($med->medFecha);echo $fecha->format('d-M')  ?></td>
                            <td>
                                    <?php 
                                        $color = '#3f3d3c';
                                        $hora = explode('-',$med->medHora);
                                        $est   = explode('-',$med->medEstado);
                                    
                                        IF(!empty($hora[0]) || $hora[0]==='0'){ 
                                            IF($est[0] === '2') { $color = 'green';
                                    ?>
                                        <span onclick="cambiarEstadoCancelar('<?php echo $med->medId.'_1'; ?>')" style="color:<?php echo $color; ?>;cursor:pointer;text-decoration:line-through; "><b><?php echo $hora[0] ?></b></span>
                                     <?php } ELSEIF($est[0] === '1') { ?>
                                        <span onclick="cambiarEstado('<?php echo $med->medId.'_1'; ?>')" style="color:<?php echo $color; ?>;cursor:pointer; "><b><?php echo $hora[0] ?></b></span>
                                     <?php } ELSE { $color = 'red';?>
                                         <span style="color:<?php echo $color; ?>;cursor:pointer;text-decoration:line-through; "> - <b><?php echo $hora[0].'('.$est[0].')' ?></b></span>
                                    <?php } $color = '#3f3d3c'; }
                                     
                                     
                                        IF(!empty($hora[1]) || $hora[1]==='0'){ 
                                            IF($est[1] === '2') {$color = 'green';
                                    ?>
                                             <span onclick="cambiarEstadoCancelar('<?php echo $med->medId.'_2'; ?>')" style="color:<?php echo $color; ?>;cursor:pointer;text-decoration:line-through; "> - <b><?php echo $hora[1] ?></b></span>
                                     <?php } ELSEIF($est[1] === '1') { ?>
                                        <span onclick="cambiarEstado('<?php echo $med->medId.'_2'; ?>')" style="color:<?php echo $color; ?>;cursor:pointer; "> - <b><?php echo $hora[1] ?></b></span>
                                     <?php } ELSE { $color = 'red';?>
                                         <span style="color:<?php echo $color; ?>;cursor:pointer;text-decoration:line-through; "> - <b><?php echo $hora[1].'('.$est[1].')' ?></b></span>
                                     <?php } $color = '#3f3d3c'; }
                                    
                                    
                                        IF(!empty($hora[2]) || $hora[2]==='0'){ 
                                            IF($est[2] === '2') {$color = 'green';
                                    ?>
                                             <span onclick="cambiarEstadoCancelar('<?php echo $med->medId.'_3'; ?>')" style="color:<?php echo $color; ?>;cursor:pointer;text-decoration:line-through; "> - <b><?php echo $hora[2] ?></b></span>
                                     <?php } ELSEIF($est[2] === '1') { ?>
                                        <span onclick="cambiarEstado('<?php echo $med->medId.'_3'; ?>')" style="color:<?php echo $color; ?>;cursor:pointer; "> - <b><?php echo $hora[2] ?></b></span>
                                     <?php } ELSE { $color = 'red';?>
                                         <span style="color:<?php echo $color; ?>;cursor:pointer;text-decoration:line-through; "> - <b><?php echo $hora[2].'('.$est[2].')' ?></b></span>
                                     <?php } $color = '#3f3d3c'; }
                                    
                                    
                                        IF(!empty($hora[3]) || $hora[3]==='0'){ 
                                            IF($est[3] === '2') {$color = 'green';
                                    ?>
                                             <span onclick="cambiarEstadoCancelar('<?php echo $med->medId.'_4'; ?>')" style="color:<?php echo $color; ?>;cursor:pointer;text-decoration:line-through; "> - <b><?php echo $hora[3] ?></b></span>
                                     <?php } ELSEIF($est[3] === '1') { ?>
                                        <span onclick="cambiarEstado('<?php echo $med->medId.'_4'; ?>')" style="color:<?php echo $color; ?>;cursor:pointer; "> - <b><?php echo $hora[3] ?></b></span>
                                     <?php } ELSE { $color = 'red';?>
                                         <span style="color:<?php echo $color; ?>;cursor:pointer;text-decoration:line-through; "> - <b><?php echo $hora[3].'('.$est[3].')' ?></b></span>
                                     <?php } $color = '#3f3d3c'; };
                                    
                                    
                                        IF(!empty($hora[4]) || $hora[4]==='0'){ 
                                            IF($est[4] === '2') {$color = 'green';
                                    ?>
                                             <span onclick="cambiarEstadoCancelar('<?php echo $med->medId.'_5'; ?>')" style="color:<?php echo $color; ?>;cursor:pointer;text-decoration:line-through; "> - <b><?php echo $hora[4] ?></b></span>
                                     <?php } ELSEIF($est[4] === '1') { ?>
                                        <span onclick="cambiarEstado('<?php echo $med->medId.'_5'; ?>')" style="color:<?php echo $color; ?>;cursor:pointer; "> - <b><?php echo $hora[4] ?></b></span>
                                     <?php } ELSE { $color = 'red';?>
                                         <span style="color:<?php echo $color; ?>;cursor:pointer;text-decoration:line-through; "> - <b><?php echo $hora[4].'('.$est[4].')' ?></b></span>
                                     <?php } $color = '#3f3d3c'; };
                                    
                            
                            //echo $med->medHora ?></td>
                        </tr>
                        <?php }?>
                        </tbody>
        </table>
        
        
        <?php }ELSE {?>
                <div align="left">
                    <table style="min-width: 850px;">
                        <thead>
                    <tr>
                        <td align="center"  style="font-size:13px"><b>Vía</b></td>
                        <td align="center"  style="font-size:13px"><b>Fármaco</b></td>
                        <td align="center" colspan="19"  style="font-size:13px"><b>Horario</b></td>
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
