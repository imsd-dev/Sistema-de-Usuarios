<!DOCTYPE html>
<html>
<head>
	<title>Administración de Usuarios</title>
</head>
<body>

<div id="containerlogin" class="container rounded">
    <div id="row" class="row">
          <div class="col-lg-12 col-sm-12">
          <form class="form-horizontal" id="loginform" name="loginform" action="<?php echo base_url('index.php/usuarios/index')?>" method="POST">   
          <fieldset>
               <legend>Iniciar Sesión</legend>
               <div class="form-group">
               <div class="row colbox">
               <div class="col-lg-4 col-sm-4">
                  <label for="txt_username" class="control-label">Nombre de usuario</label>
               </div>
               <div class="col-lg-8 col-sm-8">
                    <input class="form-control" id="txt_username" name="txt_username" placeholder="" type="text"  value="<?php echo set_value('txt_username'); ?>" />
                    <span class="text-danger"><?php echo form_error('txt_username'); ?></span>
               </div>
               </div>
               </div>
               
               <div class="form-group">
               <div class="row colbox">
               <div class="col-lg-4 col-sm-4">
               <label for="txt_password" class="control-label">Contraseña</label>
               </div>
               <div class="col-lg-8 col-sm-8">
                    <input class="form-control" id="txt_password" name="txt_password" placeholder="" type="password" value="<?php echo set_value('txt_password'); ?>" />
                    <span class="text-danger"><?php echo form_error('txt_password'); ?></span>
               </div>
               </div>
               </div>
                            
               <div class="form-group">
               <div class="col-lg-12 col-sm-12 text-center">
                  <input id="btn_login " name="btn_login" type="submit" class="btn btn" 
                  style="background-color: #34495e; color: white;" value="Iniciar Sesion" />
               </div>
               </div>
          </fieldset>
          </form>
          <?php echo form_close(); ?>
          <?php echo $this->session->flashdata('msg'); ?>
          <?php //echo $this->session->flashdata('err'); ?>
      </div>
  </div>
</body>
</html>