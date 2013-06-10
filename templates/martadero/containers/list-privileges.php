<h1><?php echo $this->route->label ?></h1>

<ul>
<?php foreach ($this->collection as $element) { ?>
    <li><?php echo $this->modelRenderer($element, 'list') ?></li>
<?php } ?>
</ul>
