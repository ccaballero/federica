
/*============================================================================*/
/* tables for resources management                                            */
/*============================================================================*/
DROP TABLE IF EXISTS `blog`;
CREATE TABLE `blog` (
    `ident`       int unsigned NOT NULL auto_increment,
    `label`       varchar(128) NOT NULL,
    `url`         varchar(64)  NOT NULL,
    `date`        varchar(128) NOT NULL DEFAULT '',
    `description` text         NOT NULL DEFAULT '',
    `published`   boolean      NOT NULL DEFAULT false,
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
('blog', 'blog', 'app', UNIX_TIMESTAMP(), 'Modulo registro de los blogs del sistema');

/*============================================================================*/
/* routing register                                                           */
/*============================================================================*/
INSERT INTO `route`
(`label`, `priority`, `parent`, `route`, `mapping`, `module`, `controller`, `action`)
VALUES
('Blog',                   2, 'base',           'blog_list',        'blog',              'blog', 'index', 'index'),
('Administrador de blogs', 3, 'blog_list',      'blog_manager',     'blog/manager',      'blog', 'index', 'manager'),
('Nuevo post',             3, 'blog_manager',   'blog_new',         'blog/new',          'blog', 'index', 'new'),
('Post: $post',            4, 'blog_list',      'blog_post_view',   'blog/:post',        'blog', 'post',  'view'),
('Editar post: $post',     4, 'blog_post_view', 'blog_post_edit',   'blog/:post/edit',   'blog', 'post',  'edit'),
('',                       4, 'blog_post_view', 'blog_post_delete', 'blog/:post/delete', 'blog', 'post',  'delete');
