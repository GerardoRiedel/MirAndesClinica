<?php

/**
 * Created by Netbeans.
 * User: Gerardo Riedel
 * Date: 21/09/2016
 * Time: 14:00
 */
class Tec extends CI_Controller
{

    function __construct(){
        parent::__construct();
        
        //$this->load->helper('validacion');
    }

    
    public function index($rut){
        $this->load->model('pacientes_model');
        $rut    = str_replace(array(',','.','-'), '', $rut);
        $letra  = substr($rut,0,1);if ($letra === "1" || $letra === "2"){$rut = substr($rut, 0, 8);}else {$rut = substr($rut, 0, 7);}
        
        $res = $this->pacientes_model->dameUnoApi($rut);
        //echo var_dump($res).'API';
        if(empty($res)){
            $this->load->model('apoderados_model');
            $res = $this->apoderados_model->dameUno($rut);
            //echo var_dump($res).'API2222';
            }
            echo json_encode($res);
    }
    public function ficha($rut){
        $this->load->model('tecs_model');
        $res = $this->tecs_model->dameUnoPorRut($rut);
        //die(var_dump($res));
        //$hoy = date('Y-m-d');
        //F($res->tecFechaIngreso !== $hoy)$res = '';
        echo json_encode($res);
    }
    public function dameTec($pacId){
        $this->load->model('tecs_model');
        
        $tecId = $this->tecs_model->dameIdFicha($pacId);
        $res = $this->tecs_model->dameSessionesId($tecId->tecId);
        echo json_encode($res);
    }
    public function contacto($ficha){
        $this->load->model('apoderados_model');
        $res = $this->apoderados_model->dameUnoContactoTEC($ficha);
        echo json_encode($res);
    }
    public function apoderado($ficha){
        
        $this->load->model('apoderados_model');
        $res = $this->apoderados_model->dameUnoPorFichaParaFichaTEC($ficha);
        echo json_encode($res);
    }
    public function guardar($array){
        $this->load->model('tecs_model');
        $array = str_replace('%C3%B1','Ñ', $array);
        $array = str_replace('%20',' ', $array);
        $array = str_replace('~','@', $array);
        $array = explode('_', $array);
        
        $this->load->model('pacientes_model');
        $this->load->model('apoderados_model');
        $this->load->model("comunas_model");
        $this->load->model("licencias_model");
        
        $rut        = str_replace(array(".","-"), "", $array[0]);
        $letra      = substr($rut,0,1);if ($letra === "1" || $letra === "2"){$rut = substr($rut, 0, 8);}else {$rut = substr($rut, 0, 7);}
        $ficha      = $array[1];
        $piso       = $array[2];
        $nombre     = $array[3];
        $apePat     = $array[4];
        $apeMat     = $array[5];
        $fechaN     = $array[6];
            IF(!empty($fechaN)){
                $date       = str_replace("/", "-", $fechaN);
                $date       = new DateTime($date);
                $fechaN     = $date->format('Y-m-d');
            }
        $direccion  = $array[7];
        $comuna     = $array[8];
            IF($comuna != '0'){
                $region = $this->comunas_model->dameUno($comuna);
                $region = $region->padre;
            }
            ELSE $region = '';
        $telFijo    = $array[9];
        $telCelu    = $array[10];
        $ocupacion  = $array[11];
        $email      = $array[12];
        
        $paciente   = $this->pacientes_model->dameUno($rut);
        if(!empty($paciente->id)){$this->pacientes_model->id = $paciente->id;}
        
        $emergencias    = $array[13];
        $alergias       = $array[14];
        $medico         = $array[15];
        $regimen        = $array[16];
        $diagnostico    = $array[17];
        $comentario     = $array[18];
        $isapre         = $array[19];
        $rutTitular     = $array[20];
        IF(!empty($rutTitular)){
            $rutTitular = str_replace(array(".","-"), "", $rutTitular);
            $letra      = substr($rutTitular,0,1);if ($letra === '1' || $letra === '2'){$rutTitular = substr($rutTitular, 0, 8);}else {$rutTitular = substr($rutTitular, 0, 7);}
        }
        ELSE $rutTitular = '0';
        
                if(!empty($alergia)){
                    $this->pacientes_model->alergia         = $alergia;
                }
                    $this->pacientes_model->nombres         = $nombre;
                    $this->pacientes_model->apellidoPaterno = $apePat;
                    $this->pacientes_model->apellidoMaterno = $apeMat;
                    $this->pacientes_model->fechaNacimiento = $fechaN;
                    //$this->pacientes_model->nacionalidad    = $this->input->post('nac');
                    $this->pacientes_model->telefono        = $telFijo;
                    $this->pacientes_model->celular         = $telCelu;
                    $this->pacientes_model->email           = $email;
                    //$this->pacientes_model->sexo            = $this->input->post('sexo');
                    $this->pacientes_model->direccion       = $direccion;
                    $this->pacientes_model->ocupacion       = $ocupacion;
                    $this->pacientes_model->comuna          = $comuna;
                    $this->pacientes_model->region          = $region;
                    $this->pacientes_model->rut             = $rut;
                    $this->pacientes_model->guardar($rut);
                    unset($this->pacientes_model->id,$this->pacientes_model->rut,$this->pacientes_model->ocupacion,$this->pacientes_model->direccion,$this->pacientes_model->sexo,$this->pacientes_model->email,$this->pacientes_model->nombres,$this->pacientes_model->apellidoPaterno,$this->pacientes_model->apellidoMaterno,$this->pacientes_model->fechaNacimiento,$this->pacientes_model->telefono,$this->pacientes_model->celular);
        
                    $paciente   = $this->pacientes_model->dameUno($rut);
                    
                    IF(empty($ficha) || $ficha === '0' || $ficha === 'Sin ficha, se creará al ingreso'){
                    $ficha = $this->tecs_model->dameTecFicha($paciente->id);
                    }

                    $idFichaHoy = $this->tecs_model->dameIdFichaHoy($paciente->id);
                    IF(!empty($idFichaHoy))$this->tecs_model->tecId = $idFichaHoy->tecId;

                    ////CREA FICHA
                        $this->tecs_model->tecFechaRegistro  = date('Y-m-d H:i:s');
                        $this->tecs_model->tecFechaIngreso      = date('Y-m-d');
                        $this->tecs_model->tecComentario        = $comentario;
                        $this->tecs_model->tecDiagnostico       = $diagnostico;
                        IF($medico === '0')$medico = '';
                        $this->tecs_model->tecMedicoAsignado    = $medico;
                        //$this->tecs_model->ges               = $ges;
                        $this->tecs_model->tecPaciente          = $paciente->id;
                        $this->tecs_model->tecIsapre            = $isapre;
                        $this->tecs_model->tecFicha             = $ficha;
                        $this->tecs_model->tecComuna            = $comuna;
                        $this->tecs_model->tecUsuario           = $this->session->userdata('id_usuario');
                        $this->tecs_model->tecRutTitular        = $rutTitular;
                        $this->tecs_model->tecEmergenciaDerivar = $emergencias;
                        $this->tecs_model->guardar();


                    $idFicha = $this->tecs_model->dameIdFicha($paciente->id);
                    
            
            ////GUARDAR CONTACTO  
            $nombreContacto     = $array[21];
            $telUnoContacto     = $array[22];
            $telDosContacto     = $array[23];
            $parentescoOtroContacto = $array[24];
                        
                        IF(!empty($nombreContacto))
                        {$this->apoderados_model->apoNombre      = $nombreContacto;}
                        IF(!empty($telUnoContacto))
                        {$this->apoderados_model->apoTelefono    = $telUnoContacto;}
                        IF(!empty($telDosContacto))
                        {$this->apoderados_model->apoCelular     = $telDosContacto;}
                        IF(!empty($parentescoOtroContacto))
                        {$this->apoderados_model->apoParentesco  = $parentescoOtroContacto;}
                        
                        IF(!empty($nombreContacto) && (!empty($telUnoContacto) || !empty($telDosContacto)))
                        {
                            $apoderado = $this->apoderados_model->dameUnoContacto($idFicha->tecId);
                            IF(!empty($apoderado))$this->apoderados_model->apoId = $apoderado->apoId;
                            $this->apoderados_model->apoTipo            = 13;
                            $this->apoderados_model->apoFechaRegistro   = date('Y-m-d H:i:s');
                            $this->apoderados_model->apoFichaElectronica = $idFicha->tecId;
                            $this->apoderados_model->guardar();
                            
                        }
                        unset($this->apoderados_model->apoFechaRegistro,$this->apoderados_model->id,$this->apoderados_model->rut,$this->apoderados_model->ocupacion,$this->apoderados_model->direccion,$this->apoderados_model->sexo,$this->apoderados_model->email,$this->apoderados_model->nombres,$this->apoderados_model->apellidoPaterno,$this->apoderados_model->apellidoMaterno,$this->apoderados_model->fechaNacimiento,$this->apoderados_model->telefono,$this->apoderados_model->celular);

                        
                 echo var_dump($array); 
                 echo json_encode('OK');
    }
    
