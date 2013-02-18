<h1><?php echo $this->label . ' [' . $this->code . ']' ?></h1>

<div class="left">
    <?php echo $this->partial('widgets/plano-interactivo.php', array(
        'resources' => $this->resources,
    )) ?>
</div>
<div style="padding-left: 240px;">
    <img src="<?php echo $this->packageUrl('resources', $this->code . '.jpg') ?>" alt="<?php echo $this->label ?>" />
    <h3>Uso</h3>
    <p><?php echo $this->none($this->description1, '+ ', '') ?></p>
    <h3>Capacidad</h3>
    <p><?php echo $this->none($this->capacity, '+ ', '') ?></p>
</div>


<?php
/*
$smarty->assign('uso', utf8_decode($row[3]));
$smarty->assign('uso_comp', utf8_decode($row[4]));
$smarty->assign('uso_act', utf8_decode($row[5]));
$smarty->assign('capacidad', $row[6]);
$smarty->assign('estado', utf8_decode($row[7]));

if ($row[8] != '') {
$smarty->assign('caracteristicas', set_list(utf8_decode($row[8])));
} else {
$smarty->assign('caracteristicas', '');
}
if (file_exists('../imagenes/espacios/planos/' . $row[11])) {
$smarty->assign('plano', rawurlencode(utf8_decode($row[11])));
} else {
$smarty->assign('plano', '');
}
if (file_exists('../imagenes/espacios/paneos/' . $row[12])) {
$smarty->assign('paneo', rawurlencode(utf8_decode($row[12])));
} else {
$smarty->assign('paneo', '');
}
*/