
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>

  <title>Inicio de sesión</title>    
    
  <style type="text/css">
      body{
         background-color: #34495e; 
         font-family: Arial;
      }
      h2{
         color: #ecf0f1;
         font-size: 38px;
         margin-top: 20px;
      }
      h4 {
         color: #ecf0f1;
         font-size: 28px;
      }
        
      #containerlogin{
        background-color: #F5F5F5;
        color: #34495e;
        max-width: 600px;
      }
      
      #row{
        
        padding: 20px;
        width: 100%;

      }

       @media screen and (max-width: 400px) {
          h2 { 
            font-size :33px;
          }
          h4{
            font-size :19px;
          }
         }

         hr {
              margin-top: 20px;
              margin-bottom: 20px;
              margin-right: 70px;
              margin-left: 70px;
              border: 0;
              border-top-color: currentcolor;
              border-top-style: none;
              border-top-width: 0px;
              border-top: 1px solid #eee;
          }
  </style>
</head>
<body >
<div class="container" >
     <div class="row" style="margin-left: 30px;">
             <div  class="form-group">
               <h2>Sistema de Usuarios</h2>
               <h4>Ingrese Sesión para entrar al sitio</h4>
          
          </div>
     </div>
</div>
<hr/>

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
         
          <?php echo $this->session->flashdata('msg'); ?>          
      </div>
  </div>
 </div>
</body>

</html>