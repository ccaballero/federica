
/*============================================================================*/
/* tables for resources management                                            */
/*============================================================================*/
DROP TABLE IF EXISTS `event`;
CREATE TABLE `event` (
    `ident`       int unsigned  NOT NULL auto_increment,
    `code`        int unsigned  NOT NULL,
--     `url`         varchar(64)   NOT NULL,
    `abstract`    varchar(1024) NOT NULL,
    `description` text          NOT NULL DEFAULT '',
    `organizer`   varchar(1024) NOT NULL DEFAULT '',
    `sponsor`     varchar(1024) NOT NULL DEFAULT '',
    `charge`      varchar(512)  NOT NULL DEFAULT '',
    `prominent`   boolean       NOT NULL DEFAULT false,
    `tsregister`  int unsigned NOT NULL,
    PRIMARY KEY (`ident`)
--     UNIQUE INDEX (`url`)
) DEFAULT CHARACTER SET UTF8;

/*============================================================================*/
/* package resources                                                          */
/*============================================================================*/
INSERT INTO `package`
(`label`, `url`, `type`, `tsregister`, `description`)
VALUES
('events', 'events', 'app', UNIX_TIMESTAMP(), 'Modulo registro para los eventos disponibles');

/*============================================================================*/
/* routing register                                                           */
/*============================================================================*/
INSERT INTO `route`
(`label`, `priority`, `parent`, `route`, `mapping`, `module`, `controller`, `action`)
VALUES
('Eventos',                 2, 'base',              'events_list',         'events',               'events', 'index',  'index'),
('Administrador de evento', 3, 'events_list',       'events_manager',      'events/manager',       'events', 'index',  'manager'),
('Nuevo evento',            3, 'events_manager',    'events_new',          'events/new',           'events', 'index',  'new'),
('Evento: $event',          4, 'events_list',       'events_event_view',   'events/:event',        'events', 'event',  'view'),
('Editar: $event',          4, 'events_event_view', 'events_event_edit',   'events/:event/edit',   'events', 'event',  'edit'),
('',                        4, 'events_event_view', 'events_event_delete', 'events/:event/delete', 'events', 'event',  'delete');
