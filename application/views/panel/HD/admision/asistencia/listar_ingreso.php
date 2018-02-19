
<div id="content" style="-webkit-box-shadow: -2px 2px 41px 2px rgba(0,0,0,0.75);
-moz-box-shadow: -2px 2px 41px 2px rgba(0,0,0,0.75);
box-shadow: -2px 2px 41px 2px rgba(0,0,0,0.75);z-index: 25 ">
    <div id="content-header" style="background-color: #e9c899; max-height: 10px !important" >
        <h1 style="background-color: #a15ebe !important;border:none;color:#ffffff; margin-right: 30px;-webkit-box-shadow: 10px 10px 23px -6px rgba(0,0,0,0.75);-moz-box-shadow: 10px 10px 23px -6px rgba(0,0,0,0.75);box-shadow: 10px 10px 23px -6px rgba(0,0,0,0.75);" class="alert alert-info"><?php echo $title;?></h1>
    </div>
    
    
    

    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12"></div>
                


            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 bhoechie-tab-container" >
                        <?php 
                            $estAsis = $estPermi = $estInas = 0; 
                            foreach ($pacientes as $item) : 
                                         FOR($i=1;$i<=31;$i++) { 
                                                     FOREACH($asistencia as $asi){ 
                                                            $fecha = $asi->asiFecha;
                                                            $dia = new DateTime($fecha);$dia = $dia->format('d'); $dia=$dia*1;
                                                                IF($item->id ===$asi->id && $dia===$i){ 
                                                                $estado = $asi->asiEstado; 
                                                                IF($estado==='1'){$estAsis =$estAsis+ 1; }
                                                                ELSEIF($estado==='2'){$estPermi =$estPermi+ 1; }
                                                                ELSEIF($estado==='3'){$estInas =$estInas+ 1; }
                                                                } 
                                                     } 
                                         } 
                            endforeach; 
                       ?>
                            
                <br>
                <div class="col-lg-1"></div>
                <div class="col-lg-2">
                    <i class="fa fa-table"  style="color:#1d7044;font-size:18px" title="Exportar Tabla a Excel"> </i><span id="btnExport"style="cursor: pointer; color:#1d7044;font-size: 14px;"> <b>Export</b></span><br><span style="font-size:10px;margin-left: -50px;width:200px">Recuerde refrescar antes de exportar</span>
                </div>
                <div class="col-lg-6">
                    <?php $attributes = array('id' => 'form');
                        echo form_open('hd_admision/asistencia/listarHD',$attributes);
                    ?>Buscar: 
                    <select name="mes">
                        <option value="0">Seleccione...</option>
                        <option value="01" <?php IF($mes==='01')echo 'selected';?>>Enero</option>
                        <option value="02" <?php IF($mes==='02')echo 'selected';?>>Febrero</option>
                    </select>
                    <?php echo form_submit('','Ver','class="btn btn-primary btn-sm btnCetep"');?>
                    <?php echo form_close();?>
                </div>
                
            <div class="col-lg-12"></div>
                <div class="col-lg-9"></div>
                <div class="col-lg-3">
                    <table>
                        <tr>
                            <td><label>Total Asistentes (<span style="color:green;">A</span>): </label></td>
                            <td align="left"><label style="color:green"><?php echo $estAsis; ?></label></td>
                        </tr>
                        <tr>
                            <td><label>Total Permisos (<span style="color:orange;">P</span>): </label></td>
                            <td align="left"><label style="color:orange"><?php echo $estPermi; ?></label></td>
                        </tr>
                        <tr>
                            <td><label>Total Inasistentes (<span style="color:red;">I</span>): </label></td>
                            <td align="left"><label style="color:red"><?php echo $estInas; ?></label></td>
                        </tr>
                    </table>
                </div>
                
                <div class="col-xs-12"><br></div>
               
                <div class="col-lg-1"></div>
                <div class="col-lg-10">
                <table  class='table table-bordered table-hover table-striped '>
                        <thead>
                            <tr>
                                <th style="width:100px">Run</th>
                                <th>Nombre</th>
                                <th>Asistencia</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php IF($mes==='01')$mesMostrar='Enero';ELSEIF($mes==='02')$mesMostrar='Febrero';ELSEIF($mes==='03')$mesMostrar='Marzo';ELSEIF($mes==='04')$mesMostrar='Abril';ELSEIF($mes==='05')$mesMostrar='Mayo';ELSEIF($mes==='06')$mesMostrar='Junio';ELSEIF($mes==='07')$mesMostrar='Julio';ELSEIF($mes==='08')$mesMostrar='Agosto';ELSEIF($mes==='09')$mesMostrar='Septiembre';ELSEIF($mes==='10')$mesMostrar='Octubre';ELSEIF($mes==='11')$mesMostrar='Noviembre';ELSEIF($mes==='12')$mesMostrar='Diciembre'; ?>
                            <tr><td colspan="2"></td><td align="center"><table><tr><td colspan="32"align="center"><?php echo $mesMostrar; ?></td></tr><tr><?php FOR($i=1;$i<=31;$i++) { echo '<td style="width:21px;border:1px solid grey" align="center">'.$i.'</td>'; } ?></tr></table></td></tr>
                                <?php foreach ($pacientes as $item) : ?>
                            <tr>
                                <td><?php if(!empty($item->rut)) echo formatearRut ($item->rut); ?></td>
                                <td><?php echo strtoupper($item->apellidoPaterno).' '.strtoupper($item->apellidoMaterno).' '.strtoupper($item->nombres); ?></td>
                                <td align="center">
                                    
                                    <table>
                                        <?php FOR($i=1;$i<=31;$i++) { ?>
                                       <td style="width:20px;border:1px solid grey;cursor: pointer; "onclick="cambiarEstado(<?php echo $item->id; ?>,<?php echo $i; ?>)"style=" cursor: pointer; " align="center">
                                           <input id="<?php echo $item->id.'_'.$i;?>"  style="width:20px;border:none;cursor: pointer;" value="" readonly="">
                                                    <?php FOREACH($asistencia as $asi){ 
                                                            $fecha = $asi->asiFecha;
                                                            $dia = new DateTime($fecha);$dia = $dia->format('d'); $dia=$dia*1;
                                                            IF($item->id ===$asi->id && $dia===$i){ ?>
                                           <?php 
                                                $estado = $asi->asiEstado; 
                                                IF($estado==='1'){$estado='A';  $color='green';}
                                                ELSEIF($estado==='2'){$estado='P';$color='orange';}
                                                ELSEIF($estado==='3'){$estado='I';$color='red';}
                                                ELSEIF($estado==='0'){$estado='';$color='grey';}
                                                ELSE {$color='grey';}
                                            ?>
                                           <span style="margin-top: -18px; margin-left: -4px; position: absolute;color:<?php echo $color;?>" class="<?php echo $item->id.'_'.$i;?>"><?php echo $estado; ?></span>

                                                            <?php } 
                                                     } 
                                                    ?>
                                        </td>
                                        <?php } ?>
                                    </table>
                                </td>
                            </tr>
                                <?php endforeach; ?>
                        </tbody>
                    </table>
            </div>
                <div class="col-lg-2">
                    
                    
                    <!--
                    <button onclick="goBack()" class="btn btn-default btn-sm">Cancelar</button><script>function goBack(){window.history.go(-1);}</script>
                -->
                </div>
