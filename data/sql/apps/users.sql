
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
    `ident`             int unsigned                                                NOT NULL auto_increment,
    `email`             varchar(128)                                                NOT NULL,
    `password`          varchar(40)                                                 NOT NULL,
    `lastname`          varchar(128)                                                NOT NULL DEFAULT '',
    `firstname`         varchar(128)                                                NOT NULL DEFAULT '',
    `phone`             varchar(128)                                                NOT NULL DEFAULT '',
    `tsregister`        int unsigned                                                NOT NULL DEFAULT 0,
    PRIMARY KEY (`ident`),
    UNIQUE INDEX (`email`),
    INDEX (`email`, `password`)
) DEFAULT CHARACTER SET UTF8;

/*============================================================================*/
/* package register                                                           */
/*============================================================================*/
INSERT INTO `package`
(`label`, `url`, `type`, `tsregister`, `description`)
VALUES
('users', 'users', 'base', UNIX_TIMESTAMP(), 'Manejador de usuario del sistema');

/*============================================================================*/
/* routing register                                                           */
/*============================================================================*/
INSERT INTO `route`
(`label`, `priority`, `parent`, `route`, `mapping`, `module`, `controller`, `action`)
VALUES
('Lista de usuarios',         2, 'base',       'users_list',    'users',         'users', 'index', 'index'),
('Administrador de usuarios', 3, 'users_list', 'users_manager', 'users/manager', 'users', 'index', 'manager'),
('Iniciar sesión',            3, 'users_list', 'users_in',      'users/in',      'users', 'auth',  'in'),
('Cerrar sesión',             3, 'users_list', 'users_out',     'users/out',     'users', 'auth',  'out');
