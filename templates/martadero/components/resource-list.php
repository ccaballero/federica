<h1>Conoce las salas</h1>

<div class="left">
    <?php echo $this->partial('widgets/plano-interactivo.php', array(
        'resources' => $this->resources,
    )) ?>
</div>
<div style="padding-left: 240px;">
<?php foreach ($this->resources as $resource) { ?>
    <div>
        <h2><a href="<?php echo $this->url(array('resource' => $resource->code), 'resources_resource_view') ?>"><?php echo $resource ?></a></h2>
        <a href="<?php echo $this->packageUrl('resources', $resource->code . '.jpg') ?>"
           class="highslide right_image" onclick="return hs.expand(this);">
            <img src="<?php echo $this->packageUrl('resources', $resource->code . '-small.jpg') ?>"
                 alt="<?php echo $resource ?>" />
        </a>
        <p><?php echo $this->none($resource->description1, '+ ', '') ?></p>
        <p><?php echo $this->none($resource->capacity, '+ ', '') ?></p>
    </div>
<?php } ?>
</div>
