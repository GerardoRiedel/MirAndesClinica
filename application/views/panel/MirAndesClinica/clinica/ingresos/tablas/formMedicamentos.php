
  <!--
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
  -->
  <style>
    td{border:1px solid grey}
    th{border:1px solid grey}
</style>
    <br><hr>
    
    
    <div class="col-lg-12" style="overflow-x: auto; padding-left: 0px" align="left">  
         <div class="col-lg-12" align="left" style=" margin-left: -15px">
            <label class="titulo">Datos Medicamentos</label> 

            <i onclick="redirect(<?php echo $evo->evoId;?>)" class="fa fa-plus-circle" aria-hidden="true" style=" cursor: pointer;color: red" title="modificar farmacos"></i>

         </div><br>
                        
                        
        <table class='table table-bordered table-hover table-striped data-table'>
                        <thead>
                        <tr>
                            <td style="width:160px">Farmaco</td>
                            <td>Vía</td>
                            <td>Fecha</td>
                            <td style="width:590px">Dosificación</td>
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
                                         <span style="color:<?php echo $color; ?>;cursor:pointer; "> - <b><?php echo $hora[0] ?></b></span>
                                    <?php } $color = '#3f3d3c'; };
                                     
                                     
                                        IF(!empty($hora[1]) || $hora[1]==='0'){ 
                                            IF($est[1] === '2') {$color = 'green';
                                    ?>
                                             <span onclick="cambiarEstadoCancelar('<?php echo $med->medId.'_2'; ?>')" style="color:<?php echo $color; ?>;cursor:pointer;text-decoration:line-through; "> - <b><?php echo $hora[1] ?></b></span>
                                     <?php } ELSEIF($est[1] === '1') { ?>
                                        <span onclick="cambiarEstado('<?php echo $med->medId.'_2'; ?>')" style="color:<?php echo $color; ?>;cursor:pointer; "> - <b><?php echo $hora[1] ?></b></span>
                                     <?php } ELSE { $color = 'red';?>
                                         <span style="color:<?php echo $color; ?>;cursor:pointer; "> - <b><?php echo $hora[1] ?></b></span>
                                     <?php } $color = '#3f3d3c'; };
                                    
                                    
                                        IF(!empty($hora[2]) || $hora[2]==='0'){ 
                                            IF($est[2] === '2') {$color = 'green';
                                    ?>
                                             <span onclick="cambiarEstadoCancelar('<?php echo $med->medId.'_3'; ?>')" style="color:<?php echo $color; ?>;cursor:pointer;text-decoration:line-through; "> - <b><?php echo $hora[2] ?></b></span>
                                     <?php } ELSEIF($est[2] === '1') { ?>
                                        <span onclick="cambiarEstado('<?php echo $med->medId.'_3'; ?>')" style="color:<?php echo $color; ?>;cursor:pointer; "> - <b><?php echo $hora[2] ?></b></span>
                                     <?php } ELSE { $color = 'red';?>
                                         <span style="color:<?php echo $color; ?>;cursor:pointer; "> - <b><?php echo $hora[2] ?></b></span>
                                     <?php } $color = '#3f3d3c'; };
                                    
                                    
                                        IF(!empty($hora[3]) || $hora[3]==='0'){ 
                                            IF($est[3] === '2') {$color = 'green';
                                    ?>
                                             <span onclick="cambiarEstadoCancelar('<?php echo $med->medId.'_4'; ?>')" style="color:<?php echo $color; ?>;cursor:pointer;text-decoration:line-through; "> - <b><?php echo $hora[3] ?></b></span>
                                     <?php } ELSEIF($est[3] === '1') { ?>
                                        <span onclick="cambiarEstado('<?php echo $med->medId.'_4'; ?>')" style="color:<?php echo $color; ?>;cursor:pointer; "> - <b><?php echo $hora[3] ?></b></span>
                                     <?php } ELSE { $color = 'red';?>
                                         <span style="color:<?php echo $color; ?>;cursor:pointer; "> - <b><?php echo $hora[3] ?></b></span>
                                     <?php } $color = '#3f3d3c'; };
                                    
                                    
                                        IF(!empty($hora[4]) || $hora[4]==='0'){ 
                                            IF($est[4] === '2') {$color = 'green';
                                    ?>
                                             <span onclick="cambiarEstadoCancelar('<?php echo $med->medId.'_5'; ?>')" style="color:<?php echo $color; ?>;cursor:pointer;text-decoration:line-through; "> - <b><?php echo $hora[4] ?></b></span>
                                     <?php } ELSEIF($est[4] === '1') { ?>
                                        <span onclick="cambiarEstado('<?php echo $med->medId.'_5'; ?>')" style="color:<?php echo $color; ?>;cursor:pointer; "> - <b><?php echo $hora[4] ?></b></span>
                                     <?php } ELSE { $color = 'red';?>
                                         <span style="color:<?php echo $color; ?>;cursor:pointer; "> - <b><?php echo $hora[4] ?></b></span>
                                     <?php } $color = '#3f3d3c'; };
                                    
                            
                            //echo $med->medHora ?></td>
                        </tr>
                        <?php }?>
                        
                        
                        
                        </tbody>
        </table>
    </div>
    
    <script>
        function cambiarEstado(id){
          var evoId = $( "#evoId" ).val();
                    $.ajax({
                    type: "GET",
                    url: "<?php echo base_url(); ?>" + "api/clinica/medicamento/"+id,
                    dataType: 'json',
                    success: function(data){
                        alert("Medicamento administrado");
                        location.href="<?php echo base_url(); ?>"+"clinica_enfermeria/fichas/cargarEvolucion/"+evoId;
                    }
                });
        }
         function cambiarEstadoCancelar(id){
          var evoId = $( "#evoId" ).val();
          var motivo = prompt("Ingrese Motivo");
          if(motivo != null && motivo !=""){
            var evoId = $( "#evoId" ).val();
                    $.ajax({
                    type: "GET",
                    url: "<?php echo base_url(); ?>" + "api/clinica/medicamento/"+id+'_'+motivo,
                    dataType: 'json',
                    success: function(data){
                        //alert("Medicamento administrado");
                        location.href="<?php echo base_url(); ?>"+"clinica_enfermeria/fichas/cargarEvolucion/"+evoId;
                    }
                    });
            }
        }
    </script>
