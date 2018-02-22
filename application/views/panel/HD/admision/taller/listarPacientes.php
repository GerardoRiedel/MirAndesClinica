
<div id="content" style="-webkit-box-shadow: -2px 2px 41px 2px rgba(0,0,0,0.75);
-moz-box-shadow: -2px 2px 41px 2px rgba(0,0,0,0.75);
box-shadow: -2px 2px 41px 2px rgba(0,0,0,0.75);z-index: 25 ">
    <div id="content-header" style="background-color: #e9c899; max-height: 10px !important" >
        <h1 style="background-color: #a15ebe !important;border:none;color:#ffffff; margin-right: 30px;-webkit-box-shadow: 10px 10px 23px -6px rgba(0,0,0,0.75);-moz-box-shadow: 10px 10px 23px -6px rgba(0,0,0,0.75);box-shadow: 10px 10px 23px -6px rgba(0,0,0,0.75);" class="alert alert-info"><?php echo $title;?></h1>
    </div>
    
    
    

    <div class="container-fluid">
        <div class="row">
            
                


            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 bhoechie-tab-container" >
                <?php $attributes = array('id' => 'formAsociar');
                        echo form_open('hd_admision/taller/asociarTaller',$attributes);
                    ?>
                <div class="col-lg-12"> <br></div>
                <div class="col-lg-1"></div>
                <div class="col-lg-2">
                        <label>Fecha de Taller</label>
                    </div>
                    <div class='col-lg-4'>
                        <div class="input-group input-group-sm date datepicker" required data-date="<?php //echo (new DateTime())->format('Y-m-d H:i:s') ?>" data-date-format="yyyy-mm-dd">
                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                            <input type="text" class="form-control" required placeholder="día-mes-año" style=" width: 158px !important" name="fecha" minlength="10" maxlength="10" title="Ingrese una fecha valida" >
                        </div>
                    </div> 
                    <div class="col-lg-12"> <br></div>
                    <div class="col-lg-1"></div>
                    <div class="col-lg-2">
                        <label>Taller</label>
                    </div>
                    <div class='col-lg-3'>
                        <select name="taller" id="taller">
                            <option value="0">Seleccione...</option>
                            <?php FOREACH($talleres as $tal){ ?>
                                <option value="<?php echo $tal->talId; ?>"><?php echo $tal->talDescripcion; ?></option>
                            <?php } ?>
                        </select>
                    </div> 
                    <div class="col-lg-2" style="margin-top:-25px;margin-left:-100px">
                        <?php echo form_submit('','Agregar','class="btn btn-primary btn-sm btnCetep"');?>
                        <?php echo form_close();?>
                    </div>    
                <br>
                <div class="col-lg-1"></div>
                
                
                <div class="col-lg-12"><hr></div>
                <div class="col-lg-9"></div>
                <div class="col-lg-3">
                    
                </div>
                
                <div class="col-xs-12"><br></div>
               
                <div class="col-lg-1"></div>
                <div class="col-lg-10" style="overflow:auto">
                <table  class='table table-bordered table-hover table-striped '>
                        <thead>
                            <tr>
                                <th style="width:110px">Run</th>
                                <th>Nombre</th>
                                
                                <?php 
                                    $colspan=0;
                                    FOREACH($asociaciones as $aso){ 
                                     $colspan = $colspan +1; 
                                    } ?>
                                <th colspan="<?php echo $colspan; ?> ">Taller</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td></td>
                                <td></td>
                                    <?php FOREACH($asociaciones as $aso){ ?>
                                <td>
                                    <?php echo $aso->asoFecha.'<br>'.$aso->talDescripcion; ?>
                                </td>
                                    <?php } ?>
                            </tr>
                                <?php foreach ($pacientes as $item) : ?>
                            <tr>
                                <?php //die(var_dump($item));?>
                                <td><?php if(!empty($item->rut)) echo formatearRut ($item->rut); ?></td>
                                <td><?php echo strtoupper($item->apellidoPaterno).' '.strtoupper($item->apellidoMaterno).' '.strtoupper($item->nombres); ?></td>
                                       
                                         <?php FOREACH($asociaciones as $aso){ ?>
                                <td onclick="cambiarEstado(<?php echo $item->id; ?>,<?php echo $aso->asoTaller; ?>,'<?php echo $aso->asoFecha; ?>')" >
                                    <?php 
                                    $obs = $est = '';
                                    FOREACH($asoPaciente as $as){ 
                                        IF($as->talAsoPaciente===$item->id && $as->talAsoTaller===$aso->asoTaller && $as->talAsoFecha===$aso->asoFecha ){
                                            $est = 1;
                                            IF(!empty($as->talAsoObservacion)){$obs = $obs.' '.$as->talAsoObservacion;}
                                        }
                                     } 
                                     IF(!empty($est))echo $est;
                                     IF(!empty($obs))echo ' - '.$obs;
                                     ?>
                                </td>
                                        <?php } ?>
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
                        echo form_open('hd_admision/taller/agregarPaciente',$attributes);
                    ?>
                        <label>Agregar Paciente:&nbsp;&nbsp;</label>
                    <select name="pacientes" style="width:350px">
                        <option value="0">Seleccione...</option>
                        <?php FOREACH($pacientesLista as $pac){ ?>
                        <option value="<?php echo $pac->pacId;?>"><?php echo strtoupper($pac->apellidoPaterno).' '.strtoupper($pac->apellidoMaterno).' '.strtoupper($pac->nombres);?></option>
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



 function getDiasHabiles($fechainicio, $fechafin, $diasferiados = array()) {
	// Convirtiendo en timestamp las fechas
        //die($fechafin.'fin');
      //      
	$fechainicio = strtotime($fechainicio);
                   $fechac= explode(' ', $fechafin);//die($fechafin[0].'fin');
	$fechafin = strtotime($fechac[0]);
	//die('inicio'.$fechainicio.'    fin'.$fechafin);
	// Incremento en 1 dia
	$diainc = 24*60*60;
	$diasferiados = array(
       //FORMATO Y-m-d   
        '1-1', // Año Nuevo (irrenunciable) 
        '30-3', // Viernes Santo (feriado religioso) 
        '31-3', // Sábado Santo (feriado religioso) 
        '1-5', // Día Nacional del Trabajo (irrenunciable) 
        '21-5', // Día de las Glorias Navales 
        '2-7', // San Pedro y San Pablo (feriado religioso) 
        '16-7', // Virgen del Carmen (feriado religioso) 
        '15-8', // Asunción de la Virgen (feriado religioso) 
        '17-9', // Dia Festivo De Prueba EN EL EJEMPLO <-----
        '18-9', // Dia Festivo De Prueba EN EL EJEMPLO <-----
        '19-9', // Dia Festivo De Prueba EN EL EJEMPLO <-----
        '15-10', // Aniversario del Descubrimiento de América 
        '2-11', // Día Nacional de las Iglesias Evangélicas y Protestantes (feriado religioso) 
        '1-11', // Día de Todos los Santos (feriado religioso) 
        '8-12', // Inmaculada Concepción de la Virgen (feriado religioso) 
       // '13-12', // elecciones presidencial y parlamentarias (puede que se traslade al domingo 13) 
        '25-12', // Natividad del Señor (feriado religioso) (irrenunciable) 
        );
	// Arreglo de dias habiles, inicianlizacion
	$diashabiles = array();
	$sumatoria=0;
	// Se recorre desde la fecha de inicio a la fecha fin, incrementando en 1 dia
	for ($midia = $fechainicio; $midia <= $fechafin; $midia += $diainc) {
		// Si el dia indicado, no es sabado o domingo es habil
		if (!in_array(date('N', $midia), array(5,6,7))) { 
			// Si no es un dia feriado entonces es habil
			if (!in_array(date('Y-m-d', $midia), $diasferiados)) {
                                //EL ARRAY MUESTRA EL DÍA
				array_push($diashabiles, date('Y-m-d', $midia));
                                $sumatoria += 1;
			}
		}
	}//die($sumatoria.'s');
	return $sumatoria;
    }
    
    
    ?>




    
<script src="<?php echo base_url(); ?>../assets/js/jquery.dataTables.js"></script>
<script src="<?php echo base_url(); ?>../assets/js/jquery.nicescroll.min.js"></script>
<script src="<?php echo base_url(); ?>../assets/js/hs.tables.js"></script>

<script>
       
        function cambiarEstado(pac,taller,fecha){
            var obs = prompt("Ingrese observación", "");
            if(obs===null)obs='';
            
                    $.ajax({
                    type: "GET",
                    url: "<?php echo base_url(); ?>" + "api/ingresosHD/asociacion/"+pac+"_"+taller+"_"+obs+"_"+fecha,
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

