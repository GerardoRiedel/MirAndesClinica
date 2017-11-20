<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>


<div id="content" style="-webkit-box-shadow: -2px 2px 41px 2px rgba(0,0,0,0.75);
-moz-box-shadow: -2px 2px 41px 2px rgba(0,0,0,0.75);
box-shadow: -2px 2px 41px 2px rgba(0,0,0,0.75);z-index: 25; background-color: #db8918">
    <div id="content-header" style="background-color: #e9c899; max-height: 10px !important" >
        <h1 style="background-color: #a15ebe !important;border:none;color:#ffffff; margin-right: 30px;-webkit-box-shadow: 10px 10px 23px -6px rgba(0,0,0,0.75);-moz-box-shadow: 10px 10px 23px -6px rgba(0,0,0,0.75);box-shadow: 10px 10px 23px -6px rgba(0,0,0,0.75);" class="alert alert-info"><?php echo $title;?></h1>
    </div>
    
    
    

    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12">
                

			
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 bhoechie-tab-container" style="border-color: #000000;"  >
            
                            
            <div class='widget-content'>
                
                  
                    
                    
                
                
<div id="divFicha"><!--COMIENZO TRATAMIENTO DE FICHA-->
                    
                    
                    
<div class="col-lg-12">  
    <div class="col-lg-6">  
    <div id="containerOK" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
    </div>
    <div class="col-lg-6">  
    <div id="containerERROR" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
    </div>
    
     <div class="col-lg-6">  
    <div id="containerBLOQUEO" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
    </div>
    <!--
    <div class="col-lg-6">
    <div id="pie" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>
    </div>
    <div class="col-lg-6">
    <div id="pie2" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>
    </div>
    <div class="col-lg-12">  
    <div id="container2" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
    </div>
    -->
</div>

</div><!-- FIN DIV FICHA COMPLETA-->
                
 
                
                
        </div><!-- div class='widget-content'-->    
                    
                
                
            </div><!-- div class="col-xs-12" -->
        </div><!-- row -->
   </div>
</div><!-- content -->
</div>

<!-- CAJA ERROR -->
<script>
    $.ajax({
            type: "GET",
            url: "<?php echo base_url(); ?>" + "api/qa/cajaNO/",
            dataType: 'json',
            
            success: function(datos){
                var keyVar;
                var cant = new Array;
                var dias = new Array;
                var meses = new Array;
                var cantT = '';
                
                    for(keyVar in datos) {
                        var can = '';
                        can = parseInt(datos[keyVar].cant);
                        cantT = cantT * 1 + can;
                        cant = cant.concat(can);
                        var mes = '';
                        mes = datos[keyVar].mes;
                        if(mes==='11')mes='Noviembre';if(mes==='12')mes='Diciembre';else if(mes==='1')mes='Enero';else if(mes==='2')mes='Febrero';else if(mes==='3')mes='Marzo';else if(mes==='4')mes='Abril';else if(mes==='5')mes='Mayo';else if(mes==='6')mes='Junio';else if(mes==='7')mes='Julio';else if(mes==='8')mes='Agosto';else if(mes==='9')mes='Septiembre';else if(mes==='10')mes='Octubre';
                        meses = meses.concat(mes);
                        var dia = '';
                        dia = datos[keyVar].dia;
                        dias = dias.concat(dia+'/'+mes);
                        
                    }
                    Highcharts.chart('containerERROR', {
                        title: {
                            text: 'Registros Erroneos',
                            x: -20 //center
                        },
                        subtitle: {
                            text: 'Por Día',
                            x: -20
                        },
                        xAxis: {
                            title: {
                                text: 'Día'
                            },
                            categories: dias
                        },
                        yAxis: {
                            title: {
                                text: 'Cantidad'
                            }
                        },
                        series: [{
                            name: 'Ingresos Erroneos: '+cantT,
                            data: cant,
                            color: 'red'
                        }]
                    });

            }
        });
</script>



<!-- CAJA OK-->
<script>
    $.ajax({
            type: "GET",
            url: "<?php echo base_url(); ?>" + "api/qa/cajaOK/",
            dataType: 'json',
            
            success: function(datos){
                var keyVar;
                var cant = new Array;
                var dias = new Array;
                var meses = new Array;
                var cantT = '';
                
                    for(keyVar in datos) {
                        var can = '';
                        can = parseInt(datos[keyVar].cant);
                        cantT = cantT * 1 + can;
                        cant = cant.concat(can);
                        var mes = '';
                        mes = datos[keyVar].mes;
                        if(mes==='11')mes='Noviembre';if(mes==='12')mes='Diciembre';else if(mes==='1')mes='Enero';else if(mes==='2')mes='Febrero';else if(mes==='3')mes='Marzo';else if(mes==='4')mes='Abril';else if(mes==='5')mes='Mayo';else if(mes==='6')mes='Junio';else if(mes==='7')mes='Julio';else if(mes==='8')mes='Agosto';else if(mes==='9')mes='Septiembre';else if(mes==='10')mes='Octubre';
                        meses = meses.concat(mes);
                        var dia = '';
                        dia = datos[keyVar].dia;
                        dias = dias.concat(dia+'/'+mes);
                        
                    }
                    Highcharts.chart('containerOK', {
                        title: {
                            text: 'Registros Correctos',
                            x: -20 //center
                        },
                        subtitle: {
                            text: 'Por Día',
                            x: -20
                        },
                        xAxis: {
                            title: {
                                text: 'Día'
                            },
                            categories: dias
                        },
                        yAxis: {
                            title: {
                                text: 'Cantidad'
                            },
                            
                        },
                       
                        series: [{
                            name: 'Ingresos Correctos: '+cantT,
                            data: cant,
                            color: '#0066FF'
                        }]
                    });

            }
        });
</script>


<!-- CAJA BLOQUEO-->
<script>
    $.ajax({
            type: "GET",
            url: "<?php echo base_url(); ?>" + "api/qa/cajaBLOQUEO/",
            dataType: 'json',
            
            success: function(datos){
                var keyVar;
                var cant = new Array;
                var dias = new Array;
                var meses = new Array;
                var cantT = '';
                
                    for(keyVar in datos) {
                        var can = '';
                        can = parseInt(datos[keyVar].cant);
                        cantT = cantT * 1 + can;
                        cant = cant.concat(can);
                        var mes = '';
                        mes = datos[keyVar].mes;
                        if(mes==='11')mes='Noviembre';if(mes==='12')mes='Diciembre';else if(mes==='1')mes='Enero';else if(mes==='2')mes='Febrero';else if(mes==='3')mes='Marzo';else if(mes==='4')mes='Abril';else if(mes==='5')mes='Mayo';else if(mes==='6')mes='Junio';else if(mes==='7')mes='Julio';else if(mes==='8')mes='Agosto';else if(mes==='9')mes='Septiembre';else if(mes==='10')mes='Octubre';
                        meses = meses.concat(mes);
                        var dia = '';
                        dia = datos[keyVar].dia;
                        dias = dias.concat(dia+'/'+mes);
                        
                    }
                    Highcharts.chart('containerBLOQUEO', {
                        title: {
                            text: 'Bloqueos Diarios',
                            x: -20 //center
                        },
                        subtitle: {
                            text: 'Por Día',
                            x: -20
                        },
                        xAxis: {
                            title: {
                                text: 'Día'
                            },
                            categories: dias
                        },
                        yAxis: {
                            title: {
                                text: 'Cantidad'
                            },
                           
                        },
                       
                        series: [{
                            name: 'Bloqueos del Sistema: '+cantT,
                            data: cant,
                            color: 'black'
                        }]
                    });

            }
        });
</script>














