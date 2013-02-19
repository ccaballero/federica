
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
INSERT INTO `template_region`
(`template`, `label`, `type`)
VALUES
('martadero', 'header',     'static'),
('martadero', 'menubar',    'static'),
('martadero', 'toolbar',    'static'),
('martadero', 'sub-header', 'static'),
('martadero', 'messages',   'static'),
('martadero', 'left',       'static'),
('martadero', 'right',      'static'),
('martadero', 'foot-bar',   'static'),
('martadero', 'footer',     'static');

/*============================================================================*/
/* regions in each layout register                                            */
/*============================================================================*/
INSERT INTO `template_layout_region`
(`template`, `layout`, `region`)
VALUES
('martadero', 'frontpage', 'header'),
('martadero', 'frontpage', 'menubar'),
('martadero', 'frontpage', 'toolbar'),
('martadero', 'frontpage', 'sub-header'),
('martadero', 'frontpage', 'messages'),
('martadero', 'frontpage', 'left'),
('martadero', 'frontpage', 'right'),
('martadero', 'frontpage', 'foot-bar'),
('martadero', 'frontpage', 'footer'),

('martadero', 'static', 'header'),
('martadero', 'static', 'menubar'),
('martadero', 'static', 'toolbar'),
('martadero', 'static', 'sub-header'),
('martadero', 'static', 'messages'),
('martadero', 'static', 'left'),
('martadero', 'static', 'foot-bar'),
('martadero', 'static', 'footer'),

('martadero', 'user', 'header'),
('martadero', 'user', 'menubar'),
('martadero', 'user', 'toolbar'),
('martadero', 'user', 'messages'),
('martadero', 'user', 'left'),
('martadero', 'user', 'foot-bar');

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

UPDATE route SET mapping = 'salas' WHERE route = 'rooms_list';
UPDATE route SET mapping = 'salas/administrador' WHERE route = 'rooms_manager';
UPDATE route SET mapping = 'salas/:room' WHERE route = 'rooms_room_view';

/*============================================================================*/
/* setting the resources of martadero                                         */
/*============================================================================*/
INSERT INTO `room`
(`code`, `shape`, `coords`, `label`, `type`, `description1`, `description2`, `description3`, `description4`, `capacity`)
VALUES
('A1',   'rect', '94,113,132,259', 'Playa Grande', 'A',
 'Mega espacio central: Artes Escénicas. Música, Interacción Social, Música, Audiovisual, Artes Visuales y Fotografía.',
 'Sala de exposiciones, proyecciones, seminarios, talleres, puestas en escena (teatro y danza), ensayos, set de filmación.',
 'Sala de exposiciones, proyecciones, seminarios, talleres, puestas en escena (teatro y danza), ensayos, set de filmación.',
 '<p>Cielo raso en yeso sobre estructura de madera a 7 m. de altura. No es aconsejable colgar elementos pesados de la estructura, pero s&iacute;&shy; existen vigas met&aacute;licas resistentes a 4 m. de altura.</p>\n<p>La iluminaci&oacute;n artificial emerge del cielo falso. Toma corrientes cada 3 m. en todo el per&iacute;&shy;metro y otra linea de toma corriente a 4 m del piso en la l&iacute;nea de las vigas.</p>\n<p>Es posible fijar o colgar objetos de las paredes (Rev. yeso sobre piedra y ladrillo). Piso de cemento enlucido, condiciones regulares. Se recomienda revestimiento vin&iacute;&shy;lico o tapiz&oacute;n para un mejor desarrollo de las actividades.</p>\n<p>Cuenta con una puerta principal delantera de ingreso corrediza de metal, otra puerta trasera de metal peque&ntilde;a. Ademas de una puerta de madera que conecta a la sala de ensayos a4.</p>',
 '200 personas sentadas / 400 personas de pie.'),
('A2',   'rect', '136,133,166,239', 'Sala de chanchos', 'A',
 'Exposiciones de artes visuales, presentaciones de  libros, talleres.',
 'Sala múltiple.',
 'Exposicion, presentaciones de libros, talleres.',
 '<p>Cielo raso en yeso sobre estructura de madera. No es aconsejable colgar elementos pesados de la estructura. La iluminaci&oacute;n artificial emerge del cielo falso. Cuenta con dos rieles de iluminaci&oacute;n direccional que de acuerdo a la necesidad son modificables en altura. Toma corrientes cada 3 m. en todo el per&iacute;&shy;metro. Es posible fijar o colgar objetos de las paredes (Rev. yeso sobre piedra y ladrillo). Piso de cemento enlucido, condiciones regulares.</p>\n<p>Cuenta con dos puertas de metal (delantera y trasera) , corredizas y con ventas de luz directa con vista norte, que pueden ser cubierta o no de acuerdo a la propuesta o necesidad de la misma.</p>',
 '140 personas sentadas / 280 personas de pie.'),
