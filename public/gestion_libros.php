<?php
include 'templates/header.php';
?>

<h1>Gestión de Libros</h1>
<div class="mb-3">
  <button class="btn btn-primary" onclick="abrirModalLibro();">Agregar Libro</button>
</div>
<table class="table table-bordered" id="tablaLibros">
  <thead>
    <tr>
      <th>ID</th>
      <th>Título</th>
      <th>Descripción</th>
      <th>Precio</th>
      <th>Autor</th>
      <th>Acciones</th>
    </tr>
  </thead>
  <tbody>
    <!-- Se llenarán dinámicamente mediante JavaScript -->
  </tbody>
</table>

<!-- Modal para Libros -->
<div class="modal fade" id="libroModal" tabindex="-1" role="dialog" aria-labelledby="libroModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 id="libroModalLabel" class="modal-title">Agregar Libro</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="formularioLibro">
          <input type="hidden" id="libroId">
          <div class="form-group">
            <label for="libroTitulo">Título</label>
            <input type="text" class="form-control" id="libroTitulo" required>
          </div>
          <div class="form-group">
            <label for="libroDescripcion">Descripción</label>
            <textarea class="form-control" id="libroDescripcion" required></textarea>
          </div>
          <div class="form-group">
            <label for="libroPrecio">Precio</label>
            <input type="number" class="form-control" id="libroPrecio" required step="0.01">
          </div>
          <div class="form-group">
            <label for="autorLibro">Autor</label>
            <select class="form-control" id="autorLibro" required>
              <!-- Opciones de autores se llenarán dinámicamente mediante JavaScript -->
            </select>
          </div>
          <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Scripts de JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
<script src="js/config.js"></script>  <!-- Configuración de la API -->
<script src="js/app.js"></script>     <!-- Lógica general de la aplicación -->
<script src="js/author.js"></script>  <!-- Lógica de autores -->
<script src="js/book.js"></script>    <!-- Lógica de libros -->

<?php
include 'templates/footer.php';
?>
</body>
</html>
