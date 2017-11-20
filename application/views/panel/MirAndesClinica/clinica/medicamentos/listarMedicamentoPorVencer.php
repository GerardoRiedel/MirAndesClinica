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
    .cuerpo{
        width: 70px;
    }
    .cuerpo2{
        width: 50px;
    }
    .cuerpocsv{
        width: 120px;
    }
    select{
        max-width: 200px;
    }
    textarea{
        width: 100%;
        height: 100px;
    }
    

    
</style>
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
            <?php $attributes = array('id' => 'form');
                echo form_open('clinica_enfermeria/ingresos/guardarComentario',$attributes);
            ?>
                            
            <div class='widget-content'>
                
<div id="divFicha"><!--COMIENZO TRATAMIENTO DE FICHA-->
                    
                    
                    
    <div>
                
                    <div class="col-lg-12">
                    <label class="titulo">Historia de Insumos y Médicamentos</label>
                    </div>
        <?php IF(!empty($medicamento[0]->medAdmId)){?>
                    <div class="col-lg-12">
                        
                    <table>
                        <thead>
                            <tr>
                                <td align="center"><b>Ficha</b></td>
                                <td align="center" style="min-width:90px"><b>Rut</b></td>
                                <td align="center"><b>Nombre</b></td>
                                <td align="center"><b>Apellidos</b></td>
                                <td align="center" style="min-width:80px"><b>Fecha Registro</b></td>
                                <td align="center"><b>Periodo</b></td>
                                <td align="center"><b>Vía</b></td>
                                <td align="center"><b>Fármaco</b></td>
                                <td align="center"><b>Horario</b></td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($medicamento as $item) : ?>
                            <?php 
                                $medAdmHora = strtotime ( '0 hours' , strtotime ( $item->medAdmHora ) ) ;
                                $dia = date ('D',$medAdmHora);
                                IF($dia==='Mon')$dia='Lun';ELSEIF($dia==='Tue')$dia='Mar';ELSEIF($dia==='Wed')$dia='Mier';ELSEIF($dia==='Thu')$dia='Jue';ELSEIF($dia==='Fri')$dia='Vier';ELSEIF($dia==='Sat')$dia='Sab';ELSEIF($dia==='Sun')$dia='Dom';
                                $medAdmHora = date ('d-m H:i',$medAdmHora);
                                $medAdmHora = $dia.',<br>'.$medAdmHora;
                                //die($medAdmHora);
                                IF($per === $item->medHora)$per = '';                     ELSE $per       = $item->medHora; 
                                IF($id === $item->medRegistro)$id = '';                   ELSE $id        = $item->medRegistro;
                                IF($fechaReg === $item->medFechaRegistro)$fechaReg = '';  ELSE $fechaReg  = $item->medFechaRegistro;
                                
                                IF($farm != $item->descripcion){
                                    $farm = $item->descripcion;$tr = '</tr>';
                                    $fecha60 = date('Y-m-d H:i:s');
                                    $fecha60 = strtotime ( '+1 hours' , strtotime ( $fecha60 ) ) ;
                                    $fecha60 = date ( 'Y-m-d H:i:s' , $fecha60 );
                                    $fecha30 = date('Y-m-d H:i:s');
                                    $fecha30 = strtotime ( '-1 hours' , strtotime ( $fecha30 ) ) ;
                                    $fecha30 = date ( 'Y-m-d H:i:s' , $fecha30 );
                                
                            ?>
                            <tr align="center">
                                    <!--<td align="center"><?php echo $item->medAdmId.'_'.$item->medAdmRegistro ?></td>
                                    -->
                                    <td align="center"><?php echo $item->ficha; ?></td>
                                    <td align="center"><?php echo formatearRut($item->rut); ?></td>
                                    <td align="center"><?php echo strtoupper($item->nombres); ?></td>
                                    <td align="center"><?php echo strtoupper($item->apellidoPaterno).' '.strtoupper($item->apellidoMaterno); ?></td>
                                    <td align="center"><?php echo $fechaReg; ?></td>
                                    <td align="center"><?php echo $per; ?></td>
                                    <td align="center"><?php echo $item->viaNombre; ?></td>
                                    <td align="center"><?php echo $farm; ?></td>
                                    <td align="center" style=" border-right:1px solid #CCCCCC">
                                        <?php IF($item->estId==='0' && $item->medAdmHora <= $fecha60){?>
                                        <a class="tip-bottom" title="Administrar Médicamento" style="color:red"  href="<?php echo base_url("clinica_enfermeria/medicamentos/administrar_medicamento/".$item->medAdmId.'_'.$item->medAdmRegistro )?>">
                                            <b><?php echo $medAdmHora; ?></b><!--<i class="fa fa-ban" aria-hidden="true"></i>-->
                                        </a>
                                        <?php } ELSEIF($item->estId==='0' && $item->medAdmHora >= $fecha30){?>
                                        <a class="tip-bottom" title="Administrar Médicamento" style="color:orange;"  href="<?php echo base_url("clinica_enfermeria/medicamentos/administrar_medicamento/".$item->medAdmId.'_'.$item->medAdmRegistro )?>">
                                            <?php echo $medAdmHora; ?><!--<i class="fa fa-ban" aria-hidden="true"></i>-->
                                        </a>
                                        <?php } ELSEIF($item->estId==='1')  {;?>
                                        <a class="tip-bottom" title="Administrar Médicamento" style="color:green"  href="">
                                            <?php echo $medAdmHora; ?><!--<i class="fa fa-ban" aria-hidden="true"></i>-->
                                        </a>
                                        <?php }ELSE {;?>
                                        <a class="tip-bottom" title="Administrar Médicamento" style="color:red"  href="">
                                            <?php echo $medAdmHora; ?><!--<i class="fa fa-ban" aria-hidden="true"></i>-->
                                        </a>
                                        <?php } ?>
                                    </td>
                            <?php
                                } ELSE {$tr = $farm =  '';
                            ?>    
                                    <td align="center" style=" border-right:1px solid #CCCCCC; min-width: 40px">
                                        <?php IF($item->estId==='0' && $item->medAdmHora <= $fecha60){?>
                                        <a class="tip-bottom" title="Administrar Médicamento" style="color:red"  href="<?php echo base_url("clinica_enfermeria/medicamentos/administrar_medicamento/".$item->medAdmId.'_'.$item->medAdmRegistro )?>">
                                            <b><?php echo $medAdmHora; ?></b><!--<i class="fa fa-ban" aria-hidden="true"></i>-->
                                        </a>
                                        <?php } ELSEIF($item->estId==='0' && $item->medAdmHora >= $fecha30){?>
                                        <a class="tip-bottom" title="Administrar Médicamento" style="color:orange;"  href="<?php echo base_url("clinica_enfermeria/medicamentos/administrar_medicamento/".$item->medAdmId.'_'.$item->medAdmRegistro )?>">
                                            <?php echo $medAdmHora; ?><!--<i class="fa fa-ban" aria-hidden="true"></i>-->
                                        </a>
                                        <?php } ELSEIF($item->estId==='1')  {;?>
                                        <a class="tip-bottom" title="Administrar Médicamento" style="color:green"  href="">
                                            <?php echo $medAdmHora; ?><!--<i class="fa fa-ban" aria-hidden="true"></i>-->
                                        </a>
                                        <?php }ELSE {;?>
                                        <a class="tip-bottom" title="Administrar Médicamento" style="color:red"  href="">
                                            <?php echo $medAdmHora; ?><!--<i class="fa fa-ban" aria-hidden="true"></i>-->
                                        </a>
                                        <?php } ?>
                                    </td>

                            <?php echo $tr;} ?>

                            <?php //IF($farm === $item->descripcion)$farm = $item->descripcion;ELSE $farm = ''; IF($per != $item->medHora)$per = $item->medHora; ; IF($id != $item->medRegistro)$id = $item->medRegistro;?>
                            <?php $farm = $item->descripcion; $per = $item->medHora; $id = $item->medRegistro?>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                        
                        
                    </div>
        <?php }?>
                    
                    
