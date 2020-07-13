<?php  include("conexion.php"); 
session_start();
$id;
$pass;

@$id=$_POST['user'];
@$pass=$_POST['pass'];

echo $id;
if (isset ($id)){

	$consu = "SELECT * FROM nutricionista WHERE idNutri = '".$id."' AND contraseñaNutri = '".$pass."' ";

	$resul = mysqli_query($conexion,$consu) or die ("<strong>Algo Salio mal con la CONSULTA  </strong>"); 

	$encontrados = mysqli_num_rows($resul);
	


	if($encontrados > 0){

		$filaEncontrada = mysqli_fetch_assoc($resul);
		$_SESSION['idNutri']=$filaEncontrada['idNutri'];
		$_SESSION['contraseñaNutri']=$filaEncontrada['contraseñaNutri'];
		$_SESSION['nombreNutri']=$filaEncontrada['nombreNutri'];
		$_SESSION['apellidopNutri']=$filaEncontrada['apellidopNutri'];

		echo '<script type="text/javascript">
		window.location = "lista.php"
   			</script>';

	}else{
	
	echo '<script type="text/javascript">
			   window.location = "Login.php"
		  </script>';
	}
}
?>



<html>
<head >
<title>VeGreen | Login</title>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="css/bootstrap.css" rel="stylesheet" />
    <link href="css/propio.css" rel="stylesheet" />
    <link href="css/util.css" rel="stylesheet" />

    <link href="assets/img/Logo.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
  <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
    <!-- TABLA -->
    <!-- Custom styles for this page -->
      <link href="datatables/dataTables.bootstrap4.css" rel="stylesheet" />
   <title></title>
</head>
<body>
<nav class="navbar navbar-light " style="padding-left: 45%; background-color: #3C793B;">
        <a class="navbar-brand text-white p-1 pl-1 pr-2 text-capitalize text-center font-weight-bold align-content-center " href="#">
            <h1>VeGreen
            </h1>
        </a>

        <form class="form-inline ">
        <a href="index.html" class="get-started-btn scrollto">Pagina de inicio</a>
        </form>
    </nav>
                 
</nav>
    <form method="post" action="Login.php" >
        <div style="height:858px; background-image:url('img/salad-2756467_1920.jpg'); "> 

           
            <div class="d-flex justify-content-center h-100">
            
            <div class="row border-dark  justify-content-center  "  style="text-align:center; background-color:white; border-radius:1.5rem; border: 2px solid #dee2e6; margin-top:120px;  margin-bottom:200px; width:350px;  " >
               <div class="col-12 " style="height:100px;">       
                         <h2 class="col-12  mt-5 text-c" ><b>Login </b></h2>
                </div>

                <div class="col-12 mb-2" style="width:100px; height:127px;"><img src="img/Vegeen.png"; width="150" height="127"/> </div>
                 <div class="input-group col-8">
                
                  <input type="text" ID="user" name="user" CssClass="form-control border border-dark form-control-lg" placeholder="Usuario" >
                </div>
               
                <div class="input-group mb-3 col-8 mt-3">
                        
                <input ID="pass" name="pass" CssClass="form-control border border-dark form-control-lg" type="password" placeholder="Contraseña" >
                </div>
                <div class="col-8 mt-3 mb-4">
                 <!-- <asp:Button ID="btnLogin"  CssClass="btn btn-success"  Height="50" Width="200" Text="Ingresar"  />   OnClick="Button_click"  Para que era?-->
                     <button type="submit"  class="list-group-item list-group-item-action font-weight-bold text-white" style="background-color:#3C793B; " >Ingresar</button>
                </div>    
             </div>
                </div>
       </div>
    </form>
    <footer>

    </footer>
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