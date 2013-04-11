
/*============================================================================*/
/* tables for resources management                                            */
/*============================================================================*/
DROP TABLE IF EXISTS `program`;
CREATE TABLE `program` (
    `ident`       int unsigned NOT NULL auto_increment,
    `label`       varchar(128) NOT NULL,
    `url`         varchar(128) NOT NULL,
    `email`       varchar(128) NOT NULL DEFAULT '',
    `description` text         NOT NULL DEFAULT '',
    `tsregister`  int unsigned NOT NULL,
    PRIMARY KEY (`ident`),
    UNIQUE INDEX (`label`),
    UNIQUE INDEX (`url`)
) DEFAULT CHARACTER SET UTF8;

/*============================================================================*/
/* package resources                                                          */
/*============================================================================*/
INSERT INTO `package`
(`label`, `url`, `type`, `tsregister`, `description`)
VALUES
('programs', 'programs', 'middle', UNIX_TIMESTAMP(), 'Modulo registro de los programas del sistema');

/*============================================================================*/
/* routing register                                                           */
/*============================================================================*/
INSERT INTO `route`
(`label`, `priority`, `parent`, `route`, `mapping`, `module`, `controller`, `action`)
VALUES
('Programas',                  2, 'base',                  'programs_list',           'programs',                 'programs', 'index',   'index'),
('Administrador de programas', 3, 'programs_list',         'programs_manager',        'programs/manager',         'programs', 'index',   'manager'),
('Nuevo programa',             3, 'programs_manager',      'programs_new',            'programs/new',             'programs', 'index',   'new'),
('Programa: $program',         4, 'programs_list',         'programs_program_view',   'programs/:program',        'programs', 'program', 'view'),
('Editar programa: $program',  4, 'programs_program_view', 'programs_program_edit',   'programs/:program/edit',   'programs', 'program', 'edit'),
('',                           4, 'programs_program_view', 'programs_program_delete', 'programs/:program/delete', 'programs', 'program', 'delete');
