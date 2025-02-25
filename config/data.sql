-- Crear la tabla de autores
CREATE TABLE IF NOT EXISTS autores (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    apellido VARCHAR(100) NOT NULL,
    nacionalidad VARCHAR(100),
    fecha_nacimiento DATE
);

-- Crear la tabla de libros (relacionada con autores)
CREATE TABLE IF NOT EXISTS libros (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(200) NOT NULL,
    descripcion TEXT,
    precio DECIMAL(10,2) NOT NULL,
    autor_id INT NOT NULL,
    FOREIGN KEY (autor_id) REFERENCES autores(id) ON DELETE CASCADE
);

-- Insertar algunos registros de ejemplo en la tabla autores
INSERT INTO autores (nombre, apellido, nacionalidad, fecha_nacimiento) VALUES 
('Gabriel', 'García Márquez', 'Colombiana', '1927-03-06'),
('Isabel', 'Allende', 'Chilena', '1942-08-02'),
('Jorge Luis', 'Borges', 'Argentina', '1899-08-24'),
('Mario', 'Vargas Llosa', 'Peruana', '1936-03-28'),
('Laura', 'Esquivel', 'Mexicana', '1950-09-30');

-- Insertar registros de ejemplo en la tabla libros
INSERT INTO libros (titulo, descripcion, precio, autor_id) VALUES 
('Cien años de soledad', 'Una obra maestra de la literatura latinoamericana.', 20.99, 1),
('La casa de los espíritus', 'Novela que mezcla la historia con la fantasía.', 18.50, 2),
('Ficciones', 'Colección de cuentos fantásticos y filosóficos.', 15.75, 3),
('La ciudad y los perros', 'Novela que explora la vida militar en Lima.', 17.99, 4),
('Como agua para chocolate', 'Historia de amor y cocina en el México revolucionario.', 14.25, 5);
