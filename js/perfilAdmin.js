let ventanaAbierta = false;

const perfilContainer = document.querySelector(".perfilContainer"); // Define perfilContainer aquí
const botonPerfil = document.querySelector(".profile"); // Define perfilContainer aquí

function ventanaPerfil() {
    if (!ventanaAbierta) {
      perfilContainer.style.display = "flex";
      ventanaAbierta = true;
    } else {
      perfilContainer.style.display = "none";
      ventanaAbierta = false;
    }
  }
  document.addEventListener("click", function (event) {
    if (ventanaAbierta) {
      if (
        !perfilContainer.contains(event.target) &&
    !botonPerfil.contains(event.target) 
      ) {
        // Si la ventana está abierta y el clic no está dentro de perfilContainer, la cerramos
        perfilContainer.style.display = "none";
        ventanaAbierta = false;
      }
    }
  });