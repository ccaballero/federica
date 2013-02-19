<h1>Conoce las salas</h1>

<ul class="index">
<?php foreach ($this->container->getTasks('list') as $task) { ?>
    <li><a href="<?php echo $task->url ?>"><?php echo $task->label ?></a></li>
<?php } ?>
</ul>

<div class="right">
    <?php echo $this->partial('widgets/plano-interactivo.php', array(
        'collection' => $this->collection,
    )) ?>
</div>
<div style="padding-right: 240px;">
<?php foreach ($this->collection as $room) { ?>
    <div class="item-2">
        <h2><a href="<?php echo $this->url(array('room' => $room->code), 'rooms_room_view') ?>"><?php echo $room ?></a></h2>
        <a href="<?php echo $this->packageUrl('rooms', $room->code . '.jpg') ?>"
           class="highslide right_image" onclick="return hs.expand(this);">
            <img src="<?php echo $this->packageUrl('rooms', $room->code . '-small.jpg') ?>"
                 alt="<?php echo $room ?>" />
        </a>
        <p><?php echo $this->none($room->description1, '+ ', '') ?></p>
        <p><?php echo $this->none($room->capacity, '+ ', '') ?></p>
    </div>
<?php } ?>
</div>
