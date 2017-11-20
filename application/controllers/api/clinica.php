<?php

/**
 * Created by Netbeans.
 * User: Gerardo Riedel
 * Date: 01/02/2017
 * Time: 14:00
 */
class Clinica extends CI_Controller
{

    function __construct(){
        parent::__construct();
        $this->load->model('evoluciones_model');
        $this->load->model('enfermeria_model');
        //$this->load->helper('validacion');
    }

    public function medicamento($id){
        $id = explode('_',$id);
        IF(!empty( $id[2]))$motivo = $id[2];
        $pos = $id[1];
        $id = $id[0];
        
        
        $medic = $this->enfermeria_model->dameUnoMedicamentoId($id);

        IF($pos === '1'  && empty($motivo)){
        $estado = explode('-',$medic->medEstado);
        $estado = '2-'.$estado[1].'-'.$estado[2].'-'.$estado[3].'-'.$estado[4];
        }
        ELSEIF($pos === '2' && empty($motivo)){
        $estado = explode('-',$medic->medEstado);
        $estado = $estado[0].'-2-'.$estado[2].'-'.$estado[3].'-'.$estado[4];
        }
        ELSEIF($pos === '3' && empty($motivo)){
        $estado = explode('-',$medic->medEstado);
        $estado = $estado[0].'-'.$estado[1].'-2-'.$estado[3].'-'.$estado[4];
        }
        ELSEIF($pos === '4' && empty($motivo)){
        $estado = explode('-',$medic->medEstado);
        $estado = $estado[0].'-'.$estado[1].'-'.$estado[2].'-2-'.$estado[4];
        }
        ELSEIF($pos === '5' && empty($motivo)){
        $estado = explode('-',$medic->medEstado);
        $estado = $estado[0].'-'.$estado[1].'-'.$estado[2].'-'.$estado[3].'-2';
        }
        
        
        
        ELSEIF($pos === '1'  && !empty($motivo)){
        $estado = explode('-',$medic->medEstado);
        $estado = $motivo.'-'.$estado[1].'-'.$estado[2].'-'.$estado[3].'-'.$estado[4];
        }
        ELSEIF($pos === '2' && !empty($motivo)){
        $estado = explode('-',$medic->medEstado);
        $estado = $estado[0].'-'.$motivo.'-'.$estado[2].'-'.$estado[3].'-'.$estado[4];
        }
        ELSEIF($pos === '3' && !empty($motivo)){
        $estado = explode('-',$medic->medEstado);
        $estado = $estado[0].'-'.$estado[1].'-'.$motivo.'-'.$estado[3].'-'.$estado[4];
        }
        ELSEIF($pos === '4' && !empty($motivo)){
        $estado = explode('-',$medic->medEstado);
        $estado = $estado[0].'-'.$estado[1].'-'.$estado[2].'-'.$motivo.'-'.$estado[4];
        }
        ELSEIF($pos === '5' && !empty($motivo)){
        $estado = explode('-',$medic->medEstado);
        $estado = $estado[0].'-'.$estado[1].'-'.$estado[2].'-'.$estado[3].'-'.$motivo.'';
        }
        
        
        
        
        $this->enfermeria_model->medId = $id;
        $this->enfermeria_model->medEstado = $estado;
        $this->enfermeria_model->guardarMedicamentoAsignar();
        echo json_encode('OK');
    }
    

