<?php $this->placeholder('right')->captureStart() ?>

<?php echo $this->partial('widgets/podcast.php', array('media_url' => $this->media_url)) ?>
<?php echo $this->partial('widgets/blog.php', array('media_url' => $this->media_url)) ?>
<?php echo $this->partial('widgets/convocatorias.php', array('media_url' => $this->media_url)) ?>
<?php echo $this->partial('widgets/descargas.php', array('media_url' => $this->media_url)) ?>

<?php $this->placeholder('right')->captureEnd() ?>