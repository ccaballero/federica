<?php $this->placeholder('toolbar')->captureStart() ?>

<?php if (!$this->auth->hasIdentity()) { ?>
<ul>
    <li>
        <a href="<?php echo $this->url(
            array('page' => 'participa_martadero.html'),
            'base_static'
        ) ?>">Participar en el espacio</a>
    </li>
    <li>
        <a href="<?php // TODO ?>http://www.martadero.org/lists/?p=subscribe&id=1" class="bold border-left" target="_blank">Suscríbete a nuestro boletín
        <img class="image-align" src="<?php echo $this->media_url ?>/images/arrow.gif" /></a>
    </li>
</ul>
<?php } else { ?>
<ul>
    <li><a href="<?php echo $this->url(array(), 'users_settings') ?>">Bienvenid@ <?php echo $this->auth->getIdentity()->firstname ?></a></li>
    <li><a class="border-left" href="<?php echo $this->url(array(), 'base_admin') ?>">administrador</a></li>
    <li><a class="border-left" href="<?php echo $this->url(array(), 'users_out') ?>">desconectar</a></li>
</ul>
<?php } ?>

<?php $this->placeholder('toolbar')->captureEnd() ?>