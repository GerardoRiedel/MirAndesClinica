<?php

/**
 * Created by Netbeans.
 * User: Gerardo Riedel
 * Date: 17/11/2016
 * Time: 14:00
 */
class DevolucionHD extends CI_Controller
{

    function __construct(){
        parent::__construct();
        $this->load->model('bancos_model');
        //$this->load->helper('validacion');
    }

    
    public function guardar($id){
        
        $this->bancos_model->renUsuario = $this->session->userdata('id_usuario');
        $this->bancos_model->renFecha = date('Y-m-d H:i:s');
        $this->bancos_model->renId = $id;
        $this->bancos_model->renEnviada = 2;
        $this->bancos_model->guardarRendicionHD();
        
        $depositos = $this->bancos_model->dameDatosRenIdHD($id);
        $monto = $renId = 0;
        foreach ($depositos as $dep){$monto += $dep->depSuma;$renId = $dep->depRendicion;}
        
        $this->load->model('listaDeposito_model');
        $this->listaDeposito_model->lisDepUsuario  = $this->session->userdata('id_usuario');
        $this->listaDeposito_model->eliminarUser();
        echo json_encode('OK Guardado');
    }
     public function dameNumero(){
        $res = $this->bancos_model->dameUltimaRendicion();
        echo json_encode($res);
    }
    public function dameIdRendicion($renNumero){
        $res = $this->bancos_model->dameIdRendicionHD($renNumero);
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