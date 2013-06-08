
/*============================================================================*/
/* package register                                                           */
/*============================================================================*/
INSERT INTO `package`
(`label`, `url`, `type`, `tsregister`, `description`)
VALUES
('privileges', 'privileges', 'base', UNIX_TIMESTAMP(), 'Manejador de privilegios disponibles en el sistema');

/*============================================================================*/
/* routing register                                                           */
/*============================================================================*/
INSERT INTO `route`
(`label`, `priority`, `parent`, `route`, `mapping`, `module`, `controller`, `action`)
VALUES
('Lista de paquetes', 2, 'base', 'privileges_list', 'privileges', 'privileges', 'index', 'index');
