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

<!DOCTYPE html>
<head>
    
    <title>VeGreen | Dietas</title>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="css/bootstrap.css" rel="stylesheet" />
    <link href="css/propio.css" rel="stylesheet" />
    <link href="css/util.css" rel="stylesheet" />
    <!-- TABLA -->
    <!-- Custom styles for this page -->

    <link href="datatables/dataTables.bootstrap4.css" rel="stylesheet" />
    <title></title>
</head>

<body>
<div>a</div>

</body>
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