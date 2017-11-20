<?php

/**
 * Created by Netbeans.
 * User: Gerardo Riedel
 * Date: 17/11/2016
 * Time: 14:00
 */
class Devolucion extends CI_Controller
{

    function __construct(){
        parent::__construct();
        
        //$this->load->helper('validacion');
    }

    
    public function guardar($id){
        $this->load->model('bancos_model');
        $this->bancos_model->renUsuario = $this->session->userdata('id_usuario');
        $this->bancos_model->renFecha = date('Y-m-d H:i:s');
        $this->bancos_model->renId = $id;
        $this->bancos_model->renEnviada = 2;
        $this->bancos_model->guardarRendicion();
        
        $depositos = $this->bancos_model->dameDatosRenId($id);
        $monto = $renId = 0;
        foreach ($depositos as $dep){$monto += $dep->depSuma;$renId = $dep->depRendicion;}
        
        $mensaje = 'Buenos dias,
Para su conocimiento, se ha guardado una nueva rendicion por un monto total de $ '.$monto.' pesos.
Para revisar la rendicion generada por favor siga el siguiente link www.cetep.cl/mirandes/index.php/clinica_admision/impresiones/imprimirRendicion/'.$renId.'.


Este correo se ha generado automaticamente. Por favor no lo conteste.

Atentamente
Rendiciones Cetep';
        
        $headers = "From: rendiciones@cetep.cl";
        mail("griedel@cetep.cl","Rendicion",$mensaje,$headers);
        
        $this->load->model('listaDeposito_model');
        $this->listaDeposito_model->lisDepUsuario  = $this->session->userdata('id_usuario');
        $this->listaDeposito_model->eliminarUser();
        echo json_encode('OK Guardado');
    }
     public function dameNumero(){
        $this->load->model('bancos_model');
        $res = $this->bancos_model->dameUltimaRendicion();
        echo json_encode($res);
    }
    public function dameIdRendicion($renNumero){
        $this->load->model('bancos_model');
        $res = $this->bancos_model->dameIdRendicion($renNumero);
        echo json_encode($res);
    }
    public function carroDevoluciones($id)
    {
        $this->load->model('listaDeposito_model');
        $this->listaDeposito_model->lisDepDeposito  = $id;
        $this->listaDeposito_model->lisDepUsuario   = $this->session->userdata('id_usuario');
        $this->listaDeposito_model->lisDepFecha     = date('Y-m-d');
        $this->listaDeposito_model->guardar();
                
        echo json_encode('ADD OK');  
        //die($id);
    }
    public function carroDevolucionesMinus($id)
    {
        $this->load->model('listaDeposito_model');
        $this->listaDeposito_model->lisDepDeposito  = $id;
        $this->listaDeposito_model->eliminar();
        echo json_encode('MINUS OK');  
        //die($id);
    }
    public function eliminarCarro()
    {
        $this->load->model('listaDeposito_model');
        $this->listaDeposito_model->lisDepUsuario  = $this->session->userdata('id_usuario');
        $this->listaDeposito_model->eliminarUser();
        echo json_encode('DELETE OK');  
        //die($id);
    }
    


	


}