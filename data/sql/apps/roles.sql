
/*============================================================================*/
/* tables for role management                                                 */
/*============================================================================*/
DROP TABLE IF EXISTS `role`;
CREATE TABLE `role` (
    `ident`       int unsigned NOT NULL auto_increment,
    `label`       varchar(64)  NOT NULL,
    `url`         varchar(64)  NOT NULL,
    `description` text         NOT NULL DEFAULT '',
    `tsregister`  int unsigned NOT NULL,
    PRIMARY KEY (`ident`),
    UNIQUE INDEX (`label`),
    UNIQUE INDEX (`url`)
) DEFAULT CHARACTER SET UTF8;

DROP TABLE IF EXISTS `role_privilege`;
CREATE TABLE `role_privilege` (
    `role`      int unsigned NOT NULL,
    `privilege` int unsigned NOT NULL,
    PRIMARY KEY (`role`, `privilege`),
    INDEX (`role`),
    FOREIGN KEY (`role`) REFERENCES `role`(`ident`) ON UPDATE CASCADE ON DELETE RESTRICT,
    INDEX (`privilege`),
    FOREIGN KEY (`privilege`) REFERENCES `privilege`(`ident`) ON UPDATE CASCADE ON DELETE RESTRICT
) DEFAULT CHARACTER SET UTF8;

/*============================================================================*/
/* package register                                                           */
/*============================================================================*/
INSERT INTO `package`
(`label`, `url`, `type`, `tsregister`, `description`)
VALUES
('roles', 'roles', 'base', UNIX_TIMESTAMP(), 'Manejador de roles del sistema');
