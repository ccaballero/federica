
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

SELECT 'resources' AS '';
\. apps/resources.sql

/*============================================================================*/

SELECT 'martadero' AS '';
\. _martadero.sql
