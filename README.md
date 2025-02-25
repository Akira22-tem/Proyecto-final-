
# **Gestión de Libros y Autores**

Este proyecto es una aplicación web para gestionar libros y autores. Permite realizar operaciones CRUD (crear, leer, actualizar y eliminar) sobre las entidades `Libro` y `Autor`.

---

## **Estructura del Proyecto**

```
PROYECTO
├── app
│   ├── controllers
│   │   ├── BookController.php        # Controlador para gestionar los libros
│   │   ├── AuthorController.php      # Controlador para gestionar los autores
│   │   
│   ├── core
│   │   ├── Router.php               # Clase Router para la gestión de las rutas
│   │   ├── route.php                # Configuración de rutas
│   │   
│   ├── models
│   │   ├── Book.php                 # Modelo para la entidad Libro
│   │   └── Author.php               # Modelo para la entidad Autor
│   ├── repositories
│   │   ├── BookRepository.php       # Repositorio que interactúa con la base de datos para los libros
│   │   └── AuthorRepository.php     # Repositorio que interactúa con la base de datos para los autores
│   └── services
│       ├── BookService.php          # Lógica de negocio de libros (servicios)
│       └── AuthorService.php        # Lógica de negocio de autores (servicios)
├── config
│   ├── database.php                # Configuración de la base de datos
│   ├── bs.sql                      # Script para crear la base de datos
│   └── data.sql                    # Datos de ejemplo para poblar la base de datos
├── node_modules
├── public
│   ├── js
│   │   ├── config.js 
│   │   ├── book.js                 # Archivo de JavaScript relacionado con libros
│   │   └── author.js               # Archivo de JavaScript relacionado con autores
│   │   ├── app.js                  # Archivo principal de JavaScript
│   ├── templates
│   │   ├── header.php              # Cabecera HTML
│   │   ├── footer.php              # Pie de página HTML
│   │   
│   ├── .htaccess                   # Configuración para la reescritura de URL
│   ├── gestion_autores.php         # Página de gestión de autores
│   ├── gestion_libros.php          # Página de gestión de libros
│   └── index.php                   # Archivo principal que despacha las rutas
├── package-lock.json               # Información sobre las dependencias instaladas
├── package.json                    # Archivo de configuración de NPM
```

---

## **Tecnologías utilizadas**

- **PHP**: Lenguaje de programación para el backend.
- **MySQL**: Sistema de gestión de bases de datos.
- **JavaScript**: Utilizado para la interacción del frontend con el backend.
- **HTML/CSS**: Para la estructura y el estilo de las páginas web.
- **Apache**: Servidor web.

---

## **Requisitos previos**

Para ejecutar este proyecto en tu máquina local, necesitarás tener instalados los siguientes programas:

- PHP 7.4 o superior.
- MySQL.
- Apache o Nginx.
- Node.js y NPM (para las dependencias del frontend).

---

## **Instalación**

1. Clona este repositorio en tu máquina local:
   ```bash
   git clone <URL_DEL_REPOSITORIO>
   ```

2. Configura la base de datos:
   - Ejecuta el script `bs.sql` para crear la base de datos.
   - Ejecuta el script `data.sql` para poblar la base de datos con datos de ejemplo.

3. Configura los detalles de la base de datos en el archivo `config/database.php`.

4. Instala las dependencias de NPM para el frontend:
   ```bash
   npm install
   ```

5. Inicia el servidor Apache y abre el proyecto en tu navegador.

---

## **Rutas del API**

### **/libros**
- **GET**: Obtiene una lista de todos los libros.
- **POST**: Crea un nuevo libro.
- **PUT**: Actualiza un libro existente.
- **DELETE**: Elimina un libro.

### **/autores**
- **GET**: Obtiene una lista de todos los autores.
- **POST**: Crea un nuevo autor.
- **PUT**: Actualiza un autor existente.
- **DELETE**: Elimina un autor.

---

## **Frontend**

El frontend está compuesto por varias páginas que permiten realizar operaciones sobre los libros y autores.

- **Página de gestión de libros** (`gestion_libros.php`): Permite ver, agregar, editar y eliminar libros.
- **Página de gestión de autores** (`gestion_autores.php`): Permite ver, agregar, editar y eliminar autores.

---

## **Contribuciones**

Las contribuciones son bienvenidas. Si deseas colaborar, por favor sigue estos pasos:

1. Haz un fork del repositorio.
2. Crea una nueva rama para tu funcionalidad (`git checkout -b nueva-funcionalidad`).
3. Realiza los cambios necesarios y haz un commit (`git commit -am 'Añadir nueva funcionalidad'`).
4. Sube tus cambios (`git push origin nueva-funcionalidad`).
5. Abre un pull request en GitHub.

---

## **Licencia**

Este proyecto está bajo la Licencia MIT. Consulta el archivo `LICENSE` para más detalles.

---

Si tienes alguna pregunta, no dudes en abrir un issue o enviarnos un pull request.

---

Este archivo `README.md` proporciona una descripción general, instrucciones de instalación y otros detalles importantes para que los desarrolladores puedan comprender y trabajar con tu proyecto. Puedes modificarlo o agregar más detalles según lo que creas necesario.
