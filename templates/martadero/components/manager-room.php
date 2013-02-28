<td class="text-center"><input type="checkbox" class="check" name="check[]" value="<?php echo $this->ident ?>" /></td>
<td class="text-center"><?php echo $this->code ?></td>
<td><?php echo $this->label ?></td>
<td class="text-center"><?php echo $this->glossary('room', 'type', $this->type) ?></td>
<td class="text-center">
<?php foreach ($this->operations as $operation) { ?>
    <a href="<?php echo $this->url(array('room' => $this->code), 'rooms_room_' . $operation->name) ?>">
        <img src="<?php echo $this->baseUrl('/media/icons/' . $operation->icon . '.png') ?>" alt="<?php echo $operation->label ?>" title="<?php echo $operation->label ?>" />
    </a>
<?php } ?>
</td>
