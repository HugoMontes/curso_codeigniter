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
    // INSERT(): Persiste un arrar en la db con formato:
    // array('nom_campo1'=>valor1,'nom_campo2'=>valor2)
    $success = $this->db->insert($this->TABLE_NAME, $data);
    if ($success) {
      return $this->db->insert_id();
    }
  }

  public function findById($id){
    // where(): Similar a SELECT * FROM cursos WHERE id=$id
    $this->db->where('id',$id);
    // get(): Devuelve el resultado de la consulta
    $query=$this->db->get($this->TABLE_NAME);
    if($query->num_rows() > 0){
      // row(): Devuelve un solo objeto
      return $query->row();
    }
  }

  public function update($data){
    $this->db->where('id',$data['id']);
    // update(): Actualiza y retorna un valor entero
    // que expresa en nro de registros actualizados
    return $this->db->update($this->TABLE_NAME,$data);
  }

  public function delete($id){
    $this->db->where('id',$id);
    // delete(): Actualiza y retorna un valor entero
    // que expresa en nro de registros actualizados
    return $this->db->delete($this->TABLE_NAME);
  }

  ###################################################
  # Begin : Pagination
  ###################################################
  // Total de registros para la paginacion
  function total_cursos(){
    $query = $this->db->get($this->TABLE_NAME);
    return  $query->num_rows() ;
  }
  // Total paginados segun el segmento
  function total_paginados($por_pagina, $segmento){
    $query = $this->db->get($this->TABLE_NAME, $por_pagina, $segmento);
    return $query->result();
  }
  ###################################################
  # End : Pagination
  ###################################################
}
