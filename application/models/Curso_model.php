<?php
class Curso_model extends CI_Model {

  private $TABLE_NAME="cursos";

  function __construct(){
    parent::__construct();
    $this->load->database();
  }

  public function listAll(){
    // SE CONSULTA A LA BD SIMILAR A UN: SELECT * FROM cursos
    $query=$this->db->get($this->TABLE_NAME);
    // EN CASO DE CONTAR CON DATOS, ENVIARLOS
    if($query->num_rows() > 0){
      // LA FUNCION RESULT() DEVUELVE UN ARRAY DE OBJETOS
      return $query->result();
    }
  }

  public function save($data){
    $success = $this->db->insert($this->TABLE_NAME, $data);
    if ($success) {
        return $this->db->insert_id();
    }
  }
}
