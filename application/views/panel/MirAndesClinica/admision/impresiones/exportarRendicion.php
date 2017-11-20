



<div id="exportar" style="display: none">
    <div align="center"><b>RENDICION DE MOVIMIENTO DE CAJA</b></div>
    <table style="border:none">
        <tr>
            <td style="border:none; width: 200px"><b>CAJERA</b></td>
            <td style="border:none; width: 300px">Valeska Jerez</td>
            <td style="border:none; width: 100px"><b>RUT</b></td>
            <td style="border:none; width: 300px">13.294.913-1</td>
            <td style="border:none; width: 100px"><b>REND. N</b></td>
            <?php IF(!empty($datos)){foreach ($datos as $i)$rendicion = $i->depRendicion;IF(empty($rendicion))$rendicion='';}?>
            
            <td style="border:none; width: 200px"><?php echo $rendicion; ?></td>
        </tr>
        <tr>
            <td style="border:none"><b>SUPERVISADO POR</b></td>
            <td style="border:none">Daniela Concha</td>
            <td style="border:none"><b>RUT</b></td>
            <td style="border:none">10.800.619-6</td>
            <td style="border:none"></td>
            <td style="border:none"></td>
        </tr>
        <tr>
            <td style="border:none"><b>FECHA APERTURA</b></td>
            <td style="border:none"><?php echo $fechaDesde; ?></td>
            <td style="border:none"></td>
            <td style="border:none"></td>
            <td style="border:none"></td>
            <td style="border:none"></td>
        </tr><tr>
            <td style="border:none"><b>FECHA CIERRE</b></td>
            <td style="border:none"><?php echo $fechaHasta; ?></td>
            <td style="border:none"></td>
            <td style="border:none"></td>
            <td style="border:none"></td>
            <td style="border:none"></td>
        </tr><tr>
            <td style="border:none"><b>RENDICION</b></td>
            <td style="border:none"><?php echo $fechaRendicion; ?></td>
            <td style="border:none"></td>
            <td style="border:none"></td>
            <td style="border:none"></td>
            <td style="border:none"></td>
        </tr>
    </table>
    <br><br><br>
    <table style="border:1px solid black">
                        
                            <tr>
                                <th colspan="13" class="cabecera" style=" border:1px solid black; height: 30px">VENTAS</th>
                            </tr>
                            <tr>
                                <th style=" border:1px solid black" class="cabecera" rowspan="2">N</th>
                                <th style=" border:1px solid black" class="cabecera" rowspan="2">PACIENTE</th>
                                <th style=" border:1px solid black" class="cabecera" rowspan="2">RUT</th>
                                <th style=" border:1px solid black" class="cabecera" rowspan="2">FECHA DEPOSITO</th>
                                <th style=" border:1px solid black" class="cabecera" rowspan="2">CONCEPTO</th>
                                <th style=" border:1px solid black" class="cabecera" rowspan="2">N BOLETA</th>
                                <th style=" border:1px solid black" class="cabecera" rowspan="2">EFECTIVO</th>
                                <th style=" border:1px solid black" class="cabecera" rowspan="2">TRANS. BANCARIA</th>
                                <th class="cabecera" colspan="2">TARJETAS</th>
                                <th style=" border-left:1px solid black;" class="cabecera" colspan="3">CHEQUE</th>
                            </tr>
                            <tr>
                                <th style=" border-bottom:1px solid black" class="cabecera">DEBITO</th>
                                <th style=" border-bottom:1px solid black" class="cabecera">CREDITO</th>
                                <th style=" border-bottom:1px solid black; border-left:1px solid black" class="cabecera">MONTO</th>
                                <th style=" border-bottom:1px solid black; " class="cabecera">BANCO</th>
                                <th style=" border-bottom:1px solid black; border-right:1px solid black; " class="cabecera">N SERIE</th>
                            </tr>

                                <?php $sumEfectivo = $sumTransferencia = $sumDebito = $sumCredito = $sumCheque = $sumTotal = '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-'; ?>
                                <?php foreach ($datos as $item) : ?>
                            <tr>
                                    <?php IF(!empty($item->depFicha))$ficha = $item->depFicha; ELSEIF (!empty($item->ctaFicha)) $ficha = $item->ctaFicha; ELSE $ficha = '-'?>
                                    <?php IF($item->depTipo === '1')$tipo='Efectivo'; ELSEIF($item->depTipo === '2')$tipo='Cheque'; ELSEIF($item->depTipo === '3')$tipo='Transferencia'; ?>
                                <td style="border-right:1px solid black; width: 20px" align="center"><?php echo $item->depId; ?></td>
                                <td style="border-right:1px solid black; font-size:80%"><?php if(!empty($item->ctaNomPaciente)) echo $item->ctaNomPaciente; ?></td>
                                <td style="border-right:1px solid black; min-width: 80px" align="center"><?php if(!empty($item->ctaRutPaciente)) echo formatearRut($item->ctaRutPaciente);?></td>
                                    <?php
                                        $date = new DateTime($item->depFechaRegistro);
                                        $fechaRegistro = $date->format('d-m-Y');
                                    ?>
                                <td style="border-right:1px solid black; min-width: 80px" align="center"><?php echo $fechaRegistro; ?></td>
                                <td style="border-right:1px solid black;" align="center" ><?php echo $item->depConNombre; ?></td>
                                    <?php 
                                    $efectivo = $chequeM = $chequeB = $chequeS = $transferencia = $debito = $credito = '';
                                        IF($item->depTipo === '1') {$efectivo = $item->depSuma; $sumEfectivo += $item->depSuma;$sumTotal += $item->depSuma;}
                                        IF($item->depTipo === '2') {$chequeM = $item->depSuma; $chequeB = $item->depBanNombre; $chequeS = $item->depSerie; $sumCheque += $item->depSuma;$sumTotal += $item->depSuma;}
                                        IF($item->depTipo === '3'){$transferencia = $item->depSuma; $sumTransferencia += $item->depSuma;$sumTotal += $item->depSuma;}
                                        IF($item->depTipo === '6') {$debito = $item->depSuma; $sumDebito += $item->depSuma;$sumTotal += $item->depSuma;}
                                        IF($item->depTipo === '4') {$debito = $item->depSuma; $sumDebito += $item->depSuma;$sumTotal += $item->depSuma;}
                                        IF($item->depTipo === '5') {$credito = $item->depSuma; $sumCredito += $item->depSuma;$sumTotal += $item->depSuma;}
                                    ?>
                                <td style="border-right:1px solid black;" ><?php IF(!empty($item->depBoleta)) echo $item->depBoleta; ?> </td>
                                <td style="border-right:1px solid black;" ><?php echo $efectivo; ?></td>
                                <td style="border-right:1px solid black;" ><?php echo $transferencia ?></td>
                                <td style="border-right:1px solid black;" ><?php echo $debito ?></td>
                                <td style="border-right:1px solid black;" ><?php echo $credito ?></td>
                                <td style="border-right:1px solid black;" ><?php echo $chequeM; ?></td>
                                <td style="border-right:1px solid black;" ><?php echo $chequeB; ?></td>
                                <td style="border-right:1px solid black;" ><?php echo $chequeS; ?></td>
                                
                            </tr>
                                <?php endforeach; ?>
                        
                    </table>
    
    
    <br><br><br><br><br>
    
    <table style="border:1px solid black">
        <tr>
            <td align="center" colspan="4" style="border:1px solid black; width: 150px"><b>RESUMEN DIARIO DE CAJA</b></td>
        </tr>
        <tr>
            <td style="border:none"></td>
            <td style="border-right:1px solid black"></td>
            <td style="border-right:1px solid black"></td>
            <td style="border:none"></td>
        </tr>
        <tr>
            <td style="border:none">EFECTIVO</td>
            <td style="border-right:1px solid black"><?php echo $sumEfectivo; ?></td>
            <td style="border-right:1px solid black"></td>
            <td style="border:none"></td>
        </tr>
        <tr>
            <td style="border:none">TRANSFERENCIA</td>
            <td style="border-right:1px solid black"><?php echo $sumTransferencia; ?></td>
            <td style="border-right:1px solid black"></td>
            <td style="border:none"></td>
        </tr>
        <tr>
            <td style="border:none">DEBITO</td>
            <td style="border-right:1px solid black"><?php echo $sumDebito; ?></td>
            <td style="border-right:1px solid black"></td>
            <td style="border:none"></td>
        </tr>
        <tr>
            <td style="border:none">CREDITO</td>
            <td style="border-right:1px solid black"><?php echo $sumCredito; ?></td>
            <td style="border-right:1px solid black"></td>
            <td style="border:none"></td>
        </tr>
        <tr>
            <td style="border:none">CHEQUE</td>
            <td style="border-right:1px solid black"><?php echo $sumCheque; ?></td>
            <td style="border-right:1px solid black" align="center"><b>VALESKA JEREZ</b></td>
            <td style="border:none" align="center"><b>DANIELA CONCHA</b></td>
        </tr>
        <tr>
            <td style="border:none"><b>TOTAL CAJA</b></td>
            <td style="border-right:1px solid black"><b><?php echo $sumTotal; ?></b></td>
            <td style="border-right:1px solid black" align="center"><b>CAJERO</b></td>
            <td style="border:none" align="center"><b>SUPERVISOR</b></td>
        </tr>
    </table>
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
    

