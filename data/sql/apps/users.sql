
/*============================================================================*/
/* tables needed in user management                                           */
/*============================================================================*/
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
    `ident`      int unsigned NOT NULL auto_increment,
    `email`      varchar(128) NOT NULL,
    `password`   varchar(40)  NOT NULL,
    `lastname`   varchar(128) NOT NULL DEFAULT '',
    `firstname`  varchar(128) NOT NULL DEFAULT '',
    `phone`      varchar(128) NOT NULL DEFAULT '',
    `tsregister` int unsigned NOT NULL DEFAULT 0,
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
('Lista de usuarios',         2, 'base',            'users_list',        'users',              'users', 'index', 'index'),
('Administrador de usuarios', 3, 'users_list',      'users_manager',     'users/manager',      'users', 'index', 'manager'),
('Perfil de usuario',         3, 'base',            'users_settings',    'users/settings',     'users', 'user',  'settings'),
('Iniciar sesión',            3, 'users_list',      'users_in',          'users/in',           'users', 'auth',  'in'),
('Cerrar sesión',             3, 'users_list',      'users_out',         'users/out',          'users', 'auth',  'out'),
('Nuevo usuario',             3, 'users_manager',   'users_new',         'users/new',          'users', 'index', 'new'),
('Usuario: $user',            4, 'users_list',      'users_user_view',   'users/:user',        'users', 'user',  'view'),
('Editar usuario: $user',     4, 'users_user_view', 'users_user_edit',   'users/:user/edit',   'users', 'user',  'edit'),
('',                          4, 'users_user_view', 'users_user_delete', 'users/:user/delete', 'users', 'user',  'delete'),
('',                          5, 'users_user_view', 'users_user_unlock', 'users/:user/unlock', 'users', 'user', 'unlock'),
('',                          5, 'users_user_view', 'users_user_lock',   'users/:user/lock',   'users', 'user', 'lock');
