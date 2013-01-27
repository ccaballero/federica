<?php $this->placeholder('left')->captureStart() ?>

<?php echo $this->partial('widgets/calendario.php', array('media_url' => $this->media_url)) ?>
<?php echo $this->partial('widgets/eje-tematico.php', array('media_url' => $this->media_url)) ?>
<?php echo $this->partial('widgets/menu-lateral.php', array('media_url' => $this->media_url)) ?>
<?php echo $this->partial('widgets/menu-administracion.php', array('media_url' => $this->media_url)) ?>
<?php echo $this->partial('widgets/ingresar.php', array('media_url' => $this->media_url)) ?>
<?php echo $this->partial('widgets/contactos.php', array('media_url' => $this->media_url)) ?>
<?php echo $this->partial('widgets/comparte.php', array('media_url' => $this->media_url)) ?>

<?php $this->placeholder('left')->captureEnd() ?>