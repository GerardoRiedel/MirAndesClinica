
<script type="text/javascript">

    function PrintElem(elem)
    {
        Popup($(elem).html());
    }

    function Popup(data) 
    {
        var mywindow = window.open('', 'my div', 'height=500,width=800');
        mywindow.document.write('<html><head><title></title>');
         mywindow.document.write('<style>table{font-size: 80%;font-family: Arial;}body{font-size: 80%;font-family: Arial;} .titulo{font-weight: bold;} label{font-weight: bold;} .cuadrado{color:black;width: 20px; height: 20px; border: 1px solid #555;} .cuadradoCheck{width: 20px; height: 20px; border: 10px solid #555; }</style>');
        /*optional stylesheet*/ //mywindow.document.write('<link rel="stylesheet" href="main.css" type="text/css" />');
        mywindow.document.write('</head><body >');
        mywindow.document.write(data);
        mywindow.document.write('</body></html>');
        mywindow.print();
        mywindow.close();
        
        goBack();

        return true;
    }
    function goBack()
    {
        window.history.go(-1);
    }
    
</script>
 
    <?php 
                    //die(var_dump($datosApo[0]));
                        IF(!empty($datosApo[1]->apoRut)){
                            foreach ($datosApo[1] as $apo){
                                $apoRut         = $datosApo[1]->apoRut;
                                $apoNombre      = $datosApo[1]->apoNombre;
                                $apoApePat      = $datosApo[1]->apoApePat;
                                $apoApeMat      = $datosApo[1]->apoApeMat;
                                $apoDireccion   = $datosApo[1]->apoDireccion;
                                $apoTelefono    = $datosApo[1]->apoTelefono;
                                $apoCelular     = $datosApo[1]->apoCelular;
                                $apoEmail       = $datosApo[1]->apoEmail;
                                $apoComuna      = $datosApo[1]->apoComuna;
                                $apoParentesco  = $datosApo[1]->apoParentesco;
                                
                                IF($apoParentesco  === '1')$apoParentesco = 'Padre';ELSEIF($apoParentesco  === '2')$apoParentesco = 'Madre';ELSEIF($apoParentesco  === '3')$apoParentesco = 'Hijo/a';ELSEIF($apoParentesco  === '4')$apoParentesco = 'Conyuge';ELSEIF($apoParentesco  === '5')$apoParentesco = 'Hermano/a';ELSEIF($apoParentesco  === '6')$apoParentesco = 'Tío/a';ELSEIF($apoParentesco  === '7')$apoParentesco = 'Primo/a';ELSE$apoParentesco = 'Otro';
                                $ecoRut         = $apoRut;
                                $ecoNombre      = $apoNombre;
                                $ecoApePat      = $apoApePat;
                                $ecoApeMat      = $apoApeMat;
                                $ecoDireccion   = $apoDireccion;
                                $ecoTelefono    = $apoTelefono;
                                $ecoCelular     = $apoCelular;
                                $ecoEmail       = $apoEmail;
                                $ecoComuna      = $apoComuna;
                                $ecoParentesco  = $apoParentesco;
                            }
                        }
                        
                        ELSE {
                                $ecoRut         = $apoRut ='';
                                $ecoNombre      = $apoNombre ='';
                                $ecoApePat      = $apoApePat ='';
                                $ecoApeMat      = $apoApeMat ='';
                                $ecoDireccion   = $apoDireccion ='';
                                $ecoTelefono    = $apoTelefono ='';
                                $ecoCelular     = $apoCelular ='';
                                $ecoEmail       = $apoEmail ='';
                                $ecoComuna      = $apoComuna ='';
                                $ecoParentesco  = $apoParentesco ='';
                        }
    ?>
    <body onload="PrintElem('#imprimir')">

<div class="container-fluid">
        <div class="row">
            <div class="col-xs-12">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 bhoechie-tab-container" style="border-color: #000000;"  >
    
