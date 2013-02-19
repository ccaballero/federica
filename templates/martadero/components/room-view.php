<h1><?php echo $this->label . ' [' . $this->code . ']' ?></h1>

<div class="right">
    <?php echo $this->partial('widgets/plano-interactivo.php', array(
        'collection' => $this->collection,
    )) ?>
</div>
<div style="padding-right: 240px;">
    <img src="<?php echo $this->packageUrl('rooms', $this->code . '.jpg') ?>" alt="<?php echo $this->label ?>" />
    <?php echo $this->none($this->description1, '<h3>Uso</h3><p>+ ', '</p>') ?>
    <?php echo $this->none($this->description2, '<h3>Uso compatible</h3><p>+ ', '</p>') ?>
    <?php echo $this->none($this->description3, '<h3>Uso actual</h3><p>+ ', '</p>') ?>
    <?php echo $this->none($this->description4, '<h3>Descripción</h3>', '') ?>
    <?php echo $this->none($this->capacity, '<h3>Capacidad</h3><p>+ ', '</p>') ?>
</div>
