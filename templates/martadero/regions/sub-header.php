<?php $this->placeholder('sub-header')->captureStart() ?>
<?php

$params = array(
    'media_url' => $this->media_url,
    'auth' => $this->auth,
    'route' => $this->route,
    'region' => 'sub-header',
);

echo $this->partial('widgets/logo.php', $params);
echo $this->partial('widgets/participar.php', $params);
echo $this->partial('widgets/servicios.php', $params);

?>
<?php $this->placeholder('sub-header')->captureEnd() ?>