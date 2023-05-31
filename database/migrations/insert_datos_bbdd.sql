use explorasenderos;

INSERT INTO Usuario (
    nombre,
    primerapellido,
    segundoapellido,
    correo,
    contrasena,
    telefono
  )
VALUES
  (
    'Maria',
    'González',
    'López',
    'maria.gonzalez@example.com',
    'contraseña123',
    '123456789'
  ),
  (
    'Pedro',
    'Fernández',
    'Ruiz',
    'pedro.fernandez@example.com',
    'contraseña456',
    '987654321'
  ),
  (
    'Lucía',
    'Sánchez',
    'Gómez',
    'lucia.sanchez@example.com',
    'contraseña789',
    '654321987'
  ),
  (
    'Carlos',
    'Hernández',
    'Martínez',
    'carlos.hernandez@example.com',
    'contraseña012',
    '456789123'
  ),
  (
    'Laura',
    'Pérez',
    'Sánchez',
    'laura.perez@example.com',
    'contraseña345',
    '321654987'
  ),
  (
    'Antonio',
    'Ruiz',
    'García',
    'antonio.ruiz@example.com',
    'contraseña678',
    '987123456'
  );


INSERT INTO Nivel (Color, Tipo)
VALUES
  ('Verde', 'Principiante'),
  ('Azul', 'Intermedio'),
  ('Rojo', 'Avanzado'),
  ('Negro', 'Experto'),
  ('Blanco', 'Iniciación'),
  ('Amarillo', 'Técnico');


INSERT INTO Tipo (Tipo, Descripcion)
VALUES
  ('Montaña', 'Rutas por montañas y senderos'),
  ('Urbana', 'Rutas urbanas y parques'),
  ('Playa', 'Rutas por la playa y costa'),
  ('Bosque', 'Rutas por bosques y caminos rurales'),
  ('Cultural', 'Rutas culturales y turísticas'),
  ('Gastronómica', 'Rutas gastronómicas y enología');

INSERT INTO Ruta
VALUES
  (
    FK_IdUsuario,
    FK_IdNivel,
    Nombre,
    Descripcion,
    Fecha,
    Hora,
    Fotografia,
    Tiempo,
    Kilometros
  )
VALUES
  (
    1,
    2,
    'Ruta de montaña',
    'Ruta por la montaña con vistas panorámicas',
    '2022-05-01',
    '08:00:00',
    'foto.jpg',
    '2h',
    10
  ),
  (
    1,
    1,
    'Ruta por el bosque',
    'Ruta por el bosque con mucha vegetación',
    '2022-05-05',
    '10:30:00',
    NULL,
    '1h30min',
    5
  ),
  (
    2,
    3,
    'Ruta por el lago',
    'Ruta alrededor del lago con hermosas vistas',
    '2022-05-10',
    '14:00:00',
    'foto2.jpg',
    '3h',
    15
  ),
  (
    3,
    2,
    'Ruta de escalada',
    'Ruta de escalada en la montaña',
    '2022-05-15',
    '09:00:00',
    'foto3.jpg',
    '4h',
    12
  ),
  (
    2,
    1,
    'Ruta de senderismo',
    'Ruta de senderismo con vistas al mar',
    '2022-05-20',
    '11:00:00',
    NULL,
    '2h30min',
    7
  ),
  (
    3,
    3,
    'Ruta en bicicleta',
    'Ruta en bicicleta por el campo',
    '2022-05-25',
    '17:00:00',
    'foto4.jpg',
    '2h',
    20
  );


INSERT INTO Comentarios (Fechahoracomentario, FK_IdUsuario, FK_IdRuta, Descripcion, Puntuacion)
  VALUES 
    ('2023-05-06 10:00:00', 1, 1, 'Este es el primer comentario', 5),
    ('2023-05-06 10:10:00', 2, 1, 'Este es el segundo comentario', 4),
    ('2023-05-06 10:20:00', 3, 2, 'Este es el tercer comentario', 3),
    ('2023-05-06 10:30:00', 4, 2, 'Este es el cuarto comentario', 2),
    ('2023-05-06 10:40:00', 5, 3, 'Este es el quinto comentario', 1),
    ('2023-05-06 10:50:00', 6, 3, 'Este es el sexto comentario', 5);