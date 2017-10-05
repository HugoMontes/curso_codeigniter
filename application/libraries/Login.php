<?php
defined("BASEPATH") or die("El acceso al script no está permitido");
class Login{
  private $CI;
  public function __construct(){
    $this->CI =& get_instance();
    $this->CI->load->library('session');
  }
  public function verify_user(){
    if(!$this->CI->session->userdata('logged_in')){
      // Si no existe sesion, se redirecciona a login
      redirect('login_controller', 'refresh');
    }
  }
}
