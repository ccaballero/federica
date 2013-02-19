<img src="<?php echo $this->packageUrl('rooms', 'plano.png') ?>" usemap="#salas" />
<map name="salas">
<?php foreach ($this->collection as $room) { ?>
    <area shape="<?php echo $room->shape ?>"
            coords="<?php echo $room->coords ?>"
            href="<?php echo $this->url(array('room' => $room->code), 'rooms_room_view') ?>"
            title="<?php echo $room ?>" />
<?php } ?>
</map>

<p style="text-align: center;" class="bold">
    <a href="<?php echo $this->url(array(), 'rooms_list') ?>">&laquo;Ver todas las salas&raquo;</a>
</p>
