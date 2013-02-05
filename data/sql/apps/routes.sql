
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
('Lista de rutas',         2, 'base',        'routes_list',    'routes',         'routes', 'index', 'index'),
('Administrador de rutas', 3, 'routes_list', 'routes_manager', 'routes/manager', 'routes', 'index', 'manager');
