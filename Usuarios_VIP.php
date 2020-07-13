<?php 
include("conexion.php");
session_start();

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
                    <a style="margin-bottom: 20px; padding-top: 10px; height: 10%; text-align: center; font-size: 23px; background-color: #3C793B;" href="Usuarios_VIP.html" class="list-group-item list-group-item-action text-white"><b>Usuarios VIP</b></a>
                </div>
            </div>
            <div class="col-10 border border-dark overflow-auto" style="padding-right: 0px; height:800px; padding-left: 0px; width: 100%;">
                <div>
                    <form>
                        <div class="card-header bg-success py-3">
                                 <h6 class="m-0 font-weight-bold text-white">Consultas Usuario</h6>
                               </div>
                   
                       <div class="row col-12 m-0 p-0">
                           
                    
                          <div class="bg-light border-right overflow-auto" style="width:15%; height:720px;" id="sidebar-wrapper">
                     <div id="list-example " class="list-group" >
                     <a class="list-group-item list-group-item-action" href="#list-item-1">Item 1</a>
                     <a class="list-group-item list-group-item-action" href="#list-item-2">Item 2</a>
                     <a class="list-group-item list-group-item-action" href="#list-item-3">Item 3</a>
                         <a class="list-group-item list-group-item-action" href="#list-item-1">Item 4</a>
                     <a class="list-group-item list-group-item-action" href="#list-item-2">Item 5</a>
                     <a class="list-group-item list-group-item-action" href="#list-item-3">Item 6</a>
                     <a class="list-group-item list-group-item-action" href="#list-item-4">Item 7</a>
                           <a class="list-group-item list-group-item-action" href="#list-item-1">Item 7</a>
                     <a class="list-group-item list-group-item-action" href="#list-item-2">Item 8</a>
                     <a class="list-group-item list-group-item-action" href="#list-item-3">Item 9</a>
                         <a class="list-group-item list-group-item-action" href="#list-item-1">Item 10</a>
                           <a class="list-group-item list-group-item-action" href="#list-item-2">Item 2</a>
                     <a class="list-group-item list-group-item-action" href="#list-item-3">Item 3</a>
                         <a class="list-group-item list-group-item-action" href="#list-item-1">Item 4</a>
                     <a class="list-group-item list-group-item-action" href="#list-item-2">Item 5</a>
                     <a class="list-group-item list-group-item-action" href="#list-item-3">Item 6</a>
                     <a class="list-group-item list-group-item-action" href="#list-item-4">Item 7</a>
                           <a class="list-group-item list-group-item-action" href="#list-item-1">Item 7</a>
                     <a class="list-group-item list-group-item-action" href="#list-item-2">Item 8</a>
                     <a class="list-group-item list-group-item-action" href="#list-item-3">Item 9</a>
                         <a class="list-group-item list-group-item-action" href="#list-item-1">Item 10</a>
                   
                   
                     <a class="list-group-item list-group-item-action" href="#list-item-4">Item 14</a>
                   </div>
                       </div>
                    
                               <div class="border boder-dark ml-1" style="width:83%; height:720px;">
                                    <div class="card-header bg-success py-3">
                                 <h6 class="m-0 font-weight-bold text-white">Consultas Usuario</h6>
                               </div>
                                   <div class="row mt-3 ">
                                   <h6 class="mt-2 ml-5 font-weight-bold ">Nombre Usuario :</h6> <input class="ml-2 mt-1" disabled style="height:30px;" />
                                       </div>
                                   <div class="row">
                                   <h6 class="mt-2 ml-5 font-weight-bold ">Asunto : </h6><input class="mt-1" disabled style="height:30px; margin-left:6%;" />
                                       </div>
                                        <textarea ID="tb5"  Enabled="false"  Style="margin-top: 1%; background-color:white; width:95%; max-width:95%; min-width:95%; margin-left:2%; height:25%; max-height:30%; min-height:30%; " TextMode="multiline"  ></textarea>
                           <br /><br />
                                    <div class="card-header bg-success py-3">
                                 <h6 class="m-0 font-weight-bold text-white">Respuesta</h6>
                   
                               </div>
                                   <button class="btn btn-success mt-4 ml-4" style="width: 20%; height: 40px; margin-right: 6%;">Enviar</button>
                                    <textarea ID="TextBox1"    Style="margin-top: 1%; background-color:white; width:95%; max-width:95%; min-width:95%; margin-left:2%; height:20%; max-height:20%; min-height:20%; " TextMode="multiline" ></textarea>
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