    public function guardar($array){
            $array = explode('_', $array);
            
        //die(var_dump($evolucion));
            
        $array      = str_replace('%3Cbr%3E','<br>',$array);   
        $array      = str_replace('%C3%B1','Ñ',$array);$array = str_replace('%C3%91','ñ',$array);
        $array      = str_replace('%20',' ',$array);
        $array      = str_replace('%C3%B3','ó',$array);$array = str_replace('%C3%93','Ó',$array);
        $array      = str_replace('%C3%AD','í',$array);$array = str_replace('%C3%8D','Í',$array);
        $array      = str_replace('%C3%A9','é',$array);$array = str_replace('%C3%89','É',$array);
        //die(var_dump($array));
            //die(var_dump($array).'aaaa');
$medicoAsignado = $array[0];
$diaEstadia = $array[1];
$habitacion = $array[2];
$evoDiagPsiquiatra = $array[3];
$evoDiagMedico = $array[4];
$regimen = $array[5];
$peso = $array[6];
$talla = $array[7];
$riesgo = $array[8];
$dowton = $array[9];
$evoSueDia = $array[10];
$evoSueNoche = $array[11];
$evoHidraDia = $array[12];
$evoHidraNoche = $array[13];

$visitas = $array[14];
$telefono = $array[15];
$salidas = $array[16];
$cuidador = $array[17];

$evoTO1 = $array[18];
$evoTO2 = $array[19];
$evoTOOtro = $array[20];
$evoPlan = $array[21];
$evoExamenes = $array[22];
$evoAvisar = $array[23];
$evoDia = $array[24];
$evoNoche = $array[25];

$evoId          = $array[26];
$evoRegistro    = $array[27];
$rut            = $array[28];
            
        IF(!empty($evoId))$this->evoluciones_model->evoId        = $evoId;
        $this->evoluciones_model->evoUsuario        = $this->session->userdata('id_usuario');
        $this->evoluciones_model->evoRegistro       = $evoRegistro;
        $this->evoluciones_model->evoFechaRegistro  = date('Y-m-d H:i:s');
        $this->evoluciones_model->evoEstadia        = $diaEstadia;
        $this->evoluciones_model->evoHabitacion     = $habitacion;
        $this->evoluciones_model->evoPeso           = $peso;
        $this->evoluciones_model->evoTalla          = $talla;
        $this->evoluciones_model->evoRiesgo         = $riesgo;
        $this->evoluciones_model->evoDowton         = $dowton;
        $this->evoluciones_model->evoDiagMedico     = $evoDiagMedico;
        $this->evoluciones_model->evoDiagPsiquiatra = $evoDiagPsiquiatra;
        
        //$this->evoluciones_model->evoCSV0           = $this->input->post('evoCSV00').'_'.$this->input->post('evoCSV01').'_'.$this->input->post('evoCSV02').'_'.$this->input->post('evoCSV03').'_'.$this->input->post('evoCSV04').'_'.$this->input->post('evoCSV05').'_'.$this->input->post('evoCSV06').'_'.$this->input->post('evoCSV07').'_'.$this->input->post('evoCSV08').'_'.$this->input->post('evoCSV09');
        //$this->evoluciones_model->evoCSV1           = $this->input->post('evoCSV10').'_'.$this->input->post('evoCSV11').'_'.$this->input->post('evoCSV12').'_'.$this->input->post('evoCSV13').'_'.$this->input->post('evoCSV14').'_'.$this->input->post('evoCSV15').'_'.$this->input->post('evoCSV16').'_'.$this->input->post('evoCSV17').'_'.$this->input->post('evoCSV18').'_'.$this->input->post('evoCSV19');
        //$this->evoluciones_model->evoCSV2           = $this->input->post('evoCSV20').'_'.$this->input->post('evoCSV21').'_'.$this->input->post('evoCSV22').'_'.$this->input->post('evoCSV23').'_'.$this->input->post('evoCSV24').'_'.$this->input->post('evoCSV25').'_'.$this->input->post('evoCSV26').'_'.$this->input->post('evoCSV27').'_'.$this->input->post('evoCSV28').'_'.$this->input->post('evoCSV29');
        //$this->evoluciones_model->evoCSV3           = $this->input->post('evoCSV30').'_'.$this->input->post('evoCSV31').'_'.$this->input->post('evoCSV32').'_'.$this->input->post('evoCSV33').'_'.$this->input->post('evoCSV34').'_'.$this->input->post('evoCSV35').'_'.$this->input->post('evoCSV36').'_'.$this->input->post('evoCSV37').'_'.$this->input->post('evoCSV38').'_'.$this->input->post('evoCSV39');
        //$this->evoluciones_model->evoCSV4           = $this->input->post('evoCSV40').'_'.$this->input->post('evoCSV41').'_'.$this->input->post('evoCSV42').'_'.$this->input->post('evoCSV43').'_'.$this->input->post('evoCSV44').'_'.$this->input->post('evoCSV45').'_'.$this->input->post('evoCSV46').'_'.$this->input->post('evoCSV47').'_'.$this->input->post('evoCSV48').'_'.$this->input->post('evoCSV49');
        //$this->evoluciones_model->evoCSV5           = $this->input->post('evoCSV50').'_'.$this->input->post('evoCSV51').'_'.$this->input->post('evoCSV52').'_'.$this->input->post('evoCSV53').'_'.$this->input->post('evoCSV54').'_'.$this->input->post('evoCSV55').'_'.$this->input->post('evoCSV56').'_'.$this->input->post('evoCSV57').'_'.$this->input->post('evoCSV58').'_'.$this->input->post('evoCSV59');
        //$this->evoluciones_model->evoCSV6           = $this->input->post('evoCSV60').'_'.$this->input->post('evoCSV61').'_'.$this->input->post('evoCSV62').'_'.$this->input->post('evoCSV63').'_'.$this->input->post('evoCSV64').'_'.$this->input->post('evoCSV65').'_'.$this->input->post('evoCSV66').'_'.$this->input->post('evoCSV67').'_'.$this->input->post('evoCSV68').'_'.$this->input->post('evoCSV69');
        //$this->evoluciones_model->evoCSV7           = $this->input->post('evoCSV70').'_'.$this->input->post('evoCSV71').'_'.$this->input->post('evoCSV72').'_'.$this->input->post('evoCSV73').'_'.$this->input->post('evoCSV74').'_'.$this->input->post('evoCSV75').'_'.$this->input->post('evoCSV76').'_'.$this->input->post('evoCSV77').'_'.$this->input->post('evoCSV78').'_'.$this->input->post('evoCSV79');
        //$this->evoluciones_model->evoCSV8           = $this->input->post('evoCSV80').'_'.$this->input->post('evoCSV81').'_'.$this->input->post('evoCSV82').'_'.$this->input->post('evoCSV83').'_'.$this->input->post('evoCSV84').'_'.$this->input->post('evoCSV85').'_'.$this->input->post('evoCSV86').'_'.$this->input->post('evoCSV87').'_'.$this->input->post('evoCSV88').'_'.$this->input->post('evoCSV89');
        //$this->evoluciones_model->evoCSV9           = $this->input->post('evoCSV90').'_'.$this->input->post('evoCSV91').'_'.$this->input->post('evoCSV92').'_'.$this->input->post('evoCSV93').'_'.$this->input->post('evoCSV94').'_'.$this->input->post('evoCSV95').'_'.$this->input->post('evoCSV96').'_'.$this->input->post('evoCSV97').'_'.$this->input->post('evoCSV98').'_'.$this->input->post('evoCSV99');
        
        $this->evoluciones_model->evoSueDia         = $evoSueDia;
        $this->evoluciones_model->evoSueNoche       = $evoSueNoche;
        $this->evoluciones_model->evoHidraDia       = $evoHidraDia;
        $this->evoluciones_model->evoHidraNoche     = $evoHidraNoche;
       
        //$this->evoluciones_model->evoAlimentacion   = $this->input->post('alim1').'_'.$this->input->post('alim2').'_'.$this->input->post('alim3').'_'.$this->input->post('alim4').'_'.$this->input->post('alim5').'_'.$this->input->post('alim6');
        $this->evoluciones_model->evoVisitas        = $visitas;
        $this->evoluciones_model->evoTelefono       = $telefono;
        $this->evoluciones_model->evoSalidas        = $salidas;
        $this->evoluciones_model->evoCuidador       = $cuidador;
        
        $this->evoluciones_model->evoTO             = $evoTO1.'_'.$evoTO2.'_'.$evoTOOtro;
        //$this->evoluciones_model->evoMed0           = $this->input->post('evoMed00').'_'.$this->input->post('evoMed01').'_'.$this->input->post('evoMed02').'_'.$this->input->post('evoMed03').'_'.$this->input->post('evoMed04').'_'.$this->input->post('evoMed05').'_'.$this->input->post('evoMed06').'_'.$this->input->post('evoMed07').'_'.$this->input->post('evoMed08').'_'.$this->input->post('evoMed09').'_'.$this->input->post('evoMed010').'_'.$this->input->post('evoMed011').'_'.$this->input->post('evoMed012').'_'.$this->input->post('evoMed013').'_'.$this->input->post('evoMed014').'_'.$this->input->post('evoMed015').'_'.$this->input->post('evoMed016');
        //$this->evoluciones_model->evoMed1           = $this->input->post('evoMed10').'_'.$this->input->post('evoMed11').'_'.$this->input->post('evoMed12').'_'.$this->input->post('evoMed13').'_'.$this->input->post('evoMed14').'_'.$this->input->post('evoMed15').'_'.$this->input->post('evoMed16').'_'.$this->input->post('evoMed17').'_'.$this->input->post('evoMed18').'_'.$this->input->post('evoMed19').'_'.$this->input->post('evoMed110').'_'.$this->input->post('evoMed111').'_'.$this->input->post('evoMed112').'_'.$this->input->post('evoMed113').'_'.$this->input->post('evoMed114').'_'.$this->input->post('evoMed115').'_'.$this->input->post('evoMed116');
        //$this->evoluciones_model->evoMed2           = $this->input->post('evoMed20').'_'.$this->input->post('evoMed21').'_'.$this->input->post('evoMed22').'_'.$this->input->post('evoMed23').'_'.$this->input->post('evoMed24').'_'.$this->input->post('evoMed25').'_'.$this->input->post('evoMed26').'_'.$this->input->post('evoMed27').'_'.$this->input->post('evoMed28').'_'.$this->input->post('evoMed29').'_'.$this->input->post('evoMed210').'_'.$this->input->post('evoMed211').'_'.$this->input->post('evoMed212').'_'.$this->input->post('evoMed213').'_'.$this->input->post('evoMed214').'_'.$this->input->post('evoMed215').'_'.$this->input->post('evoMed216');
        //$this->evoluciones_model->evoMed3           = $this->input->post('evoMed30').'_'.$this->input->post('evoMed31').'_'.$this->input->post('evoMed32').'_'.$this->input->post('evoMed33').'_'.$this->input->post('evoMed34').'_'.$this->input->post('evoMed35').'_'.$this->input->post('evoMed36').'_'.$this->input->post('evoMed37').'_'.$this->input->post('evoMed38').'_'.$this->input->post('evoMed39').'_'.$this->input->post('evoMed310').'_'.$this->input->post('evoMed311').'_'.$this->input->post('evoMed312').'_'.$this->input->post('evoMed313').'_'.$this->input->post('evoMed314').'_'.$this->input->post('evoMed315').'_'.$this->input->post('evoMed316');
        //$this->evoluciones_model->evoMed4           = $this->input->post('evoMed40').'_'.$this->input->post('evoMed41').'_'.$this->input->post('evoMed42').'_'.$this->input->post('evoMed43').'_'.$this->input->post('evoMed44').'_'.$this->input->post('evoMed45').'_'.$this->input->post('evoMed46').'_'.$this->input->post('evoMed47').'_'.$this->input->post('evoMed48').'_'.$this->input->post('evoMed49').'_'.$this->input->post('evoMed410').'_'.$this->input->post('evoMed411').'_'.$this->input->post('evoMed412').'_'.$this->input->post('evoMed413').'_'.$this->input->post('evoMed414').'_'.$this->input->post('evoMed415').'_'.$this->input->post('evoMed416');
        
        $this->evoluciones_model->evoPlan           = $evoPlan;
        $this->evoluciones_model->evoExamenes       = $evoExamenes;
        $this->evoluciones_model->evoAvisar         = $evoAvisar;
        
        //$this->evoluciones_model->evoDia            = $evoDia;
        //$this->evoluciones_model->evoNoche          = $evoNoche;
        
        //$this->evoluciones_model->evoHoras          = $this->input->post('evoHor0').'_'.$this->input->post('evoHor1').'_'.$this->input->post('evoHor2').'_'.$this->input->post('evoHor3').'_'.$this->input->post('evoHor4').'_'.$this->input->post('evoHor5').'_'.$this->input->post('evoHor6').'_'.$this->input->post('evoHor7').'_'.$this->input->post('evoHor10').'_'.$this->input->post('evoHor11').'_'.$this->input->post('evoHor12').'_'.$this->input->post('evoHor13').'_'.$this->input->post('evoHor14').'_'.$this->input->post('evoHor15').'_'.$this->input->post('evoHor16').'_'.$this->input->post('evoHor17');
        
        $this->evoluciones_model->guardar();
        
        //echo var_dump($array); 
        echo json_encode('OK');
    }
    public function via($letra){
        $res = $this->evoluciones_model->dameViaApi($letra);
        die(var_dump($res));
    }
    
}
