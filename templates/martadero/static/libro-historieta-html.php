<?php $this->headTitle('Historieta: Recuperación de Cuentos Populares', 'PREPEND') ?>

<h1>Historieta: Recuperación de Cuentos Populares</h1>

<p><strong>Descárgate</strong> el libro</p>
<p><a href="<?php echo $this->baseUrl('/media/zip/historieta-rescate-de-cuentos.zip') ?>" target="_blank">Comprimido en ZIP (12.4 MiB)</a><br />
<a href="<?php echo $this->baseUrl('/media/pdf/historieta-rescate-de-cuentos.pdf') ?>">En descarga directa PDF (12.8 MiB)</a></p>

<?php echo $this->service('disqus') ?>
