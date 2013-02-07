<?php if ($this->auth->hasIdentity()) { ?>
<div class="post">
    <h1>Administración</h1>
    <ul>
        <li><a href="<?php // TODO ../solicitudes/index.php ?>">Solicitudes</a></li>
        <li><a href="<?php // TODO ../eventos/index.php ?>">Eventos</a></li>
        <li><a href="<?php // TODO ../calendario/index.php ?>">Calendario</a></li>
        <li><a href="<?php // TODO ../talleres/index.php ?>">Talleres</a></li>
        <li><a href="<?php // TODO ../convocatorias/index.php ?>">Convocatorias</a></li>
        <li><a href="<?php // TODO ../residencias/index.php ?>">Residencias</a></li>
        <li><a href="<?php // TODO ../salas/index.php ?>">Salas</a></li>
        <li><a href="<?php // TODO ../areas/index.php ?>">Areas</a></li>
        <li><a href="<?php // TODO ../archivos/index.php ?>">Archivos</a></li>
        <li><a href="<?php // TODO ../accesorios_servicios/ver_accesorio_servicio.php ?>">Accesorios y servicios</a></li>
        <li><a href="<?php // TODO ../usuarios/index.php ?>">Usuarios</a></li>
        <li><a href="<?php // TODO ../noticia/index.php ?>">Noticias</a></li>
        <li><a href="<?php echo $this->url(array(), 'users_settings') ?>">Perfil</a></li>
    </ul>
</div>
<?php } ?>
