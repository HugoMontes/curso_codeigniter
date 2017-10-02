<?php $this->load->view('template/header'); ?>
<h2>Cursos</h2>
<a href="<?php echo site_url('curso/nuevo');?>" class="btn btn-primary">Nuevo curso</a>
<table class="table">
  <tr>
    <th>ID</th>
    <th>CURSO</th>
    <th>PRECIO</th>
  </tr>
  <?php foreach($cursos as $curso){ ?>
    <tr>
      <td><?php echo $curso->id; ?></td>
      <td><?php echo $curso->descripcion; ?></td>
      <td><?php echo $curso->precio; ?></td>
    </tr>
  <?php } ?>
</table>
<?php $this->load->view('template/footer'); ?>
