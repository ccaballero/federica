<?php $this->placeholder('sub-header')->captureStart() ?>

<?php echo $this->partial('widgets/logo.php', array('media_url' => $this->media_url)) ?>
<?php echo $this->partial('widgets/participar.php', array('media_url' => $this->media_url)) ?>
<?php echo $this->partial('widgets/servicios.php', array('media_url' => $this->media_url)) ?>

<?php $this->placeholder('sub-header')->captureEnd() ?>