<div class="col-lg-12"></div>
<div class="col-lg-1"></div>
<div class="col-lg-10">
    <table>
                    <?php $attributes = array('id' => 'form');
                        echo form_open('hd_admision/asistencia/agregarPaciente',$attributes);
                    ?>
                        <input type="hidden" id="mes" name="mes" value="<?php echo $mes; ?>">
                        <label>Agregar Paciente:&nbsp;&nbsp;</label>
                    <select name="pacientes" style="width:350px">
                        <option value="0">Seleccione...</option>
                        <?php FOREACH($pacientesLista as $pac){ ?>
                        <option value="<?php echo $pac->pacId;?>"><?php echo $pac->apellidoPaterno.' '.$pac->apellidoMaterno.' '.$pac->nombres;?></option>
                        <?php } ?>
                    </select>
                    <?php echo form_submit('','Agregar','class="btn btn-primary btn-sm btnCetep"');?>
                    <?php echo form_close();?>
    </table>
                </div>
        </div><!-- div class='widget-content'-->    
                    
                
                
            </div><!-- div class="col-xs-12" -->
        </div><!-- row -->
   </div>
</div><!-- content -->
</div>
<?php
function formatearRut( $rut ) {
     while($rut[0] == "0") {
            $rut = substr($rut, 1);
        }
        $factor = 2;
        $suma = 0;
        for($i = strlen($rut) - 1; $i >= 0; $i--) {
            $suma += $factor * $rut[$i];
            $factor = $factor % 7 == 0 ? 2 : $factor + 1;
        }
        $dv = 11 - $suma % 11;
        /* Por alguna razón me daba que 11 % 11 = 11. Esto lo resuelve. */
        $dv = $dv == 11 ? 0 : ($dv == 10 ? "K" : $dv);
        $rut=  $rut . $dv;
return number_format( substr ( $rut, 0 , -1 ) , 0, "", ".") . '-' . substr ( $rut, strlen($rut) -1 , 1 );
}
?>




 <div id="exportar" style="display:none">
            <div class="col-lg-12"></div>
                <div class="col-lg-9"></div>
                <div class="col-lg-3">
                    <table>
                        <tr>
                            <td><label>Total Asistentes (<span style="color:green;">A</span>): </label></td>
                            <td align="left"><label style="color:green"><?php echo $estAsis; ?></label></td>
                        </tr>
                        <tr>
                            <td><label>Total Permisos (<span style="color:orange;">P</span>): </label></td>
                            <td align="left"><label style="color:orange"><?php echo $estPermi; ?></label></td>
                        </tr>
                        <tr>
                            <td><label>Total Inasistentes (<span style="color:red;">I</span>): </label></td>
                            <td align="left"><label style="color:red"><?php echo $estInas; ?></label></td>
                        </tr>
                    </table>
                </div>
                
                <div class="col-xs-12"><br></div>
               
                <div class="col-lg-1"></div>
                <div class="col-lg-10">
                <table  class='table table-bordered table-hover table-striped '>
                        <thead>
                            <tr>
                                <th style="width:100px">Run</th>
                                <th>Nombre</th>
                                <th>Asistencia</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php IF($mes==='01')$mesMostrar='Enero';ELSEIF($mes==='02')$mesMostrar='Febrero';ELSEIF($mes==='03')$mesMostrar='Marzo';ELSEIF($mes==='04')$mesMostrar='Abril';ELSEIF($mes==='05')$mesMostrar='Mayo';ELSEIF($mes==='06')$mesMostrar='Junio';ELSEIF($mes==='07')$mesMostrar='Julio';ELSEIF($mes==='08')$mesMostrar='Agosto';ELSEIF($mes==='09')$mesMostrar='Septiembre';ELSEIF($mes==='10')$mesMostrar='Octubre';ELSEIF($mes==='11')$mesMostrar='Noviembre';ELSEIF($mes==='12')$mesMostrar='Diciembre'; ?>
                            <tr><td colspan="2"></td><td align="center"><table><tr><td colspan="32"align="center"><?php echo $mesMostrar; ?></td></tr><tr><?php FOR($i=1;$i<=31;$i++) { echo '<td style="width:21px;border:1px solid grey" align="center">'.$i.'</td>'; } ?></tr></table></td></tr>
                                <?php foreach ($pacientes as $item) : ?>
                            <tr>
                                <td><?php if(!empty($item->rut)) echo formatearRut ($item->rut); ?></td>
                                <td><?php echo strtoupper($item->apellidoPaterno).' '.strtoupper($item->apellidoMaterno).' '.strtoupper($item->nombres); ?></td>
                                <td align="center">
                                    
                                    <table>
                                        <?php FOR($i=1;$i<=31;$i++) { ?>
                                       <td style="width:20px;border:1px solid grey;cursor: pointer; "onclick="cambiarEstado(<?php echo $item->id; ?>,<?php echo $i; ?>)"style=" cursor: pointer; " align="center">
                                                    <?php FOREACH($asistencia as $asi){ 
                                                            $fecha = $asi->asiFecha;
                                                            $dia = new DateTime($fecha);$dia = $dia->format('d'); $dia=$dia*1;
                                                            IF($item->id ===$asi->id && $dia===$i){ ?>
                                           <?php 
                                                $estado = $asi->asiEstado; 
                                                IF($estado==='1'){$estado='A';  $color='green';}
                                                ELSEIF($estado==='2'){$estado='P';$color='orange';}
                                                ELSEIF($estado==='3'){$estado='I';$color='red';}
                                                ELSEIF($estado==='0'){$estado='';$color='grey';}
                                                ELSE {$color='grey';}
                                            ?>
                                           <span style="margin-top: -18px; margin-left: -4px; position: absolute;color:<?php echo $color;?>" class="<?php echo $item->id.'_'.$i;?>"><?php echo $estado; ?></span>

                                                            <?php } 
                                                     } 
                                                    ?>
                                        </td>
                                        <?php } ?>
                                    </table>
                                </td>
                            </tr>
                                <?php endforeach; ?>
                        </tbody>
                    </table>
            </div>
                <div class="col-lg-2">
                    
                    
                    <!--
                    <button onclick="goBack()" class="btn btn-default btn-sm">Cancelar</button><script>function goBack(){window.history.go(-1);}</script>
                -->
                </div>
