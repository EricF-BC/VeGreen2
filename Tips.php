<?php 
include("conexion.php");
session_start();

$_SESSION['idDieta'];
$sql = "SELECT * FROM `tipos_consejos` WHERE Estado=0 AND Dieta_idDieta=".$_SESSION['idDieta'];
$result = mysqli_query($conexion, $sql);




if (isset($_POST["Guardar"])) {
  if($_POST['descripcion']==""){
    echo '<script type="text/javascript">
    alert("Debe Escribir un consejo!")</script>';
  }else{
  $Descripcion = $_POST['descripcion'];
  $idDieta = $_SESSION['idDieta'];
  $inser = "INSERT INTO tipos_consejos (`idTC`, `descripcionTC`,`Dieta_idDieta`, `Estado`) VALUES (NULL, '$Descripcion','$idDieta','0') ";
  mysqli_query($conexion, $inser)  or die("<strong>Algo Salio mal con la CONSULTA  </strong>");
  mysqli_close($conexion);
  echo '<script type="text/javascript">
alert("Nuevo consejo!");
window.location = "Tips.php"
   </script>';
  }
} 
//BORRAR


else if (isset($_POST["Eliminar"])) {
  $idTip = $_POST["Eliminar"];
  echo $idTip;
  $eli = "DELETE FROM `tipos_consejos` WHERE `idTC` = $idTip";
  $result2 = mysqli_query($conexion, $eli);
  echo '<script type="text/javascript">
window.location = "Tips.php"
   </script>';
} else {
}

?>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="css/bootstrap.css" rel="stylesheet" />
    <link href="css/propio.css" rel="stylesheet" />
    <link href="css/util.css" rel="stylesheet" />
    <!-- TABLA -->
    <!-- Custom styles for this page -->
      <link href="datatables/dataTables.bootstrap4.css" rel="stylesheet" />
    <!--  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script> -->
    <title> VeGreen | Tips y Consejos</title>
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
                    <a style="margin-bottom: 20px; padding-top: 10px; height: 10%; text-align: center; font-size: 23px; background-color: #3C793B;" href="Usuarios_VIP.php" class="list-group-item list-group-item-action text-white"><b>Usuarios VIP</b></a>
                </div>
            </div>
            <div class="col-10 border border-dark overflow-auto" style="padding-right: 0px; height:800px; padding-left: 0px; width: 100%;">
                <div>
                    <div class="col-12 " style="background-color: #3C793B; padding: 0px;">

                        <ul class="nav nav-pills mb-1 " id="myTaba" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link btn-success pl-4  active pr-4 text-white" id="pills-corriente-tab" href="Dietas.php" aria-controls="pills-dieta" aria-selected="true">Dieta</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link  btn-success    text-white" id="pills-vista-tab" href="Tips.php" role="tab" aria-controls="pills-tips"  aria-selected="false" >Tips y Consejos</a>
                            </li>
                        </ul>
                    </div>
                    <form method="post" action="#">
                 
                                   <div class="card shadow  ml-5 mt-3 mb-5" style="width:92%;">
                            <div class="card-header bg-success py-3">
                        
                              <h6 class="m-0 font-weight-bold text-white ">Tips y consejos</h6>
                                
                            
                            </div>
                            <div class="card-body">
                              <div class="table-responsive">
                
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                  <thead>
                                    <tr>
                                      <th style="width:10%;">ID</th>
                                      <th style="width:60%;">Descripcion</th>
                                      <th style="width:15%;">Dieta</th>
                                      <th style="width:15%;"></th>
                             
                                    </tr>
                                  </thead>
                                  <tbody>
                                  <?php
                        while ($ver = mysqli_fetch_row($result)) {
                        ?>

                                    <tr>
                                    <td> <?php echo $ver[0] ?> </td>
                            <td> <?php echo $ver[1] ?> </td>
                            <td> <?php echo $ver[2] ?> </td>
                                      <td> <button type="submit" id="Eliminar" name="Eliminar"  value="<?php echo $ver[0] ?>" onClick="ConEliminar()" class="btn btn-success w-100 h-100"> Eliminar </button>  </td>
                                    </tr>
                                    <?php
                        }
                        ?>
                                  </tbody>
                                </table>
                              </div>
                            </div>
                          </div>
                        <div class="row col-11 ml-5 mt-1 mb-3 pt-3 pb-3 pr-0 pl-3 border border-dark ">
                            <div class="col-10" style="width: 95%;">
                                <span class="h5">Nuevo Tip o Consejo:</span>
                                <br>
                                <textarea ID="tb5"  name="descripcion" Style="width: 95%; margin-top: 1%; height: 100px; min-height: 100px; max-height: 100px; max-width: 95%; min-width: 95%;" ></textarea>
                            </div>
                
                            <div class="col-2" style="margin-top: 50px; padding-right: 0px; padding-left: 0px; width: 100%;">
                                       <button class="btn btn-success mt-1" type="submit" onClick="ConGuardar" name="Guardar" style="width: 80%; height: 40px; margin-right: 6%;">Guardar</button>
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

</html>