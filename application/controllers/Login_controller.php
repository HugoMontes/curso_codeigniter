<?php
class Login_controller extends CI_Controller{

  function __construct(){
    parent::__construct();
    $this->load->helper(array('url','form'));
    $this->load->library(array('form_validation','session'));
    $this->load->model('usuario_model');
  }

  public function index(){
    $this->load->view('login_view');
  }

  public function login(){
    $this->session->set_flashdata('error', null);
    $this->session->set_flashdata('info', null);
    $this->validarFormularioLogin();
    if($this->form_validation->run()){
      if($this->check_database()){
        redirect('escritorio','refresh');
      }
    }
    $this->load->view('login_view');
  }

  private function validarFormularioLogin(){
    // trim: Convierte el texto en minusculas
    $this->form_validation->set_rules('username', 'Usuario', 'trim|required');
    $this->form_validation->set_rules('password', 'Password', 'trim|required');
    $this->form_validation->set_message('required','El campo %s es obligatorio');
  }

  private function check_database(){
    $username=$this->input->post('username');
    $password=$this->input->post('password');
    $usuario=$this->usuario_model->findByUsernamePassword($username, $password);
    if($usuario){
      // Creando una variable de sesion con nombre logged_in
      $session_data=array('id'=>$usuario->id, 'username'=>$usuario->username);
      $this->session->set_userdata('logged_in', $session_data);
      return true;
    };
    $this->session->set_flashdata('error', 'Nombre de usuario o password incorrectos.');
    return false;
  }

  public function logout(){
    $this->session->unset_userdata('logged_in');
    $this->session->sess_destroy();
    $this->session->set_flashdata('info', 'Sesión cerrada correctamente.');
    $this->index();
  }
}
