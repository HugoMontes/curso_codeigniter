<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Principal_controller extends CI_Controller {

	function __construct(){
		parent::__construct();
		// El siguiente codigo permite utilizar site_url() en la vista
		$this->load->helper('url');
		// Cargar la libreria de login
		$this->load->library('login');
		// Todos los controladores deben llamar al metodo
		// verify_user() en su constructor
		$this->login->verify_user();
	}

	public function index(){
		$this->load->view('inicio_view');
	}
}
