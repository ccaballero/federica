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
        <li><?php echo $this->link('Paquetes',    array(), 'packages_list') ?></li>
        <li><?php echo $this->link('Rutas',       array(), 'routes_list') ?></li>
        <li><?php echo $this->link('Privilegios', array(), 'privileges_list') ?></li>
    </ul>
    <hr />
    <ul>
        <li><?php echo $this->link('Roles',    array(), 'roles_list') ?></li>
        <li><?php echo $this->link('Usuarios', array(), 'users_list') ?></li>
    </ul>
    <hr />
    <ul>
        <li><?php echo $this->link('Areas',          array(), 'areas_list') ?></li>
        <li><?php echo $this->link('Programas',      array(), 'programs_list') ?></li>
        <li><?php echo $this->link('Areas de apoyo', array(), 'supports_list') ?></li>
    </ul>
    <hr />
    <ul>
        <li><?php echo $this->link('Solicitudes', array(), 'requests_list') ?></li>
        <li><?php echo $this->link('Eventos',     array(), 'events_list') ?></li>
        <li><?php echo $this->link('Talleres',    array(), 'courses_list') ?></li>
        <li><?php echo $this->link('Calendario',  array(), 'calendar_list') ?></li>
    </ul>
    <hr />
    <ul>
        <li><?php echo $this->link('Salas',         array(), 'rooms_list') ?></li>
        <li><?php echo $this->link('Residencias',   array(), 'residences_list') ?></li>
        <li><?php echo $this->link('Blog',          array(), 'blog_list') ?></li>
        <li><?php echo $this->link('Convocatorias', array(), 'boards_list') ?></li>
    </ul>
</div>
<?php } ?>
<?php } ?>
