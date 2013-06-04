<?php if ($this->route == 'base_admin'
        || substr($this->route, 0, count('areas_'))
        || substr($this->route, 0, count('programs_'))
        || substr($this->route, 0, count('supports_'))) { ?>
<?php if ($this->auth->hasIdentity()) { ?>
<div class="post">
    <h1>Administración</h1>
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
    <hr />
    <ul>
        <!--<li><a href="<?php // TODO ../archivos/index.php ?>">Archivos</a></li>-->
        <!--<li><a href="<?php // TODO ../accesorios_servicios/ver_accesorio_servicio.php ?>">Accesorios y servicios</a></li>-->
        <li><a href="<?php echo $this->url(array(), 'users_list') ?>">Usuarios</a></li>
        <!--<li><a href="<?php //echo $this->url(array(), 'users_settings') ?>">Perfil</a></li>-->
    </ul>
</div>
<?php } ?>
<?php } ?>
