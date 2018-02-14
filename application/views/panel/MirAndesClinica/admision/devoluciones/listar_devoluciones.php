

    <link rel="stylesheet" href="<?php echo base_url(); ?>../assets/css/font-awesome.min.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>../assets/css/font-awesome.css" />
   
<script type="text/javascript">

    function PrintElem(elem)
    {
        Popup($(elem).html());
    }

    function Popup(data) 
    {
        var mywindow = window.open('', 'my div', 'height=500,width=800');
        mywindow.document.write('<html><head><title></title>');
        mywindow.document.write('<style>'+
                'table{border-collapse: collapse; border:black 2px solid;font-family: Arial; font-size: 100%;} '+
                '.cabecera{border-collapse: collapse; border:black 2px solid;font-family: Arial; } '+
                'td{border:grey 1px solid; height:25px;} '+
                'body{font-size: 80%;font-family: Arial;} '+
                '.titulo{font-weight: bold;} '+
                'label{font-weight: bold;} '+
                '.cuadrado{color:black;width: 20px; height: 20px; '+
                'border: 1px solid #555;} '+
                '.cuadradoCheck {width: 20px; height: 20px; border: 10px solid #555; }'+
                '</style>');
        
        mywindow.document.write('</head><body >');
        mywindow.document.write(data);
        mywindow.document.write('</body></html>');
        
        mywindow.PPClose = false;                                     // Clear Close Flag
        mywindow.onbeforeunload = function(){    
            var c = confirm('¿Desea Guardar esta Rendición?')
            if (c== true){
                var renNumero = $( "#renNumero" ).val();
                
                        
                        $.ajax({
                            type: "GET",
                            url: "<?php echo base_url(); ?>" + "api/devolucion/dameIdRendicion/"+renNumero,
                            dataType: 'json',

                            success: function(data){
                                //alert(data.renId);
                                        $.ajax({
                                            type: "GET",
                                            url: "<?php echo base_url(); ?>" + "api/devolucion/guardar/"+data.renId,
                                            dataType: 'json',

                                            success: function(data){

                                                window.location.href='<?php base_url(); ?>listarRendicion';
        
                                                //alert('enviada...');
                                                

                                            }
                                        }) 
                                
                            }
                        });
                        
                        
                        
                        
                        
            }
            else {
                $.ajax({
                        type: "GET",
                        url: "<?php echo base_url(); ?>" + "api/devolucion/eliminarCarro/",
                        dataType: 'json',

                        success: function(data){

                            window.location.href='<?php base_url(); ?>listarDevolucion';

                            //alert('enviada...');


                        }
                    }) 
            }
            
            
        } 
        //mywindow.print();
        
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
box-shadow: -2px 2px 41px 2px rgba(0,0,0,0.75);z-index: 25 ">
    <div id="content-header" style="background-color: #e9c899; max-height: 10px !important" >
        <h1 style="background-color: #a15ebe !important;border:none;color:#ffffff; margin-right: 30px;-webkit-box-shadow: 10px 10px 23px -6px rgba(0,0,0,0.75);-moz-box-shadow: 10px 10px 23px -6px rgba(0,0,0,0.75);box-shadow: 10px 10px 23px -6px rgba(0,0,0,0.75);" class="alert alert-info"><?php echo $title;?></h1>
    </div>
    
    
    

    <div class="container-fluid" >
        <div class="row">
            <div class="col-xs-12"></div>
                

			
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 bhoechie-tab-container navCeluSession">
            
                            
            
        <div class="col-lg-12">
                    
                    <div class="col-lg-12">
                        <br>
                    <label>Datos de Ficha</label><hr>
                    </div>
                    <?php $attributes = array('id' => 'form');
                        echo form_open('clinica_admision/devoluciones/FiltroListarDevolucion',$attributes);
                    ?>
                    <br>
                    <div class="col-lg-2">
                        <label>Buscar Paciente</label>
                    </div>
                    <div class='col-lg-4'>
                        <input name="filtro" type="text" placeholder="Digite N° de ficha o run" minlength="1">
                    </div>
                    <div class="col-lg-2">
                        <label>Filtro Avanzado</label>
                    </div>
                    <div class='col-lg-4'>
                        <div class="input-group input-group-sm date datepicker" required data-date="<?php //echo (new DateTime())->format('Y-m-d H:i:s') ?>" data-date-format="yyyy-mm-dd">
                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                            <input type="text" class="form-control" placeholder="Desde, día-mes-año" style=" width: 158px !important" name="fechaDesde" value="<?php IF(!empty($fechaDesdeP))echo $fechaDesdeP; ?>">
                            </div>
                        
                    </div>
                    <div class='col-lg-8'></div>
                    <div class='col-lg-4'>
                        <div class="input-group input-group-sm date datepicker" required data-date="<?php //echo (new DateTime())->format('Y-m-d H:i:s') ?>" data-date-format="yyyy-mm-dd">
                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                            <input type="text" class="form-control" placeholder="Hasta,  día-mes-año" style=" width: 158px !important" name="fechaHasta" value="<?php IF(!empty($fechaHastaP))echo $fechaHastaP; ?>">
                        </div>
                    </div>
                    <div class="col-lg-12" style=" text-align: center">
                        <?php echo form_submit('','Buscar','class="btn btn-primary btn-sm btnCetep"');?>
                    </div>
                </div>
                
                
        <div class="col-lg-12" style=" font-size: 10px">
        Complete los campos segun el criterio requerido
        </div>
            <!-- FIN DIV FICHA COMPLETA-->
            
                <div class="col-lg-12" ></div>
                <?php echo form_close();?>
                
    </div> 
            <?php IF(!empty($datos)): ?>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 bhoechie-tab-container"  >
    
                
                <div  class="col-lg-12" style="padding-top: 10px;">
                    
                <br>
                <div class='col-lg-10'></div>
                
                <?php IF($porvencer !== 'OK'){ ?>
                <div class='col-lg-2' style=" text-align: center; background-color: #a15ebe; color: #ffffff;letter-spacing: 2px;box-shadow: 10px 10px 20px -10px rgba(0,0,0,0.75); border-radius: 4px; " >
                        <h6>Opciones de Tabla "Rendir"</h6>
                        <span class='icon'>
                                   
                            <form id="form1" name="form1" method="post" action="<?php echo base_url("clinica_admision/devoluciones/CarroListarDevolucion/" )?>">
                                    <input type="hidden" name="fechaDesdeP" value="<?php IF(!empty($fechaDesdeP))echo $fechaDesdeP; ?>">
                                    <input type="hidden" name="fechaHastaP" value="<?php IF(!empty($fechaHastaP))echo $fechaHastaP; ?>">
                                    <input type="image" style=" width: 20px" name="imageField" src="<?php echo base_url();?>../assets/img/icons/guardar.png" />
                                    <!--
                                    &nbsp;
                                    
                                    <i class="fa fa-table" id="btnExport" style="cursor: pointer; color:#1d7044;font-size:24px" title="Exportar Tabla a Excel"></i>  
                                    -->
                        </form>
                            <!--
                            <i class='fa fa-print' onclick="PrintElem('#imprimir')" style="cursor: pointer; color:#1d1c19; font-size:18px" title="Imprimir Tabla"></i>
                            -->
                        </span>
                        <span class='icon'>
                             </span>
                          
                                  
                        
                </div>
                <?php } ?>
                <input type="hidden" id="carro" value="<?php IF(!empty($carroPrint)) echo $carroPrint;?>">
                <!--
                <table class='table table-bordered table-hover table-striped data-table'>
                -->
                <div class="col-lg-12" style=" overflow: auto">
                    <br>
                <table class='table table-bordered table-hover table-striped'>
                        <thead>
                            <tr>
                                <th>N° de Deposito</th>
                                <th>N° de Ficha</th>
                                <th>Fecha de Deposito</th>
                                <th>Run Paciente</th>
                                <th>Nombre Paciente</th>
                                <!--
                                <th>Titular Devolución</th>
                                -->
                                <th>N° de Cuenta</th>
                                <th>Tipo de Deposito</th>
                                <th>Boleta</th>
                                <th>Concepto</th>
                                <th>Monto</th>
                                <th>Opciones</th>
                                <th>Seleccionar</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                                <?php foreach ($datos as $item) : ?>
                            <?php IF($item->depEstado != '5'): ?>
                                <tr>
                                        <?php IF(!empty($item->depFicha))$ficha = $item->depFicha; ELSEIF (!empty($item->ctaFicha)) $ficha = $item->ctaFicha; ELSE $ficha = '-'?>
                                        <?php IF($item->depTipo === '1')$tipo='Efectivo'; ELSEIF($item->depTipo === '2')$tipo='Cheque'; ELSEIF($item->depTipo === '3')$tipo='Transferencia';ELSEIF($item->depTipo === '4')$tipo='WebPay';ELSEIF($item->depTipo === '5')$tipo='T Crédito';ELSEIF($item->depTipo === '6')$tipo='T Débito'; ?>
                                    <td><?php echo $item->depId; ?></td>
                                    <td><?php echo $ficha; ?></td>
                                        <?php
                                            $date = new DateTime($item->depFechaRegistro);
                                            $fechaRegistro = $date->format('d-m-Y');
                                        ?>
                                    <td style=" min-width: 90px"><?php echo $fechaRegistro; ?></td>
                                    <td style=" min-width: 110px"><?php if(!empty($item->ctaRutPaciente)) echo formatearRut($item->ctaRutPaciente);?></td>
                                    <td style=" min-width: 90px"><?php if(!empty($item->ctaNomPaciente)) echo strtoupper ($item->ctaNomPaciente); ?></td>
                                    <!--
                                    <td><?php if(!empty($item->ctaRut)) echo formatearRut($item->ctaRut).' - '.$item->ctaNombre.' '.$item->ctaApellido; ?></td>
                                    -->
                                    <td><?php echo $item->ctaNumero; ?></td>
                                    <td><?php echo $tipo; ?></td>
                                    <td><?php IF(!empty($item->depBoleta)) echo $item->depBoleta; ?> </td>
                                    <td><?php echo $item->depConNombre; ?></td>
                                    <td><?php echo $item->depSuma; ?></td>
                                    <td align="center">
                                        
                                        <?php IF(!empty($item->depId)): ;?>
                                        <a class="tip-bottom" title="Imprimir ficha de admisión" href="<?php echo base_url("clinica_admision/impresiones/cargarImprimir/" . $item->ctaRegistro.'_'.$item->depId )?>"><i class="fa fa-print" aria-hidden="true"></i></a>
                                        <?php ENDIF; ?>
                                        <a class="tip-bottom" title="Agregar Deposito" href="<?php echo base_url("clinica_admision/devoluciones/agregarDeposito/" . $item->ctaRegistro )?>"><i class="far fa-money-bill-alt" aria-hidden="true"></i></a>
                                    </td>
                                    <td align="center" >
                                        <?php IF(!empty($item->lisDepDeposito)): ?>
                                        <i class="check" id="<?php echo $item->depId;?>" data-IdDeposito='<?php echo $item->depId;?>' style=" cursor: pointer; color: orangered">Seleccionado</i><br />
                                        <?php ELSE: ?>
                                        <i class="uncheck" id="<?php echo $item->depId;?>" data-IdDeposito='<?php echo $item->depId;?>' style=" cursor: pointer; "><span style="font-size: 13px;color: orangered">Filtro</span></i><br />
                                        <?php ENDIF; ?>
                                    </td>
                                </tr>
                            <?php ENDIF; ?>
                                <?php endforeach; ?>
                        </tbody>
                    </table>
                    <br>
                </div>
                
                
                
        </div><!-- div class='widget-content'-->    
                    
                
                
            </div><!-- div class="col-xs-12" -->
                <?php ENDIF; ?>
            
        </div><!-- row -->
   </div>
</div><!-- content -->


<div id="imprimir" style=" display:none">
    <div align="center"><b>RENDICION DE MOVIMIENTO DE CAJA</b></div>
    <table style="border:none">
        <tr>
            <td style="border:none; width: 200px"><b>CAJERA</b></td>
            <td style="border:none; width: 300px">Valeska Jerez</td>
            <td style="border:none; width: 100px"><b>RUT</b></td>
            <td style="border:none; width: 300px">13.294.913-1</td>
            <td style="border:none; width: 100px"><b>REND. N</b></td>
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
                <table class='table table-bordered table-hover table-striped'>
                        
                            <tr>
                                <th colspan="13" class="cabecera" style=" height: 30px">VENTAS</th>
                            </tr>
                            <tr>
                                <th class="cabecera" rowspan="2">N</th>
                                <th class="cabecera" rowspan="2">PACIENTE</th>
                                <th class="cabecera" rowspan="2">RUT</th>
                                <th class="cabecera" rowspan="2">FECHA DEPOSITO</th>
                                <th class="cabecera" rowspan="2">CONCEPTO</th>
                                <th class="cabecera" rowspan="2">N BOLETA</th>
                                <th class="cabecera" rowspan="2">EFECTIVO</th>
                                <th class="cabecera" rowspan="2">TRANS. BANCARIA</th>
                                <th class="cabecera" colspan="2">TARJETAS</th>
                                <th class="cabecera" colspan="3">CHEQUE</th>
                            </tr>
                            <tr>
                                <th class="cabecera">DEBITO</th>
                                <th class="cabecera">CREDITO</th>
                                <th class="cabecera">MONTO</th>
                                <th class="cabecera">BANCO</th>
                                <th class="cabecera">N SERIE</th>
                            </tr>
                            <?php IF(!empty($datos) && empty($carro)): ?>
                                
                                <?php $sumEfectivo = $sumTransferencia = $sumDebito = $sumCredito = $sumCheque = $sumTotal = ''; ?>
                                <?php foreach ($datos as $item) : ?>
                                <?php IF($item->depEstado != '5'){ ?>
                                    <tr>
                                            <input type="hidden" value="<?php echo $rendicion?>" id="renNumero" name="renNumero">

                                            <?php IF(!empty($item->depFicha))$ficha = $item->depFicha; ELSEIF (!empty($item->ctaFicha)) $ficha = $item->ctaFicha; ELSE $ficha = '-'?>
                                            <?php IF($item->depTipo === '1')$tipo='Efectivo'; ELSEIF($item->depTipo === '2')$tipo='Cheque'; ELSEIF($item->depTipo === '3')$tipo='Transferencia';ELSEIF($item->depTipo === '4')$tipo='WebPay';ELSEIF($item->depTipo === '5')$tipo='T Crédito';ELSEIF($item->depTipo === '6')$tipo='T Débito'; ?>
                                        <td style="width: 20px"><?php echo $item->depId; ?></td>
                                        <td style=" font-size:80%"><?php if(!empty($item->ctaNomPaciente)) echo $item->ctaNomPaciente; ?></td>
                                        <td style="min-width: 80px" align="center"><?php if(!empty($item->ctaRutPaciente)) echo formatearRut($item->ctaRutPaciente);?></td>
                                            <?php
                                                $date = new DateTime($item->depFechaRegistro);
                                                $fechaRegistro = $date->format('d-m-Y');
                                            ?>
                                        <td style="min-width: 80px" align="center"><?php echo $fechaRegistro; ?></td>
                                        <td><?php echo $item->depConNombre; ?></td>
                                            <?php 
                                            $efectivo = $chequeM = $chequeB = $chequeS = $transferencia = $debito = $TCredito = $TDebito = '';
                                                IF($item->depTipo === '1') {$efectivo = $item->depSuma; $sumEfectivo += $item->depSuma;$sumTotal += $item->depSuma;}
                                                IF($item->depTipo === '2') {$chequeM  = $item->depSuma; $chequeB = $item->depBanNombre; $chequeS = $item->depSerie; $sumCheque += $item->depSuma;$sumTotal += $item->depSuma;}
                                                IF($item->depTipo === '3' || $item->depTipo === '4') {$transferencia = $item->depSuma; $sumTransferencia += $item->depSuma;$sumTotal += $item->depSuma;}
                                                //IF($item->depTipo === '4') {$debito   = $item->depSuma; $sumDebito += $item->depSuma;$sumTotal += $item->depSuma;}
                                                IF($item->depTipo === '5') {$TCredito = $item->depSuma; $sumCredito += $item->depSuma;$sumTotal += $item->depSuma;}
                                                IF($item->depTipo === '6') {$TDebito  = $item->depSuma; $sumDebito += $item->depSuma;$sumTotal += $item->depSuma;}
                                            ?>
                                        <td><?php IF(!empty($item->depBoleta)) echo $item->depBoleta; ?></td>
                                        <td><?php echo $efectivo; ?></td>
                                        <td><?php echo $transferencia ?></td>
                                        <td><?php echo $TDebito ?></td>
                                        <td><?php echo $TCredito ?></td>
                                        <td><?php echo $chequeM; ?></td>
                                        <td><?php echo $chequeB; ?></td>
                                        <td><?php echo $chequeS; ?></td>
                                    </tr>
                                <?php } ;?>
                                <?php endforeach; ?>
                            <?php ELSEIF(!empty($carro)): ?>
                            
                                <?php $sumEfectivo = $sumTransferencia = $sumDebito = $sumCredito = $sumCheque = $sumTotal = ''; ?>
                                <?php foreach ($carro as $item) : ?>
                                <?php IF($item->depEstado != '5'){ ?>
                                    <tr>

                                            <input type="hidden" value="<?php echo $rendicion?>" id="renNumero" name="renNumero">

                                            <?php IF(!empty($item->depFicha))$ficha = $item->depFicha; ELSEIF (!empty($item->ctaFicha)) $ficha = $item->ctaFicha; ELSE $ficha = '-'?>
                                            <?php IF($item->depTipo === '1')$tipo='Efectivo'; ELSEIF($item->depTipo === '2')$tipo='Cheque'; ELSEIF($item->depTipo === '3')$tipo='Transferencia'; ?>
                                        <td style="width: 20px"><?php echo $item->depId; ?></td>
                                        <td style=" font-size:80%"><?php if(!empty($item->ctaNomPaciente)) echo $item->ctaNomPaciente; ?></td>
                                        <td style="min-width: 80px" align="center"><?php if(!empty($item->ctaRutPaciente)) echo formatearRut($item->ctaRutPaciente);?></td>
                                            <?php
                                                $date = new DateTime($item->depFechaRegistro);
                                                $fechaRegistro = $date->format('d-m-Y');
                                            ?>
                                        <td style="min-width: 80px" align="center"><?php echo $fechaRegistro; ?></td>
                                        <td><?php echo $item->depConNombre; ?></td>
                                            <?php 
                                                $efectivo = $chequeM = $chequeB = $chequeS = $transferencia = $debito = $TCredito = $TDebito = '';
                                                IF($item->depTipo === '1') {$efectivo = $item->depSuma; $sumEfectivo += $item->depSuma;$sumTotal += $item->depSuma;}
                                                IF($item->depTipo === '2') {$chequeM  = $item->depSuma; $chequeB = $item->depBanNombre; $chequeS = $item->depSerie; $sumCheque += $item->depSuma;$sumTotal += $item->depSuma;}
                                                IF($item->depTipo === '3' || $item->depTipo === '4') {$transferencia = $item->depSuma; $sumTransferencia += $item->depSuma;$sumTotal += $item->depSuma;}
                                                //IF($item->depTipo === '4') {$debito   = $item->depSuma; $sumDebito += $item->depSuma;$sumTotal += $item->depSuma;}
                                                IF($item->depTipo === '5') {$TCredito = $item->depSuma; $sumCredito += $item->depSuma;$sumTotal += $item->depSuma;}
                                                IF($item->depTipo === '6') {$TDebito  = $item->depSuma; $sumDebito += $item->depSuma;$sumTotal += $item->depSuma;}
                                            ?>
                                        <td></td>
                                        <td><?php echo $efectivo; ?></td>
                                        <td><?php echo $transferencia ?></td>
                                        <td><?php echo $TDebito ?></td>
                                        <td><?php echo $TCredito ?></td>
                                        <td><?php echo $chequeM; ?></td>
                                        <td><?php echo $chequeB; ?></td>
                                        <td><?php echo $chequeS; ?></td>
                                    </tr>
                                <?php } ?>
                                <?php endforeach; ?>
                            <?php ENDIF; ?>
                        
                    </table>
    
    
    <br><br><br>
    
    <table style="border:none">
        <tr>
            <td style="border:none; width: 150px"><b>RESUMEN DIARIO DE CAJA</b></td>
            <td style="border:none; width: 400px"></td>
            <td style="border:none; width: 200px"></td>
            <td style="border:none; width: 200px"></td>
        </tr>
        <tr>
            <td style="border:none"><b>__________________</b></td>
            <td style="border:none"></td>
            <td style="border:none"></td>
            <td style="border:none"></td>
        </tr>
        <tr>
            <td style="border:none">EFECTIVO</td>
            <td style="border:none"><?php echo $sumEfectivo; ?></td>
            <td style="border:none"></td>
            <td style="border:none"></td>
        </tr>
        <tr>
            <td style="border:none">TRANSFERENCIA</td>
            <td style="border:none"><?php echo $sumTransferencia; ?></td>
            <td style="border:none"></td>
            <td style="border:none"></td>
        </tr>
        <tr>
            <td style="border:none">DEBITO</td>
            <td style="border:none"><?php echo $sumDebito; ?></td>
            <td style="border:none"></td>
            <td style="border:none"></td>
        </tr>
        <tr>
            <td style="border:none">CREDITO</td>
            <td style="border:none"><?php echo $sumCredito; ?></td>
            <td style="border:none"></td>
            <td style="border:none"></td>
        </tr>
        <tr>
            <td style="border:none">CHEQUE</td>
            <td style="border:none"><?php echo $sumCheque; ?></td>
            <td style="border:none" align="center"><b>VALESKA JEREZ</b></td>
            <td style="border:none" align="center"><b>DANIELA CONCHA</b></td>
        </tr>
        <tr>
            <td style="border:none">TOTAL CAJA</td>
            <td style="border:none"><?php echo $sumTotal; ?></td>
            <td style="border:none" align="center"><b>CAJERO</b></td>
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
    window.onload = function() {
        var carro = $( "#carro" ).val();
        if(carro === '1'){PrintElem('#imprimir')}
    };
    </script>
    
        <script>
    
    $(".check").click(function(){

        //$("[data-toggle='popover']").popover('hide');
        //var dataUsuario = $('#uspId').val();
        var IdDeposito  = $(this).attr("data-IdDeposito");
        //var dataString  = IdProducto+'_'+$('#cantidad'+IdProducto).val()+'_'+$('#uspId').val()+'_'+$('#carId').val();
        //var dataString  = IdProducto;
       
        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>" + "api/devolucion/carroDevolucionesMinus/"+IdDeposito,
            //data: IdDeposito,
            success: function(data){
                $( "#"+IdDeposito ).removeClass().addClass( "fa fa-square-o" );
                
            }
        });
    });
    $(".uncheck").click(function(){

        //$("[data-toggle='popover']").popover('hide');
        //var dataUsuario = $('#uspId').val();
        var IdDeposito  = $(this).attr("data-IdDeposito");
        //var dataString  = IdProducto+'_'+$('#cantidad'+IdProducto).val()+'_'+$('#uspId').val()+'_'+$('#carId').val();
        //var dataString  = IdProducto;
       
        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>" + "api/devolucion/carroDevoluciones/"+IdDeposito,
            //data: IdDeposito,
            success: function(data){
                
                $( "#"+IdDeposito ).removeClass().addClass( "fa fa-check-square-o" );
            }
        });
    });
     

</script>     
   