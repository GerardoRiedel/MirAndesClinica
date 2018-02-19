<?php error_reporting(E_ALL ^ E_NOTICE); ?>

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
    .btnCetep{
        background-color: #da812e;
        border-color: #da812e
    }
    .btnCetep:hover{
        background-color: #AF601A;
        border-color: #da812e
    }
    .btnCetep:active{
        background-color: #6E2C00 !important;
        border-color: #da812e
    }
    .cabeza{
        background-color: #da812e !important;
        -webkit-text-fill-color: white;
        -webkit-text-stroke: 1px grey;
    }
    .cuerpo{
        width: 70px;
    }
    .cuerpo2{
        width: 50px;
    }
    select{
        max-width: 200px;
    }
    textarea{
        width: 100%;
        height: 100px;
    }
    table td{
        border:1px solid black;
    }
    td{
        width: 250px
    }
    

    
</style>
<body onload="PrintElem('#imprimir')">
<div  style="display:none" id="content" style="-webkit-box-shadow: -2px 2px 41px 2px rgba(0,0,0,0.75);
-moz-box-shadow: -2px 2px 41px 2px rgba(0,0,0,0.75);
box-shadow: -2px 2px 41px 2px rgba(0,0,0,0.75);z-index: 25 ">
    <div id="content-header" style="background-color: #e9c899; max-height: 10px !important" >
        <h1 style="background-color: #a15ebe !important;border:none;color:#ffffff; margin-right: 30px;-webkit-box-shadow: 10px 10px 23px -6px rgba(0,0,0,0.75);-moz-box-shadow: 10px 10px 23px -6px rgba(0,0,0,0.75);box-shadow: 10px 10px 23px -6px rgba(0,0,0,0.75);" class="alert alert-info"><?php echo $title;?></h1>
    </div>
    
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12">
                

			
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 bhoechie-tab-container"   >
            
                            
            <div class='widget-content'>
                
