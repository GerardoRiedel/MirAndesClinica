
<script type="text/javascript">

    function PrintElem(elem)
    {
        Popup($(elem).html());
    }

    function Popup(data) 
    {
        var mywindow = window.open('', 'my div', 'height=680,width=900');
        mywindow.document.write('<html><head><title></title>');
        mywindow.document.write('<style>'+
                '@page {size: Letter;margin: 25px} '+
                'body{font-size: 80%;font-family: Arial;} '+
                'blockquote{margin-top:-15px} '+
                '</style>');
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
                        IF(!empty($datosApo[2]->apoNombre)){
                            foreach ($datosApo[2] as $con){
                                //die(var_dump($datosApo[2]));
                                $nombreOtroContacto     = $datosApo[2]->apoNombre;
                                $parentescoOtroContacto = $datosApo[2]->apoParentesco;
                                $telUnoOtroContacto     = $datosApo[2]->apoTelefono;
                                $telDosOtroContacto     = $datosApo[2]->apoCelular;
                                IF($parentescoOtroContacto === '1')$parentescoOtroContacto='Padre';ELSEIF($parentescoOtroContacto === '2')$parentescoOtroContacto='Madre';ELSEIF($parentescoOtroContacto === '3')$parentescoOtroContacto='Hijo/a';ELSEIF($parentescoOtroContacto === '4')$parentescoOtroContacto='Conyuge';ELSEIF($parentescoOtroContacto === '5')$parentescoOtroContacto='Hermano/a';ELSEIF($parentescoOtroContacto === '6')$parentescoOtroContacto='Tío/a';ELSEIF($parentescoOtroContacto === '7')$parentescoOtroContacto='Primo/a';ELSEIF($parentescoOtroContacto === '8')$parentescoOtroContacto='Otro';
                            }
                        }
                        IF(empty($datosApo[0]->apoRut) && !empty($datosApo[1]->apoRut)){
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
                        ELSEIF(!empty($datosApo[0]->apoRut) && !empty($datosApo[1]->apoRut)){
                            
                                $apoRut         = $datosApo[0]->apoRut;
                                $apoNombre      = $datosApo[0]->apoNombre;
                                $apoApePat      = $datosApo[0]->apoApePat;
                                $apoApeMat      = $datosApo[0]->apoApeMat;
                                $apoDireccion   = $datosApo[0]->apoDireccion;
                                $apoTelefono    = $datosApo[0]->apoTelefono;
                                $apoCelular     = $datosApo[0]->apoCelular;
                                $apoEmail       = $datosApo[0]->apoEmail;
                                $apoComuna      = $datosApo[0]->apoComuna;
                                $apoParentesco  = $datosApo[0]->apoParentesco;
                                IF($apoParentesco  === '1')$apoParentesco = 'Padre';ELSEIF($apoParentesco  === '2')$apoParentesco = 'Madre';ELSEIF($apoParentesco  === '3')$apoParentesco = 'Hijo/a';ELSEIF($apoParentesco  === '4')$apoParentesco = 'Conyuge';ELSEIF($apoParentesco  === '5')$apoParentesco = 'Hermano/a';ELSEIF($apoParentesco  === '6')$apoParentesco = 'Tío/a';ELSEIF($apoParentesco  === '7')$apoParentesco = 'Primo/a';ELSE$apoParentesco = 'Otro';
                                

                                $ecoRut         = $datosApo[1]->apoRut;
                                $ecoNombre      = $datosApo[1]->apoNombre;
                                $ecoApePat      = $datosApo[1]->apoApePat;
                                $ecoApeMat      = $datosApo[1]->apoApeMat;
                                $ecoDireccion   = $datosApo[1]->apoDireccion;
                                $ecoTelefono    = $datosApo[1]->apoTelefono;
                                $ecoCelular     = $datosApo[1]->apoCelular;
                                $ecoEmail       = $datosApo[1]->apoEmail;
                                $ecoComuna      = $datosApo[1]->apoComuna;
                                $ecoParentesco  = $datosApo[1]->apoParentesco;
                                IF($ecoParentesco  === '1')$ecoParentesco = 'Padre';ELSEIF($ecoParentesco  === '2')$ecoParentesco = 'Madre';ELSEIF($ecoParentesco  === '3')$ecoParentesco = 'Hijo/a';ELSEIF($ecoParentesco  === '4')$ecoParentesco = 'Conyuge';ELSEIF($ecoParentesco  === '5')$ecoParentesco = 'Hermano/a';ELSEIF($ecoParentesco  === '6')$ecoParentesco = 'Tío/a';ELSEIF($ecoParentesco  === '7')$ecoParentesco = 'Primo/a';ELSE $ecoParentesco = 'Otro';
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
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 bhoechie-tab-container" style="border-color: #000000;"  >
    
<div class='widget-content' id="imprimir">

<?php IF($opciones[0] === 'on'):?>
    <!-- INICIO FORMULARIO ESTADISTICO -->
                <?php
                $this->load->view('panel/HD/admision/impresiones/formularios/formIngresoHD');
                ?>
    <!-- FIN FORMULARIO ESTADISTICO -->
<?php ENDIF; ?>
<?php IF($opciones[1] === 'on'):?>
    <!-- INICIO FORMULARIO ESTADISTICO -->
                <?php
                $this->load->view('panel/HD/admision/impresiones/formularios/formRecordatorio');
                ?>
    <!-- FIN FORMULARIO ESTADISTICO -->
<?php ENDIF; ?>
<?php IF($opciones[2] === 'on'):?>
    <!-- INICIO FORMULARIO SIGNOS -->
                <?php
                $this->load->view('panel/HD/admision/impresiones/formularios/formSignos');
                ?>
    <!-- FIN FORMULARIO SIGNOS -->
<?php ENDIF; ?>
<?php IF($opciones[3] === 'on'):?>
    <!-- INICIO FORMULARIO SIGNOS -->
                <?php
                $this->load->view('panel/HD/admision/impresiones/formularios/formLicencia');
                ?>
    <!-- FIN FORMULARIO SIGNOS -->
<?php ENDIF; ?>
<?php IF($opciones[4] === 'on'):?>
    <!-- INICIO FORMULARIO SIGNOS -->
                <?php
                $this->load->view('panel/HD/admision/impresiones/formularios/formSolicitudes');
                ?>
    <!-- FIN FORMULARIO SIGNOS -->
<?php ENDIF; ?>
<?php IF($opciones[5] === 'on'):?>
    <!-- INICIO FORMULARIO SIGNOS -->
                <?php
                $this->load->view('panel/HD/admision/impresiones/formularios/formRecetas');
                ?>
    <!-- FIN FORMULARIO SIGNOS -->
<?php ENDIF; ?>
<?php IF($opciones[6] === 'on'):?>
    <!-- INICIO FORMULARIO SIGNOS -->
                <?php
                $this->load->view('panel/HD/admision/impresiones/formularios/formMedicamentos');
                ?>
    <!-- FIN FORMULARIO SIGNOS -->
<?php ENDIF; ?>
<?php IF($opciones[7] === 'on'):?>
    <!-- INICIO FORMULARIO SIGNOS -->
                <?php
                $this->load->view('panel/HD/admision/impresiones/formularios/formSolicitudesBlanco');
                ?>
    <!-- FIN FORMULARIO SIGNOS -->
<?php ENDIF; ?>
<?php IF($opciones[8] === 'on'):?>
    <!-- INICIO FORMULARIO SIGNOS -->
                <?php
                $this->load->view('panel/HD/admision/impresiones/formularios/formDeposito');
                ?>
    <!-- FIN FORMULARIO SIGNOS -->
<?php ENDIF; ?>
<?php IF($opciones[9] === 'on'):?>
    <!-- INICIO FORMULARIO SIGNOS -->
                <?php
                $this->load->view('panel/HD/admision/impresiones/formularios/formSignosFila');
                ?>
    <!-- FIN FORMULARIO SIGNOS -->
<?php ENDIF; ?>
 
<?php IF($opciones[10] === 'on'):?>
    <!-- INICIO FORMULARIO SIGNOS -->
                <?php
                $this->load->view('panel/HD/admision/impresiones/formularios/formIngresoEnfermeria');
                ?>
    <!-- FIN FORMULARIO SIGNOS -->
<?php ENDIF; ?>
<?php IF($opciones[11] === 'on'):?>
    <!-- INICIO FORMULARIO SIGNOS -->
                <?php
                $this->load->view('panel/HD/admision/impresiones/formularios/formPrefactura');
                ?>
    <!-- FIN FORMULARIO SIGNOS -->
<?php ENDIF; ?>
<?php IF($opciones[12] === 'on'):?>
    <!-- INICIO FORMULARIO SIGNOS -->
                <?php
                $this->load->view('panel/HD/admision/impresiones/formularios/formEvaluacion');
                ?>
    <!-- FIN FORMULARIO SIGNOS -->
<?php ENDIF; ?>
<?php IF($opciones[13] === 'on'):?>
    <!-- INICIO FORMULARIO SIGNOS -->
                <?php
                $this->load->view('panel/HD/admision/impresiones/formularios/formIngresoTO');
                ?>
    <!-- FIN FORMULARIO SIGNOS -->
<?php ENDIF; ?>
</div><!-- DIV IMPRIMIR -->               
        </div><!-- DIV CONTAINER --> 
    </div><!-- DIV ROW --> 
</div><!-- DIV CONTAINER FLUID -->        
</body>            

        
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
    function RutDv( $rut ) {
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
            
    return $dv;
    //return number_format( substr ( $rut, 0 , -1 ) , 0, "", ".") . '-' . substr ( $rut, strlen($rut) -1 , 1 );
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
        