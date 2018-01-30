<?php //error_reporting(E_ALL ^ E_NOTICE); ?>

<style>
    .titulo{
        color: #a15ebe;
    }
    
    .icon{
            width: 40%;
            padding-top: 5%;
            padding-left: 5%;
    }
    .iconCom{
            width: 35%;
            padding-top: 6%;
            margin-left: -69px;
    }
    
    select{
        max-width: 200px;
    }
    td{
        border:none;
    }
    

    
</style>
<div id="content" style="-webkit-box-shadow: -2px 2px 41px 2px rgba(0,0,0,0.75);
-moz-box-shadow: -2px 2px 41px 2px rgba(0,0,0,0.75);
box-shadow: -2px 2px 41px 2px rgba(0,0,0,0.75);z-index: 25 ">
    <div id="content-header" style="background-color: #e9c899; max-height: 10px !important" >
        <h1 style="background-color: #a15ebe !important;border:none;color:#ffffff; margin-right: 30px;-webkit-box-shadow: 10px 10px 23px -6px rgba(0,0,0,0.75);-moz-box-shadow: 10px 10px 23px -6px rgba(0,0,0,0.75);box-shadow: 10px 10px 23px -6px rgba(0,0,0,0.75);" class="alert alert-info"><?php echo $title;?></h1>
    </div>
    
    
    

    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12">
                

			
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 bhoechie-tab-container" style="border-color: #000000;"  >
            <?php $attributes = array('id' => 'form');
            //die(var_dump($datos[0]));
                echo form_open('clinica_admision/prefacturas/guardarPrefactura',$attributes);
            ?>
                            
            <div class='widget-content'>
                
                
                
                
                <div id="divFicha"><!--COMIENZO TRATAMIENTO DE FICHA-->
                    
                    
                    
                <input type="hidden" value="<?php echo $datos[0]->id;?>" name="fichaElectro">
                <input type="hidden" value="<?php echo $datos[0]->rut;?>" name="rut">
                <input type="hidden" value="<?php echo $datos[0]->nombres;?>" name="nombres">
                <input type="hidden" value="<?php echo $datos[0]->apellidoPaterno;?>" name="apellidoPaterno">
                <input type="hidden" value="<?php echo $datos[0]->apellidoMaterno;?>" name="apellidoMaterno">
                <input type="hidden" value="<?php echo $datos[0]->paciente;?>" name="pacId">
                <div class="col-lg-12" ><br></div>
                <!-- DATOS DE PERSONALES-->               
                    <div class="col-lg-12">
                    <label class="titulo">Datos Personales</label>
                    </div>
                    
                    <div class="col-lg-3">
                        <label>Rut Paciente: </label> <?php echo formatearRut($datos[0]->rut);?>
                    </div>
                    <div class="col-lg-5">
                        <label>Nombre: </label> <?php echo strtoupper($datos[0]->nombres).' '.strtoupper($datos[0]->apellidoPaterno).' '.strtoupper($datos[0]->apellidoMaterno); ?>
                    </div>
                <div class="col-lg-12" ></div>    
                    <div class="col-lg-3">
                        <label>Sexo: </label> <?php echo strtoupper($datos[0]->sexo); ?>
                    </div>
                    <div class="col-lg-3">
                        <label>Fecha de Nacimiento: </label> <?php IF(!empty($datos[0]->fechaNacimiento)){$date = new DateTime($datos[0]->fechaNacimiento);echo $date->format('d-m-Y');}  ?>
                    
                    </div>
                    <div class="col-lg-3">
                        <label>Edad: </label> <?php IF(!empty($datos[0]->fechaNacimiento))echo calculaedad($datos[0]->fechaNacimiento); ?>
                    </div>
                    <div class="col-lg-3">
                        <label>Nacionalidad: </label> <?php IF ($datos[0]->nacionalidad === '1') echo 'CHILENA';ELSEIF ($datos[0]->nacionalidad === '2') echo 'EXTRANJERA' ?>
                    </div>
                
                    <div class="col-lg-12" ></div>
           
                    <div class="col-lg-3">
                        <label>Dirección: </label> <?php IF(!empty($datos[0]->direccion))echo strtoupper($datos[0]->direccion); ?>
                    </div>
                    <div class="col-lg-3">
                        <label>Comuna: </label> <?php echo strtoupper($datos[0]->comuna);?>
                    </div>
                    <div class="col-lg-3">
                        <label>Teléfono Fijo: </label> <?php IF(!empty($datos[0]->telefono))echo $datos[0]->telefono; ?>
                    </div>
                    <div class="col-lg-3">
                        <label>Teléfono Movil: </label> <?php IF(!empty($datos[0]->celular))echo $datos[0]->celular; ?>
                    </div>
                    <div class="col-lg-3">
                        <label>Ocupación: </label> <?php IF(!empty($datos[0]->ocupacion))echo strtoupper($datos[0]->ocupacion); ?>
                    </div>
                    <div class="col-lg-4">
                        <label>Email: </label> <?php IF(!empty($datos[0]->email))echo strtoupper($datos[0]->email); ?>
                    </div>
                <div class="col-lg-12" ><hr style="height: 2px"></div>  
                
                
                <!-- DATOS DE LICENCIA-->  
                <div class="col-lg-12"></div>
                    <div class="col-lg-12">
                    <label class="titulo">Datos de Prefactura</label>
                    </div>
                    <div class="col-lg-2">
                        <label>Fecha Ingreso</label>
                    </div>
                    <div class='col-lg-4'>
                        <div class="input-group input-group-sm date datepicker" required data-date="<?php //echo (new DateTime())->format('Y-m-d H:i:s') ?>" data-date-format="dd-mm-yyyy">
                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                            <?php $date = new DateTime($datos[0]->fechaIngreso);?>
                            <input type="text" class="form-control datepicker" placeholder="día-mes-año" style=" width: 158px !important" name="fechaIngreso" required value="<?php IF(!empty($datos[0]->fechaIngreso))echo $date->format('d-m-Y');?>" data-date-format="dd-mm-yyyy" readonly>
                        </div>
                    </div>
                <!--
                    <div class="col-lg-2">
                        <label>Hora Ingreso</label>
                    </div>
                    <div class='col-lg-4'>
                        <input name="horaIngreso" type="timer" class="datetimepicker" style=" min-width: 190px;border:none" required value="<?php IF(!empty($datos[0]->horaIngreso))echo $datos[0]->horaIngreso;?>" readonly>
                    </div>
                -->
                <div class="col-lg-12"><br></div>
                    <div class="col-lg-2">
                        <label>Modalidad</label>
                    </div>
                    <div class='col-lg-4'>
                        <table style="border:none">
                            <tbody>
                            <tr>
                                <td style=" width: 30px; border:none" align="center"><input type="radio" name="ges" id="ges" value="1" checked="true"></td>
                                <td style=" width: 75px; border:none">Ges</td>
                                <td style=" width: 30px; border:none" align="center"><input type="radio" name="ges" id="libre" value="2"></td>
                                <td style=" width: 75px; border:none">Libre Elección</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-lg-2">
                        <label>N° Prefactura</label>
                    </div>
                    <div class='col-lg-4'>
                        <?php IF($datos[0]->ges==='1'){ ?>
                        <input type="text" name="prefactura" value="<?php IF(!empty($prefacturas[0]->preNPrefactura))echo $prefacturas[0]->preNPrefactura+1;?>">
                        <?php }ELSEIF($datos[0]->ges==='2'){ ?>
                        <input type="text" name="prefactura" placeholder="Ingrese valor solo si es distinto al correlativo">
                        <?php }?>
                    </div>
                    <div class="col-lg-12"></div>
                    <div class="col-lg-2">
                        <label>Cuidados Personales</label>
                    </div>
                    <div class='col-lg-4'>
                        <input type="text" name="preCuidados" placeholder="Valor Sin IVA" value="<?php IF(!empty($prefacturas[0]->preCuidados))echo $prefacturas[0]->preCuidados;?>">
                        <h7 style="font-size:9px" ><br>Ingrese el valor sin IVA</h7>
                        <br><br>
                    </div>
                    <div class="col-lg-2">
                        <label>Consulta Psiquiátrica</label>
                    </div>
                    <div class='col-lg-4'>
                        <input type="text" name="preHonorarios" placeholder="Incluir control de ingreso" value="<?php IF(!empty($prefacturas[0]->preHonorarios))echo $prefacturas[0]->preHonorarios;?>">
                        <h7 style="font-size:9px" ><br>Ingrese cantidad de controles médicos (incluyendo ingreso)</h7>
                        <br><br>
                    </div>
                    <div class="col-lg-12"></div>
                    <div class="col-lg-2">
                        <label>Periodo Desde</label>
                    </div>
                    <div class='col-lg-4'>
                        <div class="input-group input-group-sm date datepicker" required data-date="<?php //echo (new DateTime())->format('Y-m-d H:i:s') ?>" data-date-format="dd-mm-yyyy">
                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                            <?php $date = new DateTime($datos[0]->fechaIngreso);?>
                            <input type="text" class="form-control datepicker" placeholder="día-mes-año" style=" width: 158px !important" name="fechaDesde" required data-date-format="dd-mm-yyyy" value="<?php IF(!empty($datos[0]->fechaIngreso) && $datos[0]->fechaIngreso !== '0000-00-00')echo $date->format('d-m-Y');?>">
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <label>Periodo Hasta</label>
                    </div>
                    <div class='col-lg-4'>
                        <div class="input-group input-group-sm date datepicker" required data-date="<?php //echo (new DateTime())->format('Y-m-d H:i:s') ?>" data-date-format="dd-mm-yyyy">
                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                            <?php $date = new DateTime($datos[0]->fechaSalidaReal);?>
                            <input type="text" class="form-control datepicker" placeholder="día-mes-año" style=" width: 158px !important" name="fechaHasta" required <?php IF(!empty($datos[0]->fechaSalidaReal) && $datos[0]->fechaSalidaReal !== '0000-00-00')echo 'readonly' ?> data-date-format="dd-mm-yyyy" value="<?php IF(!empty($datos[0]->fechaSalidaReal) && $datos[0]->fechaSalidaReal !== '0000-00-00')echo $date->format('d-m-Y'); ELSE echo date('d-m-Y');?>">
                        </div>
                    </div>
                    <div class="col-lg-12"></div>
                    
                    
                    <div class="col-lg-12"><br></div>
