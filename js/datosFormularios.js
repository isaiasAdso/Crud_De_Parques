


document.addEventListener('DOMContentLoaded', function() {
    const formAggParque = document.getElementById('formularioParque');
    const formAtraccion = document.getElementById('formulariotraccion');
    const formEventos = document.getElementById('formularioAggEvento');
    const formAggUsuario = document.getElementById('formAggUsuarios');

    formAggParque.addEventListener('submit', function(event){
        event.preventDefault(); // Evita que el formulario se envíe de forma predeterminada

    const DatosFormParques = new FormData(formAggParque);

    const xhr = new XMLHttpRequest();
    xhr.open('POST', 'php/datosFormParque.php', true);

    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4) {
            if (xhr.status === 200) {
                // Maneja la respuesta del servidor aquí si es necesario
                toastr.success(xhr.responseText);
                // Puedes redirigir o mostrar un mensaje de éxito al usuario aquí
            } else {
                // Maneja errores de la solicitud AJAX
                console.error('Error en la solicitud AJAX');
            }
        }
    };

    xhr.send(DatosFormParques);


    });


    formAtraccion.addEventListener('submit', function(event) {
        event.preventDefault(); // Evita que el formulario se envíe de forma predeterminada

        const formData = new FormData(formAtraccion);
        const xhr = new XMLHttpRequest();

        xhr.open('POST', 'php/datosFormAtraccion.php', true);

        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4) {
                if (xhr.status === 200) {
                    // Maneja la respuesta del servidor aquí si es necesario
                    toastr.success(xhr.responseText);
                    // Puedes redirigir o mostrar un mensaje de éxito al usuario aquí
                } else {
                    // Maneja errores de la solicitud AJAX
                    console.error('Error en la solicitud AJAX');
                }
            }
        };

        xhr.send(formData);
    });


    formEventos.addEventListener('submit', function(event) {
        event.preventDefault(); // Evita que el formulario se envíe de forma predeterminada

        const DatosFormEventos = new FormData(formEventos);
        const xhr = new XMLHttpRequest();

        xhr.open('POST', 'php/datosFormEventos.php', true);

        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4) {
                if (xhr.status === 200) {
                    // Maneja la respuesta del servidor aquí si es necesario
                    toastr.success(xhr.responseText);
                    // Puedes redirigir o mostrar un mensaje de éxito al usuario aquí
                } else {
                    // Maneja errores de la solicitud AJAX
                    console.error('Error en la solicitud AJAX');
                }
            }
        };
        xhr.send(DatosFormEventos);
    });

    formAggUsuario.addEventListener('submit', function(event){
        event.preventDefault(); // Evita que el formulario se envíe de forma predeterminada

        const DatosFormUsuarios = new FormData(formAggUsuario);
        const xhr = new XMLHttpRequest();

        xhr.open('POST', 'php/datosFormUsuarios.php', true);

        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4) {
                if (xhr.status === 200) {
                    // Maneja la respuesta del servidor aquí si es necesario
                    toastr.success(xhr.responseText);
                    // Puedes redirigir o mostrar un mensaje de éxito al usuario aquí
                } else {
                    // Maneja errores de la solicitud AJAX
                    console.error('Error en la solicitud AJAX');
                }
            }
        };
        xhr.send(DatosFormUsuarios);
    });

    

});

// abrir descripcion
function AbrirDescripcion(idParque) {
    document.querySelector(".ventanaOpaca").style.display = "flex";
    document.querySelector(".descripcionParqueSeleccionado").style.display = "flex";
    document.querySelector(".ventanaEliminarParque").style.display = "none";

    // Realizar la solicitud AJAX
    $.ajax({
      type: 'POST', // O el método HTTP que prefieras
      url: 'php/descripcion.php', // Reemplaza con la URL de tu archivo PHP que manejará la consulta
      data: { idParque: idParque }, // Enviar el valor a través de AJAX
      success: function (respuesta) {
        // Manejar la respuesta del servidor aquí
        console.log(respuesta);
        // Por ejemplo, puedes mostrar la respuesta en un div
        $('.contenedorRespuesta').html(respuesta);
      },
      error: function () {
        // Manejar errores si es necesario
        alert('Error en la solicitud AJAX');
      },
    });
}
function cerrarDescripcion(){
    document.querySelector(".ventanaOpaca").style.display = "none";
    document.querySelector(".descripcionParqueSeleccionado").style.display = "none";
}


