DROP TABLE IF EXISTS `widget`;
CREATE TABLE `widget` (
    `ident`             int unsigned                                                NOT NULL auto_increment,
    `label`             varchar(64)                                                 NOT NULL,
    `package`           varchar(32)                                                 NOT NULL,
    `type`              varchar(32)                                                 NOT NULL,
    PRIMARY KEY (`ident`),
    UNIQUE INDEX (`package`, `label`),
    INDEX (`package`),
    FOREIGN KEY (`package`) REFERENCES `package`(`url`) ON UPDATE CASCADE ON DELETE RESTRICT
) DEFAULT CHARACTER SET UTF8;

DROP TABLE IF EXISTS `widget_route`;
CREATE TABLE `widget_route` (
    `route`             varchar(64)                                                 NOT NULL,
    `package`           varchar(32)                                                 NOT NULL,
    `widget`            varchar(64)                                                 NOT NULL,
    PRIMARY KEY (`route`, `package`, `widget`),
    INDEX (`route`),
    FOREIGN KEY (`route`) REFERENCES `route`(`route`) ON UPDATE CASCADE ON DELETE RESTRICT,
    INDEX (`package`, `widget`),
    FOREIGN KEY (`package`, `widget`) REFERENCES `widget`(`package`, `label`) ON UPDATE CASCADE ON DELETE RESTRICT
) DEFAULT CHARACTER SET UTF8;

/*============================================================================*/
/* package register                                                           */
/*============================================================================*/
INSERT INTO `package`
(`label`, `url`, `type`, `tsregister`, `description`)
VALUES
('widgets', 'widgets', 'middle', UNIX_TIMESTAMP(), 'Modulo de configuracion de los bloques de las paginas');

/*============================================================================*/
/* routing register                                                           */
/*============================================================================*/
INSERT INTO `route`
(`label`, `priority`, `parent`, `route`, `mapping`, `module`, `controller`, `action`)
VALUES
('Lista de bloques',         2, 'base',         'widgets_list',    'widgets',         'widgets', 'index',   'index'),
('Administrador de bloques', 3, 'widgets_list', 'widgets_manager', 'widgets/manager', 'widgets', 'manager', 'index');
