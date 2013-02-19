<div>
    <h2><a href="<?php echo $this->url(array('room' => $this->code), 'rooms_room_view') ?>"><?php echo $this->label ?></a></h2>
    <a href="<?php echo $this->packageUrl('rooms', $this->code . '.jpg') ?>"
        class="highslide right_image" onclick="return hs.expand(this);">
        <img src="<?php echo $this->packageUrl('rooms', $this->code . '-small.jpg') ?>"
                alt="<?php echo $this->label ?>" />
    </a>
    <p><?php echo $this->none($this->description1, '+ ', '') ?></p>
    <p><?php echo $this->none($this->capacity, '+ ', '') ?></p>
</div>
