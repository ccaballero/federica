
/*============================================================================*/
/* tables for resources management                                            */
/*============================================================================*/
DROP TABLE IF EXISTS `board`;
CREATE TABLE `board` (
    `ident`       int unsigned NOT NULL auto_increment,
    `label`       varchar(128) NOT NULL,
    `url`         varchar(64)  NOT NULL,
    `start_date`  date         NOT NULL DEFAULT 0,
    `end_date`    date         NOT NULL DEFAULT 0,
    `audience`    int unsigned NOT NULL DEFAULT 0,
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
('boards', 'boards', 'app', UNIX_TIMESTAMP(), 'Modulo registro de las convocatorias del sistema');

/*============================================================================*/
/* routing register                                                           */
/*============================================================================*/
INSERT INTO `route`
(`label`, `priority`, `parent`, `route`, `mapping`, `module`, `controller`, `action`)
VALUES
('Convocatorias',                  2, 'base',              'boards_list',         'boards',               'boards', 'index',  'index'),
('Administrador de convocatorias', 3, 'boards_list',       'boards_manager',      'boards/manager',       'boards', 'index',  'manager'),
('Nueva convocatoria',             3, 'boards_manager',    'boards_new',          'boards/new',           'boards', 'index',  'new'),
('Convocatoria: $board',           4, 'boards_list',       'boards_board_view',   'boards/:board',        'boards', 'board',  'view'),
('Editar: $board',                 4, 'boards_board_view', 'boards_board_edit',   'boards/:board/edit',   'boards', 'board',  'edit'),
('',                               4, 'boards_board_view', 'boards_board_delete', 'boards/:board/delete', 'boards', 'board',  'delete');
