
/*============================================================================*/
/* tables for resources management                                            */
/*============================================================================*/
DROP TABLE IF EXISTS `area`;
CREATE TABLE `area` (
    `ident`       int unsigned NOT NULL auto_increment,
    `label`       varchar(64)  NOT NULL,
    `url`         varchar(64)  NOT NULL,
    `email`       varchar(128) NOT NULL DEFAULT '',
    `description` text         NOT NULL DEFAULT '',
    `tsregister`  int unsigned NOT NULL,
    PRIMARY KEY (`ident`),
    UNIQUE INDEX (`label`),
    UNIQUE INDEX (`url`)
) DEFAULT CHARACTER SET UTF8;

/*============================================================================*/
/* package resources                                                          */
/*============================================================================*/
INSERT INTO `package`
(`label`, `url`, `type`, `tsregister`, `description`)
VALUES
('areas', 'areas', 'base', UNIX_TIMESTAMP(), 'Modulo registro de las areas del sistema');

/*============================================================================*/
/* routing register                                                           */
/*============================================================================*/
INSERT INTO `route`
(`label`, `priority`, `parent`, `route`, `mapping`, `module`, `controller`, `action`)
VALUES
('Areas',                  2, 'base',            'areas_list',        'areas',              'areas', 'index', 'index'),
('Administrador de areas', 3, 'areas_list',      'areas_manager',     'areas/manager',      'areas', 'index', 'manager'),
('Nueva area',             3, 'areas_manager',   'areas_new',         'areas/new',          'areas', 'index', 'new'),
('Area: $area',            4, 'areas_list',      'areas_area_view',   'areas/:area',        'areas', 'area',  'view'),
('Editar area: $area',     4, 'areas_area_view', 'areas_area_edit',   'areas/:area/edit',   'areas', 'area',  'edit'),
('',                       4, 'areas_area_view', 'areas_area_delete', 'areas/:area/delete', 'areas', 'area',  'delete');
