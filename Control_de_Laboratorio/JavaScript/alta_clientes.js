function validarFormulario() {

    var x1 = document.forms["formulario"]["nombre-cliente"].value;
    if (x1 == null || x1 == "") {
      alert("Debe llenar los campos vacios");
      return false;
    };

    var x2 = document.forms["formulario"]["apellido-cliente"].value;
    if (x2 == null || x2 == "") {
      alert("Debe llenar los campos vacios");
      return false;
    };

    var x3 = document.forms["formulario"]["rfc"].value;
    if (x3 == null || x3 == "") {
      alert("Debe llenar los campos vacios");
      return false;
    };

    var x4 = document.forms["formulario"]["domicilio-entrega"].value;
    if(x4 == null || x4 == ""){
      alert("Debe llenar los campos vacios");
      return false;
    };

    var x5 = document.forms["formulario"]["fact-particulares"].value;
    if(x5 == null || x5 == ""){
      alert("Debe llenar los campos vacios");
      return false;
    }else if(x5 != "Si" && x5 != "si" && x5 != "Sí" && x5 != "sí" && x5 != "No" && x5 != "no"){
        alert("Debe ingresar sí o no");
      return false;
    }

    var x6 = document.forms["formulario"]["nombre-contacto"].value;
    if(x6 == null || x6 == ""){
      alert("Debe llenar los campos vacios");
      return false;
    };

    var x7 = document.forms["formulario"]["apellido-contacto"].value;
    if(x7 == null || x7 == ""){
      alert("Debe llenar los campos vacios");
      return false;
    };

    var x8 = document.forms["formulario"]["correo-contacto"].value;
    if(x8 == null || x8 == ""){
      alert("Debe llenar los campos vacios");
      return false;
    };

    var x9 = document.forms["formulario"]["tel-contacto"].value;
    if(x9 == null || x9 == ""){
      alert("Debe llenar los campos vacios");
      return false;
    };

    var x10 = document.forms["formulario"]["puesto-contacto"].value;
    if(x10 == null || x10 == ""){
      alert("Debe llenar los campos vacios");
      return false;
    };
    alert("Cliente dado de alta. Presione volver a registrar cliente si asi lo desea.");
};