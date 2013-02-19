
/*============================================================================*/
/* tables needed in templating management                                     */
/*============================================================================*/
DROP TABLE IF EXISTS `template`;
CREATE TABLE `template` (
    `ident`          int unsigned NOT NULL auto_increment,
    `label`          varchar(64)  NOT NULL,
    `url`            varchar(64)  NOT NULL,
    `description`    text         NOT NULL DEFAULT '',
    `tsregister`     int unsigned NOT NULL,
    PRIMARY KEY (`ident`),
    UNIQUE INDEX (`label`),
    UNIQUE INDEX (`url`)
) DEFAULT CHARACTER SET UTF8;

DROP TABLE IF EXISTS `template_layout`;
CREATE TABLE `template_layout` (
    `template`          varchar(64)                                                 NOT NULL,
    `label`             varchar(64)                                                 NOT NULL,
    PRIMARY KEY (`template`, `label`),
    INDEX (`template`),
    FOREIGN KEY (`template`) REFERENCES `template`(`url`) ON UPDATE CASCADE ON DELETE RESTRICT
) DEFAULT CHARACTER SET UTF8;

DROP TABLE IF EXISTS `template_region`;
CREATE TABLE `template_region` (
    `template`          varchar(64)                                                 NOT NULL,
    `label`             varchar(64)                                                 NOT NULL,
    `type`              enum('static')                                              NOT NULL,
    PRIMARY KEY (`template`, `label`),
    INDEX (`template`),
    FOREIGN KEY (`template`) REFERENCES `template`(`url`) ON UPDATE CASCADE ON DELETE RESTRICT
) DEFAULT CHARACTER SET UTF8;

DROP TABLE IF EXISTS `template_layout_region`;
CREATE TABLE `template_layout_region` (
    `template`          varchar(64)                                                 NOT NULL,
    `layout`            varchar(64)                                                 NOT NULL,
    `region`            varchar(64)                                                 NOT NULL,
    PRIMARY KEY (`template`, `layout`, `region`),
    INDEX (`template`),
    FOREIGN KEY (`template`) REFERENCES `template`(`url`) ON UPDATE CASCADE ON DELETE RESTRICT,
    INDEX (`template`, `layout`),
    FOREIGN KEY (`template`, `layout`) REFERENCES `template_layout`(`template`, `label`) ON UPDATE CASCADE ON DELETE RESTRICT,
    INDEX (`template`, `region`),
    FOREIGN KEY (`template`, `region`) REFERENCES `template_region`(`template`, `label`) ON UPDATE CASCADE ON DELETE RESTRICT
) DEFAULT CHARACTER SET UTF8;

DROP TABLE IF EXISTS `template_layout_route`;
CREATE TABLE `template_layout_route` (
    `template`          varchar(64)                                                 NOT NULL,
    `layout`            varchar(64)                                                 NOT NULL,
    `route`             varchar(64)                                                 NOT NULL,
    PRIMARY KEY (`template`, `layout`, `route`),
    INDEX (`template`),
    FOREIGN KEY (`template`) REFERENCES `template`(`url`) ON UPDATE CASCADE ON DELETE RESTRICT,
    INDEX (`template`, `layout`),
    FOREIGN KEY (`template`, `layout`) REFERENCES `template_layout`(`template`, `label`) ON UPDATE CASCADE ON DELETE RESTRICT,
    INDEX (`route`),
    FOREIGN KEY (`route`) REFERENCES `route`(`route`) ON UPDATE CASCADE ON DELETE RESTRICT
) DEFAULT CHARACTER SET UTF8;

/*============================================================================*/
/* package register                                                           */
/*============================================================================*/
INSERT INTO `package`
(`label`, `url`, `type`, `tsregister`, `description`)
VALUES
('templates', 'templates', 'base', UNIX_TIMESTAMP(), 'Modulo de configuracion de las plantillas y regiones del sistema');

/*============================================================================*/
/* routing register                                                           */
/*============================================================================*/
INSERT INTO `route`
(`label`, `priority`, `parent`, `route`, `mapping`, `module`, `controller`, `action`)
VALUES
('Lista de plantillas',         2, 'base',           'templates_list',    'templates',         'templates', 'index',   'index'),
('Administrador de plantillas', 3, 'templates_list', 'templates_manager', 'templates/manager', 'templates', 'manager', 'index');