('A3',   'rect', '60,188,91,239', 'Trozadero', 'T',
 'Sala de proyección.',
 'Ensayos, exposiciones, presentación de libros, tertulias literarias, talleres...',
 'Sala de ensayo, sala de exposiciones, presentación de libros, tertulias literárias, talleres.',
 '<p>Pared blanca para proyecci&oacute;n directa, ventanas cubiertas, cielo raso en yeso sobre estructura de madera. No es aconsejable colgar elementos pesados de la estructura.</p>\n<p>Existe una viga met&aacute;lica resistente cerca del &aacute;rea de proyecci&oacute;n. La iluminaci&oacute;n artificial emerge del cielo falso.</p>\n<p>Tomacorrientes cada 3 m.&nbsp; en todo el per&iacute;&shy;metro.&nbsp; Piso de cemento enlucido, condiciones regulares.</p>\n<p>Se recomienda revestimiento vin&iacute;&shy;lico o&nbsp; tapiz&oacute;n para un mejor desarrollo de las actividades.</p>',
 '56 personas sentadas / 100 personas de pie.'),
('A4',   'rect', '60,133,91,185', 'Playa chica', 'A',
 'Sala de ensayo, teatro de cámara y talleres.',
 'Sala de exposiciones, proyecciones.',
 'Sala de ensayo, teatro de cámara y talleres.',
 '<p>Cielo raso en yeso sobre estructura de madera a 5m. de altura. No es aconsejable colgar elementos pesados de la estructura. La iluminaci&oacute;n artificial emerge del cielo falso. Tomacorrientes cada 3m. en todo el per&iacute;&shy;metro. Piso de cemento enlucido, condiciones regulares. Se recomienda revestimiento vin&iacute;&shy;lico o tapiz&oacute;n para un mejor desarrollo de las actividades. Presencia de una estructura de fierro para el colgado de luces. Pared con revestimiento de yeso de 1/3 teniendo el resto pared vista de ladrillo. Puerta de metal corrediza con salida independiente y otrcon acceso a la nave central a1. Ventas con vista sur e ingreso de luz directa.</p>',
 '56 personas sentadas / 100 personas de pie.'),

('B1',   'rect', '51,10,74,70', 'Sala de los cueros', 'A',
 'Taller infantil de libre expresión.',
 'Sala de proyecciones, ensayos.',
 'Taller de libre expresión para niños.',
 '<p>Cielo raso en yeso sobre estructura de madera. No es aconsejable colgar elementos pesados de la estructura. La iluminaci&oacute;n artificial emerge del cielo falso. Es posible fijar o colgar objetos de las paredes (Rev. yeso sobre adobe). Revestimiento de cer&aacute;mica&nbsp; en piso, condiciones buenas. Cuenta con un &aacute;rea destinada a cocineta con lavado y meson. Puertas&nbsp; y ventanas de madera. Tomacorrientes cada 3 m. sobre pared con cable canal.</p>',
 '40 personas sentadas / 80 personas de pie.'),
('B2',   'rect', '154,10,178,70', 'Sala de la carne robada', 'T',
 'Sala de exposición / filmaciones / ensayos.',
 'Exposiciones de artes visuales y fotogafia, instalaciones.',
 'Sala de exposición / filmaciones / ensayos',
 '<p>Espacio dedicado al almacenamiento de los utensilios necesarios para el montaje y desarrollo de las exposiciones y actividades del proyecto.</p>',
 '40 personas sentadas / 80 personas de pie.'),
('B3',   'rect', '79,10,89,34', 'Lavadero de cueros', 'N',
 'Cocineta para taller.',
 '',
 '',
 '',
 ''),
('B4',   'rect', '94,10,111,34', 'Ovejaducto', 'N',
 'Baños Educativos.',
 '',
 'Educación Ambiental',
 'Espacio utilizado dentro del Taller de Libre Expresión y Educación Medioambiental para la enseñanza y concienciación de la importancia del agua y la higiene personal.',
 ''),
('B5',   'rect', '125,10,149,34', 'Baños', 'N',
 'Baños.',
 '',
 '',
 '',
 ''),

