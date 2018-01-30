<?php //error_reporting(E_ALL ^ E_NOTICE); ?>

<style>
    .titulo{
        color: #a15ebe;
    }
    
    .icon{
            width: 25px;
            padding-top: 5%;
            padding-left: 5%;
    }
    .iconCom{
            width: 23px;
            padding-top: 6%;
            margin-left: -69px;
    }
    .iconSexo{
            width: 23px;
            margin-left: -59px;
    }
    .iconFecha{
            width: 23px;
            padding-top: 30%;
            margin-left: -165px;
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
    		
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 bhoechie-tab-container"  >
            <?php $attributes = array('id' => 'form');
                
                echo form_open('hd_admision/ingresos/guardarficha',$attributes);
                
            ?>
        <input type="hidden" name="registro" value="<?php IF(!empty($datos->id))echo $datos->id;ELSE echo '0';?>" id="registro">
                           
            <div class='widget-content'>
                
                <br>
                    <div class="col-lg-12">
                        <label class="titulo">Datos de Ficha</label>
                    </div>
                    <div class="col-lg-2">
                        <label>Rut</label>
                    </div>
                    <div class='col-lg-4'>
                        <input name="rut"  type="text" placeholder="Digite run de paciente" minlength="7" required id="rut" value="<?php IF(!empty($datos->rut))echo formatearRut($datos->rut);?>"><br><h7 style="font-size:8px">&nbsp;&nbsp;&nbsp;ejemplo 12345678-9</h7>
                    </div>
                    
<div id="divFicha"><!--COMIENZO TRATAMIENTO DE FICHA-->
                     
                    <div class="col-lg-2">
                        <label>N° Ficha</label>
                    </div>
                    <div class='col-lg-4'>
                        <input name="ficha"  type="text" minlength="1" id="ficha" placeholder="Solo paciente antiguo" value="<?php IF(!empty($datos->ficha))echo $datos->ficha;?>">
                    </div> 
                    <div class="col-lg-6"></div><div class="col-lg-6"><h7 style=" font-size: 9px; margin-top: -15px">(Dejar en blanco, solo completar con pacientes antiguos con ficha ya registrada)</h7></div>
                    <div class="col-lg-12"></div>
                    <div class="col-lg-2">
                        <label>Fecha de Ingreso</label>
                    </div>
                    <div class='col-lg-4'>
                        <div class="input-group input-group-sm date datepicker" required data-date="<?php //echo (new DateTime())->format('Y-m-d H:i:s') ?>" data-date-format="yyyy-mm-dd">
                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                            <input type="text" class="form-control" required placeholder="día-mes-año" style=" width: 158px !important" name="fechaIngreso" minlength="10" maxlength="10" title="Ingrese una fecha valida" value="<?php IF(empty($modificar))echo date('d-m-Y');ELSEIF(!empty($datos->fechaIngreso))echo $datos->fechaIngreso;?>">
                        </div>
                    </div> 
                    <div class="col-lg-2">
                        <label>Tipo de Ingreso</label>
                    </div>
                    <div class='col-lg-3' >
                        <table>
                            <tbody>
                            <tr>
                                <td style=" width: 30px" align="center"><div id="hdia"><input type="radio" name="tipoIngreso" value="2" id="hdia" <?php IF(!empty($datos->tipoIngreso)){IF($datos->tipoIngreso === '2')echo 'checked';} ELSE {echo 'checked';};?>></div></td>
                                <td style=" width: 110px">Hospital de día</td>
                                <td style=" width: 30px" align="center"><div id="reha"><input type="radio" name="tipoIngreso" value="3" id="reha" <?php IF(!empty($datos->tipoIngreso)){IF($datos->tipoIngreso === '3')echo 'checked';};?>></div></td>
                                <td style=" width: 75px">Rehabilitación</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-lg-1" align="center">
                        <img class="iconSexo" src="<?php echo base_url();?>../assets/img/icons/signo.png" id="iconTipo"/>
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
                        <input name="nombres"  type="text" minlength="3" required id="nombres" value="<?php IF(!empty($datos->nombres))echo strtoupper($datos->nombres);?>">
                    </div>
                    <div class="col-lg-2">
                        <label>Apellido Paterno</label>
                    </div>
                    <div class='col-lg-4'>
                        <input name="apePat"  type="text" minlength="3" required id="apePat" value="<?php IF(!empty($datos->apellidoPaterno))echo strtoupper($datos->apellidoPaterno);?>">
                    </div> 
                    <div class="col-lg-12" ></div>
                    <div class="col-lg-2">
                        <label>Apellido Materno</label>
                    </div>
                    <div class='col-lg-4'>
                        <input name="apeMat"  type="text" minlength="3" id="apeMat" value="<?php IF(!empty($datos->apellidoMaterno))echo strtoupper($datos->apellidoMaterno);?>">
                    </div>     
                    <div class="col-lg-2">
                        <label>Sexo</label>
                    </div>
                    <div class='col-lg-3' id="sex">
                        <table>
                            <tbody>
                            <tr>
                                <td style=" width: 30px" align="center"><div id="masc"><input type="radio" name="sexo" value="MASCULINO" id="masculino" <?php IF(!empty($datos->sexo)){IF($datos->sexo === 'MASCULINO')echo 'checked';};?>></div></td>
                                <td style=" width: 75px">Masculino</td>
                                <td style=" width: 30px" align="center"><div id="fem"><input type="radio" name="sexo" value="FEMENINO" id="femenino"    <?php IF(!empty($datos->sexo)){IF($datos->sexo === 'FEMENINO')echo 'checked';};?>></div></td>
                                <td style=" width: 75px">Femenino</td>
                            </tr>
                            </tbody>
                        </table>
                        
                    </div>
                    <div class="col-lg-1" align="left">
                        <img class="iconSexo" src="<?php echo base_url();?>../assets/img/icons/signo.png" id="iconSexo"/>
                    </div>
                    <div class="col-lg-12" ></div>
                    <div class="col-lg-2">
                        <label>Fecha de Nacimiento</label>
                    </div>
                    <div class="col-lg-3">
                        <div class="input-group input-group-sm date datepicker" required data-date="<?php //echo (new DateTime())->format('Y-m-d H:i:s') ?>" data-date-format="yyyy-mm-dd">
                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                            <input type="text" class="form-control" placeholder="día-mes-año" style=" width: 158px !important" name="fecha" id="fecha" minlength="10" maxlength="10" title="Ingrese una fecha valida" value="<?php IF(!empty($datos->fechaNacimiento))echo $datos->fechaNacimiento;?>">
                        </div>
                    </div>
                    <div class="col-lg-1" align="middle">
                        <img class="iconFecha" src="<?php echo base_url();?>../assets/img/icons/signo.png" id="iconFecha"/>
                    </div>
                    <div class="col-lg-2">
                        <label>Nacionalidad</label>
                    </div>
                    <div class='col-lg-3'>
                        <table>
                            <tbody>
                            <tr>
                                <td style=" width: 30px" align="center"><input value="1" type="radio" name="nac" id="chileno" <?php IF(!empty($datos->nacionalidad)){IF($datos->nacionalidad === '1')echo 'checked';}ELSE echo 'checked';?>></td>
                                <td style=" width: 75px">Chilena</td>
                                <td style=" width: 30px" align="center"><input value="2" type="radio" name="nac" id="extranjero" <?php IF(!empty($datos->nacionalidad)){IF($datos->nacionalidad === '2')echo 'checked';}?>></td>
                                <td style=" width: 75px">Extranjera</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-lg-1" align="left">
                        <img class="iconSexo" src="<?php echo base_url();?>../assets/img/icons/signo.png" id="iconNac"/>
                    </div>
                <div class="col-lg-12" ></div>
                <!-- DATOS DE CONTACTO-->            
                    
           
                    <div class="col-lg-2">
                        <label>Dirección</label>
                    </div>
                    <div class='col-lg-4'>
                        <input name="direccion"  type="text" minlength="4" id="direccion" value="<?php IF(!empty($datos->direccion))echo strtoupper($datos->direccion);?>">
                    </div>
                    <div class="col-lg-2">
                        <label>Comuna</label>
                    </div>
                
                    <div class='col-lg-3' >
                        <select name="comuna" id="comuna">
                            <option value="0">Seleccione...</option>
                            <?php foreach($comuna as $com): ?>
                                <option value="<?php echo $com->id;?>" <?php IF(!empty($datos->comId)){IF($datos->comId===$com->id) echo 'selected';}?>><?php echo $com->comuna;?></option>
                            <?php endforeach; ?>
                        </select>
                        <?php //echo form_dropdown('comuna', $comuna, '', array('id'=>'comuna','required'=>TRUE));?>
                    </div>
                    <div class="col-lg-1" align="left">
                        <img class="iconCom" src="<?php echo base_url();?>../assets/img/icons/signo.png" id="iconComPas"/>
                    </div>
                    <div class="col-lg-12" ></div>
                    <div class="col-lg-2">
                        <label>Teléfono Fijo</label>
                    </div>
                    <div class='col-lg-4'>
                        <input name="telFijo"  type="text" minlength="9" pattern="[0-9]{9}" id="telFijo" title="Ingrese 9 números" value="<?php IF(!empty($datos->telefono))echo $datos->telefono;?>" ><h7 style=" font-size: 8px"> (campo no obligatorio)</h7>
                    </div>
                    <div class="col-lg-2">
                        <label>Teléfono Movil</label>
                    </div>
                    <div class='col-lg-4'>
                        <input name="telMovil" type="text" minlength="9" pattern="[0-9]{9}" id="telCelu" title="Ingrese 9 números" value="<?php IF(!empty($datos->celular))echo $datos->celular;?>">
                    </div>
                    <div class="col-lg-12"></div>
                    <div class="col-lg-2">
                        <label>Ocupación</label>
                    </div>
                    <div class='col-lg-4'>
                        <input name="ocupacion"  type="text" minlength="4"  id="ocupacion" value="<?php IF(!empty($datos->ocupacion))echo $datos->ocupacion;?>">
                    </div>
                    <div class="col-lg-2">
                        <label>Email</label>
                    </div>
                    <div class='col-lg-4'>
                        <input name="email" type="text" minlength="9" id="email" pattern="^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$" title="mail@ejemplo.com" value="<?php IF(!empty($datos->email))echo $datos->email;?>" ><h7 style=" font-size: 8px"> (campo no obligatorio)</h7>
                    </div>
                
                    
                    
                    
   <!-- INICIO APODERADO-->                
                    <div class="col-lg-12" ><hr></div>
                    <!-- DATOS DE APODERADO--> 
    <div id="divApo">
                    <div class="col-lg-12">
                    <label class="titulo">Datos de Apoderado</label>
                    </div>
                
                    <div class="col-lg-2">
                        
                        <label>Rut</label>
                    </div>
                    <div class='col-lg-4'>
                        <input name="rutApo" type="text" minlength="7" placeholder="Digite run de apoderado" id="rutApo" value="<?php IF(!empty($datosApo[0]->apoRut))echo formatearRut($datosApo[0]->apoRut);?>"><br><h7 style="font-size:8px">&nbsp;&nbsp;&nbsp;ejemplo 12345678-9</h7>
                    </div> 
                    <div class="col-lg-12" ></div>
    </div>             
<div id="divFichaApoderado"><!--INICIO DIVFICHA APODERADO-->
                    <div class="col-lg-2">
                        <label>Nombres</label>
                    </div>
                    <div class='col-lg-4'>
                        <input name="nombresApo"  type="text" minlength="3" id="nombresApo" value="<?php IF(!empty($datosApo[0]->apoNombre))echo strtoupper($datosApo[0]->apoNombre);?>">
                    </div>
                    <div class="col-lg-2">
                        <label>Apellido Paterno</label>
                    </div>
                    <div class='col-lg-4'>
                        <input name="apePatApo"  type="text" minlength="3" id="apePatApo" value="<?php IF(!empty($datosApo[0]->apoApePat))echo strtoupper($datosApo[0]->apoApePat);?>">
                    </div> 
                    <div class="col-lg-12"></div><!--SALTO DE LINEA-->
                    <div class="col-lg-6"></div>
                    <div class="col-lg-2">
                        <label>Apellido Materno</label>
                    </div>
                    <div class='col-lg-4'>
                        <input name="apeMatApo"  type="text" minlength="3" id="apeMatApo" value="<?php IF(!empty($datosApo[0]->apoApeMat))echo strtoupper($datosApo[0]->apoApeMat);?>">
                    </div> 
                    <div class="col-lg-12"></div><!--SALTO DE LINEA-->
                    <div class="col-lg-2">
                        <label>Dirección</label>
                    </div>
                    <div class='col-lg-4'>
                        <input name="direccionApo"  type="text" minlength="4" id="direccionApo" value="<?php IF(!empty($datosApo[0]->apoDireccion))echo strtoupper($datosApo[0]->apoDireccion);?>">
                    </div>
                    <div class="col-lg-2">
                        <label>Comuna</label>
                    </div>
                    <div class='col-lg-3' >
                        <select name="comunaApo" id="comunaApo">
                            <option value="0">Seleccione...</option>
                            <?php foreach($comuna as $com): ?>
                            <option value="<?php echo $com->id;?>" <?php IF(!empty($datosApo[0]->apoComuna)){IF($datosApo[0]->apoComuna===$com->id)echo 'selected';} ;?>><?php echo $com->comuna;?></option>
                            <?php endforeach; ?>
                        </select>
                        <?php //echo form_dropdown('comunaApo', $comuna, '', array('id'=>'comunaApo','required'=>TRUE));?>
                    </div>
                    <div class="col-lg-1" align="left">
                        <img class="iconCom" src="<?php echo base_url();?>../assets/img/icons/signo.png" id="iconComApo"/>
                    </div>
                    <div class="col-lg-12" ></div>
                    <div class="col-lg-2">
                        <label>Teléfono Fijo</label>
                    </div>
                    <div class='col-lg-4'>
                        <input name="telFijoApo"  type="text" minlength="9" pattern="[0-9]{9}" id="telFijoApo" value="<?php IF(!empty($datosApo[0]->apoTelefono))echo $datosApo[0]->apoTelefono;?>"><h7 style=" font-size: 8px"> (campo no obligatorio)</h7>
                    </div>
                    <div class="col-lg-2">
                        <label>Teléfono Movil</label>
                    </div>
                    <div class='col-lg-4'>
                        <input name="telMovilApo"  type="text" minlength="9" pattern="[0-9]{9}" id="telCeluApo" value="<?php IF(!empty($datosApo[0]->apoCelular))echo $datosApo[0]->apoCelular;?>">
                    </div>
                    <div class="col-lg-12"></div><!--SALTO DE LINEA-->
                    <div class="col-lg-2">
                        <label>Email</label>
                    </div>
                    <div class='col-lg-4'>
                        <input name="emailApo" type="text" minlength="9" id="emailApo" pattern="^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$" title="mail@ejemplo.com" value="<?php IF(!empty($datosApo[0]->apoEmail))echo strtoupper($datosApo[0]->apoEmail);?>"><h7 style=" font-size: 8px"> (campo no obligatorio)</h7>
                    </div>
                    <div class="col-lg-2">
                        <label>Parentesco</label>
                    </div>
                    <div class='col-lg-4'>
                        <select name="parentescoApo" id="parentescoApo">
                            <option value="1" <?php IF(!empty($datosApo[0]->apoParentesco)){IF($datosApo[0]->apoParentesco==='1')echo 'selected';};?> >Padre</option>
                            <option value="2" <?php IF(!empty($datosApo[0]->apoParentesco)){IF($datosApo[0]->apoParentesco==='2')echo 'selected';};?>>Madre</option>
                            <option value="3" <?php IF(!empty($datosApo[0]->apoParentesco)){IF($datosApo[0]->apoParentesco==='3')echo 'selected';};?>>Hijo/a</option>
                            <option value="4" <?php IF(!empty($datosApo[0]->apoParentesco)){IF($datosApo[0]->apoParentesco==='4')echo 'selected';};?>>Conyuge</option>
                            <option value="5" <?php IF(!empty($datosApo[0]->apoParentesco)){IF($datosApo[0]->apoParentesco==='5')echo 'selected';};?>>Hermano/a</option>    
                            <option value="6" <?php IF(!empty($datosApo[0]->apoParentesco)){IF($datosApo[0]->apoParentesco==='6')echo 'selected';};?>>Tío/a</option>
                            <option value="7" <?php IF(!empty($datosApo[0]->apoParentesco)){IF($datosApo[0]->apoParentesco==='7')echo 'selected';};?>>Primo/a</option>
                            <option value="8" <?php IF(!empty($datosApo[0]->apoParentesco)){IF($datosApo[0]->apoParentesco==='8')echo 'selected';};?>>Otro</option>                            
                        </select>
                    </div>
</div>
                    
  <!-- CIERRE APODERADO-->                  
                    
                    
                <!-- OTRO CONTACTO-->    
                    <div class="col-lg-12" >
                    <label class="titulo">Otro N° de contacto</label> 
                    <label style="font-size:9px"><br>(Completar solo para tercer apoderado)</label>
                    </div>
                    <div class="col-lg-2">
                        <label>Nombre</label>
                    </div>
                    <div class='col-lg-4'>
                        <input type="text" minlength="4" name="nombreOtroContacto" id="nombreOtroContacto" value="<?php IF(!empty($datosApo[2]->apoNombre))echo $datosApo[2]->apoNombre;?>"><h7 style=" font-size: 8px"> (campo no obligatorio)</h7>
                    </div>
                    <div class="col-lg-2">
                        <label>Parentesco</label>
                    </div>
                    <div class='col-lg-4'>
                        <select name="parentescoOtroContacto" required id="parentescoOtroContacto">
                            <option value="1" <?php IF(!empty($datosApo[2]->apoParentesco)){IF($datosApo[2]->apoParentesco==='1')echo 'selected';};?>>Padre</option>
                            <option value="2" <?php IF(!empty($datosApo[2]->apoParentesco)){IF($datosApo[2]->apoParentesco==='2')echo 'selected';};?>>Madre</option>
                            <option value="3" <?php IF(!empty($datosApo[2]->apoParentesco)){IF($datosApo[2]->apoParentesco==='3')echo 'selected';};?>>Hijo/a</option>
                            <option value="4" <?php IF(!empty($datosApo[2]->apoParentesco)){IF($datosApo[2]->apoParentesco==='4')echo 'selected';};?>>Conyuge</option>
                            <option value="5" <?php IF(!empty($datosApo[2]->apoParentesco)){IF($datosApo[2]->apoParentesco==='5')echo 'selected';};?>>Hermano/a</option>    
                            <option value="6" <?php IF(!empty($datosApo[2]->apoParentesco)){IF($datosApo[2]->apoParentesco==='6')echo 'selected';};?>>Tío/a</option>
                            <option value="7" <?php IF(!empty($datosApo[2]->apoParentesco)){IF($datosApo[2]->apoParentesco==='7')echo 'selected';};?>>Primo/a</option>
                            <option value="8" <?php IF(!empty($datosApo[2]->apoParentesco)){IF($datosApo[2]->apoParentesco==='8')echo 'selected';};?>>Otro</option>                           
                        </select><h7 style=" font-size: 8px"> (campo no obligatorio)</h7>
                    </div>
                <div class="col-lg-12"></div>
                    <div class="col-lg-2">
                        <label>Teléfono Uno</label>
                    </div>
                    <div class='col-lg-4'>
                        <input type="text" minlength="9" pattern="[0-9]{9}" title="Ingrese un telefono válido" name="telUnoOtroContacto" id="telUnoOtroContacto" value="<?php IF(!empty($datosApo[2]->apoTelefono))echo $datosApo[2]->apoTelefono;?>"><h7 style=" font-size: 8px"> (campo no obligatorio)</h7>
                    </div>
                    <div class="col-lg-2">
                        <label>Teléfono Dos</label>
                    </div>
                    <div class='col-lg-4'>
                        <input type="text" minlength="9" pattern="[0-9]{9}" title="Ingrese un telefono válido" name="telDosOtroContacto" id="telDosOtroContacto" value="<?php IF(!empty($datosApo[2]->apoCelular))echo $datosApo[2]->apoCelular;?>"><h7 style=" font-size: 8px"> (campo no obligatorio)</h7>
                    </div>
                    <!--FIN OTRO CONTACTO-->     
                    <div class="col-lg-12"><hr></div>
                    
                <!--DATOS CLINICOS-->
                    <div class="col-lg-12">
                    <label class="titulo">Datos Clínicos</label>
                    </div>
                    <div class="col-lg-2">
                        <label>En caso de emergencia, derivar a</label>
                    </div>
                    <div class='col-lg-4'>
                        <input name="emergenciaDerivar" type="text" id="emergenciaDerivar" value="<?php IF(!empty($datos->emergenciaDerivar))echo strtoupper($datos->emergenciaDerivar);?>">
                    </div>   
                    <div class="col-lg-2">
                        <label>Alergia: </label>
                    </div>
                    <div class='col-lg-4'>
                        <input name="alergias" id="alergias" placeholder="Ninguna" type="text" value="<?php IF(!empty($datos->alergia))echo strtoupper($datos->alergia);?>">
                    </div>
                <!--
                    <div class="col-lg-12"></div>
                    <div class="col-lg-2">
                        <label>Diagnóstico Derivación: </label>
                    </div>
                    <div class='col-lg-4'>
                        <!--
                        <p><?php IF(!empty($datos->diagnosticoDerivacion))echo $datos->diagnosticoDerivacion;?></p>
                        
                        
                        <input type="text" name="diagnosticoDerivacion" value="<?php IF(!empty($datos->diagnosticoDerivacion))echo $datos->diagnosticoDerivacion;?>">
                        
                    </div>
                    <div class="col-lg-2">
                        <label>Medico Solicitante: </label>
                    </div>
                    <div class='col-lg-4'>
                        <!--
                        <p><?php IF(!empty($datos->nombresMedicoSolicitante))echo $datos->nombresMedicoSolicitante.' '.$datos->apellidoPaternoMedicoSolicitante.' '.$datos->apellidoMaternoMedicoSolicitante;?></p>
                        
                        <input name="medicoSolicitante" type="text" value="<?php IF(!empty($datos->nombresMedicoSolicitante))echo $datos->nombresMedicoSolicitante.' '.$datos->apellidoPaternoMedicoSolicitante.' '.$datos->apellidoMaternoMedicoSolicitante;?>">
                        
                    </div>
                -->
                    <div class="col-lg-12"></div>
                    <div class="col-lg-2">
                        <label>Medico Asignado: </label>
                    </div>
                    <div class='col-lg-4'>
                        <select name="medicoAsignado" id="medicoAsignado">
                            <?php foreach($medico as $med): ;?>
                            <?php //IF ($med->id === $datos->medicoAsignado) echo '<option value="'.$datos->medicoAsignado.'" selected>'.strtoupper($datos->apellidomedicoAsignado).' '.strtoupper($datos->nombresmedicoAsignado).'</option';?>
                            <option value="<?php echo $med->id; ?>" <?php IF(!empty($datos->medicoAsignado)){IF($datos->medicoAsignado===$med->id)  echo 'selected';};?>><?php echo strtoupper($med->apellidoPaterno).' '.strtoupper($med->apellidoMaterno).' '.strtoupper($med->nombres); ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
<!--DERIVACION-->
                    <div class="col-lg-2">
                        <label>Derivación Centro</label>
                    </div>
                    <div class='col-lg-3' id="selectDerivacion">
                        <select name="origenDerivacion" id="origenDerivaciones">
                            <option value="0">Seleccione...</option>
                        <?php foreach ($derivacion as $der){ ?>
                            <option value="<?php echo $der->derId; ?>" <?php IF(!empty($datos->origenDerivacion)){IF($datos->origenDerivacion===$der->derId)  echo 'selected';};?>><?php echo $der->derNombre; ?></option>
                        <?php } ?>
                        </select>
                    </div>
                    <div class='col-lg-3' id="otraDerivaciones"><input type="text" name="otraDerivacion" id="otraDerivacion" placeholder="Ingrese Derivación"></div>
                    <div class="col-lg-1" align="left">
                        <img class="iconSexo" src="<?php echo base_url();?>../assets/img/icons/signo.png" id="iconDerivacion"/>
                    </div>
                    <div class="col-lg-12" style="margin-top: 10px"></div>
                    <div class="col-lg-2">
                        <label>TO Asignado</label>
                    </div>
                    <div class='col-lg-4'>
                        <select name="TOAsignado" id="TOAsignado">
                        <?php foreach ($TO as $TOs){ ?>
                            <option value="<?php echo $TOs->id; ?>" <?php IF(!empty($datos->TOAsignado)){IF($datos->TOAsignado===$TOs->id)  echo 'selected';};?>><?php echo strtoupper($TOs->nombre).' '.strtoupper($TOs->apePat).' '.strtoupper($TOs->apeMat); ?></option>
                        <?php } ?>
                        </select>
                    </div>
                    <div class="col-lg-2">
                        <label>Derivación Médico</label>
                    </div>
                    <div class='col-lg-4'>
                        <input name="medicoDerivador" type="text" value="<?php IF(!empty($datos->nombresMedicoSolicitante))echo $datos->nombresMedicoSolicitante;?>">
                    </div>
                    <div class="col-lg-12" style="margin-top: 10px"></div>                    
                    <div class="col-lg-2">
                        <label>Psícologo Asignado</label>
                    </div>
                    <div class='col-lg-4'>
                    <select name="PSAsignado" id="PSAsignado">
                            <option value="0">Seleccione...</option>
                        <?php foreach ($PS as $PSs){ ?>
                            <option value="<?php echo $PSs->id; ?>" <?php IF(!empty($datos->PSAsignado)){IF($datos->PSAsignado===$PSs->id)  echo 'selected';};?>><?php echo strtoupper($PSs->nombre).' '.strtoupper($PSs->apePat).' '.strtoupper($PSs->apeMat); ?></option>
                        <?php } ?>
                        </select>
                    </div>
                    
                    <div class="col-lg-12" style="margin-top: 10px"></div>
                    <div class="col-lg-2">
                        <label>Diagnóstico: </label>
                    </div>
                    <div class='col-lg-2'>
                        <select name="diagnostico" >
                            <option>Seleccione...</option>
                            <option value="15 EQZ" <?php IF(!empty($datos->diagnostico) && $datos->diagnostico === '15 EQZ')echo "selected";?>>15 EQZ</option>
                            <option value="34 DEP" <?php IF(!empty($datos->diagnostico) && $datos->diagnostico === '34 DEP')echo "selected";?>>34 DEP</option>
                            <option value="75 TAB"  <?php IF(!empty($datos->diagnostico) && $datos->diagnostico === '75 TAB') echo "selected";?>>75 TAB</option>
                            <option value="Otro"  <?php IF(!empty($datos->diagnostico) && $datos->diagnostico !== '75 TAB' && $datos->diagnostico !== '34 DEP' && $datos->diagnostico !== '15 EQZ')echo "selected";?>>Otro</option>
                        </select>
                    </div>
                    <div class='col-lg-8'>
                        <input name="diagnosticoOtro" id="diagnostico"  placeholder="Otro, especifique..." style=" width: 80%;" type="text" value="<?php IF(!empty($datos->diagnostico))echo $datos->diagnostico;?>"><h7 style=" font-size: 8px"> (campo no obligatorio)</h7>
                    </div>
                    <div class="col-lg-12"></div>
                    <div class="col-lg-2" style="margin-top: 10px">
                        <label>Información Adicional: </label>
                    </div>
                    <div class='col-lg-10' style="margin-top: 10px">
                        <input name="comentario" style=" width: 84%;" type="text" id="comentario" value="<?php IF(!empty($datos->comentario))echo $datos->comentario;?>"><h7 style=" font-size: 8px"> (campo no obligatorio)</h7>
                    </div>
                    <div class="col-lg-12" style="margin-top: 10px"></div>
                    <div class="col-lg-2">
                        <label>Licencia N°</label>
                    </div>
                    <div class='col-lg-4'>
                        <input name="licNumero" type="text" id="licNumero" value="<?php IF(!empty($licencia->licNumero))echo $licencia->licNumero;?>"><h7 style=" font-size: 8px"> (campo no obligatorio)</h7>
                    </div>
                    <div class="col-lg-2">
                        <label>Licencia Desde</label>
                    </div>
                    <div class='col-lg-4'>
                        <div class="input-group input-group-sm date datepicker" required data-date="<?php //echo (new DateTime())->format('Y-m-d H:i:s') ?>" data-date-format="yyyy-mm-dd">
                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                            <input type="text" class="form-control" placeholder="día-mes-año" style=" width: 158px !important" name="licDesde" id="licDesde" value="<?php IF(!empty($licencia->licDesde))echo $licencia->licDesde;?>"><h7 style=" font-size: 8px"> (campo no obligatorio)</h7>
                        </div>
                    </div>
                    <div class="col-lg-12" style="margin-top:10px"></div>
                    <div class="col-lg-6"></div>
                    <div class="col-lg-2">
                        <label>Cantidad de Días</label>
                    </div>
                    <div class='col-lg-4'>
                        <input name="licDias" type="text" pattern="[0-9]{1,2}" maxlength="2" id="licDias" value="<?php IF(!empty($licencia->licDias))echo $licencia->licDias;?>"><h7 style=" font-size: 8px"> (campo no obligatorio)</h7>
                    </div>
                    <div class="col-lg-12" style="margin-top:10px"></div>
                    <div class="col-lg-2">
                        <label>Centro Emisor</label>
                    </div>
                    <div class='col-lg-4'>
                        <input name="licCentro" type="text" id="licCentro" value="<?php IF(!empty($licencia->licCentro))echo $licencia->licCentro;?>"><h7 style=" font-size: 8px"> (campo no obligatorio)</h7>
                    </div>
                    <div class="col-lg-2">
                        <label>Médico Emisor</label>
                    </div>
                    <div class='col-lg-4'>
                        <input name="licMedNombre" type="text" id="licMedNombre" value="<?php IF(!empty($licencia->licMedNombre))echo $licencia->licMedNombre;?>"><h7 style=" font-size: 8px"> (campo no obligatorio)</h7>
                    </div>
                
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
                        <?php foreach ($isapre as $is){ ?>
                            <option value="<?php echo $is->id; ?>" <?php IF(!empty($datos->isapreNombre)){IF($datos->isapreNombre===$is->isapre)  echo 'selected';};?>><?php echo $is->isapre; ?></option>
                        <?php } ?>
                        </select>
                    </div>
                    <div class="col-lg-1" align="left">
                        <img class="iconCom" src="<?php echo base_url();?>../assets/img/icons/signo.png" id="iconIsapre"/>
                    </div>
                    <div class="btn-group col-lg-2" data-toggle="buttons">
                            <label>Convenio</label>
                    </div>
                    <div class='col-lg-3'>
                        <table>
                            <tbody>
                            <tr>
                                <td style=" width: 30px" align="center"><input type="radio" name="ges" id="ges" value="1"   <?php IF(!empty($datos->ges)){IF($datos->ges === '1')echo 'checked';}ELSE echo 'checked';?> ></td>
                                <td style=" width: 75px">Ges</td>
                                <td style=" width: 30px" align="center"><input type="radio" name="ges" id="libre" value="2" <?php IF(!empty($datos->ges)){IF($datos->ges === '2')echo 'checked';};?>></td>
                                <td style=" width: 75px">Libre Elección</td>
                            </tr>
                            </tbody>
                        </table>
                        
                    </div>
                    <div class="col-lg-1" align="left">
                        <img class="iconSexo" src="<?php echo base_url();?>../assets/img/icons/signo.png" id="iconGes"/>
                    </div>
                    <div class="col-lg-2">
                        <label>Rut Titular</label>
                    </div>
                    <div class='col-lg-4'>
                        <input name="rutTitular" type="text" minlength="7" id="rutTitular" value="<?php IF(!empty($datos->rutTitular))echo formatearRut($datos->rutTitular);?>" ><h7 style=" font-size: 8px"> (campo no obligatorio)</h7>
                    </div>
                    <div class="col-lg-2">
                        <label>Nombre Titular</label>
                    </div>
                    <div class='col-lg-4'>
                        <input name="nombreTitular" type="text" id="nombreTitular" value="<?php IF(!empty($datos->nombreTitular))echo strtoupper($datos->nombreTitular);?>"><h7 style=" font-size: 8px"> (campo no obligatorio)</h7>
                    </div>
                    <div class="col-lg-12" style="margin-top: 10px"></div>
                    <div class="col-lg-2">
                        <label>Apellido Paterno Titular</label>
                    </div>
                    <div class='col-lg-4'>
                        <input name="apePatTitular" type="text" id="apePatTitular" value="<?php IF(!empty($datos->apePatTitular))echo strtoupper($datos->apePatTitular);?>"><h7 style=" font-size: 8px"> (campo no obligatorio)</h7>
                    </div>
                    <div class="col-lg-2">
                        <label>Apellido Materno Titular</label>
                    </div>
                    <div class='col-lg-4'>
                        <input name="apeMatTitular" type="text" id="apeMatTitular" value="<?php IF(!empty($datos->apeMatTitular))echo strtoupper($datos->apeMatTitular);?>"><h7 style=" font-size: 8px"> (campo no obligatorio)</h7>
                    </div>
                    <div class="col-lg-12"></div>
                    
                    
    
                    
                    <div class='col-lg-12' style=" min-height: 25px"></div>
                    <div class="col-lg-12" align="center">
                        <?php echo form_submit('','Siguiente','class="btn btn-primary btn-sm btnCetep"');?>
                    </div>
</div><!-- FIN DIV FICHA COMPLETA-->
                <div class="col-lg-12" ><hr></div>
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
<script>
    var rut = $( "#rut" ).val();
    var id = $( "#registro" ).val();
    if(id === '0'){
        if(rut === '') { 
            $("#divFicha").hide(); 
            $("#divFichaApoderado").hide(); 
            $("#rut").attr("disabled", false).css("box-shadow","0 0 15px red");
            $("#rutApo").attr("disabled", false).css("box-shadow","0 0 15px red");
        }
    }
    else {
        $("#divFicha").show(); 
        $("#divFichaApoderado").show(); 
    }
    $(".icon").hide();
    $(".iconSexo").hide();
    $(".iconCom").hide();
    $(".iconFecha").hide();
    
    
    //$("#rutApoEco").attr("disabled", false).css("box-shadow","0 0 15px red");
    
</script>


<script>
    $("#form").submit(function () { 
        
    $(".icon").hide();
    $(".iconCom").hide();
    $(".iconSexo").hide();
    
    if($("#origenDerivaciones").val()==='1') { 
           if($("#otraDerivacion").val()=== ''){
               $("#iconDerivacion").show();
               return false;
           }
    }
    
    if($('input:radio[name=sexo]:checked').val()===undefined) {  
        $("#iconSexo").show();
    }
    if($('input:radio[name=nac]:checked').val()===undefined) {  
        $("#iconNac").show();
    }
    if($("#comuna").val()==='0') {  
        $("#iconComPas").show();
    }
    if($("#comunaApo").val()==='0') {  
        $("#iconComApo").show();
    }
    if($("#fecha").val()===0 || $("#fecha").val()==='undefined' || $("#fecha").val()==='0000-00-00') {  
        $("#iconFecha").show();
    }
    if($("#isapre").val()==='0') {  
        $("#iconIsapre").show();
    }
    if($('input:radio[name=ges]:checked').val()===undefined) {  
        $("#iconGes").show();
    }
    
    if($("#isapre").val()==='0') {  
        $("#iconIsapre").show();
       // return false;
    }
    if($('input:radio[name=sexo]:checked').val()===undefined) {  
        $("#iconSexo").show();
       // alert("Campo Requerido");  
       // return false;
    }
    if($('input:radio[name=tipoIngreso]:checked').val()===undefined) {  
        $("#iconTipo").show();
        alert("Campo Requerido");  
        return false;
    }
    if($('input:radio[name=nac]:checked').val()===undefined) {  
        $("#iconNac").show();
        //alert("Isapre Requerida");  
     //   return false;
    }
    if($("#comuna").val()==='0') {  
        $("#iconComPas").show();
       // alert("Comuna Requerida");  
      //  return false;
    }
    if($("#ficha").val()==='0') {  
        alert("El N° de ficha no puede contener el valor ingresado");  
        return false;
    }
    
    if($("#fecha").val()===0 || $("#fecha").val()==='undefined' || $("#fecha").val()==='0000-00-00') {  
        $("#iconFecha").show();
        //alert("Campo Requerido");  
     //   return false;
    }
    
    if($('input:radio[name=ges]:checked').val()===undefined) {  
        $("#iconGes").show();
        //alert("Isapre Requerida");  
     //   return false;
    }
        
});  

</script>
<script>
    $("#ocupacion").focusout(function(){
        //ENVIAR DATOS GUARDAR
                    var rut = $( "#rut" ).val();
                    var ficha = $( "#ficha" ).val();
                        if (ficha === 'Sin ficha, se creará al ingreso') ficha = '';
                    var piso = '1';
                    var nombres = $( "#nombres" ).val();
                    var apePat = $( "#apePat" ).val();
                    var apeMat = $( "#apeMat" ).val();
                    //var sexo = $( "#sex" ).val();
                    var fechaN = $( "#fecha" ).val();
                    var direccion = $( "#direccion" ).val();
                    var comuna = $( "#comuna" ).val();
                    var telFijo = $( "#telFijo" ).val();
                    var telCelu = $( "#telCelu" ).val();
                    var ocupacion = $( "#ocupacion" ).val();
                    var email = $( "#email" ).val();email = email.replace("@", "~");
                    
                    var emergenciasDerivar = $( "#emergenciaDerivar" ).val();
                    var alergias = $( "#alergias" ).val();
                    var medicoAsignado = $( "#medicoAsignado" ).val();
                    var regimen = '1';
                    var diagnostico = $( "#diagnostico" ).val();
                    var comentario = $( "#comentario" ).val();
                    
                    //var ges = $( "#ges" ).val();
                    var isapre = $( "#isapre" ).val();
                    var rutTitular = $( "#rutTitular" ).val();
                    
                    var nombreOtroContacto = $( "#nombreOtroContacto" ).val();
                    var telUnoOtroContacto = $( "#telUnoOtroContacto" ).val();
                    var telDosOtroContacto = $( "#telDosOtroContacto" ).val();
                    var parentescoOtroContacto = $( "#parentescoOtroContacto" ).val();
                    
                    var licNumero = $( "#licNumero" ).val();
                    var licDesde = $( "#licDesde" ).val();
                    var licDias = $( "#licDias" ).val();
                    //var rut = $( "#rutApo" ).val();
                    var array = rut+'_'+ficha+'_'+piso+'_'+nombres+'_'+apePat+'_'+apeMat+'_'+fechaN+'_'+direccion+'_'+comuna+'_'+telFijo+'_'+telCelu+'_'+ocupacion+'_'+email+'_'+emergenciasDerivar+'_'+alergias+'_'+medicoAsignado+'_'+regimen+'_'+diagnostico+'_'+comentario+'_'+isapre+'_'+rutTitular+'_'+nombreOtroContacto+'_'+telUnoOtroContacto+'_'+telDosOtroContacto+'_'+parentescoOtroContacto+'_'+licNumero+'_'+licDesde+'_'+licDias;
                    if(rut!=''){
                        $.ajax({
                            type: "POST",
                            url: "<?php echo base_url(); ?>" + "api/ingresosHD/guardar/"+array,
                            dataType: 'json',

                            success: function(data){


                            }
                        })
                    }
    });
    
    
    
        $("#rutApo").focusout(function(){
        ////LIMPIAR INPUTS
        document.getElementById("nombresApo").value = ""; document.getElementById("apePatApo").value = "";document.getElementById("apeMatApo").value = ""; document.getElementById("telFijoApo").value = ""; document.getElementById("telCeluApo").value = ""; document.getElementById("direccionApo").value = ""; document.getElementById("emailApo").value = "";
            //funcion autocompleta div apoderado
            rutApo();
        
        });
 

</script>
<script>
    $("#rut").bind({
        
    focusout:function(){
        
        $.ajax({
            type: "GET",
            url: "<?php echo base_url(); ?>" + "api/session/inicioIngreso/",
            dataType: 'json',
            success: function(data){
                if(data === 'NO'){
                    alert('Session Terminada');
                    window.location.href = "http://www.cetep.cl/mirandes/index.php/login/logout_ci";
                }
            }
        })
        ////LIMPIAR INPUTS
        document.getElementById("licDesde").value = "";document.getElementById("licDias").value = "";document.getElementById("licNumero").value = "";document.getElementById("comentario").value = "";document.getElementById("diagnostico").value = "";document.getElementById("alergias").value = "";document.getElementById("diagnostico").value = "";document.getElementById("emergenciaDerivar").value = "";document.getElementById("telDosOtroContacto").value = "";document.getElementById("telUnoOtroContacto").value = "";document.getElementById("nombreOtroContacto").value = "";document.getElementById("ficha").value = "";document.getElementById("nombres").value = "";document.getElementById("apePat").value = "";document.getElementById("apeMat").value = "";document.getElementById("fecha").value = ""; document.getElementById("telFijo").value = ""; document.getElementById("telCelu").value = ""; document.getElementById("direccion").value  = ""; document.getElementById("email").value = ""; document.getElementById("ocupacion").value  = ""; document.getElementById("rutTitular").value = ""; document.getElementById("rutApo").value = "";$("#fem").removeClass();$("#masc").removeClass();$("#comuna option[value=0]").attr("selected",true);  
        
        var rut = $( "#rut" ).val();
        if (rut === ''){$("#rut").attr("disabled", false).css("box-shadow","0 0 15px red"); $("#divFicha").hide(); event.stopPropagation()}
        

        
        var validar = validaRut(rut);
        if (validar != true && rut != ''){document.getElementById("rut").value  = '';alert('Rut Invalido');event.stopPropagation()}
        
        $("#rut").attr("disabled", false).css("box-shadow","0 0 0px");
        $("#divFicha").show();  
        var rut = rut.replace(".", "");var rut = rut.replace("-", "");var rut = rut.replace(",", ""); var rut = rut.replace(".", "");
        var letra = rut.substring(0, 1);
        if (letra === '1' || letra === '2'){var rut = rut.substring(0, 8);}
        else {var rut = rut.substring(0, 7);}
        
        $.ajax({
            type: "GET",
            url: "<?php echo base_url(); ?>" + "api/ingresosHD/index/"+rut,
            dataType: 'json',
            
            success: function(data){
                if (data.ficha === undefined || data.ficha < '0'){document.getElementById("ficha").value = ""; document.getElementById("ficha").value = "Sin ficha, se creará al ingreso"}
                else {document.getElementById("ficha").value = data.ficha;}
                if (data.nombres != undefined){document.getElementById("nombres").value         = data.nombres;}
                if (data.apellidoPaterno != undefined){document.getElementById("apePat").value  = data.apellidoPaterno;}
                if (data.apellidoMaterno != undefined){document.getElementById("apeMat").value  = data.apellidoMaterno;}
                if (data.fechaNacimiento != undefined){document.getElementById("fecha").value   = data.fechaNacimiento;}
                if (data.telefono != undefined){document.getElementById("telFijo").value        = data.telefono;}
                if (data.celular != undefined){document.getElementById("telCelu").value         = data.celular;}
                if (data.direccion != undefined){document.getElementById("direccion").value     = data.direccion;}
                if (data.email != undefined){document.getElementById("email").value             = data.email;}
                if (data.ocupacion != undefined){document.getElementById("ocupacion").value     = data.ocupacion;}
                if (data.emergenciaDerivar != undefined){document.getElementById("emergenciaDerivar").value = data.emergenciaDerivar;}
                if (data.sexo != undefined){
                    if(data.sexo === 'FEMENINO'){
                        $('input:radio[name=sexo]')[1].checked = true;
                        $("#fem").removeClass().addClass("iradio_flat-blue checked");
                    }
                    else if(data.sexo === 'MASCULINO'){
                        $('input:radio[name=sexo]')[0].checked = true;
                        $("#masc").removeClass().addClass("iradio_flat-blue checked");
                    }
                }
                if(data.comId != undefined){
                    //LO SELECCIONA PERO NO LO MUESTRA
                    $("#comuna").prepend("<option value='"+data.comId+"' selected='selected'>"+data.comNombre+"</option>");
                    $("#comuna option[value="+data.comId+"]").attr("selected",true);
                }
                if (data.rut != undefined){
                        var rut = data.rut;
                    
                        $.ajax({
                        type: "POST",
                        url: "<?php echo base_url(); ?>" + "api/ingresosHD/ficha/"+data.rut,
                        dataType: 'json',

                            success: function(data){

                                    if(data.ficha != undefined){
                                        var fixa = data.id;
                                        //document.getElementById("piso").value               = data.piso;
                                        if (data.alergia != undefined) document.getElementById("alergias").value = data.alergia;
                                        document.getElementById("diagnostico").value        = data.diagnostico;
                                        document.getElementById("comentario").value         = data.comentario;
                                        document.getElementById("emergenciaDerivar").value  = data.emergenciaDerivar;
                                        if (data.licNumero != undefined) document.getElementById("licNumero").value = data.licNumero;
                                        if (data.licDesde != undefined) document.getElementById("licDesde").value = data.licDesde;
                                        if (data.licDias != undefined) document.getElementById("licDias").value = data.licDias;
                                        if (data.isapre != undefined && data.isapre != null){
                                            //LO SELECCIONA PERO NO LO MUESTRA
                                            $("#isapre").prepend("<option value='"+data.isapre+"' selected='selected'>"+data.isapreNombre+"</option>");
                                            $("#isapre option[value="+data.isapre+"]").attr("selected",true);
                                        }
                                        
                                        if(data.rutTitular != undefined && data.rutTitular > 0){
                                            document.getElementById("rutTitular").value = formatearRut(data.rutTitular);
                                            document.getElementById("nombreTitular").value = data.nombreTitular;
                                            document.getElementById("apePatTitular").value = data.apePatTitular;
                                            document.getElementById("apeMatTitular").value = data.apeMatTitular;
                                        }
                                        else if(rut != undefined){document.getElementById("rutTitular").value = formatearRut(rut);}
                                            
                                            $.ajax({
                                            type: "POST",
                                            url: "<?php echo base_url(); ?>" + "api/ingresos/contacto/"+data.id,
                                            dataType: 'json',

                                                success: function(data){

                                                    if(data.apoNombre != undefined){
                                                        document.getElementById("nombreOtroContacto").value = data.apoNombre;
                                                        document.getElementById("telUnoOtroContacto").value = data.apoTelefono;
                                                        document.getElementById("telDosOtroContacto").value = data.apoCelular;
                                                        //document.getElementById("parentescoOtroContacto").value  = data.parentescoOtroContacto;
                                                        if(data.apoParentesco!=undefined){
                                                            //LO SELECCIONA PERO NO LO MUESTRA
                                                            $("#parentescoOtroContacto").prepend("<option value='"+data.apoParentesco+"' selected='selected'>"+data.parNombre+"</option>");
                                                            $("#parentescoOtroContacto option[value="+data.apoParentesco+"]").attr("selected",true);
                                                        }
                                                    }
                                                }
                                            })
                                            $.ajax({
                                            type: "POST",
                                            url: "<?php echo base_url(); ?>" + "api/ingresos/apoderado/"+fixa,
                                            dataType: 'json',

                                                success: function(data){

                                                    if(data.apoRut != undefined && data.apoRut > 0){
                                                        //console.log(data.apoRut);
                                                        document.getElementById("rutApo").value = formatearRut(data.apoRut);
     
                                                    }
                                                }
                                            })
                                    }
                                }
                        })
                }
                else {
                    var conf = confirm("Paciente no existe. ¿Desea crearlo?");
                    if (conf == false) {
                        window.location.href = "http://www.cetep.cl/mirandes/index.php/hd_admision/ingresos/listarIngreso";
                    } 
                   
                }
            }
        })
        
        },
    keypress:function(){
        
        if (event.which == 13 || event.keyCode == 13) {
        ////LIMPIAR INPUTS
        $("#divFicha").show();
        $('#nombres').focus();
    
    }
    }
    });
    $("#ficha").focusin(function(){
        document.getElementById("ficha").value     = '';
    });
    $("#rutApo").focusout(function(){
        if (event.which == 13 || event.keyCode == 13) {
        ////LIMPIAR INPUTS
        document.getElementById("nombresApo").value = ""; document.getElementById("apePatApo").value = ""; document.getElementById("telFijoApo").value = ""; document.getElementById("telCeluApo").value = ""; document.getElementById("direccionApo").value = ""; document.getElementById("emailApo").value = ""; document.getElementById("rutApoEco").value = "";
        
        rutApo();
        }
    });
</script> 
<script>
    $("#otraDerivaciones").hide();
    
    $("#divApo").click(function(){
        $("#divFichaApoderado").show();  
        
        rutApo();
    })
    $("#sex").mouseover(function(){
        $("#fem").removeClass();$("#masc").removeClass();  
    })
   
    $("#origenDerivaciones").click(function(){
        if($("#origenDerivaciones").val()==='1') {  
            $("#selectDerivacion").hide();
            $("#otraDerivaciones").show();
        
    }
        
    })
    
    
    
    function rutApo(){
        var rut = $( "#rutApo" ).val();
        if (rut == ''){$("#rutApo").attr("disabled", false).css("box-shadow","0 0 15px red"); $("#divFichaApoderado").hide(); event.stopPropagation()}
        
        var validar = validaRut(rut);
        if (validar != true && rut !== ''){document.getElementById("rutApo").value = '';$("#rutApo").attr("disabled", false).css("box-shadow","0 0 15px red"); $("#divFichaApoderado").hide(); alert('Rut Invalido');event.stopPropagation()}
        
        $("#rutApo").attr("disabled", false).css("box-shadow","0 0 0px");
        $("#divFichaApoderado").show();  
        
        var rut = rut.replace(".", "");var rut = rut.replace("-", "");var rut = rut.replace(",", ""); var rut = rut.replace(".", "");
        var letra = rut.substring(0, 1);
        if (letra === '1' || letra === '2'){var rut = rut.substring(0, 8);}
        else {var rut = rut.substring(0, 7);}
       
        $.ajax({
            type: "GET",
            url: "<?php echo base_url(); ?>" + "api/ingresos/index/"+rut,
            dataType: 'json',
            
            success: function(data){
                
                    if (data.rut != undefined){
                        document.getElementById("nombresApo").value     = data.nombres;
                        document.getElementById("apePatApo").value      = data.apellidoPaterno;
                        document.getElementById("apeMatApo").value      = data.apellidoMaterno;
                        document.getElementById("telFijoApo").value     = data.telefono;
                        document.getElementById("telCeluApo").value     = data.celular;
                        document.getElementById("direccionApo").value   = data.direccion;
                        document.getElementById("emailApo").value       = data.email;
                        if(data.comId!=undefined){
                            //LO SELECCIONA PERO NO LO MUESTRA
                            if(data.comuna === undefined && data.comNombre != undefined)data.comuna = data.comNombre;
                            $("#comunaApo").prepend("<option value='"+data.comId+"' selected='selected'>"+data.comuna+"</option>");
                            $("#comunaApo option[value="+data.comId+"]").attr("selected",true);
                        }
                        if(data.apoParentesco!=undefined){
                            //LO SELECCIONA PERO NO LO MUESTRA
                            $("#parentescoApo").prepend("<option value='"+data.apoParentesco+"' selected='selected'>"+data.parNombre+"</option>");
                            $("#parentescoApo option[value="+data.apoParentesco+"]").attr("selected",true);
                        }
        
                    }
                    //ENVIAR DATOS GUARDAR
                    var rut = $( "#rut" ).val();
                    var ficha = $( "#ficha" ).val();
                        if (ficha === 'Sin ficha, se creará al ingreso') ficha = '';
                    var piso = '1';
                    var nombres = $( "#nombres" ).val();
                    var apePat = $( "#apePat" ).val();
                    var apeMat = $( "#apeMat" ).val();
                    //var sexo = $( "#sex" ).val();
                    var fechaN = $( "#fecha" ).val();
                    var direccion = $( "#direccion" ).val();
                    var comuna = $( "#comuna" ).val();
                    var telFijo = $( "#telFijo" ).val();
                    var telCelu = $( "#telCelu" ).val();
                    var ocupacion = $( "#ocupacion" ).val();
                    var email = $( "#email" ).val();email = email.replace("@", "~");
                    
                    var emergenciasDerivar = $( "#emergenciaDerivar" ).val();
                    var alergias = $( "#alergias" ).val();
                    var medicoAsignado = $( "#medicoAsignado" ).val();
                    var regimen = '1';
                    var diagnostico = $( "#diagnostico" ).val();
                    var comentario = $( "#comentario" ).val();
                    
                    //var ges = $( "#ges" ).val();
                    var isapre = $( "#isapre" ).val();
                    var rutTitular = $( "#rutTitular" ).val();
                    
                    var nombreOtroContacto = $( "#nombreOtroContacto" ).val();
                    var telUnoOtroContacto = $( "#telUnoOtroContacto" ).val();
                    var telDosOtroContacto = $( "#telDosOtroContacto" ).val();
                    var parentescoOtroContacto = $( "#parentescoOtroContacto" ).val();
                    
                    var licNumero = $( "#licNumero" ).val();
                    var licDesde = $( "#licDesde" ).val();
                    var licDias = $( "#licDias" ).val();
                    //var rut = $( "#rutApo" ).val();
                    var array = rut+'_'+ficha+'_'+piso+'_'+nombres+'_'+apePat+'_'+apeMat+'_'+fechaN+'_'+direccion+'_'+comuna+'_'+telFijo+'_'+telCelu+'_'+ocupacion+'_'+email+'_'+emergenciasDerivar+'_'+alergias+'_'+medicoAsignado+'_'+regimen+'_'+diagnostico+'_'+comentario+'_'+isapre+'_'+rutTitular+'_'+nombreOtroContacto+'_'+telUnoOtroContacto+'_'+telDosOtroContacto+'_'+parentescoOtroContacto+'_'+licNumero+'_'+licDesde+'_'+licDias;
                    if(rut!=''){    
                        $.ajax({
                            type: "POST",
                            url: "<?php echo base_url(); ?>" + "api/ingresosHD/guardar/"+array,
                            dataType: 'json',

                            success: function(data){


                            }
                        })
                    }
                }
        })
        };
</script>
<script>
    //////VALIDACIONES DE TECLAS//////
        $("#fecha").keyup(function (){
            if (event.keyCode > 95 && event.keyCode < 106 || event.keyCode == 27 || event.keyCode == 190 || event.keyCode == 111 || event.keyCode == 16 || event.keyCode == 189 || event.keyCode == 109 || event.keyCode == 8 || event.keyCode == 9 || event.keyCode > 47 && event.keyCode < 58)
            {}
            else {
                texto = $( "#fecha" ).val();
                texto = texto.substring(0,texto.length-1);
                document.getElementById("fecha").value = texto;
                event.returnValue = false;
            }
	});
        $("#rut").keyup(function (){
		if(event.keyCode == 8 || event.keyCode == 46){
                    document.getElementById("rut").value = "";
		}
                else if (event.keyCode == 13 || event.keyCode == 110 || event.keyCode == 190 || event.keyCode == 75 || event.keyCode > 95 && event.keyCode < 106 || event.keyCode == 27 || event.keyCode == 190 || event.keyCode == 111 || event.keyCode == 16 || event.keyCode == 189 || event.keyCode == 109 || event.keyCode == 8 || event.keyCode == 9 || event.keyCode > 47 && event.keyCode < 58)
                {}
                else {
                texto = $( "#rut" ).val();
                texto = texto.substring(0,texto.length-1);
                document.getElementById("rut").value = texto;
                event.returnValue = false;
                }
	});
        $("#rutApo").keyup(function (){
		if(event.keyCode == 8 || event.keyCode == 46){
                    document.getElementById("rutApo").value = "";
		}
                else if (event.keyCode == 13 || event.keyCode == 110 || event.keyCode == 190 || event.keyCode == 75 || event.keyCode > 95 && event.keyCode < 106 || event.keyCode == 27 || event.keyCode == 190 || event.keyCode == 111 || event.keyCode == 16 || event.keyCode == 189 || event.keyCode == 109 || event.keyCode == 8 || event.keyCode == 9 || event.keyCode > 47 && event.keyCode < 58)
                {}
                else {
                texto = $( "#rutApo" ).val();
                texto = texto.substring(0,texto.length-1);
                document.getElementById("rutApo").value = texto;
                event.returnValue = false;
                }
	});
        
        $("#rutTitular").keyup(function (){
		if(event.keyCode == 8 || event.keyCode == 46){
                    document.getElementById("rutTitular").value = "";
		}
                else if (event.keyCode == 13 || event.keyCode == 110 || event.keyCode == 190 || event.keyCode == 75 || event.keyCode > 95 && event.keyCode < 106 || event.keyCode == 27 || event.keyCode == 190 || event.keyCode == 111 || event.keyCode == 16 || event.keyCode == 189 || event.keyCode == 109 || event.keyCode == 8 || event.keyCode == 9 || event.keyCode > 47 && event.keyCode < 58)
                {}
                else {
                texto = $( "#rutTitular" ).val();
                texto = texto.substring(0,texto.length-1);
                document.getElementById("rutTitular").value = texto;
                event.returnValue = false;
                }
	});
        $("#telFijo").keydown(function () {
            if (event.keyCode == 13 || event.keyCode == 110 || event.keyCode == 190 || event.keyCode == 75 || event.keyCode > 95 && event.keyCode < 106 || event.keyCode == 27 || event.keyCode == 190 || event.keyCode == 111 || event.keyCode == 16 || event.keyCode == 189 || event.keyCode == 109 || event.keyCode == 8 || event.keyCode == 9 || event.keyCode > 47 && event.keyCode < 58)
                {}
            else {
                texto = $( "#telFijo" ).val();
                texto = texto.substring(0,texto.length-1);
                document.getElementById("telFijo").value = texto;
                event.returnValue = false;
            }
        });
        $("#telCelu").keydown(function () {
            if (event.keyCode == 13 || event.keyCode == 110 || event.keyCode == 190 || event.keyCode == 75 || event.keyCode > 95 && event.keyCode < 106 || event.keyCode == 27 || event.keyCode == 190 || event.keyCode == 111 || event.keyCode == 16 || event.keyCode == 189 || event.keyCode == 109 || event.keyCode == 8 || event.keyCode == 9 || event.keyCode > 47 && event.keyCode < 58)
                {}
            else {
                texto = $( "#telCelu" ).val();
                texto = texto.substring(0,texto.length-1);
                document.getElementById("telCelu").value = texto;
                event.returnValue = false;
            }
        });
        $("#telFijoApo").keydown(function () {
            if (event.keyCode == 13 || event.keyCode == 110 || event.keyCode == 190 || event.keyCode == 75 || event.keyCode > 95 && event.keyCode < 106 || event.keyCode == 27 || event.keyCode == 190 || event.keyCode == 111 || event.keyCode == 16 || event.keyCode == 189 || event.keyCode == 109 || event.keyCode == 8 || event.keyCode == 9 || event.keyCode > 47 && event.keyCode < 58)
                {}
            else {
                texto = $( "#telFijoApo" ).val();
                texto = texto.substring(0,texto.length-1);
                document.getElementById("telFijoApo").value = texto;
                event.returnValue = false;
            }
        });
        $("#telCeluApo").keydown(function () {
            if (event.keyCode == 13 || event.keyCode == 110 || event.keyCode == 190 || event.keyCode == 75 || event.keyCode > 95 && event.keyCode < 106 || event.keyCode == 27 || event.keyCode == 190 || event.keyCode == 111 || event.keyCode == 16 || event.keyCode == 189 || event.keyCode == 109 || event.keyCode == 8 || event.keyCode == 9 || event.keyCode > 47 && event.keyCode < 58)
                {}
            else {
                texto = $( "#telCeluApo" ).val();
                texto = texto.substring(0,texto.length-1);
                document.getElementById("telCeluApo").value = texto;
                event.returnValue = false;
            }
        });
        $("#telFijoApoEco").keydown(function () {
            if (event.keyCode == 13 || event.keyCode == 110 || event.keyCode == 190 || event.keyCode == 75 || event.keyCode > 95 && event.keyCode < 106 || event.keyCode == 27 || event.keyCode == 190 || event.keyCode == 111 || event.keyCode == 16 || event.keyCode == 189 || event.keyCode == 109 || event.keyCode == 8 || event.keyCode == 9 || event.keyCode > 47 && event.keyCode < 58)
                {}
            else {
                texto = $( "#telFijoApoEco" ).val();
                texto = texto.substring(0,texto.length-1);
                document.getElementById("telFijoApoEco").value = texto;
                event.returnValue = false;
            }
        });
        $("#telCeluApoEco").keydown(function () {
            if (event.keyCode == 13 || event.keyCode == 110 || event.keyCode == 190 || event.keyCode == 75 || event.keyCode > 95 && event.keyCode < 106 || event.keyCode == 27 || event.keyCode == 190 || event.keyCode == 111 || event.keyCode == 16 || event.keyCode == 189 || event.keyCode == 109 || event.keyCode == 8 || event.keyCode == 9 || event.keyCode > 47 && event.keyCode < 58)
                {}
            else {
                texto = $( "#telCeluApoEco" ).val();
                texto = texto.substring(0,texto.length-1);
                document.getElementById("telCeluApoEco").value = texto;
                event.returnValue = false;
            }
        });
        $("#nombres").keydown(function () {
            if (event.keyCode > 95 && event.keyCode < 106 || event.keyCode > 47 && event.keyCode < 58)
            {alert('Ingrese un nombre valido');event.returnValue = false;}
        });
        $("#apeMat").keydown(function () {
            if (event.keyCode > 95 && event.keyCode < 106 || event.keyCode > 47 && event.keyCode < 58)
            {alert('Ingrese un apellido valido');event.returnValue = false;}
        });
        $("#apePat").keydown(function () {
            if (event.keyCode > 95 && event.keyCode < 106 || event.keyCode > 47 && event.keyCode < 58)
            {alert('Ingrese un apellido valido');event.returnValue = false;}
        });
        $("#nombresApo").keydown(function () {
            if (event.keyCode > 95 && event.keyCode < 106 || event.keyCode > 47 && event.keyCode < 58)
            {alert('Ingrese un nombre valido');event.returnValue = false;}
        });
        $("#apeMatApo").keydown(function () {
            if (event.keyCode > 95 && event.keyCode < 106 || event.keyCode > 47 && event.keyCode < 58)
            {alert('Ingrese un apellido valido');event.returnValue = false;}
        });
        $("#apePatApo").keydown(function () {
            if (event.keyCode > 95 && event.keyCode < 106 || event.keyCode > 47 && event.keyCode < 58)
            {alert('Ingrese un apellido valido');event.returnValue = false;}
        });
        

</script>

<script>
    
function validaRut(campo){
   
	if ( campo.length == 0 ){ return false; }
	if ( campo.length < 7 ){ return false; }

	campo = campo.replace('-','')
	campo = campo.replace(/\./g,'')

	var suma = 0;
	var caracteres = "1234567890kK";
	var contador = 0;    
	for (var i=0; i < campo.length; i++){
		u = campo.substring(i, i + 1);
		if (caracteres.indexOf(u) != -1)
		contador ++;
	}
	if ( contador==0 ) { return false }
	
	var rut = campo.substring(0,campo.length-1)
	var drut = campo.substring( campo.length-1 )
	var dvr = '0';
	var mul = 2;
	
	for (i= rut.length -1 ; i >= 0; i--) {
		suma = suma + rut.charAt(i) * mul
                if (mul == 7) 	mul = 2
		        else	mul++
	}
	res = suma % 11
	if (res==1)		dvr = 'k'
                else if (res==0) dvr = '0'
	else {
		dvi = 11-res
		dvr = dvi + ""
	}
	if ( dvr != drut.toLowerCase() ) { return false; }
	else { return true; }
}

function formatearRut(rut){
        
        if (!rut || !rut.length || typeof rut !== 'string') {
		return -1;
	}
	// serie numerica
	var secuencia = [2,3,4,5,6,7,2,3];
	var sum = 0;
	//
	for (var i=rut.length - 1; i >=0; i--) {
		var d = rut.charAt(i)
		sum += new Number(d)*secuencia[rut.length - (i + 1)];
	};
	// sum mod 11
        
	var rest = 11 - (sum % 11);
	// si es 11, retorna 0, sino si es 10 retorna K,
	// en caso contrario retorna el numero
	rest === 11 ? 0 : rest === 10 ? "K" : rest;
        if(rest===10)rest='K';else if(rest===11)rest=0;
        //console.log("Rut :"+rest);
        rut = rut+rest;
    
        //console.log("Rut :"+rut);
        var sRut1 = rut;   	//contador de para saber cuando insertar el . o la -
        var nPos = 0; //Guarda el rut invertido con los puntos y el guión agregado
        var sInvertido = ""; //Guarda el resultado final del rut como debe ser
        var sRut = "";
        for(var i = sRut1.length - 1; i >= 0; i-- )
        {
            sInvertido += sRut1.charAt(i);
            if (i == sRut1.length - 1 )
                sInvertido += "-";
            else if (nPos == 3)
            {
                sInvertido += ".";
                nPos = 0;
            }
            nPos++;
        }
        for(var j = sInvertido.length - 1; j >= 0; j-- )
        {
            if (sInvertido.charAt(sInvertido.length - 1) != ".")
                sRut += sInvertido.charAt(j);
            else if (j != sInvertido.length - 1 )
                sRut += sInvertido.charAt(j);
        }
        //Pasamos al campo el valor formateado
        //console.log(sRut);
        return sRut.toUpperCase();
        //return rut
    }

</script>
