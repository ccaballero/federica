<?php $this->placeholder('foot-bar')->captureStart() ?>

<ul>
    <li>Proyecto generado por
        <a href="<?php echo $this->url(
            array('page' => 'quienes-somos.html'), 'base_static'
        ) ?>" title="NADA">NADA</a>
        <a href="<?php echo $this->url(
            array('page' => 'quienes-somos.html'), 'base_static'
        ) ?>"><img src="<?php echo $this->media_url ?>/images/logo_nada_web.jpg"
                   alt="NADA" title="NADA" /></a>
    </li>
    <li>
        Gestionado por <a href="http://www.fundacionimagen.org/"
                          title="Fundación Imagen" target="_blank">Fundación Imagen</a>
        <a href="http://www.fundacionimagen.org/" target="_blank">
            <img src="<?php echo $this->media_url ?>/images/logo_fi_web.jpg"
                 alt="Fundación Imagen" title="Fundación Imagen" /></a>
    </li>
</ul>

<?php $this->placeholder('foot-bar')->captureEnd() ?>