    public function dameTodoContenido($id)
    {
        $this->load->model('tecs_model');
        $data = $this->tecs_model->dameSessionesIdParaMostrar($id);
        echo json_encode($data);
    }
    
    //public function dameTodoContenido()
    //{
    //    //$carrito = $this->carrito_model->dameUltimo($this->session->userdata('id_usuario'));
//
    //    if(!empty($carrito->carId)){
//
    //            $datos = $this->carrito_model->dameTodoContenidoCarro($carrito->carId);
    //            $head = '<table><thead><tr><th>Producto&nbsp;</th><th>Cantidad&nbsp;</th><th>Total&nbsp;</th><th>Eliminar</th></tr></thead>'
    //                    . '<tbody>';
    //            $nav  = '</tbody></table>';
    //            $filas = '';
    //            $suma  = '';
    //            foreach ($datos as $dat):
    //                $fila = '<tr><td>'.$dat->proNombre.'</td><td>'.$dat->cantidad.'</td><td>'.$dat->suma.'</td><td>&nbsp;<i class="fa fa-trash-o" aria-hidden="true" onclick="elimin('.$dat->proId.')"></i></td></tr>';
    //                $filas = $filas.$fila;
    //                $suma = $suma+ $dat->suma;
    //            endforeach;
    //            $fin1 = '<tr style="heigth:50px"><td></td><td></td><td></td><td></td></tr>';
    //            $fin2 = '<tr><td></td><td></td><td><b>TOTAL</b></td><td style="min-width:60px"><b>$ '.$suma.'</b></td></tr>';
    //            $btn  = '<tr><td coldspan="4"><a href="../intranet/btnpago"><input type="submit" value="Pagar" class="btn btn-primary btn-sm"></a></td></tr>';
    //            $data = $head.$filas.$fin1.$fin2.$nav.$btn;
    //            //die(var_dump($data));
    //            header('Content-Type: application/json');
    //            echo json_encode($data);
    //    }
    //    ELSE {
    //        $head = '<table><thead><tr><th>Producto</th><th>Cantidad</th><th>Total</th><th>Eliminar</th></tr></thead>'
    //                    . '</table>';
    //            $data = $head;
    //            //die(var_dump($data));
    //            //header('Content-Type: application/json');
    //            echo json_encode($data);
    //    }
    //}
}