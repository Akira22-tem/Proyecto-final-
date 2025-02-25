// book.js

// Ruta base de la API (ajústala según tu entorno).

document.addEventListener('DOMContentLoaded', () => obtenerLibros());

// Obtiene todos los libros y llena la tabla.
const obtenerLibros = () => {
  axios.get(`${apiUrl}/libros`)
  .then(response => {
    console.log('Libros:', response.data);  // Ver qué datos se reciben
    const libros = response.data;
    const tbody = document.querySelector('#tablaLibros tbody');
    tbody.innerHTML = '';  // Limpiar tabla antes de llenarla
    if (libros.length === 0) {
      const tr = document.createElement('tr');
      tr.innerHTML = `<td colspan="6" class="text-center">No se encontraron libros</td>`;
      tbody.appendChild(tr);
    } else {
      libros.forEach(libro => {
        const tr = document.createElement('tr');
        tr.innerHTML = `
          <td>${libro.id}</td>
          <td>${libro.titulo}</td>
          <td>${libro.descripcion}</td>
          <td>${libro.precio}</td>
          <td>${libro.author_name}</td>
          <td>
            <button class="btn btn-info btn-sm" onclick="editarLibro(${libro.id})">Editar</button>
            <button class="btn btn-danger btn-sm" onclick="eliminarLibro(${libro.id})">Eliminar</button>
          </td>
        `;
        tbody.appendChild(tr);
      });
    }
  })
  .catch(error => console.error('Error al obtener libros:', error));

};


// Abre el modal para agregar un nuevo libro.
const abrirModalLibro = () => {
  document.getElementById('formularioLibro').reset();
  document.getElementById('libroId').value = '';
  document.getElementById('libroModalLabel').innerText = 'Agregar Libro';
  cargarAutores();
  $('#libroModal').modal('show');
};

// Cambiar el nombre de la función de cargarAutores a cargarSelectAutores
const cargarSelectAutores = () => {
  axios.get(`${apiUrl}/autores`)
    .then(response => {
      const autores = response.data;
      const selectAutor = document.getElementById('autorLibro');
      selectAutor.innerHTML = ''; // Limpiar las opciones previas
      if (autores && autores.length > 0) {
        autores.forEach(autor => {
          const option = document.createElement('option');
          option.value = autor.id;
          option.textContent = `${autor.nombre} ${autor.apellido}`;
          selectAutor.appendChild(option);
        });
      } else {
        const option = document.createElement('option');
        option.value = '';
        option.textContent = 'No hay autores disponibles';
        selectAutor.appendChild(option);
      }
    })
    .catch(error => console.error('Error al cargar autores:', error));
};


// Obtiene los datos de un libro para editar.
const editarLibro = id => {
  axios.get(`${apiUrl}/libros/${id}`)
    .then(response => {
      const libro = response.data;
      document.getElementById('libroId').value = libro.id;
      document.getElementById('libroTitulo').value = libro.titulo;
      document.getElementById('libroDescripcion').value = libro.descripcion;
      document.getElementById('libroPrecio').value = libro.precio;
      document.getElementById('autorLibro').value = libro.autor_id;
      document.getElementById('libroModalLabel').innerText = 'Editar Libro';
      $('#libroModal').modal('show');
    })
    .catch(error => console.error('Error al obtener libro:', error));
};

// Elimina un libro.
const eliminarLibro = id => {
  if (confirm('¿Estás seguro de eliminar este libro?')) {
    axios.delete(`${apiUrl}/libros/${id}`)
      .then(response => {
        alert(response.data.message || 'Libro eliminado correctamente');
        obtenerLibros();
      })
      .catch(error => console.error('Error al eliminar libro:', error));
  }
};

// Envía el formulario para crear o actualizar un libro.
document.getElementById('formularioLibro').addEventListener('submit', e => {
  e.preventDefault();

  const id = document.getElementById('libroId').value;
  const titulo = document.getElementById('libroTitulo').value.trim();
  const descripcion = document.getElementById('libroDescripcion').value.trim();
  const precio = parseFloat(document.getElementById('libroPrecio').value);
  const autor_id = document.getElementById('autorLibro').value;

  if (!titulo || !descripcion || isNaN(precio) || !autor_id) {
    alert('Todos los campos son obligatorios y el precio debe ser numérico.');
    return;
  }

  const libro = { titulo, descripcion, precio, autor_id };

  const request = id
    ? axios.put(`${apiUrl}/libros/${id}`, libro)
    : axios.post(`${apiUrl}/libros`, libro);

  request.then(response => {
    alert(response.data.message || 'Operación exitosa');
    $('#libroModal').modal('hide');
    obtenerLibros();
  })
  .catch(error => console.error('Error al guardar libro:', error));
});

