
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
                    <h3>CONSENTIMIENTO DE INGRESO MIRANDES CLÍNICA<br>(PACIENTE LIBRE ELECCIÓN)</h3>
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
                    ●  Toma de exámenes de rutina (Orina, Sangre, Imágenes, etc.)<br>
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
                    1.<blockquote>Es  importante  que  usted sepa  que,  si  el  ingreso  del  paciente  es  de  urgencia  o  libre elección,  
                        toda  la hospitalización  y  atención  por  el  médico  psiquiatra  será  cobrada  y  pagada  en  forma  particular y/o  
                        de acuerdo a su plan de salud. El día cama de libre elección en Mirandes Clínica es de <b>$122.000.-</b> en 
                        <b>habitación compartida </b>(2 camas), con baño compartido.</blockquote>
                    2.<blockquote>Es necesario y obligatorio dejar establecido al ingreso del paciente la individualización de un  
                        Familiar Responsable y/o persona que deberá actuar como su apoderado o representante legal (si corresponde) 
                        durante toda la estadía hospitalaria. Las visitas   y   las llamadas   telefónicas serán autorizadas sólo previa indicación 
                        médica, la que deberá constar por escrito en la ficha clínica del paciente; si fuese necesario, también por indicación 
                        médica podrían suspenderse o restringirse las visitas y horarios de éstas, todo ello por fines terapéuticos.</blockquote>
                    3.<blockquote>Las visitas se realizarán de la siguiente forma, pudiendo ingresar máximo 2 personas por paciente:<br>
                        &nbsp;&nbsp;<b>●  Segundo Piso:</b> martes, viernes y domingo de 17:00 a 19:00 hrs. Y sábados de 15:00 a 16:30hrs<br>
                        &nbsp;&nbsp;<b>●  Primer y Tercer Piso:</b> lunes, jueves y sábado de 17:00 a 19:00hrs. Y domingo de 10:30 a 12:00hrs<br>
                        <b>Fuera del horario antes normado</b>, sólo podrán ingresar visitas que hayan sido indicadas por el médico tratante, 
                        el paciente también podrá decidir si recibe o no a determinadas visitas.</blockquote>
                    4.<blockquote>En el momento del ingreso del paciente, serán revisadas todas sus pertenencias y serán entregadas a su 
                        familiar responsable o acompañante. En caso de ingresar sólo sin apoderado o acompañante, serán requisadas,   
                        guardadas   e   inventariadas   aquéllas   que   puedan   ser   elementos   de   riesgo   de   auto   o heteroagresión  (ver cartilla),  
                        como por ejemplo, objetos  cortantes o punzantes,  fármacos, cinturones y cordones. Asimismo, también los artículos de 
                        higiene personal que representen riesgo serán guardados por el personal y el paciente tendrá autorización para su uso 
                        con indicación médica y bajo supervisión (ejemplo: pinzas, cosméticos, etc.).  No está permitido el uso de depiladoras o 
                        elementos con filo (Se permite  ingresar Cera o crema depilatoria para uso en frío) Todas las pertenencias serán devueltas 
                        al momento del alta.</blockquote>
                     5.<blockquote>A  toda  persona  que  ingrese  en  horario  de  visitas,  se  le  requisarán  pertenencias  que  puedan  ser 
                         potencialmente riesgosas para el paciente o terceros, y serán devueltas al término de la visita.</blockquote>
                     6.<blockquote>Las visitas no deben ingresar o entregar ningún tipo de alimento a los pacientes.</blockquote>
                    <div align="right">pág. 1/5</div>
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
                    <h3>CONSENTIMIENTO DE INGRESO MIRANDES CLÍNICA<br>(PACIENTE LIBRE ELECCIÓN)</h3>
                </div>
                <div class="col-lg-12"><hr></div>
               
                <!--
                II.<blockquote>DEL FUNCIONAMIENTO BÁSICO DE LA CLÍNICA</blockquote>
                <br>
                -->
                7.<blockquote>La recepción de visitas deberá realizarse en espacios comunes, está estrictamente prohibido recibirlas en otros espacios.</blockquote>
                8.<blockquote>Está prohibido el ingreso de alcohol, drogas, armas, objetos cortopunzantes u objetos que puedan hacer fuego a la clínica.</blockquote>
                9.<blockquote>Está prohibida la entrega directa de medicamentos al paciente, sólo deberán entregarse al personal de la Clínica.</blockquote>
                10.<blockquote>No se podrá entregar a los pacientes artículos electrónicos <b>ni facilitarles el uso de celulares durante el horario de visitas.</b></blockquote>
                11.<blockquote>Está  prohibido  el  ingreso  de  visitas menores  de  14 años  de  edad a  la  Clínica,  a  menos  que  en  casos 
                    excepcionales sea autorizado por el médico psiquiatra tratante.</blockquote>
                12.<blockquote>El comportamiento de las visitas debe ser acorde al lugar y respetuoso en el trato con el resto de los pacientes. 
                    No se podrá hacer grabar ni tomar fotografías con los pacientes.</blockquote>
                13.<blockquote>En forma aleatoria y sin aviso previo, el personal de enfermería realizará revisiones de los dormitorios, closets 
                    y veladores por motivos de seguridad, para evitar que porten  objetos que puedan ser utilizados para agredirse o agredir a otro.  
                    Se registrará todo hallazgo en la ficha clínica del paciente y en el libro de pertenencias.</blockquote>
                14.<blockquote>Será responsabilidad del apoderado, familiar responsable o representante legal del paciente, proveer 
                    los fármacos indicados por el médico tratante y entregarlos al personal de enfermería de la Clínica al ingreso y durante 
                    la hospitalización,  evitando que se produzca la falta de ellos.  Al finalizar la hospitalización  serán devueltos lo medicamentos  
                    sobrantes, todo ello con excepción de  los  fármacos  inyectables,  que serán proveídos por la Clínica y agregados a la cuenta final.
                   
                </blockquote>
               
                        15.<blockquote>Está prohibido que el paciente firme cualquier tipo de documentación durante la hospitalización, 
                            a menos que el médico psiquiatra tratante lo autorice y  se haga frente a un testigo imparcial.</blockquote>
                        16.<blockquote>La asignación de camas y dormitorios será determinada por la Enfermera Jefe o EU clínica y, en último caso,
                            por el técnico paramédico, siempre  de acuerdo a la disponibilidad y diagnóstico del paciente.</blockquote>
                        17.<blockquote>Por motivos de seguridad, durante la hospitalización los pacientes no deberán portar cadenas, 
                            accesorios con puntas, cinturones, etc.</blockquote>
                        18.<blockquote>La Clínica no custodiará dinero ni joyas de los pacientes, estos serán devueltos al familiar 
                            responsable o apoderado. La Clínica no se hará responsable de la pérdida de cualquiera de éstos que 
                            porte el paciente en sus pertenencias.</blockquote>
                        19.<blockquote>La Clínica no se hará responsable en caso de pérdidas de objetos personales y/o dinero.</blockquote>
                        20.<blockquote>En caso de que el apoderado o familiar del paciente retire objetos de valor o pertenencias, 
                            deberá informar y declarar por escrito en el libro de registro de pertenencias con el nombre y firma de quien retira.</blockquote>
                        21.<blockquote>Se encontrará a disposición del paciente o del apoderado un libro de sugerencias y reclamos.</blockquote>
                        22.<blockquote>El paciente sólo podrá recibir y realizar 2 llamadas telefónicas respectivamente, de 15:00hrs a 17:00 horas, 
                            lo que será registrado por el personal de enfermería.</blockquote>
                        23.<blockquote>Las llamadas telefónicas deberán realizarse a un costado de la estación de enfermería, o acompañado por
                            personal de enfermería.</blockquote>
                        24.<blockquote>Los  aparatos  electrónicos  (celulares,  laptops,  tablets,  cámaras  fotográficas,  dispositivos  
                            para  escuchar música, etc.) no podrán ingresar a la Clínica; de ser portadas al momento del ingreso, éstas 
                            serán retenidas por el personal de enfermería y guardados; esta clase de artículos  sólo podrán ser utilizados 
                            bajo indicación médica.</blockquote>
                        
                        <div align="right">pág. 2/5</div>
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
                            <h3>CONSENTIMIENTO DE INGRESO MIRANDES CLÍNICA<br>(PACIENTE LIBRE ELECCIÓN)</h3>
                        </div>
                        <div class="col-lg-12"><hr></div>
                        25.<blockquote>Es de recomendación que el calzado a utilizar durante la hospitalización sea cómodo, bajo, sin tacos, con
                            suela antideslizante, para evitar caídas, y sin cordones.</blockquote>
                        26.<blockquote>El horario de uso del patio es de 09:00hrs a 21:00hrs  de octubre a mayo y de 09:00hrs a 18:30hrs. de junio a septiembre.</blockquote>
                        27.<blockquote>Está prohibido fumar dentro del recinto, por lo que los usuarios podrán hacerlo en el patio, en los horarios establecidos. 
                            Los familiares y acompañantes NO TIENEN PERMITIDO  fumar en ninguna de las dependencias de la Clínica.</blockquote>
                        28.<blockquote>Para acceder al patio, los pacientes del 2° y 3° piso deberán bajar acompañados por  personal de enfermería.</blockquote>
                        29.<blockquote>Los pacientes menores de 18 años, sólo podrán fumar con autorización de sus padres y con la autorización 
                            de su psiquiatra tratante, quien además definirá cantidad diaria y horarios.</blockquote>
                        30.<blockquote>Los pacientes no tendrán en su poder cigarrillos, encendedores o fósforos. El Técnico Paramédico 
                            o el Asistente de Enfermería será quien custodie, maneje y entregue cada vez que sea necesario los cigarrillos, 
                            si el paciente quiere fumar en los horarios permitidos para utilizar el patio, durante el día. Será de responsabilidad 
                            del familiar o apoderado comprarle y entregar en la clínica las cajetillas al personal de enfermería.</blockquote>
                        31.<blockquote>Los pacientes no deberán ingresar a habitaciones ajenas, ni circular por las escaleras sin supervisión del
                            personal de enfermería.</blockquote>
                        32.<blockquote>En caso de que el Médico Psiquiatra defina la necesidad de iniciar tratamiento específico con Leponex o 
                            TEC (terapia electro convulsiva), se avisará y explicará al familiar responsable o apoderado con anterioridad el procedimiento 
                            y se solicitará su autorización previo al tratamiento.</blockquote>
                        33.<blockquote>En pacientes graves y/o de riesgo, el médico tratante puede dejar indicación de cuidadora 24 horas, esta 
                            no podrá ser un familiar o amigo(a) del paciente. Sólo se permitirán cuidadoras con experiencia en salud mental.</blockquote>
                        34.<blockquote>En caso de <b>Urgencias o Emergencia Médicas No Psiquiátricas</b>, se le informará al familiar 
                            responsable o apoderado, y el paciente será trasladado en ambulancia al Servicio de Urgencia de la Clínica u Hospital que ellos hayan dejado
                            <b>explicitado por escrito al ingreso del paciente.</b></blockquote>
                        35.<blockquote>El no cumplimiento de las normativas y deberes, la agresión de cualquier tipo al personal o a otros pacientes de la Clínica,  o  
                            la ruptura o daño al mobiliario, puede ser causal de alta administrativa, situación que será evaluada caso a caso por la 
                            Dirección de MirAndes Clínica.</blockquote>   
                        36.<blockquote>Excepcionalmente,  en caso de un paciente grave o con alteración del juicio realidad, o que por su 
                            situación de salud mental, pone en riesgo su vida y la de los demás pacientes, o agrede al personal de la clínica 
                            y/o destruye mobiliario de ésta, entre otras acciones violentas, el médico tratante o el Director Médico de Mirandes 
                            podrá recurrir a la indicación de uso de medidas de contención física o farmacológica, de acuerdo a los  protocolos establecidos.</blockquote>
                        37.<blockquote>A su ingreso, si es por Libre elección, se requiere que el paciente o su acompañante pague en forma adelantada 
                            el monto equivalente a 3 días cama ($366.00-.) en efectivo , tarjeta crédito o débito, más la consulta psiquiátrica al ingreso. </blockquote>
                        38.<blockquote>MirAndes Clínica se reserva el derecho de admitir o no pacientes que al momento de  su ingreso 
                            evidencien patología médica descompensada,  daños orgánicos severos, o que tengan patologías de adicción a drogas.</blockquote>
                        39.<blockquote><u>Sobre las actividades docentes:</u> MirAndes es un centro docente - asistencial, por lo que en ocasiones podrían 
                            participar de las intervenciones estudiantes de algunas carreras del área de la salud de los centros educacionales 
                            en convenio. Siempre se informará al paciente y su acompañante con antelación de estas actividades, siendo el 
                            paciente  libre de participar en ellas o no.</blockquote>
                        <div align="right">pág. 3/5</div>
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
                            <h3>CONSENTIMIENTO DE INGRESO MIRANDES CLÍNICA<br>(PACIENTE LIBRE ELECCIÓN)</h3>
                        </div>
                        <div class="col-lg-12"><hr></div>
                        40.<blockquote>Los horarios básicos de funcionamiento de la Clínica son los siguientes,  los que se distribuyen por piso,  el
                        personal de enfermería organizará los turnos que se requieran:
                        <br><br>
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
                        <!--
                         41.<blockquote>En caso de Urgencias o Emergencias Médicas No Psiquiátricas, se le informará al familiar responsable o apoderado a la brevedad
                        posible, y el paciente por indicación médica será trasladado en ambulancia al Servicio de Urgencia de la Clínica u Hospital que ellos
                        hayan dejado explicitado por escrito al ingreso del paciente. Lo anterior, NO está cubierto por la garantía GES. En caso de emergencia
                        vital se trasladará en ambulancia de alta complejidad al servicio de urgencias más cercano, el cual debe ser pagado por el apoderado.</blockquote>
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
                        -->
                        <br>
                        <hr>
                        <br>
                        <b>Habiendo leído el presente  documento denominado “Consentimiento de Ingreso”, puedo declarar que :</b>
                        <br><br>
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
                        <br><br><br><br><br>
<div align="right">pág. 4/5</div>
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
                            <h3>CONSENTIMIENTO DE INGRESO MIRANDES CLÍNICA<br>(PACIENTE LIBRE ELECCIÓN)</h3>
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
                    
                    
                   <div align="right">pág. 5/5</div>
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