</div><!--------------EXPORTAR----------------->
    
<script src="<?php echo base_url(); ?>../assets/js/jquery.dataTables.js"></script>
<script src="<?php echo base_url(); ?>../assets/js/jquery.nicescroll.min.js"></script>
<script src="<?php echo base_url(); ?>../assets/js/hs.tables.js"></script>

<script>
       
        function cambiarEstado(id,dia){
            var mes = $( "#mes").val();
                    $.ajax({
                    type: "GET",
                    url: "<?php echo base_url(); ?>" + "api/ingresosHD/cambiarAsistencia/"+id+"_"+dia+"_"+mes,
                    dataType: 'json',
                    success: function(data){
                        $estado='';
                         $("."+data.registro+"_"+data.dia).hide();
                         if(data.estado===1)estado=' A';else if(data.estado===2)estado=' P';else if(data.estado===3)estado='  I';else if(data.estado===0)estado=' ';
                        document.getElementById(data.registro+"_"+data.dia).value = estado;
                    }
                });
        }
         $( document ).ready(function() {
            //document.getElementById("asistentes").value = $( "#estAsis").val();
            //document.getElementById("permisos").value = $( "#estPermi").val();
            //document.getElementById("inasistentes").value = $( "#estInas").val();;
         });
    </script>
    <script>
    $("#btnExport").click(function(e) {

        var mes = $( "#mes").val();
        var mesMostrar = '';
        if(mes==='01')mesMostrar='Enero';else if(mes==='02')mesMostrar='Febrero';else if(mes==='03')mesMostrar='Marzo';else if(mes==='04')mesMostrar='Abril';else if(mes==='05')mesMostrar='Mayo';else if(mes==='06')mesMostrar='Junio';else if(mes==='07')mesMostrar='Julio';else if(mes==='08')mesMostrar='Agosto';else if(mes==='09')mesMostrar='Septiembre';else if(mes==='10')mesMostrar='Octubre';else if(mes==='11')mesMostrar='Noviembre';else if(mes==='12')mesMostrar='Diciembre'; else mesMostrar=mes; 
                            
        //Creamos un Elemento Temporal en forma de enlace
        var tmpElemento = document.createElement('a');
        // obtenemos la informaciÃ³n desde el div que lo contiene en el html
        // Obtenemos la informaciÃ³n de la tabla
        var data_type = 'data:application/vnd.ms-excel';
        var tabla_div = document.getElementById('exportar');
        var tabla_html = tabla_div.outerHTML.replace(/ /g, '%20');
        tmpElemento.href = data_type + ', ' + tabla_html;
        //Asignamos el nombre a nuestro EXCEL
        tmpElemento.download = 'Registro de Asistencia '+mesMostrar+' HD.xls';
        // Simulamos el click al elemento creado para descargarlo
        tmpElemento.click();

        //var htmltable= document.getElementById('imprimir');
        //var html = htmltable.outerHTML;
        //window.open('data:application/vnd.ms-excel,' + encodeURIComponent(html));
    });

</script>

