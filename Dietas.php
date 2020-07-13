<?php
include("conexion.php");
session_start();



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
    $inser = "INSERT INTO `dieta` (`idDieta`, `fechaDieta`, `desayunoDieta`, `almuerzoDieta`, `cenaDieta`, `colacionesDieta`,
 `restriccionesDieta`, `autorDieta`, `Nutricionista_idNutri`, `descDieta`, `Estado`) 
 VALUES (NULL, (Now()), '$Desayuno', '$Almuerzo', '$Cena', '$Colacion', '$Restriccion' ,'$nombre','$id','$Descripcion', '0')";
    mysqli_query($conexion, $inser)  or die("<strong>Algo Salio mal con la CONSULTA  </strong>");
    mysqli_close($conexion);
    echo '<script type="text/javascript">
alert("Dieta Creada!");
window.location = "Lista.php"
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
    $idDieta = $_SESSION['idDieta'];
    $actua = "UPDATE `dieta` SET `desayunoDieta` = '$Desayuno', `almuerzoDieta`='$Almuerzo', `cenaDieta`='$Cena', `colacionesDieta`='$Colacion', `restriccionesDieta`='$Restriccion',
`descDieta`='$Descripcion' WHERE idDieta ='$idDieta'";
    mysqli_query($conexion, $actua)  or die("<strong>Algo Salio mal con la CONSULTA  </strong>");
    mysqli_close($conexion);
    echo '<script type="text/javascript">
alert("Dieta Cambiada!");
window.location = "Lista.php"
     </script>';
} 



//BORRAR
else if (isset($_POST["Borrar"])) {
    $eli = "UPDATE `dieta` SET `Estado` = '1' WHERE `dieta`.`idDieta` =" .  $_SESSION["idDieta"];
    $result2 = mysqli_query($conexion, $eli);
    echo '<script type="text/javascript">
window.location = "Lista.php"
     </script>';
} else {
}




?>



<html>

<head>
    
<title>VeGreen | Dietas</title>

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
    <nav class="navbar navbar-light " style="padding-left: 45%; padding-top: 0%; margin-top: 0%; background-color: #3C793B;">
        <a class="navbar-brand text-white p-1 pl-1 pr-2 text-capitalize text-center font-weight-bold align-content-center " href="#">
            <h3>VeGreen
            </h3>
        </a>

        <form class="form-inline ">

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
                    <a style="margin-bottom: 20px; padding-top: 10px; height: 10%; text-align: center; font-size: 23px; background-color: #3C793B;" href="Listado_VIP.php" class="list-group-item list-group-item-action text-white"><b>Dieta
                            VIP</b></a>
                    <a style="margin-bottom: 20px; padding-top: 10px; height: 10%; text-align: center; font-size: 23px; background-color: #3C793B;" href="Usuarios_VIP.html" class="list-group-item list-group-item-action text-white"><b>Usuarios
                            VIP</b></a>
                </div>
            </div>
            <div class="col-10 border border-dark overflow-auto" style="padding-right: 0px; height:800px; padding-left: 0px; width: 100%;">


                <div class="col-12 " style="background-color: #28A745; padding: 0px;">

                    <ul class="nav nav-pills mb-1 " id="myTaba" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link btn-success active pl-4 pr-4 text-white" id="pills-corriente-tab" href="Dietas.html" aria-controls="pills-dieta" aria-selected="true">Dieta</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link  btn-success  text-white" id="pills-vista-tab" href="Tips.aspx" role="tab" aria-controls="pills-tips" aria-selected="false">Tips y Consejos</a>
                        </li>
                    </ul>
                </div>
                <div class="col-12 tab-pane fade show active p-1 mt-1 mr-5 ml-1 rounded rounded-2 ">
                    <form action="" method="post">
                        <div class="row col-12">
                            <div class="col-10 " style="padding-right: 15px; margin-top: 1%; padding-left: 5px; width: 100%;">
                                <div class="col-12 m-3" style="width: 95%;">
                                    <?php
                                    if (isset($_SESSION['idDieta'])) {
                                        $sql1 = "SELECT * FROM `dieta` WHERE idDieta =" . $_SESSION['idDieta'];
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