<script>
    $("#divFicha").hide(); 
    $("#divFichaApoderado").hide(); 
    $("#divFichaEconomico").hide();
    $("#rut").attr("disabled", false).css("border-color","red");
    $("#rutApo").attr("disabled", false).css("border-color","red");
    $("#rutApoEco").attr("disabled", false).css("border-color","red");
    
</script>
<script>
    $("#form").submit(function () {  
    if($("#banco").val()==0) {  
        alert("Banco Requerido");  
        return false;
    } 
    if($("#tipoCta").val()==0) {  
        alert("Cta Requerido");  
        return false;
    } 
});  
</script>
<script>
    
    $("#rut").focusout(function(){
       
        ////LIMPIAR INPUTS
        document.getElementById("nombres").value = "";document.getElementById("apePat").value = "";document.getElementById("apeMat").value = "";document.getElementById("fecha").value = ""; document.getElementById("telFijo").value = ""; document.getElementById("telCelu").value = ""; document.getElementById("direccion").value  = ""; document.getElementById("email").value = ""; document.getElementById("ocupacion").value  = ""; document.getElementById("rutTitular").value = ""; document.getElementById("rutApo").value = "";
        $("#rut").attr("disabled", false).css("border-color",'#ccc');
        $("#divFicha").show();  
        var rut = $( "#rut" ).val();
        var rut = rut.replace(".", "");var rut = rut.replace("-", "");var rut = rut.replace(",", ""); var rut = rut.replace(".", "");
        var letra = rut.substring(0, 1);
        
        if (letra === '1' || letra === '2'){var rut = rut.substring(0, 8);}
        else {var rut = rut.substring(0, 7);}

        $.ajax({
            type: "GET",
            url: "<?php echo base_url(); ?>" + "api/ingresos/index/"+rut,
            dataType: 'json',
            
            success: function(data){
                
                document.getElementById("nombres").value    = data.nombres;
                document.getElementById("apePat").value     = data.apellidoPaterno;
                document.getElementById("apeMat").value     = data.apellidoMaterno;
                document.getElementById("fecha").value      = data.fechaNacimiento;
                document.getElementById("telFijo").value    = data.telefono;
                document.getElementById("telCelu").value    = data.celular;
                document.getElementById("direccion").value  = data.direccion;
                document.getElementById("email").value      = data.email;
                document.getElementById("ocupacion").value  = data.ocupacion;
                document.getElementById("rutTitular").value = rut;
                document.getElementById("rutApo").value     = rut;
                
                //$("input:radio").removeAttr("checked");
                if (data.sexo == 'FEMENINO'){
                    
                    //$("#sex").append('Masculino <input type="radio" name="sexo" value="1">Femenino<input type="radio" name="sexo" value="0" id="femenino" checked>');
                }
                //document.getElementById("sexo").value = data.sexo;
                
                //$('select').empty(append('comuna'));
                $("<option class='one' selected='selected' value='"+data.comId+"'>"+data.comNombre+"</option>").appendTo("#comuna");
            
                //$('select').empty().append('isapre');
                $("<option selected value='"+data.isaId+"'>"+data.isaNombre+"</option>").appendTo("#isapre");
            }
        })
        
        
        $("#rutApo").focusout(function(){
        ////LIMPIAR INPUTS
        document.getElementById("nombresApo").value = ""; document.getElementById("apePatApo").value = ""; document.getElementById("telFijoApo").value = ""; document.getElementById("telCeluApo").value = ""; document.getElementById("direccionApo").value = ""; document.getElementById("emailApo").value = ""; document.getElementById("rutApoEco").value = "";
        $("#rutApoEco").attr("disabled", false).css("border-color","#ccc");
        $("#divFichaApoderado").show();  
        var rut = $( "#rutApo" ).val();
        var rut = rut.replace(".", "");var rut = rut.replace("-", "");var rut = rut.replace(",", ""); var rut = rut.replace(".", "");
        var rut = rut.substring(0, 8);
       
        $.ajax({
            type: "GET",
            url: "<?php echo base_url(); ?>" + "api/ingresos/index/"+rut,
            dataType: 'json',
            
            success: function(data){
                
                document.getElementById("nombresApo").value     = data.nombres;
                document.getElementById("apePatApo").value      = data.apellidoPaterno;
                document.getElementById("telFijoApo").value     = data.telefono;
                document.getElementById("telCeluApo").value     = data.celular;
                document.getElementById("direccionApo").value   = data.direccion;
                document.getElementById("emailApo").value       = data.email;
                document.getElementById("rutApoEco").value      = data.rut;
                
                
               }
        })
        })
        
        $("#rutApoEco").focusout(function(){
        ////LIMPIAR INPUTS
        document.getElementById("nombresApoEco").value = ""; document.getElementById("apePatApoEco").value = ""; document.getElementById("telFijoApoEco").value = ""; document.getElementById("telCeluApoEco").value = ""; document.getElementById("direccionApoEco").value = ""; document.getElementById("emailApoEco").value = "";
        $("#rutEco").attr("disabled", false).css("border-color","#ccc");
        $("#divFichaEconomico").show();  
        var rut = $( "#rutApoEco" ).val();
        var rut = rut.replace(".", "");var rut = rut.replace("-", "");var rut = rut.replace(",", ""); var rut = rut.replace(".", "");
        var rut = rut.substring(0, 8);
       
        $.ajax({
            type: "GET",
            url: "<?php echo base_url(); ?>" + "api/ingresos/index/"+rut,
            dataType: 'json',
            
            success: function(data){
                
                document.getElementById("nombresApoEco").value     = data.nombres;
                document.getElementById("apePatApoEco").value      = data.apellidoPaterno;
                document.getElementById("telFijoApoEco").value     = data.telefono;
                document.getElementById("telCeluApoEco").value     = data.celular;
                document.getElementById("direccionApoEco").value   = data.direccion;
                document.getElementById("emailApoEco").value       = data.email;
                
               }
        })
        })
        
        $("#rutDev").focusout(function(){
        ////LIMPIAR INPUTS
        document.getElementById("emailDev").value = ""; document.getElementById("nombresDev").value = ""; document.getElementById("apePatDev").value = "";
        $("#rutEco").attr("disabled", true).css("background-color","transparent");
        var rut = $( "#rutDev" ).val();
        var rut = rut.replace(".", "");var rut = rut.replace("-", "");var rut = rut.replace(",", ""); var rut = rut.replace(".", "");
        var rut = rut.substring(0, 8);
       
        $.ajax({
            type: "GET",
            url: "<?php echo base_url(); ?>" + "api/ingresos/index/"+rut,
            dataType: 'json',
            
            success: function(data){
                
                //AUTOCOMPLETA CAMPOS DEVOLUCIONES
                document.getElementById("emailDev").value           = data.email;
                document.getElementById("nombresDev").value         = data.nombres;
                document.getElementById("apePatDev").value          = data.apellidoPaterno;
                
               }
        })
        })
        
    
});
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

</script>
<script>
    $(document).ready(function(e) {

        //Creamos un Elemento Temporal en forma de enlace
        var tmpElemento = document.createElement('a');
        // obtenemos la informaciÃ³n desde el div que lo contiene en el html
        // Obtenemos la informaciÃ³n de la tabla
        var data_type = 'data:application/vnd.ms-excel';
        var tabla_div = document.getElementById('exportar');
        var tabla_html = tabla_div.outerHTML.replace(/ /g, '%20');
        tmpElemento.href = data_type + ', ' + tabla_html;
        //Asignamos el nombre a nuestro EXCEL
        tmpElemento.download = 'Rendicion.xls';
        // Simulamos el click al elemento creado para descargarlo
        tmpElemento.click();

        //var htmltable= document.getElementById('imprimir');
        //var html = htmltable.outerHTML;
        //window.open('data:application/vnd.ms-excel,' + encodeURIComponent(html));
        window.history.go(-1);
    });

</script>

