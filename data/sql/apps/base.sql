
/*============================================================================*/
/* tables for package management                                              */
/*============================================================================*/
DROP TABLE IF EXISTS `package`;
CREATE TABLE `package` (
    `ident`       int unsigned                          NOT NULL auto_increment,
    `label`       varchar(64)                           NOT NULL,
    `url`         varchar(64)                           NOT NULL,
    `status`      enum('active', 'inactive')            NOT NULL DEFAULT 'active',
    `type`        enum('base', 'middle', 'app', 'util') NOT NULL,
    `description` text                                  NOT NULL DEFAULT '',
    `tsregister`  int unsigned                          NOT NULL,
    PRIMARY KEY (`ident`),
    UNIQUE INDEX (`label`),
    UNIQUE INDEX (`url`)
) DEFAULT CHARACTER SET UTF8;

DROP TABLE IF EXISTS `package_dependency`;
CREATE TABLE `package_dependency` (
    `package` varchar(64) NOT NULL,
    `parent`  varchar(64) NOT NULL,
    INDEX (`package`),
    FOREIGN KEY (`package`) REFERENCES `package`(`url`) ON UPDATE CASCADE ON DELETE RESTRICT,
    INDEX (`parent`),
    FOREIGN KEY (`parent`) REFERENCES `package`(`url`) ON UPDATE CASCADE ON DELETE RESTRICT
) DEFAULT CHARACTER SET UTF8;

/*============================================================================*/
/* table for routing management                                               */
/*============================================================================*/
DROP TABLE IF EXISTS `route`;
CREATE TABLE `route` (
    `ident`        int unsigned NOT NULL auto_increment,
    `label`        varchar(64)  NOT NULL,
    `description`  text         NOT NULL DEFAULT '',
    `route`        varchar(64)  NOT NULL,
    `mapping`      varchar(256) NOT NULL,
    `module`       varchar(64)  NOT NULL,
    `controller`   varchar(64)  NOT NULL,
    `action`       varchar(64)  NOT NULL,
    `defaults`     varchar(128) NOT NULL DEFAULT '',
    `requirements` varchar(128) NOT NULL DEFAULT '',
    `priority`     int unsigned NOT NULL DEFAULT 5,
    `parent`       varchar(64)  NULL,
    PRIMARY KEY (`ident`),
    UNIQUE INDEX (`route`),
    UNIQUE INDEX (`mapping`),
    INDEX (`module`),
    FOREIGN KEY (`module`) REFERENCES `package`(`url`) ON UPDATE CASCADE ON DELETE RESTRICT,
    INDEX (`parent`),
    FOREIGN KEY (`parent`) REFERENCES `route`(`route`) ON UPDATE CASCADE ON DELETE RESTRICT
) DEFAULT CHARACTER SET UTF8;

/*============================================================================*/
/* package register                                                           */
/*============================================================================*/
INSERT INTO `package`
(`label`, `url`, `type`, `tsregister`, `description`)
VALUES
('base', 'base', 'base', UNIX_TIMESTAMP(), 'Paquete gestor de pagina principal');

/*============================================================================*/
/* routing register                                                           */
/*============================================================================*/
INSERT INTO `route`
(`label`, `priority`, `parent`, `route`, `mapping`, `module`, `controller`, `action`)
VALUES
('Inicio',       1, null,   'base',         '',             'base', 'index',   'index'),
('Error',        2, 'base', 'base_error',   'error',        'base', 'error',   'error'),
('Confirmación', 2, 'base', 'base_confirm', 'confirm',      'base', 'confirm', 'confirm'),
('',             4, 'base', 'base_static',  'static/:page', 'base', 'static',  'static');
