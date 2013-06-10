<h1><?php echo $this->label . ' [' . $this->code . ']' ?></h1>

<div id="tabber">
    <ul id="tabs">
        <li class="tab">
            <a class="active" href="#information">Información</a>
        </li>
        <li class="tab">
            <a href="#calendar">Calendario</a>
        </li>
    </ul>
    <div class="tab_details">
        <div id="information" class="tab_contents">
            <div class="right">
                <?php echo $this->partial('widgets/plano-interactivo.php', array(
                    'collection' => $this->collection,
                )) ?>
            </div>
            <div style="padding-right: 240px;">
                <img src="<?php echo $this->packageUrl('rooms', $this->code . '.jpg') ?>" alt="<?php echo $this->label ?>" />
                <?php echo $this->none($this->capacity, '<h3>Capacidad</h3><p>+ ', '</p>') ?>
                <?php echo $this->none($this->general_purpose, '<h3>Uso</h3><p>+ ', '</p>') ?>
                <?php echo $this->none($this->compatible_purpose, '<h3>Uso compatible</h3><p>+ ', '</p>') ?>
                <?php echo $this->none($this->current_purpose, '<h3>Uso actual</h3><p>+ ', '</p>') ?>
                <?php echo $this->none($this->description, '<h3>Descripción</h3>', '') ?>
            </div>
        </div>
        <div id="calendar" class="tab_contents">
            <p>Tipo de visualizacion: </p>
        </div>
    </div>
</div>
