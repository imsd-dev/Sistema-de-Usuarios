<!DOCTYPE html>
<html>
<head>
	<title>Administración de Usuarios</title>
	<!-- Responsivo !-->
	<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
	<!-- Favicon !-->
	<link href="loguito.png" rel="shortcut icon" type="image/png">
	<!-- Bootstrap !-->
 	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    <!-- Iconos !-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.6.3/css/all.css' integrity='sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/' crossorigin='anonymous'>
    <!-- Estilos !-->
    <style type="text/css">
        body{
           background-color: #34495e;
           font-family: Arial;
        }
       	h2{
            color: #ecf0f1;
            font-size: 38px;
            font-family: inherit;
            margin-top: 20px;
            margin-left:  20px;
            margin-bottom: 0px;          
            font-weight: 700;
            line-height: 1.1;
         }

         #tutilo {
            color: #ecf0f1;
            font-size: 28px;
            margin-top: 5px;
            margin-left:  20px;
            font-weight: 400;
         }
         #tutilo2 {
            color: #ecf0f1;
            margin-top: 70px;
            margin-left:  20px;
            font-weight: 400;
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
        @media only screen and (min-width: 1578px) {
       
          #divpagina{
            width: 100%; 
           
            max-width: 1260px;
          }
         }
         @media only screen and (min-width: 400px) {
              #cerrarsesion{
                margin-right:  13px;
                float: right;
              }

              #agregarsolicitud{
                margin-right:  13px;
                float: right;
              }
          }
    </style>

    <script type="text/javascript">   
      $(document).ready(function () {
          $('#entradafilter').keyup(function () {
           var rex = new RegExp($(this).val(), 'i');
            $('.contenidobusqueda tr').hide();
            $('.contenidobusqueda tr').filter(function () {
                return rex.test($(this).text());
            }).show();

         })          

      });

      $(document).ready(function() { 
        $("table") 
        .contenidobusqueda({widthFixed: true, widgets: ['zebra']}) 
        .contenidobusquedaPager({container: $("#pager")}); 
      }); 
    </script>
</head>
<body>
   <div class="container" >
      <div class="row">
        <div  class="form-group" style="float: right; width: 60% ">
          <h2>Administración de Usuarios</h2>
          <h4 id="tutilo">Lista de Funcionarios</h4>         
        </div>

        <div class="form-group" style="float: left;  ">
           <h6 id="tutilo2"  >Bienvenido(a): <?php echo $user->nombres.' '.$user->apellido_paterno.' '.$user->apellido_materno; ?></h6>
        </div>
      </div>
   </div>
   <hr/>

   <?php $nivel= $this->session->userdata('nivel'); ?>
<div  class="container" id="divpagina">
    <div class="card bg-light text-secondary card-body btn-group btn-group-justified" style="width: 100%">  	 
        <div class="btn-group btn-group-lg " style="width: 100%" role="group">
        	<input id="entradafilter" type="text" class="form-control" placeholder="Buscador de funcionarios" >
		    <legend> 

		    <a id="cerrarsesion" href="<?php echo base_url('usuarios/logout');?>" class="btn btn-danger">Cerrar Sesión</a>
		    <button id="agregarsolicitud" data-toggle="modal" data-target="#agregar" class="btn btn-info">Agregar funcionario</button>
		    </legend> 
        </div>  
    </div>       

<!--Agregar-->	
<?php
	if($this->session->flashdata('divAgregar')){
?>	
	<script type="text/javascript">		
		$(document).ready(function() { 
		   $("#agregar").modal("show");
		}); 
	</script>				
<?php		
	}
?>

