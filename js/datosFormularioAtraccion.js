function AbrirEditarAtraccion(idAtraccion) {

    document.querySelector(".pieAtracciones").style.display = "none";
    document.querySelector(".contenedorAtracciones").style.display = "none";
    document.querySelector(".ventanaFormAggAtracciones").style.display = "flex";
    document.querySelector("#formulariotraccion").style.display = "none";

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
            
          document.querySelector("#nombreAtraccionEditar").value = DatosAtraccion.nombre;
          document.querySelector("#DescripcionAtraccion").value = DatosAtraccion.descripcion;
        
         
        },
        error: function (error) {
          // Manejar errores aquí
          console.error(error);
        },
      });



      
} function editarEvento(){
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

function cerrarEditarAtraccion() {
    document.querySelector(".pieAtracciones").style.display = "flex";
    document.querySelector(".contenedorAtracciones").style.display = "flex";
    document.querySelector(".ventanaFormAggAtracciones").style.display = "none";
    document.querySelector("#formulariotraccion").style.display = "none";
}