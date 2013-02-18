
/*============================================================================*/
/* template register                                                          */
/*============================================================================*/
INSERT INTO `template`
(`label`)
VALUES
('martadero');

/*============================================================================*/
/* layout register                                                            */
/*============================================================================*/
INSERT INTO `template_layout`
(`template`, `label`)
VALUES
('martadero', 'frontpage'),
('martadero', 'static'),
('martadero', 'user');

/*============================================================================*/
/* regions register                                                           */
/*============================================================================*/
-- INSERT INTO `template_region`
-- (`template`, `label`, `type`)
-- VALUES
-- ('martadero', 'header',     'static'),
-- ('martadero', 'menubar',    'container'),
-- ('martadero', 'toolbar',    'list'),
-- ('martadero', 'sub-header', 'container'),
-- ('martadero', 'messages',   'messenger'),
-- ('martadero', 'left',       'container'),
-- ('martadero', 'right',      'container'),
-- ('martadero', 'foot-bar',   'static'),
-- ('martadero', 'footer',     'menu');

/*============================================================================*/
/* regions in each layout register                                            */
/*============================================================================*/
-- INSERT INTO `template_layout_region`
-- (`template`, `layout`, `region`)
-- VALUES
-- ('martadero', 'frontpage', 'header'),
-- ('martadero', 'frontpage', 'menubar'),
-- ('martadero', 'frontpage', 'toolbar'),
-- ('martadero', 'frontpage', 'sub-header'),
-- ('martadero', 'frontpage', 'messages'),
-- ('martadero', 'frontpage', 'left'),
-- ('martadero', 'frontpage', 'right'),
-- ('martadero', 'frontpage', 'foot-bar'),
-- ('martadero', 'frontpage', 'footer'),
-- 
-- ('martadero', 'static', 'header'),
-- ('martadero', 'static', 'menubar'),
-- ('martadero', 'static', 'toolbar'),
-- ('martadero', 'static', 'sub-header'),
-- ('martadero', 'static', 'messages'),
-- ('martadero', 'static', 'left'),
-- ('martadero', 'static', 'foot-bar'),
-- ('martadero', 'static', 'footer'),
-- 
-- ('martadero', 'user', 'header'),
-- ('martadero', 'user', 'menubar'),
-- ('martadero', 'user', 'toolbar'),
-- ('martadero', 'user', 'messages'),
-- ('martadero', 'user', 'left'),
-- ('martadero', 'user', 'foot-bar');

/*============================================================================*/
/* layout in each route register                                              */
/*============================================================================*/
 INSERT INTO `template_layout_route`
(`template`, `layout`, `route`)
SELECT 'martadero' as template, 'user' as layout, route FROM route;
UPDATE template_layout_route SET layout = 'frontpage' WHERE route = 'base';
UPDATE template_layout_route SET layout = 'static' WHERE route = 'base_static';

/*============================================================================*/
/* widgets register                                                           */
/*============================================================================*/
-- INSERT INTO `template_widget`
-- (`template`, `label`, `type`)
-- VALUES
-- ('martadero', 'blog',                ''),
-- ('martadero', 'calendario',          ''),
-- ('martadero', 'comparte',            ''),
-- ('martadero', 'contactos',           ''),
-- ('martadero', 'convocatorias',       ''),
-- ('martadero', 'descargas',           ''),
-- ('martadero', 'eje-tematico',        ''),
-- ('martadero', 'ingresar',            ''),
-- ('martadero', 'logo',                ''),
-- ('martadero', 'menu-administracion', ''),
-- ('martadero', 'menu-lateral',        ''),
-- ('martadero', 'menu-principal',      ''),
-- ('martadero', 'participar',          ''),
-- ('martadero', 'podcast',             ''),
-- ('martadero', 'servicios',           ''),
-- ('martadero', 'social',              '');

