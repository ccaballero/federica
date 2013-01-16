<div id="content">
    <div id="main"><?php echo $this->layout()->content ?></div>
    <div id="left_bar"><?php echo $this->partial('regions/left.php', array('media_url' => $this->media_url)) ?></div>
    <div class="clear"></div>
</div>
<div id="right_bar"><?php echo $this->partial('regions/right.php', array('media_url' => $this->media_url)) ?></div>
<div class="clear"></div>

<div id="foot_bar">
    <ul>
        <li>Proyecto generado por <a href="" title="NADA">NADA</a>
            <a href=""><img src="<?php echo $this->media_url ?>/images/logo_nada_web.jpg" alt="NADA" title="NADA" /></a>
        </li>
        <li>Gestionado por <a href="http://www.fundacionimagen.org/" title="Fundación Imagen" target="_blank">Fundación Imagen</a>
            <a href="http://www.fundacionimagen.org/" target="_blank"><img src="<?php echo $this->media_url ?>/images/logo_fi_web.jpg" alt="Fundación Imagen" title="Fundación Imagen" /></a>
        </li>
    </ul>
</div>
