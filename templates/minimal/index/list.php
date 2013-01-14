<dl>
<?php foreach ($this->collection as $element) { ?>
    <?php echo $this->partial('resources/' . $this->resource_type . '.php', array('element' => $element)) ?>
<?php } ?>
</dl>
