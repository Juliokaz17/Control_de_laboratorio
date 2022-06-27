function showDiv() {
    document.getElementById('welcomeDiv').style.display = "block";
 }

 function showBotones() {
    document.getElementById('boton_borrar').style.display = "block";
    document.getElementById('boton_modificar').style.display = "block";
 }

 function validarFormularioUsuarios() {
    var y = document.forms["formulario"]["puesto"].value;
    if (y == null || y == "") {
      alert("Debe llenar los campos vacios");
      return false;
    }else if(y!=="Laboratorista" && y!=="Administrador" && y!=="Ejecutivo"){
      alert("El puesto ingresado no existe");
      return false;
    };
    
    var x = document.forms["formulario"]["nombre"].value;
    if (x == null || x == "") {
      alert("Debe llenar los campos vacios");
      return false;
    };

    var r = document.forms["formulario"]["email"].value;
    if (r == null || r == "") {
      alert("Debe llenar los campos vacios");
      return false;
    };

    var i = document.forms["formulario"]["contrasena"].value;
    if(i == null || i == ""){
      alert("Debe llenar los campos vacios");
      return false;
    };
    alert("Usuario modificado");
};