
/*============================================================================*/
/* package register                                                           */
/*============================================================================*/
INSERT INTO `package`
(`label`, `url`, `type`, `tsregister`, `description`)
VALUES
('packages', 'packages', 'base', UNIX_TIMESTAMP(), 'Modulo registro de los paquetes del sistema');

/*============================================================================*/
/* routing register                                                           */
/*============================================================================*/
INSERT INTO `route`
(`label`, `priority`, `parent`, `route`, `mapping`, `module`, `controller`, `action`)
VALUES
('Lista de paquetes',         2, 'base',                  'packages_list',           'packages',                 'packages', 'index',   'index'),
('Administrador de paquetes', 3, 'packages_list',         'packages_manager',        'packages/manager',         'packages', 'index',   'manager'),
('',                          3, 'packages_manager',      'packages_unlock',         'packages/unlock',          'packages', 'manager', 'unlock'),
('',                          3, 'packages_manager',      'packages_lock',           'packages/lock',            'packages', 'manager', 'lock'),
('Paquete: $package',         4, 'packages_manager',      'packages_package_view',   'packages/:package',        'packages', 'package', 'view'),
('',                          5, 'packages_package_view', 'packages_package_unlock', 'packages/:package/unlock', 'packages', 'package', 'unlock'),
('',                          5, 'packages_package_view', 'packages_package_lock',   'packages/:package/lock',   'packages', 'package', 'lock');

/*============================================================================*/
/* privileges register                                                        */
/*============================================================================*/
INSERT INTO `privilege`
(`package`, `label`, `description`)
VALUES
('package', 'list',   'Listar los paquetes instalados'),
('package', 'view',   'Ver las caracteristicas de un paquete seleccionado'),
('package', 'lock',   'Deshabilitar la funcionalidad de un paquete seleccionado'),
('package', 'unlock', 'Habilitar la funcionalidad de un paquete seleccionado');
