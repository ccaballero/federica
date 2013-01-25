<h1><?php echo $this->route->label ?></h1>

<ul class="index">
<?php foreach ($this->container->getTasks('list') as $task) { ?>
    <li><a href="<?php echo $task->url ?>"><?php echo $task->label ?></a></li>
<?php } ?>
</ul>

<?php foreach ($this->collection as $element) { ?>
    <?php echo $this->modelRenderer($element, 'list') ?>
<?php } ?>
