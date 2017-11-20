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
    select{
        max-width: 200px;
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
            //die(var_dump($datos));
                echo form_open('clinica_admin/ingresos/guardarModificarRegistro',$attributes);
            ?>
                            
            <div class='widget-content'>
                
                <br>
                    <!--SOLO PARA CUADRAR A LA DERECHA-->
                    
                    <div>
                        <input type="hidden" value="<?php echo $datos->id;?>" name="fichaElectro">
                    </div>
                    <!--FIN SOLO PARA CUADRAR A LA DERECHA-->
                    <div class="col-lg-12">
                    <label class="titulo">Datos de Ficha</label>
                    </div>
                    <div class="col-lg-2">
                        <label>Fecha de Derivación</label>
                    </div>
                    <div class='col-lg-3'>
                        <input name="fechaDeribacion"  type="text" minlength="7" value="<?php IF(!empty($datos->fechaDerivacion))echo $datos->fechaDerivacion;?>" readonly="true">
                    </div>
                    <div class="col-lg-1" align="center">
                        <label>Fecha Ingreso</label>
                    </div>
                    <div class='col-lg-3'>
                        <div class="input-group input-group-sm date datepicker" required data-date="<?php //echo (new DateTime())->format('Y-m-d H:i:s') ?>" data-date-format="dd-mm-yyyy">
                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                            <input type="text" class="input-group-addon" placeholder="día-mes-año" style=" width: 158px !important" name="fechaIngreso" data-date-format="dd-mm-yyyy" required value="<?php IF(!empty($datos->fechaIngreso))echo $datos->fechaIngreso;?>">
                        </div>
                    </div>
                    <div class="col-lg-1" align="center">
                        <label>Hora Ingreso</label>
                    </div>
                    <div class='col-lg-1'>
                        <input name="horaIngreso" style="width:100px" type="time" minlength="7" required value="<?php IF(!empty($datos->horaIngreso))echo $datos->horaIngreso;?>">
                    </div>
                    <div class="col-lg-12"></div>
                    
                    <div class="col-lg-2">
                        <label>Rut Paciente</label>
                    </div>
                    <div class='col-lg-3'>
                        <input name="rut"  type="text" placeholder="Digite rut de paciente" minlength="7" required id="rut" value="<?php IF(!empty($datos->rut))echo formatearRut($datos->rut);?>">
                    </div>
                    
                
                
<div id="divFicha"><!--COMIENZO TRATAMIENTO DE FICHA-->
                    
                    
                    <div class="col-lg-1">
                        <label>N° Ficha</label>
                    </div>
                    <div class='col-lg-4'>
                        <input name="ficha"  type="text" minlength="3" value="<?php echo $datos->ficha; ?>">
                    </div> 
    <div class="col-lg-12"></div>
                    <div class="col-lg-2">
                        <label>Piso Asignado</label>
                    </div>
                    <div class='col-lg-4'>
                        <input name="piso"  type="text" required maxlength="1" pattern="[0-9]{1}" required id="piso" value="<?php IF(!empty($datos->piso))echo $datos->piso; ?>">
                    </div>
                
                
                <div class="col-lg-12" ><hr style="height: 12px"></div>
                <!-- DATOS DE PERSONALES-->               
                    <div class="col-lg-12">
                    <label class="titulo">Datos Personales</label>
                    </div>
                
                    <div class="col-lg-2">
                        <label>Nombres</label>
                    </div>
                    <div class='col-lg-4'>
                        <input name="nombres"  type="text" minlength="4" required id="nombres" value="<?php echo $datos->nombres; ?>">
                    </div>
                    <div class="col-lg-2">
                        <label>Apellido Paterno</label>
                    </div>
                    <div class='col-lg-4'>
                        <input name="apePat"  type="text" minlength="4" required id="apePat" value="<?php echo $datos->apellidoPaterno; ?>">
                    </div> 
                    <div class="col-lg-12" ></div>
                    <div class="col-lg-2">
                        <label>Apellido Materno</label>
                    </div>
                    <div class='col-lg-4'>
                        <input name="apeMat"  type="text" minlength="4" required id="apeMat" value="<?php echo $datos->apellidoMaterno; ?>">
                    </div>     
                    <div class="btn-group col-lg-2" data-toggle="buttons">
                        <label>Sexo</label>
                    </div>
                    <div class='col-lg-4' id="sex">
                        
                        <table>
                            <tbody>
                            <tr>
                                <td style=" width: 30px" align= 25"center"><input type="radio" name="sexo" value="MASCULINO" id="masculino" <?php IF ($datos->sexo === 'MASCULINO') echo 'checked="true"'; ?>></td>
                                <td style=" width: 75px">Masculino</td>
                                <td style=" width: 30px" align="center"><input type="radio" name="sexo" value="FEMENINO" id="femenino" <?php IF ($datos->sexo === 'FEMENINO') echo 'checked="true"'; ?>></td>
                                <td style=" width: 75px">Femenino</td>
                            </tr>
                            </tbody>
                        </table>
                        <!--
                            Masculino <input type="radio" name="sexo" id="mas">
                            Femenino  <input type="radio" name="sexo" id="fem">
                        -->
                    </div>
                    <div class="col-lg-12" ></div>
                    <div class="col-lg-2">
                        <label>Fecha de Nacimiento</label>
                    </div>
                    <div class="col-lg-4">
                        <div class="input-group input-group-sm date datepicker" required data-date="<?php //echo (new DateTime())->format('Y-m-d H:i:s') ?>" data-date-format="yyyy-mm-dd">
                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                            <input type="text" class="form-control" placeholder="día-mes-año" style=" width: 158px !important" name="fecha" id="fecha" value="<?php echo $datos->fechaNacimiento; ?>">
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <label>Nacionalidad</label>
                    </div>
                    <div class='col-lg-4' id="sex">
                        <table>
                            <tbody>
                            <tr>
                                <td style=" width: 30px" align= 25"center"><input type="radio" name="nac" id="chileno" value="1" <?php IF ($datos->nacionalidad === '1') echo 'checked="true"'; ?>></td>
                                <td style=" width: 75px">Chilena</td>
                                <td style=" width: 30px" align="center"><input type="radio" name="nac" id="extranjero" value="2" <?php IF ($datos->nacionalidad === '2') echo 'checked="true"'; ?>></td>
                                <td style=" width: 75px">Extranjero</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                
                <div class="col-lg-12" ><hr style="height: 2px"></div>
                <!-- DATOS DE CONTACTO-->            
                    <div class="col-lg-12">
                    <label class="titulo">Datos de Contacto</label>
                    </div>
           
                    <div class="col-lg-2">
                        <label>Dirección</label>
                    </div>
                    <div class='col-lg-4'>
                        <input name="direccion"  type="text" minlength="4" required id="direccion" value="<?php IF(!empty($datos->direccion))echo $datos->direccion; ?>">
                    </div>
                    <div class="col-lg-2">
                        <label>Comuna</label>
                    </div>
                    <div class='col-lg-3' >
                        <select name="comuna" id="comuna">
                            <option value="0">Seleccione...</option>
                            <?php foreach($comuna as $com): ?>
                                <option value="<?php echo $com->id;?>" <?php IF ($com->id===$datos->comId)echo 'selected';?>><?php echo $com->comuna;?></option>
                            <?php endforeach; ?>
                        </select>
                        <?php //echo form_dropdown('comuna', $comuna, $datos->comId, array('id'=>'comuna','required'=>TRUE));?>
                    </div>
                    <div class="col-lg-1" align="left">
                        <img class="iconCom" src="<?php echo base_url();?>../assets/img/icons/signo.png" id="iconComPas"/>
                    </div>
                    <div class="col-lg-12" ></div>
                    <div class="col-lg-2">
                        <label>Teléfono Fijo</label>
                    </div>
                    <div class='col-lg-4'>
                        <input name="telFijo"  type="text" minlength="9" pattern="[0-9]{9}" id="telFijo" value="<?php IF(!empty($datos->telefono))echo $datos->telefono; ?>">
                    </div>
                    <div class="col-lg-2">
                        <label>Teléfono Movil</label>
                    </div>
                    <div class='col-lg-4'>
                        <input name="telMovil"  type="text" minlength="9" pattern="[0-9]{9}" required id="telCelu" value="<?php IF(!empty($datos->celular))echo $datos->celular; ?>">
                    </div>
                    <div class="col-lg-12"></div>
                    <div class="col-lg-2">
                        <label>Ocupación</label>
                    </div>
                    <div class='col-lg-4'>
                        <input name="ocupacion"  type="text" minlength="4" title="Ocupación invalida" required id="ocupacion" value="<?php IF(!empty($datos->ocupacion))echo $datos->ocupacion; ?>">
                    </div>
                    <div class="col-lg-2">
                        <label>Email</label>
                    </div>
                    <div class='col-lg-4'>
                        <input name="email" pattern="^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$" title="mail@ejemplo.com"  type="text" minlength="5" id="email" value="<?php IF(!empty($datos->email))echo $datos->email; ?>">
                    </div>
                    <div class="col-lg-12"></div>
                    <div class="col-lg-2">
                        <label>En caso de emergencia, derivar a</label>
                    </div>
                    <div class='col-lg-4'>
                        <input name="emergenciaDerivar"  type="text" required id="emergenciaDerivar" required value="<?php IF(!empty($datos->emergenciaDerivar))echo $datos->emergenciaDerivar; ?>">
                    </div>
                    <!-- OTRO CONTACTO-->    
                    <?php IF(!empty($datosApo[2]->apoNombre)){
                        foreach ($datosApo[2] as $con){
                            $nombreOtroContacto     = $datosApo[2]->apoNombre;
                            $parentescoOtroContacto = $datosApo[2]->apoParentesco;
                            $telUnoOtroContacto     = $datosApo[2]->apoTelefono;
                            $telDosOtroContacto     = $datosApo[2]->apoCelular;
                        }
                    }
                    ?>
                    <div class="col-lg-12">
                        <label class="titulo">Otro N° de contacto</label>
                    </div>
                    <div class="col-lg-2">
                        <label>Nombre</label>
                    </div>
                    <div class='col-lg-4'>
                        <input type="text" minlength="4" name="nombreOtroContacto" value="<?php IF(!empty($nombreOtroContacto))echo $nombreOtroContacto; ?>">
                    </div>
                    <div class="col-lg-2">
                        <label>Parentesco</label>
                    </div>
                    <div class='col-lg-4'>
                        <select name="parentescoOtroContacto">
                            <?php IF(empty($parentescoOtroContacto)): ?>
                                <option selected>Seleccione...</option>   
                            <?php ENDIF; ?>
                            <option value="1" <?php IF($parentescoOtroContacto === '1')echo 'selected'; ?>>Padre</option>
                            <option value="2" <?php IF($parentescoOtroContacto === '2')echo 'selected'; ?>>Madre</option>
                            <option value="3" <?php IF($parentescoOtroContacto === '3')echo 'selected'; ?>>Hijo/a</option>
                            <option value="4" <?php IF($parentescoOtroContacto === '4')echo 'selected'; ?>>Conyuge</option>
                            <option value="5" <?php IF($parentescoOtroContacto === '5')echo 'selected'; ?>>Hermano/a</option>
                            <option value="6" <?php IF($parentescoOtroContacto === '6')echo 'selected'; ?>>Tío/a</option>
                            <option value="7" <?php IF($parentescoOtroContacto === '7')echo 'selected'; ?>>Primo/a</option>
                            <option value="8" <?php IF($parentescoOtroContacto === '8')echo 'selected'; ?>>Otro</option>   
                        </select>
                    </div>
                    <div class="col-lg-12"></div>
                    <div class="col-lg-2">
                        <label>Teléfono Uno</label>
                    </div>
                    <div class='col-lg-4'>
                        <input type="text" minlength="9" pattern="[0-9]{9}" name="telUnoOtroContacto" value="<?php IF(!empty($telUnoOtroContacto))echo $telUnoOtroContacto; ?>">
                    </div>
                    <div class="col-lg-2">
                        <label>Teléfono Dos</label>
                    </div>
                    <div class='col-lg-4'>
                        <input type="text" minlength="9" pattern="[0-9]{9}" name="telDosOtroContacto" value="<?php IF(!empty($telDosOtroContacto))echo $telDosOtroContacto; ?>">
                    </div>
                    <!--FIN OTRO CONTACTO-->   
                
                <div class="col-lg-12" ><hr></div>
                <!-- DATOS DE CONVENIO-->            
                    <div class="col-lg-12">
                    <label class="titulo">Datos de Convenio</label>
                    </div>
                
                    <div class="col-lg-2">
                        <label>Isapre</label>
                    </div>
                    <div class='col-lg-3'>
                        <select name="isapre" id="isapre">
                            <option value="0">Seleccione...</option>
                            <?php foreach($isapre as $is): ?>
                                <option value="<?php echo $is->id;?>" <?php IF ($is->id===$datos->isapre)echo 'selected';?>><?php echo $is->isapre;?></option>
                            <?php endforeach; ?>
                        </select>
                        <?php //echo form_dropdown('isapre', $isapre, $datos->isapre, array('id'=>'isapre','required'=>TRUE));?>
                    </div>
                    <div class="col-lg-1" align="left">
                        <img class="iconCom" src="<?php echo base_url();?>../assets/img/icons/signo.png" id="isapre"/>
                    </div>
                    <div class="btn-group col-lg-2" data-toggle="buttons">
                            <label>Convenio</label>
                    </div>
                    <div class='col-lg-4'>
                        <table>
                            <tbody>
                            <tr>
                                <td style=" width: 30px" align="center"><input type="radio" value="1" name="ges" id="ges" <?php IF ($datos->esGes === 'Si'|| $datos->ges === '1') echo 'checked="true"'; ?>></td>
                                <td style=" width: 75px">Ges</td>
                                <td style=" width: 30px" align="center"><input type="radio" value="2" name="ges" id="libre" <?php IF ($datos->esGes != 'Si' && $datos->ges != '1') echo 'checked="true"'; ?>></td>
                                <td style=" width: 75px">Libre Elección</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-lg-2">
                        <label>Rut Titular</label>
                    </div>
                    <div class='col-lg-4'>
                        <input name="rutTitular"  type="text" required minlength="7" required id="rutTitular" value="<?php IF(!empty($datos->rutTitular))echo formatearRut($datos->rutTitular); ?>">
                    </div>
                    
                    <div class="col-lg-12" ><hr></div>
                    <!-- DATOS DE APODERADO--> 
    <div id="divApo">
                    <?php 
                    //die(var_dump($datosApo[0]));
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
                            
                        }
                        ELSEIF(!empty($datosApo[0]->apoRut) && empty($datosApo[1]->apoRut)){
                            
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

                                $ecoRut         = "";
                                $ecoNombre      = "";
                                $ecoApePat      = ""; 
                                $ecoApeMat      = ""; 
                                $ecoDireccion   = ""; 
                                $ecoTelefono    = ""; 
                                $ecoCelular     = ""; 
                                $ecoEmail       = ""; 
                                $ecoComuna      = ""; 
                                $ecoParentesco  = ""; 
                            
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
                    <div class="col-lg-12">
                    <label class="titulo">Datos de Apoderado</label>
                    </div>
                
                    <div class="col-lg-2">
                        <label>Rut</label>
                    </div>
                    <div class='col-lg-4'>
                        <input  name="rutApo" type="text"  required minlength="7" id="rutApo" value="<?php IF(!empty($apoRut))echo formatearRut($apoRut); ?>">
                    </div> 
                    <div class="col-lg-12" ></div>
    </div>             
<div id="divFichaApoderado"><!--INICIO DIVFICHA APODERADO-->
                    <div class="col-lg-2">
                        <label>Nombres</label>
                    </div>
                    <div class='col-lg-4'>
                        <input name="nombresApo"  type="text" minlength="4" required id="nombresApo" value="<?php echo $apoNombre ?>" >
                    </div>
                    <div class="col-lg-2">
                        <label>Apellido Paterno</label>
                    </div>
                    <div class='col-lg-4'>
                        <input name="apePatApo"  type="text" minlength="4" required id="apePatApo" value="<?php echo $apoApePat ?>">
                    </div> 
                    <div class="col-lg-12"></div>
                    <div class="col-lg-6"></div>
                    <div class="col-lg-2">
                        <label>Apellido Materno</label>
                    </div>
                    <div class='col-lg-4'>
                        <input name="apeMatApo"  type="text" minlength="4" required id="apeMatApo" value="<?php echo $apoApeMat ?>">
                    </div> 
                    <div class="col-lg-12"></div><!--SALTO DE LINEA-->
                    <div class="col-lg-2">
                        <label>Dirección</label>
                    </div>
                    <div class='col-lg-4'>
                        <input name="direccionApo"  type="text" minlength="4" required id="direccionApo" value="<?php echo $apoDireccion ?>">
                    </div>
                    <div class="col-lg-2">
                        <label>Comuna</label>
                    </div>
                    <div class='col-lg-3' >
                        <select name="comunaApo" id="comunaApo">
                            <option value="0">Seleccione...</option>
                            <?php foreach($comuna as $com): ?>
                                <option value="<?php echo $com->id;?>" <?php IF ($com->id===$apoComuna)echo 'selected';?>><?php echo $com->comuna;?></option>
                            <?php endforeach; ?>
                        </select>
                        <?php //echo form_dropdown('comunaApo', comunaApo, $apoComuna, array('id'=>'comunaApo','required'=>TRUE));?>
                    </div>
                    <div class="col-lg-1" align="left">
                        <img class="iconCom" src="<?php echo base_url();?>../assets/img/icons/signo.png" id="iconComApo"/>
                    </div>
                    <div class="col-lg-12" ></div>
                    <div class="col-lg-2">
                        <label>Teléfono Fijo</label>
                    </div>
                    <div class='col-lg-4'>
                        <input name="telFijoApo"  type="text" minlength="9" pattern="[0-9]{9}" id="telFijoApo" value="<?php echo $apoTelefono ?>">
                    </div>
                    <div class="col-lg-2">
                        <label>Teléfono Movil</label>
                    </div>
                    <div class='col-lg-4'>
                        <input name="telMovilApo"  type="text" minlength="9" pattern="[0-9]{9}" required id="telCeluApo" value="<?php echo $apoCelular ?>">
                    </div>
                    <div class="col-lg-12"></div><!--SALTO DE LINEA-->
                    <div class="col-lg-2">
                        <label>Email</label>
                    </div>
                    <div class='col-lg-4'>
                        <input name="emailApo"  type="text" pattern="^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$" title="mail@ejemplo.com" minlength="9" required id="emailApo" value="<?php echo $apoEmail ?>">
                    </div>
                    <div class="col-lg-2">
                        <label>Parentesco</label>
                    </div>
                    <div class='col-lg-4'>
                        <select name="parentescoApo">
                            <option <?php IF($apoParentesco == "1") echo 'selected'; ?> value="1">Padre</option>
                            <option <?php IF($apoParentesco == "2") echo 'selected'; ?> value="2">Madre</option>
                            <option <?php IF($apoParentesco == "3") echo 'selected'; ?> value="3">Hijo</option>
                            <option <?php IF($apoParentesco == "4") echo 'selected'; ?> value="4">Conyuge</option>
                            <option <?php IF($apoParentesco == "5") echo 'selected'; ?> value="5">Hermano/a</option>
                            <option <?php IF($apoParentesco == "6") echo 'selected'; ?> value="6">Tío/a</option>
                            <option <?php IF($apoParentesco == "7") echo 'selected'; ?> value="7">Primo/a</option>
                            <option <?php IF($apoParentesco == "8") echo 'selected'; ?> value="8">Otro</option>                             
                        </select>
                    </div>
</div><!--FiN DIV FICH APODERADO -->
    
                    <div class="col-lg-12" ><hr></div>
                <!-- DATOS DE APODERADO ECONOMICO--> 
            <div id="divEco">
                    <div class="col-lg-12">
                    <label class="titulo">Datos de Apoderado Economico</label>
                    </div>
                
                    <div class="col-lg-2">
                        <label>Rut</label>
                    </div>
                    <div class='col-lg-4'>
                        <input name="rutApoEco"  type="text" minlength="7" id="rutApoEco" value="<?php IF(!empty($ecoRut))echo formatearRut($ecoRut); ?>" >
                    </div> 
                    <div class="col-lg-12"></div>
            </div>   <!--FIN DIV ECO--> 
    <div id="divFichaEconomico"><!--INICIO DIV FICH APODERADO ECONOMICO -->
                    <div class="col-lg-2">
                        <label>Nombres</label>
                    </div>
                    <div class='col-lg-4'>
                        <input name="nombresApoEco"  type="text" minlength="4" required id="nombresApoEco" value="<?php echo $ecoNombre; ?>">
                    </div>
                    <div class="col-lg-2">
                        <label>Apellido Paterno</label>
                    </div>
                    <div class='col-lg-4'>
                        <input name="apePatApoEco"  type="text" minlength="4" required id="apePatApoEco" value="<?php echo $ecoApePat; ?>">
                    </div> 
                    <div class="col-lg-12"></div>
                    <div class="col-lg-6"></div>
                    <div class="col-lg-2">
                        <label>Apellido Materno</label>
                    </div>
                    <div class='col-lg-4'>
                        <input name="apeMatApoEco"  type="text" minlength="4" required id="apeMatApoEco" value="<?php echo $ecoApeMat; ?>">
                    </div> 
                    <div class="col-lg-12"></div><!--SALTO DE LINEA-->
                    <div class="col-lg-2">
                        <label>Dirección</label>
                    </div>
                    <div class='col-lg-4'>
                        <input name="direccionApoEco"  type="text" minlength="4" required id="direccionApoEco" value="<?php echo $ecoDireccion; ?>">
                    </div>
                    <div class="col-lg-2">
                        <label>Comuna</label>
                    </div>
                    <div class='col-lg-3' >
                        <select name="comunaApoEco" id="comunaApoEco">
                            <option value="0">Seleccione...</option>
                            <?php foreach($comuna as $com): ?>
                                <option value="<?php echo $com->id;?>" <?php IF ($com->id===$ecoComuna)echo 'selected';?>><?php echo $com->comuna;?></option>
                            <?php endforeach; ?>
                        </select>
                        <?php //echo form_dropdown('comunaApoEco', $comuna, $ecoComuna, array('id'=>'comunaApoEco','required'=>TRUE));?>
                    </div>
                    <div class="col-lg-1" align="left">
                        <img class="iconCom" src="<?php echo base_url();?>../assets/img/icons/signo.png" id="iconComEco"/>
                    </div>
                    <div class="col-lg-12" ></div><!--SALTO DE LINEA-->
                    <div class="col-lg-2">
                        <label>Teléfono Fijo</label>
                    </div>
                    <div class='col-lg-4'>
                        <input name="telFijoApoEco"  type="text" minlength="9" pattern="[0-9]{9}" id="telFijoApoEco" value="<?php echo $ecoTelefono; ?>">
                    </div>
                    <div class="col-lg-2">
                        <label>Teléfono Movil</label>
                    </div>
                    <div class='col-lg-4'>
                        <input name="telMovilApoEco"  type="text" minlength="9" pattern="[0-9]{9}" required id="telCeluApoEco" value="<?php echo $ecoCelular; ?>">
                    </div>
                    <div class="col-lg-12"></div><!--SALTO DE LINEA-->
                    <div class="col-lg-2">
                        <label>Email</label>
                    </div>
                    <div class='col-lg-4'>
                        <input name="emailApoEco"  type="text" pattern="^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$" title="mail@ejemplo.com" minlength="9" required id="emailApoEco" value="<?php echo $ecoEmail; ?>">
                    </div>
                    <div class="col-lg-2">
                        <label>Parentesco</label>
                    </div>
                    <div class='col-lg-4'>
                        <select name="parentescoEco">
                            <option <?php IF($ecoParentesco == "1") echo 'selected'; ?> value="1">Padre</option>
                            <option <?php IF($ecoParentesco == "2") echo 'selected'; ?> value="2">Madre</option>
                            <option <?php IF($ecoParentesco == "3") echo 'selected'; ?> value="3">Hijo/a</option>
                            <option <?php IF($ecoParentesco == "4") echo 'selected'; ?> value="4">Conyuge</option>
                            <option <?php IF($ecoParentesco == "5") echo 'selected'; ?> value="5">Hermano/a</option>
                            <option <?php IF($ecoParentesco == "6") echo 'selected'; ?> value="6">Tío/a</option>
                            <option <?php IF($ecoParentesco == "7") echo 'selected'; ?> value="7">Primo/a</option>
                            <option <?php IF($ecoParentesco == "8") echo 'selected'; ?> value="8">Otro</option>                            
                        </select>
                    </div>
                    
                    <div class="col-lg-12"><hr></div><!--SALTO DE LINEA-->
<!--INICIO DEVOLUCIONES-->
                    <div class="col-lg-12">
                    <label class="titulo">Datos de Devolución</label>
                    </div>
                    <div class="col-lg-2">
                        <label>Rut</label>
                    </div>
                    <div class='col-lg-4'>
                        <input name="rutDev"  type="text" minlength="7" required id="rutDev" value="<?php IF(!empty($devolucion->ctaRut))echo formatearRut($devolucion->ctaRut); ?>">
                    </div>
                    <div class="col-lg-2">
                        <label>Nombre</label>
                    </div>
                    <div class='col-lg-4'>
                        <input name="nombresDev"  type="text" minlength="4" required id="nombresDev" value="<?php IF(!empty($devolucion->ctaNombre))echo $devolucion->ctaNombre; ?>">
                    </div>
                    <div class="col-lg-12" ></div><!--SALTO DE LINEA-->
                    <div class="col-lg-2">
                        <label>Apellido Paterno</label>
                    </div>
                    <div class='col-lg-4'>
                        <input name="apePatDev"  type="text" minlength="4" required id="apePatDev" value="<?php IF(!empty($devolucion->ctaApellido))echo $devolucion->ctaApellido; ?>">
                    </div>
                    <div class="col-lg-2">
                        <label>Apellido Materno</label>
                    </div>
                    <div class='col-lg-4'>
                        <input name="apeMatDev"  type="text" minlength="4" required id="apeMatDev" value="<?php IF(!empty($devolucion->ctaApellidoM))echo $devolucion->ctaApellidoM; ?>">
                    </div>
                    <div class="col-lg-12" ></div><!--SALTO DE LINEA-->
                    <div class="col-lg-2">
                        <label>Banco</label>
                    </div>
                    <?php //die(var_dump($devolucion)); ?>
                    <div class='col-lg-3'>
                        <?php IF(!empty($devolucion->ctaBanco))$b= $devolucion->ctaBanco; ELSE $b='';?>
                        <select name="banco" id="banco" >
                            <option value="0">Seleccione...</option>
                            <?php foreach($banco as $bc): ?>
                            <option value="<?php echo $bc->banId;?>" <?php IF ($bc->banId===$b)echo 'selected';?>><?php echo $bc->banNombre;?></option>
                            <?php endforeach; ?>
                        </select>
                        <?php //echo form_dropdown('banco', $banco, $b, array('id'=>'banco','required'=>TRUE));?>
                    </div>
                    <div class="col-lg-1" align="middle">
                        <img class="icon" src="<?php echo base_url();?>../assets/img/icons/signo.png" id="iconBanco"/>
                    </div>
                    <div class="col-lg-2">
                        <label>Tipo</label>
                    </div>
                    <div class='col-lg-3' >
                        <?php IF(!empty($devolucion->ctaTipo))$t= $devolucion->ctaTipo; ELSE $t='';?>
                        <select name="tipoCta" id="tipoCta">
                            <option value="0">Seleccione...</option>
                            <?php foreach($tipoCta as $cta): ?>
                                <option value="<?php echo $cta->tipId;?>" <?php IF ($cta->tipId===$t)echo 'selected';?>><?php echo $cta->tipNombre;?></option>
                            <?php endforeach; ?>
                        </select>
                        <?php //echo form_dropdown('tipoCta', $tipoCta, $t, array('id'=>'tipoCta','required'=>TRUE));?>
                    </div>
                    <div class="col-lg-1" align="middle">
                        <img class="icon" src="<?php echo base_url();?>../assets/img/icons/signo.png" id="iconTipo"/>
                    </div>
                    <div class="col-lg-12"></div>
                    <div class="col-lg-2">
                        <label>N° Cta</label>
                    </div>
                    <div class='col-lg-4'>
                        <input name="NCta"  type="text" minlength="4" required id="NCta" value="<?php IF(!empty($devolucion->ctaNumero))echo $devolucion->ctaNumero; ?>">
                    </div>
                    <div class="col-lg-2">
                        <label>Email</label >
                    </div>
                    <div class='col-lg-4'>
                        <input name="emailDev"  type="text" pattern="^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$" title="mail@ejemplo.com" minlength="9" required id="emailDev" value="<?php IF(!empty($devolucion->ctaEmail))echo $devolucion->ctaEmail; ?>">
                    </div>
    </div><!--FiN DIV FICH APODERADO ECONOMICO -->
                <div class='col-lg-12'></div>
                    <div class="col-lg-12">
                        <?php echo form_submit('','Guardar','class="btn btn-primary btn-sm btnCetep"');?>
                        <button onclick="goBack()" class="btn btn-default btn-sm">Cancelar</button><script>function goBack(){window.history.go(-1);}</script>
                
                    </div>
</div><!-- FIN DIV FICHA COMPLETA-->
                <div class="col-lg-12" ><hr></div>
            <?php echo form_close();?>
                
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


<script>
    //$("#divFicha").hide(); 
    //$("#divFichaApoderado").hide(); 
    //$("#divFichaEconomico").hide();
    $(".icon").hide();
    $(".iconCom").hide();
    var rut = $( "#rut" ).val();var rutApo = $( "#rutApo" ).val();var rutEco = $( "#rutApoEco" ).val();
    if (rut===''){
        $("#rut").attr("disabled", false).css("box-shadow","0 0 15px red");
    }
    if (rutApo===''){
    $("#rutApo").attr("disabled", false).css("box-shadow","0 0 15px red");
    }
    if (rutEco===''){
    $("#rutApoEco").attr("disabled", false).css("box-shadow","0 0 15px red");
    }
    
</script>
<script type="text/javascript">
    function goBack()
    {
        window.history.go(-1);
    }
</script>
<script>
    $("#form").submit(function () {  
    $(".icon").hide();
    $(".iconCom").hide();
    if($("#banco").val()==0) {  
        $("#iconBanco").show();
        //alert("Banco Requerido");  
        return false;
    } 
    if($("#tipoCta").val()==0) {  
        $("#iconTipo").show();
        //alert("Cta Requerido");  
        return false;
    }
    if($("#comuna").val()==0) {  
        $("#iconComPas").show();
        //alert("Cta Requerido");  
        return false;
    }
    if($("#comunaApo").val()==0) {  
        $("#iconComApo").show();
        //alert("Cta Requerido");  
        return false;
    }
    if($("#comunaApoEco").val()==0) {  
        $("#iconComEco").show();
        //alert("Cta Requerido");  
        return false;
    }
    if($("#isapre").val()==0) {  
        $("#iconIsapre").show();
        //alert("Cta Requerido");  
        return false;
    }
    
});  
</script>
<script>
        
        $("#rutApo").focusout(function(){
        ////LIMPIAR INPUTS
        document.getElementById("nombresApo").value = ""; document.getElementById("apePatApo").value = ""; document.getElementById("telFijoApo").value = ""; document.getElementById("telCeluApo").value = ""; document.getElementById("direccionApo").value = ""; document.getElementById("emailApo").value = ""; document.getElementById("rutApoEco").value = "";
        $("#rutApoEco").attr("disabled", false).css("border-color","#ccc");
        $("#rutApo").attr("disabled", false).css("box-shadow","0 0 0px");//SACAR ROJO CONTORNO
        $("#divFichaApoderado").show();  
        var rut = $( "#rutApo" ).val();
        var rut = rut.replace(".", "");var rut = rut.replace("-", "");var rut = rut.replace(",", ""); var rut = rut.replace(".", "");
        var rut = rut.substring(0, 8);
       
        $.ajax({
            type: "GET",
            url: "<?php echo base_url(); ?>" + "api/ingresos/index/"+rut,
            dataType: 'json',
            
            success: function(data){
                
                if (data.nombres != undefined){document.getElementById("nombresApo").value          = data.nombres;}
                if (data.apellidoPaterno != undefined){document.getElementById("apePatApo").value   = data.apellidoPaterno;}
                if (data.apellidoMaterno != undefined){document.getElementById("apeMatApo").value   = data.apellidoMaterno;}
                if (data.telefono != undefined){document.getElementById("telFijoApo").value         = data.telefono;}
                if (data.celular != undefined){document.getElementById("telCeluApo").value          = data.celular;}
                if (data.direccion != undefined){document.getElementById("direccionApo").value      = data.direccion;}
                if (data.email != undefined){document.getElementById("emailApo").value              = data.email;}
                if (data.rut != undefined && data.rut != '0'){document.getElementById("rutApoEco").value               = data.rut;}
               }
        })
        })
        
        $("#rutApoEco").focusout(function(){
        ////LIMPIAR INPUTS
        document.getElementById("nombresApoEco").value = ""; document.getElementById("apePatApoEco").value = ""; document.getElementById("telFijoApoEco").value = ""; document.getElementById("telCeluApoEco").value = ""; document.getElementById("direccionApoEco").value = ""; document.getElementById("emailApoEco").value = "";
        //$("#rutEco").attr("disabled", false).css("border-color","#ccc");
        $("#rutApoEco").attr("disabled", false).css("box-shadow","0 0 0px");//SACAR ROJO CONTORNO
        $("#divFichaEconomico").show();  
        var rut = $( "#rutApoEco" ).val();
        var rut = rut.replace(".", "");var rut = rut.replace("-", "");var rut = rut.replace(",", ""); var rut = rut.replace(".", "");
        var rut = rut.substring(0, 8);
       
        $.ajax({
            type: "GET",
            url: "<?php echo base_url(); ?>" + "api/ingresos/index/"+rut,
            dataType: 'json',
            
            success: function(data){
                
                if (data.nombres != undefined){document.getElementById("nombresApoEco").value           = data.nombres;}
                if (data.apellidoPaterno != undefined){document.getElementById("apePatApoEco").value    = data.apellidoPaterno;}
                if (data.apellidoMaterno != undefined){document.getElementById("apeMatApoEco").value    = data.apellidoMaterno;}
                if (data.telefono != undefined){document.getElementById("telFijoApoEco").value          = data.telefono;}
                if (data.celular != undefined){document.getElementById("telCeluApoEco").value           = data.celular;}
                if (data.direccion != undefined){document.getElementById("direccionApoEco").value       = data.direccion;}
                if (data.email != undefined){document.getElementById("emailApoEco").value               = data.email;}
            }
        })
        })
        
        $("#rutDev").focusout(function(){
        ////LIMPIAR INPUTS
        document.getElementById("emailDev").value = ""; document.getElementById("nombresDev").value = ""; document.getElementById("apePatDev").value = "";
        //$("#rutEco").attr("disabled", true).css("background-color","transparent");
        var rut = $( "#rutDev" ).val();
        var rut = rut.replace(".", "");var rut = rut.replace("-", "");var rut = rut.replace(",", ""); var rut = rut.replace(".", "");
        var rut = rut.substring(0, 8);
       
        $.ajax({
            type: "GET",
            url: "<?php echo base_url(); ?>" + "api/ingresos/index/"+rut,
            dataType: 'json',
            
            success: function(data){
                
                //AUTOCOMPLETA CAMPOS DEVOLUCIONES
                if (data.email != undefined){document.getElementById("emailDev").value              = data.email;}
                if (data.nombres != undefined){document.getElementById("nombresDev").value          = data.nombres;}
                if (data.apellidoPaterno != undefined){document.getElementById("apePatDev").value   = data.apellidoPaterno;}
                if (data.apellidoMaterno != undefined){document.getElementById("apeMatDev").value   = data.apellidoMaterno;}
                if (data.ctaNumero != undefined){document.getElementById("NCta").value              = data.ctaNumero;}
               }
        })
        })
        
    

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
    //////VALIDACIONES DE TECLAS//////
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
        $("#telFijo").keydown(function (e) {
            if (event.keyCode > 95 && event.keyCode < 106 || event.keyCode == 27 || event.keyCode == 8 || event.keyCode == 9 || event.keyCode > 47 && event.keyCode < 58)
            {}
            else {alert('Ingrese un telefono valido');event.returnValue = false;}
        });
        $("#telCelu").keydown(function (e) {
            if (event.keyCode > 95 && event.keyCode < 106 || event.keyCode == 27 || event.keyCode == 8 || event.keyCode == 9 || event.keyCode > 47 && event.keyCode < 58)
            {}
            else {alert('Ingrese un telefono valido');event.returnValue = false;}
        });
        $("#telFijoApo").keydown(function (e) {
            if (event.keyCode > 95 && event.keyCode < 106 || event.keyCode == 27 || event.keyCode == 8 || event.keyCode == 9 || event.keyCode > 47 && event.keyCode < 58)
            {}
            else alert('Ingrese un telefono valido');{event.returnValue = false;}
        });
        $("#telCeluApo").keydown(function (e) {
            if (event.keyCode > 95 && event.keyCode < 106 || event.keyCode == 27 || event.keyCode == 8 || event.keyCode == 9 || event.keyCode > 47 && event.keyCode < 58)
            {}
            else {alert('Ingrese un telefono valido');event.returnValue = false;}
        });
        $("#nombres").keydown(function (e) {
            if (event.keyCode > 95 && event.keyCode < 106 || event.keyCode > 47 && event.keyCode < 58)
            {alert('Ingrese un nombre valido');event.returnValue = false;}
        });
        $("#apeMat").keydown(function (e) {
            if (event.keyCode > 95 && event.keyCode < 106 || event.keyCode > 47 && event.keyCode < 58)
            {alert('Ingrese un apellido valido');event.returnValue = false;}
        });
        $("#apePat").keydown(function (e) {
            if (event.keyCode > 95 && event.keyCode < 106 || event.keyCode > 47 && event.keyCode < 58)
            {alert('Ingrese un apellido valido');event.returnValue = false;}
        });
        $("#nombresApo").keydown(function (e) {
            if (event.keyCode > 95 && event.keyCode < 106 || event.keyCode > 47 && event.keyCode < 58)
            {alert('Ingrese un nombre valido');event.returnValue = false;}
        });
        $("#apeMatApo").keydown(function (e) {
            if (event.keyCode > 95 && event.keyCode < 106 || event.keyCode > 47 && event.keyCode < 58)
            {alert('Ingrese un apellido valido');event.returnValue = false;}
        });
        $("#apePatApo").keydown(function (e) {
            if (event.keyCode > 95 && event.keyCode < 106 || event.keyCode > 47 && event.keyCode < 58)
            {alert('Ingrese un apellido valido');event.returnValue = false;}
        });

</script>

