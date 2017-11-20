<?php 
                    
                        IF(!empty($datosApo[2]->apoNombre)){
                            foreach ($datosApo[2] as $con){
                                $nombreOtroContacto     = $datosApo[2]->apoNombre;
                                $parentescoOtroContacto = $datosApo[2]->apoParentesco;
                                $telUnoOtroContacto     = $datosApo[2]->apoTelefono;
                                $telDosOtroContacto     = $datosApo[2]->apoCelular;
                                IF($parentescoOtroContacto === '1')$parentescoOtroContacto='Padre';ELSEIF($parentescoOtroContacto === '2')$parentescoOtroContacto='Madre';ELSEIF($parentescoOtroContacto === '3')$parentescoOtroContacto='Hijo/a';ELSEIF($parentescoOtroContacto === '4')$parentescoOtroContacto='Conyuge';ELSEIF($parentescoOtroContacto === '5')$parentescoOtroContacto='Hermano/a';ELSEIF($parentescoOtroContacto === '6')$parentescoOtroContacto='Tío/a';ELSEIF($parentescoOtroContacto === '7')$parentescoOtroContacto='Primo/a';ELSEIF($parentescoOtroContacto === '8')$parentescoOtroContacto='Otro';
                            }
                        }
                        IF(!empty($datosApo[0]->apoRut)){
                            
                                $apoRut         = $datosApo[0]->apoRut;
                                $apoNombre      = $datosApo[0]->apoNombre;
                                $apoApePat      = $datosApo[0]->apoApePat;
                                $apoApeMat      = $datosApo[0]->apoApeMat;
                                $apoDireccion   = $datosApo[0]->apoDireccion;
                                $apoTelefono    = $datosApo[0]->apoTelefono;
                                $apoCelular     = $datosApo[0]->apoCelular;
                                $apoEmail       = $datosApo[0]->apoEmail;
                                $apoComuna      = $datosApo[0]->comuna;
                                $apoParentesco  = $datosApo[0]->apoParentesco;
                                IF($apoParentesco  === '1')$apoParentesco = 'Padre';ELSEIF($apoParentesco  === '2')$apoParentesco = 'Madre';ELSEIF($apoParentesco  === '3')$apoParentesco = 'Hijo/a';ELSEIF($apoParentesco  === '4')$apoParentesco = 'Conyuge';ELSEIF($apoParentesco  === '5')$apoParentesco = 'Hermano/a';ELSEIF($apoParentesco  === '6')$apoParentesco = 'Tío/a';ELSEIF($apoParentesco  === '7')$apoParentesco = 'Primo/a';ELSE$apoParentesco = 'Otro';

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

<style>
    .hr {border: 1px dashed #B404AE; height: 0; width: 100%;}
    .hr2 {border: 0; border-top: 1px solid #999; border-bottom: 1px solid #333; height:0;}
    .fucsia {color: #B404AE;}
    .cubo {text-align: left; vertical-align: top; width:220px;height: 135px;border:1px solid black; text-align: top;border-radius: 10px}
    span {font-size: 12px; font-family: arial}
</style>

<div style="page-break-after: always;" >
            <div class="col-lg-12" align="right" style="margin-right: 40px">
                <img src="<?php echo base_url();?>../assets/img/mirAndes.png" class="logo">
            </div>
        <blockquote>
            
            <div style="margin-top:-28px">
                <h2 class="fucsia" style="font-size:25px">RECORDATORIO DE ENFERMERÍA</h2>
            </div>
            <div style="margin-top:-13px" class="hr">
            </div>
            <br><br><br>
            <div style="margin-top:-13px">
                <p style="font-size:18px; font-family: arial">
                1. Traer botella para el agua.<br><br>
                2. Traer frazada o manta.<br><br>
                3. Traer lápiz y cuaderno para apuntes.<br>
                </p>
                <br><br><br>
                
            </div>
            <div><h3 class="fucsia" style="font-size:20px">Es de su responsabilidad como usuario/a:</h3></div>
            <br>
            <p style="font-size:18px; font-family: arial">
            1. Asistir puntualmente, todos los días definidos por su equipo tratante.
            <br><br>
            2. Informar telefonicamente en caso de inasistencia o retraso en la hora de entrada.
            <br><br>
            3. Solicitar recetas médicas a su médico tratante según necesidad.
            <br><br>
            4. Gestionar con anticipación sus Licencias Médicas, de ser éstas una indicación definida desde su intervención terapéutica.
            <br><br>
            </p>
            <br>
            <div><h3 class="fucsia" align="right"  style="font-size:20px">Enfermería Hospital de Día</h3></div>
            <div align="right" style="margin-top:-50px">
            <img style="width: 560px;bottom:30px;right:30px;opacity: 0.4" src="<?php echo base_url();?>../assets/img/cerros.png">
            </div>
        </blockquote>
</div>
    