</div><!-- FIN DIV FICHA COMPLETA-->
                    
<div class='col-lg-12'><br></div>
                    <div class="col-lg-12" align="center">
                        <button style="width:10%" onclick="goBack()" class="btn btn-default btn-sm btnVolver">Volver</button><script>function goBack(){window.history.go(-1);}</script>
                    
                        <?php echo form_submit('','Generar','class="btn btn-primary btn-sm btnCetep"');?>
                        <?php echo form_close();?>
                        </div>
                    <div class="col-lg-12" ><br></div>    
                <div class="col-lg-12" style=" overflow-x: auto">
                    <table class='table table-bordered table-hover table-striped data-table'>
                <thead>
                    <th>N°</th>
                    <th>FECHA INGRESO</th>
                    <th>MODALIDAD</th>
                    <th>PERIODO DESDE</th>
                    <th>PERIODO HASTA</th>
                    <th>DÍAS</th>
                    <th>VALOR DÍA</th>
                    <!--
                    <th>TOTAL MIRANDES</th>
                    -->
                    <th>DÍAS CAMA</th>
                    <th>PREFACTURA</th>
                    <th>ELIMINAR</th>
                </thead>
                <tbody>
            <?php FOREACH ($prefacturas as $pre){;?>
                <tr>
                    <td><?php echo $pre->preNPrefactura;?></td>
                    <td align="center"><?php $date = new DateTime($datos[0]->fechaIngreso);echo $date->format('d-m-Y');?></td>
                    <td><?php IF ($pre->preGes === '1')echo 'GES'; ELSE echo 'LE'?></td>
                    <td align="center"><?php $dateD = new DateTime($pre->preDesde);echo $dateD->format('d-m-Y');?></td>
                    <td align="center"><?php $dateH = new DateTime($pre->preHasta);echo $dateH->format('d-m-Y');?></td>
                    
                        <?php $CantidadDiasHabiles = $pre->preMirandesDias;?>
                    
                    <td><?php echo $CantidadDiasHabiles.' días';?></td>
                    <td><?php echo $pre->preValor;?></td>
                    <!--
                    <td><?php echo $CantidadDiasHabiles*$pre->preValor ;?></td>
                    -->
                    <td align="center">
                        <?php IF($pre->preGes === '2') {?> 
                        <a class="tip-bottom" title="Cargar Días Cama" style="color:green" href="<?php echo base_url("clinica_admision/impresiones/exportarDiaCama/" . $pre->preId )?>"><i class="fa fa-table" aria-hidden="true"></i></a>
                        <?php } ?>
                    </td>    
                    <td align="center">
                        <!--
                        <a class="tip-bottom" title="Cargar Prefacturas" style="color:green" href="<?php echo base_url("clinica_admision/impresiones/imprimirImprimirPrefactura/" . $pre->preId )?>"><i class="fa fa-clipboard" aria-hidden="true"></i></a>
                        &nbsp;&nbsp;
                        -->
                        
                        <a class="tip-bottom" title="Cargar Prefacturas" style="color:green" href="<?php echo base_url("clinica_admision/impresiones/exportarPrefactura/" . $pre->preId )?>"><i class="fa fa-table" title="Exportar Prefactura"></i>  </a>
                        
                         </td>    
                    <td align="center">
                        <a class="tip-bottom" title="Eliminar Prefactura" href="<?php echo base_url("clinica_admision/prefacturas/eliminarPrefactura/".$pre->preId )?>"><i class="fa fa-trash" aria-hidden="true" style="cursor: pointer; color:red;font-size:18px" ></i></a>
                                    
                        
                        
                        <!--
                        <a class="tip-bottom" title="Imprimir solicitud" href="<?php echo base_url("hd_admision/impresiones/imprimirPrefactura/".$pre->preId )?>"><i class="fa fa-print" aria-hidden="true"></i></a>&nbsp;&nbsp;
                        
                        <i class="fa fa-table btnExport" style="cursor: pointer; color:#1d7044;font-size:18px" title="Exportar Prefacturas a Excel"></i>  
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        <a class="tip-bottom" title="Eliminar Prefactura" href="<?php echo base_url("hd_admision/prefacturas/eliminarPrefactura/".$pre->preId )?>"><i class="fa fa-trash" aria-hidden="true" style="cursor: pointer; color:red;font-size:18px" ></i></a>
                        -->
                    </td>
                </tr>
            <?php };?>
                </tbody>
            </table>
                </div>
