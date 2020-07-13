<?php
include("conexion.php");
session_start();
$idUser= $_SESSION['idUsuario'];
$idDieta=$_SESSION['idDieta'];

$sql = "SELECT nombreUsuario, apellidopUsuario, apellidomUsuario, pesoUsuario , alturaUsuario ,sexoUsuario,edadUsuario, patologiaUsuario, habitosUsuario, actividadUsuario from usuario where estadoUsuario = 0 AND idUsuario = " . $_SESSION['idUsuario'];

$result = mysqli_query($conexion, $sql);
//GUARDAR
if (isset($_POST["Guardar"])) {
    echo "Guardar";
    $Desayuno = $_POST['Desayuno'];
    $Almuerzo = $_POST['Almuerzo'];
    $Cena = $_POST['Cena'];
    $Colacion = $_POST['Colacion'];
    $Restriccion = $_POST['Restriccion'];
    $Descripcion = $_POST['Descripcion'];
    $id = $_SESSION['idNutri'];
    $nombre = $_SESSION['nombreNutri'];
    $inser = "INSERT INTO `dieta_personalizada` (`idDieta`, `fechaDieta`, `desayunoDieta`, `almuerzoDieta`, `cenaDieta`, `colacionesDieta`,
 `restriccionesDieta`, `autorDieta`, `descDieta`,  `Estado`, `Nutricionista_idNutri`,`Usuario_idUsuario` ) 
 VALUES (NULL, (Now()), '$Desayuno', '$Almuerzo', '$Cena', '$Colacion', '$Restriccion' ,'$nombre','$Descripcion','0', '$id','$idUser')";
    mysqli_query($conexion, $inser)  or die("<strong>Algo Salio mal con la CONSULTA  </strong>");
    mysqli_close($conexion);
    echo '<script type="text/javascript">
alert("Dieta Creada!");
window.location = "UserVIP.php"
     </script>';
} 



//Acualizar
else if (isset($_POST["Actualizar"])) {
    echo "Actualizar";
    $Desayuno = $_POST['Desayuno'];
    $Almuerzo = $_POST['Almuerzo'];
    $Cena = $_POST['Cena'];
    $Colacion = $_POST['Colacion'];
    $Restriccion = $_POST['Restriccion'];
    $Descripcion = $_POST['Descripcion'];
    $id = $_SESSION['idNutri'];
    $actua = "UPDATE `dieta_personalizada` SET `desayunoDieta` = '$Desayuno', `almuerzoDieta`='$Almuerzo', `cenaDieta`='$Cena', `colacionesDieta`='$Colacion', `restriccionesDieta`='$Restriccion',
`descDieta`='$Descripcion' WHERE idDieta ='$idDieta'";
    mysqli_query($conexion, $actua)  or die("<strong>Algo Salio mal con la CONSULTA  </strong>");
    mysqli_close($conexion);
    echo '<script type="text/javascript">
alert("Dieta Cambiada!");
window.location = "UserVIP.php"
     </script>';
} 



//BORRAR
else if (isset($_POST["Borrar"])) {
    $eli = "UPDATE `dieta_personalizada` SET `Estado` = '1' WHERE `dieta_personalizada`.`idDieta` =" .  $Eliminar;
    $result3 = mysqli_query($conexion, $eli);
    echo '<script type="text/javascript">
window.location = "UserVIP.php"
     </script>';
} else {
}



?>

<html>
<head runat="server">
    
