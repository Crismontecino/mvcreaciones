<?php
   //Si se le da click al boton con nombre guardar //
    if( isset($_REQUEST['guardar']) ) {
        include_once "dbecommerce.php";
        $con= mysqli_connect($host, $user, $pass, $db); 

        //vamos a recibir el dato nombre con los datos del 'nombre' o si no recibe nada no mostrar nada//
            $nombre= mysqli_real_escape_string($con,$_REQUEST['nombre']??'' );
            $precio= mysqli_real_escape_string($con,$_REQUEST['precio']??'' );
           //insertar en la tabla productos los valores que se indican en los casilleros//
            $query= "INSERT INTO productos
            (nombre, precio) VALUES
            ('".$nombre."', '".$precio."');            
            ";
            $res= mysqli_query($con,$query);
            if ($res){
              echo '<meta http-equiv="refresh" content="0; url=panel.php?modulo=productos&mensaje=Producto creado editado exitosamente :)" /> ';
          } else{
?>
         <div class="alert alert-danger" role="alert">
         Error al crear el producto :( <?php echo mysqli_error($con);?>
         </div> 
<?php
    }
  }
?>          

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Crear Producto</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <!-- /.card-header -->
              <div class="card-body">
                  <form action="panel.php?modulo=crearProducto" method="post">
                      <div class="form-group">
                       <label>Nombre</label>
                       <input type="text" name="nombre" class="form-control"  required="required">         
                    </div>
                    <div class="form-group">
                       <label>Precio</label>
                       <input type="float" name="precio" class="form-control"  required="required">         
                    </div>
                    <div class="form-group">
                       <button type="submit" class="btn btn-primary" name="guardar">Guardar</button>         
                    </div>
                  </form>
              </div>
              <!-- /.card-body -->
            </div>          
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>