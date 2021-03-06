
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
