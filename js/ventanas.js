


function AbrirVentanaBlanca(){
    ventana = document.querySelector(".ventanaBlanca");

    ventana.style.display = "flex";
}
function AbrirContenedorAggParque(){
    document.querySelector(".pieOpcion1").style.display = "none";
    document.querySelector(".contenedorOpcion1").style.display = "none";
    document.querySelector(".ventanaGrisOpcion1").style.display = "flex";
    document.querySelector(".FormEditarParque").style.display = "none";
}
function cerrarContenedorAggParque(){
    document.querySelector(".pieOpcion1").style.display = "flex";
    document.querySelector(".contenedorOpcion1").style.display = "flex";
    document.querySelector(".ventanaGrisOpcion1").style.display = "none";
}
// CONTENEDOR EVENTOS
function abrirContenedorAggEvento(){
    document.querySelector(".PieContenedorEventos").style.display = "none";
    document.querySelector(".VentanaGrisFormEventos").style.display = "flex";
    document.querySelector(".ContenedorEventosOption2").style.display = "none";
    document.querySelector(".FormEditarEventos").style.display = "none";
}
function cerrarContenedorAggEvento(){
    document.querySelector(".PieContenedorEventos").style.display = "flex";
    document.querySelector(".VentanaGrisFormEventos").style.display = "none";
    document.querySelector(".ContenedorEventosOption2").style.display = "flex";
    document.querySelector(".FormEditarEventos").style.display = "flex";
}
// CONTENEDOR ATRACCIONES
function abrirVentanaAggAtraccion(){
    document.querySelector(".pieAtracciones").style.display = "none";
    document.querySelector(".contenedorAtracciones").style.display = "none";
    document.querySelector(".ventanaFormAggAtracciones").style.display = "flex";
}
function cerraContenedorAggAtracciones(){
    document.querySelector(".pieAtracciones").style.display = "flex";
    document.querySelector(".contenedorAtracciones").style.display = "flex";
    document.querySelector(".ventanaFormAggAtracciones").style.display = "none";
}
// contenedor USUARIOS
function abrirVentanaAggUsuarios(){
    document.querySelector(".pieUsuarios").style.display = "none";
    document.querySelector(".ventanaAggUsuarios").style.display = "flex";
    document.querySelector(".contenedorUsuarios").style.display = "none";
}
function cerrarVentanaAggUsuarios(){
    document.querySelector(".pieUsuarios").style.display = "flex";
    document.querySelector(".contenedorUsuarios").style.display = "flex";
    document.querySelector(".ventanaAggUsuarios").style.display = "none";
}


