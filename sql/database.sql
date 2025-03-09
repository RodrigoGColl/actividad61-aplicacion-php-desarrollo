
CREATE DATABASE IF NOT EXISTS actividad61RGC;
USE actividad61RGC;

CREATE TABLE personajes (
    personaje_id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL,
    raza VARCHAR(30) NOT NULL,
    clase VARCHAR(30) NOT NULL,
    nivel INT NOT NULL,
    faccion VARCHAR(20) NOT NULL
);

INSERT INTO personajes (nombre, raza, clase, nivel, faccion) VALUES
('Thrall', 'Orco', 'Chamán', 60, 'Horda'),
('Jaina Proudmoore', 'Humana', 'Maga', 60, 'Alianza'),
('Sylvanas Windrunner', 'Elfa Nocturna', 'Cazadora', 60, 'Horda'),
('Anduin Wrynn', 'Humano', 'Sacerdote', 60, 'Alianza'),
('Illidan Stormrage', 'Elfo de la Noche', 'Cazador de Demonios', 60, 'Neutral'),
('Tyrande Whisperwind', 'Elfa de la Noche', 'Sacerdotisa', 60, 'Alianza'),
('Voljin', 'Trol', 'Cazador de Sombras', 60, 'Horda'),
('Genn Cringrís', 'Huargen', 'Guerrero', 60, 'Alianza'),
('Kaelthas Sunstrider', 'Elfo de Sangre', 'Mago', 60, 'Horda'),
('Malfurion Stormrage', 'Elfo de la Noche', 'Druida', 60, 'Alianza');