('C1',   'rect', '6,75,28,170', 'Sala de corderos', 'A',
 'Sala de exposiciones.',
 'Sala de ensayos.',
 'Sala de ensayos.',
 'Cielo falso en tela.\nNo es aconsejable colgar elementos pesados de la estructura.\nEs posible fijar o colgar objetos de las paredes (Rev. yeso sobre revoque de cemento).\nLa iluminación artificial está fijada a la estructura de la cubierta.\nRevestimiento de cemento enlucido en piso, condiciones regulares.',
 '80 personas sentadas / 200 personas de pie.'),
('C2',   'rect', '6,175,28,202', 'Sala de corderos 2', 'A',
 'Espacio reservado para laboratorio de fotografía.',
 'Almacén.',
 'Sala de exposiciones.',
 'No cuenta con revestimiento interior en el techo.\nCuenta con toma de agua e instalaciones de saneamiento básico.\nNo es aconsejable colgar elementos pesados de la estructura.\nEs posible fijar o colgar objetos de las paredes (Rev. yeso sobre adobe y ladrillo).\nLa iluminación artificial esta fijada a la estructura de la cubierta.\nRevestimiento de cemento enlucido en piso, condiciones regulares.',
 '10 personas sentadas / 30 personas de pie.'),
('C3',   'rect', '6,208,28,241', 'Pi Producciones :: Santo de los mañazos', 'N',
 'Pi Producciones : Productora Independiente.',
 '',
 'Espacio profesional de grabación.',
 '<p>Se graban bandas, solistas, orquestas de c&aacute;mara, grupos de cualquier tama&ntilde;o y formato.</p>\n<p>Producciones originales, m&uacute;sica para pel&iacute;culas, etc.</p>\n<p>Audio post-producci&oacute;n, tracking, mezcla y masterizaci&oacute;n por separado.</p>\n<p>Grabaciones profesionales de conciertos en vivo.</p>',
 ''),
('C4',   'rect', '6,247,28,297', 'Escenario al Aire Libre (Sala de suyus)', 'A',
 'Espacio reservado para eventos al aire libre.',
 'Conciertos / Teatro / Baile / Danza / Presentaciones.',
 'Conciertos / Teatro / Baile / Danza / Presentaciones.',
 '<p>Un espacio ideal para eventos al aire libre: conciertos, representaciones teatrales,... Con posibilidad de abrirse en ambos sentidos, hacia el mARTadero y hacia la calle Ollantay, para una interacci&oacute;n m&aacute;s directa con el barrio.</p>',
 ''),
('C6',   'rect', '33,331,54,349', 'Veterinaria', 'N',
 'Oficina de gestión mARTadero y FI.',
 '',
 '',
 '<p>Espacio dedicado a trabajo operativo del proyecto mARTadero y Fundaci&oacute;n Imagen.</p>',
 '20 personas.'),
('C7',   'rect', '61,331,82,349', 'Administración', 'N',
 'Secretaria de información.',
 '',
 '',
 '',
 '20 personas.'),

('D1',   'rect', '202,74,221,118', 'Sala Hub - Sala Visceral 1', 'T',
 'Sala de videoconferencias y talleres.',
 'Sala de proyecciones.',
 'Sala de videoconferencias y talleres.',
 '<p>No cuenta con revestimiento interior en el techo. No es aconsejable colgar elementos pesados de la estructura. La iluminaci&oacute;n artificial est&aacute; fijada a la estructura. Es posible fijar o colgar objetos de las paredes (Rev. yeso sobre adobe). Revestimiento de cemento enlucido en piso, condiciones regulares.</p>',
 '30 personas sentadas / 70 personas de pie.'),
('D2',   'rect', '202,124,221,170', 'Sala formARTe - Sala Visceral 2', 'T',
 'Sala de talleres.',
 'Proyecciones / Reuniones.',
 'Talleres.',
 '<p>No cuenta con revestimiento interior en el techo. No es aconsejable colgar elementos pesados de la estructura. La iluminaci&oacute;n artificial est&aacute; fijada a la estructura. Es posible fijar o colgar objetos de las paredes (Rev. yeso sobre revoque de cemento). Revestimiento de cemento enlucido en piso, condiciones regulares.</p>',
 '30 personas sentadas / 70 personas de pie.'),
('D3',   'rect', '202,175,221,207', 'Sala Visceral 3', 'N',
 'Espacio ocupado provisionalmente por el Gobierno Municipal de Cochabamba como deposito.',
 '',
 'Espacio ocupado provisionalmente por el Gobierno Municipal de Cochabamba como deposito.',
 '<p>No cuenta con revestimiento interior en el techo. No es aconsejable colgar elementos pesados de la estructura. La iluminaci&oacute;n artificial est&aacute; fijada a la estructura. Es posible fijar o colgar objetos en las paredes (Rev. yeso sobre revoque de cemento). Revestimiento de cemento enlucido en piso, condiciones regulares.</p>',
 ''),
