<?php $this->load->view('template/header'); ?>
  <h2>Nuevo curso</h2>
  <?php echo form_open('/curso/guardar'); ?>
    <!-- FORMULARIO HACIENDO USO DE ETIQUETAS HTML -->
    <div class="form-group">
      <label for="txt-descripcion">Descripcion:</label>
      <input type="text" id="txt-descripcion" name="descripcion"
             value="<?php echo set_value('descripcion'); ?>"
             placeholder="Ingrese una descripcion"
             class="form-control"/>
      <?php echo form_error('descripcion'); ?>
    </div>

    <!-- FORMULARIO HACIENDO USO DE FUNCIONES CODEIGNITER -->
    <div class="form-group">
      <?php echo form_label('Precio:', 'txt-precio'); ?>
      <?php echo form_input(array('id'=>'txt-precio',
                            'name'=>'precio',
                            'value'=>set_value('precio'),
                            'placeholder'=>'Ingrese un precio',
                            'class'=>'form-control')); ?>
      <?php echo form_error('precio'); ?>
    </div>

    <?php echo form_submit(array('value'=>'Guardar',
    'class'=>'btn btn-primary')); ?>
    <!-- EL BOTON TAMBIEN PUEDE SER UN INPUT HTML -->
  <?php echo form_close(); ?>
  <!-- La funcion set_value() permite mantener los datos ingresado,
  entre llamadas al controlador y la vista, cuando los campos
  son validados -->
<?php $this->load->view('template/footer'); ?>
