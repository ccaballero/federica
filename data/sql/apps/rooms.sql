
/*============================================================================*/
/* tables for resources management                                            */
/*============================================================================*/
DROP TABLE IF EXISTS `room`;
CREATE TABLE `room` (
    `ident`        int unsigned                          NOT NULL auto_increment,
    `code`         varchar(8)                            NOT NULL,
    `label`        varchar(128)                          NOT NULL,
    `type`         enum('A', 'T', 'N')                   NOT NULL DEFAULT 'N',
    `description`  text                                  NOT NULL DEFAULT '', /* descripción general */
    `general_purpose`    text                            NOT NULL DEFAULT '', /* descripción de uso */
    `compatible_purpose` text                            NOT NULL DEFAULT '', /* descripción acerca de uso compatible */
    `current_purpose`    text                            NOT NULL DEFAULT '', /* descripción acerca de uso actual */
    `capacity`     text                                  NOT NULL DEFAULT '',
    `shape`        varchar(64)                           NOT NULL DEFAULT 'rect',
    `coords`       varchar(128)                          NOT NULL DEFAULT '',
    `tsregister`   int unsigned                          NOT NULL,
    PRIMARY KEY (`ident`),
    UNIQUE INDEX (`code`),
    UNIQUE INDEX (`label`)
) DEFAULT CHARACTER SET UTF8;

/*============================================================================*/
/* package resources                                                          */
/*============================================================================*/
INSERT INTO `package`
(`label`, `url`, `type`, `tsregister`, `description`)
VALUES
('rooms', 'rooms', 'base', UNIX_TIMESTAMP(), 'Modulo registro de las salas del sistema');

/*============================================================================*/
/* routing register                                                           */
/*============================================================================*/
INSERT INTO `route`
(`label`, `priority`, `parent`, `route`, `mapping`, `module`, `controller`, `action`)
VALUES
('Salas',                  2, 'base',            'rooms_list',        'rooms',              'rooms', 'index', 'index'),
('Administrador de salas', 3, 'rooms_list',      'rooms_manager',     'rooms/manager',      'rooms', 'index', 'manager'),
('Nueva sala',             3, 'rooms_manager',   'rooms_new',         'rooms/new',          'rooms', 'index', 'new'),
('Sala: $room',            4, 'rooms_list',      'rooms_room_view',   'rooms/:room',        'rooms', 'room',  'view'),
('Editar sala: $room',     4, 'rooms_room_view', 'rooms_room_edit',   'rooms/:room/edit',   'rooms', 'room',  'edit'),
('',                       4, 'rooms_room_view', 'rooms_room_delete', 'rooms/:room/delete', 'rooms', 'room',  'delete');
