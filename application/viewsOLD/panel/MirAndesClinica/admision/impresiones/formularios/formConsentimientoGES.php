
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

<div style="page-break-after: always;">
                <div class="col-lg-10" align="right" style=" margin-right: 40px">
                    <img src="<?php echo base_url();?>../assets/img/mirAndes.png" class="logo">
                </div>
                    <br>
            <blockquote>
                <div class="col-lg-12" align="center">
                    <h3>CONSENTIMIENTO DE INGRESO MIRANDES CLÍNICA</h3>
                </div>
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
                    1.<blockquote>Es importante que usted sepa que, si su ingreso fue gestionado desde su Seguro de Salud con diagnóstico 
                    GES, esto garantiza el día cama y la atención del médico psiquiatra  3 veces a la semana. El médico psiquiatra 
                    podrá evaluar al paciente dentro de las 24 horas desde el ingreso en horario hábil.  Todo procedimiento NO 
                    garantizado  en  la  Canasta  GES  (por  ejemplo:  interconsultas  médicas  no  psiquiátricas,  exámenes  de 
                    laboratorio  o de imágenes con fines de diagnóstico médico no psiquiátrico, Urgencia médica no psiquiátrica, 
                    etc.) serán informados con anticipación al apoderado para su realización, no tendrán cobertura GES y deberá 
                    ser  pagados  por  el  paciente,  sea  a  través  de  su  seguro  de  salud  o  en  forma  directa.  Se  hará  entrega  al 
                    paciente o su apoderado una copia de la canasta de prestaciones y medicamentos para su conocimiento, de 
                    lo  cual  deberá  firmar  recibo  . Todo  lo  que  no  está  en  la  canasta  no  es  GES  (no está  garantizado).  Si  tiene 
                    dudas, por favor pregunte.</blockquote>
                    2.<blockquote>Es  necesario  y  obligatorio  dejar  establecido  al  ingreso  del  paciente  la  individualización  de  un   Familiar 
                    Responsable  y/o  persona  que  deberá  actuar  como  su  apoderado  o  representante  legal  (si  corresponde) 
                    durante  toda  la  estadía  hospitalaria.  Las  visitas   y   las  llamadas   telefónicas  serán  autorizadas  sólo  previa 
                    indicación  médica,  la  que  deberá  constar  por  escrito  en  la  ficha  clínica  del  paciente;  si  fuese  necesario, 
                    también por indicación médica podrían suspenderse o restringirse las visitas y horarios de éstas, todo ello 
                    por fines terapéuticos.
                    </blockquote>
                    3.<blockquote>Las visitas se realizarán de la siguiente forma, pudiendo ingresar máximo 2 personas por paciente:
                        <br>
                           <b>Primer y Tercer Piso:</b> martes, jueves y Sábado de 15 a 17 hrs.
                        <br>
                           <b>Segundo Piso:</b> miércoles, viernes y domingos de 15 a 17 hrs.
                        <br>
                    <b>Fuera  del  horario  antes  normado,</b>  sólo  podrán  ingresar  visitas  que  hayan  sido  indicadas  por  el  médico 
                    tratante, el paciente también podrá decidir si recibe o no a determinadas visitas.
                    </blockquote>
                    <br>
                    4.<blockquote>En  el  momento  del  ingreso  del  paciente,  serán  revisadas  todas  sus  pertenencias  y  serán  entregadas  a  su 
                    familiar  responsable  o  acompañante.  En  caso  de  ingresar  sólo  sin  apoderado  o  acompañante,  serán 
                    requisadas,  guardadas  e  inventariadas  aquéllas  que  puedan  ser  elementos  de  riesgo  de  auto  o 
                    heteroagresión  (ver  cartilla),  como  por  ejemplo,  objetos  cortantes  o  punzantes,  fármacos,  cinturones  y 
                    cordones.  Asimismo, también los artículos de higiene personal que representen riesgo serán guardados por 
                    el personal y el paciente tendrá autorización para su uso con indicación médica y bajo supervisión (ejemplo: 
                    pinzas, cosméticos, etc.). No está permitido el uso de depiladoras o elementos con filo (Se permite ingresar 
                    Cera o crema depilatoria para uso en frío)
                    Todas las pertenencias serán devueltas al momento del alta.
                    </blockquote>
                    5.<blockquote>A  toda  persona  que  ingrese  en  horario  de  visitas,  se  le  requisarán  pertenencias  que  puedan  ser 
                    potencialmente riesgosas para el paciente o terceros, y serán devueltas al término de la visita.
                    </blockquote>
                    6.<blockquote>Las visitas no deben ingresar o entregar ningún tipo de alimento a los pacientes.
                    </blockquote>
                    7.<blockquote>La  recepción  de  visitas  deberá  realizarse  en  espacios  comunes,  está  estrictamente  prohibido  recibirlas  en 
                    otros espacios ej: piezas de los pacientes
                    </blockquote>
                    8.<blockquote>Está  prohibido  el  ingreso  de  alcohol,  drogas,  armas,  objetos  cortopunzantes  u  objetos  que  puedan  hacer 
                    fuego a la clínica.
                    </blockquote>
                    9.<blockquote>Está  prohibida  la  entrega directa  de  medicamentos al  paciente,  sólo  deberán entregarse  al  personal  de la 
                    Clínica. 
                    </blockquote>
                    10.<blockquote>No  se   podrá  entregar  a  los  pacientes  artículos  electrónicos  <b>ni  facilitarles  el  uso  de  celulares   durante  el 
                    horario de visitas.</b>
                    </blockquote>
                    11.<blockquote>Está  prohibido  el  ingreso  de  visitas  menores  de  14  años  de  edad  a  la  Clínica,  a  menos  que  en  casos 
                    excepcionales sea autorizado por el médico psiquiatra tratante.
                    </blockquote>
                    12.<blockquote>El comportamiento de las visitas y pacientes debe ser acorde al lugar y respetuoso en el trato con el resto de 
                    los pacientes, por ejemplo: evitar conductas sexualizadas entre pacientes. No está permitido que pacientes 
                    ingresen a habitaciones de otros pacientes.  No se podrá hacer grabar ni tomar fotografías con los pacientes.
                    </blockquote>
                    13.<blockquote>En  forma  aleatoria  y  sin  aviso  previo,  el  personal  de  enfermería  realizará  revisiones  de  los  dormitorios, 
                    closets y veladores por motivos de seguridad, para evitar que porten objetos que puedan ser utilizados para 
                    agredirse  o  agredir  a  otro.  Se  registrará  todo  hallazgo  en  la  ficha  clínica  del  paciente  y  en  el  libro  de 
                    pertenencias.
                    </blockquote>
                    14.<blockquote>Será  responsabilidad  del  apoderado,  familiar  responsable  o  representante  legal  del  paciente,  proveer  los 
                    fármacos indicados por el médico tratante  y entregarlos al personal de enfermería de la Clínica al ingreso y 
                    durante la hospitalización, evitando que se produzca la falta de ellos.  Al finalizar la hospitalización serán 
                    devueltos  lo  medicamentos  sobrantes,  todo  ello  con  excepción  de  los  fármacos  inyectables,  que  serán 
                    proveídos por la Clínica y agregados a la cuenta final. 
                    </blockquote>
                    15.<blockquote>Está prohibido que el paciente firme cualquier tipo de documentación durante la hospitalización, a menos 
                    que el médico psiquiatra tratante lo autorice y se haga frente a un testigo imparcial. 
                    </blockquote>
                    16.<blockquote>La asignación de camas y dormitorios será determinada por la Enfermera Jefe o EU clínica y, en último caso, 
                    por el técnico paramédico, siempre de acuerdo a la disponibilidad y diagnóstico del paciente.
                    </blockquote>
                    17.<blockquote>Por  motivos  de  seguridad,  durante  la  hospitalización  los  pacientes  no  deberán  portar  cadenas,  accesorios 
                    con puntas, cinturones, etc. 
                    </blockquote>
                    18.<blockquote>La Clínica no custodiará dinero, objetos valiosos (Ej. Lentes o chaquetas de marca)  ni joyas de los pacientes, 
                    estos serán devueltos al familiar responsable o apoderado. La Clínica no se hará responsable de la pérdida de 
                    cualquiera de éstos que porte el paciente en sus pertenencias.  Si para el paciente es importante su ingreso, 
                    se le pedirá que firme un documento donde se hace responsable personalmente del ingreso y cuidado de 
                    ese objeto.
                    </blockquote>
                    19.<blockquote>La Clínica no se hará responsable en caso de pérdidas de objetos personales y/o dinero. 
                    </blockquote>
                    20.<blockquote>En caso de que el apoderado o familiar del paciente retire objetos de valor o pertenencias, deberá informar y 
                    declarar  por escrito en el libro de registro de pertenencias con el nombre y firma de quien retira.  Todas las 
                    pertenencias y medicamentos que ingresan o salen de la clínica deben ser inventariados, de modo de tener 
                    un registro para la seguridad del paciente y de la clínica. 
                    </blockquote>
                    21.<blockquote>Se  encontrará  a  disposición  del  paciente  y/o  del  apoderado  un  libro  de  sugerencias,  felicitaciones    y 
                    reclamos. Sus comentarios nos ayudan a mejorar nuestra calidad de atención y servicio.
                    </blockquote>
                    22.<blockquote>El paciente sólo podrá recibir y realizar 2 llamadas telefónicas respectivamente, de  17:00hrs.  a  19:00hrs,  lo 
                    que será registrado por el personal de enfermería. 
                    </blockquote>
                    23.<blockquote>Las llamadas telefónicas deberán  realizarse a un costado de la estación de enfermería, o acompañado por 
                    personal de enfermería.
                    </blockquote>
                    24.<blockquote>Los  aparatos  electrónicos  (celulares,  laptops,  tablets,  cámaras  fotográficas,  dispositivos  para  escuchar 
                    música, etc.) no podrán ingresar a la Clínica; de ser  portadas al momento del ingreso, éstas serán retenidas 
                    por el personal de enfermería y guardados; esta clase de artículos sólo podrán ser utilizados bajo indicación 
                    médica. 
                    </blockquote>
                    25.<blockquote>Es  de  recomendación  que  el  calzado  a  utilizar  durante  la  hospitalización  sea  cómodo,  bajo,  sin  tacos,  con 
                    suela antideslizante, para evitar caídas, y sin cordones.
                    </blockquote>
                    26.<blockquote>El horario de uso del patio es de 09:00hrs a 21:00hrs 
                    </blockquote>
                    27.<blockquote>Está prohibido fumar dentro del recinto, por lo que los pacientes podrán hacerlo en el patio, en los horarios 
                    establecidos. Los familiares y acompañantes  NO TIENEN PERMITIDO  fumar en ninguna de las dependencias 
                    de la Clínica. 
                    </blockquote>
                    28.<blockquote>Para acceder al patio, los pacientes del 2° y 3° piso deberán bajar acompañados por personal de enfermería.
                    </blockquote>
                    29.<blockquote>Los pacientes menores de 18 años, sólo podrán fumar con autorización de sus padres y con la autorización 
                    de su psiquiatra tratante, quien además definirá cantidad diaria y horarios.
                    </blockquote>
                    30.<blockquote>Los  pacientes  no  tendrán  en  su  poder  cigarrillos,  encendedores  o  fósforos.  El  Técnico  Paramédico  o  el 
                    Asistente de Enfermería será quien custodie, maneje y entregue cada vez que sea necesario los cigarrillos, si 
                    el  paciente  quiere  fumar  en  los  horarios  permitidos  para  utilizar  el  patio,  durante  el  día.  Será  de 
                    responsabilidad  del  familiar  o  apoderado  comprarle  y  entregar  en  la  clínica  las  cajetillas  al  personal  de 
                    enfermería. 
                    </blockquote>
                    31.<blockquote>Los  pacientes  no  deberán  ingresar  a  habitaciones  ajenas,  ni  circular  por  las  escaleras  sin  supervisión  del 
                    personal de enfermería.
                    </blockquote>
                    32.<blockquote>En caso de que el Médico Psiquiatra defina la necesidad de iniciar tratamiento específico con Leponex o TEC 
                    (terapia electro  convulsiva),  se  avisará y explicará  al familiar  responsable o  apoderado  con  anterioridad el 
                    procedimiento  y  se  solicitará  su  autorización  previo  al  tratamiento.  No  se  realizará  tratamiento  sin  un 
                    consentimiento firmado por el paciente y apoderado o familiar responsable.
                    </blockquote>
                    33.<blockquote>En pacientes graves y/o de riesgo, el médico tratante puede dejar indicación de cuidadora 24 horas o durante 
                    el día (12 horas), esta no podrá ser un familiar o amigo(a) del paciente. Sólo se permitirán cuidadoras con 
                    experiencia en salud mental. Lo anterior NO está cubierto por la garantía GES  por lo que se debe cancelar en 
                    forma particular. El no cumplimiento de esta indicación médica puede ser motivo de alta administrativa.
                    </blockquote>
                    34.<blockquote>En  caso  de  <b>Urgencias  o  Emergencia  Médicas  No  Psiquiátricas,</b>  se  le  informará  al  familiar  responsable  o 
                    apoderado  a  la  brevedad  posible,  y  el  paciente  por  indicación  médica  será  trasladado  en  ambulancia  al 
                    Servicio  de  Urgencia  de  la  Clínica  u  Hospital  que  ellos  hayan  dejado  explicitado  por  escrito  al  ingreso  del 
                    paciente. Lo anterior NO está cubierto por la garantía GES.  En caso de emergencia vital será trasladará en 
                    ambulancia  de  alta  complejidad  al  Servicio  de  urgencias  más  cercano:  Clínica  Avansalud.  El  servicio  de 
                    ambulancia  tiene  un  costo  aproximado  de  45.000  a  150.000,  dependiendo  del  tipo  de  ambulancia  (baja, 
                    mediana y alta complejidad), lo cual debe ser cancelado directamente a la empresa de ambulancia.
                    </blockquote>
                    35.<blockquote>Siempre que un paciente sea derivado a un servicio de urgencia debe ir un familiar responsable a la clínica a 
                    la  cual  se  está  derivando.  Si  la  familia  del  paciente  es  de  regiones,  debe  buscar  dentro  de  sus  amigos  o 
                    familiares que estén en Santiago, quien podría hacerse responsable en caso de una posible derivación. Esto 
                    debido a que las clínicas tienen trámites administrativos ej firma de pagarés, que no puede hacer el personal 
                    de enfermería de MirAndes, ni el personal de la ambulancia.
                    </blockquote>
                    36.<blockquote>El no cumplimiento de las normativas y deberes, la agresión de cualquier tipo al personal o a otros pacientes 
                    de la Clínica, o la ruptura o daño al mobiliario, puede ser causal de alta administrativa, situación que será 
                    evaluada caso a caso por la Dirección de MirAndes Clínica.
                    </blockquote>
                    37.<blockquote>Excepcionalmente, en caso de un paciente grave o con alteración del juicio realidad, o que por su situación 
                    de salud mental, pone en riesgo su vida y la de los demás pacientes, o agrede al personal de la clínica y/o 
                    destruye  mobiliario  de  ésta,  entre  otras  acciones  violentas,  el  médico  tratante  o  el  Director  Médico  de 
                    Mirandes podrá recurrir a la indicación de uso de medidas de contención física o farmacológica, de acuerdo a 
                    los   protocolos  establecidos.  En  caso,  que  el  personal  de  enfermería  no  logre  contener  físicamente  al 
                    paciente por el alto grado de agresividad del paciente (casos que ocurren muy infrecuentemente) se llamará 
                    a un equipo de contención externa, esto no está cubierto por el GES y tiene que ser cancelado por el familiar 
                    responsable (precio referencial de aproximadamente  $ 80.000; dependiendo la empresa a contactar).
                    </blockquote>
                    38.<blockquote>A su ingreso,  se requiere que el paciente o su acompañante deje en depósito  por insumos  de $40.000 en 
                    efectivo, o un cheque por la misma cantidad sin fecha. Dicha suma permitiría cubrir gastos de copago  de su 
                    seguro de salud  e insumos que no están considerados en la canasta GES.  En el caso libre elección, este 
                    depósito es para para cubrir gastos por insumos (que no están incluidos en el día cama).  De no ser utilizado 
                    el depósito o lo que reste de él, un funcionario de la Clínica se contactará con la persona que lo entregó para 
                    coordinar la devolución del dinero, una vez que haya concluido la gestión administrativa que corresponda a 
                    esta hospitalización.  El plazo del trámite  en nuestra clínica  es de  <b>al menos  90 días posteriores el alta  (en 
                    caso  de  GES,  ya  que,  el  copago  depende  de  su  Seguro  de  salud  o  Isapre).  En  caso  de  pacientes  libre 
                    elección, el trámite se realizará en al menos 30 días.</b>
                    </blockquote>
                    39.<blockquote>MirAndes Clínica se reserva el derecho de admitir o no pacientes que al momento de su ingreso evidencien 
                    patología médica descompensada, daños orgánicos severos, o que tengan patologías de adicción a drogas.
                    </blockquote>
                    40.<blockquote><u>Sobre las actividades docentes:</u> MirAndes es un centro docente - asistencial, por lo que en ocasiones podrían 
                    participar  de  las  intervenciones  estudiantes  de  algunas  carreras  del  área  de  la  salud  de  los  centros 
                    educacionales  en  convenio.  Siempre  se  informará  al  paciente  y  su  acompañante  con  antelación  de  estas 
                    actividades, siendo el paciente libre de participar en ellas o no.
                    </blockquote>
                    41.<blockquote>El servicio de alimentación es externo, el paciente recibe las 4 comidas básicas (Desayuno, almuerzo, Onces 
                    y cena). Alimentación tipo colación  fuera del horario (galletas, fruta, jugo, té, etc.) tienen un cobro  adicional 
                    que  será  descontado  del  dinero  dejado  para  dicho  fin;  es  decir  de  los  $5.000  que  dejó  al  momento  del 
                    ingreso. Permitiéndose no más de 2 colaciones al día. Para la entrega de colaciones a menores de edad, debe 
                    previamente ser autorizado por el apoderado o familiar responsable. En caso de tener una patología médica 
                    que  requiera  colaciones  como  parte  de  su  dieta,  el  costo  de  estas  colaciones  puede  ser  asumido  por  la 
                    clínica, solo si, trae indicaciones de una nutricionista al respecto. No está permitido el ingreso de alimentos a 
                    la clínica, existen algunas excepciones médicas lo que debe ser indicado por el médico tratante y autorizado 
                    por la Enfermera Jefe.
                    </blockquote>
                    42.<blockquote>Los horarios básicos de funcionamiento de la Clínica son los siguientes, los que se distribuyen por piso, el 
                    personal de enfermería organizará los turnos que se requieran:
                    </blockquote>
                        <blockquote><blockquote>
                                <b><u>a) Todos los pisos:</u></b><br>
                                Hora de Levantarse: 07:30hrs – 09:00hrs    Hora de Acostarse: 21:30hrs - 23:00hrs <br>
                                <b><u>b) 1er piso:</u></b><br>
                                Desayuno: 08:00hrs -9:00hrs    Almuerzo: 12:30hrs – 13:30 hrs <br>
                                Once: 17:00hrs – 17:30 hrs    Cena: 19:00hrs – 20:00hrs<br>
                                <b><u>c) 2do piso:</u></b><br>
                                Desayuno: 08:00hrs – 09:00hrs    Almuerzo: 12:30hrs – 13:30hrs <br>
                                Once: 17:00hrs – 17:30hrs     Cena: 19:00hrs – 20:00hrs<br>
                                <b><u>d) 3er piso:</u></b><br>
                                Desayuno: 08:30hrs – 09:30hrs    Almuerzo: 13:30hrs – 14:30hrs <br>
                                Once: 17:30hrs - 18:00hra    Cena: 19:30hrs - 20:30hrs<br>
                        </blockquote></blockquote>
                    43.<blockquote>Clínica  Mirandes  no  cuenta  con  psiquiatras  de  urgencia,  ni  médico residente.  Cualquier  situación clínica  o 
                    médica  que  lo  requiera  será  derivada  a  un  servicio de  urgencia.  Los psiquiatras  tratantes  pueden  solicitar 
                    evaluación por un médico de otra especialidad: ej: neurólogo, diabetólogo, cardiólogo, etc. Estos  controles 
                    los puede realizar fuera de la clínica, con autorización del médico tratante. Lo anterior NO está cubierto por 
                    el  GES  y  deben  ser  cancelados  según  su  plan  de  salud  a  quien  corresponda.   Siempre  se  le  informará  al 
                    familiar, antes de solicitarlo, a menos que sea una emergencia médica vital.
                    </blockquote>
                    44.<blockquote>Clínica Mirandes como clínica psiquiátrica no cuenta con la implementación para manejar patologías médicas 
                    no psiquiátricas descompensadas. Los pacientes que ingresan a Mirandes deben estar estabilizados de  sus 
                    patologías  médicas  de  base  (no  psiquiátricas).  Lo  anterior  puede  ser  motivo  de  rechazo  de  ingreso  o 
                    derivación.  El  personal  de  enfermería  está  capacitado  para  manejar   RCP  (Reanimación  cardiopulmonar) 
                    básica,  no  de  alta  complejidad  y  para  manejar  descompensaciones  leves  de  cuadros  médicos  ej:  crisis 
                    hipertensivas,  manejo  inicial  de  IAM  (Infarto  Agudo  al  Miocardio),  manejo  inicial  de  caídas, 
                    descompensaciones leves de Diabetes Mellitus.
                    </blockquote><br>
                    
                    <div class="col-lg-12"><hr></div>
                    
                    <h4>Habiendo leído el presente documento denominado “Consentimiento de Ingreso”, puedo declarar que:</h4>
                    <br>
                    <blockquote>
                    1.  He sido informado respecto a cuáles son los procedimientos diagnósticos, y terapéuticos para tratar mi 
                    enfermedad. 
                    <br><br>
                    2.  He sido informado respecto de que la opción de hospitalizar es necesaria y adecuada a mi condición de 
                    salud.
                    <br><br>
                    3.  He  sido  informado  que,  a  pesar  de  toda  la  información  entregada  por  el  equipo  médico  tratante  y  los 
                    riesgos que el alta exigida implica, podré exigir el alta, abandonando la hospitalización, en cuyo caso deberé 
                    firmar documento llamado “Alta Exigida”. 
                    <br><br>
                    4.  He  sido  informado  que  esta  es  una  Institución  Asistencial  –  Docente,  por  lo  cual   sé  que  en  ella  se 
                    desempeñan  alumnos  de  distintas  carreras  de  la  Salud,  como  asimismo,  médicos  en  proceso  de
                    especialización,  por  lo  que  podría  ser  atendido  por  profesionales  en  formación,  junto  a  sus  docentes 
                    responsables. 
                    <br><br>
                    5.  También se me ha explicado que la Clínica tiene normas de trabajo interno, que deberé respetar en todo 
                    momento.
                    <br><br>
                    6.  Dejo constancia que se me  entrega por escrito información general de la Unidad de Hospitalización de 
                    MirAndes y sobre la Ley de Derechos y Deberes del Paciente. 
                    <br><br>
                    7.  Se me ha informado suficientemente de la necesidad de estas intervenciones y de sus alternativas.
                    <br><br>
                    8.    Se me ha aclarado las dudas que me han surgido al escuchar y leer la información específica recibida. 
                    También sé que puedo negarme al procedimiento y que siempre puedo retractarme de la decisión que ahora 
                    tome.
                    <br><br>
                    <b>Por lo todo lo anterior, libremente DOY MI CONSENTIMIENTO y acepto la hospitalización y Tratamiento psiquiátrico en Clínica MirAndes.</b>
                    <br><br><br>
                    NOMBRE DEL PACIENTE: <b><?php echo strtoupper($datos->nombres).' '.strtoupper($datos->apellidoPaterno).' '.strtoupper($datos->apellidoMaterno);?></b>
                    <br><br>
                    C.I. N° <b><?php echo formatearRut($datos->rut);?></b> &nbsp;&nbsp;&nbsp;&nbsp;FIRMA.............................
                    <br><br>
                    NOMBRE DEL APODERADO DEL PACIENTE: <b><?php IF(!empty($apoNombre))echo strtoupper($apoNombre).' '.strtoupper($apoApePat).' '.strtoupper($apoApeMat);ELSE echo '...............................' ?></b>
                    <br><br>
                    C.I. N° <b><?php IF(!empty($apoRut))echo formatearRut($apoRut);ELSE echo '.............'?></b> &nbsp;&nbsp;&nbsp;&nbsp;FIRMA.............................
                    <br><br><br>
                    Yo, ............................................................................ Rut: ..........................................., he sido testigo que se ha entregado y leído el consentimiento por el familiar y el paciente. Certifico que las personas que aquí firman son las que dicen ser, lo que he verificado con sus respectivas cédulas de identidad.
                    
                    </blockquote>
                    <br><br>
                    <h4><u>Consentimiento por Representante:</u></h4>
                    <br><br>
                    Yo, <label><?php IF(!empty($apoNombre))echo strtoupper($apoNombre).' '.strtoupper($apoApePat).' '.strtoupper($apoApeMat);ELSE echo '.................' ?></label>, R.U.T: <label><?php IF(!empty($apoRut))echo formatearRut($apoRut);ELSE echo '.........................' ?></label>, domiciliado en <label><?php echo strtoupper($apoDireccion) ;?></label>, fono: <label><?php echo $apoTelefono.'   '.$apoCelular ;?></label>. En calidad de representante de don(ña) <label><?php echo strtoupper($datos->nombres).' '.strtoupper($datos->apellidoPaterno).' '.strtoupper($datos->apellidoMaterno);?></label> Rut <?php echo formatearRut($datos->rut);?>, quien no puede actuar por sí mismo por:
                    <br>
                    <input class="cuadrado">&nbsp;Ser menor de edad.
                    <br>
                    <input class="cuadrado">&nbsp;Estar incapacitado legalmente, (no está en condiciones de decidir adecuadamente sobre su estado de salud)
                    <br>
                    Procedo a realizar los trámites de ingreso a Clínica MirAndes del paciente antes individualizado y, en tal 
                    calidad, suscribo elpresente documento y declaro que he recibido la información en él consignada y que 
                    acepto su Ingreso a dicha Clínica para recibir asistencia médica psiquiátrica
                    <br><br><br>
                    Firma del representante legal: ...............................................................
                    <br><br><br><br><br><br>
                    <b>Médico o Profesional que informa:</b> <?php IF(!empty($datos->nombresmedicoAsignado))echo strtoupper($datos->nombresmedicoAsignado).' '.strtoupper($datos->apellidomedicoAsignado);ELSE echo '.............................................................................'; ?>
                    <br>  
                    <div class="col-lg-10" align="left">
                        <?php 
                            $dia = date('d');$mes = date('m');$ano = date('Y');
                            if($mes==='10')$mes='Octubre';elseif($mes==='11')$mes='Noviembre';elseif($mes==='12')$mes='Diciembre';elseif($mes==='01')$mes='Enero';elseif($mes==='02')$mes='Febrero';elseif($mes==='03')$mes='Marzo';elseif($mes==='04')$mes='Abril';elseif($mes==='05')$mes='Mayo';elseif($mes==='06')$mes='Junio';elseif($mes==='07')$mes='Julio';elseif($mes==='08')$mes='Agosto';elseif($mes==='09')$mes='Septiembre';
                            echo '<br>Providencia, '.$dia.' de '.$mes.' de '.$ano.'<br>';
                        ?>
                    </div>
                </div>
            </blockquote>
            </div>