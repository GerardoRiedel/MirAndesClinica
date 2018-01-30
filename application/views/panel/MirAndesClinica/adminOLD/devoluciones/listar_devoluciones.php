
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
            var c = confirm('¿Desea Guardar y enviar esta Rendición?')
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
box-shadow: -2px 2px 41px 2px rgba(0,0,0,0.75);z-index: 25 ">
    <div id="content-header" style="background-color: #e9c899; max-height: 10px !important" >
        <h1 style="background-color: #a15ebe !important;border:none;color:#ffffff; margin-right: 30px;-webkit-box-shadow: 10px 10px 23px -6px rgba(0,0,0,0.75);-moz-box-shadow: 10px 10px 23px -6px rgba(0,0,0,0.75);box-shadow: 10px 10px 23px -6px rgba(0,0,0,0.75);" class="alert alert-info"><?php echo $title;?></h1>
    </div>
    
    
    

    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12"></div>
                

			
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 bhoechie-tab-container" style="border-color: #000000;"  >
            
                            
            
                <div class='widget-title'>
                    <br>
                    <div class="col-lg-12" style="margin-top: -10px;">
                    <label>Datos de Ficha</label>
                    </div>
                    <?php $attributes = array('id' => 'form');
                        echo form_open('clinica_admin/devoluciones/FiltroListarDevolucion',$attributes);
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
                    
                </div>
                
                <div class="col-lg-12" style=" text-align: center">
                        <?php echo form_submit('','Buscar','class="btn btn-primary btn-sm btnCetep"');?>
                    </div>
        <div class="col-lg-12" style=" font-size: 10px">
        Complete los campos segun el criterio requerido
        </div>
            <!-- FIN DIV FICHA COMPLETA-->
            
                <div class="col-lg-12" ></div>
                <?php echo form_close();?>
                
    </div> 
            <?php IF(!empty($datos)): ?>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 bhoechie-tab-container" style="border-color: #000000;"  >
    
                
                <div  class="col-lg-12" style="padding-top: 30px;">
                    
                <br>
                <div class='col-lg-10'></div>
                
                <?php IF($porvencer !== 'OK'){ ?>
                <div class='col-lg-2' style=" text-align: center; background-color: #a15ebe; color: #ffffff;letter-spacing: 2px;box-shadow: 10px 10px 20px -10px rgba(0,0,0,0.75); border-radius: 4px; " >
                        <h6>Opciones de Tabla "Rendir"</h6>
                        <span class='icon'>
                            <form id="form1" name="form1" method="post" action="<?php echo base_url("clinica_admin/devoluciones/CarroListarDevolucion/" )?>">
                                    <input type="hidden" name="fechaDesdeP" value="<?php IF(!empty($fechaDesdeP))echo $fechaDesdeP; ?>">
                                    <input type="hidden" name="fechaHastaP" value="<?php IF(!empty($fechaHastaP))echo $fechaHastaP; ?>">
                                    <input type="image" style=" width: 16px" name="imageField" src="<?php echo base_url();?>../assets/img/icons/guardar.png" />
                                    &nbsp;
                                    <i class="fa fa-table" id="btnExport" style="cursor: pointer; color:#1d7044;font-size:24px" title="Exportar Tabla a Excel"></i>  
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
                                <th>Boleta</th>
                                <th>Tipo de Deposito</th>
                                <th>Concepto</th>
                                <th>Monto</th>
                                <th>Opciones</th>
                                <th>Seleccionar</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                                <?php foreach ($datos as $item) : ?>
                            <?php IF($item->depEstado != '5'){ ?>
                                <tr>
                                        <?php IF(!empty($item->depFicha))$ficha = $item->depFicha; ELSEIF (!empty($item->ctaFicha)) $ficha = $item->ctaFicha; ELSE $ficha = '-'?>
                                        <?php IF($item->depTipo === '1')$tipo='Efectivo'; ELSEIF($item->depTipo === '2')$tipo='Cheque'; ELSEIF($item->depTipo === '3')$tipo='Transferencia';ELSEIF($item->depTipo === '4')$tipo='WebPay';ELSEIF($item->depTipo === '5')$tipo='T Crédito';ELSEIF($item->depTipo === '6')$tipo='T Débito'; ?>
                                    <td><?php echo $item->depId; ?></td>
                                    <td><?php echo $ficha; ?></td>
                                        <?php
                                            $date = new DateTime($item->depFechaRegistro);
                                            $fechaRegistro = $date->format('d-m-Y');
                                        ?>
                                    <td style=" min-width: 100px"><?php echo $fechaRegistro; ?></td>
                                    <td style=" min-width: 110px"><?php if(!empty($item->ctaRutPaciente)) echo formatearRut($item->ctaRutPaciente);?></td>
                                    <td style=" min-width: 90px"><?php if(!empty($item->ctaNomPaciente)) echo strtoupper ($item->ctaNomPaciente); ?></td>
                                    <!--
                                    <td><?php if(!empty($item->ctaRut)) echo formatearRut($item->ctaRut).' - '.$item->ctaNombre.' '.$item->ctaApellido; ?></td>
                                    -->
                                    <td><?php echo $item->ctaNumero; ?></td>
                                    <td><?php IF(!empty($item->depBoleta))echo $item->depBoleta; ?></td>
                                    <td><?php echo $tipo; ?></td>
                                    <td><?php echo $item->depConNombre; ?></td>
                                    <td><?php echo $item->depSuma; ?></td>
                                    <td align="center">
                                        
                                        <?php IF(!empty($item->depId)){ ;?>
                                        <a class="tip-bottom" title="Imprimir ficha de admisión" href="<?php echo base_url("clinica_admin/impresiones/cargarImprimir/" . $item->ctaRegistro.'_'.$item->depId )?>"><i class="fa fa-print" aria-hidden="true"></i></a>
                                        <?php } ?>
                                        <a class="tip-bottom" title="Agregar Deposito" href="<?php echo base_url("clinica_admin/devoluciones/agregarDeposito/" . $item->ctaRegistro )?>"><i class="fa fa-money" aria-hidden="true"></i></a>
                                    </td>
                                    <td align="center">
                                        <?php IF(!empty($item->lisDepDeposito)){ ?>
                                        <i class="fa fa-check-square-o" id="<?php echo $item->depId;?>" data-IdDeposito='<?php echo $item->depId;?>' style=" cursor: pointer; "></i><br />
                                        <?php }ELSE{ ?>
                                        <i class="fa fa-square-o" id="<?php echo $item->depId;?>" data-IdDeposito='<?php echo $item->depId;?>' style=" cursor: pointer; "></i><br />
                                        <?php } ;?>
                                    </td>
                                </tr>
                            <?php } ;?>
                                <?php endforeach; ?>
                        </tbody>
                    </table>
                
                
                <div class="col-lg-2">
                    <!--
                    <button onclick="goBack()" class="btn btn-default btn-sm">Cancelar</button><script>function goBack(){window.history.go(-1);}</script>
                -->
                </div>
        </div><!-- div class='widget-content'-->    
                    
                
                
            </div><!-- div class="col-xs-12" -->
                <?php ENDIF; ?>
            
        </div><!-- row -->
   </div>
</div><!-- content -->
</div>

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
            <td style="border:none">Claudio Chamorro</td>
            <td style="border:none"><b>RUT</b></td>
            <td style="border:none">12.035.058-7</td>
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
                <table >
                        
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
                                        <td></td>
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
            <td style="border:none"><?php echo $sumTransferencia; IF(!empty($sumTransferencia))echo ' *'?></td>
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
            <td style="border:none" align="center"><b>CLAUDIO CHAMORRO</b></td>
        </tr>
        <tr>
            <td style="border:none">TOTAL CAJA</td>
            <td style="border:none"><?php echo $sumTotal; ?></td>
            <td style="border:none" align="center"><b>CAJERO</b></td>
            <td style="border:none" align="center"><b>SUPERVISOR</b></td>
        </tr>
        <?php IF(!empty($sumTransferencia)){ ?>
        <tr><td colspan="4" style="border:none">* Inluye concepto Web Pay</td></tr>
        <?php } ?>
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
    window.onload = function() {
        var carro = $( "#carro" ).val();
        if(carro === '1'){PrintElem('#imprimir')}
    };
    
    $(".fa-check-square-o").click(function(){

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
    $(".fa-square-o").click(function(){

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

<div id="exportar" style=" display: none">
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
                                        <td></td>
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
            <td style="border:none"><?php echo $sumTransferencia; IF(!empty($sumTransferencia))echo ' *'?></td>
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
            <td style="border:none" align="center"><b>CLAUDIO CHAMORRO</b></td>
        </tr>
        <tr>
            <td style="border:none">TOTAL CAJA</td>
            <td style="border:none"><?php echo $sumTotal; ?></td>
            <td style="border:none" align="center"><b>CAJERO</b></td>
            <td style="border:none" align="center"><b>SUPERVISOR</b></td>
        </tr>
        <?php IF(!empty($sumTransferencia)){ ?>
        <tr><td colspan="4" style="border:none">* Inluye concepto Web Pay</td></tr>
        <?php } ?>
    </table>
    <!--
<table class='table table-bordered table-hover table-striped'>
        <thead>
            <tr>
                <th>N de Deposito</th>
                <th>N de Ficha</th>
                <th>Fecha de Deposito</th>
                <th>Run Paciente</th>
                <th>Nombre Paciente</th>
                <!--
                <th>Titular Devolución</th>
                
                <th>N de Cuenta</th>
                <th>Tipo de Deposito</th>
                <th>Concepto</th>
                <th>Monto</th>
                
            </tr>
        </thead>
        <tbody>

                <?php foreach ($datos as $item) : ?>
                <?php IF ($item->depEstado != '5'){; ?>
            <tr>
                    <?php IF(!empty($item->depFicha))$ficha = $item->depFicha; ELSEIF (!empty($item->ctaFicha)) $ficha = $item->ctaFicha; ELSE $ficha = '-'?>
                    <?php IF($item->depTipo === '1')$tipo='Efectivo'; ELSEIF($item->depTipo === '2')$tipo='Cheque'; ELSEIF($item->depTipo === '3')$tipo='Transferencia';ELSEIF($item->depTipo === '4')$tipo='WebPay';ELSEIF($item->depTipo === '5')$tipo='T Credito';ELSEIF($item->depTipo === '6')$tipo='T Debito';ELSE $tipo = $item->depTipo;?>
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
                
                <td><?php echo $item->ctaNumero; ?></td>
                <td><?php echo $tipo; ?></td>
                <td><?php echo $item->depConNombre; ?></td>
                <td><?php echo $item->depSuma; ?></td>
                
            </tr>
                <?php } ?>
                <?php endforeach; ?>
        </tbody>
    </table>
    -->
</div>
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
        tmpElemento.download = 'Flujo de Caja.xls';
        // Simulamos el click al elemento creado para descargarlo
        tmpElemento.click();

        //var htmltable= document.getElementById('imprimir');
        //var html = htmltable.outerHTML;
        //window.open('data:application/vnd.ms-excel,' + encodeURIComponent(html));
    });

</script>
