DROP TABLE IF EXISTS `region`;
CREATE TABLE `region` (
    `ident`             int unsigned                                                NOT NULL auto_increment,
    `label`             varchar(64)                                                 NOT NULL,
    `package`           varchar(32)                                                 NOT NULL,
    `type`              varchar(32)                                                 NOT NULL,
    PRIMARY KEY (`ident`),
    UNIQUE INDEX (`package`, `label`),
    INDEX (`package`),
    FOREIGN KEY (`package`) REFERENCES `package`(`url`) ON UPDATE CASCADE ON DELETE RESTRICT
) DEFAULT CHARACTER SET UTF8;

DROP TABLE IF EXISTS `region_route`;
CREATE TABLE `region_route` (
    `route`             varchar(64)                                                 NOT NULL,
    `package`           varchar(32)                                                 NOT NULL,
    `region`            varchar(64)                                                 NOT NULL,
    PRIMARY KEY (`route`, `package`, `region`),
    INDEX (`route`),
    FOREIGN KEY (`route`) REFERENCES `route`(`route`) ON UPDATE CASCADE ON DELETE RESTRICT,
    INDEX (`package`, `region`),
    FOREIGN KEY (`package`, `region`) REFERENCES `region`(`package`, `label`) ON UPDATE CASCADE ON DELETE RESTRICT
) DEFAULT CHARACTER SET UTF8;

/*============================================================================*/
/* package register                                                           */
/*============================================================================*/
INSERT INTO `package`
(`label`, `url`, `type`, `tsregister`, `description`)
VALUES
('regions', 'regions', 'middle', UNIX_TIMESTAMP(), 'Modulo de configuracion de las regiones de las paginas');

/*============================================================================*/
/* routing register                                                           */
/*============================================================================*/
INSERT INTO `route`
(`label`, `priority`, `parent`, `route`, `mapping`, `module`, `controller`, `action`)
VALUES
('Lista de regiones',         2, 'base',         'regions_list',    'regions',         'regions', 'index',   'index'),
('Administrador de regiones', 3, 'regions_list', 'regions_manager', 'regions/manager', 'regions', 'manager', 'index');