('D4',   'rect', '202,212,221,244', 'Sala Visceral 4', 'T',
 'Espacio destinado a sala de exposiciones.',
 '',
 'Área de deposito café cultural ÍTACA.',
 '<p>No cuenta con revestimiento interior en el techo. No es aconsejable colgar elementos pesados de la estructura. Iluminaci&oacute;n artificial est&aacute; fijada a la estructura. Es posible fijar o colgar objetos en las paredes (Rev. yeso sobre revoque de cemento). Revestimiento de cemento enlucido en piso, condiciones regulares.</p>',
 '25 personas sentadas / 50 personas de pie'),
('D5',   'rect', '200,251,221,298', 'Café Itaca - Colgadero de cueros', 'T',
 'Café Cultural ITACA.',
 'Tertulias literarias, conciertos y proyecciones de pequeño formato.',
 'Café Cultural ÍTACA.',
 '<p>Caf&eacute; Cultural ITACA.</p>',
 '40 personas dentro / 120 fuera.'),
('D6',   'rect', '202,304,221,319', 'Dirección', 'N',
 'Dirección.',
 '',
 '',
 '<p>Espacio dedicado a oficina operativa para uso de Direcci&oacute;n y administraci&oacute;n del proyecto mARTadero.</p>',
 ''),
('D7',   'rect', '143,330,195,349', 'Cantina', 'N',
 'Espacio destinado a Fundación Imagen (gestión y producción cultural).',
 '',
 '',
 'Espacio habilitado con una mesa de reuniones y 10 sillas para realizar reuniones del equipo operativo.\nCuenta además con dos escritorios y dos computadoras conectadas a Internet para poder trabajar in situ.',
 '20 personas'),

('D6pb', 'rect', '202,342,221,353', 'LabDigital - Sala de patas', 'T',
 'Espacio destinado a laboratorio de arte digital.',
 'Laboratorio Digital',
 'En remodelación.',
 '<p>Laboratorio Digital: dise&ntilde;o grafico, Internet, edicion video y espacio de talleres.</p>',
 '10 personas.'),
('D6pa', 'rect', '202,322,221,336', 'Residencia de Artistas NORTE - Burdel', 'A',
 'Residencia de artistas NORTE.',
 '',
 'Habilitada.',
 '2 habitaciones con camas de doble piso, ropero empotrado, y cada habitación con baño y ducha.',
 '6 personas'),
('C6pa', 'rect', '6,304,26,322', 'Residencia de Artistas SUR', 'A',
 'Residencias de artistas.',
 '',
 'Residencia de artistas.',
 'Salón acogedor, tv, frigorífico, cocina, utensilios (platos, cubiertos,etc.).\n8 camas repartidas en 2 habitaciones a modo de litera.',
 '8 personas'),

('E1',   'rect', '7,12,46,70', 'Sala de las cabezas', 'T',
 'Expresión corporal contemporánea.',
 'Ensayos y presentaciones.',
 'Escuela de Break Dance / Ensayos / Presentaciones.',
 '<p>Cuenta con suelo de madera y espejos alrededor de las paredes.</p>\n<p>La remodelaci&oacute;n de la sala realizada a mediados de 2011 la ha convertido en una sala principal de desarrollo de las artes perform&aacute;ticas.</p>',
 '80 personas sentadas / 130 personas de pie.'),
('E2',   'rect', '183,8,224,68', 'Zona del chancho pelado', 'N',
 'Vivienda familiar - Portería - y depósito.',
 '',
 '',
 '<p>A la llegada de N.A.D.A al ex matadero nos encontramos con una familia viviendo en las dependencias en condiciones p&eacute;simas. El espacio E2 fue rehabilitado para dar unas mejores condiciones de vida a esta familia realizando un intercambio por los servicios de porter&iacute;a.</p>',
 ''),

('F1',   'circle', '112,296,20', 'Patio de carga', 'A',
 'Uso múltiple y terraza Itaca.',
 'Espacios abiertos',
 'Terraza Ítaca.',
 'Espacios abiertos, uso múltiple y terraza Itaca.',
 '300'),
('F2',   'circle', '113,76,21', 'Jardín Ecológico', 'N',
 'Educación Medioambiental para niñ@s.',
 'Lugar de relajación',
 '',
 'Espacio dedicado a la naturaleza, con plantas y brechas para la plantación de tomates, arbejas, etc. y así enseñar a los niños y niñas del taller como cuidar del planeta.',
 '');



