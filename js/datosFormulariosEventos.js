function abrirEditarEvento(idEvento) {
  // Realizar una solicitud AJAX a un archivo PHP para obtener los datos del parque
  $.ajax({
    type: "POST",
    url: "php/datosdeunEvento.php",
    data: { idEvento: idEvento },
    success: function (response) {
      // Manejar la respuesta del servidor aquí
      // La respuesta del servidor debe contener los datos del parque en el formato que desees (por ejemplo, JSON)
      // Puedes actualizar tu página con los datos recibidos
      console.log(response); // Puedes mostrar la respuesta en la consola para verificar

      // Ejemplo: Actualizar un elemento HTML con los datos recibidos
      var datosEventos = JSON.parse(response); // Suponiendo que la respuesta está en formato JSON
      var imagenElement = document.getElementById("imagenEventoEditar");
     

      document.querySelector("#nombreEventoEditar").value = datosEventos.nombre;
      document.querySelector("#tipo_eventoEventoEditar").value =
        datosEventos.tipo_evento;
      document.querySelector("#fecha_inicialEventoEditar").value =
        datosEventos.fecha_inicial;
      document.querySelector("#fecha_finalEventoEditar").value =
        datosEventos.fecha_final;
      document.querySelector("#hora_inicialEventoEditar").value =
        datosEventos.hora_inicial;
      document.querySelector("#hora_finalEventoEditar").value =
        datosEventos.hora_final;
        imagenElement.src = datosEventos.imagen;
        document.querySelector("#descripcionEventos").value = datosEventos.descripcion;
    },
    error: function (error) {
      // Manejar errores aquí
      console.error(error);
    },
  });

  function editarEvento(){
    $.ajax({
      url: "php/actualizarEvento.php",
      type: "POST",
      data: $("#formularioEditarEvento").serialize(),
      success: function(response) {
        toastr.success("Actualizado Correctamente");
        
        setTimeout(function () {
          location.reload();
        }, 2000);
      },
    });
  }
  $(".editarEvento").click(function () {
    editarEvento();
  });


  document.querySelector(".PieContenedorEventos").style.display = "none";
  document.querySelector(".ContenedorEventosOption2").style.display = "none";
  document.querySelector(".VentanaGrisFormEventos").style.display = "flex";
  document.querySelector(".FormAggEventos").style.display = "none";
  document.querySelector(".FormEditarEventos").style.display = "flex";
  document.querySelector("#valorIdEvento").value = idEvento;
}

function cerrarContenedorEditarEvento() {
  document.querySelector(".PieContenedorEventos").style.display = "flex";
  document.querySelector(".ContenedorEventosOption2").style.display = "flex";
  document.querySelector(".VentanaGrisFormEventos").style.display = "none";
  document.querySelector(".FormAggEventos").style.display = "flex";
  document.querySelector(".FormEditarEventos").style.display = "none";
}

function abrirEliminarEvento(idEvento) {

  $.ajax({
    type: "POST",
    url: "php/datosdeunEvento.php", // Reemplaza "tu_archivo_php.php" con la URL de tu archivo PHP que realizará la consulta
    data: { idEvento: idEvento }, // Enviar el idParque como datos POST
    success: function (response) {
      // Manejar la respuesta del servidor aquí
      // La respuesta del servidor debe contener los datos del parque en el formato que desees (por ejemplo, JSON)
      // Puedes actualizar tu página con los datos recibidos
      console.log(response); // Puedes mostrar la respuesta en la consola para verificar

      // Ejemplo: Actualizar un elemento HTML con los datos recibidos
      var datosEvento = JSON.parse(response); // Suponiendo que la respuesta está en formato JSON
      document.querySelector("#EventoEliminar").textContent =
        "Seguro de eliminar el Evento : " + datosEvento.nombre; // Ac
    },
    error: function (error) {
      // Manejar errores aquí
      console.error(error);
    },
  });




  document.querySelector(".ventanaOpaca").style.display = "flex";
  document.querySelector("#Idevento").value = idEvento;
  document.querySelector(".descripcionParqueSeleccionado").style.display =
  "none";
  document.querySelector(".ventanaEliminarParque").style.display = "none";
  document.querySelector(".VentanaEliminarEvento").style.display = "flex";


  
  function EliminarEvento() {
    $.ajax({
      url: "php/eliminarEvento.php",
      type: "POST",
      data: $("#EliminarEvento").serialize(),
      success: function (response19) {
        // Mostrar la alerta Toastr
        toastr.success(response19);

        // Esperar 2 segundos (2000 milisegundos) y luego recargar la página
        setTimeout(function () {
          location.reload();
        }, 2000);
      },
    });
  }

  
  $(".eliminarEvento").click(function () {
    EliminarEvento();
  });




}
function CerrarEliminarEvento() {
  document.querySelector(".ventanaOpaca").style.display = "none";
  document.querySelector(".ventanaEliminarParque").style.display = "none";
  document.querySelector(".VentanaEliminarEvento").style.display = "none";
}