<div id="divFicha"><!--COMIENZO TRATAMIENTO DE FICHA-->
                    
                    
                    
                <input type="hidden" value="<?php echo $datos->id;?>" name="fichaElectro">
                <input type="hidden" value="<?php echo $datos->rut;?>" name="rut">
                <div class="col-lg-12" ><hr style="height: 12px"></div>
                <!-- DATOS DE PERSONALES--> 
                
                <div id="imprimir">
        <div style="margin-left:50px">
                    <img src="<?php echo base_url();?>../assets/img/mirAndes.png" class="logo">
                </div>
                <div align="center" style="margin-top: -55px"><h3>EVOLUCIÓN ENFERMERÍA DIARIA</h3></div>
                
                    
                    <div style="margin-top: -5px; margin-left:240px">
                        <label>Ficha N°: </label><h7 style="font-size:20px"><b><?php echo $datos->ficha; ?></b></h7>
                        &nbsp;&nbsp;
                        <label>Alergias: </label> <h7 style="color:red;font-size:20px"><b><?php IF(!empty($datos->alergia))echo $datos->alergia;ELSE echo '.....................' ?></b></h7>
                        &nbsp;&nbsp;
                        <label>Fecha Ingreso: </label> <input style="border:none; width: 130px" type="date" readonly value="<?php IF (!empty($datos->fechaIngreso))echo $datos->fechaIngreso;?>">
                    </div>
                    <div class="col-lg-12"><br></div>
                    
                    <div>
                        <label>Nombre: </label> <?php echo strtoupper($datos->nombres).' '.strtoupper($datos->apellidoPaterno).' '.strtoupper($datos->apellidoMaterno); ?>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <label>Rut Paciente: </label> <?php echo formatearRut($datos->rut);?>
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        <label>Edad: </label> <?php echo $edad; ?>
                    
                    </div>
                    <!--
                    <div class="col-lg-5">
                        </div>
                    <div class="col-lg-12" ></div>    
                    <div class="col-lg-3">
                        <label>Sexo: </label> <?php echo $datos->sexo; ?>
                    </div>
                    <div class="col-lg-3">
                        <label>Fecha de Nacimiento: </label> <?php echo $datos->fechaNacimiento; ?>
                    </div>
                    <div class="col-lg-3">
                        </div>
                    <div class="col-lg-3">
                        <label>Nacionalidad: </label> <?php IF ($datos->nacionalidad === '1') echo 'Chilena';ELSEIF ($datos->nacionalidad === '2') echo 'Extranjero' ?>
                    </div>
                
                    <div class="col-lg-12" ></div>
           
                    <div class="col-lg-3">
                        <label>Dirección: </label> <?php IF(!empty($datos->direccion))echo $datos->direccion; ?>
                    </div>
                    <div class="col-lg-3">
                        <label>Comuna: </label> <?php echo $com->comuna;?>
                    </div>
                    <div class="col-lg-3">
                        <label>Teléfono Fijo: </label> <?php IF(!empty($datos->telefono))echo $datos->telefono; ?>
                    </div>
                    <div class="col-lg-3">
                        <label>Teléfono Movil: </label> <?php IF(!empty($datos->celular))echo $datos->celular; ?>
                    </div>
                    <div class="col-lg-3">
                        <label>Ocupación: </label> <?php IF(!empty($datos->ocupacion))echo $datos->ocupacion; ?>
                    </div>
                    <div class="col-lg-3">
                        <label>Email: </label> <?php IF(!empty($datos->email))echo $datos->email; ?>
                    </div>
                <div class="col-lg-12" ><hr style="height: 2px"></div>  
                
                
            <!-- DATOS DE CLINICOS-->  
            <!--
                    <div class="col-lg-12">
                    <label class="titulo">Datos Clínicos</label>
                    </div> 
                            <!--
                                    <div class="col-lg-2">
                                        <label>Alergia: </label>
                                    </div>
                                    <div class='col-lg-4'>
                                        <input name="alergias" type="text" value="<?php IF(!empty($datos->alergia))echo $datos->alergia;?>">
                                    </div>
                            -->
                    <div class="col-lg-12"></div>
                    <div>
                        <?php $medi='..............';
                            FOREACH($medico as $med): 
                                IF ($med->id === $datos->medicoAsignado) $medi = strtoupper($datos->apellidomedicoAsignado).' '.strtoupper($datos->nombresmedicoAsignado);
                            ENDFOREACH; 
                        ?>
                        <label>Medico Asignado: </label> <?php echo $medi;?>
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        <label>Día estadía: </label>
                        <input type="text" style=" max-width: 70px" value="<?php IF(!empty($evo->evoEstadia))echo $evo->evoEstadia;?>">
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        <label>Habitación: </label>
                        <input type="text" style=" max-width: 70px" value="<?php IF(!empty($evo->evoHabitacion))echo $evo->evoHabitacion;?>">
                        <br>
                        <label>Dg Psiquiatríco: </label>
                            <?php IF(!empty($evo->evoDiagPsiquiatra))echo strtoupper($evo->evoDiagPsiquiatra);?>
                        <br>
                        <label>Dg Médico: </label>
                            <?php IF(!empty($evo->evoDiagMedico))echo strtoupper($evo->evoDiagMedico);?>
                        <br>
                        <?php $regim = 'NORMAL';
                            FOREACH($regimen as $reg) { ;?>
                            <?php IF ($datos->regimen === $reg->regId)$regim = $reg->regNombre;?>
                            <?php }; ?>
                        <label>Regimen:&nbsp;&nbsp;</label><?php echo $regim;?>
                    </div>
                    
                    <br>
                    <div align="center">
                        <table>
                            <tr>
                                <td class="td1"><label>Peso:            </label><?php IF(!empty($evo->evoPeso))echo $evo->evoPeso;ELSE echo '...............'?></td>
                                <td class="td1"><label>Talla:           </label><?php IF(!empty($evo->evoTalla))echo $evo->evoTalla;ELSE echo '...............'?></td>
                                <td class="td1"><label>Escala Riesgo:   </label><?php IF(!empty($evo->evoRiesgo))echo $evo->evoRiesgo;ELSE echo '...............'?></td>
                                <td class="td1"><label>Escala Dowton:   </label><?php IF(!empty($evo->evoDowton))echo $evo->evoDowton;ELSE echo '...............'?></td>
                            </tr>
                        </table>
                    </div>    
                    
                    <div align="center">
                        <?php
                        $this->load->view('panel/MirAndesClinica/clinica_enfermeria/ingresos/tablas/formCSVImprimir');
                        ?>
                    </div>
                    
                    <div>
                        <?php $alim = explode('_',$evo->evoAlimentacion); ?>
                        <?php $TO = explode('_',$evo->evoTO); ?>
                        <table>
                            <tr>
                                <td class="td2"><label>Ciclo sueño-vigilia</label></td>
                                <td class="td3"><label>Día: </label><?php IF(!empty($evo->evoSueDia))echo $evo->evoSueDia;ELSE echo '...............'?></td>
                                <td class="td3"><label>Noche: </label><?php IF(!empty($evo->evoSueNoche))echo $evo->evoSueNoche;ELSE echo '...............'?></td>
                            </tr>
                            <tr>
                                <td class="td2"><label>Hidratación</label></td>
                                <td class="td3"><label>Día: </label><?php IF(!empty($evo->evoHidraDia))echo $evo->evoHidraDia;ELSE echo '...............'?></td>
                                <td class="td3"><label>Noche: </label><?php IF(!empty($evo->evoHidraNoche))echo $evo->evoHidraNoche;ELSE echo '...............'?></td>
                            </tr>
                            <tr>
                                <td class="td2"><label>Alimentación</label></td>
                                <td class="td4" colspan="2">
                                    <table class="tabAlimentacion">
                                        <td style="width:100px"><input class="<?php IF($alim[0]==='on')echo 'cuadradoCheck';ELSE echo 'cuadrado'?>"> Colac 1°</td>
                                        <td style="width:100px"><input class="<?php IF($alim[1]==='on')echo 'cuadradoCheck';ELSE echo 'cuadrado'?>"> Desay </td>
                                        <td style="width:100px"><input class="<?php IF($alim[2]==='on')echo 'cuadradoCheck';ELSE echo 'cuadrado'?>"> Almuer </td>
                                        <td style="width:100px"><input class="<?php IF($alim[3]==='on')echo 'cuadradoCheck';ELSE echo 'cuadrado'?>"> Once </td>
                                        <td style="width:100px"><input class="<?php IF($alim[4]==='on')echo 'cuadradoCheck';ELSE echo 'cuadrado'?>"> Cena </td>
                                        <td style="width:100px"><input class="<?php IF($alim[5]==='on')echo 'cuadradoCheck';ELSE echo 'cuadrado'?>"> Colac 2° </td>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td class="td2">
                                    <table>
                                        <tr>
                                            <td class="td5"><label>Visitas</label></td>
                                            <td><input <?php IF($evo->evoVisitas==='1')echo 'class="cuadradoCheck"';ELSE echo 'class="cuadrado"';?>> Si 
                                                <input <?php IF($evo->evoVisitas==='2')echo 'class="cuadradoCheck"';ELSE echo 'class="cuadrado"';?>> No
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                                <td class="td4" colspan="2">
                                    <label>T.O. Mañana: </label><?php echo $TO[0];?>
                                </td>
                            </tr>
                            <tr>
                                <td class="td2">
                                    <table>
                                        <tr>
                                            <td class="td5"><label>Teléfono</label></td>
                                            <td><input <?php IF($evo->evoTelefono==='1')echo 'class="cuadradoCheck"';ELSE echo 'class="cuadrado"';?>> Si 
                                                <input <?php IF($evo->evoTelefono==='2')echo 'class="cuadradoCheck"';ELSE echo 'class="cuadrado"';?>> No
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                                <td class="td4" colspan="2">
                                    <label>T.O. Tarde: </label><?php echo $TO[1];?>
                                </td>
                            </tr>
                            <tr>
                                <td class="td2">
                                    <table>
                                        <tr>
                                            <td class="td5"><label>Salidas</label></td>
                                            <td><input <?php IF($evo->evoSalidas==='1')echo 'class="cuadradoCheck"';ELSE echo 'class="cuadrado"';?>> Si 
                                                <input <?php IF($evo->evoSalidas==='2')echo 'class="cuadradoCheck"';ELSE echo 'class="cuadrado"';?>> No
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                                <td class="Otros" colspan="2" rowspan="2" style=" vertical-align: top">
                                    <label>Otros: </label><?php echo $TO[2];?>
                                </td>
                            </tr>
                            <tr>
                                <td class="td2">
                                    <table>
                                        <tr>
                                            <td class="td5"><label>Cuidador</label></td>
                                            <td><input <?php IF($evo->evoCuidador==='1')echo 'class="cuadradoCheck"';ELSE echo 'class="cuadrado"';?>> Si 
                                                <input <?php IF($evo->evoCuidador==='2')echo 'class="cuadradoCheck"';ELSE echo 'class="cuadrado"';?>> No
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                                
                            </tr>
                        </table>   
                    </div>
                    
                    
                    
                    
                    <div align="center">
                        <?php
                        $this->load->view('panel/MirAndesClinica/clinica_enfermeria/ingresos/tablas/formMedicamentosImprimir');
                        ?>
                    </div>
                    
                    
                    <div>
                        <table>
                            <tr>
                                <td class="td6"><label>PLAN DE ENFERMERIA: </label><?php echo $evo->evoPlan;?></td>
                                <td class="td6"><label>EXAMENES: </label><?php echo $evo->evoExamenes;?></td>
                                <td class="td6"><label>OBSERVAR Y AVISAR: </label><?php echo $evo->evoAvisar;?></td>
                            </tr>
                        </table>
                    </div>
                   
                    
                    
                    <div style="page-break-before: always;">
                    <?php $evolucion = explode('_',$evo->evoHoras); ?>
                        <table>
                            <tr>
                                <td><label>HORA</label></td>
                                <td><label>EVOLUCIÓN DÍA</label></td>
                            </tr>
                            <tr>
                                <td class="td7">
                                    <input type="time" value="<?php IF($evolucion[0] !== '00:00:00')echo $evolucion[0]; ?>" >
                                    <br><input type="time" value="<?php IF($evolucion[1] !== '00:00:00')echo $evolucion[1]; ?>" >
                                    <br><input type="time" value="<?php IF($evolucion[2] !== '00:00:00')echo $evolucion[2]; ?>" >
                                    <br><input type="time" value="<?php IF($evolucion[3] !== '00:00:00')echo $evolucion[3]; ?>" >
                                    <br><input type="time" value="<?php IF($evolucion[4] !== '00:00:00')echo $evolucion[4]; ?>" >
                                    <br><input type="time" value="<?php IF($evolucion[5] !== '00:00:00')echo $evolucion[5]; ?>" >
                                    <br><input type="time" value="<?php IF($evolucion[6] !== '00:00:00')echo $evolucion[6]; ?>" >
                                    <br><input type="time" value="<?php IF($evolucion[7] !== '00:00:00')echo $evolucion[7]; ?>" >
                                </td>
                                <td><textarea class="textArea2"><?php echo $evo->evoDia;?></textarea></td>
                            </tr>
                            <tr>
                                <td><label>HORA</label></td>
                                <td><label>EVOLUCIÓN NOCHE</label></td>
                            </tr>
                            <tr>
                                <td class="td7">
                                    <input type="time" name="evoHor10" value="<?php IF($evolucion[8] !== '00:00:00')echo $evolucion[8]; ?>" >
                                    <br><input type="time" name="evoHor11" value="<?php IF($evolucion[9] !== '00:00:00')echo $evolucion[9]; ?>" >
                                    <br><input type="time" name="evoHor12" value="<?php IF($evolucion[10] !== '00:00:00')echo $evolucion[10]; ?>" >
                                    <br><input type="time" name="evoHor13" value="<?php IF($evolucion[11] !== '00:00:00')echo $evolucion[11]; ?>" >
                                    <br><input type="time" name="evoHor14" value="<?php IF($evolucion[12] !== '00:00:00')echo $evolucion[12]; ?>" >
                                    <br><input type="time" name="evoHor15" value="<?php IF($evolucion[13] !== '00:00:00')echo $evolucion[13]; ?>" >
                                    <br><input type="time" name="evoHor16" value="<?php IF($evolucion[14] !== '00:00:00')echo $evolucion[14]; ?>" >
                                    <br><input type="time" name="evoHor17" value="<?php IF($evolucion[15] !== '00:00:00')echo $evolucion[15]; ?>" >
                                </td>
                                <td><textarea class="textArea2"><?php echo $evo->evoNoche;?></textarea></td>
                            </tr>
                    </table>
                    

                    </div>
                    
                </div><!-- CERRAR PRINT -->
                    
                    
