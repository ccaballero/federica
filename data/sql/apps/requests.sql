
/*============================================================================*/
/* tables for resources management                                            */
/*============================================================================*/
DROP TABLE IF EXISTS `request`;
CREATE TABLE `request` (
    `ident`       int unsigned  NOT NULL auto_increment,
    `label`       varchar(1024) NOT NULL,
    `concept`     text          NOT NULL DEFAULT '',
    `description` text          NOT NULL DEFAULT '',
    `tsregister`  int unsigned  NOT NULL,
    PRIMARY KEY (`ident`)
) DEFAULT CHARACTER SET UTF8;

/*============================================================================*/
/* package resources                                                          */
/*============================================================================*/
INSERT INTO `package`
(`label`, `url`, `type`, `tsregister`, `description`)
VALUES
('requests', 'requests', 'app', UNIX_TIMESTAMP(), 'Modulo registro para las solicitudes disponibles');

/*============================================================================*/
/* routing register                                                           */
/*============================================================================*/
INSERT INTO `route`
(`label`, `priority`, `parent`, `route`, `mapping`, `module`, `controller`, `action`)
VALUES
('Solicitudes',                  2, 'base',                  'requests_list',           'requests',                 'requests', 'index',   'index'),
('Administrador de solicitudes', 3, 'requests_list',         'requests_manager',        'requests/manager',         'requests', 'index',   'manager'),
('Nueva solicitud',              3, 'requests_manager',      'requests_new',            'requests/new',             'requests', 'index',   'new'),
('Solicitud: $request',          4, 'requests_list',         'requests_request_view',   'requests/:request',        'requests', 'request', 'view'),
('Editar: $request',             4, 'requests_request_view', 'requests_request_edit',   'requests/:request/edit',   'requests', 'request', 'edit'),
('',                             4, 'requests_request_view', 'requests_request_delete', 'requests/:request/delete', 'requests', 'request', 'delete');
