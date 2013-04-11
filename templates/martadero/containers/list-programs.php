<h1><?php echo $this->title ?></h1>

<ul class="index">
<?php foreach ($this->container->getTasks('list') as $task) { ?>
    <li><a href="<?php echo $task->url ?>"><?php echo $task->label ?></a></li>
<?php } ?>
</ul>

<div class="item-3">
    <p><img src="/media/static/quienes-somos-html/programas-desarrollo.jpg"
            title="Programas de Desarrollo Social" /></p>

<?php foreach ($this->collection as $program) { ?>
    <div>
        <h2><a href="<?php echo $this->url(array('program' => $program->url), 'programs_program_view') ?>"><?php echo $program->label ?></a></h2>
        <?php echo $this->none($program->description, '', '') ?>
    </div>
<?php } ?>

</div>
