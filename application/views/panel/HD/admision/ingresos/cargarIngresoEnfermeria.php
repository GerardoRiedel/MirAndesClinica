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
    .btnVolver{
        width: 20%;
        min-width: 80px;
        background-color: #a15ebe;
        border-color: #a15ebe;
        color: white;
    }
    .btnVolver:hover{
        background-color: #BF00FF;
        border-color: #a15ebe
    }
    .btnVolver:active{
        background-color: #6E2C00 !important;
        border-color: #a15ebe
    }
    
    
@media (max-width: 600px) {
  
  .activo{
    display: none;
    }
    
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
        <br> 
        <div class="col-lg-1"></div>
        <div class="col-lg-11" align="left">
                <button onclick="goBack()" class="btn btn-default btn-sm btnVolver">Volver</button><script>function goBack(){window.history.go(-1);}</script>
            </div>
        
        <?php $attributes = array('id' => 'form');
            
                echo form_open('hd_admision/ingresos/guardarIngresoEnfermeria',$attributes);
            ?>
                            
            <div class='widget-content'>
                
<div id="divFicha"><!--COMIENZO TRATAMIENTO DE FICHA-->
                    
                <input type="hidden" value="<?php echo $datos->id;?>" name="fichaElectro">
                <input type="hidden" value="<?php echo $datos->rut;?>" name="rut">
                <input type="hidden" value="<?php echo $enfermeria->enfId;?>" name="enfId">
                <div class="col-lg-12" ></div>
                <!-- DATOS DE PERSONALES--> 
                
                <div id="imprimir">
                <div class="col-lg-12" align="center"><h2 class="titulo">EVOLUCIÓN ENFERMERÍA DIARIA</h2></div>
                <div class="col-lg-12"><br></div>
                    
                    <div class="col-lg-4">
                        <label>Ficha N°: </label> <h7 style="font-size:20px"><b><?php echo $datos->ficha; ?></b></h7>
                    </div>
                    <div class="col-lg-4">
                        <label>Alergias: </label> <h7 style="color:red;font-size:20px"><b><input name="alergias" style="border:none" placeholder="............." value="<?php IF(!empty($datos->alergia))echo $datos->alergia; ?>"></b></h7>
                    
                    </div>
                    <div class="col-lg-4">
                    <label>Fecha Ingreso: </label> <input style="border:none; width: 130px" type="date" readonly value="<?php IF (!empty($datos->fechaIngreso))echo $datos->fechaIngreso;?>">
                    </div>
                
                    <div class="col-lg-12"><br></div>
                    <div class="col-lg-12">
                    <label class="titulo">Datos Personales</label>
                    </div>
                    <div class="col-lg-3">
                        <label>Rut Paciente: </label> <?php echo formatearRut($datos->rut);?>
                    </div>
                    <div class="col-lg-5">
                        <label>Nombre: </label> <?php echo strtoupper($datos->nombres).' '.strtoupper($datos->apellidoPaterno).' '.strtoupper($datos->apellidoMaterno); ?>
                    </div>
                    <div class="col-lg-12" ></div>    
                    <div class="col-lg-3">
                        <label>Sexo: </label> <?php echo strtoupper($datos->sexo); ?>
                    </div>
                    <div class="col-lg-3">
                        <label>Fecha de Nacimiento: </label> <?php echo $datos->fechaNacimiento; ?>
                    </div>
                    <div class="col-lg-3">
                        <label>Nacionalidad: </label> <?php IF ($datos->nacionalidad === '1') echo 'CHILENA';ELSEIF ($datos->nacionalidad === '2') echo 'EXTRANJERA' ?>
                    </div>
                    <div class="col-lg-12" ></div>
                    <div class="col-lg-3">
                        <label>Dirección: </label> <?php IF(!empty($datos->direccion))echo strtoupper($datos->direccion); ?>
                    </div>
                    <div class="col-lg-3">
                        <label>Teléfono Fijo: </label> <?php IF(!empty($datos->telefono))echo $datos->telefono; ?>
                    </div>
                    <div class="col-lg-3">
                        <label>Teléfono Movil: </label> <?php IF(!empty($datos->celular))echo $datos->celular; ?>
                    </div>
                    <div class="col-lg-3">
                        <label>Ocupación: </label> <?php IF(!empty($datos->ocupacion))echo strtoupper($datos->ocupacion); ?>
                    </div>
                    <div class="col-lg-5">
                        <label>Email: </label> <?php IF(!empty($datos->email))echo strtoupper($datos->email); ?>
                    </div>
                <div class="col-lg-12" ><hr style="height: 2px"></div>  
                
                
                    <div class="col-lg-12">
                    <label class="titulo">Signos Vitales</label>
                    </div>
                     
                    <div class="col-lg-12">
                        <div class="col-lg-2">
                            <label>Fecha Medición</label>
                        </div>
                        <div class="col-lg-4">
                            <div class="input-group input-group-sm date datepicker" required data-date="<?php //echo (new DateTime())->format('Y-m-d H:i:s') ?>" data-date-format="yyyy-mm-dd">
                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                <input type="text" class="form-control" required placeholder="día-mes-año" style=" width: 158px !important" name="fechaIngreso" minlength="10" maxlength="10" title="Ingrese una fecha valida" value="<?php IF(!empty($registro))echo $registro->sigFechaIngreso;ELSE echo date('Y-m-d'); ?>">
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <label>Hora Medición</label>
                        </div>
                        <div class="col-lg-4">
                            <input type="time" class="hora" required name="horaIngreso" title="Ingrese una hora valida" value="<?php IF(!empty($registro))echo $registro->sigHoraIngreso;ELSE echo date('H:i'); ?>">
                        </div>
                        <div class="col-lg-12"><br></div><div class="col-lg-12"></div>
                        <div class="col-lg-2">
                            <label>Peso (gr)</label>
                        </div>
                        <div class="col-lg-4">
                            <input type="text" required name="peso" minlength="2" maxlength="3" title="Ingrese un peso valido" value="<?php IF(!empty($registro))echo $registro->sigPeso; ?>">
                        </div>
                        <div class="col-lg-2">
                            <label>Circunferencia Abdominal (CA)</label>
                        </div>
                        <div class="col-lg-4">
                            <input type="text" required name="circunferencia" title="Ingrese una circunferencia valida" value="<?php IF(!empty($registro))echo $registro->sigCA; ?>">
                        </div>
                        <div class="col-lg-12"></div>
                        <div class="col-lg-2">
                            <label>Estatura (cm)</label>
                        </div>
                        <div class="col-lg-4">
                            <input type="text" required name="talla" minlength="2" maxlength="3" title="Ingrese una talla valida" value="<?php IF(!empty($registro))echo $registro->sigTalla; ?>">
                        </div>
                        <div class="col-lg-2">
                            <label>Temperatura (T°)</label>
                        </div>
                        <div class="col-lg-4">
                            <input type="text" required name="temperatura" title="Ingrese una temperatura valida" value="<?php IF(!empty($registro))echo $registro->sigTem; ?>">
                        </div>
                        <div class="col-lg-12"><br></div><div class="col-lg-12"></div>
                        <div class="col-lg-2">
                            <label>Presión Arterial (PA)</label>
                        </div>
                        <div class="col-lg-4">
                            <input type="text" required name="presion" title="Ingrese una presión valida" value="<?php IF(!empty($registro))echo $registro->sigPresion; ?>">
                        </div>
                        <div class="col-lg-2">
                            <label>Frecuencia Cardiaca (FC)</label>
                        </div>
                        <div class="col-lg-4">
                            <input type="text" required name="frecuenciaC" title="Ingrese una frecuencia valida" value="<?php IF(!empty($registro))echo $registro->sigFC; ?>">
                        </div>
                        <div class="col-lg-12"></div>
                        <div class="col-lg-2">
                            <label>Frecuencia Respiratoria (FR)</label>
                        </div>
                        <div class="col-lg-4">
                            <input type="text" required name="frecuenciaR" title="Ingrese una frecuencia valida" value="<?php IF(!empty($registro))echo $registro->sigFR; ?>">
                        </div>
                        <div class="col-lg-2">
                        <label>Régimen: </label>
                        </div>
                        <div class='col-lg-4'>
                            <select name="regimen" required id="regimen">
                                <option value="0">Seleccione...</option>
                                <?php foreach($regimen as $reg) { ;?>
                                <option value="<?php echo $reg->regId;?>" <?php IF ($registro->sigRegimen === $reg->regId)echo 'selected';?>><?php echo $reg->regNombre;?></option>
                                <?php }; ?>
                            </select>
                        </div>
                    </div>
                
                        <div class="col-lg-12"><hr></div>
                
                        <div class="col-lg-12">
                            <label class="titulo">Hábitos Nocivos</label>
                        </div>
                    <div class="col-lg-12">
                        <div class="col-lg-3">
                            <label>Tabaco</label>
                        </div>
                        <div class="col-lg-9">
                            <input type='radio' name="tabacoR" value="1" <?php IF(!empty($enfermeria->enfTabaco))echo 'checked';?>> Si 
                            <input type='radio' name="tabacoR" value="0" <?php IF(empty($enfermeria->enfTabaco) && $enfermeria->enfTabaco === '0')echo 'checked';?>> No, 
                            <input type="text" placeholder="Cantidad" name="enfTabacoCantidad" value="<?php IF(!empty($enfermeria->enfTabacoCantidad))echo $enfermeria->enfTabacoCantidad;?>">
                            <input type="text" placeholder="Edad" name="enfTabacoEdad" value="<?php IF(!empty($enfermeria->enfTabacoEdad))echo $enfermeria->enfTabacoEdad;?>">
                        </div>
                        <div class="col-lg-3">
                            <label>Alcohol</label>
                        </div>
                        <div class="col-lg-9">
                            <input type='radio' name="alcoholR" value="1" <?php IF(!empty($enfermeria->enfAlcohol))echo 'checked';?>> Si 
                            <input type='radio' name="alcoholR" value="0" <?php IF(empty($enfermeria->enfAlcohol) && $enfermeria->enfAlcohol === '0')echo 'checked';?>> No, 
                            <input type="text" placeholder="Cantidad" name="enfAlcoholCantidad" value="<?php IF(!empty($enfermeria->enfAlcoholCantidad))echo $enfermeria->enfAlcoholCantidad;?>">
                            <input type="text" placeholder="Edad" name="enfAlcoholEdad" value="<?php IF(!empty($enfermeria->enfAlcoholEdad))echo $enfermeria->enfAlcoholEdad;?>">
                        </div>
                        <div class="col-lg-3">
                            <label>Drogas</label>
                        </div>
                        <div class="col-lg-9">
                            <input type='radio' name="drogasR" value="1" <?php IF(!empty($enfermeria->enfDrogas))echo 'checked';?>> Si 
                            <input type='radio' name="drogasR" value="0" <?php IF(empty($enfermeria->enfDrogas) && $enfermeria->enfDrogas === '0')echo 'checked';?>> No, 
                            <input type="text" placeholder="Cantidad" name="enfDrogasCantidad" value="<?php IF(!empty($enfermeria->enfDrogasCantidad))echo $enfermeria->enfDrogasCantidad;?>">
                            <input type="text" placeholder="Edad" name="enfDrogasEdad" value="<?php IF(!empty($enfermeria->enfDrogasEdad))echo $enfermeria->enfDrogasEdad;?>">
                        </div>
                    </div>
                
                        <div class="col-lg-12"><hr></div>
                        <div class="col-lg-12">
                            <label class="titulo">Antecedentes Médicos</label>
                        </div>
                    <div class="col-lg-12">
                        <div class="col-lg-3">
                            <label>Hipertensión Arterial</label>
                        </div>
                        <div class="col-lg-3">
                            <input type='radio' name="hipertensionR" value="1" <?php IF(!empty($enfermeria->enfHipertension))echo 'checked';?>> Si 
                            <input type='radio' name="hipertensionR" value="0" <?php IF(empty($enfermeria->enfHipertension) && $enfermeria->enfHipertension === '0')echo 'checked';?>> No
                        </div>
                        <div class="col-lg-3">
                            <label>Arritmias Cardiacas</label>
                        </div>
                        <div class="col-lg-3">
                            <input type='radio' name="arritmiasR" value="1" <?php IF(!empty($enfermeria->enfArritmias))echo 'checked';?>> Si 
                            <input type='radio' name="arritmiasR" value="0" <?php IF(empty($enfermeria->enfArritmias) && $enfermeria->enfArritmias === '0')echo 'checked';?>> No
                        </div>
                        <div class="col-lg-3">
                            <label>Diabetes Mellitus I</label>
                        </div>
                        <div class="col-lg-3">
                            <input type='radio' name="diabetes1R" value="1" <?php IF(!empty($enfermeria->enfDiabetes1))echo 'checked';?>> Si 
                            <input type='radio' name="diabetes1R" value="0" <?php IF(empty($enfermeria->enfDiabetes1) && $enfermeria->enfDiabetes1 === '0')echo 'checked';?>> No
                        </div>
                        <div class="col-lg-3">
                            <label>Insuficiencia Renal Crónica</label>
                        </div>
                        <div class="col-lg-3">
                            <input type='radio' name="renalR" value="1" <?php IF(!empty($enfermeria->enfRenal))echo 'checked';?>> Si 
                            <input type='radio' name="renalR" value="0" <?php IF(empty($enfermeria->enfRenal) && $enfermeria->enfRenal === '0')echo 'checked';?>> No
                        </div>
                        
                        <div class="col-lg-3">
                            <label>Diabetes Mellitus II</label>
                        </div>
                        <div class="col-lg-3">
                            <input type='radio' name="diabetes2R" value="1" <?php IF(!empty($enfermeria->enfDiabetes2))echo 'checked';?>> Si 
                            <input type='radio' name="diabetes2R" value="0" <?php IF(empty($enfermeria->enfDiabetes2) && $enfermeria->enfDiabetes2 === '0')echo 'checked';?>> No
                        </div>
                        <div class="col-lg-3">
                            <label>Hipotiroidismo</label>
                        </div>
                        <div class="col-lg-3">
                            <input type='radio' name="hipotiroidismoR" value="1" <?php IF(!empty($enfermeria->enfHipotiroidismo))echo 'checked';?>> Si 
                            <input type='radio' name="hipotiroidismoR" value="0" <?php IF(empty($enfermeria->enfHipotiroidismo) && $enfermeria->enfHipotiroidismo === '0')echo 'checked';?>> No
                        </div>
                        
                        <div class="col-lg-3">
                            <label>Colesterol Alto/Dislipidemia</label>
                        </div>
                        <div class="col-lg-3">
                            <input type='radio' name="dislipidemiaR" value="1" <?php IF(!empty($enfermeria->enfDislipidemia))echo 'checked';?>> Si 
                            <input type='radio' name="dislipidemiaR" value="0" <?php IF(empty($enfermeria->enfDislipidemia) && $enfermeria->enfDislipidemia === '0')echo 'checked';?>> No
                        </div>
                        <div class="col-lg-3">
                            <label>Hígado Graso</label>
                        </div>
                        <div class="col-lg-3">
                            <input type='radio' name="higadoR" value="1" <?php IF(!empty($enfermeria->enfHigado))echo 'checked';?>> Si 
                            <input type='radio' name="higadoR" value="0" <?php IF(empty($enfermeria->enfHigado) && $enfermeria->enfHigado === '0')echo 'checked';?>> No
                        </div>
                        <div class="col-lg-3">
                            <label>Epilepsia</label>
                        </div>
                        <div class="col-lg-3">
                            <input type='radio' name="epilepsiaR" value="1" <?php IF(!empty($enfermeria->enfEpilepsia))echo 'checked';?>> Si 
                            <input type='radio' name="epilepsiaR" value="0" <?php IF(empty($enfermeria->enfEpilepsia) && $enfermeria->enfEpilepsia === '0')echo 'checked';?>> No
                        </div>
                        <div class="col-lg-3">
                            <label>Hepatitis</label>
                        </div>
                        <div class="col-lg-3">
                            <input type='radio' name="hepatitisR" value="1" <?php IF(!empty($enfermeria->enfHepatitis))echo 'checked';?>> Si 
                            <input type='radio' name="hepatitisR" value="0" <?php IF(empty($enfermeria->enfHepatitis) && $enfermeria->enfHepatitis === '0')echo 'checked';?>> No
                        </div>
                        <div class="col-lg-3">
                            <label>Asma</label>
                        </div>
                        <div class="col-lg-3">
                            <input type='radio' name="asmaR" value="1" <?php IF(!empty($enfermeria->enfAsma))echo 'checked';?>> Si 
                            <input type='radio' name="asmaR" value="0" <?php IF(empty($enfermeria->enfAsma) && $enfermeria->enfAsma === '0')echo 'checked';?>> No
                        </div>
                        <div class="col-lg-3">
                            <label>Glaucoma</label>
                        </div>
                        <div class="col-lg-3">
                            <input type='radio' name="glaucomaR" value="1" <?php IF(!empty($enfermeria->enfGlaucoma))echo 'checked';?>> Si 
                            <input type='radio' name="glaucomaR" value="0" <?php IF(empty($enfermeria->enfGlaucoma) && $enfermeria->enfGlaucoma === '0')echo 'checked';?>> No
                        </div>
                        
                        <div class="col-lg-3">
                            <label>Artritis</label>
                        </div>
                        <div class="col-lg-3">
                            <input type='radio' name="artritisR" value="1" <?php IF(!empty($enfermeria->enfArtritis))echo 'checked';?>> Si 
                            <input type='radio' name="artritisR" value="0" <?php IF(empty($enfermeria->enfArtritis) && $enfermeria->enfArtritis === '0')echo 'checked';?>> No
                        </div>
                        <div class="col-lg-3">
                            <label>Artrosis</label>
                        </div>
                        <div class="col-lg-3">
                            <input type='radio' name="artrosisR" value="1" <?php IF(!empty($enfermeria->enfArtrosis))echo 'checked';?>> Si 
                            <input type='radio' name="artrosisR" value="0" <?php IF(empty($enfermeria->enfArtrosis) && $enfermeria->enfArtrosis === '0')echo 'checked';?>> No
                        </div>
                        <div class="col-lg-3">
                            <label>Otros</label>
                        </div>
                        <div class="col-lg-9">
                            <input type='text' style=" min-width: 80%" name="enfOtros" value="<?php IF(!empty($enfermeria->enfOtros))echo $enfermeria->enfOtros;?>">
                        </div>
                    </div>
                        
                        <div class="col-lg-12"><hr></div>
                        <div class="col-lg-12">
                            <label class="titulo">Antecedentes Quirúrgicos</label>
                        </div>
                    <div class="col-lg-12">
                        <div class="col-lg-2">
                            <label>Fecha</label>
                        </div>
                        <div class="col-lg-3">
                            <div class="input-group input-group-sm date datepicker" required data-date="<?php //echo (new DateTime())->format('Y-m-d H:i:s') ?>" data-date-format="yyyy-mm-dd">
                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                <input type="text" class="form-control" placeholder="día-mes-año" style=" width: 158px !important" name="fechaQuirurgico1" minlength="10" maxlength="10" title="Ingrese una fecha valida" value="<?php IF(!empty($enfermeria->enfFecha1))echo $enfermeria->enfFecha1;?>">
                            </div>
                        </div>
                        <div class="col-lg-1">
                            <label>Intervención</label>
                        </div>
                        <div class="col-lg-6">
                            <input type="text" style="width:70%" name="enfQuirurgico1" value="<?php IF(!empty($enfermeria->enfQuirurgico1))echo $enfermeria->enfQuirurgico1;?>">
                        </div>
                        <div class="col-lg-12"></div>
                        <div class="col-lg-2">
                            <label>Fecha</label>
                        </div>
                        <div class="col-lg-3">
                            <div class="input-group input-group-sm date datepicker" required data-date="<?php //echo (new DateTime())->format('Y-m-d H:i:s') ?>" data-date-format="yyyy-mm-dd">
                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                <input type="text" class="form-control" placeholder="día-mes-año" style=" width: 158px !important" name="fechaQuirurgico2" minlength="10" maxlength="10" title="Ingrese una fecha valida" value="<?php IF(!empty($enfermeria->enfFecha2))echo $enfermeria->enfFecha2;?>">
                            </div>
                        </div>
                        <div class="col-lg-1">
                            <label>Intervención</label>
                        </div>
                        <div class="col-lg-6">
                            <input type="text" style="width:70%" name="enfQuirurgico2" value="<?php IF(!empty($enfermeria->enfQuirurgico2))echo $enfermeria->enfQuirurgico2;?>">
                        </div>
                        <div class="col-lg-12"></div>
                        <div class="col-lg-2">
                            <label>Fecha</label>
                        </div>
                        <div class="col-lg-3">
                            <div class="input-group input-group-sm date datepicker" required data-date="<?php //echo (new DateTime())->format('Y-m-d H:i:s') ?>" data-date-format="yyyy-mm-dd">
                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                <input type="text" class="form-control" placeholder="día-mes-año" style=" width: 158px !important" name="fechaQuirurgico3" minlength="10" maxlength="10" title="Ingrese una fecha valida" value="<?php IF(!empty($enfermeria->enfFecha3))echo $enfermeria->enfFecha3;?>">
                            </div>
                        </div>
                        <div class="col-lg-1">
                            <label>Intervención</label>
                        </div>
                        <div class="col-lg-6">
                            <input type="text" style="width:70%" name="enfQuirurgico3" value="<?php IF(!empty($enfermeria->enfQuirurgico3))echo $enfermeria->enfQuirurgico3;?>">
                        </div>
                        <div class="col-lg-12"></div>
                        <div class="col-lg-2">
                            <label>Fecha</label>
                        </div>
                        <div class="col-lg-3">
                            <div class="input-group input-group-sm date datepicker" required data-date="<?php //echo (new DateTime())->format('Y-m-d H:i:s') ?>" data-date-format="yyyy-mm-dd">
                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                <input type="text" class="form-control" placeholder="día-mes-año" style=" width: 158px !important" name="fechaQuirurgico4" minlength="10" maxlength="10" title="Ingrese una fecha valida" value="<?php IF(!empty($enfermeria->enfFecha4))echo $enfermeria->enfFecha4;?>">
                            </div>
                        </div>
                        <div class="col-lg-1">
                            <label>Intervención</label>
                        </div>
                        <div class="col-lg-6">
                            <input type="text" style="width:70%" name="enfQuirurgico4" value="<?php IF(!empty($enfermeria->enfQuirurgico4))echo $enfermeria->enfQuirurgico4;?>">
                        </div>
                    </div>
                        <div class="col-lg-12"><hr></div>
                        <div class="col-lg-12">
                            <label class="titulo">Tratamientos Farmacológicos NO PSIQUIÁTRICOS</label>
                        </div>
                    <div class="col-lg-12">
                        <div class="col-lg-2">
                            <label>Medicamento/Dosis</label>
                        </div>
                        <div class="col-lg-3">
                            <input type="text" name="enfMed1" value="<?php IF(!empty($enfermeria->enfMed1))echo $enfermeria->enfMed1;?>">
                        </div>
                        <div class="col-lg-1">
                            <label>Horarios</label>
                        </div>
                        <div class="col-lg-6">
                            <input type="text" style="width:70%" name="enfHor1" value="<?php IF(!empty($enfermeria->enfHor1))echo $enfermeria->enfHor1;?>">
                        </div>
                        <div class="col-lg-2">
                            <label>Medicamento/Dosis</label>
                        </div>
                        <div class="col-lg-3">
                            <input type="text" name="enfMed2" value="<?php IF(!empty($enfermeria->enfMed2))echo $enfermeria->enfMed2;?>">
                        </div>
                        <div class="col-lg-1">
                            <label>Horarios</label>
                        </div>
                        <div class="col-lg-6">
                            <input type="text" style="width:70%" name="enfHor2" value="<?php IF(!empty($enfermeria->enfHor2))echo $enfermeria->enfHor2;?>">
                        </div>
                        <div class="col-lg-2">
                            <label>Medicamento/Dosis</label>
                        </div>
                        <div class="col-lg-3">
                            <input type="text" name="enfMed3" value="<?php IF(!empty($enfermeria->enfMed3))echo $enfermeria->enfMed3;?>">
                        </div>
                        <div class="col-lg-1">
                            <label>Horarios</label>
                        </div>
                        <div class="col-lg-6">
                            <input type="text" style="width:70%" name="enfHor3" value="<?php IF(!empty($enfermeria->enfHor3))echo $enfermeria->enfHor3;?>">
                        </div>
                        <div class="col-lg-2">
                            <label>Medicamento/Dosis</label>
                        </div>
                        <div class="col-lg-3">
                            <input type="text" name="enfMed4" value="<?php IF(!empty($enfermeria->enfMed4))echo $enfermeria->enfMed4;?>">
                        </div>
                        <div class="col-lg-1">
                            <label>Horarios</label>
                        </div>
                        <div class="col-lg-6">
                            <input type="text" style="width:70%" name="enfHor4" value="<?php IF(!empty($enfermeria->enfHor4))echo $enfermeria->enfHor4;?>">
                        </div>
                        <div class="col-lg-2">
                            <label>Medicamento/Dosis</label>
                        </div>
                        <div class="col-lg-3">
                            <input type="text" name="enfMed5" value="<?php IF(!empty($enfermeria->enfMed5))echo $enfermeria->enfMed5;?>">
                        </div>
                        <div class="col-lg-1">
                            <label>Horarios</label>
                        </div>
                        <div class="col-lg-6">
                            <input type="text" style="width:70%" name="enfHor5" value="<?php IF(!empty($enfermeria->enfHor5))echo $enfermeria->enfHor5;?>">
                        </div>
                        <div class="col-lg-2">
                            <label>Medicamento/Dosis</label>
                        </div>
                        <div class="col-lg-3">
                            <input type="text" name="enfMed6" value="<?php IF(!empty($enfermeria->enfMed6))echo $enfermeria->enfMed6;?>">
                        </div>
                        <div class="col-lg-1">
                            <label>Horarios</label>
                        </div>
                        <div class="col-lg-6">
                            <input type="text" style="width:70%" name="enfHor6" value="<?php IF(!empty($enfermeria->enfHor6))echo $enfermeria->enfHor6;?>">
                        </div>
                    </div>
                        <div class="col-lg-12"><hr></div>
                        <div class="col-lg-12">
                            <label class="titulo">Ayudas Técnicas</label>
                        </div>
                    <div class="col-lg-12">
                        <div class="col-lg-2">
                            <label>Protesis Dental</label>
                        </div>
                        <div class="col-lg-10">
                            &nbsp;&nbsp;&nbsp;&nbsp;
                            <input type='radio' name="protesisR" value="1" <?php IF(!empty($enfermeria->enfProtesis))echo 'checked';?>> Si 
                            <input type='radio' name="protesisR" value="0" <?php IF(empty($enfermeria->enfProtesis) && $enfermeria->enfProtesis === '0')echo 'checked';?>> No
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <input type='checkbox' name="enfProtesisInf" value="1" <?php IF(!empty($enfermeria->enfProtesisInf))echo 'checked';?>> Inferior 
                            &nbsp;&nbsp;&nbsp;&nbsp;
                            <input type='checkbox' name="enfProtesisSup" value="1" <?php IF(!empty($enfermeria->enfProtesisSup))echo 'checked';?>> Superior
                            &nbsp;
                            <input type='checkbox' name="enfProtesisCom" value="1" <?php IF(!empty($enfermeria->enfProtesisCom))echo 'checked';?>> Completa
                        </div>
                        <div class="col-lg-2">
                            <label>Audífonos</label>
                        </div>
                        <div class="col-lg-10">
                            &nbsp;&nbsp;&nbsp;&nbsp;
                            <input type='radio' name="audifonoR" value="1" <?php IF(!empty($enfermeria->enfAudifono))echo 'checked';?>> Si 
                            <input type='radio' name="audifonoR" value="0" <?php IF(empty($enfermeria->enfAudifono) && $enfermeria->enfAudifono === '0')echo 'checked';?>> No
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <input type='checkbox' name="enfAudifonoIzq" value="1" <?php IF(!empty($enfermeria->enfAudifonoIzq))echo 'checked';?>> Izquierdo 
                            &nbsp;
                            <input type='checkbox' name="enfAudifonoDer" value="1" <?php IF(!empty($enfermeria->enfAudifonoDer))echo 'checked';?>> Derecho
                            &nbsp;
                            <input type='checkbox' name="enfAudifonoAmb" value="1" <?php IF(!empty($enfermeria->enfAudifonoAmb))echo 'checked';?>> Ambos
                        </div>
                        <div class="col-lg-2">
                            <label>Otros</label>
                        </div>
                        <div class="col-lg-10">
                            &nbsp;&nbsp;&nbsp;&nbsp;
                            <input type='text' style="width:80%" name="enfOtro" value="<?php IF(!empty($enfermeria->enfOtro))echo $enfermeria->enfOtro;?>">
                        </div>
                    </div>
                        <div class="col-lg-12" ><hr></div>
                        <div class="col-lg-12">
                            <label class="titulo">Necesidades Alteradas</label>
                        </div>
                    <div class="col-lg-12">
                        <div class="col-lg-3">
                            <label>Retención</label>
                        </div>
                        <div class="col-lg-3">
                            <input type='radio' name="retencionR" value="1" <?php IF(!empty($enfermeria->enfRetencion))echo 'checked';?>> Si 
                            <input type='radio' name="retencionR" value="0" <?php IF(empty($enfermeria->enfRetencion) && $enfermeria->enfRetencion === '0')echo 'checked';?>> No
                        </div>
                        <div class="col-lg-3">
                            <label>Incontinencia Urinaria</label>
                        </div>
                        <div class="col-lg-3">
                            <input type='radio' name="incontinenciaR" value="1" <?php IF(!empty($enfermeria->enfIncontinencia))echo 'checked';?>> Si 
                            <input type='radio' name="incontinenciaR" value="0" <?php IF(empty($enfermeria->enfIncontinencia) && $enfermeria->enfIncontinencia === '0')echo 'checked';?>> No
                        </div>
                        <div class="col-lg-3">
                            <label>Estreñimiento o constipación</label>
                        </div>
                        <div class="col-lg-3">
                            <input type='radio' name="constipacionR" value="1" <?php IF(!empty($enfermeria->enfConstipacion))echo 'checked';?>> Si 
                            <input type='radio' name="constipacionR" value="0" <?php IF(empty($enfermeria->enfConstipacion) && $enfermeria->enfConstipacion === '0')echo 'checked';?>> No
                        </div>
                        <div class="col-lg-3">
                            <label>Diarrea</label>
                        </div>
                        <div class="col-lg-3">
                            <input type='radio' name="diarreaR" value="1" <?php IF(!empty($enfermeria->enfDiarrea))echo 'checked';?>> Si 
                            <input type='radio' name="diarreaR" value="0" <?php IF(empty($enfermeria->enfDiarrea) && $enfermeria->enfDiarrea === '0')echo 'checked';?>> No
                        </div>
                        <div class="col-lg-3">
                            <label>Cantidad horas de sueño nocturno</label>
                        </div>
                        <div class="col-lg-9">
                            <input type='text' style="width:80%" name="enfSueno" value="<?php IF(!empty($enfermeria->enfSueno))echo $enfermeria->enfSueno;?>"> 
                        </div>
                        <div class="col-lg-12"></div>
                        <div class="col-lg-3">
                            <label>Interrupciones del sueño</label>
                        </div>
                        <div class="col-lg-3">
                            <input type='radio' name="interrupcionR" value="1" <?php IF(!empty($enfermeria->enfInterrupcion))echo 'checked';?>> Si 
                            <input type='radio' name="interrupcionR" value="0" <?php IF(empty($enfermeria->enfInterrupcion) && $enfermeria->enfInterrupcion === '0')echo 'checked';?>> No
                        </div>
                        <div class="col-lg-3">
                            <label>Dificultad para conciliar sueño</label>
                        </div>
                        <div class="col-lg-3">
                            <input type='radio' name="conciliarR" value="1" <?php IF(!empty($enfermeria->enfConciliar))echo 'checked';?>> Si 
                            <input type='radio' name="conciliarR" value="0" <?php IF(empty($enfermeria->enfConciliar) && $enfermeria->enfConciliar === '0')echo 'checked';?>> No
                        </div>
                        <div class="col-lg-3">
                            <label>Despertar precoz</label>
                        </div>
                        <div class="col-lg-3">
                            <input type='radio' name="despertarR" value="1" <?php IF(!empty($enfermeria->enfDespertar))echo 'checked';?>> Si 
                            <input type='radio' name="despertarR" value="0" <?php IF(empty($enfermeria->enfDespertar) && $enfermeria->enfDespertar === '0')echo 'checked';?>> No
                        </div>
                        <div class="col-lg-3">
                            <label>Apetito</label>
                        </div>
                        <div class="col-lg-3">
                            <input type='radio' name="apetitoR" value="1" <?php IF(!empty($enfermeria->enfApetito))echo 'checked';?>> Disminución
                            <input type='radio' name="apetitoR" value="0" <?php IF(empty($enfermeria->enfApetito) && $enfermeria->enfApetito === '0')echo 'checked';?>> Aumento
                        </div>
                    </div>
                        <div class="col-lg-12" ><hr></div>
                        <div class="col-lg-12">
                            <label class="titulo">Farmaco Critíco</label>
                        </div>
                    
                        <div class="col-lg-10" style="margin-left:10px">
                            <input type="text" name="farmacoCritico" style="width:100%" value="<?php IF(!empty($enfermeria->enfFarmacoCritico)) echo $enfermeria->enfFarmacoCritico; ?> ">
                        </div>
                    <div class="col-lg-12" ><hr></div>
                    <div class="col-lg-6" align="right">
                        <?php echo form_submit('','Guardar','class="btn btn-primary btn-sm btnCetep"');?>
                    
                    </div>
                    <div class="col-lg-6">
                        <a href="<?php echo base_url("hd_admision/impresiones/cargarImprimir/".$datos->id )?>" >
                            <i class="fa fa-print fa-2x" aria-hidden="true" style="cursor:pointer;color: #da812e;vertical-align: central;margin-top: 3px" ></i>
                        </a>
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
                alert(data);
                //AUTOCOMPLETA CAMPOS DEVOLUCIONES
                document.getElementById("emailDev").value           = data.email;
                document.getElementById("nombresDev").value         = data.nombres;
                document.getElementById("apePatDev").value          = data.apellidoPaterno;
                document.getElementById("apeMatDev").value          = data.apellidoMaterno;
                document.getElementById("NCta").value               = data.ctaNumero;
               }
        })
        })
        
    
});
</script>    
<script>
    $(".csv4").hide();
    $("#more").click(function(){
        $("#more").hide();
        $(".csv4").show();  
    })
    $(".more2").hide();
    $("#more2").click(function(){
        $("#more2").hide();
        $(".more2").show();  
    })
    
    
    
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
        $("#habitacion").keydown(function () {
            if (event.keyCode == 13 || event.keyCode == 110 || event.keyCode == 190 || event.keyCode == 75 || event.keyCode > 95 && event.keyCode < 106 || event.keyCode == 27 || event.keyCode == 190 || event.keyCode == 111 || event.keyCode == 16 || event.keyCode == 189 || event.keyCode == 109 || event.keyCode == 8 || event.keyCode == 9 || event.keyCode > 47 && event.keyCode < 58)
                {}
            else {
                texto = $( "#habitacion" ).val();
                texto = texto.substring(0,texto.length-1);
                document.getElementById("habitacion").value = texto;
                event.returnValue = false;
            }
        });
        $("#diaEstadia").keydown(function () {
            if (event.keyCode == 13 || event.keyCode == 110 || event.keyCode == 190 || event.keyCode == 75 || event.keyCode > 95 && event.keyCode < 106 || event.keyCode == 27 || event.keyCode == 190 || event.keyCode == 111 || event.keyCode == 16 || event.keyCode == 189 || event.keyCode == 109 || event.keyCode == 8 || event.keyCode == 9 || event.keyCode > 47 && event.keyCode < 58)
                {}
            else {
                texto = $( "#diaEstadia" ).val();
                texto = texto.substring(0,texto.length-1);
                document.getElementById("diaEstadia").value = texto;
                event.returnValue = false;
            }
        });
        $("#telFijo").keydown(function (e) {
            alert(event.keyCode);
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

