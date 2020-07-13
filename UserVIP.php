<?php
include("conexion.php");
session_start();

$sql = "SELECT nombreUsuario, apellidopUsuario, apellidomUsuario, pesoUsuario , alturaUsuario ,sexoUsuario,edadUsuario, patologiaUsuario, habitosUsuario, actividadUsuario from usuario where estadoUsuario = 0 AND idUsuario = " . $_SESSION['idUsuario'];

$result = mysqli_query($conexion, $sql);



if (isset($_POST["Eliminar2"])) {
    $Eliminar = $_POST["Eliminar2"];

    $eli = "UPDATE `dieta_personalizada` SET `Estado` = '1' WHERE `dieta_personalizada`.`idDieta` =" .  $Eliminar;
    $result3 = mysqli_query($conexion, $eli);
} else if (isset($_POST["Editar2"])) {
    $_SESSION['idDieta'] = $_POST["Editar2"];
    echo '<script type="text/javascript">
      window.location = "Dietas_Vip.php"
           </script>';
} else if (isset($_POST["Agregar2"])) {
    $_SESSION['idDieta'] = null;
    echo '<script type="text/javascript">
      window.location = "Dietas_Vip.php"
           </script>';
}

$sql2 = "SELECT idDieta, fechaDieta,descDieta from dieta_personalizada  WHERE Estado=0 AND Usuario_idUsuario = " . $_SESSION['idUsuario'];
$result2 = mysqli_query($conexion, $sql2);

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
                    <div class="card-header  bg-success py-3">
                        <h6 class="m-0 font-weight-bold text-white">Usuarios</h6>
                    </div>
                    <div class="container-contact100">
                        <div class="wrap-contact100">
                            <form class="contact100-form validate-form" method="post" action="">

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
                                        <input class="input100" type="text" disabled name="sexo" placeholder=" " value="<?php if($ver[5]==1){ echo "Masculino"; }else { echo "Femenino";} ?> ">
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
                                <div class="card shadow " style="width:100%;">
                                    <div class="card-header bg-success py-3">

                                        <h6 class="m-0 font-weight-bold text-white ">Lista de Dietas</h6>


                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">

                                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                                <thead>
                                                    <tr>
                                                        <th style="width:10%;">ID</th>
                                                        <th style="width:30%;">Descripcion</th>
                                                        <th style="width:30%;">Fecha</th>
                                                        <th style="width:15%;"></th>
                                                        <th style="width:15%;"></th>

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php 
                                          
                                                    while ($ver = mysqli_fetch_row($result2)) {
                                                    ?>

                                                        <tr>
                                                            <td> <?php echo $ver[0] ?> </td>
                                                            <td> <?php echo $ver[2] ?> </td>
                                                            <td> <?php echo $ver[1] ?> </td>

                                                            <td> <button type="submit" name="Editar2" value="<?php echo $ver[0] ?>" class="btn btn-success w-100 h-100">Editar</button> </td>
                                                            <td> <button type="submit" id="Eliminar2" name="Eliminar2" value="<?php echo $ver[0] ?>" onClick="ConEliminar()" class="btn btn-success w-100 h-100"> Eliminar </button> </td>

                                                        </tr>

                                                    <?php
                                                    }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="pull-right mt-4" style="right:auto;">
                                            <button type="submit" name="Agregar2" class="btn btn-success m-0 ml-5 ">Nueva Dieta</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
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