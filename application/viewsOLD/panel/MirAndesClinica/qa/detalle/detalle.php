
<script type="text/javascript">

    function PrintElem(elem)
    {
        Popup($(elem).html());
    }

    function Popup(data) 
    {
        var mywindow = window.open('', 'my div', 'height=500,width=800');
        mywindow.document.write('<html><head><title>Listado de Ingresos</title>');
        mywindow.document.write('<style>'+
                'table{border-collapse: collapse; border:black 2px solid;font-family: Arial; font-size: 100%;} '+
                '.cabecera{border-collapse: collapse; border:black 2px solid;font-family: Arial; } '+
                'td{border:grey 1px solid; height:25px;} '+
                'body{font-size: 100%;font-family: Arial;} '+
                '.titulo{font-weight: bold;} '+
                'label{font-weight: bold;} '+
                '</style>');
        
        mywindow.document.write('</head><body >');
        mywindow.document.write(data);
        mywindow.document.write('</body></html>');
        mywindow.print();
        mywindow.close();
        
        //goBack();

        return true;
    }
    function goBack()
    {
        
        window.history.go(-1);
    }
    
</script>
<div id="content" style="-webkit-box-shadow: -2px 2px 41px 2px rgba(0,0,0,0.75);
-moz-box-shadow: -2px 2px 41px 2px rgba(0,0,0,0.75);
box-shadow: -2px 2px 41px 2px rgba(0,0,0,0.75);z-index: 25; background-color: #db8918">
    <div id="content-header" style="background-color: #e9c899; max-height: 10px !important" >
        <h1 style="background-color: #a15ebe !important;border:none;color:#ffffff; margin-right: 30px;-webkit-box-shadow: 10px 10px 23px -6px rgba(0,0,0,0.75);-moz-box-shadow: 10px 10px 23px -6px rgba(0,0,0,0.75);box-shadow: 10px 10px 23px -6px rgba(0,0,0,0.75);" class="alert alert-info"><?php echo $title;?></h1>
    </div>
    
    
    

    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12"></div>
    
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 bhoechie-tab-container" style="border-color: #000000;"  >
                <br>
                <div class='col-lg-12'>
                    <div class='col-lg-4' style=" text-align: center; background-color: #a15ebe; color: #ffffff;letter-spacing: 2px;box-shadow: 10px 10px 20px -10px rgba(0,0,0,0.75); border-radius: 4px; " >
                        <h6>Opciones de Tabla</h6>
                        <span class='icon'>
                            <i class='fa fa-print' onclick="PrintElem('#imprimir')" style="cursor: pointer; color:#1d1c19; font-size:18px" title="Imprimir Tabla"></i>
                            <i class="fa fa-table" id="btnExport" style="cursor: pointer; color:#1d7044;font-size:18px" title="Exportar Tabla a Excel"></i>  
                        </span>
                    </div>
                </div>
                <div class='col-lg-12'>
                    <table class='table table-bordered table-hover table-striped data-table'>
                        <thead>
                            <tr>
                                <th>Fecha Registro</th>
                                <th>Dato</th>
                            </tr>
                        </thead>
                        <tbody>
                                <?php foreach ($data as $item) : ?>
                                <?php IF($item->logData === '2'){$dato = 'ACCESO DENEGADO'; $color = "red";}ELSEIF($item->logData === '1') {$color ="green";$dato = 'ACCESO PERMITIDO';}ELSEIF($item->logData === '4') {$color ="green";$dato = 'CERRADO';}ELSEIF($item->logData === '3') {$color ="black";$dato = 'BLOQUEO';}ELSE {$dato = $item->logData; $color = 'black';} ?>
                                
                            <tr <?php echo 'style="color:'.$color.'"'; ?>>
                                <td align="center"><?php echo $item->logFecha; ?></td>
                                <td align="center"><?php echo $dato;?></td>
                            </tr>
                                <?php endforeach; ?>
                        </tbody>
                    </table>
                    <br>
                </div>
                
                
                    
                
                
            </div><!-- div class="col-xs-12" -->
        </div><!-- row -->
   </div>
</div><!-- content -->

<div id="imprimir" style=" display:none">
    <table>
        <thead>
                <tr>
                    <th colspan="2"><b>DETALLES</b></th>
                </tr>
                <tr>
                    <th>Fecha Registro</th>
                    <th>Dato</th>
                </tr>
        </thead>
        <tbody>
                <?php foreach ($data as $item) : ?>
                <tr>
                    <td align="center"><?php echo $item->logFecha; ?></td>
                            <?php IF($item->logData === '2'){$dato = 'ACCESO DENEGADO'; $color = "red";}ELSEIF($item->logData === '1') {$color ="green";$dato = 'ACCESO PERMITIDO';}ELSEIF($item->logData === '4') {$color ="green";$dato = 'CERRADO';}ELSEIF($item->logData === '3') {$color ="black";$dato = 'BLOQUEO';}ELSE {$dato = $item->logData; $color = 'black';} ?>
                    <td align="center"><?php echo $dato;?></td>
                </tr>
                <?php endforeach; ?>
        </tbody>
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
    
<script src="<?php echo base_url(); ?>../assets/js/jquery.dataTables.js"></script>
<script src="<?php echo base_url(); ?>../assets/js/jquery.nicescroll.min.js"></script>
<script src="<?php echo base_url(); ?>../assets/js/hs.tables.js"></script>

<script>
    $("#btnExport").click(function(e) {

        //Creamos un Elemento Temporal en forma de enlace
        var tmpElemento = document.createElement('a');
        // obtenemos la informaciÃ³n desde el div que lo contiene en el html
        // Obtenemos la informaciÃ³n de la tabla
        var data_type = 'data:application/vnd.ms-excel';
        var tabla_div = document.getElementById('imprimir');
        var tabla_html = tabla_div.outerHTML.replace(/ /g, '%20');
        tmpElemento.href = data_type + ', ' + tabla_html;
        //Asignamos el nombre a nuestro EXCEL
        tmpElemento.download = 'Registros de Ingreso.xls';
        // Simulamos el click al elemento creado para descargarlo
        tmpElemento.click();

        //var htmltable= document.getElementById('imprimir');
        //var html = htmltable.outerHTML;
        //window.open('data:application/vnd.ms-excel,' + encodeURIComponent(html));
    });

</script>