</div><!-- FIN DIV FICHA COMPLETA-->
                <div class="col-lg-12" ><hr></div>
                
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
function calculaedad($fecha){
            $date2  = date('Y-m-d');//
            $diff   = abs(strtotime($date2) - strtotime($fecha));
            $years  = floor($diff / (365*60*60*24));
            //$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
            //$days   = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
            return $years;
}


/**
 * Metodo getDiasHabiles
 * 
 * Permite devolver un arreglo con los dias habiles
 * entre el rango de fechas dado excluyendo los
 * dias feriados dados (Si existen)
 * 
 * @param string $fechainicio Fecha de inicio en formato Y-m-d
 * @param string $fechafin Fecha de fin en formato Y-m-d
 * @param array $diasferiados Arreglo de dias feriados en formato Y-m-d
 * @return array $diashabiles Arreglo definitivo de dias habiles
 */
function getDiasHabiles($fechainicio, $fechafin, $diasferiados = array()) {
	// Convirtiendo en timestamp las fechas
	$fechainicio = strtotime($fechainicio);
	$fechafin = strtotime($fechafin);
	
	// Incremento en 1 dia
	$diainc = 24*60*60;
	$diasferiados = array(
       //FORMATO Y-m-d   
        '2018-01-01', // Año Nuevo (irrenunciable) 
        '2017-04-14', // Viernes Santo (feriado religioso) 
        '2017-04-19', // Censo
        '2017-05-01', // Día Nacional del Trabajo (irrenunciable) 
        '2017-05-21', // Día de las Glorias Navales 
        '2017-06-26', // San Pedro y San Pablo (feriado religioso) 
        '2017-07-16', // Virgen del Carmen (feriado religioso) 
        '2017-08-15', // Asunción de la Virgen (feriado religioso) 
        '19-9', // Dia Festivo De Prueba EN EL EJEMPLO <-----
        '12-10', // Aniversario del Descubrimiento de América 
        '31-10', // Día Nacional de las Iglesias Evangélicas y Protestantes (feriado religioso) 
        '1-11', // Día de Todos los Santos (feriado religioso) 
        '8-12', // Inmaculada Concepción de la Virgen (feriado religioso) 
        '13-12', // elecciones presidencial y parlamentarias (puede que se traslade al domingo 13) 
        '25-12', // Natividad del Señor (feriado religioso) (irrenunciable) 
        );
	// Arreglo de dias habiles, inicianlizacion
	$diashabiles = array();
	$sumatoria=0;
	// Se recorre desde la fecha de inicio a la fecha fin, incrementando en 1 dia
	for ($midia = $fechainicio; $midia <= $fechafin; $midia += $diainc) {
		// Si el dia indicado, no es sabado o domingo es habil
		if (!in_array(date('N', $midia), array(6,7))) { 
			// Si no es un dia feriado entonces es habil
			if (!in_array(date('Y-m-d', $midia), $diasferiados)) {
                                //EL ARRAY MUESTRA EL DÍA
				array_push($diashabiles, date('Y-m-d', $midia));
                                $sumatoria += 1;
			}
		}
	}
	return $sumatoria;
}
?>


