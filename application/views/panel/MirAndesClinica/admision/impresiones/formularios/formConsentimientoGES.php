
 <?php 
                    //die(var_dump($datosApo[0]));
                        IF(!empty($datosApo[2]->apoNombre)){
                            foreach ($datosApo[2] as $con){
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
<style>
    hr {border: 1px dashed grey;; height: 0;}
    .tdd {border: 2px solid #a1a1a1; width:100%; border-radius: 25px !important; font-size: 10px}
</style>
<div style="page-break-before: always;"></div>
                <div class="col-lg-10" align="right" style=" margin-right: 40px">
                    <img src="<?php echo base_url();?>../assets/img/mirAndes.png" class="logo">
                </div>
                <br>
            <blockquote>
                <div class="col-lg-12" style="margin-top:-70px">
                    <h3>CONSENTIMIENTO DE INGRESO MIRANDES CLÍNICA<br>(PACIENTE GES)</h3>
                </div>
                <div class="col-lg-12"><hr></div>
                <div class="col-lg-10" align="right">
                    <?php 
                        $dia = date('d');$mes = date('m');$ano = date('Y');
                        if($mes==='10')$mes='Octubre';elseif($mes==='11')$mes='Noviembre';elseif($mes==='12')$mes='Diciembre';elseif($mes==='01')$mes='Enero';elseif($mes==='02')$mes='Febrero';elseif($mes==='03')$mes='Marzo';elseif($mes==='04')$mes='Abril';elseif($mes==='05')$mes='Mayo';elseif($mes==='06')$mes='Junio';elseif($mes==='07')$mes='Julio';elseif($mes==='08')$mes='Agosto';elseif($mes==='09')$mes='Septiembre';
                            echo '<br>Providencia, '.$dia.' de '.$mes.' de '.$ano.'<br>';
                    ?>
                </div>
                <br>
                <div class="col-lg-12" align="justify">
                    Nombre Paciente: <b><?php echo strtoupper($datos->nombres).' '.strtoupper($datos->apellidoPaterno).' '.strtoupper($datos->apellidoMaterno);?></b> Rut: <b><?php echo formatearRut($datos->rut);?></b>
                    <br><br>
                    Nombre Apoderado/ Familiar Responsable: <b><?php IF(!empty($apoNombre))echo strtoupper($apoNombre).' '.strtoupper($apoApePat).' '.strtoupper($apoApeMat);ELSE echo '......................................' ?></b> Rut: <b><?php IF(!empty($apoRut))echo formatearRut($apoRut);ELSE echo '................................'?></b>
                    <br><br>
                    Médico Tratante: <b><?php IF(!empty($datos->nombresmedicoAsignado))echo strtoupper($datos->nombresmedicoAsignado).' '.strtoupper($datos->apellidomedicoAsignado);ELSE echo '.............................................................................'; ?></b> Rut: <b><?php IF(!empty($datos->rutmedico))echo formatearRut($datos->rutmedico); ELSE echo '...............................'?></b>
                    <br>
                    
                    <h4>Descripción de las intervenciones médicas y psicosociales a realizar durante el periodo de hospitalización:</h4>
                    ●  Uso de fármacos psicoactivos.<br>
                    ●  Sesiones semanales con médico psiquiatra<br>
                    ●  Toma de exámenes de rutina (Orina, Sangre, Imágenes, etc.), en horario hábil, algunos de estos no se realizan en la clínica y deben ser derivados.<br>
                    ●  Incorporación a rutinas normalizadoras de la unidad.<br>
                    ●  Sesiones grupales e individuales de psicoeducación.<br>
                    ●  Entrevistas familiares.<br>
                    ●  Protocolo de Contención (según necesidad)<br><br>
                    <br>
                    <div class="col-lg-12" align="center">
                    <h3>INFORMACIÓN PARA EL PACIENTE, APODERADO, FAMILIARES Y VISITAS</h3>
                    </div>
                    I.<blockquote>DE LA COBERTURA Y PRESTACIONES</blockquote>
                    <br><br>
                    1.<blockquote>Es importante que usted sepa que, si su ingreso fue gestionado desde su Seguro de Salud con diagnóstico 
                    GES, esto garantiza el día cama y la atención del médico psiquiatra  3 veces a la semana. El médico psiquiatra 
                    podrá evaluar al paciente dentro de las 24 horas desde el ingreso en horario hábil.  Todo procedimiento NO 
                    garantizado  en  la  Canasta  GES  (por  ejemplo:  interconsultas  médicas  no  psiquiátricas,  exámenes  de 
                    laboratorio  o de imágenes con fines de diagnóstico médico no psiquiátrico, Urgencia médica no psiquiátrica, 
                    etc.) serán informados con anticipación al apoderado para su realización, no tendrán cobertura GES y deberá 
                    ser  pagados  por  el  paciente,  ya sea  a  través  de  su  seguro  de  salud  o  en  forma  directa.  Se  hará  entrega  al 
                    paciente o su apoderado una copia de la canasta de prestaciones y medicamentos para su conocimiento, de 
                    lo  cual  deberá  firmar  recibo  . Todo  lo  que  no  está  en  la  canasta  no está  garantizado (no es GES).  Si  tiene 
                    dudas, por favor pregunte.</blockquote>
                    2.<blockquote>Es  necesario  y  obligatorio  dejar  establecido  al  ingreso  del  paciente  la  individualización  de  un   Familiar 
                    Responsable  y/o  persona  que  deberá  actuar  como  su  apoderado  o  representante  legal  (si  corresponde) del paciente
                    durante  toda  la  estadía  hospitalaria. </blockquote>
                    3.<blockquote>Será responsabilidad del apoderado, familiar responsable o representante legal del paciente 
                    proveer los fármacos indicados por el medico tratante y entregarlos al personal de enfermería de la Clínica al ingreso
                    y durante la hospitalización, evitando que se produzca la falta de ellos. Al finalizar la hospitalización serán devueltos los 
                    medicamentos restantes, todo ello con excepción de los fármacos inyectables, que serán provistos por la clínica y agregados a la cuenta final.
                    </blockquote>
                    4.<blockquote>A su ingreso, se require que el paciente o su acompañante deje un depósito por insumos de <b>$40.000</b> en efectivo, 
                        tarjeta de crédito o tarjeta de débito. Esta suma permitiría cubrir gastos de copago de su seguro de salud e insumos
                    que no están considerados en la 
                    canasta GES. De no ser utilizado el depósito o lo reste de él, la clínica realizará una transferencia electrónica para concretar la devolución del excedente. 
                    El comprobante de la transferencia será enviado a la dirección de correo registrado al ingreso.
                    </blockquote>
                    <div align="right">pág. 1/6</div>
                    <div align="right" style="margin-top:-330px">
                        <img style="width: 560px;bottom:30px;right:30px;opacity: 0.4" src="<?php echo base_url();?>../assets/img/cerros.png">
                    </div>
                    <div style="transform: rotate(-90deg);top:-360px;left:345px;position: relative;width:700px;">
                        <span style=" font-size: 9px;opacity: 0.6">
                            PACIENTE: <label><?php echo strtoupper($datos->nombres).' '.strtoupper($datos->apellidoPaterno).' '.strtoupper($datos->apellidoMaterno);?></label> &nbsp;&nbsp;
                            RUT: <label><?php echo formatearRut($datos->rut);?></label> &nbsp;&nbsp;
                            FICHA: <label> <?php echo $datos->ficha; ?></label>
                        </span> 
                    </div>
                    
                    
                    
<div style="page-break-before: always;"></div>      
                <div class="col-lg-10" align="right" style=" margin-right: 40px">
                    <img src="<?php echo base_url();?>../assets/img/mirAndes.png" class="logo">
                </div>
                <div class="col-lg-12" style="margin-top:-50px">
                    <h3>CONSENTIMIENTO DE INGRESO MIRANDES CLÍNICA<br>(PACIENTE GES)</h3>
                </div>
                <div class="col-lg-12"><hr></div>
                5.<blockquote>El plazo del trámite de devolución en nuestra clínica es de al menos 90 días posteriores al alta (esto depende del 
                    tiempo en que el seguro de salud entrega l ainformación de existencia o no de copago).
                </blockquote>
                <br><br>
                II.<blockquote>DEL FUNCIONAMIENTO BÁSICO DE LA CLÍNICA</blockquote>
                <br>
                6.<blockquote>Es recomendable que el calzado a utilizar durante la hospitalización sea cómodo, bajo, sin tacos, con suela antideslizantepara evitar 
                    caídas y sin cordones.</blockquote>
                7.<blockquote>Se encontrará a disposición del paciente y/o del apoderado un libro de sugerencias, felicitaciones y reclamos. Sus comentarios nos 
                    ayuda a mejorar nuestra calidad de atención y servicio.</blockquote>
                8.<blockquote>La asignación de camas y dormitorios será determinado por Enfermero Jefe o TENS Coordinadora y, en último caso, por el técnico
                paramédico de acuerdo a la disponibilidad y diagnóstico del paciente.</blockquote>
                9.<blockquote>El paciente sólo podrá recibir y realizar 2 llamadas telefónicas respectivamente, de 15:00 a 17:00 hrs., lo que será registrado por el
                personal de enfermería.</blockquote>
                10.<blockquote>Las llamadas telefónicas deberán realizarse a un costado de la estación de enfermería, o acompañado por personal de enfermería.</blockquote>
                11.<blockquote>El horario de uso del patio es de 09:00 a 21:00 hrs. En época de calor podrán bajar posterior a la hora permitida siempre que sea por
                períodos cortos de tiempo y de acuerdo a la disponibilidad del personal de la clínica.</blockquote>
                12.<blockquote>Sobre las actividades docentes: MirAndes es un centro docente - asistencial, por lo que en ocasiones podrían participar de las
                intervenciones estudiantes de algunas carreras del área de la salud de los centros educacionales en convenio. Siempre se le informará
                con antelación de estas actividades, siendo el paciente libre de participar en ellas o no.</blockquote>
                13.<blockquote>El servicio de alimentación es externo, el paciente recibe las 4 comidas básicas (desayuno, almuerzo, once y cena). No está permitido
                el ingreso de alimentos a la clínica, pero existen algunas excepciones que deben ser indicados por el médico tratante y autorizado por el
                Enfermero Jefe.</blockquote>
                14.<blockquote>Los horarios básicos de funcionamiento de la Clínica son los siguientes, se distribuyen por piso y el personal de enfermería organizará
                los turnos que se requieran:<br><br>
                A.  Horario de Levantada/Acostada:<br>
                <table class="tdd" align="center">
                    <tr>
                        <td style="width:50%; padding-left: 20px; border-radius: 25px">Hora de Levantarse: 07:30 - 09:00 hrs.</td>
                        <td style="padding-left:20px">Hora de Acostarse: 21:30 - 23:00 hrs</td>
                    </tr>
                </table>
                <br>
                B. Horario servicios de alimentación:<br>
                <table class="tdd" align="center">
                    <tr>
                        <td style="width:50%;padding-left:20px">Desayuno: 08:30 - 09:30 hrs. (fin de semana se inicia 09:30 hrs)</td>
                        <td style="padding-left:20px">Almuerzo: 13:00 - 14:00 hrs</td>
                    </tr>
                     <tr>
                        <td style="padding-left:20px">Once: 16:20 - 17:00 hrs.</td>
                        <td style="padding-left:20px">Cena: 19:30 - 20:30 hrs</td>
                    </tr>
                </table>
                </blockquote>
                <br><br>
                III.<blockquote>DE LAS VISITAS</blockquote>
                <br>
                15.<blockquote>Las visitas y las llamadas telefónicas son autorizadas sólo previa indicación médica, la que deberá constar por escrito y en la ficha
                clínica del paciente. Si fuese necesario, también por indicación médica podrían suspenderse o restringirse las visitas y horarios de éstas,
                todo lo anterior por fines terapéuticos.</blockquote>
                <div align="right">pág. 2/6</div>
                    <div align="right" style="margin-top:-330px">
                        <img style="width: 560px;bottom:30px;right:30px;opacity: 0.4" src="<?php echo base_url();?>../assets/img/cerros.png">
                    </div>
                    <div style="transform: rotate(-90deg);top:-360px;left:345px;position: relative;width:700px;">
                        <span style=" font-size: 9px;opacity: 0.6">
                            PACIENTE: <label><?php echo strtoupper($datos->nombres).' '.strtoupper($datos->apellidoPaterno).' '.strtoupper($datos->apellidoMaterno);?></label> &nbsp;&nbsp;
                            RUT: <label><?php echo formatearRut($datos->rut);?></label> &nbsp;&nbsp;
                            FICHA: <label> <?php echo $datos->ficha; ?></label>
                        </span> 
                    </div>
                
                
<div style="page-break-before: always;"></div>             
                        <div class="col-lg-10" align="right" style=" margin-right: 40px">
                        <img src="<?php echo base_url();?>../assets/img/mirAndes.png" class="logo">
                        </div>
                        <div class="col-lg-12" style="margin-top:-50px">
                            <h3>CONSENTIMIENTO DE INGRESO MIRANDES CLÍNICA<br>(PACIENTE GES)</h3>
                        </div>
                        <div class="col-lg-12"><hr></div>
                        16.<blockquote>Las visitas se realizarán de la siguiente forma, pudiendo ingresar máximo 2 personas por paciente:<br><br>
                        - Primer y Tercer Piso: Lunes, jueves, sábado de 17:00 a 19:00 hrs. y domingo de 10:30 a 12:00 hrs.<br><br>
                        - Segundo Piso: Martes, viernes, domingo de 17:00 a 19:00 hrs. y sábado de 15:00 a 16:30 hrs.<br><br>
                        Fuera del horario antes normado, sólo podrán ingresar visitas que hayan sido autorizadas por el Enfermero Jefe. El paciente también
                        podrá decidir si recibe o no a determinadas visitas.</blockquote>
                        17.<blockquote>Al ingresar el apoderado en el horario de visitas, se revisarán las pertenencias de manera de evitar las que puedan ser potencialmente
                        riesgosas para el paciente o terceros. Por ejemplo, no deben ingresar alcohol, drogas, medicamentos de entrega directa al
                        paciente (sólo deberán entregarse al personal), armas, objetos cortopunzantes, artículos electrónicos, objetos que puedan hacer fuego,
                        entre otros.</blockquote>
                        18.<blockquote>Las visitas no deben ingresar o entregar ningún tipo de alimento a los pacientes.</blockquote>
                        19.<blockquote>La recepción de visitas deberá realizarse en espacios comunes, está estrictamente prohibido recibirlas en otros espacios como
                        dormitorios o baños.</blockquote>
                        20.<blockquote>Está prohibida la entrega directa de medicamentos al paciente, sólo deberán entregarse al personal de la clínica.</blockquote>
                        21.<blockquote>No se podrá entregar a los pacientes artículos electrónicos ni facilitarles el uso de celulares durante el horario de visitas.</blockquote>
                        22.<blockquote>Está prohibido el ingreso de visitas menores de 14 años de edad a la Clínica; a menos que, en casos excepcionales, sea autorizado
                        por el médico psiquiatra tratante.</blockquote>
                        23.<blockquote>El comportamiento de las visitas debe ser acorde al lugar y respetuoso en el trato con el resto de los pacientes. No podrán hacer
                        grabaciones ni tomarse fotografías con los pacientes.</blockquote>
                        24.<blockquote>En caso de que el apoderado o familiar del paciente retire cualquier pertenencia, deberá informar y declarar por escrito en el libro
                        de registro de pertenencias con el nombre y firma de quien retira. Todas las pertenencias y medicamentos que ingresan o salen de la
                        clínica deben ser inventariados, de modo de tener un registro para la seguridad del paciente y la clínica.</blockquote>
                        25.<blockquote>Está prohibido fumar dentro del recinto, por lo que los usuarios podrán hacerlo en el patio, en los horarios establecidos. Los
                        familiares NO TIENEN PERMITIDO fumar en ninguna de las dependencias de la Clínica.</blockquote>
                        <br><br>
                        IV.<blockquote>DE LOS OBJETOS PROHIBIDOS:</blockquote>
                        <br>
                        26.<blockquote>En el momento del ingreso del paciente, serán revisadas todas sus pertenencias y los objetos de valor serán entregados a su
                        familiar responsable o acompañante. Objetos prohibidos; como por ejemplo objetos cortantes o punzantes, fármacos, cinturones y
                        cordones (ver cartilla); no podrán ingresar a la clínica. Los artículos de higiene personal que representen riesgo serán guardados e
                        inventariados por el personal y el paciente tendrá autorización para su uso con indicación médica y bajo supervisión (ejemplo: pinzas,
                        cosméticos, etc.). No está permitido el uso de depiladoras o elementos con filo (puede ingresar cera o crema depilatoria). Los aparatos
                        electrónicos (celulares, laptops, tablets, cámaras fotográficas, dispositivos para escuchar música, etc.) no podrán ingresar a la Clínica.</blockquote>
                        <blockquote>Todas las pertenencias serán devueltas al momento del alta</blockquote>
                        27.<blockquote>Está prohibido el ingreso de alcohol, drogas, armas, objetos cortopunzantes u objetos con que se pueda hacer fuego.</blockquote>
                        28.<blockquote>En forma aleatoria y sin aviso el personal de enfermería realizará revisiones de los dormitorios, clósets y veladores por motivos de
                        seguridad según protocolo, para evitar que porten objetos que puedan ser utilizados para agredirse o agredir a otro. Se registrará todo
                        hallazgo en la ficha clínica del paciente y en el libro de pertenencias.</blockquote>
                        <div align="right">pág. 3/6</div>
                    <div align="right" style="margin-top:-330px">
                        <img style="width: 560px;bottom:30px;right:30px;opacity: 0.4" src="<?php echo base_url();?>../assets/img/cerros.png">
                    </div>
                    <div style="transform: rotate(-90deg);top:-360px;left:345px;position: relative;width:700px;">
                        <span style=" font-size: 9px;opacity: 0.6">
                            PACIENTE: <label><?php echo strtoupper($datos->nombres).' '.strtoupper($datos->apellidoPaterno).' '.strtoupper($datos->apellidoMaterno);?></label> &nbsp;&nbsp;
                            RUT: <label><?php echo formatearRut($datos->rut);?></label> &nbsp;&nbsp;
                            FICHA: <label> <?php echo $datos->ficha; ?></label>
                        </span> 
                    </div>
                
                
<div style="page-break-before: always;"></div>             
                        <div class="col-lg-10" align="right" style=" margin-right: 40px">
                        <img src="<?php echo base_url();?>../assets/img/mirAndes.png" class="logo">
                        </div>
                        <div class="col-lg-12" style="margin-top:-50px">
                            <h3>CONSENTIMIENTO DE INGRESO MIRANDES CLÍNICA<br>(PACIENTE GES)</h3>
                        </div>
                        <div class="col-lg-12"><hr></div>
                        
                        29.<blockquote>Por motivos de seguridad durante la hospitalización los pacientes no deberán portar cadenas, accesorios con puntas, cinturones,
                        etc.</blockquote>
                        30.<blockquote>La Clínica no custodiará dinero, objetos valiosos (Ej.: lentes o chaquetas de marca) ni joyas de los pacientes, estos serán devueltos al
                        familiar responsable o apoderado. La Clínica no se hará responsable de la pérdida de cualquiera de éstos que porte el paciente en sus
                        pertenencias. Si para el paciente es importante su ingreso, se le pedirá que firme un documento donde se hace responsable personalmente
                        del ingreso y cuidado de ese objeto.</blockquote>
                        31.<blockquote>La Clínica no se hará responsable en caso de pérdidas de objetos personales y dinero.</blockquote>
                        <br>
                        V.<blockquote>DE LAS NORMAS DE CONVIVENCIA:</blockquote>
                        <br>
                        32.<blockquote>No está permitido que los pacientes ingresen a las habitaciones de otros pacientes. Se deberá evitar conductas sexualizadas entre
                        pacientes.</blockquote>
                        33.<blockquote>Está prohibido que el paciente firme cualquier tipo de documentación durante la hospitalización, a menos que el médico psiquiatra
                        tratante lo autorice y frente a un testigo imparcial.</blockquote>
                        34.<blockquote>Para acceder al patio, los pacientes del 2° y 3° piso deberán bajar acompañados por personal de enfermería.</blockquote>
                        35.<blockquote>Los pacientes no tendrán en su poder cigarrillos, encendedores o fósforos. El Técnico Paramédico o el Asistente de Enfermería será
                        quien custodie, maneje y entregue cada vez que sea necesario los cigarrillos, el paciente debe fumar en los horarios permitidos para
                        utilizar el patio, durante el día. Será de responsabilidad del familiar o apoderado comprarle y entregar en la clínica las cajetillas al
                        personal de enfermería.</blockquote>   
                        36.<blockquote>Los pacientes menores de 18 años sólo podrán fumar con autorización de sus padres y con la autorización de su psiquiatra tratante,
                        quien además definirá la cantidad en el día y horarios.</blockquote>
                        37.<blockquote>Los pacientes no deberán ingresar a habitaciones ajenas, ni circular por las escaleras sin supervisión del personal de enfermería.</blockquote>
                        38.<blockquote>El no cumplimiento de las normativas y deberes, agresión de cualquier tipo al personal o a otros pacientes de la Clínica, ruptura o
                        daño al inmobiliario, puede ser causal de alta administrativa, situación que será evaluada por la Dirección de MirAndes Clínica.</blockquote>
                        <br>
                        VI.<blockquote>DE LOS CUIDADOS DE LOS PACIENTES:</blockquote>
                        <br>
                        39.<blockquote>En caso de que el Médico Psiquiatra defina la necesidad de iniciar tratamiento específico con Leponex o TEC (terapia electro
                        convulsiva), se avisará y explicará al familiar responsable o apoderado con anterioridad el procedimiento y se solicitará su autorización
                        previo al tratamiento. No se realizará tratamiento sin el consentimiento informado del procedimiento firmado por el paciente y
                        apoderado o familiar responsable.</blockquote>
                        40.<blockquote>En pacientes graves y/o de riesgo (ej: caídas, auto o hetero agresión), el médico tratante puede dejar indicación de cuidadora 24
                        horas o durante el día 12 horas, esta no podrá ser un familiar o amigo(a) del paciente. Sólo se permitirán cuidadoras con experiencia en
                        Salud Mental. Lo anterior, NO está cubierto por la garantía GES por lo que se debe cancelar en forma particular a la empresa externa (la
                        clínica no cuenta con cuidadoras). El no cumplimiento de esta indicación médica puede ser motivo de alta administrativa.</blockquote>
                        41.<blockquote>En caso de Urgencias o Emergencias Médicas No Psiquiátricas, se le informará al familiar responsable o apoderado a la brevedad
                        posible, y el paciente por indicación médica será trasladado en ambulancia al Servicio de Urgencia de la Clínica u Hospital que ellos
                        hayan dejado explicitado por escrito al ingreso del paciente. Lo anterior, NO está cubierto por la garantía GES. En caso de emergencia
                        vital se trasladará en ambulancia de alta complejidad al servicio de urgencias más cercano, el cual debe ser pagado por el apoderado.</blockquote>
                         <div align="right">pág. 4/6</div>
                    <div align="right" style="margin-top:-350px">
                        <img style="width: 560px;bottom:30px;right:30px;opacity: 0.4" src="<?php echo base_url();?>../assets/img/cerros.png">
                    </div>
                    <div style="transform: rotate(-90deg);top:-360px;left:345px;position: relative;width:700px;">
                        <span style=" font-size: 9px;opacity: 0.6">
                            PACIENTE: <label><?php echo strtoupper($datos->nombres).' '.strtoupper($datos->apellidoPaterno).' '.strtoupper($datos->apellidoMaterno);?></label> &nbsp;&nbsp;
                            RUT: <label><?php echo formatearRut($datos->rut);?></label> &nbsp;&nbsp;
                            FICHA: <label> <?php echo $datos->ficha; ?></label>
                        </span> 
                    </div>
                
                
<div style="page-break-before: always;"></div>             
                        <div class="col-lg-10" align="right" style=" margin-right: 40px">
                        <img src="<?php echo base_url();?>../assets/img/mirAndes.png" class="logo">
                        </div>
                        <div class="col-lg-12" style="margin-top:-50px">
                            <h3>CONSENTIMIENTO DE INGRESO MIRANDES CLÍNICA<br>(PACIENTE GES)</h3>
                        </div>
                        <div class="col-lg-12"><hr></div>
                        42.<blockquote>Siempre que un paciente sea derivado a un servicio de urgencias, el familiar responsable o apoderado debe dirigirse a la brevedad
                        posible a la clínica donde se está derivando el paciente. Si la familia no es de Santiago, deberá buscar dentro de sus contactos a quien
                        se haga responsable en caso de una posible derivación. Lo anterior debido al trámite administrativo que significa una atención de</blockquote>
                        43.<blockquote>Excepcionalmente, si un paciente grave o con alteración del juicio realidad (por su situación de Salud Mental) pone en riesgo su vida
                        y la de los demás pacientes, agrede al personal de la clínica y/o destruye mobiliario, entre otras acciones violentas; el médico tratante o
                        el director médico de Mirandes podrá recurrir a la indicación de uso de medidas de contención física o farmacológica, de acuerdo a los
                        protocolos establecidos. En caso que el personal de enfermería no logre contener físicamente al paciente por el alto grado de agresividad
                        del paciente (casos que ocurren muy infrecuentemente) se llamará a un equipo de contención externa. Esto no está cubierto por el
                        GES y tiene que ser cancelado por el familiar responsable.</blockquote>
                        44.<blockquote>Clínica Mirandes no cuenta con un psquiatra de urgencia ni médico residente. Cualquier situación clínica o médica que lo requiera
                        será derivada a un servicio de urgencias. Los psiquiatras tratantes pueden solicitar evaluación por un médico de otra especialidad, por
                        ej. neurólogo, diabetólogo, cardiólogo, etc. Estos controles se pueden realizar fuera de la clínica con autorización del médico tratante.
                        Esto no está cubierto por el GES y deben ser tramitados y cancelados mediante el uso de su plan de salud a quien corresponda.
                        Siempre se informará al familiar responsable antes de solicitar cualquier evaluación, a menos que sea una emergencia vital.</blockquote>
                        45.<blockquote>Clínica Mirandes como clínica psiquiátrica no cuenta con la implementación para manejo de patologías medicas no psiquiátricas
                        descompensadas. Los pacientes que ingresan a Mirandes deben estar estabilizados y compensados de sus patologías médicas de base
                        (no psiquiátricas). Lo anterior puede ser motivo de rechazo de ingreso o derivación. El personal de enfermería está capacitado para
                        manejar RCP (Reanimación Cardiopulmonar) básica, no de alta complejidad, y para manejar descompensaciones leves de cuadros
                        médicos (Ej: crisis hipertensivas, manejo inicial de IAM (Infarto Agudo al Miocardio), manejo inicial de caídas, descompensación leve de
                        Diabetes Mellitus).</blockquote>
                        46.<blockquote>MirAndes Clínica se reserva el derecho de admitir o no a pacientes que al momento de su ingreso evidencien patología médica
                        descompensada, daños orgánicos severos, o que tengan patologías de adicción a drogas.</blockquote>
                        <br>
                        <hr>
                        <br>
                        1. <blockquote>He sido informado respecto a cuáles son los procedimientos diagnósticos y terapéuticos para tratar mi enfermedad.</blockquote>
                        2. <blockquote>He sido informado respecto a que la opción de hospitalizar es necesaria y adecuada a mi condición.</blockquote>
                        3. <blockquote>He sido informado que, a pesar de toda la información entregada por el equipo médico tratante y los riesgos que el alta exigida
                        implica, podré exigir el alta, abandonando la hospitalización; en cuyo caso deberé firmar documento llamado “Alta Precoz”.</blockquote>
                        4. <blockquote>He sido informado que ésta es una Institución Asistencial – Docente, por lo cual hay alumnos de distintas carreras de la Salud,
                        como asimismo médicos en proceso de especialización. Por lo que podría ser atendido por profesionales en formación, junto a sus
                        docentes responsables.</blockquote>
                        5. <blockquote>También me han explicado que la clínica tiene normas de trabajo, que deberé respetar en todo momento.</blockquote>
                        6. <blockquote>Dejo constancia que se me entrega por escrito información general de la Unidad de Hospitalización de MirAndes y Ley de
                        Deberes y Derechos del paciente.</blockquote>
                        7. <blockquote>Se me ha informado suficientemente de la necesidad de estas intervenciones y de sus alternativas.</blockquote>
                        8. <blockquote>Me han aclarado las dudas que se me han presentado al escuchar y leer la información específica recibida. También sé que
                            puedo negarme al procedimiento y que siempre puedo retractarme de la decisión que ahora tome.</blockquote>
<div align="right">pág. 5/6</div>
                    <div align="right" style="margin-top:-350px">
                        <img style="width: 560px;bottom:30px;right:30px;opacity: 0.4" src="<?php echo base_url();?>../assets/img/cerros.png">
                    </div>
                    <div style="transform: rotate(-90deg);top:-360px;left:345px;position: relative;width:700px;">
                        <span style=" font-size: 9px;opacity: 0.6">
                            PACIENTE: <label><?php echo strtoupper($datos->nombres).' '.strtoupper($datos->apellidoPaterno).' '.strtoupper($datos->apellidoMaterno);?></label> &nbsp;&nbsp;
                            RUT: <label><?php echo formatearRut($datos->rut);?></label> &nbsp;&nbsp;
                            FICHA: <label> <?php echo $datos->ficha; ?></label>
                        </span> 
                    </div>
                
                
<div style="page-break-before: always;"></div>             
                        <div class="col-lg-10" align="right" style=" margin-right: 40px">
                        <img src="<?php echo base_url();?>../assets/img/mirAndes.png" class="logo">
                        </div>
                        <div class="col-lg-12" style="margin-top:-50px">
                            <h3>CONSENTIMIENTO DE INGRESO MIRANDES CLÍNICA<br>(PACIENTE GES)</h3>
                        </div>
                        <div class="col-lg-12"><hr></div>
                        
                        
                        <br>
                    <b>Por lo todo lo anterior, libremente DOY MI CONSENTIMIENTO y acepto la hospitalización y tratamiento psiquiátrico en Clínica MirAndes.</b>
                    <br><br><br>
                    NOMBRE DEL PACIENTE: <b><?php echo strtoupper($datos->nombres).' '.strtoupper($datos->apellidoPaterno).' '.strtoupper($datos->apellidoMaterno);?></b>
                    <br><br>
                    C.I. N° <b><?php echo formatearRut($datos->rut);?></b> &nbsp;&nbsp;&nbsp;&nbsp;FIRMA.............................
                    <br><br>
                    NOMBRE APODERADO DESIGNADO POR EL PACIENTE: <b><?php IF(!empty($apoNombre))echo strtoupper($apoNombre).' '.strtoupper($apoApePat).' '.strtoupper($apoApeMat);ELSE echo '...............................' ?></b>
                    <br><br>
                    C.I. N° <b><?php IF(!empty($apoRut))echo formatearRut($apoRut);ELSE echo '.............'?></b> &nbsp;&nbsp;&nbsp;&nbsp;FIRMA.............................
                    <br><br><br>
                    Yo, ............................................................................ Rut: ..........................................., he sido testigo que se ha entregado y leído el consentimiento por el familiar y el paciente. Certifico que las personas que aquí firman son las que dicen ser, lo que he verificado con sus respectivas cédulas de identidad.
                    
                    <br><br><br>
                    <h4><u>Consentimiento por Representante legal:</u></h4>
                    <br><br>
                    Yo, <label><?php IF(!empty($apoNombre))echo strtoupper($apoNombre).' '.strtoupper($apoApePat).' '.strtoupper($apoApeMat);ELSE echo '.................' ?></label>, R.U.T: <label><?php IF(!empty($apoRut))echo formatearRut($apoRut);ELSE echo '.........................' ?></label>, domiciliado en <label><?php echo strtoupper($apoDireccion) ;?></label>, fono: <label><?php echo $apoTelefono.'   '.$apoCelular ;?></label>. En calidad de representante de don(ña) <label><?php echo strtoupper($datos->nombres).' '.strtoupper($datos->apellidoPaterno).' '.strtoupper($datos->apellidoMaterno);?></label> Rut <?php echo formatearRut($datos->rut);?>, quien no puede actuar por sí mismo por:
                    <br>
                    &nbsp;<input class="cuadrado">&nbsp;Ser menor de edad.
                    <br>
                    &nbsp;<input class="cuadrado">&nbsp;Estar incapacitado legalmente, (no está en condiciones de decidir adecuadamente sobre su estado de salud)
                    <br><br>
                    Procedo a realizar los trámites de ingreso a Clínica MirAndes del paciente antes individualizado y, en tal 
                    calidad, suscribo elpresente documento y declaro que he recibido la información en él consignada y que 
                    acepto su Ingreso a dicha Clínica para recibir asistencia médica psiquiátrica
                    <br><br><br>
                    Firma del representante legal: ...............................................................
                    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                    <b>Médico o Profesional que informa:</b> <?php IF(!empty($datos->nombresmedicoAsignado))echo strtoupper($datos->nombresmedicoAsignado).' '.strtoupper($datos->apellidomedicoAsignado);ELSE echo '.............................................................................'; ?>
                    <br>  
                    <div class="col-lg-10" align="left">
                        <?php 
                            $dia = date('d');$mes = date('m');$ano = date('Y');
                            if($mes==='10')$mes='Octubre';elseif($mes==='11')$mes='Noviembre';elseif($mes==='12')$mes='Diciembre';elseif($mes==='01')$mes='Enero';elseif($mes==='02')$mes='Febrero';elseif($mes==='03')$mes='Marzo';elseif($mes==='04')$mes='Abril';elseif($mes==='05')$mes='Mayo';elseif($mes==='06')$mes='Junio';elseif($mes==='07')$mes='Julio';elseif($mes==='08')$mes='Agosto';elseif($mes==='09')$mes='Septiembre';
                            echo '<br>Providencia, '.$dia.' de '.$mes.' de '.$ano.'<br>';
                        ?>
                    </div>
                    
                    
                   <div align="right">pág. 6/6</div>
                    <div align="right" style="margin-top:-350px">
                        <img style="width: 560px;bottom:30px;right:30px;opacity: 0.4" src="<?php echo base_url();?>../assets/img/cerros.png">
                    </div>
                    <div style="transform: rotate(-90deg);top:-360px;left:345px;position: relative;width:700px;">
                        <span style=" font-size: 9px;opacity: 0.6">
                            PACIENTE: <label><?php echo strtoupper($datos->nombres).' '.strtoupper($datos->apellidoPaterno).' '.strtoupper($datos->apellidoMaterno);?></label> &nbsp;&nbsp;
                            RUT: <label><?php echo formatearRut($datos->rut);?></label> &nbsp;&nbsp;
                            FICHA: <label> <?php echo $datos->ficha; ?></label>
                        </span> 
                    </div>
                

                </div>
            </blockquote>
            