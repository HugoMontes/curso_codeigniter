<?php $this->load->view('template/header'); ?>
<h2>Editar Curso</h2>
<?php if(isset($curso)){ ?>
  <?php echo form_open('/curso/guardar'); ?>
    <?php echo form_hidden('id', $curso->id); ?>
    <div class="form-group">
      <?php echo form_label('Precio:', 'txt-descripcion'); ?>
      <?php echo form_input(array('id'=>'txt-descripcion',
      'name'=>'descripcion',
      'value'=>set_value('descripcion', $curso->descripcion),
      'placeholder'=>'Ingrese una descripcion',
      'class'=>'form-control')); ?>
      <?php echo form_error('descripcion'); ?>
    </div>
    <div class="form-group">
      <?php echo form_label('Precio:', 'txt-precio'); ?>
      <?php echo form_input(array('id'=>'txt-precio',
      'name'=>'precio',
      'value'=>set_value('precio', $curso->precio),
      'placeholder'=>'Ingrese un precio',
      'class'=>'form-control')); ?>
      <?php echo form_error('precio'); ?>
    </div>
    <?php echo form_submit(array('value'=>'Guardar', 'class'=>'btn btn-primary')); ?>
  <?php echo form_close(); ?>
<?php }else{ ?>
  <div class="alert alert-info">No existe el curso...</div>
<?php } ?>
<?php $this->load->view('template/footer'); ?>