<!-- The Modal -->
	<div class="modal fade" id="agregar" tabindex="-1">
	    	<div class="modal-dialog modal-lg">
	      		<div class="modal-content">
			        <!-- Modal Header -->
			        <div class="modal-header">
			          <h4 class="modal-title">Agregar funcionario</h4>
			          <button type="button" class="close" data-dismiss="modal">&times;</button>
			        </div>
			        <!--
						<label>Rut </label>&nbsp;&nbsp;
						<input type="text" name="txtrut" class="form-control" style="width: 30%"  required pattern="^([0-9]+)$" maxlength="8" Title="El formato del rut debe ser 12345678">	&nbsp;&nbsp;
						
						<label>-</label>&nbsp;&nbsp;
						<input type="text" name="txtrut" class="form-control" style="width: 10%"  required pattern="^([0-9kK])$" maxlength="1" Title="El formato del rut debe ser 12345678-9">&nbsp;&nbsp;
						
						<label >Nombres</label> 
						<input name="txtnombres"  class="form-control"  required pattern="[a-zA-ZñÑ\s\W]+"title=" El nombre debe ser solo letras"></input>	&nbsp;&nbsp;
						<label for="description" >Apellido P</label>&nbsp;&nbsp;			
						<input name="txtAp" class="form-control"  required pattern="[a-zA-ZñÑ\s\W]+" title=" El Apellido Paterno debe ser solo letras" ></input>&nbsp;&nbsp;
						<label for="description" >Apellido M</label>&nbsp;&nbsp;		
						<input name="txtAm" class="form-control"   required pattern="[a-zA-ZñÑ\s\W]+" title=" El Apellido Materno debe ser solo letras"></input>&nbsp;&nbsp;
			         -->
			        <!-- Modal body -->
			        <form action="<?php echo base_url('usuarios/agregarpersona') ?>" method="post">
					<div class="modal-body">
						
							<div class="form-inline" style="text-align: left;">
								<label style="width: 20%; justify-content: left;">Rut </label>&nbsp;&nbsp;
								<input type="text" name="txt_rut" class="form-control" style="width: 15%"  required pattern="^([0-9]+)$" maxlength="8" Title="El formato del rut debe ser 12345678">	&nbsp;&nbsp;
								
								<label>-</label>&nbsp;&nbsp;
								<input type="text" name="txt_dv" class="form-control" style="width: 5%; "  required pattern="^([0-9kK])$" maxlength="1" Title="El formato del rut debe ser 12345678-9" >&nbsp;&nbsp; 

								<label style="width: 20%; margin-right: 20px ">Nombres</label>&nbsp;&nbsp; 
								<input name="txt_nombres"  class="form-control"  required pattern="[a-zA-ZñÑ\s\W]+"title=" El nombre debe ser solo letras"></input>	&nbsp;&nbsp;
							</div>
							<br>
							<div class="form-inline">
								
								<label style="width: 20%;justify-content: left;" >Apellido Paterno</label>&nbsp;&nbsp;		
								<input name="txt_ap" class="form-control"  required pattern="[a-zA-ZñÑ\s\W]+" title=" El Apellido Paterno debe ser solo letras" ></input>&nbsp;&nbsp;
							 
								<label style="width: 20%;  " >Apellido Materno</label>&nbsp;&nbsp;		
								<input name="txt_am" class="form-control"   required pattern="[a-zA-ZñÑ\s\W]+" title=" El Apellido Materno debe ser solo letras"></input>&nbsp;&nbsp;
							</div>
							<br>
							<div class="form-inline">
								
								<label style="width: 20%;justify-content: left;" >Departamento</label>&nbsp;&nbsp;			
								<select class="form-control"   name="txt_departamento" style="width: 73%">
				                    <option > Selecciona un departamento</option> 
				                    <?php 				                       
				                      foreach($deptos as $depto){
				                         
				                      ?>   
				                        <option value="<?php echo $depto->id;?>" ><?php echo $depto->nombre;?></option>

				                      <?php
				                      }
				                    ?>                                             
				                </select>
							</div>
							<br>
							<div class="form-inline">
								<label style="width: 20%; justify-content: left;">Cargo / Función </label>&nbsp;&nbsp;
								<input type="text" name="txt_cargo" class="form-control" style="width: 73%" required pattern="[a-zA-ZñÑ\s\W]+">	&nbsp;&nbsp;
								
							</div>
							<br>
							<div class="form-inline">								
								<label style="width: 20%;justify-content: left;" >E-mail</label>&nbsp;&nbsp;		
								<input name="txt_email" class="form-control" type="email" required title="" ></input>&nbsp;&nbsp;	
								<input name="txt_estado" class="form-control" value="Activo" hidden=""  ></input>
								<label style="width: 20%; ">Teléfono </label>&nbsp;&nbsp;
								<input type="text" name="txt_telefono" class="form-control"   required pattern="^([0-9]+)$" maxlength="9" Title="El formato del teléfono debe ser 912345678">	&nbsp;&nbsp;
							</div>
							<br>
							 
							<div class="radio">
								<label style="width: 20%;justify-content: left;" >Sexo</label>&nbsp;&nbsp;	
				                <label style="padding-right: 20px">
				                	<input type="radio" id="txt_sexo" name="txt_sexo"  value="Masculino" required> Masculino
				                </label>
				                <label >
				                	<input type="radio" id="txt_sexo" name="txt_sexo" value="Femenino" required > Femenino
				                </label>
				            </div>

				            <div class="form-inline">
								<label style="width: 20%; justify-content: left;">Tipo de persona </label>&nbsp;&nbsp;
								<input type="text" name="txt_tipo" class="form-control" required pattern="[a-zA-ZñÑ\s\W]+" >	&nbsp;&nbsp;
								<label  >Foto: </label>&nbsp;&nbsp;
								
								<input type="file" name="txt_foto"  multiple accept='image/*'>
							</div>
						

					</div>
					<!-- Modal footer -->
			        <div class="modal-footer">
			          <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
			          <button type="submit" class="btn btn-info"   name="btnSave">Guardar</button>
			        </div>
		        </form>
	      		</div>
	    	</div>
	</div>
	<div class="modal fade" id="agregars" tabindex="-1"  >
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">Añadir Niños</h4>
				
			<?php echo $this->session->flashdata('msg'); ?>

			</div>
				
			</div>
		</div>
	</div>

