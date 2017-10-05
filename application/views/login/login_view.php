<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Login</title>
  <!-- Bootstrap core CSS -->
  <link href="<?php echo base_url();?>resources/css/bootstrap.min.css" rel="stylesheet">
  <!-- Login CSS -->
  <link href="<?php echo base_url();?>resources/css/login.css" rel="stylesheet">
</head>
<body>
  <div class="container">
    <?php echo form_open('login', array('class'=>'form-signin')); ?>
      <h2 class="form-signin-heading">Iniciar sesi&oacute;n</h2>
      <?php if(validation_errors()){ ?>
        <div class="alert alert-danger" role="alert">
          <?php echo validation_errors(); ?>
        </div>
      <?php } ?>
      <?php if($this->session->flashdata('error')){?>
        <div class="alert alert-danger">
          <?php echo $this->session->flashdata('error'); ?>
        </div>
      <?php } ?>
      <?php if($this->session->flashdata('info')){?>
        <div class="alert alert-info">
          <?php echo $this->session->flashdata('info'); ?>
        </div>
      <?php } ?>
      <?php echo form_label('Usuario', 'txt-usename', array('class'=>'sr-only')); ?>
      <?php echo form_input(array('id'=>'txt-username',
                                  'name'=>'username',
                                  'value'=>set_value('username'),
                                  'placeholder'=>'Usuario',
                                  'class'=>'form-control')); ?>
      <span style="color:red;"><?php echo form_error('username'); ?></span>
      <?php echo form_label('Password', 'txt-password', array('class'=>'sr-only')); ?>
      <?php echo form_password(array('id'=>'txt-password',
                                    'name'=>'password',
                                    'value'=>set_value('password'),
                                    'placeholder'=>'Password',
                                    'class'=>'form-control')); ?>
      <span style="color:red;"><?php echo form_error('password'); ?></span>
      <button class="btn btn-lg btn-primary btn-block" type="submit">
        <span class="glyphicon glyphicon-log-in" aria-hidden="true"></span> Ingresar
      </button>
    <?php echo form_close(); ?>
  </div> <!-- /container -->
</body>
</html>
