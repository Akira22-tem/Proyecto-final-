<!-- Este archivo solo contiene el encabezado de la página -->

<meta charset="UTF-8">
<title>Gestión de Libros y Autores</title>

<!-- Bootstrap CSS (CDN) -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Estilos personalizados -->
<style>
  body { padding-top: 80px; }
</style>

</head>
<body>

<!-- Aquí comienza el contenido principal de la página -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
  <div class="container">
    <a class="navbar-brand" href="#">Gestión de Libros y Autores</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContenido" aria-controls="navbarContenido" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarContenido">
      <ul class="navbar-nav me-auto">
        <li class="nav-item active">
          <a class="nav-link" href="gestion_libros.php">Libros</a> <!-- Enlace a la gestión de libros -->
        </li>
        <li class="nav-item">
          <a class="nav-link" href="gestion_autores.php">Autores</a> <!-- Enlace a la gestión de autores -->
        </li>
      </ul>
    </div>
  </div>
</nav>
<script src="js/config.js"></script>
<script src="js/app.js"></script>
<script src="js/author.js"></script>
<script src="js/book.js"></script>


</body>
<!-- Fin del contenido del encabezado -->


