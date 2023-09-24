window.onload = function() {

    var activeContainer = localStorage.getItem('activeContainer');
    var activeBoton = localStorage.getItem('activeBoton');
  
    if(activeContainer && activeBoton) {
  
      // Mostrar contenedor guardado previamente
      mostrarcontenedor(activeContainer, document.getElementById(activeBoton));
      document.querySelector(".inicio").style.display = 'none';
  
    } else {
  
      // Mostrar contenedor por defecto
      document.querySelector(".inicio").style.display = 'flex';
    }
  
  }
function mostrarcontenedor(contenedorId, boton) {
    var contenedores = document.getElementsByClassName('contenedorInf');
    for (var i = 0; i < contenedores.length; i++) {
        contenedores[i].style.display = 'none'; // Ocultar todos los contenedores
    }

    var botones = document.getElementsByClassName('option');
    for (var i = 0; i < botones.length; i++) {
        botones[i].classList.remove("activenav");
        
    }

    boton.classList.add("activenav");
    
    document.getElementById(contenedorId).style.display = 'flex'; // Mostrar el contenedor seleccionado
    localStorage.setItem('activeContainer', contenedorId); // Guardar el contenedor seleccionado en el menú
    localStorage.setItem('activeBoton', boton.id);
}