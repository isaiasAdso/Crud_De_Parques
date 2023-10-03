function AbrirEditarAtraccion(idAtraccion) {

    document.querySelector(".pieAtracciones").style.display = "none";
    document.querySelector(".contenedorAtracciones").style.display = "none";
    document.querySelector(".ventanaFormAggAtracciones").style.display = "flex";
    document.querySelector("#formulariotraccion").style.display = "none";
    document.querySelector("#valorIdAtraccion").value = idAtraccion;

    $.ajax({
        type: "POST",
        url: "php/datosdeunaAtraccion.php",
        data: { idAtraccion: idAtraccion },
        success: function (response) {
          // Manejar la respuesta del servidor aquí
          // La respuesta del servidor debe contener los datos del parque en el formato que desees (por ejemplo, JSON)
          // Puedes actualizar tu página con los datos recibidos
          console.log(response); // Puedes mostrar la respuesta en la consola para verificar
        
          var DatosAtraccion = JSON.parse(response); 
          var imagenElement = document.getElementById("imagenAtraccion");

          imagenElement.src = DatosAtraccion.imagen;
          document.querySelector("#nombreAtraccionEditar").value = DatosAtraccion.nombre;
          document.querySelector("#DescripcionAtraccion").value = DatosAtraccion.descripcion;
          document.querySelector("#TipoAtraccionEditar").value = DatosAtraccion.tipo_atraccion;

        },
        error: function (error) {
          // Manejar errores aquí
          console.error(error);
        },
      });

} 
function editarAtraccion(){
    $.ajax({
      url: "php/actualizarAtraccion.php",
      type: "POST",
      data: $("#formularioEditarAtracciones").serialize(),
      success: function(response) {
        toastr.success("Actualizado Correctamente");
        
        setTimeout(function () {
          location.reload();
        }, 2000);
      },
    });
  }

  $(".AggAtra").click(function () {
    editarAtraccion();
  });
function cerrarEditarAtraccion() {
    document.querySelector(".pieAtracciones").style.display = "flex";
    document.querySelector(".contenedorAtracciones").style.display = "flex";
    document.querySelector(".ventanaFormAggAtracciones").style.display = "none";
    document.querySelector("#formulariotraccion").style.display = "none";
}

function AbrireliminarAtraccion(idAtraccion) {


 $.ajax({
  type: "POST",
  url: "php/datosdeunaAtraccion.php",
  data: { idAtraccion: idAtraccion }, 
  success: function (response) {
    console.log(idAtraccion);
    // Manejar la respuesta del servidor aquí
    // La respuesta del servidor debe contener los datos del parque en el formato que desees (por ejemplo, JSON)
    // Puedes actualizar tu página con los datos recibidos
    console.log(response); // Puedes mostrar la respuesta en la consola para verificar

    // Ejemplo: Actualizar un elemento HTML con los datos recibidos
    var datosAtraccion = JSON.parse(response); // Suponiendo que la respuesta está en formato JSON
    document.querySelector(".EliminarAtraccionH").textContent =
      "Seguro de eliminar la Atraccion : " + datosAtraccion.nombre; // Ac
  },
  error: function (error) {
    // Manejar errores aquí
    console.error(error);
  },
 });


  
  document.querySelector(".ventanaOpaca").style.display = "flex";
  document.querySelector("#idatraccionEliminar").value = idAtraccion;
  
  document.querySelector(".descripcionParqueSeleccionado").style.display =
  "none";
  document.querySelector(".ventanaEliminarParque").style.display = "none";
  document.querySelector(".VentanaEliminarEvento").style.display = "none";
  document.querySelector(".ventanaEliminarAtraccion").style.display = "flex";



  function EliminarAtraccion() {
    $.ajax({
      url: "php/eliminarAtraccion.php",
      type: "POST",
      data: $("#Eliminaratraccion").serialize(),
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

  
  $(".eliminarAtraccion").click(function () {
    EliminarAtraccion();
  });

}
function cerrarEliminarAtraccion(){
  
  document.querySelector(".ventanaOpaca").style.display = "none";
  
  document.querySelector(".descripcionParqueSeleccionado").style.display =
  "none";
  document.querySelector(".ventanaEliminarParque").style.display = "none";
  document.querySelector(".VentanaEliminarEvento").style.display = "none";
  document.querySelector(".ventanaEliminarAtraccion").style.display = "none";
}