<script>
    function redirect(id) {
        actualizar();
        location.href="<?php echo base_url(); ?>"+"clinica_enfermeria/medicamentos/cargarMedicamentoAsignar/"+id;
    }
    
    
</script>

<script>
    function actualizar(){
        var evoId = $( "#evoId" ).val();
        var habitacion = $( "#habitacion" ).val();
        var diaEstadia = $( "#diaEstadia" ).val();
        var evoDiagPsiquiatra = $( "#evoDiagPsiquiatra" ).val();
        var evoDiagMedico = $( "#evoDiagMedico" ).val();
        var peso = $( "#peso" ).val();
        var talla = $( "#talla" ).val();
        var evoPlan = $( "#evoPlan" ).val();
        var evoAvisar = $( "#evoAvisar" ).val();
        var evoExamenes = $( "#evoExamenes" ).val();
        var evoDia = $( "#evoDia" ).val();
        var evoNoche = $( "#evoNoche" ).val();
        
        var evoSueDia = $( "#evoSueDia" ).val();
        var evoSueNoche = $( "#evoSueNoche" ).val();
        var evoHidraDia = $( "#evoHidraDia" ).val();
        var evoHidraNoche = $( "#evoHidraNoche" ).val();
        var array = evoId+'_'+habitacion+'_'+diaEstadia+'_'+evoDiagPsiquiatra+'_'+evoDiagMedico+'_'+peso+'_'+talla+'_'+evoPlan+'_'+evoAvisar+'_'+evoExamenes+'_'+evoDia+'_'+evoNoche+'_'+evoSueDia+'_'+evoSueNoche+'_'+evoHidraDia+'_'+evoHidraNoche;
                
                //+'_'+fechaN+'_'+direccion+'_'+comuna+'_'+telFijo+'_'+telCelu+'_'+ocupacion+'_'+email+'_'+emergenciasDerivar+'_'+alergias+'_'+medicoAsignado+'_'+regimen+'_'+diagnostico+'_'+comentario+'_'+isapre+'_'+rutTitular+'_'+nombreOtroContacto+'_'+telUnoOtroContacto+'_'+telDosOtroContacto+'_'+parentescoOtroContacto+'_'+licNumero+'_'+licDesde+'_'+licDias;
                    
         $.ajax({
                    type: "POST",
                    url: "<?php echo base_url(); ?>" + "api/ingresos/guardarEvolucion/"+array,
                    dataType: 'json',

                    success: function(data){
                        return true;
                    }
                });
    }
</script>


