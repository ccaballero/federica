
/*============================================================================*/
/* tables for register of privileges                                          */
/*============================================================================*/
DROP TABLE IF EXISTS `privilege`;
CREATE TABLE `privilege` (
    `ident`       int unsigned NOT NULL auto_increment,
    `label`       varchar(64)  NOT NULL,
    `package`     varchar(64)  NOT NULL,
    `description` text         NOT NULL DEFAULT '',
    PRIMARY KEY (`ident`),
    UNIQUE INDEX (`package`, `label`)
) DEFAULT CHARACTER SET UTF8;

/*============================================================================*/
/* package register                                                           */
/*============================================================================*/
INSERT INTO `package`
(`label`, `url`, `type`, `tsregister`, `description`)
VALUES
('privileges', 'privileges', 'base', UNIX_TIMESTAMP(), 'Manejador de privilegios disponibles en el sistema');
