<?php 
include("conexion.php");
session_start();

$_SESSION['idDieta'];
$sql = "SELECT * FROM `tips_consejosvip` WHERE Estado=0 AND idDieta=".$_SESSION['idDieta'];
$result = mysqli_query($conexion, $sql);



$sql2 = "SELECT nombreUsuario, apellidopUsuario, apellidomUsuario, pesoUsuario , alturaUsuario ,sexoUsuario,edadUsuario, patologiaUsuario, habitosUsuario, actividadUsuario from usuario where estadoUsuario = 0 AND idUsuario = " . $_SESSION['idUsuario'];

$result2 = mysqli_query($conexion, $sql2);
echo $_SESSION['idDieta'];


if (isset($_POST["Guardar"])) {
    if($_POST['descripcion']==""){
      echo '<script type="text/javascript">
      alert("Debe Escribir un consejo!")</script>';
    }else{
    $Descripcion = $_POST['descripcion'];
    $idDieta = $_SESSION['idDieta'];
    $inser = "INSERT INTO tips_consejosvip (`idTCV`, `descripcionTC`,`idDieta`, `Estado`) VALUES (NULL, '$Descripcion','$idDieta','0') ";
    mysqli_query($conexion, $inser)  or die("<strong>Algo Salio mal con la CONSULTA  </strong>");
    mysqli_close($conexion);
    echo '<script type="text/javascript">
  alert("Nuevo consejo!");
  window.location = "TipsVIP.php"
     </script>';
    }
  } 
  //BORRAR
  
  
  else if (isset($_POST["Eliminar"])) {
    $idTip = $_POST["Eliminar"];
    $eli = "DELETE FROM `tips_consejosvip` WHERE `idTCV` = $idTip";
    $result2 = mysqli_query($conexion, $eli);
    echo '<script type="text/javascript">
    alert("Consejo Eliminado");
  window.location = "TipsVIP.php"
     </script>';
  } else {
  }

?>

<html>
<head runat="server">
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
                    <a style="margin-bottom: 20px; padding-top: 10px; height: 10%; text-align: center; font-size: 23px; background-color: #3C793B;" href="Usuarios_VIP.php" class="list-group-item list-group-item-action text-white"><b>Usuarios VIP</b></a>
                </div>
            </div>
            <div class="col-10 border border-dark overflow-auto" style="padding-right: 0px; height:800px; padding-left: 0px; width: 100%;">
                <div>
                    <div class="col-12 " style="background-color: #28A745; padding: 0px;">

                        <ul class="nav nav-pills mb-1 " id="myTaba" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link btn-success  pl-4 pr-4 text-white" id="pills-dietaVIP" href="Dietas_VIP.php" aria-controls="pills-dieta" aria-selected="false">Dieta VIP</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link  btn-success  text-white" data-toggle="pill" id="pills-usuario-tab" href="#pills-usuario" role="tab" aria-controls="pills-usuario" aria-selected="false">Usuario</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link  btn-success active text-white" data-toggle="pill" id="pills-tips-tab" href="#pills-tips" role="tab" aria-controls="pills-tips" aria-selected="true">Tips y Consejos VIP</a>
                            </li>
                
                        </ul>
                    </div>
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active p-4 " id="pills-tips" role="tabpanel" aria-labelledby="pills-corriente-tab">
                            <form method="post" action="">
                                <div class="card shadow  mb-4">
                                  
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
                      
                
                      <!--  <div class="row col-12  p-0 mb-5" style="display: flex; justify-content: flex-end">
                            <span class="h5 mt-2 mr-3">Borrar Todo</span>
                            <button class="btn btn-success mt-1 mr-1" style="width: 12%; height: 40px;">Eliminar</button>
                
                        </div>
                    -->
                        <div class="row col-11 ml-5 mt-3 mb-3 pt-3 pb-3 pr-0 pl-3 border border-dark ">
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
                        
                
                    <div class="tab-pane fade" id="pills-usuario" role="tabpanel" aria-labelledby="pills-usuario-tab">
                             <div class="container-contact100">
                        <div class="wrap-contact100">
                                <span class="contact100-form-title">
                                    Datos Usuario VIP
                                </span>
                
                                <?php
                                while ($ver = mysqli_fetch_row($result2)) {
                                ?>



                                    <div class="wrap-input100 validate-input bg1" data-validate="">
                                        <span class="label-input100">Nombre Completo</span>
                                        <input class="input100" type="text" disabled name="name" placeholder="" value="<?php echo $ver[0];
                                                                                                                        echo "  ";
                                                                                                                        echo $ver[1];
                                                                                                                        echo " ";
                                                                                                                        echo $ver[2] ?>">
                                    </div>
                                    <div class="wrap-input100 bg1 rs1-wrap-input100">
                                        <span class="label-input100">Peso</span>
                                        <input class="input100" type="text" disabled name="peso" placeholder="" value="<?php echo $ver[3]; ?>">
                                    </div>


                                    <div class="wrap-input100 bg1 rs1-wrap-input100">
                                        <span class="label-input100">Altura</span>
                                        <input class="input100" type="text" disabled name="Altura" placeholder="" value="<?php echo $ver[4]; ?>">
                                    </div>
                                    <div class="wrap-input100 validate-input bg1 rs1-wrap-input100" data-validate="">
                                        <span class="label-input100">Sexo</span>
                                        <input class="input100" type="text" disabled name="sexo" placeholder=" " value="<?php if($ver[5]==1){ echo "Masculino"; }else { echo "Femenino";} ?>">
                                    </div>

                                    <div class="wrap-input100 bg1 rs1-wrap-input100">
                                        <span class="label-input100">Actividad Fisica</span>
                                        <input class="input100" type="text" disabled name="phone" placeholder="" value="<?php echo $ver[9]; ?>">
                                    </div>
                                    <div class="wrap-input100 validate-input bg1 rs1-wrap-input100" data-validate="">
                                        <span class="label-input100">Hábitos(Tabaco, alcohol u otros)</span>
                                        <input class="input100" type="text" disabled name="habitos" placeholder=" " value="<?php echo $ver[8]; ?>">
                                    </div>
                                    <div class="wrap-input100 validate-input bg1 rs1-wrap-input100" data-validate="">
                                        <span class="label-input100">Edad</span>
                                        <input class="input100" type="text" disabled name="Edad" placeholder=" " value="<?php echo $ver[6]; ?>">
                                    </div>
                                    <div class="wrap-input100 validate-input bg0 rs1-alert-validate" data-validate="Please Type Your Message">
                                        <span class="label-input100">Patologias</span>
                                        <textarea class="input100" name="message" disabled placeholder=""><?php echo $ver[7]; ?></textarea>
                                    </div>


                                <?php
                                }
                                ?>
                                </div>
                </div>
                    </div>
                    </div>











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