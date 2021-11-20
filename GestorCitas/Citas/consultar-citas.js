$(document).ready(function () {
  // Obtiene todas las citas //
  fetchCitas();
  /*Si le dan submit al formulario de buscar*/
  $("#formulario-citas").submit((e) => {
    e.preventDefault();
    /*Obtiene los datos del formulario*/
    const postData = {
      cedula: $("#cedula").val(),
    };
    /*Dirección a la que se envia el post*/
    const url = "consultar-citas-function.php";
    /*Se efectua el post y se espera una promesa con la respuesta*/
    $.post(url, postData, (response) => {
      $("#formulario-citas").trigger("reset");
      /*Si la respuesta es false significa que la cedula no esta registrada*/
      if (response != "false") {
        dibujaPantalla(response);
      } else {
        /*Si no esta registrada limpia los datos y muestra el mensaje*/
        $("#error").html("La identificación ingresada no esta registrada");
        let template = "";
        $("#citas").html(template);
      }
    });
  });
});
/*Realiza una solicitud get sin datos en el post para recibir todos los datos sin filtro*/
function fetchCitas() {
  $.ajax({
    url: "consultar-citas-function.php",
    type: "GET",
    success: function (response) {
      dibujaPantalla(response);
    },
  });
}
/*Coloca los datos en la tabla*/
function dibujaPantalla(response) {
  $("#error").html("");
  console.log(response);
  const citas = JSON.parse(response);
  let template = "";
  $("#citas").html(template);
  citas.forEach((cita) => {
    template += `
      <tr class="tupla">
      <td>${cita.nombrePaciente}</td>
      <td>${cita.cedulaPaciente}</td>
      <td>${cita.telefono}</td>
      <td>${cita.fecha}</td>
      <td>${cita.hora}</td>
      <td>${cita.nombreProfesional}</td>
      </tr>
    `;
  });
  $("#citas").html(template);
}

function redirectAgregarCitas() {
  window.location.href("registrar-citas.php");
}

function establecerEscuchadores() {
  document.getElementById("agregar").addEventListener(redirectAgregarCitas);
}
