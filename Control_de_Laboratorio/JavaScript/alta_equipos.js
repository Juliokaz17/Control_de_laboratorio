function validarFormulario() {

    var x1 = document.forms["formulario"]["nombre"].value;
    if (x1 == null || x1 == "") {
      alert("Debe llenar los campos vacios");
      return false;
    };

    var x2 = document.forms["formulario"]["apellido"].value;
    if (x2 == null || x2 == "") {
      alert("Debe llenar los campos vacios");
      return false;
    };

    var x3 = document.forms["formulario"]["marca"].value;
    if (x3 == null || x3 == "") {
      alert("Debe llenar los campos vacios");
      return false;
    };

    var x4 = document.forms["formulario"]["modelo"].value;
    if(x4 == null || x4 == ""){
      alert("Debe llenar los campos vacios");
      return false;
    };

    var x5 = document.forms["formulario"]["serie"].value;
    if(x5 == null || x5 == ""){
      alert("Debe llenar los campos vacios");
      return false;
    };

    var x6 = document.forms["formulario"]["descripcion"].value;
    if(x6 == null || x6 == ""){
      alert("Debe llenar los campos vacios");
      return false;
    };

    var x7 = document.forms["formulario"]["fecha-adquisicion"].value;
    if(x7 == null || x7 == ""){
      alert("Debe llenar los campos vacios");
      return false;
    };

    var x8 = document.forms["formulario"]["garantia"].value;
    if(x8 == null || x8 == ""){
      alert("Debe llenar los campos vacios");
      return false;
    };

    var x9 = document.forms["formulario"]["vigencia-garantia"].value;
    if(x9 == null || x9 == ""){
      alert("Debe llenar los campos vacios");
      return false;
    };

    var x10 = document.forms["formulario"]["ubic-equipo"].value;
    if(x10 == null || x10 == ""){
      alert("Debe llenar los campos vacios");
      return false;
    };

    var x11 = document.forms["formulario"]["mantenimiento"].value;
    if(x11 == null || x11 == ""){
      alert("Debe llenar los campos vacios");
      return false;
    };
    alert("Equipo dado de alta. Presione volver a registrar equipo si asi lo desea.");
};