<div class="tasks">
<?php foreach ($this->tasks as $task) { ?>
    <input type="submit" name="<?php echo $task->name ?>" value="<?php echo $task->label ?>" />
<?php } ?>
</div>
