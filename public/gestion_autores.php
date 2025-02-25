<?php
include 'templates/header.php';
?>

<h1>Gestión de Autores</h1>
<div class="mb-3">
  <button class="btn btn-primary" onclick="abrirModalAutor();">Agregar Autor</button>
</div>
<table class="table table-bordered" id="tablaAutores">
  <thead>
    <tr>
      <th>ID</th>
      <th>Nombre</th>
      <th>Biografía</th>
      <th>Acciones</th>
    </tr>
  </thead>
  <tbody>
    <!-- Se llenarán dinámicamente mediante JavaScript -->
  </tbody>
</table>

<!-- Modal para Autores -->
<div class="modal fade" id="autorModal" tabindex="-1" role="dialog" aria-labelledby="autorModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 id="autorModalLabel" class="modal-title">Agregar Autor</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="formularioAutor">
          <input type="hidden" id="autorId">
          <div class="form-group">
            <label for="autorNombre">Nombre</label>
            <input type="text" class="form-control" id="autorNombre" required>
          </div>
          <div class="form-group">
            <label for="autorBiografia">Biografía</label>
            <textarea class="form-control" id="autorBiografia" required></textarea>
          </div>
          <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Scripts de JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script> <!-- Asegúrate de que jQuery esté cargado -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script> <!-- Bootstrap Bundle (con Popper) -->

<!-- Al final del body, antes de cerrar la etiqueta </body> -->
<script src="js/config.js"></script>  <!-- Configuración de la API -->
<script src="js/app.js"></script>     <!-- Lógica general de la aplicación -->
<script src="js/author.js"></script>  <!-- Lógica de autores -->
<script src="js/book.js"></script>    <!-- Lógica de libros -->
<?php
include 'templates/footer.php';
?>
</body>
</html>
