
/*============================================================================*/
/* script for clean de database                                               */
/*============================================================================*/

DROP TABLE IF EXISTS `request`;

DROP TABLE IF EXISTS `event`;
DROP TABLE IF EXISTS `board`;
DROP TABLE IF EXISTS `blog`;

DROP TABLE IF EXISTS `room`;
DROP TABLE IF EXISTS `user`;

DROP TABLE IF EXISTS `resource`;
DROP TABLE IF EXISTS `area`;
DROP TABLE IF EXISTS `program`;

DROP TABLE IF EXISTS `widget_route`;
DROP TABLE IF EXISTS `widget`;

DROP TABLE IF EXISTS `region_route`;
DROP TABLE IF EXISTS `region`;

DROP TABLE IF EXISTS `template_layout_route`;
DROP TABLE IF EXISTS `template_layout_region`;
DROP TABLE IF EXISTS `template_layout`;
DROP TABLE IF EXISTS `template_region`;
DROP TABLE IF EXISTS `template`;

DROP TABLE IF EXISTS `route`;
DROP TABLE IF EXISTS `package_dependency`;
DROP TABLE IF EXISTS `package`;
