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
                

			
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 bhoechie-tab-container" >
            
                            
            <div class='widget-content'>
                
                  
                    
                    
                
                
<div id="divFicha"><!--COMIENZO TRATAMIENTO DE FICHA-->
                    
                    
                    
<div class="col-lg-12">  
    <div class="col-lg-12">  
    <div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
   
    </div>
    <div class="col-lg-12">  <br><hr><br></div>
    <div class="col-lg-6">
    <div id="pie" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>
    </div>
    <div class="col-lg-6">
    <div id="pie2" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>
    
    </div>
    <div class="col-lg-12">  <br><hr><br></div>
    <div class="col-lg-12">  
    <div id="container2" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
    </div>
</div>

</div><!-- FIN DIV FICHA COMPLETA-->
                
 
                
                
        </div><!-- div class='widget-content'-->    
                    
                
                
            </div><!-- div class="col-xs-12" -->
        </div><!-- row -->
   </div>
</div><!-- content -->
</div>

<script>
    $.ajax({
            type: "GET",
            url: "<?php echo base_url(); ?>" + "api/charts/pacientes/",
            dataType: 'json',
            
            success: function(datos){
                var keyVar;
                
                var dias = new Array;
                var cant2016 = new Array;
                var cant2017 = new Array;
                var cant2018 = new Array;
                var cant2018T = '';
                
              //  for()
                    for( keyVar in datos) {
                    //   
                        var can = '';
                        can = parseInt(datos[keyVar].cant);
                       // alert(can);
                        cant2018T = cant2018T * 1 + can;
                        cant2018 = cant2018.concat(can);
                        var dia = '';
                        dia = datos[keyVar].mes;
                        if(dia==='11')dia='Noviembre';if(dia==='12')dia='Diciembre';else if(dia==='1')dia='Enero';else if(dia==='2')dia='Febrero';else if(dia==='3')dia='Marzo';else if(dia==='4')dia='Abril';else if(dia==='5')dia='Mayo';else if(dia==='6')dia='Junio';else if(dia==='7')dia='Julio';else if(dia==='8')dia='Agosto';else if(dia==='9')dia='Septiembre';else if(dia==='10')dia='Octubre';
                        dias = dias.concat(dia);
                        
                        
                           
                    
                    }
                     cant2016 = cant2016.concat(0).concat(0).concat(0).concat(0).concat(0).concat(0).concat(0).concat(0).concat(0).concat(0).concat(20).concat(45);//;}else if(dia==='Diciembre'){cant2016 = cant2016.concat(45);}else {cant2016 = cant2016.concat(0);};
                     cant2017 = cant2017.concat(44).concat(34).concat(48).concat(43).concat(47).concat(37).concat(46).concat(48).concat(43).concat(38).concat(48).concat(32);
                      
                    Highcharts.setOptions({
                        colors: ['#058DC7', '#50B432', '#ED561B', '#DDDF00', '#24CBE5', '#64E572', '#FF9655', '#FFF263', '#6AF9C4']
                    });
                    Highcharts.chart('container', {
                         chart: {
                            plotBackgroundColor: null,
                            plotBorderWidth: null,
                            plotShadow: false,
                        },
                        title: {
                            text: 'Registro de Altas',
                            x: -20 //center
                        },
                        subtitle: {
                            text: 'Por Mes',
                            x: -20
                        },
                        xAxis: {
                            title: {
                                text: 'Mes'
                            },
                            categories: dias
                        },
                        yAxis: {
                            title: {
                                text: 'Cantidad'
                            },
                            //plotLines: [{
                            //    value: 0,
                            //    width: 1,
                            //    color: '#808080'
                            //}]
                        },
                        //tooltip: {
                        //    valueSuffix: '°C'
                        //},
                        //legend: {
                        //    layout: 'vertical',
                        //    align: 'right',
                        //    verticalAlign: 'middle',
                        //    borderWidth: 0
                        //},
                        series: [
                          {
                            name: 'Universo: 65 pacientes 2016',
                            data: cant2016
                        },
                         {
                            name: 'Universo: 508 pacientes 2017',
                            data: cant2017
                        },
                            {
                            name: 'Universo: '+cant2018T+' pacientes 2018',
                            data: cant2018
                        }]
                    });

            }
        });
