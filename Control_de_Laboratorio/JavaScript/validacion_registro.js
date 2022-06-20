function validarFormulario() {
    var x = document.forms["formulario"]["derechos"].value;
    if (x == null || x == "") {
      alert("Debe llenar el campo de Derechos");
      return false;
    } else if(x!=="Laboratorista" && x!=="Administrador"){
      alert("El derecho ingresado no existe");
      return false;
    };

    var y = document.forms["formulario"]["puesto"].value;
    if (y == null || y == "") {
      alert("Debe llenar el campo de Puesto");
      return false;
    } else if(y!=="TI"){
      alert("El puesto ingresado no existe");
      return false;
    };
    alert("Cuenta creada exitosamente");
  }