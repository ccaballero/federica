
/*============================================================================*/
/* tables for role management                                                 */
/*============================================================================*/
DROP TABLE IF EXISTS `role`;
CREATE TABLE `role` (
    `ident`       int unsigned NOT NULL auto_increment,
    `label`       varchar(64)  NOT NULL,
    `description` text         NOT NULL DEFAULT '',
    `tsregister`  int unsigned NOT NULL,
    PRIMARY KEY (`ident`),
    UNIQUE INDEX (`label`)
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

/*============================================================================*/
/* routing register                                                           */
/*============================================================================*/
INSERT INTO `route`
(`label`, `priority`, `parent`, `route`, `mapping`, `module`, `controller`, `action`)
VALUES
('Lista de roles',         2, 'base',            'roles_list',        'roles',              'roles', 'index', 'index'),
('Administrador de roles', 3, 'roles_list',      'roles_manager',     'roles/manager',      'roles', 'index', 'manager'),
('Nuevo rol',              3, 'roles_manager',   'roles_new',         'roles/new',          'roles', 'index', 'new'),
('Asignación usuario/rol', 3, 'roles_manager',   'roles_assign',      'roles/assign',       'roles', 'index', 'assign'),
('Rol: $role',             4, 'roles_manager',   'roles_role_view',   'roles/:role',        'roles', 'role',  'view'),
('Editar: $role',          4, 'roles_role_view', 'roles_role_edit',   'roles/:role/edit',   'roles', 'role',  'edit'),
('',                       4, 'roles_role_view', 'roles_role_delete', 'roles/:role/delete', 'roles', 'role',  'delete');