<input type="hidden" value="<?php echo $deposito->depSuma;?>" id="suma">
<div class='widget-content' id="imprimir">
                <div class="col-lg-10" align="right">
                    <img src="<?php echo base_url();?>../assets/img/mirAndes.png" class="logo">
                </div>
                <div class="col-lg-10" align="right">
                    <?php 
                        $dia = date('d');$mes = date('m');$ano = date('Y');
                        if($mes==='10')$mes='Octubre';elseif($mes==='11')$mes='Noviembre';elseif($mes==='12')$mes='Diciembre';elseif($mes==='1')$mes='Enero';elseif($mes==='2')$mes='Febrero';elseif($mes==='3')$mes='Marzo';elseif($mes==='4')$mes='Abril';elseif($mes==='5')$mes='Mayo';elseif($mes==='6')$mes='Junio';elseif($mes==='7')$mes='Julio';elseif($mes==='8')$mes='Agosto';elseif($mes==='9')$mes='Septiembre';
                        echo '<br>Providencia, '.$dia.' de '.$mes.' de '.$ano.'<br>';
                    ?>
                </div>
    
                <div class="col-lg-12" align="center">
                    <h2> DEPOSITO <?php IF($datos->esGes === 'Si' || $datos->ges === '1')echo 'POR INSUMOS PACIENTE GES'; ELSE echo 'DIA CAMA PACIENTE LIBRE ELECCIÓN';?></h2>
                </div>
    <br>
    <div class="col-lg-12" align="justify"><?php IF (!empty($apoNombre))$apoderado = $apoNombre.' '.$apoApePat;ELSE $apoderado = '........................................................................................'; ?>
        <label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;MirAndes Clínica</label>&nbsp; recibe de don/ña <label> <?php echo $apoderado ?> Cedula Nacional de Identidad N° <?php IF(!empty($apoRut)) echo formatearRut($apoRut);ELSE echo '...........................................................';;?></label>
                    el depósito para asegurar el pago de gastos <?php IF($datos->esGes === 'Si' || $datos->ges === '1')echo 'de hospitalización no garantizados dentro de la canasta GES (medicamentos, interconsultas, etc.) Por la hospitalización de corta estadía del paciente, Don/ña'; ELSE echo 'del día cama de la hospitalización de corta estadía del paciente, don/ña';?>
                    <label><?php echo $datos->nombres.' '.$datos->apellidoPaterno.' '.$datos->apellidoMaterno;?></label> Rut <label><?php echo formatearRut($datos->rut);?></label>, ello mediante:<br><br>
                    
                    <input <?php IF($deposito->depTipo==='1')echo 'class="cuadradoCheck"'; ELSE echo 'class="cuadrado"'?>> <?php IF($deposito->depTipo==='1')echo 'DINERO EFECTIVO, Por la suma de $ '.$deposito->depSuma; ELSE echo 'DINERO EFECTIVO, Por la suma de $ ..............';?>
                    <h5 <?php IF($deposito->depTipo==='1')echo 'id="sumaTexto"';?>></h5>
                    
                    <input <?php IF($deposito->depTipo==='2')echo 'class="cuadradoCheck"'; ELSE echo 'class="cuadrado"'?>> <?php IF($deposito->depTipo==='2')echo 'CHEQUE del banco '.$deposito->banNombre.', serie '.$deposito->depSerie.', cuenta corriente N° '.$deposito->depCuenta.', Por la suma de $ '.$deposito->depSuma; ELSE echo 'CHEQUE del banco .............., serie .............., cuenta corriente N° .............., Por la suma de $ ..............';?>
                    <h5 <?php IF($deposito->depTipo==='2')echo 'id="sumaTexto"';?>></h5>
                    
                    <input <?php IF($deposito->depTipo==='3')echo 'class="cuadradoCheck"'; ELSE echo 'class="cuadrado"'?>> <?php IF($deposito->depTipo==='3')echo 'TRANSFERENCIA, Por la suma de $ '.$deposito->depSuma; ELSE echo 'TRANSFERENCIA, Por la suma de $ ..............';?>
                    <h5 <?php IF($deposito->depTipo==='3')echo 'id="sumaTexto"';?>></h5>
                    
                    <input <?php IF($deposito->depTipo==='4')echo 'class="cuadradoCheck"'; ELSE echo 'class="cuadrado"'?>> <?php IF($deposito->depTipo==='4')echo 'WEBPAY, Por la suma de $ '.$deposito->depSuma; ELSE echo 'WEBPAY, Por la suma de $ ..............';?>
                    <h5 <?php IF($deposito->depTipo==='4')echo 'id="sumaTexto"';?>></h5>
                
                    <?php 
                    
                    $formatoRutDev = $devolucion->ctaRut;
                    IF(!empty($formatoRutDev))
                    $formatoRutDev = formatearRut($devolucion->ctaRut);
                    ELSE $formatoRutDev='';
                    ?>
                    <?php 
                    IF($datos->esGes === 'Si' || $datos->ges === '1'){
                        echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Declaro estar en conocimiento que el depósito entregado garantiza los gastos de hospitalización no cubiertos por la canasta Ges. Durante la hospitalización, MirAndes Clínica podrá solicitar un nuevo depósito por insumos si los gastos sobrepasan al monto indicado en este documento.<br>'; 
                        echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Posterior al alta, MirAndes Clínica procederá a calcular los gastos incurridos durante la hospitalización. Si los gastos fueren inferiores a la garantía entregada, se procederá a hacer devolución del excedente; asimismo, si la deuda fuere superior al total de los depósitos, el paciente o su responsable financiero deberán cancelar la diferencia. <label>La devolución se realizará aproximadamente después de 90 días posteriores al alta.</label><br><br><br>';
                        echo '<label>NOMBRE</label>.............................................................................................. <label> Firma</label>................................................<br><br>';
                        echo '<label><u>PARA DEVOLUCIÓN (SI APLICA):</u></label><br><br>';
                        echo 'Transferencia Bancaria<br><br>';
                        echo '<table><tr>';
                        echo '<td><label>Banco: </label></td>'
                                . '<td>'.$devolucion->banNombre.'</td>'
                                . '<td><label>Tipo de cta: </label></td>'
                                . '<td>'.$devolucion->tipNombre.'</td>'
                                . '<td><label>Cta N°: </label><td>'
                                . '<td>'.$devolucion->ctaNumero.'</td>';
                        echo '</tr><tr>';
                        echo '<td><label>Nombre: </label></td>'
                                . '<td>'.$devolucion->ctaNombre.' '.$devolucion->ctaApellido.' '.$devolucion->ctaApellidoM.'</td>'
                                . '<td><label> Rut: </label></td>'
                                . '<td coldspan="3">'.$formatoRutDev.'</td>';
                                echo '</tr><tr>';
                        echo '<td><label>Correo: </label></td>'
                                . '<td coldspan="5"> '.$devolucion->ctaEmail.'</td>';
                        echo '</tr></table>';
                    }
                    ELSE {
                        echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Declaro estar en conocimiento que el depósito entregado garantiza los gastos del valor del día cama de la hospitalización para 3 días. Durante la hospitalización, MirAndes Clínica le solicitará un nuevo depósito en garantía cada 5 días hasta que el paciente sea dado de alta y se asegure el pago total de la hospitalización.<br><br>';
                        
                        echo '<label><u>DATOS DEL COTIZANTE:</u></label><br><br>';
                        echo '<table><tr>';
                        echo '<td><label>Nombre: </label></td>'
                                . '<td>'.$devolucion->ctaNombre.' '.$devolucion->ctaApellido.' '.$devolucion->ctaApellidoM.'</td>';
                        echo '</tr><tr>';
                        echo '<td><label>Rut titular: </label></td>'
                                . '<td>'.$formatoRutDev.'</td>';
                        echo '</tr></table>';
                    ?>
                        <input <?php IF($datos->isapre==='6')echo 'class="cuadradoCheck"'; ELSE echo 'class="cuadrado"'?>> FONASA &nbsp;&nbsp;
                        <input <?php IF($datos->isapre!='6')echo 'class="cuadradoCheck"'; ELSE echo 'class="cuadrado"'?>> ISAPRE: <?php IF($datos->isapre!='6')echo $datos->isapreNombre; ELSE echo '..................'?>
                        <br><br>
                    <?php
                        echo '<label><u>DATOS DEL TRANSFERENCIA:</u></label><br><br>';
                        echo '<table><tr>';
                        echo '<td><label>Banco: </label></td>'
                                . '<td>'.$devolucion->banNombre.'&nbsp;&nbsp;</td>'
                                . '<td><label>Tipo de cuenta: </label></td>'
                                . '<td>'.$devolucion->tipNombre.'</td>'
                                . '<td><label>Cuenta N°: </label><td>'
                                . '<td>'.$devolucion->ctaNumero.'</td>';
                        echo '</tr><tr>';
                        echo '<td><label>Nombre: </label></td>'
                                . '<td>'.$devolucion->ctaNombre.' '.$devolucion->ctaApellido.' '.$devolucion->ctaApellidoM.'</td>'
                                . '<td><label> Rut: </label></td>'
                                . '<td coldspan="3">'.formatearRut($devolucion->ctaRut).'&nbsp;&nbsp;</td>';
                                echo '</tr><tr>';
                        echo '<td><label>Correo electrónico: </label></td>'
                                . '<td coldspan="5"> '.$devolucion->ctaEmail.'&nbsp;&nbsp;</td>';
                        echo '</tr></table>';
                        echo '<br><br>';
                        echo '<label>NOMBRE</label>.............................................................................................. <label> Firma</label>................................................<br><br>';
                        
                    }
                    ?>
               
                </div>
    
        </div><!-- div class='widget-content'-->    
<script src="<?php echo base_url(); ?>../assets/js/sumatexto.js" type="text/javascript"></script>
<script>
        $( document ).ready(function() {
		var num = $('#suma').val();
                num = num.replace(".", "");
                covertirNumLetras(num);
                var salida = '('+cad+moneda+')';
                    $('#sumaTexto').text(salida);
	});
</script>       
        
        
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
?>

        <!-- codigo html -->
</body>