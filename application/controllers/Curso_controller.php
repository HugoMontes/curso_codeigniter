<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Curso_controller extends CI_Controller {

  function __construct(){
    parent::__construct();
    $this->load->helper('url');
    $this->load->model('curso_model');
    // Cargar libreria session
    // Usualmente esta libreria junto a url
    // son cargados en el archivo autoload.php
    $this->load->library('session');
  }

  public function index(){
    // Obtenemos todos los registros de la bd
    // $data['cursos']=$this->curso_model->listAll();

    /*--- begin Pagination ---*/
    // Número de registros mostrados por páginas
    $pages=5;
    // Cargamos la librería de paginación
    $this->load->library('pagination');
    // Parametro base de la aplicación
    // Si no se ha limpiado la url base_url().'index.php/curso_controller/index';
    $config['base_url'] = base_url().'curso_controller/index';
    // Calcula el número de filas
    $config['total_rows'] = $this->curso_model->total_cursos();
    // Número de registros mostrados por páginas
    $config['per_page'] = $pages;
    //Número de links mostrados en la paginación
    $config['num_links'] = 4;
    // Segmento de la paginación
    $config["uri_segment"] = 3;
    // Inicializar la paginación
    $this->pagination->initialize($config);
    // Obtener los curoso paginados
    $cursos=$this->curso_model->total_paginados($config['per_page'],$this->uri->segment(3));
    $data["cursos"] = $cursos;
    /*--- end Pagination ---*/

    // Invocamos a la vista
    $this->load->view('curso/curso_view',$data);
  }

  public function nuevo(){
    // Cargamos funciones para generar el formulario
    // La siguiente linea usualmente va en el constructor
    $this->load->helper('form');
    // Invocamos a la vista para renderizar el formulario
    $this->load->view('curso/nuevo_view');
  }

  public function guardar(){
    // Se invoca al metodo de validacion
    $this->validarFormularioCurso();
    // Validar el formulario
    if ($this->form_validation->run()){
      // post(): Retorna datos del formulario con formato:
      // array('nom_campo1'=>valor1,'nom_campo2'=>valor2)
      $data=$this->input->post();
      // Verificar si se va ha guardar un nuevo registro o editar
      if($this->input->post('id')==null){
        // Guardar los datos en la base de datos
        $this->curso_model->save($data);
        // Recuperar la descripcion del curso
        $curso=$this->input->post('descripcion');
        // Mensaje indicando la adicion
        $this->session->set_flashdata('mensaje', 'El curso '.$curso.' fue adicionado exitosamente.');
      }else{
        // Guardar los cambios en la base de datos
        $this->curso_model->update($data);
        // Mensaje indicando la adicion
        $this->session->set_flashdata('mensaje', 'El curso fue editado exitosamente.');
      }
      // Redireccionar al listado de cursos
      redirect(base_url('curso'));
    }else{
      // Si existen errores de validacion,
      // se vuelve a mostrar el formulario
      if($this->input->post('id')==null){
        $this->nuevo();
      }else{
        $this->editar($this->input->post('id'));
      }
    }
  }

  // Funcion de validacion para el formulario
  private function validarFormularioCurso(){
    // Cargamos la clase para validar el formulario
    // La siguiente linea usualmente va en el constructor
    $this->load->library('form_validation');
    // Agregar las reglas de validacion
    $this->form_validation->set_rules('descripcion', 'Descripcion del curso', 'required');
    $this->form_validation->set_rules('precio', 'Precio del curso', 'required|numeric');
    // Personalizar los mensajes de validacion
    $this->form_validation->set_message('required', 'El campo %s es obligatorio');
    $this->form_validation->set_message('numeric', 'El campo %s es un valor numerico');
    // SE DEFINE UN ESTILO A LOS MENSAJES DE VALIDACION
    $this->form_validation->set_error_delimiters('<span style="color:red;">','</span>');
  }

  public function detalle($id){
    $data['curso']=$this->curso_model->findById($id);
    $this->load->view('curso/detalle_view',$data);
  }

  public function editar($id){
    // Generar un formulario para editar
    $this->load->helper('form');
    // Buscar el registro por id
    $data['curso']=$this->curso_model->findById($id);
    $this->load->view('curso/editar_view',$data);
  }

  public function eliminar($id){
    // Eliminar el registro por id
    $this->curso_model->delete($id);
    // Mensaje indicando la eliminacion
    $this->session->set_flashdata('mensaje', 'El curso fue eliminado exitosamente.');
    // Se muestra el listado
    $this->index();
  }

}