function abrirEditarParque(idParque) {

    // Realizar una solicitud AJAX a un archivo PHP para obtener los datos del parque
    $.ajax({
        type: "POST",
        url: "php/datosdeunparque.php", // Reemplaza "tu_archivo_php.php" con la URL de tu archivo PHP que realizará la consulta
        data: { idParque: idParque }, // Enviar el idParque como datos POST
        success: function (response) {
            // Manejar la respuesta del servidor aquí
            // La respuesta del servidor debe contener los datos del parque en el formato que desees (por ejemplo, JSON)
            // Puedes actualizar tu página con los datos recibidos
            console.log(response); // Puedes mostrar la respuesta en la consola para verificar

            // Ejemplo: Actualizar un elemento HTML con los datos recibidos
            var datosParque = JSON.parse(response); // Suponiendo que la respuesta está en formato JSON
            document.querySelector("#tituloParque").textContent = "Editar parque : " + datosParque.nombre; // Ac
            document.querySelector("#nombreParque").value = datosParque.nombre; // Actualiza un elemento HTML con el nombre del parque
            document.querySelector("#ubicacionParque").value = datosParque.ubicacion; // Actualiza un elemento HTML con la ubicación del parque
            document.querySelector("#tipo_parque").value = datosParque.tipo_parque;
            document.querySelector("#tipo_atraccion").value = datosParque.id_atraccion;
            document.querySelector("#Tipo_Evento").value = datosParque.id_evento;
            document.querySelector("#descripcionParque").value = datosParque.descripcion;

        },
        error: function (error) {
            // Manejar errores aquí
            console.error(error);
        }
    });
    
    // Resto del código para mostrar la ventana de edición
    document.querySelector(".pieOpcion1").style.display = "none";
    document.querySelector(".contenedorOpcion1").style.display = "none";
    document.querySelector(".ventanaGrisOpcion1").style.display = "flex";
    document.querySelector(".FormAggparques").style.display = "none";
    document.querySelector(".FormEditarParque").style.display = "flex";
    
    document.querySelector("#valorIdParque").value = idParque;

    function comprarcar() {
        $.ajax({
            url: "php/actualizarParque.php",
            type: "POST",
            data: $("#editarParque").serialize(),
            success: function (response19) {
                // Mostrar la alerta Toastr
                toastr.success("Actualizado Correctamente");
    
                // Esperar 2 segundos (2000 milisegundos) y luego recargar la página
                setTimeout(function () {
                    location.reload();
                }, 2000);
            }
        });
    }

    $(".ActualizarParque").click(function () {
        comprarcar();
    });
}

function cerrarEditarParque(){
    document.querySelector(".pieOpcion1").style.display = "flex";
    document.querySelector(".contenedorOpcion1").style.display = "flex";
    document.querySelector(".ventanaGrisOpcion1").style.display = "none";
    document.querySelector(".FormAggparques").style.display = "flex";
    document.querySelector(".FormEditarParque").style.display = "none";
}



function AbrirEliminarParque(idParqueEliminado){
    $.ajax({
        type: "POST",
        url: "php/datosdeunparque.php", // Reemplaza "tu_archivo_php.php" con la URL de tu archivo PHP que realizará la consulta
        data: { idParque: idParqueEliminado }, // Enviar el idParque como datos POST
        success: function (response) {
            // Manejar la respuesta del servidor aquí
            // La respuesta del servidor debe contener los datos del parque en el formato que desees (por ejemplo, JSON)
            // Puedes actualizar tu página con los datos recibidos
            console.log(response); // Puedes mostrar la respuesta en la consola para verificar

            // Ejemplo: Actualizar un elemento HTML con los datos recibidos
            var datosParque = JSON.parse(response); // Suponiendo que la respuesta está en formato JSON
            document.querySelector("#parqueEliminar").textContent = "Seguro de eliminar el parque : " + datosParque.nombre; // Ac
            

        },
        error: function (error) {
            // Manejar errores aquí
            console.error(error);
        }
    });

    document.querySelector(".ventanaOpaca").style.display = "flex";
    document.querySelector(".descripcionParqueSeleccionado").style.display = "none";
    document.querySelector(".ventanaEliminarParque").style.display = "flex";
    document.querySelector("#idParqueEliminar").value = idParqueEliminado;

    function EliminarParque() {
        $.ajax({
            url: "php/eliminarparque.php",
            type: "POST",
            data: $("#eliminarParque").serialize(),
            success: function (response19) {
                // Mostrar la alerta Toastr
                toastr.success(response19);
    
                // Esperar 2 segundos (2000 milisegundos) y luego recargar la página
                setTimeout(function () {
                    location.reload();
                }, 2000);
            }
        });
    }

    
    $("#eliminarParque").click(function () {
        EliminarParque();
    });

}
function cerrarEliminarParque(){
    document.querySelector(".ventanaOpaca").style.display = "none";
    document.querySelector(".descripcionParqueSeleccionado").style.display = "flex";
    document.querySelector(".ventanaEliminarParque").style.display = "none";
    
}

