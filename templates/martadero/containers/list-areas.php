<h1><?php echo $this->title ?></h1>

<ul class="index">
<?php foreach ($this->container->getTasks('list') as $task) { ?>
    <li><a href="<?php echo $task->url ?>"><?php echo $task->label ?></a></li>
<?php } ?>
</ul>

<div class="item-3">
    <p>En estos seis años de vida, como proyecto mARTadero, hemos realizado casi 800
    actividades de carácter diverso, recibiendo en el lugar a más de 200.000
    asistentes. Hoy por hoy es el proyecto cultural más innovador y de mayor
    crecimiento de Bolivia, y un ejemplo en la región, gracias al trabajo de más de
    treinta personas que a lo largo de este tiempo han colaborado con su esfuerzo y
    capacidad de gestión. Parte importante de dicho logro son las siete áreas de
    creación artística que plantean como objetivo el fomento y desarrollo de su
    ámbito artístico en la ciudad de Cochabamba no solo a través de exposiciones,
    sino, además, mediante la activación de dispositivos de formación y desarrollo
    con una especial inclinación hacia el arte emergente. A continuación detallamos
    los objetivos particulares de cada una de ellas:</p>
    <p><img src="/media/static/quienes-somos-html/estrella-areas.jpg"
            title="Areas de Creación Artística" /></p>

<?php foreach ($this->collection as $area) { ?>
    <div>
        <h2><a href="<?php echo $this->url(array('area' => $area->url), 'areas_area_view') ?>"><?php echo $area->label ?></a></h2>
        <?php echo $this->none($area->description, '', '') ?>
    </div>
<?php } ?>

</div>
