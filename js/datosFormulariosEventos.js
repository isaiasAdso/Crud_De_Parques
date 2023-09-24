function abrirEditarEvento(idEvento) {
  // Realizar una solicitud AJAX a un archivo PHP para obtener los datos del parque
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
      document.querySelector("#tituloEvento").textContent =
        "Editar Evento : " + datosEvento.nombre; // Ac
      document.querySelector("#nombreEventoEditar").value = datosEvento.nombre;
      document.querySelector("#tipo_eventoEventoEditar").value =
        datosEvento.tipo_evento;
      document.querySelector("#fecha_inicialEventoEditar").value =
        datosEvento.fecha_inicial;
      document.querySelector("#fecha_finalEventoEditar").value =
        datosEvento.fecha_final;
      document.querySelector("#hora_inicialEventoEditar").value =
        datosEvento.hora_inicial;
      document.querySelector("#hora_finalEventoEditar").value =
        datosEvento.hora_final;
      document.querySelector("#descripcionEventoEditar").value =
        datosEvento.descripcion;
    },
    error: function (error) {
      // Manejar errores aquí
      console.error(error);
    },
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
