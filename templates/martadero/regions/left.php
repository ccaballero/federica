<?php $this->placeholder('left')->captureStart() ?>
<?php

$params = array(
    'media_url' => $this->media_url,
    'auth' => $this->auth,
    'route' => $this->route,
    'region' => 'left',
);

echo $this->partial('widgets/logo.php', $params);
echo $this->partial('widgets/calendario.php', $params);
echo $this->partial('widgets/ingresar.php', $params);
echo $this->partial('widgets/eje-tematico.php', $params);
echo $this->partial('widgets/menu-lateral.php', $params);
echo $this->partial('widgets/menu-administracion.php', $params);
echo $this->partial('widgets/contactos.php', $params);
echo $this->partial('widgets/comparte.php', $params);

?>
<?php $this->placeholder('left')->captureEnd() ?>
