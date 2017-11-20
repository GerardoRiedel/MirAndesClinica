<?php

/**
 * Created by Netbeans.
 * User: Gerardo Riedel
 * Date: 01/02/2017
 * Time: 14:00
 */
class Qa extends CI_Controller
{

    function __construct(){
        parent::__construct();
        $this->load->model('charts_model');
    }
    
    public function index(){
        $res = $this->charts_model->pacientes();
        echo json_encode($res);
    }
    public function pieSexo(){
        $res = $this->charts_model->pieSexo();
        echo json_encode($res);
    }
    public function piePiso(){
        $res = $this->charts_model->piePiso();
        echo json_encode($res);
    }
    public function depositos(){
        $res = $this->charts_model->depositos();
        echo json_encode($res);
    }
    
    public function piePisoEnfermeria(){
        $res = $this->charts_model->piePisoEnfermeria();
        echo json_encode($res);
    }
    public function tec(){
        $res = $this->charts_model->tec();
        echo json_encode($res);
    }
    public function cajaOK(){
        $res = $this->charts_model->cajaOK();
        //die(var_dump($res));
        echo json_encode($res);
    }
    public function cajaNO(){
        $res = $this->charts_model->cajaNO();
        //die(var_dump($res));
        echo json_encode($res);
    }
    public function cajaBLOQUEO(){
        $res = $this->charts_model->cajaBLOQUEO();
        //die(var_dump($res));
        echo json_encode($res);
    }
}