<script>
    
    
    
    //$("#divFicha").hide(); 
    //$("#divFichaApoderado").hide(); 
    //$("#divFichaEconomico").hide();
    $(".icon").hide();
    $(".iconCom").hide();
    var rut = $( "#rut" ).val();var rutApo = $( "#rutApo" ).val();var rutEco = $( "#rutApoEco" ).val();
    if (rut===''){
        $("#rut").attr("disabled", false).css("box-shadow","0 0 15px red");
    }
    if (rutApo===''){
    $("#rutApo").attr("disabled", false).css("box-shadow","0 0 15px red");
    }
    if (rutEco===''){
    $("#rutApoEco").attr("disabled", false).css("box-shadow","0 0 15px red");
    }
    
</script>
<script type="text/javascript">
    function goBack()
    {
        window.history.go(-1);
    }
</script>
<script>
    $("#form").submit(function () {  
    $(".icon").hide();
    $(".iconCom").hide();
    if($("#banco").val()==0) {  
        $("#iconBanco").show();
        //alert("Banco Requerido");  
        return false;
    } 
    if($("#tipoCta").val()==0) {  
        $("#iconTipo").show();
        //alert("Cta Requerido");  
        return false;
    }
    if($("#comuna").val()==0) {  
        $("#iconComPas").show();
        //alert("Cta Requerido");  
        return false;
    }
    if($("#comunaApo").val()==0) {  
        $("#iconComApo").show();
        //alert("Cta Requerido");  
        return false;
    }
    if($("#comunaApoEco").val()==0) {  
        $("#iconComEco").show();
        //alert("Cta Requerido");  
        return false;
    }
    if($("#isapre").val()==0) {  
        $("#iconIsapre").show();
        //alert("Cta Requerido");  
        return false;
    }
    
});  
</script>
<script>
        
        $("#rutApo").focusout(function(){
        ////LIMPIAR INPUTS
        document.getElementById("nombresApo").value = ""; document.getElementById("apePatApo").value = ""; document.getElementById("telFijoApo").value = ""; document.getElementById("telCeluApo").value = ""; document.getElementById("direccionApo").value = ""; document.getElementById("emailApo").value = ""; document.getElementById("rutApoEco").value = "";
        $("#rutApoEco").attr("disabled", false).css("border-color","#ccc");
        $("#rutApo").attr("disabled", false).css("box-shadow","0 0 0px");//SACAR ROJO CONTORNO
        $("#divFichaApoderado").show();  
        var rut = $( "#rutApo" ).val();
        var rut = rut.replace(".", "");var rut = rut.replace("-", "");var rut = rut.replace(",", ""); var rut = rut.replace(".", "");
        var rut = rut.substring(0, 8);
       
        $.ajax({
            type: "GET",
            url: "<?php echo base_url(); ?>" + "api/ingresos/index/"+rut,
            dataType: 'json',
            
            success: function(data){
                
                if (data.nombres != undefined){document.getElementById("nombresApo").value          = data.nombres;}
                if (data.apellidoPaterno != undefined){document.getElementById("apePatApo").value   = data.apellidoPaterno;}
                if (data.apellidoMaterno != undefined){document.getElementById("apeMatApo").value   = data.apellidoMaterno;}
                if (data.telefono != undefined){document.getElementById("telFijoApo").value         = data.telefono;}
                if (data.celular != undefined){document.getElementById("telCeluApo").value          = data.celular;}
                if (data.direccion != undefined){document.getElementById("direccionApo").value      = data.direccion;}
                if (data.email != undefined){document.getElementById("emailApo").value              = data.email;}
                if (data.rut != undefined && data.rut != '0'){document.getElementById("rutApoEco").value               = data.rut;}
               }
        })
        })
        
        $("#rutApoEco").focusout(function(){
        ////LIMPIAR INPUTS
        document.getElementById("nombresApoEco").value = ""; document.getElementById("apePatApoEco").value = ""; document.getElementById("telFijoApoEco").value = ""; document.getElementById("telCeluApoEco").value = ""; document.getElementById("direccionApoEco").value = ""; document.getElementById("emailApoEco").value = "";
        //$("#rutEco").attr("disabled", false).css("border-color","#ccc");
        $("#rutApoEco").attr("disabled", false).css("box-shadow","0 0 0px");//SACAR ROJO CONTORNO
        $("#divFichaEconomico").show();  
        var rut = $( "#rutApoEco" ).val();
        var rut = rut.replace(".", "");var rut = rut.replace("-", "");var rut = rut.replace(",", ""); var rut = rut.replace(".", "");
        var rut = rut.substring(0, 8);
       
        $.ajax({
            type: "GET",
            url: "<?php echo base_url(); ?>" + "api/ingresos/index/"+rut,
            dataType: 'json',
            
            success: function(data){
                
                if (data.nombres != undefined){document.getElementById("nombresApoEco").value           = data.nombres;}
                if (data.apellidoPaterno != undefined){document.getElementById("apePatApoEco").value    = data.apellidoPaterno;}
                if (data.apellidoMaterno != undefined){document.getElementById("apeMatApoEco").value    = data.apellidoMaterno;}
                if (data.telefono != undefined){document.getElementById("telFijoApoEco").value          = data.telefono;}
                if (data.celular != undefined){document.getElementById("telCeluApoEco").value           = data.celular;}
                if (data.direccion != undefined){document.getElementById("direccionApoEco").value       = data.direccion;}
                if (data.email != undefined){document.getElementById("emailApoEco").value               = data.email;}
            }
        })
        })
        
        $("#rutDev").focusout(function(){
        ////LIMPIAR INPUTS
        document.getElementById("emailDev").value = ""; document.getElementById("nombresDev").value = ""; document.getElementById("apePatDev").value = "";
        //$("#rutEco").attr("disabled", true).css("background-color","transparent");
        var rut = $( "#rutDev" ).val();
        var rut = rut.replace(".", "");var rut = rut.replace("-", "");var rut = rut.replace(",", ""); var rut = rut.replace(".", "");
        var rut = rut.substring(0, 8);
       
        $.ajax({
            type: "GET",
            url: "<?php echo base_url(); ?>" + "api/ingresos/index/"+rut,
            dataType: 'json',
            
            success: function(data){
                
                //AUTOCOMPLETA CAMPOS DEVOLUCIONES
                if (data.email != undefined){document.getElementById("emailDev").value              = data.email;}
                if (data.nombres != undefined){document.getElementById("nombresDev").value          = data.nombres;}
                if (data.apellidoPaterno != undefined){document.getElementById("apePatDev").value   = data.apellidoPaterno;}
                if (data.apellidoMaterno != undefined){document.getElementById("apeMatDev").value   = data.apellidoMaterno;}
                if (data.ctaNumero != undefined){document.getElementById("NCta").value              = data.ctaNumero;}
               }
        })
        })
        
    

