
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
(`label`, `parent`, `route`, `mapping`, `module`, `controller`, `action`)
VALUES
('Lista de rutas',         'base',        'routes_list',    'routes',         'routes', 'index',   'index'),
('Administrador de rutas', 'routes_list', 'routes_manager', 'routes/manager', 'routes', 'manager', 'index');
