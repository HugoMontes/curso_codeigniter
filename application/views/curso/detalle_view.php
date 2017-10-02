<?php $this->load->view('template/header'); ?>
<h2>DETALLE DE CURSO</h2>
<?php if(isset($curso)){ ?>
	<table class="table">
		<tr>
			<th>ID:</th>
			<td><?php echo $curso->id; ?></td>
		</tr>
		<tr>
			<th>Descripcion:</th>
			<td><?php echo $curso->descripcion; ?></td>
		</tr>
		<tr>
			<th>Precio:</th>
			<td><?php echo $curso->precio; ?></td>
		</tr>
	</table>
<?php }else{ ?>
	<div class="alert alert-info">No existe el curso...</div>
<?php } ?>
<a href="<?php echo site_url('/curso'); ?>" class="btn btn-default">
  <span class="glyphicon glyphicon-menu-left"></span> Volver al Listado
</a>
<?php $this->load->view('template/footer'); ?>
