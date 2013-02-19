<?php if (!$this->auth->hasIdentity()) { ?>
<div class="post">
    <h1>Eje temático 2012</h1>
    <ul>
        <li>
            <a href="<?php echo $this->url(array('page' => 'eje-tematico.html'), 'base_static') ?>">Reductos tecno-lógicos</a>
        </li>
    </ul>
</div>
<?php } ?>