</div><!-- FIN DIV FICHA COMPLETA-->
                
            <?php echo form_close();?>
                <div class="col-lg-2">
                    <!--
                    <button onclick="goBack()" class="btn btn-default btn-sm">Cancelar</button><script>function goBack(){window.history.go(-1);}</script>
                -->
                </div>
                
                
                
              
        </div><!-- div class='widget-content'-->    
                    
                
                
            </div><!-- div class="col-xs-12" -->
        </div><!-- row -->
   </div>
</div><!-- content -->
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
                            body{font-size: 100%;font-family: Arial;} \n\
                            .titulo{font-weight: bold;font-size: 90%;} \n\
                            .ocultarImpresion{font-size:0px; border:none; width:0px} \n\
                            input{border:none}\n\
                            textarea{border:none}\n\
                            select{border:none}\n\
                            label{font-weight: bold;}\n\
    .cabeza{background-color: #da812e !important;-webkit-text-fill-color: white;-webkit-text-stroke: 1px grey;}\n\
    .cuerpo{width: 70px;}\n\
    .cuerpo2{width: 50px;}\n\
    select{max-width: 200px;}\n\
    textarea{width: 100%;height: 100px;} \n\
</style>');
    
        /*optional stylesheet*/ //mywindow.document.write('<link rel="stylesheet" href="main.css" type="text/css" />');
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

