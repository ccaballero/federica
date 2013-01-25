<h1><?php echo $this->route->label ?></h1>

<ul class="index">
<?php foreach ($this->container->getTasks('manager') as $task) { ?>
    <li><a href="<?php echo $task->url ?>"><?php echo $task->label ?></a></li>
<?php } ?>
</ul>

<form accept-charset="utf-8" action="" method="post">
    <?php echo $this->partial('components/tasks.php', array('tasks' => $this->container->getBatchOperations())) ?>
    <table>
        <tr>
            <th style="width: 20px;"><input class="groupall" type="checkbox"></th>
        <?php foreach ($this->container->getHeaders() as $header) { ?>
            <th><?php echo $header ?></th>
        <?php } ?>
        </tr>
    <?php foreach ($this->collection as $element) { ?>
        <tr class="<?php echo $this->cycle(array('even', 'odd'))->next()?>">
            <?php echo $this->modelRenderer($element, 'manager', array('operations' => $this->container->getElementOperations())); ?>
        </tr>
    <?php } ?>
    </table>
    <?php echo $this->partial('components/tasks.php', array('tasks' => $this->container->getBatchOperations())) ?>
</form>
