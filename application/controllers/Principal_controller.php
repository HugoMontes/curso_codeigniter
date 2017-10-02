<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Principal_controller extends CI_Controller {

	function __construct(){
	   parent::__construct();
	   // El siguiente codigo permite utilizar site_url() en la vista
	   $this->load->helper('url');
	}

	public function index(){
		$this->load->view('inicio_view');
	}
}
