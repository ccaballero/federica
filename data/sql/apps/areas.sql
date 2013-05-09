
/*============================================================================*/
/* tables for resources management                                            */
/*============================================================================*/
DROP TABLE IF EXISTS `area`;
CREATE TABLE `area` (
    `ident`       int unsigned                       NOT NULL auto_increment,
    `type`        enum('area', 'program', 'support') NOT NULL,
    `label`       varchar(128)                       NOT NULL,
    `url`         varchar(128)                       NOT NULL,
    `email`       varchar(128)                       NOT NULL DEFAULT '',
    `description` text                               NOT NULL DEFAULT '',
    `tsregister`  int unsigned                       NOT NULL,
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
('areas', 'areas', 'middle', UNIX_TIMESTAMP(), 'Modulo registro de las areas del sistema');

/*============================================================================*/
/* routing register                                                           */
/*============================================================================*/
INSERT INTO `route`
(`label`, `priority`, `parent`, `route`, `mapping`, `module`, `controller`, `action`)
VALUES
('Areas',                  2, 'base',            'areas_list',        'areas',              'areas', 'index', 'areas'),
('Programas',              2, 'base',            'programs_list',     'programs',           'areas', 'index', 'programs'),
('Areas de apoyo',         2, 'base',            'supports_list',     'supports',           'areas', 'index', 'supports'),

('Administrador de areas', 3, 'areas_list',      'areas_manager',     'areas/manager',      'areas', 'index', 'manager'),
('Nueva area',             3, 'areas_manager',   'areas_new',         'areas/new',          'areas', 'index', 'new'),
('Area: $area',            4, 'areas_list',      'areas_area_view',   'areas/:area',        'areas', 'area',  'view'),
('Editar area: $area',     4, 'areas_area_view', 'areas_area_edit',   'areas/:area/edit',   'areas', 'area',  'edit'),
('',                       4, 'areas_area_view', 'areas_area_delete', 'areas/:area/delete', 'areas', 'area',  'delete');
