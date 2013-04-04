
/*============================================================================*/
/* install the base distribution                                              */
/*============================================================================*/

SELECT 'base' AS '';
\. apps/base.sql

SELECT 'packages' AS '';
\. apps/packages.sql

SELECT 'routes' AS '';
\. apps/routes.sql

/*============================================================================*/

SELECT 'templates' AS '';
\. apps/templates.sql

-- SELECT 'widgets' AS '';
-- \. apps/widgets.sql

/*============================================================================*/

-- SELECT 'privileges';
-- \. apps/privileges.sql
-- 
-- SELECT 'roles';
-- \. apps/roles.sql
-- 
SELECT 'users' AS '';
\. apps/users.sql

/*============================================================================*/

SELECT 'rooms' AS '';
\. apps/rooms.sql

SELECT 'areas' AS '';
\. apps/areas.sql

/*============================================================================*/

SELECT 'blog' AS '';
\. apps/blog.sql

SELECT 'boards' AS '';
\. apps/boards.sql

SELECT 'requests' AS '';
\. apps/requests.sql

SELECT 'events' AS '';
\. apps/events.sql

/*============================================================================*/
/* install the martadero information                                          */
/*============================================================================*/

SELECT 'martadero' AS '';
\. martadero/templates.sql
\. martadero/routes.sql
\. martadero/users.sql
\. martadero/rooms.sql
\. martadero/areas.sql
\. martadero/blog.sql
\. martadero/boards.sql
\. martadero/events.sql
