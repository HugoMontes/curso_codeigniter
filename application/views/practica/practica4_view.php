<?php $this->load->view('template/header'); ?>
  <h2>Calculadora Helper</h2>
  Valor A: <?php echo $valora; ?> <br/>
  Valor B: <?php echo $valorb; ?> <br/>
  Suma: <?php echo sumar($valora, $valorb); ?> <br/>
  Resta: <?php echo restar($valora, $valorb); ?> <br/>
<?php $this->load->view('template/footer'); ?>