</div><!-- FIN DIV FICHA COMPLETA-->
                
        </div><!-- div class='widget-content'-->    
                    
                
                
            </div><!-- div class="col-xs-12" -->
        </div><!-- row -->
   </div>
</div><!-- content -->
</div>
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
?>



<script type="text/javascript">

    function PrintElem(elem)
    {
        Popup($(elem).html());
    }

    function Popup(data) 
    {
        var mywindow = window.open('', 'my div', 'height=500,width=800');
        mywindow.document.write('<html><head><title></title>');
        mywindow.document.write('<style>\n\
            @page {size: Letter;margin: 25px}\n\
            \n\
            .tabAlimentacion{font-size: 85%;border:0px solid white}\n\
            .td1{font-size: 85%;width: 250px;border:1px solid black}\n\
            .td2{font-size: 85%;width: 200px;border:1px solid black}\n\
            .td3{font-size: 85%;width: 350px;border:1px solid black}\n\
            .td4{font-size: 85%;width: 705px;border:1px solid black}\n\
            .Otros{font-size: 85%;width: 705px;border:1px solid black;vertical-align: top}\n\
            .td5{font-size: 85%;width: 80px;border:0px solid white}\n\
            .td6{font-size: 85%;width: 300px; border:1px solid black; height:150px; vertical-align: top}\n\
            .td7{font-size: 85%;vertical-align: top}\n\
            .td8{font-size: 85%;border:1px solid black;}\n\
            \n\
            body{font-size: 100%;font-family: Arial;} \n\
            .titulo{font-weight: bold;font-size: 90%;} \n\
            .ocultarImpresion{font-size:0px; border:none; width:0px} \n\
            input{border:none}\n\
            select{border:none}\n\
            label{font-size: 85%;font-weight: bold;}\n\
            .cuerpo{font-size: 85%;width: 70px;}\n\
            .cuerpo2{font-size: 85%;width: 37px;}\n\
            select{max-width: 200px;}\n\
            //textarea{width: 100%;height: 100px;border:none} \n\
            .textArea2{height: 190px;width: 700px;line-height: 20px}\n\
            .cuadrado{color:black;width: 20px; height: 20px; border: 1px solid #555;} \n\
            .cuadradoCheck{width: 20px; height: 20px; border: 10px solid #555;} \n\
</style>');
    
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

