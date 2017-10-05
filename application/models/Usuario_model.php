<?php
class Usuario_model extends CI_Model{

  private $TABLE_NAME="usuarios";

  function __construct(){
    parent::__construct();
    $this->load->database();
  }

  public function findByUsernamePassword($username, $password){
    $this->db->select('id, username, password');
    $this->db->from($this->TABLE_NAME);
    $this->db->where('username', $username);
    $this->db->where('password', MD5($password));
    $this->db->limit(1);
    $query=$this->db->get();
    if($query->num_rows()==1){
      return $query->row();
    }
  }
}
