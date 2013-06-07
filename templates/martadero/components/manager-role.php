<td class="text-center"><input type="checkbox" class="check" name="check[]" value="<?php echo $this->ident ?>" /></td>
<td><?php echo $this->label ?></td>
<td><?php echo $this->description ?></td>
<td class="text-center">
<?php foreach ($this->operations as $operation) { ?>
    <a href="<?php echo $this->url(array('role' => $this->ident), 'roles_role_' . $operation->name) ?>">
        <img src="<?php echo $this->baseUrl('/media/icons/' . $operation->icon . '.png') ?>" alt="<?php echo $operation->label ?>" title="<?php echo $operation->label ?>" />
    </a>
<?php } ?>
</td>
