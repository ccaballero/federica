
/*============================================================================*/
/* regions register                                                           */
/*============================================================================*/
INSERT INTO `region`
(`label`, `package`, `type`)
VALUES
('header',     'base', ''),
('menubar',    'base', ''),
('toolbar',    'base', ''),
('sub-header', 'base', ''),
('messages',   'base', ''),
('left',       'base', ''),
('right',      'base', ''),
('foot-bar',   'base', ''),
('footer',     'base', '');

/*============================================================================*/
/* regions in routes register                                                 */
/*============================================================================*/
INSERT INTO `region_route`
(`route`, `package`, `region`)
VALUES
('base', 'base', 'header'),('base', 'base', 'menubar'),('base', 'base', 'toolbar'),('base', 'base', 'sub-header'),('base', 'base', 'messages'),('base', 'base', 'left'),('base', 'base', 'right'),('base', 'base', 'foot-bar'),('base', 'base', 'footer'),
('base_confirm', 'base', 'header'),('base_confirm', 'base', 'menubar'),('base_confirm', 'base', 'toolbar'),('base_confirm', 'base', 'sub-header'),('base_confirm', 'base', 'messages'),('base_confirm', 'base', 'left'),('base_confirm', 'base', 'right'),('base_confirm', 'base', 'foot-bar'),('base_confirm', 'base', 'footer'),
('base_error', 'base', 'header'),('base_error', 'base', 'menubar'),('base_error', 'base', 'toolbar'),('base_error', 'base', 'sub-header'),('base_error', 'base', 'messages'),('base_error', 'base', 'left'),('base_error', 'base', 'right'),('base_error', 'base', 'foot-bar'),('base_error', 'base', 'footer'),
('base_static', 'base', 'header'),('base_static', 'base', 'menubar'),('base_static', 'base', 'toolbar'),('base_static', 'base', 'sub-header'),('base_static', 'base', 'messages'),('base_static', 'base', 'left'),('base_static', 'base', 'right'),('base_static', 'base', 'foot-bar'),('base_static', 'base', 'footer'),

('packages_list', 'base', 'header'),('packages_list', 'base', 'menubar'),('packages_list', 'base', 'toolbar'),('packages_list', 'base', 'messages'),('packages_list', 'base', 'left'),('packages_list', 'base', 'foot-bar'),('packages_list', 'base', 'footer'),
('packages_manager', 'base', 'header'),('packages_manager', 'base', 'menubar'),('packages_manager', 'base', 'toolbar'),('packages_manager', 'base', 'messages'),('packages_manager', 'base', 'left'),('packages_manager', 'base', 'foot-bar'),('packages_manager', 'base', 'footer'),
('packages_package_view', 'base', 'header'),('packages_package_view', 'base', 'menubar'),('packages_package_view', 'base', 'toolbar'),('packages_package_view', 'base', 'messages'),('packages_package_view', 'base', 'left'),('packages_package_view', 'base', 'foot-bar'),('packages_package_view', 'base', 'footer'),

('regions_list', 'base', 'header'),('regions_list', 'base', 'menubar'),('regions_list', 'base', 'toolbar'),('regions_list', 'base', 'messages'),('regions_list', 'base', 'left'),('regions_list', 'base', 'foot-bar'),('regions_list', 'base', 'footer'),
('regions_manager', 'base', 'header'),('regions_manager', 'base', 'menubar'),('regions_manager', 'base', 'toolbar'),('regions_manager', 'base', 'messages'),('regions_manager', 'base', 'left'),('regions_manager', 'base', 'foot-bar'),('regions_manager', 'base', 'footer'),
('routes_list', 'base', 'header'),('routes_list', 'base', 'menubar'),('routes_list', 'base', 'toolbar'),('routes_list', 'base', 'messages'),('routes_list', 'base', 'left'),('routes_list', 'base', 'foot-bar'),('routes_list', 'base', 'footer'),
('routes_manager', 'base', 'header'),('routes_manager', 'base', 'menubar'),('routes_manager', 'base', 'toolbar'),('routes_manager', 'base', 'messages'),('routes_manager', 'base', 'left'),('routes_manager', 'base', 'foot-bar'),('routes_manager', 'base', 'footer');

/*============================================================================*/
/* widgets register                                                           */
/*============================================================================*/
INSERT INTO `widget`
(`label`, `package`, `type`)
VALUES
('blog',                'base', ''),
('calendario',          'base', ''),
('comparte',            'base', ''),
('contactos',           'base', ''),
('convocatorias',       'base', ''),
('descargas',           'base', ''),
('eje-tematico',        'base', ''),
('ingresar',            'base', ''),
('logo',                'base', ''),
('menu-administracion', 'base', ''),
('menu-lateral',        'base', ''),
('menu-principal',      'base', ''),
('participar',          'base', ''),
('podcast',             'base', ''),
('servicios',           'base', ''),
('social',              'base', '');
