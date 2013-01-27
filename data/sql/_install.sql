
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

SELECT 'regions' AS '';
\. apps/regions.sql

SELECT 'widgets' AS '';
\. apps/widgets.sql

/*============================================================================*/

-- SELECT 'privileges';
-- \. apps/privileges.sql
-- 
-- SELECT 'roles';
-- \. apps/roles.sql
-- 
-- SELECT 'users';
-- \. apps/users.sql

/*============================================================================*/

SELECT 'martadero' AS '';
\. _martadero.sql
