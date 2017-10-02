<?php
defined("BASEPATH") or die("El acceso al script no está permitido");
class Login{
	private $data = array();
	public function __construct(array $params){
        $this->data = $params;
     }
	public function verificar(){
		if($this->data["nombre"]=="admin"&&
		   $this->data["password"]=="123456"){
			return "El usuario es valido....";
		}
		return "Usuario invalido...";
	}
}
