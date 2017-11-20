<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
		$this->load->model(array('login_model','usuarios_panel_log_model','licencias_model','bancos_model'));
		$this->load->library(array('session','form_validation'));
		$this->load->helper(array('url','form','security'));
                //date_default_timezone_set('America/Santiago');
		//$this->load->database();
    }
	
	public function index()
	{
		
                
		if($this->session->userdata('is_logged_in')){
                    
                            $agente = $_SERVER['HTTP_USER_AGENT'];
                            if(preg_match('/Chrome/i',$agente)){
                            $nav = "Chrome";}
                            else {$nav = "";}
                            $alert = "alert('Su navegador no se encuentra optimizado, algunas funcionalidades podrian no estar disponibles. Le recomendamos utilizar Google Chrome.');";
			
                    //CLINICA        
                        if($this->session->userdata('perfil') == '1'){
                            IF($nav != 'Chrome'){
                            echo "<script>".$alert."window.location.href='".base_url()."clinica_admin/charts';</script>";}
                            ELSE {redirect(base_url().'clinica_admin/charts/');}
                            
                        }else if($this->session->userdata('perfil') == '2'){
                            IF($nav != 'Chrome'){
                            echo "<script>".$alert."window.location.href='".base_url()."clinica_admision/charts';</script>";}
                            ELSE {redirect(base_url().'clinica_admision/charts/');}
                            
                        }else if($this->session->userdata('perfil') == '3'){
                            IF($nav != 'Chrome'){
                            echo "<script>".$alert."window.location.href='".base_url()."clinica_enfermeria/ingresos/listarIngreso';</script>";}
                            ELSE {redirect(base_url().'clinica_enfermeria/ingresos/inicio');}
                           
                        }else if($this->session->userdata('perfil') == '4'){
                            IF($nav != 'Chrome'){
                            echo "<script>".$alert."window.location.href='".base_url()."clinica_enfermeria/charts/';</script>";}
                            ELSE {redirect(base_url().'clinica_enfermeria/charts/');}
                            
                        }else if($this->session->userdata('perfil') == '5'){
                            IF($nav != 'Chrome'){
                            echo "<script>".$alert."window.location.href='".base_url()."clinica_enfermeria/ingresos/listarIngreso';</script>";}
                            ELSE {redirect(base_url().'clinica_enfermeria/ingresos/inicio');}
                           
                            
                            
         ////// BORRAR                   
                        }else if($this->session->userdata('perfil') == '9'){
                            IF($nav != 'Chrome'){
                            echo "<script>".$alert."window.location.href='".base_url()."qa/chats';</script>";}
                            ELSE {redirect(base_url().'qa/charts');}
                           
                            
                    //HD        
                        }else if($this->session->userdata('perfil') == '11'){
                            IF($nav != 'Chrome'){
                            echo "<script>".$alert."window.location.href='".base_url()."hd_admision/ingresos/inicio';</script>";}
                            ELSE {redirect(base_url().'hd_admision/ingresos/inicio');}
			}
                        else if($this->session->userdata('perfil') == '12'){
                            IF($nav != 'Chrome'){
                            echo "<script>".$alert."window.location.href='".base_url()."hd_admision/ingresos/inicio';</script>";}
                            ELSE {redirect(base_url().'hd_admision/ingresos/inicio');}
			}
                        else if($this->session->userdata('perfil') == '13'){
                            IF($nav != 'Chrome'){
                            echo "<script>".$alert."window.location.href='".base_url()."hd_admision/ingresos/inicio';</script>";}
                            ELSE {redirect(base_url().'hd_admision/ingresos/inicio');}
			}
                        else if($this->session->userdata('perfil') == '14'){
                            IF($nav != 'Chrome'){
                            echo "<script>".$alert."window.location.href='".base_url()."hd_admision/ingresos/inicio';</script>";}
                            ELSE {redirect(base_url().'hd_admision/ingresos/inicio');}
			}
                        
                }else{
			$data['token'] = $this->token();
			$data['titulo'] = 'Login con roles de usuario en codeigniter';
			$this->load->view('login_view',$data);			
		}
	}
 
	public function new_user()
	{
            
		if($this->input->post('token') && $this->input->post('token') == $this->session->userdata('token'))
		{
            $this->form_validation->set_rules('username', 'E-mail', 'required|trim|min_length[2]|max_length[150]');
            $this->form_validation->set_rules('password', 'Contraseña', 'required|trim|min_length[5]|max_length[150]');

            //lanzamos mensajes de error si es que los hay
            
			if($this->form_validation->run() === false)
			{   
				echo "<script>alert('Usuario o password mal ingresados.');
                                    window.location.href='".base_url()."';</script>";
                                
			}elseif($this->form_validation->run() === true){
				$username = $this->input->post('username',TRUE);
                                $username = str_replace('-', '', $username);
				$password = md5($this->input->post('password',TRUE));
				$check_user = $this->login_model->loginUsuario($username,$password);
				
				if($check_user == TRUE)
				{
                                    $lic = $this->licencias_model->dameLicenciasPorVencer();
                                    $cta = $this->bancos_model->dameCtasPorVencer();
                                    //die($lic[0]->contar);
                                    $contar = 0;$contarCtas = 0;
                                    foreach ($lic as $li)$contar += 1;
                                    foreach ($cta as $ct)$contarCtas += 1;
                                    
                                    $this->load->model("parametros_model");
                                    $mensaje = $this->parametros_model->dameValor('MENSAJE');

                                        $data = array(
                                            'is_logged_in' 	=>  TRUE,
                                            'contarLicencias'=>  $contar,
                                            'contarCtas'         =>  $contarCtas,
                                            'id_usuario' 	=>  $check_user->uspId,
                                            'perfil'		=>  $check_user->uspPerfil,
                                            'username' 	=>  $check_user->uspEmail,
                                            'rut'                         =>  $check_user->uspRut,
                                            'nombre_completo'   =>  $check_user->uspNombre." ".$check_user->uspApellidoP,
                                            'mensaje'             =>  $mensaje,
                                            'reloj'                     =>  date('Y-m-d H:i:s',strtotime ( '+60 minutes' )),
					);	
                                        
                                    $this->session->set_userdata($data);	
                                        
					//Guarda Log
                                    $this->usuarios_panel_log_model->uplFecha = date('Y-m-d H:i:s');
                                    $this->usuarios_panel_log_model->uplUsuario = $check_user->uspId;
                                    $this->usuarios_panel_log_model->uplDescripcion = "Acceso a panel de control";
                                    $this->usuarios_panel_log_model->guardarLog();

                                    $this->index();

				} 
                                else {
                                    
                                    echo "<script>alert('Usuario o password mal ingresados.');
                                    window.location.href='".base_url()."';</script>";
                                    
                                    //echo "<script>window.location.href='".base_url()."';</script>";
                                    //redirect(base_url());
                                }
			}else die('aca');
                        
		}else{
			echo "<script>
                            window.location.href='".base_url()."';</script>";
		}
	}
	
	public function token()
	{
		$token = md5(uniqid(rand(),true));
		$this->session->set_userdata('token',$token);
		return $token;
	}
	
	public function logout_ci()
	{
                $session = $this->session->userdata('id_usuario');
		if(!empty($session)){
                    $this->usuarios_panel_log_model->uplFecha = date('Y-m-d H:i:s');
                    $this->usuarios_panel_log_model->uplUsuario = $this->session->userdata('id_usuario');
                    $this->usuarios_panel_log_model->uplDescripcion = 'Logout en panel de control';
                    $this->usuarios_panel_log_model->guardarLog();
		}
		
		$this->session->sess_destroy();
		redirect(base_url());
	}
    
    
    public function forget()
	{
		if (isset($_GET['info'])) {
               $data['info'] = $_GET['info'];
              }
		if (isset($_GET['error'])) {
              $data['error'] = $_GET['error'];
              }
		$data['token'] = $this->token();
                $data['recuperar'] = 1;
		$data['titulo'] = 'Login con roles de usuario en codeigniter';
		$this->load->view('login_view',$data);
	} 
    public function doforget()
	{
                $data['recuperar'] = 1;
		$email= $_POST['email'];
		$q = $this->login_model->enviarEmail($email);
                
		if (!empty($q->uspEmail)) {
                    $this->reiniciaClave($q);
                    $info= "Se ha reseteado la contraseña, y ha sido enviada a: ". $email;
                    $data['info'] = $info;
                    $this->load->view('login_view',$data);
                }
                else {
                    $error = "El email ingresado no se encuentra registrado.";
                    $data['info'] = $error;
                    $this->load->view('login_view',$data);
                }
		
	} 
    private function reiniciaClave($user)
	{
		$password= random_string('alnum', 6);
                //echo $password;
                $this->login_model->uspId = $user->uspId;
                $this->login_model->uspPassword = MD5($password);
                $this->login_model->guardar();
                
                
                $config = array(
			'mailtype' => 'html',
			'charset' => 'utf-8',
			'newline' => "\r\n"
		); 
 
		//cargamos la configuración para enviar
		
                
		$this->load->library('email');
                $this->email->initialize($config);
		$this->email->from('cetep@cetep.cl', 'Cetep');
		$this->email->to($user->uspEmail);
                $this->email->bcc('dti@cetep.cl');  	
		$this->email->subject('Reseteo de Contraseña');
		$this->email->message('Usted ha solicitado una nueva contraseña de ingreso para el usuario <b>"'.$user->uspUsuario.'"</b>, al panel de control de la Clínica MirAndes.<br>La nueva contraseña de acceso es: '.$password.'<br><br>Atentamente,<br>Equipo DTI');	
		$this->email->send();
        //echo $this->email->print_debugger();
	} 
	
	

	
	
}



?>