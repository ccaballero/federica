<?php if (!$this->auth->hasIdentity()) { ?>
<div class="post">
    <h1>Usuario del mARTadero</h1>
    <form method="post" action="<?php echo $this->url(array(), 'users_in') ?>">
        <p><label>Correo electrónico:</label><input type="text" name="email" /></p>
        <p><label>Contraseña:</label><input type="password" name="password" /></p>
        <p><input type="submit" value="Acceder" /></p>
    </form>
</div>
<?php } ?>