</script>    
<script>
    $("#divApo").click(function(){
        
        $("#divFichaApoderado").show();  
    })
    $("#divEco").click(function(){
        $("#divFichaEconomico").show();  
    })
</script>
<script>
    //////VALIDACIONES DE TECLAS//////
        $("#rut").keyup(function (event){
		var tecla = (document.all) ? event.keyCode : event.which;
                //alert(tecla);
		if(tecla == 8 || tecla == 46){
                    document.getElementById("rut").value = "";
		}
	});
        $("#rutApo").keyup(function (event){
		var tecla = (document.all) ? event.keyCode : event.which;
                //alert(tecla);
		if(tecla == 8 || tecla == 46){
                    document.getElementById("rutApo").value = "";
		}
	});
        $("#rutApoEco").keyup(function (event){
		var tecla = (document.all) ? event.keyCode : event.which;
                //alert(tecla);
		if(tecla == 8 || tecla == 46){
                    document.getElementById("rutApoEco").value = "";
		}
	});
        $("#rutTitular").keyup(function (event){
		var tecla = (document.all) ? event.keyCode : event.which;
                //alert(tecla);
		if(tecla == 8 || tecla == 46){
                    document.getElementById("rutTitular").value = "";
		}
	});
        $("#telFijo").keydown(function (e) {
            if (event.keyCode > 95 && event.keyCode < 106 || event.keyCode == 27 || event.keyCode == 8 || event.keyCode == 9 || event.keyCode > 47 && event.keyCode < 58)
            {}
            else {alert('Ingrese un telefono valido');event.returnValue = false;}
        });
        $("#telCelu").keydown(function (e) {
            if (event.keyCode > 95 && event.keyCode < 106 || event.keyCode == 27 || event.keyCode == 8 || event.keyCode == 9 || event.keyCode > 47 && event.keyCode < 58)
            {}
            else {alert('Ingrese un telefono valido');event.returnValue = false;}
        });
        $("#telFijoApo").keydown(function (e) {
            if (event.keyCode > 95 && event.keyCode < 106 || event.keyCode == 27 || event.keyCode == 8 || event.keyCode == 9 || event.keyCode > 47 && event.keyCode < 58)
            {}
            else alert('Ingrese un telefono valido');{event.returnValue = false;}
        });
        $("#telCeluApo").keydown(function (e) {
            if (event.keyCode > 95 && event.keyCode < 106 || event.keyCode == 27 || event.keyCode == 8 || event.keyCode == 9 || event.keyCode > 47 && event.keyCode < 58)
            {}
            else {alert('Ingrese un telefono valido');event.returnValue = false;}
        });
        $("#nombres").keydown(function (e) {
            if (event.keyCode > 95 && event.keyCode < 106 || event.keyCode > 47 && event.keyCode < 58)
            {alert('Ingrese un nombre valido');event.returnValue = false;}
        });
        $("#apeMat").keydown(function (e) {
            if (event.keyCode > 95 && event.keyCode < 106 || event.keyCode > 47 && event.keyCode < 58)
            {alert('Ingrese un apellido valido');event.returnValue = false;}
        });
        $("#apePat").keydown(function (e) {
            if (event.keyCode > 95 && event.keyCode < 106 || event.keyCode > 47 && event.keyCode < 58)
            {alert('Ingrese un apellido valido');event.returnValue = false;}
        });
        $("#nombresApo").keydown(function (e) {
            if (event.keyCode > 95 && event.keyCode < 106 || event.keyCode > 47 && event.keyCode < 58)
            {alert('Ingrese un nombre valido');event.returnValue = false;}
        });
        $("#apeMatApo").keydown(function (e) {
            if (event.keyCode > 95 && event.keyCode < 106 || event.keyCode > 47 && event.keyCode < 58)
            {alert('Ingrese un apellido valido');event.returnValue = false;}
        });
        $("#apePatApo").keydown(function (e) {
            if (event.keyCode > 95 && event.keyCode < 106 || event.keyCode > 47 && event.keyCode < 58)
            {alert('Ingrese un apellido valido');event.returnValue = false;}
        });

