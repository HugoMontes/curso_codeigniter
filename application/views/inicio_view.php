<?php $this->load->view('template/header'); ?>
  <h1>PRACTICAS CODEIGNITER</h1>
  <a href="<?php echo site_url('practica/codeigniter');?>">
    1. Pagina por defecto Codeigniter
  </a>
  <br/>
  <a href="<?php echo site_url('practica/datos');?>">
    2. Datos del controlador hacia la vista
  </a>
  <br/>
  <a href="<?php echo site_url('practica/coleccion');?>">
    3. Coleccion de datos
  </a>
  <br/>
  <a href="<?php echo site_url('practica/segmento/Juan/23');?>">
    4. Peticion get con parametros
  </a>
  <br/>
  <a href="<?php echo site_url('curso');?>">
    5. Lista de cursos
  </a>
  <br/>
  <a href="<?php echo site_url('logout');?>">
   6. Cerrar Sesion
  </a>
<?php $this->load->view('template/footer'); ?>
