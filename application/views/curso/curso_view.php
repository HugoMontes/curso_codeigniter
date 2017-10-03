<?php $this->load->view('template/header'); ?>
<?php if($this->session->flashdata('mensaje')){?>
  <div class="alert alert-success">
    <?php echo $this->session->flashdata('mensaje'); ?>
  </div>
<?php } ?>
<h2>Cursos</h2>
<a href="<?php echo site_url('curso/nuevo');?>" class="btn btn-primary">Nuevo curso</a>
<table class="table">
  <tr>
    <th>ID</th>
    <th>CURSO</th>
    <th>PRECIO</th>
    <th style="width:80px;">ACCION</th>
  </tr>
  <?php foreach($cursos as $curso){ ?>
    <tr>
      <td><?php echo $curso->id; ?></td>
      <td><?php echo $curso->descripcion; ?></td>
      <td><?php echo $curso->precio; ?></td>
      <td>
        <a href="<?php echo site_url('curso/detalle/'.$curso->id); ?>" title="Detalle">
          <span class="glyphicon glyphicon-eye-open"></span>
        </a>
        <a href="<?php echo site_url('curso/editar/'.$curso->id); ?>" title="Editar">
          <span class="glyphicon glyphicon-pencil"></span>
        </a>
        <a href="<?php echo site_url('curso/eliminar/'.$curso->id); ?>" class="btn-eliminar" title="Eliminar">
          <span class="glyphicon glyphicon-trash"></span>
        </a>
      </td>
    </tr>
  <?php } ?>
</table>
<?php $this->load->view('template/footer'); ?>
<script type="text/javascript">
  $('.btn-eliminar').on('click',function(event){
    event.preventDefault();
    var curso=$(this).parent().parent().children().eq(1).text();
    if(confirm('Esta seguro de eliminar el curso '+curso+'?')){
      var url=$(this).attr('href');
      $(location).attr('href',url);
    }
    return false;
  });
</script>