</script>
<script>
    //PIE SEXO
    $.ajax({
            type: "GET",
            url: "<?php echo base_url(); ?>" + "api/charts/pieSexo/",
            dataType: 'json',
            
            success: function(datos){
                var keyVar;
                var cantM = new Array;
                var cantF = new Array;
                var cantT = '';
                
                    for(keyVar in datos) {
                        var can = '';
                        can = parseInt(datos[keyVar].cant);
                        cantT = cantT * 1 + can;
                        if(datos[keyVar].sexo === 'MASCULINO'){
                            cantM = cantM.concat(can);}
                        else if(datos[keyVar].sexo === 'FEMENINO'){
                            cantF = cantF.concat(can);}
                    }
                    cantM = cantM * 100/cantT;
                    cantF = cantF * 100/cantT;
                    Highcharts.setOptions({
                        colors: ['#058DC7', '#50B432', '#ED561B', '#DDDF00', '#24CBE5', '#64E572', '#FF9655', '#FFF263', '#6AF9C4']
                    });
                    Highcharts.chart('pie', {
                        chart: {
                            plotBackgroundColor: null,
                            plotBorderWidth: null,
                            plotShadow: false,
                            type: 'pie'
                        },
                        title: {
                            text: 'Variabilidad por Sexo'
                        },
                        subtitle: {
                            text: 'Universo: '+cantT+' pacientes',
                        },
                        tooltip: {
                            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                        },
                        plotOptions: {
                            pie: {
                                allowPointSelect: true,
                                cursor: 'pointer',
                                dataLabels: {
                                    enabled: true,
                                    format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                                    style: {
                                        color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                                    }
                                }
                            }
                        },
                        series: [{
                            name: 'Porcentaje',
                            colorByPoint: true,
                            data: [{
                                    name: 'Mujeres',
                                    y: cantF,
                                    //sliced: true,
                                    //selected: true
                                },{
                                    name: 'Hombres',
                                    y: cantM
                                }]
                        }]
                    });

            }
        });
</script>
<script>
    //PIE PISO
    $.ajax({
            type: "GET",
            url: "<?php echo base_url(); ?>" + "api/charts/piePiso/",
            dataType: 'json',
            
            success: function(datos){
                var keyVar;
                var cant1 = new Array;
                var cant2 = new Array;
                var cant3 = new Array;
                var cantT = '';
                
                    for(keyVar in datos) {
                        var can = '';
                        can = parseInt(datos[keyVar].cant);
                        cantT = cantT * 1 + can;
                        if(datos[keyVar].piso === '1'){
                            cant1 = cant1.concat(can);}
                        else if(datos[keyVar].piso === '2'){
                            cant2 = cant2.concat(can);}
                        else if(datos[keyVar].piso === '3'){
                            cant3 = cant3.concat(can);}
                    }
                    cant1 = cant1 * 100/cantT;
                    cant2 = cant2 * 100/cantT;
                    cant3 = cant3 * 100/cantT;
                    Highcharts.setOptions({
                        colors: ['#058DC7', '#50B432', '#ED561B', '#DDDF00', '#24CBE5', '#64E572', '#FF9655', '#FFF263', '#6AF9C4']
                    });
                    Highcharts.chart('pie2', {
                        chart: {
                            plotBackgroundColor: null,
                            plotBorderWidth: null,
                            plotShadow: false,
                            type: 'pie'
                        },
                        title: {
                            text: 'Distribución por Piso'
                        },
                        subtitle: {
                            text: 'Universo: '+cantT+' pacientes',
                        },
                        tooltip: {
                            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                        },
                        plotOptions: {
                            pie: {
                                allowPointSelect: true,
                                cursor: 'pointer',
                                dataLabels: {
                                    enabled: true,
                                    format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                                    style: {
                                        color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                                    }
                                }
                            }
                        },
                        series: [{
                            name: 'Porcentaje',
                            colorByPoint: true,
                            data: [{
                                    name: 'Piso 1',
                                    y: cant1,
                                    //sliced: true,
                                    //selected: true
                                },{
                                    name: 'Piso 2',
                                    y: cant2
                                },{
                                    name: 'Piso 3',
                                    y: cant3
                                }]
                        }]
                    });

            }
        });
