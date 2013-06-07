
/*============================================================================*/
/* defaults roles register                                                    */
/*============================================================================*/
INSERT INTO `role`
(`label`, `description`)
VALUES
('administrador', 'Usuario con poderes ilimitados dentro del sistema'),
('coordinador',   'Usuario encargado de la coordinacion de un area especifica'),
('artista',       'Usuario que figura como artista dentro del sistema'),
('usuario',       'Usuario normal, sin ninguna funcion especial dentro del sistema');
