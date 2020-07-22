

$('#myTaba a').on('click', function (e) {
    e.preventDefault()
    $(this).tab('show')
})

$(document).ready(function () {
    $('#myTable').DataTable();
});

function ConEliminar() {
alert("Dieta Eliminada")

  }

function ConGuardar(){
    if(document.getElementById("tb5")==null){
        alert("Debe ingresar un consejo")
    }else{
        alert("Consejo ingresado")
    }

}