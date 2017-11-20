
<script type="text/javascript">

    function PrintElem(elem)
    {
        Popup($(elem).html());
    }

    function Popup(data) 
    {
        var mywindow = window.open('', 'my div', 'height=500,width=800');
        mywindow.document.write('<html><head><title></title>');
         mywindow.document.write('<style>body{font-size: 80%;font-family: Arial;} .titulo{font-weight: bold;} label{font-weight: bold; }</style>');
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
                                $nombreOtroContacto     = $datosApo[2]->apoNombre;
                                $parentescoOtroContacto = $datosApo[2]->apoParentesco;
                                $telUnoOtroContacto     = $datosApo[2]->apoTelefono;
                                $telDosOtroContacto     = $datosApo[2]->apoCelular;
                                IF($parentescoOtroContacto === '1')$parentescoOtroContacto='Padre';ELSEIF($parentescoOtroContacto === '2')$parentescoOtroContacto='Madre';ELSEIF($parentescoOtroContacto === '3')$parentescoOtroContacto='Hijo/a';ELSEIF($parentescoOtroContacto === '4')$parentescoOtroContacto='Conyuge';ELSEIF($parentescoOtroContacto === '5')$parentescoOtroContacto='Hermano/a';ELSEIF($parentescoOtroContacto === '6')$parentescoOtroContacto='Tío/a';ELSEIF($parentescoOtroContacto === '7')$parentescoOtroContacto='Primo/a';ELSEIF($parentescoOtroContacto === '6')$parentescoOtroContacto='Otro';
                            }
                        }
                        IF(empty($datosApo[0]->apoRut) && !empty($datosApo[1]->apoRut)){
                            foreach ($datosApo[1] as $apo){
                                $apoRut         = $datosApo[1]->apoRut;
                                $apoNombre      = $datosApo[1]->apoNombre;
                                $apoApePat      = $datosApo[1]->apoApePat;
                                $apoDireccion   = $datosApo[1]->apoDireccion;
                                $apoTelefono    = $datosApo[1]->apoTelefono;
                                $apoCelular     = $datosApo[1]->apoCelular;
                                $apoEmail       = $datosApo[1]->apoEmail;
                                $apoComuna      = $datosApo[1]->apoComuna;
                                $apoParentesco  = $datosApo[1]->apoParentesco;
                                
                                IF($apoParentesco  === '1')$apoParentesco = 'Padre';ELSEIF($apoParentesco  === '2')$apoParentesco = 'Madre';ELSEIF($apoParentesco  === '3')$apoParentesco = 'Hijo/a';ELSEIF($apoParentesco  === '4')$apoParentesco = 'Conyuge';ELSEIF($apoParentesco  === '5')$apoParentesco = 'Hermano/a';ELSEIF($apoParentesco  === '6')$apoParentesco = 'Tío/a';ELSEIF($apoParentesco  === '7')$apoParentesco = 'Primo/a';ELSE $apoParentesco = 'Otro';
                                $ecoRut         = $apoRut;
                                $ecoNombre      = $apoNombre;
                                $ecoApePat      = $apoApePat;
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
                                $apoDireccion   = $datosApo[0]->apoDireccion;
                                $apoTelefono    = $datosApo[0]->apoTelefono;
                                $apoCelular     = $datosApo[0]->apoCelular;
                                $apoEmail       = $datosApo[0]->apoEmail;
                                $apoComuna      = $datosApo[0]->apoComuna;
                                $apoParentesco  = $datosApo[0]->apoParentesco;
                                IF($apoParentesco  === '1')$apoParentesco = 'Padre';ELSEIF($apoParentesco  === '2')$apoParentesco = 'Madre';ELSEIF($apoParentesco  === '3')$apoParentesco = 'Hijo/a';ELSEIF($apoParentesco  === '4')$apoParentesco = 'Conyuge';ELSEIF($apoParentesco  === '5')$apoParentesco = 'Hermano/a';ELSEIF($apoParentesco  === '6')$apoParentesco = 'Tío/a';ELSEIF($apoParentesco  === '7')$apoParentesco = 'Primo/a';ELSE $apoParentesco = 'Otro';
                                

                                $ecoRut         = $datosApo[1]->apoRut;
                                $ecoNombre      = $datosApo[1]->apoNombre;
                                $ecoApePat      = $datosApo[1]->apoApePat;
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
    
<div class='widget-content' id="imprimir">
                <div class="col-lg-10" align="right">
                    <img src="<?php echo base_url();?>../assets/img/mirAndes.png" class="logo">
                </div>
    
                <div class="col-lg-12" align="center">
                    <h2>&nbsp;&nbsp;&nbsp;&nbsp;N° FICHA: <?php echo $datos->ficha; ?>&nbsp;&nbsp;&nbsp;&nbsp;N° PISO: <?php IF(!empty($datos->piso))echo $datos->piso;ELSE echo '..........' ?></h2>
                </div>
                <div class="col-lg-12" align="center">
                    <h2> FORMULARIO DE IDENTIFICACION DE PACIENTE Y APODERADO</h2>
                </div>
    <br>
                <div class="col-lg-10" align="right">
                    <label>FECHA INGRESO: </label> <?php IF(!empty($fecha))echo $fecha;?>
                </div>
                <div class="col-lg-10" align="right">
                    <label>FECHA TERMINO LICENCIA: </label> <?php IF(!empty($licencia))echo $licencia;?>
                </div>
                <div class="col-lg-10" align="right">
                    <label>ALERGIAS: </label> <?php IF (!empty($datos->alergia))echo $datos->alergia; ELSE echo '..........';?>
                </div>
    <br>
                <div class="col-lg-12" align="left">
                    <label>NOMBRE DEL PACIENTE: </label>&nbsp;<?php echo $datos->nombres.' '.$datos->apellidoPaterno.' '.$datos->apellidoMaterno;?>
                </div>
    <br>
    
                <div class="col-lg-12">
                    <label>RUT: </label><?php echo formatearRut($datos->rut);?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label>EDAD:</label> <?php echo calculaedad($datos->fechaNacimiento);?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label>ISAPRE:</label><?php echo $datos->isapreNombre;?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label>TITULAR: </label><?php IF(!empty($datos->rutTitular))echo formatearRut($datos->rutTitular); ?>
                </div>
    <br>
                <div class="col-lg-12" align="left">
                    <label>DIRECCION: </label><?php IF(!empty($datos->direccion))echo $datos->direccion; ?>
                </div>
    <br>
                <div class="col-lg-12">
                    <label>TELEFONO FIJO: </label><?php IF(!empty($datos->telefono))echo $datos->telefono; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label>MOVIL: </label><?php IF(!empty($datos->celular))echo $datos->celular; ?></label>
                </div>
    <br>
                <div class="col-lg-12">
                    <?php $date = new DateTime($datos->fechaNacimiento);
                        $fecha = $date->format('d-m-Y');
                    ?>
                    <label>FECHA DE NACIMIENTO:</label> <?php echo $fecha ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label>NACIONALIDAD: </label><?php IF ($datos->nacionalidad === '2') echo 'EXTRANJERO'; ELSE echo 'CHILENO'; ?></label>
                </div>
    <br>
                <div class="col-lg-12">
                    <label>DIAGNOSTICO: </label><?php echo $datos->diagnostico ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label>OCUPACION: </label><?php echo $datos->ocupacion ?>
                </div>
    <br>
                <div class="col-lg-12">
                    <label>CORREO ELECTRÓNICO: </label><?php echo $datos->email ?>
                </div>
    <br>
                <div class="col-lg-12">
                    <label>EN CASO DE EMERGENCIA MÉDICA, DERIVAR A: </label><?php echo $datos->emergenciaDerivar ?>
                </div>
    <br>
                <div class="col-lg-12">
                    <label>FIRMA PACIENTE: </label>......................
                </div>
    <br>
                <div class="col-lg-12">
                    <label>MÉDICO TRATANTE: </label><?php echo $datos->nombresmedicoAsignado.' '.$datos->apellidomedicoAsignado; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label>ALIMENTACIÓN: </label><?php echo $datos->regimen ?>
                </div>
    <br>
<!--APODERADO NORMAL-->
                <div class="col-lg-12" ><hr></div>
    <br>
                <div class="col-lg-12">
                    <label>NOMBRE APODERADO: </label><?php echo $apoNombre.' '.$apoApePat ?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label>FIRMA: </label>......................
                </div>
    <br>
                <div class="col-lg-12">
                    <label>RUT: </label><?php IF(!empty($apoRut))echo formatearRut($apoRut); ?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label>PARENTESCO:</label> <?php echo $apoParentesco;?>
                </div>
    <br>
                <div class="col-lg-12">
                    <label>TELEFONO FIJO: </label><?php echo $apoTelefono?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label>MOVIL: </label><?php echo $apoCelular;?>
                </div>
    <br>
                <div class="col-lg-12">
                    <label>DIRECCION: </label> <?php echo $apoDireccion?>
                </div>
    <br>
                <div class="col-lg-12">
                    <label>CORREO ELECTRÓNICO: </label><?php echo $apoEmail?>
                </div>
    <br>
                <div class="col-lg-12">
                    <label>OTRO NÚMERO DE CONTACTO EN CASO DE EMERGENCIA: </label><?php IF(!empty($telUnoOtroContacto))echo $telUnoOtroContacto;IF(!empty($telDosOtroContacto))echo ' - '.$telDosOtroContacto?>
                </div>
    <br>
                <div class="col-lg-12">
                    <label>NOMBRE Y PARENTESCO: </label><?php IF(!empty($nombreOtroContacto))echo $nombreOtroContacto;IF(!empty($parentescoOtroContacto))echo ' - '.$parentescoOtroContacto?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label>FIRMA: </label>.....................
                </div>
    <br>
    
    
    
    
<!--APODERADO ECONOMICO-->
                <div class="col-lg-12" ><hr></div>
    <br>
                <div class="col-lg-12">
                    <label>NOMBRE APODERADO: </label><?php echo $ecoNombre.' '.$ecoApePat ?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label>FIRMA: </label>......................
                    <br><h7 style="font-size: 8px">ECONOMICO</h7>
                </div>
    <br>
                <div class="col-lg-12">
                    <label>RUT: </label><?php IF(!empty($ecoRut))echo formatearRut($ecoRut); ?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label>PARENTESCO: </label><?php echo $ecoParentesco;?>
                </div>
    <br>
                <div class="col-lg-12">
                    <label>TELEFONO FIJO: </label><?php echo $ecoTelefono?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label>MOVIL: </label><?php echo $ecoCelular;?>
                </div>
    <br>
                <div class="col-lg-12">
                    <label>DIRECCION: </label><?php echo $ecoDireccion?>
                </div>
    <br>
                <div class="col-lg-12">
                    <label>CORREO ELECTRÓNICO: </label><?php echo $ecoEmail?>
                </div>
    
    
    
</div>                
                    
</div></div></div>             
                
                
<div id="divFicha"><!--COMIENZO TRATAMIENTO DE FICHA-->
               
    <div id="divApo">
                    
                    
    </div>             
<div id="divFichaApoderado"><!--INICIO DIVFICHA APODERADO-->
                    
                  
                    
                   
</div><!--FiN DIV FICH APODERADO -->
    
                    
                <!-- DATOS DE APODERADO ECONOMICO--> 
            
    <div id="divFichaEconomico"><!--INICIO DIV FICH APODERADO ECONOMICO -->
                    
                    
                    
                    
                    <div class="col-lg-12"></div><!--SALTO DE LINEA-->
<!--INICIO DEVOLUCIONES
                    <div class="col-lg-12">
                    <label>Datos de Devolución</label>
                    </div>
                    <div class="col-lg-1" align="right">
                        <label>Rut</label>
                    </div>

                    <div class='col-lg-2' >
                        <input name="rutDev"  type="text" minlength="7" required id="rutDev" value="<?php IF(!empty($devolucion->ctaRut))echo $devolucion->ctaRut; ?>">
                    </div>
                    <div class="col-lg-2" align="right">
                        <label>Nombre</label>
                    </div>
                    <div class='col-lg-2'>
                        <input name="nombresDev"  type="text" minlength="4" required id="nombresDev" value="<?php IF(!empty($devolucion->ctaNombre))echo $devolucion->ctaNombre; ?>">
                    </div>
                    <div class="col-lg-2" align="right">
                        <label>Apellido</label>
                    </div>
                    <div class='col-lg-2'>
                        <input name="apePatDev" type="text" minlength="4" required id="apePatDev" value="<?php IF(!empty($devolucion->ctaApellido))echo $devolucion->ctaApellido; ?>">
                    </div> 
                    <div class="col-lg-12" ></div><!--SALTO DE LINEA
                    <div class="col-lg-1" align="right">
                        <label>Banco</label>
                    </div>
                    <div class='col-lg-2' >
                        <?php //IF(!empty($devolucion->ctaBanco))$b= $devolucion->ctaBanco; ELSE $b='';?>
                        <?php //echo form_dropdown('banco', $banco, $b, array('id'=>'banco','required'=>TRUE));?>
                    </div>
                    <div class="col-lg-1" align="right" >
                        <label>Tipo</label>
                    </div>
                    <div class='col-lg-2' >
                        <?php //IF(!empty($devolucion->ctaTipo))$t= $devolucion->ctaBanco; ELSE $t='';?>
                        <?php //echo form_dropdown('tipoCta', $tipoCta, $t, array('id'=>'tipoCta','required'=>TRUE));?>
                    </div>
                    <div class="col-lg-1" align="right">
                        <label>N° Cta</label>
                    </div>
                    <div class='col-lg-3'>
                        <input name="NCta" type="text" minlength="4" required id="NCta" value="<?php IF(!empty($devolucion->ctaNumero))echo $devolucion->ctaNumero; ?>">
                    </div>
                    <div class="col-lg-1" align="right">
                        <label>Email</label >
                    </div>
                    <div class='col-lg-2'>
                        <input name="emailDev"  type="text" minlength="9" required id="emailDev" value="<?php IF(!empty($devolucion->ctaEmail))echo $devolucion->ctaEmail; ?>">
                    </div>
    </div><!--FiN DIV FICH APODERADO ECONOMICO>
                <div class='col-lg-12'></div>
                    <div class="col-lg-12">
                        <?php //echo form_submit('','Guardar','class="btn btn-primary btn-sm"');?>
                    </div>
</div><!-- FIN DIV FICHA COMPLETA>
                <div class="col-lg-12" ><hr></div>
            
                
                <div class="col-lg-2">
                    
                    <button onclick="goBack()" class="btn btn-default btn-sm">Cancelar</button><script>function goBack(){window.history.go(-1);}</script>
                
                </div>
        </div><!-- div class='widget-content'-->    
        
        
        
        
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