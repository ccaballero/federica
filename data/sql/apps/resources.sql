
/*============================================================================*/
/* tables for resources management                                            */
/*============================================================================*/
DROP TABLE IF EXISTS `resource`;
CREATE TABLE `resource` (
    `ident`        int unsigned                          NOT NULL auto_increment,
    `code`         varchar(8)                            NOT NULL,
    `label`        varchar(128)                          NOT NULL,
    `url`          varchar(128)                          NOT NULL,
/*    `status`      enum('active', 'inactive')            NOT NULL DEFAULT 'active',*/
    `description1` text                                  NOT NULL DEFAULT '', /* descripción de uso */
    `description2` text                                  NOT NULL DEFAULT '', /* descripción acerca de uso compatible */
    `description3` text                                  NOT NULL DEFAULT '', /* descripción acerca de uso actual */
    `capacity`     text                                  NOT NULL DEFAULT '',
    `shape`        varchar(64)                           NOT NULL DEFAULT 'rect',
    `coords`       varchar(128)                          NOT NULL DEFAULT '',
    `tsregister`   int unsigned                          NOT NULL,
    PRIMARY KEY (`ident`),
    UNIQUE INDEX (`code`),
    UNIQUE INDEX (`label`),
    /*UNIQUE*/ INDEX (`url`)
) DEFAULT CHARACTER SET UTF8;

/*============================================================================*/
/* package resources                                                          */
/*============================================================================*/
INSERT INTO `package`
(`label`, `url`, `type`, `tsregister`, `description`)
VALUES
('resources', 'resources', 'base', UNIX_TIMESTAMP(), 'Modulo registro de los recursos del sistema');

/*============================================================================*/
/* routing register                                                           */
/*============================================================================*/
INSERT INTO `route`
(`label`, `priority`, `parent`, `route`, `mapping`, `module`, `controller`, `action`)
VALUES
('Recursos', 2, 'base', 'resources_list', 'resources', 'resources', 'index',   'index'),
('Sala: $resource', 4, 'resources_list', 'resources_resource_view',   'resources/:resource', 'resources', 'resource', 'view');
