
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
(`label`, `parent`, `route`, `mapping`, `module`, `controller`, `action`)
VALUES
('Lista de paquetes',         'base',                  'packages_list',           'packages',                 'packages', 'index',   'index'),
('Administrador de paquetes', 'packages_list',         'packages_manager',        'packages/manager',         'packages', 'index',   'manager'),
('',                          'packages_manager',      'packages_unlock',         'packages/unlock',          'packages', 'manager', 'unlock'),
('',                          'packages_manager',      'packages_lock',           'packages/lock',            'packages', 'manager', 'lock'),
('Paquete: $package',         'packages_manager',      'packages_package_view',   'packages/:package',        'packages', 'package', 'view'),
('',                          'packages_package_view', 'packages_package_unlock', 'packages/:package/unlock', 'packages', 'package', 'unlock'),
('',                          'packages_package_view', 'packages_package_lock',   'packages/:package/lock',   'packages', 'package', 'lock');
