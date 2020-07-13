<?php 
include("conexion.php");
session_start();
$sql = "SELECT idUsuario, nombreUsuario, apellidopUsuario, edadUsuario, sexoUsuario  from usuario where estadoUsuario = 0";
$result = mysqli_query($conexion, $sql);
if(isset($_POST["ver"])) {
  $_SESSION['idUsuario']=$_POST["ver"];
  echo '<script type="text/javascript">
  window.location = "UserVip.php"
       </script>';
}
?>

<html>
<head >
  
<title>VeGreen | Lista Usuarios</title>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="css/bootstrap.css" rel="stylesheet" />
    <link href="css/propio.css" rel="stylesheet" />
    <link href="css/util.css" rel="stylesheet" />
    <!-- TABLA -->
    <!-- Custom styles for this page -->
      <link href="datatables/dataTables.bootstrap4.css" rel="stylesheet" />
    <!--  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script> -->
    <title></title>
</head>
<body>


    <nav class="navbar navbar-light " style="padding-left: 45%; background-color: #3C793B;">
        <a class="navbar-brand text-white p-1 pl-1 pr-2 text-capitalize text-center font-weight-bold align-content-center " href="#">
            <h3>VeGreen
            </h3>
        </a>

        <form class="form-inline ">
          
                <h5 class="mr-sm-2 text-white ">  <b>Cerrar Sesión </b></h5>
            
            <a href="Login.php">
                <img src="img/log-out.png" width="30" height="30" alt="">
            </a>
        </form>
    </nav>
    <div class="mt-5 pr-5 pb-5 " style="width: 100%;">
        <div class="row">
            <div class="col-2">
                <div class="list-group" style="width: 100%;">
                    <a style="margin-bottom: 20px; padding-top: 10px; height: 10%; text-align: center; font-size: 23px; background-color: #3C793B;" href="Lista.php" class="list-group-item list-group-item-action text-white"><b>Dietas</b></a>
                    <a style="margin-bottom: 20px; padding-top: 10px; height: 10%; text-align: center; font-size: 23px; background-color: #3C793B;" href="Listado_VIP.php" class="list-group-item list-group-item-action text-white"><b>Dieta VIP</b></a>
                    <a style="margin-bottom: 20px; padding-top: 10px; height: 10%; text-align: center; font-size: 23px; background-color: #3C793B;" href="Usuarios_VIP.html" class="list-group-item list-group-item-action text-white"><b>Usuarios VIP</b></a>
                </div>
            </div>
            <div class="col-10 border border-dark overflow-auto" style="padding-right: 0px; height:800px; padding-left: 0px; width: 100%;">
                <div>
                    <form action="" method="post">
    
                        <div class="container-fluid" style="margin-top:1%;">
        
                  <!-- Page Heading -->
                
                 
                  <!-- DataTales Example -->
                  <div class="card shadow mb-4">
                    <div class="card-header bg-success py-3">
                      <h6 class="m-0 font-weight-bold text-white">Usuarios Vip</h6>
                    </div>
                    <div class="card-body">
                      <div class="table-responsive">
        
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                          <thead>
                            <tr>
                              <th>ID</th>
                              <th>Nombre</th>
                              <th>Edad</th>
                              <th>Sexo</th>
                              <th></th>
                     
                            </tr>
                          </thead>
                          <tfoot>
                            <tr>
                              <th>ID</th>
                              <th>Nombre</th>
                              <th>Edad</th>
                              <th>Sexo</th>
                              <th></th>
                 
                            </tr>
                          </tfoot>
                          <?php
                        while ($ver = mysqli_fetch_row($result)) {
                        ?>

                          <tr>
                            <td> <?php echo $ver[0] ?> </td>
                            <td> <?php echo $ver[1]; echo " "; echo $ver[2] ?> </td>
                            <td> <?php echo $ver[3] ?> </td>
                            <td> <?php if($ver[4]==1){ echo "Masculino"; }else { echo "Femenino";} ?> </td>
                        
                            <td> <button type="submit" name="ver" value="<?php echo $ver[0] ?>" class="btn btn-success w-100 h-100">Ver Usuario</button>  </td>
                          
                          </tr>

                        <?php
                        }
                        ?>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
        
                </div>
        
            </form>
                </div>
            </div>
        </div>
    </div>
</body>
<!--   <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script> -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://unpkg.com/bootstrap-table@1.14.2/dist/bootstrap-table.min.js"></script>

<script src="js/bootstrap.js"></script>
<script src="jquery/jquery.min.js"></script>
<script src="datatables/jquery.dataTables.min.js"></script>
<script src="datatables/dataTables.bootstrap4.min.js"></script>
<script src="js/datatables-demo.js"></script>
<script src="js/js1.js"></script>
<script src="js/datatables-demo.js"></script>
</html>