</script>




<div id="exportar" style="display: none">
<style>
    .fucsia {color: #B404AE;}
    table {
        font-family: arial;
        border-collapse:separate;
        border:solid black 1px;
        border-radius:6px;
        -moz-border-radius:6px;
    }
    td{
        border-left:solid black 1px;
        border-top:solid black 1px;
    }
    td:first-child, th:first-child {
        border-left: none;
    }
    
</style>
<?php FOREACH($prefacturas as $pref):?>

<div>
            <div class="col-lg-12" align="left" style="margin-left: 40px">
                <img src="<?php echo base_url();?>../assets/img/mirAndes.png" class="logo">
            </div>
        <blockquote>
            
            <div style="margin-top:-40px" align="center">
                <h1 class="fucsia" >PREFACTURA</h1>
            </div>
            <div style="margin-top:-80px;margin-right: 0px" align="right">
                <table>
                    <tr>
                        <td style="border:none">N de Folio: </td>
                        <td style="border:none" align="right"><?php IF(!empty($pref->preFolio) && $pref->preFolio!=='0')echo $pref->preFolio;?></td>
                    </tr>
                    <tr>
                        <td style="border:none"></td>
                        <td>N° <?php IF(!empty($pref->preNPrefactura))echo $pref->preNPrefactura.'/'.date('y');?></td>
                    </tr>
                </table>
            </div>
            <br><br>
            
            <div>
                <table style="font-size:13px !important;width: 670px">
                    <tr>
                        <td colspan="2" style="border-top:none" align="center"><b>PRESTADOR</b></td>
                    </tr>
                    <tr>
                        <td style="border-right:none;width:80px">Centro:</td>
                        <td style="border-left:none" align="center">Centro de Atencion Medico Psiquiatrica Integral SPA</td>
                    </tr>
                    <tr>
                        <td style="border-right:none">RUT:</td>
                        <td style="border-left:none" align="center">76.262.968 - 2</td>
                    </tr>
                </table>
            </div>
            
            <br><br>
            
            <div>
                <table style="font-size:13px !important;width: 670px">
                    <tr>
                        <td colspan="2" style="border-top:none" align="center"><b>USUARIO/A BENEFICIARIO/A</b></td>
                    </tr>
                    <tr>
                        <td style="border-right:none;width:150px">Apellido Paterno:</td>
                        <td style="border-left:none"><?php echo ' '.strtoupper($datos[0]->apellidoPaterno);?></td>
                    </tr>
                    <tr>
                        <td style="border-right:none">Apellido Materno:</td>
                        <td style="border-left:none"><?php echo ' '.strtoupper($datos[0]->apellidoMaterno);?></td>
                    </tr>
                    <tr>
                        <td style="border-right:none">Nombres:</td>
                        <td style="border-left:none"><?php echo ' '.strtoupper($datos[0]->nombres);?></td>
                    </tr>
                    <tr>
                        <td style="border-right:none">RUT:</td>
                        <td style="border-left:none"><?php echo ' '. formatearRut($datos[0]->rut);?></td>
                    </tr>
                </table>
            </div>
            
            <br><br>
            
            <div>
                <table style="font-size:13px !important;width: 670px">
                    <tr>
                        <td colspan="2" style="border-top:none" align="center"><b>AFILIADO A ISAPRE/COTIZANTE</b></td>
                    </tr>
                    <tr>
                        <td style="border-right:none;width:150px"><b>ISAPRE:</b></td>
                        <td style="border-left:none"><?php echo ' '.strtoupper($datos[0]->isapreNombre);?></td>
                    </tr>
                    <tr>
                        <td style="border-right:none;width:150px">Apellido Paterno:</td>
                        <td style="border-left:none"><?php echo ' '.strtoupper($datos[0]->apePatTitular);?></td>
                    </tr>
                    <tr>
                        <td style="border-right:none">Apellido Materno:</td>
                        <td style="border-left:none"><?php echo ' '.strtoupper($datos[0]->apeMatTitular);?></td>
                    </tr>
                    <tr>
                        <td style="border-right:none">Nombres:</td>
                        <td style="border-left:none"><?php echo ' '.strtoupper($datos[0]->nombreTitular);?></td>
                    </tr>
                    <tr>
                        <td style="border-right:none">RUT:</td>
                        <td style="border-left:none"><?php IF(!empty($datos[0]->rutTitular)) echo ' '. formatearRut($datos[0]->rutTitular);?></td>
                    </tr>
                </table>
            </div>
            <br><br>
            
            <div>
                <table style="font-size:13px !important;width: 670px">
                    <tr>
                        <td colspan="2" style="border-top:none" align="center"><b>PERIODO DE TRATAMIENTO</b></td>
                    </tr>
                    
                    <tr>
                        <td style="border-right:none;width:150px">Ingreso a Programa:</td>
                        <td style="border-left:none"><?php $fecha = new DateTime($datos[0]->fechaIngreso);echo $fecha->format('d-m-Y');?></td>
                    </tr>
                    <tr>
                        <td style="border-right:none">Periodo a Facturar:</td>
                        <td style="border-left:none"><?php $fechaD = new DateTime($pref->preDesde);$fechaH = new DateTime($pref->preHasta);echo $fechaD->format('d-m-Y').' al '.$fechaH->format('d-m-Y'); ?></td>
                    </tr>
                </table>
            </div>
            <br><br>
            <div>
                <table style="font-size:13px !important;width: 670px">
                    <tr>
                        <td colspan="2" style="border-top:none" align="center"><b>DETALLE DE FACTURACION</b></td>
                    </tr>
                    <tr>
                        <td style="border-right:none;width:150px">N de Dias MirAndes:</td>
                        
                            <td style="border-left:none; font-size:15px" align="center">
                                <?php //$interval = $fechaD->diff($fechaH);
                                $CantidadDiasHabiles = getDiasHabiles($fechaD->format('Y-m-d'),$fechaH->format('Y-m-d')); 
                                echo $CantidadDiasHabiles.' días';
                                ?>
                            </td>
                        
                    </tr>
                    <tr>
                        <td style="border-right:none">Valor Dia MirAndes:</td>
                        <td style="border-left:none; font-size:15px" align="center"><?php echo '$ '.$pref->preValor;?></td>
                    </tr>
                    <tr>
                        <td style="border-right:none"><b>Total MirAndes:</b></td>
                        <td style="border-left:none; font-size:15px" align="center"><b><?php echo '$ '.$CantidadDiasHabiles*$pref->preValor ;?></b></td>
                    </tr>
                    
                </table>
            </div>
            <br><br>
            <div>
                <table style="font-size:13px !important;width: 670px;border:2px solid black">
                    <tr>
                        <td style="border-top:none; width:150px; font-size:15px" align="center"><b>Total Facturacion<br>Centro RH MirAndes</b></td>
                        <td style="border-top:none; font-size:17px" align="center"><b><?php $total=($CantidadDiasHabiles*$pref->preValor);  echo '$ '.$total;?></b></td>
                    </tr>
                </table>
            </div>
            <br><br>
            <div>
                <table style="font-size:13px !important;width: 670px;border:2px solid black">
                    <tr>
                        <td style="border-top:none;width:150px; font-size:15px" align="center"><b>FECHA FACTURACION:</b></td>
                        <td style="border-top:none; font-size:15px" align="center"><?php $fecha = new DateTime($pref->preFechaRegistro);echo $fecha->format('d-m-Y') ;?></td>
                    </tr>
                </table>
            </div>
            <br>
            <div>
                
            </div>
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
        </blockquote>
</div>



<!--div style="page-break-after: always;border:2px solid black" >
    
            <div style="margin-top:-80px;margin-right: 0px" align="right">
                <table style="border:none">
                    <tr>
                        <td rowspan="2" style="border:none"><img style=" width: 50px" src="<?php echo base_url();?>../assets/img/mirAndes.png" class="logo"></td>
                        <td align="right" style="border:none;border-right: 1px solid black">N de Folio: <?php echo $pref->preFolio;?></td>
                    </tr>
                    <tr>
                        
                        <td align="right" style="border:none;border-right: 1px solid black">N <?php IF(!empty($datos[0]->fichaRH))echo $datos[0]->fichaRH.'/'.$pref->prePrefactura;?></td>
                    </tr>
                    <tr>
                        <td style="border:none"></td>
                        <td style="border:none"><h3>PREFACTURA</h3></td>
                    </tr>
                </table>
            </div>
    <br><br>
            
            <div>
                <table style="font-size:13px !important;width: 670px">
                    <tr>
                        <td colspan="2" style="border-top:none" align="center"><b>PRESTADOR</b></td>
                    </tr>
                    <tr>
                        <td style="border-right:none;width:80px">Centro:</td>
                        <td style="border-left:none" align="center">Centro de Atencion Medico Psiquiatrica Integral SPA</td>
                    </tr>
                    <tr>
                        <td style="border-right:none">RUT:</td>
                        <td style="border-left:none" align="center">76.262.968 - 2</td>
                    </tr>
                </table>
            </div>
            
            <br>
            
            <div>
                <table style="font-size:13px !important;width: 670px">
                    <tr>
                        <td colspan="2" style="border-top:none" align="center"><b>USUARIO/A BENEFICIARIO/A</b></td>
                    </tr>
                    <tr>
                        <td style="border-right:none;width:150px">Apellido Paterno:</td>
                        <td style="border-left:none"><?php echo ' '.strtoupper($datos[0]->apellidoPaterno);?></td>
                    </tr>
                    <tr>
                        <td style="border-right:none">Apellido Materno:</td>
                        <td style="border-left:none"><?php echo ' '.strtoupper($datos[0]->apellidoMaterno);?></td>
                    </tr>
                    <tr>
                        <td style="border-right:none">Nombres:</td>
                        <td style="border-left:none"><?php echo ' '.strtoupper($datos[0]->nombres);?></td>
                    </tr>
                    <tr>
                        <td style="border-right:none">RUT:</td>
                        <td style="border-left:none"><?php echo ' '.  formatearRut($datos[0]->rut);?></td>
                    </tr>
                </table>
            </div>
            
            <br>
            
            <div>
                <table style="font-size:13px !important;width: 670px">
                    <tr>
                        <td colspan="2" style="border-top:none" align="center"><b>AFILIADO A ISAPRE / COTIZANTE</b></td>
                    </tr>
                    <tr>
                        <td style="border-right:none;width:150px"><b>ISAPRE:</b></td>
                        <td style="border-left:none"><?php echo ' '.strtoupper($datos[0]->isapreNombre);?></td>
                    </tr>
                    <tr>
                        <td style="border-right:none;width:150px">Apellido Paterno:</td>
                        <td style="border-left:none"><?php echo ' '.strtoupper($datos[0]->apePatTitular);?></td>
                    </tr>
                    <tr>
                        <td style="border-right:none">Apellido Materno:</td>
                        <td style="border-left:none"><?php echo ' '.strtoupper($datos[0]->apeMatTitular);?></td>
                    </tr>
                    <tr>
                        <td style="border-right:none">Nombres:</td>
                        <td style="border-left:none"><?php echo ' '.strtoupper($datos[0]->nombreTitular);?></td>
                    </tr>
                    <tr>
                        <td style="border-right:none">RUT:</td>
                        <td style="border-left:none"><?php echo ' '.  formatearRut($datos[0]->rutTitular);?></td>
                    </tr>
                </table>
            </div>
            <br>
            
            <div>
                <table style="font-size:13px !important;width: 670px">
                    <tr>
                        <td colspan="2" style="border-top:none" align="center"><b>PERIODO DE TRATAMIENTO</b></td>
                    </tr>
                    <tr>
                       </tr>
                    <tr>
                        <td style="border-right:none;width:150px">Ingreso a Programa:</td>
                        <td style="border-left:none"><?php $fecha = new DateTime($datos[0]->fechaIngreso);echo $fecha->format('d-m-Y');?></td>
                    </tr>
                    <tr>
                        <td style="border-right:none">Periodo a Facturar:</td>
                        <td style="border-left:none"><?php $fechaD = new DateTime($pref->preDesde);$fechaH = new DateTime($pref->preHasta);echo $fechaD->format('d-m-Y').' al '.$fechaH->format('d-m-Y'); ?></td>
                    </tr>
                </table>
            </div>
            <br>
            <div>
                <table style="font-size:13px !important;width: 670px">
                    <tr>
                        <td colspan="2" style="border-top:none" align="center"><b>DETALLE DE FACTURACION</b></td>
                    </tr>
                    <tr>
                        <td style="border-right:none;width:150px">N de Dias MirAndes:</td>
                        <td style="border-left:none; font-size:15px" align="center"><?php $interval = $fechaD->diff($fechaH);echo $interval->format('%a dias');?></td>
                    </tr>
                    <tr>
                        <td style="border-right:none">Valor Dia MirAndes:</td>
                        <td style="border-left:none; font-size:15px" align="center"><?php echo '$ '.$pref->preValor;?></td>
                    </tr>
                    <tr>
                        <td style="border-right:none"><b>Total MirAndes:</b></td>
                        <td style="border-left:none; font-size:15px" align="center"><b><?php echo '$ '.$interval->format('%a')*$pref->preValor ;?></b></td>
                    </tr>
                    <tr>
                        <td style="border-right:none">N de Dias NEXOS:</td>
                        <td style="border-left:none; font-size:15px" align="center"><?php echo $pref->preNexosDias.' dias' ;?></td>
                    </tr>
                    <tr>
                        <td style="border-right:none">Valor Dia NEXOS:</td>
                        <td style="border-left:none; font-size:15px" align="center"><?php echo '$ '.$pref->preNexosValor;?></td>
                    </tr>
                    <tr>
                        <td style="border-right:none"><b>Total NEXOS:</b></td>
                        <td style="border-left:none; font-size:15px" align="center"><b><?php echo '$ '.$pref->preNexosValor*$pref->preNexosDias ;?></b></td>
                    </tr>
                </table>
            </div>
            <br>
            <div>
                <table style="font-size:13px !important;width: 670px;border:2px solid black">
                    <tr>
                        <td style="border-top:none;width:150px; font-size:15px" align="center"><b>Total Facturacion<br>Centro RH MirAndes</b></td>
                        <td style="border-top:none; font-size:17px" align="center"><b><?php $total=($interval->format('%a')*$pref->preValor) + ($pref->preNexosValor*$pref->preNexosDias) ;  echo '$ '.$total;?></b></td>
                    </tr>
                </table>
            </div>
            <br>
            <div>
                <table style="font-size:13px !important;width: 670px;border:2px solid black">
                    <tr>
                        <td style="border-top:none;width:150px; font-size:15px" align="center"><b>FECHA FACTURACION:</b></td>
                        <td style="border-top:none; font-size:15px" align="center"><?php $fecha = new DateTime($pref->preFechaRegistro);echo $fecha->format('d-m-Y') ;?></td>
                    </tr>
                </table>
            </div><br>
            <div>
                
            </div>
            
</div-->
<br><br><br>
<?php ENDFOREACH;?>
</div>
<script>
    $(".btnExport").click(function(e) {

        //Creamos un Elemento Temporal en forma de enlace
        var tmpElemento = document.createElement('a');
        // obtenemos la informaciÃ³n desde el div que lo contiene en el html
        // Obtenemos la informaciÃ³n de la tabla
        var data_type = 'data:application/vnd.ms-excel';
        var tabla_div = document.getElementById('exportar');
        var tabla_html = tabla_div.outerHTML.replace(/ /g, '%20');
        tmpElemento.href = data_type + ', ' + tabla_html;
        //Asignamos el nombre a nuestro EXCEL
        tmpElemento.download = 'Prefacturas.xls';
        // Simulamos el click al elemento creado para descargarlo
        tmpElemento.click();

        //var htmltable= document.getElementById('imprimir');
        //var html = htmltable.outerHTML;
        //window.open('data:application/vnd.ms-excel,' + encodeURIComponent(html));
    });

</script>