<title>VeGreen | Dietas VIP</title>

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
                    <div class="col-12 " style="background-color: #28A745; padding: 0px;">

                        <ul class="nav nav-pills mb-1 " id="myTaba" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link btn-success active pl-4 pr-4 text-white" id="pills-dieta-tab" data-toggle="pill" href="#pills-dieta"  aria-controls="pills-dieta" aria-selected="true">Dieta VIP</a>
                            </li>
                             <li class="nav-item">
                                <a class="nav-link  btn-success  text-white" id="pills-usuario-tab" data-toggle="pill" href="#pills-usuario" role="tab" aria-controls="pills-usuario" aria-selected="false">Usuario</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link  btn-success  text-white" id="pills-tips" href="TipsVIP.html" role="tab" aria-controls="pills-tips" aria-selected="false">Tips y Consejos VIP</a>
                            </li>
                           
                        </ul>
                    </div>
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active " id="pills-dieta" role="tabpanel" aria-labelledby="pills-corriente-tab">
                            <div class="col-12 tab-pane fade show active p-1 mt-1 mr-5 ml-1 rounded rounded-2 ">
                    <form action="" method="post">
                        <div class="row col-12">
                            <div class="col-10 " style="padding-right: 15px; margin-top: 1%; padding-left: 5px; width: 100%;">
                                <div class="col-12 m-3" style="width: 95%;">
                                    <?php
                                    if (isset($_SESSION['idDieta'])) {
                                        $sql1 = "SELECT * FROM dieta_personalizada WHERE idDieta = '$idDieta' AND Usuario_idUsuario = '$idUser'";
                                        $resulta = mysqli_query($conexion, $sql1);
                                        while ($Dieta = mysqli_fetch_row($resulta)) {
                                    ?>
                                            <span class="h5">Desayuno</span>
                                            <br>
                                            <textarea name="Desayuno" ID="tb5" Style="width: 95%; margin-top: 1%; height: 150px; min-height: 150px; max-height: 150px; max-width: 95%; min-width: 95%;"> <?php echo $Dieta[2] ?></textarea>
                                            <br>
                                            <span class="h5">Almuerzo</span>
                                            <br>
                                            <textarea name="Almuerzo" ID="TextBox1" Style="width: 95%; margin-top: 1%; height: 150px; min-height: 150px; max-height: 150px; max-width: 95%; min-width: 95%;" TextMode="multiline"> <?php echo $Dieta[3] ?> </textarea>
                                            <div class="row p-3">
                                                <div class="w-50">
                                                    <span class="h5">Cena</span>
                                                    <br>
                                                    <textarea name="Cena" ID="TextBox2" Style="width: 90%; margin-top: 1%; height: 150px; min-height: 150px; max-height: 150px; max-width: 90%; min-width: 90%;" TextMode="multiline"> <?php echo $Dieta[4] ?></textarea>
                                                </div>
                                                <div class="w-50">
                                                    <span class="h5">Colación</span>
                                                    <br>
                                                    <textarea name="Colacion" ID="TextBox3" Style="width: 90%; margin-top: 1%; height: 150px; min-height: 150px; max-height: 150px; max-width: 90%; min-width: 90%;" TextMode="multiline"> <?php echo $Dieta[5] ?></textarea>
                                                </div>

                                            </div>
                                            <div class="row p-3">
                                                <div class="w-50">
                                                    <span class="h5">Restricciones</span>
                                                    <br>
                                                    <textarea name="Restriccion" ID="TextBox2" Style="width: 90%; margin-top: 1%; height: 150px; min-height: 150px; max-height: 150px; max-width: 90%; min-width: 90%;" TextMode="multiline"><?php echo $Dieta[6] ?></textarea>
                                                </div>
                                                <div class="w-50">
                                                    <span class="h5">Descripción</span>
                                                    <br>
                                                    <textarea name="Descripcion" ID="TextBox3" Style="width: 90%; margin-top: 1%; height: 150px; min-height: 150px; max-height: 150px; max-width: 90%; min-width: 90%;" TextMode="multiline"><?php echo $Dieta[9] ?></textarea>
                                                </div>

                                            </div>


                                        <?php
                                        }
                                    } else {
                                        ?>
                                        <span class="h5">Desayuno</span>
                                        <br>
                                        <textarea name="Desayuno" ID="tb5" Style="width: 95%; margin-top: 1%; height: 150px; min-height: 150px; max-height: 150px; max-width: 95%; min-width: 95%;" required> </textarea>
                                        <br>
                                        <span class="h5">Almuerzo</span>
                                        <br>
                                        <textarea name="Almuerzo" ID="TextBox1" Style="width: 95%; margin-top: 1%; height: 150px; min-height: 150px; max-height: 150px; max-width: 95%; min-width: 95%;" TextMode="multiline" required> </textarea>
                                        <div class="row p-3">
                                            <div class="w-50">
                                                <span class="h5">Cena</span>
                                                <br>
                                                <textarea name="Cena" ID="TextBox2" Style="width: 90%; margin-top: 1%; height: 150px; min-height: 150px; max-height: 150px; max-width: 90%; min-width: 90%;" TextMode="multiline" required></textarea>
                                            </div>
                                            <div class="w-50">
                                                <span class="h5">Colación</span>
                                                <br>
                                                <textarea name="Colacion" ID="TextBox3" Style="width: 90%; margin-top: 1%; height: 150px; min-height: 150px; max-height: 150px; max-width: 90%; min-width: 90%;" TextMode="multiline" required></textarea>
                                            </div>

                                        </div>
                                        <div class="row p-3">
                                            <div class="w-50">
                                                <span class="h5">Restricciones</span>
                                                <br>
                                                <textarea name="Restriccion" ID="TextBox2" Style="width: 90%; margin-top: 1%; height: 150px; min-height: 150px; max-height: 150px; max-width: 90%; min-width: 90%;" TextMode="multiline" required></textarea>
                                            </div>
                                            <div class="w-50">
                                                <span class="h5">Descripción</span>
                                                <br>
                                                <textarea name="Descripcion" ID="TextBox3" Style="width: 90%; margin-top: 1%; height: 150px; min-height: 150px; max-height: 150px; max-width: 90%; min-width: 90%;" TextMode="multiline" required></textarea>
                                            </div>

                                        </div>
                                    <?php
                                    }

                                    ?>




                                    <br>
                                </div>
                            </div>

                            <div class="col-2 ">

                                <div class="list-group border-dark border  p-2" style="padding-right: 0px; margin-top: 80%; padding-left: 0px; width: 100%;">
                                <?php if(isset($_SESSION['idDieta'])){ ?>
                                    <button style="margin-bottom: 10%; margin-top: 10%; text-align: center; background-color: #3C793B;" class="list-group-item  border border-dark  text-white list-group-item-action" disabled name="Guardar" type="submmit">Guardar</button>
                                <?php } else{ ?>  
                                    <button style="margin-bottom: 10%; margin-top: 10%; text-align: center; background-color: #3C793B;" class="list-group-item  border border-dark  text-white list-group-item-action" name="Guardar" type="submmit">Guardar</button>
                                    <?php } ?>


                                    <?php if(isset($_SESSION['idDieta'])){ ?>
                                        <button style="margin-bottom: 10%; text-align: center; background-color: #3C793B;" class="list-group-item  border border-dark  text-white list-group-item-action" name="Actualizar" type="submmit"> Actualizar</button> 
                                            <?php } else{ ?>  
                                                <button style="margin-bottom: 10%; text-align: center; background-color: #3C793B;" class="list-group-item  border border-dark  text-white list-group-item-action" disabled name="Actualizar" type="submmit"> Actualizar</button>
                                    <?php } ?>
                                    <?php if(isset($_SESSION['idDieta'])){ ?>
                                        <button style="margin-bottom: 10%; text-align: center; background-color: #3C793B;" class="list-group-item  border border-dark  text-white list-group-item-action" name="Borrar" type="submmit">Borrar</button> 
                                            <?php } else{ ?>  
                                                <button style="margin-bottom: 10%; text-align: center; background-color: #3C793B;" class="list-group-item  border border-dark  text-white list-group-item-action"  disabled name="Borrar" type="submmit">Borrar</button>
                                    <?php } ?>
                                 </div>
                            </div>
                        </div>
                    </form>
                </div>
                            </div>
                          <div class="tab-pane fade" id="pills-usuario" role="tabpanel" aria-labelledby="pills-usuario-tab">
                              <div class="container-contact100">
                        <div class="wrap-contact100">
                                <span class="contact100-form-title">
                                    Datos Usuario VIP
                                </span>
                                <?php
                                while ($ver = mysqli_fetch_row($result)) {
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
<script src="js/js1.js"></script>
<script src="js/transfer.js"></script>
</html>