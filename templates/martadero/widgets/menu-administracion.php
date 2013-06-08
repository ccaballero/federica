<?php if ($this->route == 'base_admin'
        || substr($this->route, 0, strlen('packages_')) == 'packages_'
        || substr($this->route, 0, strlen('routes_')) == 'routes_'
        || substr($this->route, 0, strlen('privileges_')) == 'privileges_'
        || substr($this->route, 0, strlen('rooms_')) == 'rooms_'
        || substr($this->route, 0, strlen('areas_')) == 'areas_'
        || substr($this->route, 0, strlen('programs_')) == 'programs_'
        || substr($this->route, 0, strlen('supports_')) == 'supports_'
        || substr($this->route, 0, strlen('boards_')) == 'boards_'
        || substr($this->route, 0, strlen('blog_')) == 'blog_'
        || substr($this->route, 0, strlen('users_')) == 'users_'
        || substr($this->route, 0, strlen('roles_')) == 'roles_') { ?>
<?php if ($this->auth->hasIdentity()) { ?>
<div class="post">
    <h1>Administración</h1>
    <ul>
        <li><a href="<?php echo $this->url(array(), 'packages_list') ?>">Paquetes</a></li>
        <li><a href="<?php echo $this->url(array(), 'routes_list') ?>">Rutas</a></li>
    </ul>
    <hr />
    <ul>
        <!--<li><a href="<?php // TODO ../archivos/index.php ?>">Archivos</a></li>-->
        <!--<li><a href="<?php // TODO ../accesorios_servicios/ver_accesorio_servicio.php ?>">Accesorios y servicios</a></li>-->
        <li><a href="<?php echo $this->url(array(), 'users_list') ?>">Usuarios</a></li>
        <li><a href="<?php echo $this->url(array(), 'roles_list') ?>">Roles</a></li>
        <li><a href="<?php echo $this->url(array(), 'privileges_list') ?>">Privilegios</a></li>
        <!--<li><a href="<?php //echo $this->url(array(), 'users_settings') ?>">Perfil</a></li>-->
    </ul>
    <hr />
    <ul>
        <li><a href="<?php echo $this->url(array(), 'areas_list') ?>">Areas</a></li>
        <li><a href="<?php echo $this->url(array(), 'programs_list') ?>">Programas</a></li>
        <li><a href="<?php echo $this->url(array(), 'supports_list') ?>">Areas de apoyo</a></li>
    </ul>
    <hr />
    <ul>
        <li><a href="<?php echo $this->url(array(), 'requests_list') ?>">Solicitudes</a></li>
        <!--<li><a href="<?php // TODO ../eventos/index.php ?>">Eventos</a></li>-->
        <!--<li><a href="<?php // TODO ../calendario/index.php ?>">Calendario</a></li>-->
        <!--<li><a href="<?php // TODO ../talleres/index.php ?>">Talleres</a></li>-->
    </ul>
    <hr />
    <ul>
        <li><a href="<?php echo $this->url(array(), 'rooms_list') ?>">Salas</a></li>
        <!--<li><a href="<?php // TODO ../residencias/index.php ?>">Residencias</a></li>-->
        <li><a href="<?php echo $this->url(array(), 'blog_list') ?>">Blog</a></li>
        <li><a href="<?php echo $this->url(array(), 'boards_list') ?>">Convocatorias</a></li>
    </ul>
</div>
<?php } ?>
<?php } ?>
