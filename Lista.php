<?php 
include("conexion.php");
session_start();
$sql = "SELECT idDieta, fechaDieta,descDieta,Nutricionista_idNutri  from dieta  WHERE  Estado = 0 AND Nutricionista_idNutri = " . $_SESSION['idNutri'];
$result = mysqli_query($conexion, $sql);

?>

<?php

if (isset ($_POST["Eliminar"])){
$Eliminar = $_POST["Eliminar"];

$eli= "UPDATE `dieta` SET `Estado` = '1' WHERE `dieta`.`idDieta` =".  $Eliminar  ;
$result2 = mysqli_query($conexion, $eli);
}else if(isset($_POST["Editar"])) {
  $_SESSION['idDieta']=$_POST["Editar"];
  echo '<script type="text/javascript">
  window.location = "Dietas.php"
       </script>';
}else if(isset($_POST["Agregar"])) {
  $_SESSION['idDieta']=null;
  echo '<script type="text/javascript">
  window.location = "Dietas.php"
       </script>';
}

?>

<html>
<head>

<title>VeGreen | Lista de Dietas</title>

  <link href="css/bootstrap.css" rel="stylesheet" />
  <link href="css/propio.css" rel="stylesheet" />
  <link href="css/util.css" rel="stylesheet" />
  <link href="datatables/dataTables.bootstrap4.css" rel="stylesheet" />
   <title></title>
</head>

<body>


  <nav class="navbar navbar-light " style="padding-left: 45%; background-color: #3C793B;">
    <a class="navbar-brand text-white p-1 pl-1 pr-2 text-capitalize text-center font-weight-bold align-content-center " href="#">
      <h3>VeGreen
      </h3>
    </a>

    <form>

      <h5 class="mr-sm-2 text-white "> <b>Cerrar Sesión </b></h5>

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
          <a style="margin-bottom: 20px; padding-top: 10px; height: 10%; text-align: center; font-size: 23px; background-color: #3C793B;" href="Usuarios_VIP.php" class="list-group-item list-group-item-action text-white"><b>Usuarios VIP</b></a>
        </div>
      </div>
      <div class="col-10 border border-dark overflow-auto" style="padding-right: 0px; height:800px; padding-left: 0px; width: 100%;">
        <div>

          <form method="post" >
            <div class="card-header bg-success py-3">
              <h6 class="m-0 font-weight-bold text-white">Dietas</h6>
            </div>



            <div class="container-fluid">

              <!-- Page Heading -->


              <!-- DataTales Example -->
              <div class="card shadow mb-4 mt-2">
                <div class="card-header bg-success py-3">
                  <h6 class="m-0 font-weight-bold text-white">Lista de Dietas</h6>
                </div>
                <div class="card-body">
                  <div class="table-responsive">

                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>Fecha</th>
                          <th>Descripción</th>
                          <th></th>
                          <th></th>

                        </tr>
                      </thead>
                      <tfoot>
                        <tr>
                          <th>ID</th>
                          <th>Fecha</th>
                          <th>Descripción</th>
                          <th></th>
                          <th></th>

                        </tr>
                      </tfoot>
                      <tbody>
                        <?php
                        while ($ver = mysqli_fetch_row($result)) {
                        ?>

                          <tr>
                            <td> <?php echo $ver[0] ?> </td>
                            <td> <?php echo $ver[1] ?> </td>
                            <td> <?php echo $ver[2] ?> </td>

                            <td> <button type="submit" name="Editar" value="<?php echo $ver[0] ?>" class="btn btn-success w-100 h-100">Editar</button>  </td>
                            <td> <button type="submit" id="Eliminar" name="Eliminar"  value="<?php echo $ver[0] ?>" onClick="ConEliminar()" class="btn btn-success w-100 h-100"> Eliminar </button>  </td>
                          
                          </tr>

                        <?php
                        }
                        ?>
                      </tbody>
                    </table>
                  </div>
                </div>
                <div class="row mb-3 ml-3">
                  <span class="h5 mt-2 mr-3">Nueva Dieta</span>
                  <button type="submit" name="Agregar"  class="btn btn-success w-25 mt-1 mr-1">Agregar</button>

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