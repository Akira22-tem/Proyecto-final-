// Ruta base de la API (ajústala según tu entorno).


document.addEventListener('DOMContentLoaded', () => cargarAutores());

// Cambiar el nombre de la función de cargarAutores a cargarTablaAutores
function cargarTablaAutores() {
  axios.get(`${apiUrl}/autores`)
    .then(function(response) {
      const autores = response.data; // Esta es la respuesta que ahora contiene los datos correctos
      const tablaAutores = document.getElementById('tablaAutores').getElementsByTagName('tbody')[0];
      tablaAutores.innerHTML = '';  // Limpiar la tabla antes de llenarla

      autores.forEach(function(autor) {
        const fila = document.createElement('tr');
        fila.innerHTML = `
          <td>${autor.id}</td>
          <td>${autor.nombre} ${autor.apellido}</td>
          <td>${autor.nacionalidad}</td>
          <td>${autor.fecha_nacimiento}</td>
          <td>
            <button class="btn btn-warning" onclick="editarAutor(${autor.id})">Editar</button>
            <button class="btn btn-danger" onclick="eliminarAutor(${autor.id})">Eliminar</button>
          </td>
        `;
        tablaAutores.appendChild(fila);
      });
    })
    .catch(function(error) {
      console.log('Error al cargar los autores:', error);
    });
}

// Función para abrir el modal para agregar o editar autor.
function abrirModalAutor() {
  document.getElementById('formularioAutor').reset();  // Limpiar el formulario
  document.getElementById('autorId').value = ''; // Asegurarse de que no quede un ID de autor anterior
  document.getElementById('autorModalLabel').innerText = 'Agregar Autor'; // Título del modal
  $('#autorModal').modal('show');  // Mostrar el modal
}

// Función para editar un autor.
function editarAutor(id) {
  axios.get(`${apiUrl}/autores/${id}`)
    .then(response => {
      const autor = response.data;
      document.getElementById('autorId').value = autor.id;
      document.getElementById('autorNombre').value = autor.nombre;
      document.getElementById('autorBiografia').value = autor.biografia;
      document.getElementById('autorModalLabel').innerText = 'Editar Autor'; // Cambiar título del modal
      $('#autorModal').modal('show');  // Mostrar el modal con los datos del autor
    })
    .catch(error => console.error('Error al cargar autor:', error));
}

// Función para eliminar un autor.
function eliminarAutor(id) {
  if (confirm('¿Estás seguro de eliminar este autor?')) {
    axios.delete(`${apiUrl}/autores/${id}`)
      .then(response => {
        alert(response.data.message || 'Autor eliminado correctamente');
        cargarAutores();  // Recargar la lista de autores
      })
      .catch(error => {
        console.error('Error al eliminar autor:', error);
        alert('Ocurrió un error al eliminar el autor.');
      });
  }
}

// Función para guardar el autor (tanto en creación como en actualización).
document.getElementById('formularioAutor').addEventListener('submit', function(e) {
  e.preventDefault();  // Evitar el comportamiento predeterminado del formulario

  const id = document.getElementById('autorId').value;
  const nombre = document.getElementById('autorNombre').value.trim();
  const biografia = document.getElementById('autorBiografia').value.trim();

  if (!nombre || !biografia) {
    alert('Por favor, completa todos los campos.');
    return;
  }

  const payload = { nombre, biografia };

  const request = id ? axios.put(`${apiUrl}/autores/${id}`, payload) : axios.post(`${apiUrl}/autores`, payload);

  request.then(response => {
    $('#autorModal').modal('hide');  // Cerrar el modal después de guardar
    cargarAutores();  // Recargar la lista de autores
    alert(response.data.message || 'Operación exitosa');
  }).catch(error => {
    console.error('Error al guardar autor:', error);
    alert('Ocurrió un error al guardar el autor.');
  });
});