<!-- ********** Mensajes *********** -->
	<div style="width: 100%">
	      <br>
	        <?php
	          if($this->session->flashdata('add_msg')){
	          ?>
	            <div class="alert alert-danger alert-dismissible fade show">
	             <button type="button" class="close" data-dismiss="alert">&times;</button>
	              <?php echo $this->session->flashdata('add_msg'); ?>
	            </div>
	          <?php   
	            }
	          ?>

	          <?php
	            if($this->session->flashdata('success_msg')){
	          ?>
	            <div class="alert alert-info alert-dismissible fade show">
	             <button type="button" class="close" data-dismiss="alert">&times;</button>
	              <?php echo $this->session->flashdata('success_msg'); ?>
	            </div>
	          <?php   
	            }
	          ?>


	          <?php
	            if($this->session->flashdata('error_msg')){
	          ?>
	            <div class="alert alert-danger alert-dismissible fade show">
	              <button type="button" class="close" data-dismiss="alert">&times;</button>
	              <?php echo $this->session->flashdata('error_msg'); ?>
	            </div>
	          <?php   
	            }
	          ?>
	</div>
<!-- ********** Tabla *********** -->
	<div class=" table-responsive" style="font-size: 13px">
	    <table class="table table-secondary  table-striped rounded">
	       <thead>
	             <tr>                
	                <th>Funcionario 	</th>                 
	                <th>Rut 			</th>
	                <th>Departamento 	</th>
	                <th>Dirección		</th>
	                <th>Credencial	    </th>
	                <th>Acciones		</th>	                
	             </tr>
	        </thead>
	        <tbody  class="contenidobusqueda">
	           <?php 
	           if($funcionarios){
	             foreach($funcionarios as $funcionario){
	               $rut= $funcionario->rut;
	           ?>  
	           <tr>
		            <td><?php echo $funcionario->nombres.' '.$funcionario->apellido_paterno.' '.$funcionario->apellido_materno;?></td>   
		            <td><?php echo $funcionario->rut.'-'.$funcionario->dv;?></td>   
		            <td><?php echo $funcionario->departamento ;?></td>
		            <td><?php echo $funcionario->direccion;?></td>	
		            <td>
		           	<a href="http://sistemas.santodomingo.cl/credenciales/funcionario/rut/<?php echo $rut; ?>" target="_blank" class="btn btn-dark"  >
		           		<i class="fa fa-id-card"></i>
		           	</a>
		            </td>	              
		            <td>
		            	<a href="<?php //echo base_url('/usuarios/edite/'.$rut); ?>" class="btn btn-success">
		            		<i class="fa fa-edit"></i>

		            	</a>
		            </td>
		            <td>          
		            	<a target="_blank" href="<?php  //echo base_url('/usuarios/mpdf/'.$rut);?>" class="btn btn-primary"> 
		            		<i class="fa fa-user"></i>
		            	</a> 
		           </td>
	           </tr>
	           <?php
	             }
	           }
	            ?>
	              
	        </tbody>
	    </table>
	</div>

</div>

</body>
</html>