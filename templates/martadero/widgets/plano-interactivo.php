<img src="<?php echo $this->packageUrl('resources', 'plano.png') ?>"
        usemap="#salas" />
<map name="salas">
<?php foreach ($this->resources as $resource) { ?>
    <area shape="<?php echo $resource->shape ?>"
            coords="<?php echo $resource->coords ?>"
            href="<?php echo $this->url(array('resource' => $resource->code), 'resources_resource_view') ?>"
            title="<?php echo $resource ?>" />
<?php } ?>
</map>