/*============================================================================*/
/* widget in each region in each layout register                              */
/*============================================================================*/
-- INSERT INTO `template_layout_region_widget`
-- (`template`, `layout`, `region`, `widget`)
-- VALUES
-- ('martadero', 'frontpage', 'menubar',    'menu-principal'),
-- ('martadero', 'frontpage', 'menubar',    'social'),
-- ('martadero', 'frontpage', 'sub-header', 'logo'),
-- ('martadero', 'frontpage', 'sub-header', 'servicios'),
-- ('martadero', 'frontpage', 'sub-header', 'participar'),
-- ('martadero', 'frontpage', 'left',       'calendario'),
-- ('martadero', 'frontpage', 'left',       'eje-tematico'),
-- ('martadero', 'frontpage', 'left',       'menu-lateral'),
-- ('martadero', 'frontpage', 'left',       'ingresar'),
-- ('martadero', 'frontpage', 'left',       'contactos'),
-- ('martadero', 'frontpage', 'left',       'comparte'),
-- ('martadero', 'frontpage', 'right',      'podcast'),
-- ('martadero', 'frontpage', 'right',      'blog'),
-- ('martadero', 'frontpage', 'right',      'convocatorias'),
-- ('martadero', 'frontpage', 'right',      'descargas'),
-- 
-- ('martadero', 'static', 'menubar',    'menu-principal'),
-- ('martadero', 'static', 'menubar',    'social'),
-- ('martadero', 'static', 'sub-header', 'logo'),
-- ('martadero', 'static', 'sub-header', 'servicios'),
-- ('martadero', 'static', 'sub-header', 'participar'),
-- ('martadero', 'static', 'left',       'eje-tematico'),
-- ('martadero', 'static', 'left',       'menu-lateral'),
-- ('martadero', 'static', 'left',       'ingresar'),
-- ('martadero', 'static', 'left',       'comparte'),
-- 
-- ('martadero', 'user', 'menubar',    'menu-principal'),
-- ('martadero', 'user', 'menubar',    'social'),
-- ('martadero', 'user', 'left',       'menu-administracion');

/*============================================================================*/
/* defaults users register                                                    */
/*============================================================================*/
INSERT INTO `user`
(`email`, `password`, `lastname`, `firstname`, `phone`)
VALUES
('info@martadero.org', '63ca26f56c5730ede6b21c7b681b917e2fb37765', 'mARTadero', 'Comunicación', '67402891');

/*============================================================================*/
/* change to customized routes for martadero                                  */
/*============================================================================*/
UPDATE route SET mapping = 'arte-cultura/:page' WHERE route = 'base_static';
UPDATE route SET mapping = 'confirmacion' WHERE route = 'base_confirm';
UPDATE route SET mapping = 'usuarios' WHERE route = 'users_list';
UPDATE route SET mapping = 'usuarios/administrador' WHERE route = 'users_manager';
UPDATE route SET mapping = 'perfil' WHERE route = 'users_settings';
UPDATE route SET mapping = 'acceder' WHERE route = 'users_in';
UPDATE route SET mapping = 'salir' WHERE route = 'users_out';
UPDATE route SET mapping = 'salas' WHERE route = 'resources_list';
UPDATE route SET mapping = 'salas/:resource' WHERE route = 'resources_resource_view';

/*============================================================================*/
/* setting the resources of martadero                                         */
/*============================================================================*/
INSERT INTO `resource`
(`code`, `shape`, `coords`, `label`, `description1`, `description2`, `description3`, `capacity`)
VALUES
('A1',   'rect', '94,113,132,259', 'Playa Grande',
 'Mega espacio central: Artes Escénicas. Música, Interacción Social, Música, Audiovisual, Artes Visuales y Fotografía.',
 'Sala de exposiciones, proyecciones, seminarios, talleres, puestas en escena (teatro y danza), ensayos, set de filmación.',
 'Sala de exposiciones, proyecciones, seminarios, talleres, puestas en escena (teatro y danza), ensayos, set de filmación.',
 '200 personas sentadas / 400 personas de pie.'),
('A2',   'rect', '136,133,166,239', 'Sala de chanchos',
 'Exposiciones de artes visuales, presentaciones de  libros, talleres.',
 'Sala múltiple.',
 'Exposicion, presentaciones de libros, talleres.',
 '140 personas sentadas / 280 personas de pie.'),
('A3',   'rect', '60,188,91,239', 'Trozadero',
 'Sala de proyección.',
 'Ensayos, exposiciones, presentación de libros, tertulias literarias, talleres...',
 'Sala de ensayo, sala de exposiciones, presentación de libros, tertulias literárias, talleres.',
 '56 personas sentadas / 100 personas de pie.'),
('A4',   'rect', '60,133,91,185', 'Playa chica',
 'Sala de ensayo, teatro de cámara y talleres.',
 'Sala de exposiciones, proyecciones.',
 'Sala de ensayo, teatro de cámara y talleres.',
 '56 personas sentadas / 100 personas de pie.'),

('B1',   'rect', '51,10,74,70', 'Sala de los cueros',
 'Taller infantil de libre expresión.',
 'Sala de proyecciones, ensayos.',
 'Taller de libre expresión para niños.',
 '40 personas sentadas / 80 personas de pie.'),
('B2',   'rect', '154,10,178,70', 'Sala de la carne robada',
 'Sala de exposición / filmaciones / ensayos.',
 'Exposiciones de artes visuales y fotogafia, instalaciones.',
 'Sala de exposición / filmaciones / ensayos',
 '40 personas sentadas / 80 personas de pie.'),
('B3',   'rect', '79,10,89,34', 'Lavadero de cueros',
 'Cocineta para taller.',
 '',
 '',
 ''),
