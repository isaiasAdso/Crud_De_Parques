function abrirEditarEvento(idEvento) {
  // Realizar una solicitud AJAX a un archivo PHP para obtener los datos del parque

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
