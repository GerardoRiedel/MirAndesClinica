
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
    
                <br>
                <div class="col-lg-2"></div>
                <div class="col-lg-2">
                    <label>Total Asistentes</label>
                </div>
                <div class="col-lg-8">
                    <input type="text" id="asistentes" readonly="true" style="border:none; width:40px">
                </div>
                <div class="col-lg-2"></div>
                <div class="col-lg-2">
                    <label>Total Permisos</label>
                </div>
                <div class="col-lg-8" align="left">
                    <input type="text" id="permisos" readonly="true" style="border:none; width:40px">
                </div>
                <div class="col-lg-2"></div>
                <div class="col-lg-2">
                    <label>Total Inasistentes</label>
                </div>
                <div class="col-lg-8">
                    <input type="text" id="inasistentes" readonly="true" style="border:none; width:40px">
                </div>
                <div class="col-xs-12"><br></div>
                <?php $estAsis = $estPermi = $estInas = 0; ?> 
                <table  class='table table-bordered table-hover table-striped '>
                        <thead>
                            <tr>
                                <th style="width:100px">Run</th>
                                <th>Nombre</th>
                                <th>Asistencia</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            <tr><td colspan="2"></td><td align="center"><table><tr><td colspan="32"align="center">Febrero</td></tr><tr><?php FOR($i=1;$i<=31;$i++) { echo '<td style="width:21px;border:1px solid black" align="center">'.$i.'</td>'; } ?></tr></table></td></tr>
                                <?php foreach ($pacientes as $item) : ?>
                            <tr>
                                <td><?php if(!empty($item->rut)) echo formatearRut ($item->rut); ?></td>
                                <td><?php echo strtoupper($item->apellidoPaterno).' '.strtoupper($item->apellidoMaterno).' '.strtoupper($item->nombres); ?></td>
                                <td align="center">
                                    
                                    <table>
                                        <?php FOR($i=1;$i<=31;$i++) { ?>
                                       <td style="width:20px;border:1px solid black;cursor: pointer; "onclick="cambiarEstado(<?php echo $item->id; ?>,<?php echo $i; ?>)"style=" cursor: pointer" align="center">
                                           <input id="<?php echo $item->id.'_'.$i;?>"  style="width:20px;border:none;cursor: pointer" value="" readonly="">
                                                    <?php FOREACH($asistencia as $asi){ 
                                                            $fecha = $asi->asiFecha;
                                                            $dia = new DateTime($fecha);$dia = $dia->format('d'); $dia=$dia*1;
                                                            IF($item->id ===$asi->id && $dia===$i){ ?>
                                           <?php 
                                                $estado = $asi->asiEstado; 
                                                IF($estado==='1'){$estado='A'; $estAsis =$estAsis+ 1; }
                                                ELSEIF($estado==='2'){$estado='P';$estPermi =$estPermi+ 1; }
                                                ELSEIF($estado==='3'){$estado='I';$estInas =$estInas+ 1; }
                                            ?>
                                           <span style="margin-top: -18px; margin-left: -4px; position: absolute" class="<?php echo $item->id.'_'.$i;?>"><?php echo $estado; ?></span>

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
                <input type="hidden" value="<?php echo$estAsis; ?>" id="estAsis">
                <input type="hidden" value="<?php echo$estPermi; ?>" id="estPermi">
                <input type="hidden" value="<?php echo$estInas; ?>" id="estInas">
                <div class="col-lg-2">
                    <!--
                    <button onclick="goBack()" class="btn btn-default btn-sm">Cancelar</button><script>function goBack(){window.history.go(-1);}</script>
                -->
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
    
<script src="<?php echo base_url(); ?>../assets/js/jquery.dataTables.js"></script>
<script src="<?php echo base_url(); ?>../assets/js/jquery.nicescroll.min.js"></script>
<script src="<?php echo base_url(); ?>../assets/js/hs.tables.js"></script>

<script>
       
        function cambiarEstado(id,dia){
                    $.ajax({
                    type: "GET",
                    url: "<?php echo base_url(); ?>" + "api/ingresosHD/cambiarAsistencia/"+id+"_"+dia,
                    dataType: 'json',
                    success: function(data){
                        $estado='';
                         $("."+data.registro+"_"+data.dia).hide();
                         if(data.estado===1)estado=' A';else if(data.estado===2)estado=' P';else if(data.estado===3)estado='  I';
                        document.getElementById(data.registro+"_"+data.dia).value = estado;
                    }
                });
        }
         $( document ).ready(function() {
            document.getElementById("asistentes").value = $( "#estAsis").val();
            document.getElementById("permisos").value = $( "#estPermi").val();
            document.getElementById("inasistentes").value = $( "#estInas").val();;
         });
    </script>