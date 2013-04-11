
/*============================================================================*/
/* change to customized routes for martadero                                  */
/*============================================================================*/
UPDATE route SET mapping = 'arte-cultura/:page' WHERE route = 'base_static';
UPDATE route SET mapping = 'confirmacion' WHERE route = 'base_confirm';

UPDATE route SET mapping = 'usuarios' WHERE route = 'users_list';
UPDATE route SET mapping = 'usuarios/administrador' WHERE route = 'users_manager';
UPDATE route SET mapping = 'perfil' WHERE route = 'users_settings';
UPDATE route SET mapping = 'acceder' WHERE route = 'users_in';
UPDATE route SET mapping = 'salir' WHERE route = 'users_out';

UPDATE route SET mapping = 'salas' WHERE route = 'rooms_list';
UPDATE route SET mapping = 'salas/administrador' WHERE route = 'rooms_manager';
UPDATE route SET mapping = 'salas/:room' WHERE route = 'rooms_room_view';

UPDATE route SET mapping = 'programas' WHERE route = 'programs_list';
UPDATE route SET mapping = 'programas/administrador' WHERE route = 'programs_manager';
UPDATE route SET mapping = 'programas/:program' WHERE route = 'programs_program_view';

/*============================================================================*/
/* change to customized titles for pages                                      */
/*============================================================================*/
UPDATE route SET label = 'Conoce las salas' WHERE route = 'rooms_list';
UPDATE route SET label = '7 áreas de creación artística' WHERE route = 'areas_list';
UPDATE route SET label = '7 programas de desarrollo social' WHERE route = 'programs_list';