</script>
<script>
    //BARRA DEPOSITO
    $.ajax({
            type: "GET",
            url: "<?php echo base_url(); ?>" + "api/charts/depositos/",
            dataType: 'json',
            
            success: function(datos){
                var keyVar;
                var cheque = new Array;
                var efectivo = new Array;
                var trans = new Array;
                var web = new Array;
                var cred = new Array;
                var deb = new Array;
                var cheqN = tranN = efecN = weN = creN = deN = cantT = 0;
                var cheqD = tranD = efecD = weD = creD = deD = 0;
                var cheqE = tranE = efecE = weE = creE = deE = 0;
                var cheqF = tranF = efecF = weF = creF = deF = 0;
                var cheqM = tranM = efecM = weM = creM = deM = 0;
                var cheqA = tranA = efecA = weA = creA = deA = 0;
                var cheqMA = tranMA = efecMA = weMA = creMA = deMA = 0;
                var cheqJ = tranJ = efecJ = weJ = creJ = deJ = 0;
                var cheqJL = tranJL = efecJL = weJL = creJL = deJL = 0;
                var cheqAG = tranAG = efecAG = weAG = creAG = deAG = 0;
                var cheqS = tranS = efecS = weS = creS = deS = 0;
                var cheqO = tranO = efecO = weO = creO = deO = 0;
                //var trans = 0;
                //efectivo = 0;
                    for(keyVar in datos) {
                        var tip = '';
                        tip     = parseInt(datos[keyVar].depTipo);
                        
                        var can = '';
                        can     = parseInt(datos[keyVar].monto);
                        
                        var dia = '';
                        dia = datos[keyVar].mes;
                        if(dia==='11'){
                            if      (tip===1)efecN  = efecN * 1 + can;
                            else if (tip===2)cheqN  = cheqN * 1 + can;
                            else if (tip===3)tranN  = tranN * 1 + can;
                            else if (tip===4)weN    = weN * 1 + can;
                            else if (tip===5)creN   = creN * 1 + can;
                            else if (tip===6)deN    = deN * 1 + can;
                        }
                        else if(dia==='12'){
                            if      (tip===1)efecD  = efecD * 1 + can;
                            else if (tip===2)cheqD  = cheqD * 1 + can;
                            else if (tip===3)tranD  = tranD * 1 + can;
                            else if (tip===4)weD    = weD * 1 + can;
                            else if (tip===5)creD   = creD * 1 + can;
                            else if (tip===6)deD    = deD * 1 + can;
                        }
                        else if(dia==='1'){
                            if      (tip===1)efecE  = efecE * 1 + can;
                            else if (tip===2)cheqE  = cheqE * 1 + can;
                            else if (tip===3)tranE  = tranE * 1 + can;
                            else if (tip===4)weE    = weE * 1 + can;
                            else if (tip===5)creE   = creE * 1 + can;
                            else if (tip===6)deE    = deE * 1 + can;
                        }
                        else if(dia==='2'){
                            if      (tip===1)efecF  = efecF * 1 + can;
                            else if (tip===2)cheqF  = cheqF * 1 + can;
                            else if (tip===3)tranF  = tranF * 1 + can;
                            else if (tip===4)weF    = weF * 1 + can;
                            else if (tip===5)creF   = creF * 1 + can;
                            else if (tip===6)deF    = deF * 1 + can;
                        }
                        else if(dia==='3'){
                            if      (tip===1)efecM  = efecM * 1 + can;
                            else if (tip===2)cheqM  = cheqM * 1 + can;
                            else if (tip===3)tranM  = tranM * 1 + can;
                            else if (tip===4)weM    = weM * 1 + can;
                            else if (tip===5)creM   = creM * 1 + can;
                            else if (tip===6)deM    = deM * 1 + can;
                        }
                        else if(dia==='4'){
                            if      (tip===1)efecA  = efecA * 1 + can;
                            else if (tip===2)cheqA  = cheqA * 1 + can;
                            else if (tip===3)tranA  = tranA * 1 + can;
                            else if (tip===4)weA    = weA * 1 + can;
                            else if (tip===5)creA   = creA * 1 + can;
                            else if (tip===6)deA    = deA * 1 + can;
                        }
                        else if(dia==='5'){
                            if      (tip===1)efecMA  = efecMA * 1 + can;
                            else if (tip===2)cheqMA  = cheqMA * 1 + can;
                            else if (tip===3)tranMA  = tranMA * 1 + can;
                            else if (tip===4)weMA    = weMA * 1 + can;
                            else if (tip===5)creMA   = creMA * 1 + can;
                            else if (tip===6)deMA    = deMA * 1 + can;
                        }
                        else if(dia==='6'){
                            if      (tip===1)efecJ  = efecJ * 1 + can;
                            else if (tip===2)cheqJ  = cheqJ * 1 + can;
                            else if (tip===3)tranJ  = tranJ * 1 + can;
                            else if (tip===4)weJ    = weJ * 1 + can;
                            else if (tip===5)creJ   = creJ * 1 + can;
                            else if (tip===6)deJ    = deJ * 1 + can;
                        }
                        else if(dia==='7'){
                            if      (tip===1)efecJL  = efecJL * 1 + can;
                            else if (tip===2)cheqJL  = cheqJL * 1 + can;
                            else if (tip===3)tranJL  = tranJL * 1 + can;
                            else if (tip===4)weJL    = weJL * 1 + can;
                            else if (tip===5)creJL   = creJL * 1 + can;
                            else if (tip===6)deJL    = deJL * 1 + can;
                        }
                        else if(dia==='8'){
                            if      (tip===1)efecAG  = efecAG * 1 + can;
                            else if (tip===2)cheqAG  = cheqAG * 1 + can;
                            else if (tip===3)tranAG  = tranAG * 1 + can;
                            else if (tip===4)weAG    = weAG * 1 + can;
                            else if (tip===5)creAG   = creAG * 1 + can;
                            else if (tip===6)deAG    = deAG * 1 + can;
                        }
                        else if(dia==='9'){
                            if      (tip===1)efecS  = efecS * 1 + can;
                            else if (tip===2)cheqS  = cheqS * 1 + can;
                            else if (tip===3)tranS  = tranS * 1 + can;
                            else if (tip===4)weS    = weS * 1 + can;
                            else if (tip===5)creS   = creS * 1 + can;
                            else if (tip===6)deS    = deS * 1 + can;
                        }
                        else if(dia==='10'){
                            if      (tip===1)efecO  = efecO * 1 + can;
                            else if (tip===2)cheqO  = cheqO * 1 + can;
                            else if (tip===3)tranO  = tranO * 1 + can;
                            else if (tip===4)weO    = weO * 1 + can;
                            else if (tip===5)creO   = creO * 1 + can;
                            else if (tip===6)deO    = deO * 1 + can;
                        }
                        
                        }
 //descomentar estas lineas segun el mes a mostrar
                        efectivo  = efectivo.concat(efecE).concat(efecF).concat(efecM)       .concat(efecA)   .concat(efecMA)  .concat(efecJ)  .concat(efecJL)  .concat(efecAG).     concat(efecS).    concat(efecO).concat(efecN).concat(efecD);
                        cheque  = cheque.concat(cheqE).concat(cheqF).concat(cheqM).concat(cheqA)  .concat(cheqMA) .concat(cheqJ) .concat(cheqJL).concat(cheqAG).   concat(cheqS).   concat(cheqO).concat(cheqN).concat(cheqD);
                        trans      = trans.concat(tranE).concat(tranF).concat(tranM)               .concat(tranA)   .concat(tranMA)   .concat(tranJ)   .concat(tranJL)  .concat(tranAG).      concat(tranS).     concat(tranO).concat(tranN).concat(tranD);
                        web        = web.concat(weE).concat(weF).concat(weM)                        .concat(weA)     .concat(weMA)     .concat(weJ)     .concat(weJL)    .concat(weAG).       concat(weS).      concat(weO).concat(weN).concat(weD);
                        cred        = cred.concat(creE).concat(creF).concat(creM)                      .concat(creA)    .concat(creMA)     .concat(creJ)    .concat(creJL)    .concat(creAG).       concat(creS).      concat(creO).concat(creN).concat(creD);
                        deb         = deb.concat(deE).concat(deF).concat(deM)                            .concat(deA)     .concat(deMA)      .concat(deJ)     .concat(deJL)     .concat(deAG).        concat(deS).       concat(deO).concat(deN).concat(deD);
                    
                    
                    Highcharts.setOptions({
                        colors: ['#058DC7', '#50B432', '#ED561B', '#DDDF00', '#24CBE5', '#64E572', '#FF9655', '#FFF263', '#6AF9C4']
                    });
                    Highcharts.chart('container2', {
                        chart: {
                            type: 'column'
                        },
                        title: {
                            text: 'Flujo de Caja Mensual',
                            x: -20 //center
                        },
                        xAxis: {
                            title: {
                                text: 'Mes'
                            },
                            categories: ['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre']
                        },
                        yAxis: {
                            title: {
                                text: 'Monto'
                            },
                            stackLabels: {
                                enabled: true,
                                style: {
                                    fontWeight: 'bold',
                                    color: (Highcharts.theme && Highcharts.theme.textColor) || 'gray'
                                }
                            }
                        },
                        legend: {
                            align: 'right',
                            x: -30,
                            verticalAlign: 'top',
                            y: 25,
                            floating: true,
                            backgroundColor: (Highcharts.theme && Highcharts.theme.background2) || 'white',
                            borderColor: '#CCC',
                            borderWidth: 1,
                            shadow: false
                        },
                        tooltip: {
                            headerFormat: '<b>{point.x}</b><br/>',
                            pointFormat: '{series.name}: {point.y}<br/>Total: {point.stackTotal}'
                        },
                        plotOptions: {
                            column: {
                                stacking: 'normal',
                                dataLabels: {
                                    enabled: true,
                                    color: (Highcharts.theme && Highcharts.theme.dataLabelsColor) || 'white'
                                }
                            }
                        },
    
                        series: [{
                            name: 'Efectivo',
                            data: efectivo
                        },{
                            name: 'Transferencia',
                            data: trans
                        },{
                            name: 'Cheque',
                            data: cheque
                        },{
                            name: 'Web Pay',
                            data: web
                        },{
                            name: 'Crédito',
                            data: cred
                        },{
                            name: 'Débito',
                            data: deb
                        }]
                    });

            }
        });
</script>