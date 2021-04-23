<?php
   //conexion con la base de datos
   include_once "dbecommerce.php";
   $con= mysqli_connect($host, $user, $pass, $db);
   
   //Si se le da click al boton con nombre guardar //
    if( isset($_REQUEST['guardar']) ) { 

        //vamos a recibir el dato email con los datos del 'email' o si no recibe nada no mostrar nada//
            $nombre= mysqli_real_escape_string($con,$_REQUEST['nombre']??'' );
            $precio= mysqli_real_escape_string($con,$_REQUEST['precio']??'' );
            $id= mysqli_real_escape_string($con,$_REQUEST['id']??'' );
           
            //guardar en la tabla usuarios los valores que se indican en los casilleros//
            $query = "UPDATE productos SET
        nombre='" . $nombre . "',precio='" . $precio . "'
        where id='".$id."';
        ";
        $res = mysqli_query($con, $query);
         if ($res) {
        echo '<meta http-equiv="refresh" content="0; url=panel.php?modulo=productos&mensaje= Producto '.$nombre.' editado exitosamente" />  ';
        } else {
?>
        <div class="alert alert-danger" role="alert">
            Error al editar el producto <?php echo mysqli_error($con); ?>
        </div>
<?php
}
}
$id= mysqli_real_escape_string($con,$_REQUEST['id']??'');
$query="SELECT id,nombre,precio from productos where id='".$id."'; ";
$res=mysqli_query($con,$query);
$row=mysqli_fetch_assoc($res);
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Editar Producto</h1>
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
                  <form action="panel.php?modulo=editarProducto" method="post">
                      <div class="form-group">
                       <label>Nombre</label>
                       <input type="text" name="nombre" class="form-control" value="<?php echo $row['nombre'] ?>" required="required">         
                    </div>
                    <div class="form-group">
                       <label>Precio</label>
                       <input type="float" name="stock" class="form-control" value="<?php echo $row['precio'] ?>" required="required">         
                    </div>
                    <div class="form-group">
                    <input type="hidden" name="id" value="<?php echo $row=['id'] ?>">
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