('B4',   'rect', '94,10,111,34', 'Ovejaducto',
 'Baños Educativos.',
 '',
 'Educación Ambiental',
 ''),

('B5',   'rect', '125,10,149,34', 'Baños',
 'Baños.',
 '',
 '',
 ''),

('C1',   'rect', '6,75,28,170', 'Sala de corderos',
 'Sala de exposiciones.',
 'Sala de ensayos.',
 'Sala de ensayos.',
 '80 personas sentadas / 200 personas de pie.'),
('C2',   'rect', '6,175,28,202', 'Sala de corderos 2',
 'Espacio reservado para laboratorio de fotografía.',
 'Almacén.',
 'Sala de exposiciones.',
 '10 personas sentadas / 30 personas de pie.'),
('C3',   'rect', '6,208,28,241', 'Pi Producciones :: Santo de los mañazos',
 'Pi Producciones : Productora Independiente.',
 '',
 'Espacio profesional de grabación.',
 ''),
('C4',   'rect', '6,247,28,297', 'Escenario al Aire Libre (Sala de suyus)',
 'Espacio reservado para eventos al aire libre.',
 'Conciertos / Teatro / Baile / Danza / Presentaciones.',
 'Conciertos / Teatro / Baile / Danza / Presentaciones.',
 ''),
('C6',   'rect', '33,331,54,349', 'Veterinaria',
 'Oficina de gestión mARTadero y FI.',
 '',
 '',
 '20 personas.'),
('C7',   'rect', '61,331,82,349', 'Administración',
 'Secretaria de información.',
 '',
 '',
 '20 personas.'),

('D1',   'rect', '202,74,221,118', 'Sala Hub - Sala Visceral 1',
 'Sala de videoconferencias y talleres.',
 'Sala de proyecciones.',
 'Sala de videoconferencias y talleres.',
 '30 personas sentadas / 70 personas de pie.'),
('D2',   'rect', '202,124,221,170', 'Sala formARTe - Sala Visceral 2',
 'Sala de talleres.',
 'Proyecciones / Reuniones.',
 'Talleres.',
 '30 personas sentadas / 70 personas de pie.'),
('D3',   'rect', '202,175,221,207', 'Sala Visceral 3',
 'Espacio ocupado provisionalmente por el Gobierno Municipal de Cochabamba como deposito.',
 '',
 'Espacio ocupado provisionalmente por el Gobierno Municipal de Cochabamba como deposito.',
 ''),
('D4',   'rect', '202,212,221,244', 'Sala Visceral 4',
 'Espacio destinado a sala de exposiciones.',
 '',
 'Área de deposito café cultural ÍTACA.',
 '25 personas sentadas / 50 personas de pie'),
('D5',   'rect', '200,251,221,298', 'Café Itaca - Colgadero de cueros',
 'Café Cultural ITACA.',
 'Tertulias literarias, conciertos y proyecciones de pequeño formato.',
 'Café Cultural ÍTACA.',
 '40 personas dentro / 120 fuera.'),
('D6',   'rect', '202,304,221,319', 'Dirección',
 'Dirección.',
 '',
 '',
 ''),
('D7',   'rect', '143,330,195,349', 'Cantina',
 'Espacio destinado a Fundación Imagen (gestión y producción cultural).',
 '',
 '',
 '20 personas'),

('D6pb', 'rect', '202,342,221,353', 'LabDigital - Sala de patas',
 'Espacio destinado a laboratorio de arte digital.',
 'Laboratorio Digital',
 'En remodelación.',
 '10 personas.'),
('D6pa', 'rect', '202,322,221,336', 'Residencia de Artistas NORTE - Burdel',
 'Residencia de artistas NORTE.',
 '',
 'Habilitada.',
 '6 personas'),
('C6pa', 'rect', '6,304,26,322', 'Residencia de Artistas SUR',
 'Residencias de artistas.',
 '',
 'Residencia de artistas.',
 '8 personas'),

('E1',   'rect', '7,12,46,70', 'Sala de las cabezas',
 'Expresión corporal contemporánea.',
 'Ensayos y presentaciones.',
 'Escuela de Break Dance / Ensayos / Presentaciones.',
 '80 personas sentadas / 130 personas de pie.'),
('E2',   'rect', '183,8,224,68', 'Zona del chancho pelado',
 'Vivienda familiar - Portería - y depósito.',
 '',
 '',
 ''),

('F1',   'circle', '112,296,20', 'Patio de carga',
 'Uso múltiple y terraza Itaca.',
 'Espacios abiertos',
 'Terraza Ítaca.',
 '300'),
('F2',   'circle', '113,76,21', 'Jardín Ecológico',
 'Educación Medioambiental para niñ@s.',
 'Lugar de relajación',
 '',
 '');


