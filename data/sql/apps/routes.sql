
/*============================================================================*/
/* package register                                                           */
/*============================================================================*/
INSERT INTO `package`
(`label`, `url`, `type`, `tsregister`, `description`)
VALUES
('routes', 'routes', 'base', UNIX_TIMESTAMP(), 'Modulo de informacion para las paginas registradas');

/*============================================================================*/
/* routing register                                                           */
/*============================================================================*/
INSERT INTO `route`
(`label`, `priority`, `parent`, `route`, `mapping`, `module`, `controller`, `action`)
VALUES
('Lista de rutas',         2, 'base',        'routes_list',    'routes',         'routes', 'index',   'index'),
('Administrador de rutas', 3, 'routes_list', 'routes_manager', 'routes/manager', 'routes', 'index', 'index');

('',                          3, 'packages_manager',      'packages_unlock',         'packages/unlock',          'packages', 'manager', 'unlock'),
('',                          3, 'packages_manager',      'packages_lock',           'packages/lock',            'packages', 'manager', 'lock'),
('Paquete: $package',         4, 'packages_manager',      'packages_package_view',   'packages/:package',        'packages', 'package', 'view'),
('',                          5, 'packages_package_view', 'packages_package_unlock', 'packages/:package/unlock', 'packages', 'package', 'unlock'),
('',                          5, 'packages_package_view', 'packages_package_lock',   'packages/:package/lock',   'packages', 'package', 'lock');
