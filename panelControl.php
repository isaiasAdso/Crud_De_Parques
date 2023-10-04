<?php
// Iniciar la sesión
session_start();
$rol = $_SESSION['id_rol'];
if ($rol != 1) {
  echo "<script>window.location='login.php';</script>";
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="css/panelControl.css" />
  <link rel="stylesheet" href="css/parques.css" />
  <link rel="stylesheet" href="css/eventos.css" />
  <link rel="stylesheet" href="css/atracciones.css">
  <link rel="stylesheet" href="css/solicitudes.css">
  <link rel="stylesheet" href="css/usuarios.css">
  <!-- alertas toats -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
  <title>Admin</title>
</head>
<!-- inicio del body -->

<body>
  <header class="encabezado">


    <div class="titulo">
      <img src="image/logo-sena-naranja-png-2022.png" class="logoSena" alt="" srcset="">
      <h1>Parques Florencia</h1>
    </div>
    <div class="contenedorSearch">
      <input class="Search" type="search" name="" id="" placeholder="Buscar.." />
      <button class="botonSearch">
        <img src="asset/search.svg" alt="" srcset="" />
      </button>
    </div>
    <div class="profile" onclick="ventanaPerfil()"></div>
  </header>
  <main class="mainContainer">
    <aside class="options">
      <ul>
        <li class="option" id="1" onclick="mostrarcontenedor('opcion1',this)">
          <a href="#">Parques</a>
        </li>
        <li class="option" id="2" onclick="mostrarcontenedor('opcion2', this)">
          <a href="#">Eventos</a>
        </li>
        <li class="option" id="3" onclick="mostrarcontenedor('opcion3', this)">
          <a href="#">Atracciones</a>
        </li>
        <li class="option" id="4" onclick="mostrarcontenedor('opcion4', this)">
          <a href="#">Solicitudes</a>
        </li>
        <li class="option" id="5" onclick="mostrarcontenedor('opcion5', this)">
          <a href="#">Usuarios</a>
        </li>
      </ul>
    </aside>

    <div id="result" class="resultContainer">
      <div class="inicio contenedorInf" id="entrada">
        <div class="textBienvenida">
          <p>Bienvenido</p>
          <div>
            <h3>Realiza Cualquier Opercacion Que Desees</h3>
          </div>
        </div>
      </div>
      <!-- contenedor parques -->
      <div id="opcion1" class="contenedorInf">
        <header class="encabezadoOpcion1">Parques</header>
        <main class="contenedorOpcion1">
          <div class="tabla-div">
            <div class="tabla-fila encabezado-tabla">
              <div class="tabla-columna idParque">id</div>
              <div class="tabla-columna nombreParque">nombre</div>
              <div class="tabla-columna tipoDeParque">tipo de parque</div>
              <div class="tabla-columna ubicacionParque">Ubicacion</div>
              <div class="tabla-columna atraccionParque">Atraccion</div>
              <div class="tabla-columna eventoParque">Evento</div>
              <div class="tabla-columna descripcionParque">Descripcion</div>
              <div class="tabla-columna acciones">Acciones</div>
            </div>

            <?php
            include("php/tablaParque.php");
            ?>

            <!-- Puedes agregar más filas aquí -->
          </div>
        </main>
        <div class="ventanaGrisOpcion1">


          <!-- formulario parque -->
          <form action="" method="post" class="FormAggparques" id="formularioParque" enctype="multipart/form-data">
            <div class="EncabezadoFormAggParque">Agrega un parque </div>
            <section class="contenedorDatosformAggParque">
              <!-- contenedor 1 de formulario  -->
              <div class="datos1">
                <div class="cuestion">
                  <p>Nombre</p>
                  <input type="text" name="nombre" id="nombre" />
                </div>
                <div class="cuestion">
                  <p>Tipo parque</p>
                  <select name="tipo_parque" id="tipo_parque">
                    <?php
                    require_once "models/data_base.php";
                    $sql = "SELECT id_tipo, nombre FROM tipoparque";
                    $result = $conexion->query($sql);
                    while ($row = $result->fetch_assoc()) {
                      echo "<option value='" . $row['id_tipo'] . "'>" . $row['nombre'] . "</option>";
                    }
                    ?>
                  </select>
                </div>
                <div class="cuestion">
                  <p>Ubicacion</p>
                  <input type="text" name="ubicacion" id="ubicacion" />
                </div>
                <div class="cuestion">
                  <p>Atraccion:</p>
                  <select name="atraccion" id="atraccion" style="appearance: auto;">
                    <?php
                    require_once "models/data_base.php";
                    $sql = "SELECT id_atraccion, nombre FROM atracciones";
                    $result = $conexion->query($sql);
                    while ($row = $result->fetch_assoc()) {
                      echo "<option value='" . $row['id_atraccion'] . "'>" . $row['nombre'] . "</option>";
                    }
                    ?>

                  </select>
                </div>
                <div class="cuestion">
                  <p>Evento:</p>
                  <select name="evento" id="evento">
                    <?php
                    require_once "models/data_base.php";
                    $sql = "SELECT id_evento, nombre FROM eventos";
                    $result = $conexion->query($sql);
                    while ($row = $result->fetch_assoc()) {
                      echo "<option value='" . $row['id_evento'] . "'>" . $row['nombre'] . "</option>";
                    }
                    ?>
                  </select>

                </div>
              </div>
              <!-- contenedor 2 de formulario  -->
              <div class="datos2">
                <label for="imageParque"> Subir una imagen.. </label>
                <input type="file" id="imageParque" name="imagen" />
                <input type="text" name="descripcion" id="descripcion" placeholder="Descripcion" />
                <footer>
                  <article class="cancelar" onclick="cerrarContenedorAggParque()">
                    Cancelar
                  </article>

                  <button type="submit" class="agg">Agregar</button>
                </footer>
              </div>
            </section>
          </form>

          <form method="post" class="FormEditarParque" id="editarParque"">
            <div class=" tituloFormEditarParque">
            <input type="hidden" id="valorIdParque" name="idparque">
            <h3 id="tituloParque"></h3>
        </div>
        <section class="contenedorPartes">
          <section class="parte1Editarparque">
            <!-- primera sesion -->
            <div class="containerCuestion">
              <p>Nombre</p>
              <input type="text" name="nombreparqueEditado" id="nombreParque" />
            </div>
            <div class="containerCuestion">
              <p>Tipo parque</p>
              <select name="tipo_parqueEditado" id="tipo_parque">

                <?php
                require_once "models/data_base.php";
                $sql = "SELECT id_tipo, nombre FROM tipoparque";
                $result = $conexion->query($sql);
                while ($row = $result->fetch_assoc()) {
                  echo "<option value='" . $row['id_tipo'] . "'>" . $row['nombre'] . "</option>";
                }
                ?>

              </select>
            </div>
            <div class="containerCuestion">
              <p>Ubicacion</p>
              <input type="text" name="ubicacionparqueEditada" id="ubicacionParque" />
            </div>
            <div class="containerCuestion">
              <p>Atraccion:</p>
              <select name="tipo_atraccionEditada" id="tipo_atraccion">
                <?php
                require_once "models/data_base.php";
                $sql = "SELECT id_atraccion, nombre FROM atracciones";
                $result = $conexion->query($sql);
                while ($row = $result->fetch_assoc()) {
                  echo "<option value='" . $row['id_atraccion'] . "'>" . $row['nombre'] . "</option>";
                }
                ?>
              </select>
            </div>
            <div class="containerCuestion">
              <p>Evento:</p>
              <select name="tipo_eventoEditado" id="Tipo_Evento">
                <?php
                require_once "models/data_base.php";
                $sql = "SELECT id_evento, nombre FROM eventos";
                $result = $conexion->query($sql);
                while ($row = $result->fetch_assoc()) {
                  echo "<option value='" . $row['id_evento'] . "'>" . $row['nombre'] . "</option>";
                }
                ?>
              </select>
            </div>
          </section>
          <!-- segunda sesion -->
          <section class="parte2Editarparque">
            <label for="image"> Subir una imagen.. </label>
            <input type="file" id="image" name="imagenEditada" />
            <input type="text" name="descripcionparqueEditada" id="descripcionParque" placeholder="Descripcion" />
            <footer>
              <article class="cancelar" onclick="cerrarEditarParque()">
                Cancelar
              </article>

              <button type="button" class="ActualizarParque">Actualizar</button>
            </footer>
          </section>
        </section>


        </form>


      </div>

      <footer class="pieOpcion1">
        <article class="btnAggOpcion1" onclick="AbrirContenedorAggParque()">
          Agregar
        </article>
      </footer>
    </div>








    <!-- contenedor Eventos -->
    <div id="opcion2" class="contenedorInf">
      <header class="encabezadoContenedorEventos">
        <p>Eventos</p>
      </header>
      <main class="ContenedorEventosOption2">

        <div class="tabla-div">
          <div class="tabla-fila encabezado-tabla">
            <div class="tabla-columna idEvento">id</div>
            <div class="tabla-columna nombreEvento">nombre</div>
            <div class="tabla-columna tipoDeEvento">tipo de Evento</div>
            <div class="tabla-columna fechaInicialEvento">Fecha Inicial</div>
            <div class="tabla-columna fechaFinalEvento">Fecha Final</div>
            <div class="tabla-columna HoraIncial">Hora Inicio</div>
            <div class="tabla-columna HoraFinal">Hora Fin</div>
            <div class="tabla-columna accionesEvento">Acciones</div>
          </div>

          <?php
          include("php/tablaEventos.php");
          ?>

          <!-- <div class="tabla-fila" data-id="">
            <div class="tabla-columna idEvento"></div>
            <div class="tabla-columna nombreEvento"></div>
            <div class="tabla-columna tipoDeEvento"></div>
            <div class="tabla-columna fechaInicialEvento"></div>
            <div class="tabla-columna fechaFinalEvento"></div>
            <div class="tabla-columna HoraIncial"></div>
            <div class="tabla-columna HoraFinal"></div>
            <div class="tabla-columna acciones">
              <img src="asset/edit.svg" alt="" srcset="" onclick="abrirEditarParque('')">
              <img src="asset/delete.svg" alt="" onclick="AbrirEliminarParque('')">
              <input type="hidden" name="id_parque" value="">
            </div>
          </div> -->



          <!-- Puedes agregar más filas aquí -->
        </div>



      </main>
      <div class="VentanaGrisFormEventos">




        <!-- EDITAR EVENTO -->
        <form method="post" id="formularioEditarEvento" class="FormEditarEventos" enctype="multipart/form-data">
          <div class="EncabezadoEditarEventos">
            <p id="tituloEvento"></p>
          </div>
          <input type="hidden" id="valorIdEvento" name="idEvento">
          <main class="DatosEditarEventos">
            <section class="datos1EditarEventos">
              <div class="contenedorEditarTITULOS">
                <p>Nombre:</p>
                <input type="text" name="nombreEventoEditar" id="nombreEventoEditar" />
              </div>
              <div class="contenedorEditarTITULOS">
                <p>Tipo de Evento:</p>
                <select name="tipo_eventoEventoEditar" id="tipo_eventoEventoEditar" class="TipoEventoEditado">
                  <?php
                  require_once "models/data_base.php";
                  $sql = "SELECT id_tipoevento, nombre FROM tipoevento";
                  $result = $conexion->query($sql);
                  while ($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row['id_tipoevento'] . "'>" . $row['nombre'] . "</option>";
                  }
                  ?>
                </select>
              </div>
              <div class="fechasEditarEventos">
                <div class="fechaInicialEditarEventos">
                  <p>Fecha Inicial:</p>
                  <input type="date" name="fecha_inicialEventoEditar" id="fecha_inicialEventoEditar" />
                </div>
                <div class="fechaFinalEditarEventos">
                  <p>Fecha Final:</p>
                  <input type="date" name="fecha_finalEventoEditar" id="fecha_finalEventoEditar" />
                </div>
              </div>

              <div class="HorasEditarEventos">
                <div class="horaInicialEditarEventos">
                  <p>Hora Inicial:</p>
                  <input type="time" name="hora_inicialEventoEditar" id="hora_inicialEventoEditar" />
                </div>
                <div class="horaFinalEditarEventos">
                  <p>Hora Final:</p>
                  <input type="time" name="hora_finalEventoEditar" id="hora_finalEventoEditar" />
                </div>
              </div>
            </section>
            <section class="datos2EditarEventos">
              <label for="imagenEventos">Selecciona una imagen..</label>
              <input type="file" name="imagenEventoEditar" id="imagenEventoEditar" />
              <input type="text" name="descripcionEventoEditar" id="descripcionEventos" placeholder="Descripcion" />
              <footer>
                <article class="cancelar" onclick="cerrarContenedorEditarEvento()">
                  Cancelar
                </article>
                <button type="button" class="editarEvento">Actualizar</button>
              </footer>
            </section>
          </main>
        </form>




        <!-- formulario agregar eventos -->
        <form action="" method="post" id="formularioAggEvento" class="FormAggEventos" enctype="multipart/form-data">
          <div class="EncabezadoFormEventos">
            <p>Agregar un Evento</p>
          </div>
          <main class="DatosEventos">
            <section class="datos1Eventos">
              <div class="contenedorTITULOS">
                <p>Nombre:</p>
                <input type="text" name="nombre" id="nombre" />
              </div>
              <div class="contenedorTITULOS">
                <p>Tipo de Evento:</p>
                <select name="tipo_evento" id="tipo_evento">
                  <?php
                  require_once "models/data_base.php";
                  $sql = "SELECT id_tipoevento, nombre FROM tipoevento";
                  $result = $conexion->query($sql);
                  while ($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row['id_tipoevento'] . "'>" . $row['nombre'] . "</option>";
                  }
                  ?>
                </select>
              </div>
              <div class="fechasEventos">
                <div class="fechaInicialEventos">
                  <p>Fecha Inicial:</p>
                  <input type="date" name="fecha_inicial" id="fecha_inicial" />
                </div>
                <div class="fechaFinalEventos">
                  <p>Fecha Final:</p>
                  <input type="date" name="fecha_final" id="fecha_final" />
                </div>
              </div>

              <div class="HorasEventos">
                <div class="horaInicialEventos">
                  <p>Hora Inicial:</p>
                  <input type="time" name="hora_inicial" id="hora_inicial" />
                </div>
                <div class="horaFinalEventos">
                  <p>Hora Final:</p>
                  <input type="time" name="hora_final" id="hora_final" />
                </div>
              </div>
            </section>
            <section class="datos2Eventos">
              <label for="imagenEventos">Selecciona una imagen..</label>
              <input type="file" name="imagen" id="imagenEventos" />
              <input type="text" name="descripcion" id="descripcion" placeholder="Descripcion" />
              <footer>
                <article class="cancelar" onclick="cerrarContenedorAggEvento()">
                  Cancelar
                </article>
                <button type="submit" class="agg">Agregar</button>
              </footer>
            </section>
          </main>
        </form>

      </div>
      <footer class="PieContenedorEventos">
        <article class="BtnAggEventos" onclick="abrirContenedorAggEvento()">
          Agregar
        </article>
      </footer>
    </div>



















    <!-- contenedor atracciones -->
    <div id="opcion3" class="contenedorInf">
      <header class="EncabezadoAtracciones">
        <p>Atracciones </p>
      </header>
      <main class="contenedorAtracciones">

        <div class="tabla-div">
          <div class="tabla-fila encabezado-tabla">
            <div class="tabla-columna idAtraccion">id</div>
            <div class="tabla-columna nombreAtraccion">nombre</div>
            <div class="tabla-columna descripcionAtraccion">Descripcion</div>
            <div class="tabla-columna TipoAtraccion">Tipo Atraccion</div>
            <div class="tabla-columna AccionesAtracciones">Acciones</div>
          </div>


          <?php
          include("php/tablaAtracciones.php");
          ?>

          <!-- <div class="tabla-fila" data-id="">
            <div class="tabla-columna idAtraccion"></div>
            <div class="tabla-columna nombreAtraccion"></div>
            <div class="tabla-columna descripcionAtraccion"></div>
            <div class="tabla-columna TipoAtraccion"></div>
            <div class="tabla-columna AccionesAtracciones">
              <img src="asset/edit.svg" alt="" srcset="" onclick="">
              <img src="asset/delete.svg" alt="" onclick="">
              <input type="hidden" name="" value="">
            </div>
          </div> -->



          <!-- Puedes agregar más filas aquí -->
        </div>




      </main>






      <div class="ventanaFormAggAtracciones">




        <!-- editar atracciones -->
        <section class="VentanaEditarAtraccion">
          <form action="" method="post" class="formularioEditarAtracciones" id="formularioEditarAtracciones" enctype="multipart/form-data">
            <input type="hidden" id="valorIdAtraccion" name="valorIdAtraccion">
            <div class="encabezadoAtracciones">
              <h3>EDITAR ATRACCION</h3>
            </div>
            <section class="contenedorAtracciones2">
              <section class="datos1Atraccion">
                <div class="contenedorTITULOSAtracciones">
                  <p>Nombre:</p>
                  <input type="text" name="nombre" id="nombreAtraccionEditar" />
                </div>
                <div class="contenedorTITULOSAtracciones">
                  <p>Tipo Atraccion:</p>
                  <select name="tipoAtraccion" id="TipoAtraccionEditar">
                    <?php
                    require_once "models/data_base.php";
                    $sql = "SELECT id_tipo, nombre FROM tipoatraccion";
                    $result = $conexion->query($sql);
                    while ($row = $result->fetch_assoc()) {
                      echo "<option value='" . $row['id_tipo'] . "'>" . $row['nombre'] . "</option>";
                    }
                    ?>
                  </select>
                </div>
                <div class="contenedorTITULOSAtracciones">
                  <p>Descripcion:</p>
                  <textarea name="descripcion" id="DescripcionAtraccion"></textarea>
                </div>
              </section>
              <section class="datos2Atraccion">
                <section class="contenedorImgEditarAtraccion">
                  <label for="imagenAtraccion" class="imgAtraccion">Selecciona una Imagen..</label>
                  <input type="file" name="imagen" id="imagenAtraccion">
                </section>
                <div class="accionesEditarAtraccion">
                  <article class="cancelar" onclick="cerrarEditarAtraccion()">
                    Cancelar
                  </article>
                  <button type="button" class="AggAtra">Actualizar</button>
                </div>
              </section>
            </section>
          </form>
        </section>























        <!-- formlario aregar atracciones -->
        <form action="" method="post" class="FormAggAtraccion" id="formulariotraccion" enctype="multipart/form-data">
          <div class="encabezadoFormAgg">Agregar una atraccion</div>
          <main class="datosAtracciones">
            <section class="datosAtraccion1">
              <div class="titulosAtracciones">
                <p>Nombre:</p>
                <input type="text" name="nombre" id="nombre">
              </div>
              <div class="titulosAtracciones">
                <p>Tipo de Atraccion:</p>
                <select name="tipoAtraccion" id="tipoAtraccion">
                  <?php
                  require_once "models/data_base.php";
                  $sql = "SELECT id_tipo, nombre FROM tipoatraccion";
                  $result = $conexion->query($sql);
                  while ($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row['id_tipo'] . "'>" . $row['nombre'] . "</option>";
                  }
                  ?>
                </select>
              </div>
              <div class="titulosAtra">
                <p>Descripcion</p>
                <input type="text" name="descripcion" id="descripcion">
              </div>
            </section>
            <section class="datosAtraccion2">
              <div class="imagenAtraccionFile">
                <label for="imagenAtraccion">Seleccionar imagen</label>
                <input type="file" name="imagen" id="imagenAtraccion">
              </div>
              <footer>
                <article class="cancelar" onclick="cerraContenedorAggAtracciones()">Cancelar</article>
                <button type="submit" class="agg">Agregar</button>
              </footer>
            </section>
          </main>
        </form>

      </div>
      <footer class="pieAtracciones">
        <article class="BtnAggAtracciones" onclick="abrirVentanaAggAtraccion()">Agregar</article>
      </footer>
    </div>
    <!-- contenedor solicitudes -->
    <div id="opcion4" class="contenedorInf">
      <header class="encabezadoSolicitudes">
        <p>Solicitudes</p>
      </header>
      <main class="contenedorSolicitudes"></main>
      <footer class="pieSolicitudes">

      </footer>
    </div>
    <!-- contenedor usuarios -->
    <div id="opcion5" class="contenedorInf">
      <div class="encabezadoContainerUsuarios">
        <p>Usuarios</p>
      </div>
      <main class="contenedorUsuarios">

      </main>
      <div class="ventanaAggUsuarios">
        <form action="" method="post" class="FormularioUsuarios" id="formAggUsuarios">
          <div class="encabezadoUsuarios">
            <p>Agregar Usuario</p>
          </div>
          <div class="titulosUsuarios">
            <p>Nombre:</p>
            <input type="text" name="nombre" id="">
          </div>
          <div class="titulosUsuarios">
            <p>Apellido:</p>
            <input type="text" name="apellido" id="">
          </div>
          <div class="titulosUsuarios">
            <p>Email:</p>
            <input type="email" name="email" id="">
          </div>
          <div class="titulosUsuarios">
            <p>Contraseña:</p>
            <input type="password" name="contrasena" id="">
          </div>
          <footer class="pieFormUsuario">
            <article class="cancelar" onclick="cerrarVentanaAggUsuarios()">Cancelar</article>
            <button type="submit" class="aggUser">Agregar</button>
          </footer>
        </form>
      </div>
      <footer class="pieUsuarios">
        <article class="BtnAggUsuarios" onclick="abrirVentanaAggUsuarios()">Agregar</article>
      </footer>
    </div>
    </div>
  </main>

  <footer class="pie"></footer>

  <div class="ventanaOpaca">

    <!-- eliminar Atraccion -->

    <div class="ventanaEliminarAtraccion">
      <header class="EliminarAtraccionH">

      </header>
      <section>

        <article class="cancelar" onclick="cerrarEliminarAtraccion()">
          Cancelar
        </article>
        <form action="" method="post" id="Eliminaratraccion">
          <input type="hidden" id="idatraccionEliminar" name="idatraccionEliminar">
          <button type="button" class="eliminarAtraccion">Aceptar</button>
        </form>

      </section>
    </div>

    <!-- descripcion parque -->
    <div class="descripcionParqueSeleccionado">
      <div class="cerrarDescrip" onclick="cerrarDescripcion()"><img src="asset/close.svg" alt="" srcset="">

      </div>
      <div class="contenedorRespuesta">
        <?php
        include("php/descripcion.php");
        ?>
      </div>

    </div>

    <!-- ventana eliminar evento -->
    <div class="VentanaEliminarEvento">
      <header>
        <h3 id="EventoEliminar">Seguro de Eliminar el Evento :</h3>
      </header>
      <section>
        <article class="cancelar" onclick="CerrarEliminarEvento()">
          Cancelar
        </article>
        <form action="" method="post" id="EliminarEvento">
          <input type="hidden" id="Idevento" name="idEvento">
          <button type="button" class="eliminarEvento">Aceptar</button>
        </form>
      </section>
    </div>

    <!-- ventana eliminar parque -->
    <div class="ventanaEliminarParque">
      <header>
        <h3 id="parqueEliminar">Seguro de Eliminar el parque :</h3>
      </header>
      <section>
        <article class="cancelar" onclick="cerrarEliminarParque()">
          Cancelar
        </article>
        <form action="php/eliminarparque.php" method="post" id="eliminarParque">
          <input type="hidden" id="idParqueEliminar" name="idParque">
          <button type="button" class="eliminarParque">Aceptar</button>
        </form>
      </section>
    </div>

  </div>

  <!-- perfil  -->
  <div class="perfilContainer">
    <header class="encabezadoPerfilUser">
      <article class="ContenedorImagePerfil"></article>
    </header>
    <main class="DatosUser">
      <p>Isaias Caballero</p>
    </main>
    <footer class="pieUser">
      <form action="php/cerrarSesion.php">
        <button type="submit" class="cancelar">cerrar sesion</button>
      </form>
    </footer>
  </div>
</body>
<script src="js/datosFormulariosEventos.js"></script>
<script src="js/ventanas.js"></script>
<script src="js/menuAdmin.js"></script>
<script src="js/datosFormularios.js"></script>
<script src="js/perfilAdmin.js"></script>
<script src="js/ventanaPERFIL.js"></script>
<script src="js/datosFormularioAtraccion.js"></script>

</html>