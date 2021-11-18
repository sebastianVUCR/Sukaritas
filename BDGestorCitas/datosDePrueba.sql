DELETE FROM Profesional;
ALTER TABLE Profesional AUTO_INCREMENT = 1;

DELETE FROM Usuario;
ALTER TABLE Usuario AUTO_INCREMENT = 1;

-- Contraseña original es 12345678
INSERT INTO  Usuario (cedula, rol, intentos, estado, clave)
values ("123456789", "admin", 5, "activo", "$2y$10$J0ZTzje91yg57n7Ps8VsPOO.SA74GFD/ynPnod6L0W1M3vdyRoWMi");
INSERT INTO  Usuario (cedula, rol, intentos, estado, clave)
values ("987654321", "admin", 5, "activo", "$2y$10$J0ZTzje91yg57n7Ps8VsPOO.SA74GFD/ynPnod6L0W1M3vdyRoWMi");
INSERT INTO  Usuario (cedula, rol, intentos, estado, clave)
values ("102030405", "admin", 5, "activo", "$2y$10$J0ZTzje91yg57n7Ps8VsPOO.SA74GFD/ynPnod6L0W1M3vdyRoWMi");
INSERT INTO  Usuario (cedula, rol, intentos, estado, clave)
values ("908070605", "admin", 5, "activo", "$2y$10$J0ZTzje91yg57n7Ps8VsPOO.SA74GFD/ynPnod6L0W1M3vdyRoWMi");
INSERT INTO  Usuario (cedula, rol, intentos, estado, clave)
values ("123454321", "admin", 5, "activo", "$2y$10$J0ZTzje91yg57n7Ps8VsPOO.SA74GFD/ynPnod6L0W1M3vdyRoWMi");


INSERT INTO  Profesional(id, nombre)
values (1, "José María Castro Madriz");
INSERT INTO  Profesional(id, nombre)
values (2, "Juan Rafael Mora Porras");
INSERT INTO  Profesional(id, nombre)
values (3, "Jesús Jiménez Zamora");
INSERT INTO  Profesional(id, nombre)
values (4, "Tomás Guardia Gutiérrez");