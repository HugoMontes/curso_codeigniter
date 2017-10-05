<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Practica_controller extends CI_Controller {

  function __construct(){
    parent::__construct();
    $this->load->helper('url');
    $this->load->library('login');
    $this->login->verify_user();
  }

  public function mostrarDatos(){
    $data['nombre']='Juan Perez';
    $data['edad']=35;
    $this->load->view('practica/practica1_view',$data);
  }

  // FUNCION QUE DEVUELVE UNA COLECCION
  public function listAllPersonas(){
    $personas=array(
      array('id'=>1, 'nombre'=>'Juan', 'edad'=>25),
      array('id'=>2, 'nombre'=>'Ana', 'edad'=>19),
      array('id'=>3, 'nombre'=>'Maria', 'edad'=>15),
      array('id'=>4, 'nombre'=>'Ivan', 'edad'=>57),
    );
    $data['personas']=$personas;
    $this->load->view('practica/practica2_view',$data);
  }

  public function verificaEdad($nombre="Anonimo", $edad=0){
	   $obs=$edad>=18?"Mayor de Edad":"Menor de Edad";
     $data['nombre']=$nombre;
     $data['edad']=$edad;
     $data['observacion']=$obs;
	   $this->load->view('practica/practica3_view',$data);
	}

  public function realizarCalculo($a, $b){
		$this->load->helper('calculadora');
    $data['valora']=$a;
    $data['valorb']=$b;
		$this->load->view('practica/practica4_view',$data);
	}

  public function autorizaUsuario($nombre, $password){
		// Se preparan los parametros a ser enviados
		$params = array(
		    "nombre"	=>	$nombre,
		    "password"	=>	$password
		);
		// Se carga la libreria pasando los parametros
		$this->load->library('autoriza', $params);
		// Se llama a la funcion de la libreria
		$data['mensaje']=$this->autoriza->verificar();
		$this->load->view('practica/practica5_view',$data);
	}
}
