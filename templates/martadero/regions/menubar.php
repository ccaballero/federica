<?php $this->placeholder('menubar')->captureStart() ?>

<?php echo $this->partial('widgets/menu-principal.php', array('media_url' => $this->media_url)) ?>
<?php echo $this->partial('widgets/social.php', array('media_url' => $this->media_url)) ?>

<?php $this->placeholder('menubar')->captureEnd() ?>