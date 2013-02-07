<?php if ((($this->route == 'base' || $this->route == 'base_static') && $this->region == 'sub-header') ||
          (($this->route <> 'base' && $this->route <> 'base_static') && $this->region == 'left')) { ?>
<div id="logo">
    <a href="<?php echo $this->url(array(), 'base') ?>">
        <img src="<?php echo $this->media_url ?>/images/martadero.jpg"
             title="proyecto mARTadero" alt="proyecto mARTadero" />
    </a>
</div>
<?php } ?>