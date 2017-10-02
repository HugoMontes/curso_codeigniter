<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Curso_controller extends CI_Controller {

  function __construct(){
    parent::__construct();
    $this->load->helper('url');
    // CARGAMOS LA CLASE DEL MODELO
    $this->load->model('curso_model');
  }

  public function index(){
    // OBTENEMOS TODOS LOS REGISTROS DE LA BD
    $data['cursos']=$this->curso_model->listAll();
    // INVOCAMOS A LA VISTA
    $this->load->view('curso/curso_view',$data);
  }

  public function nuevo(){
    // CARGAMOS FUNCIONES PARA GENERAR EL FORMULARIO
    // LA SIGUIENTE LINEA USUALMENTE VA EN EL CONSTRUCTOR
    $this->load->helper('form');
    // INVOCAMOS A LA VISTA PARA RENDERIZAR EL FORMULARIO
    $this->load->view('curso/nuevo_view');
  }

  public function guardar(){
    $data=$this->input->post();
    // INSERT(): PERSISTEN UNA ARRAY DE DATOS EN LA BD
    // CON EL SIGUIENTE FORMATO:
    // ['nom_campo1'=>valor1,'nom_campo2'=>valor2]
    $this->curso_model->save($data);
    redirect(base_url('curso/listar'));
  }
}
