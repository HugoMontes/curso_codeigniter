<?php $this->load->view('template/header'); ?>
<h2>LISTA DE PERSONAS</h2>
<table class="table table-striped">
  <tr>
    <th>ID</th>
    <th>NOMBRE</th>
    <th>EDAD</th>
  </tr>
  <?php foreach($personas as $p){ ?>
    <tr>
      <td><?php echo $p['id']; ?></td>
      <td><?php echo $p['nombre']; ?></td>
      <td><?php echo $p['edad']; ?></td>
    </tr>
  <?php } ?>
</table>
<?php $this->load->view('template/footer'); ?>
