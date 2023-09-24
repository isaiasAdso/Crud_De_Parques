let ventanaAbierta = false;

const contenedorUsuario = document.querySelector(".contenedorUsuario"); // Define perfilContainer aquí
const PerfilUsuario = document.querySelector(".perfilUsuario"); // Define perfilContainer aquí


function ventanaPerfilUsuario(){
  if (!ventanaAbierta) {
    contenedorUsuario.style.display = "flex";
    ventanaAbierta = true;
  } else {
    contenedorUsuario.style.display = "none";
    ventanaAbierta = false;
  }
}

// Agregar un manejador de eventos al documento para detectar clics en cualquier parte de la página
document.addEventListener("click", function (event) {
  if (ventanaAbierta) {
    if (
  !contenedorUsuario.contains(event.target) &&
  !PerfilUsuario.contains(event.target)
    ) {
      // Si la ventana está abierta y el clic no está dentro de perfilContainer, la cerramos
      contenedorUsuario.style.display = "none";
      ventanaAbierta = false;
    }
  }
});


