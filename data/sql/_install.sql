
/*============================================================================*/
/* install the base distribution                                              */
/*============================================================================*/

SELECT 'base';
\. apps/base.sql

SELECT 'packages';
\. apps/packages.sql

SELECT 'routes';
\. apps/routes.sql

/*============================================================================*/

SELECT 'privileges';
\. apps/privileges.sql

SELECT 'roles';
\. apps/roles.sql

SELECT 'users';
\. apps/users.sql

/*============================================================================*/
