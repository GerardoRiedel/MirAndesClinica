<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Charts extends CI_Controller {

	function __construct()
	{
		parent::__construct();
        $this->load->helper(array('download', 'file', 'url', 'html', 'form'));
        $this->load->helper('layout');
	}
	
	function index()
	{
            $this->load->model("enfermeria_model");
            //POR VENCER ARREGLAR
            //$med = $this->enfermeria_model->dame_medicamento_porVencer();
        IF(!empty($med[0]->medAdmId)){
            $data = array('contarMedicamentos' =>  $med[0]->medAdmId);	
            }
        ELSE {
            $data = array('contarMedicamentos' =>  0);
        }
            $this->session->set_userdata($data);
        $data['breadcumb']  = "paciente";
        $data['title']      = "Gráficos";
        $data['menu']       = 'charts';
        $data['submenu']    = 'pchart';
        Layout_Helper::cargaVista($this,'charts',$data,'ingresos');  
	}
        function chartsTodo()
	{
        $data['breadcumb']  = "paciente";
        $data['title']      = "Gráficos";
         $data['menu']       = 'charts';
        $data['submenu']    = 'tchart';
        Layout_Helper::cargaVista($this,'chartsTodo',$data,'ingresos');  
	}
	
	
}