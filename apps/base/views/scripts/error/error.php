<h1><?php echo $this->message ?></h1>
<p>Si llegaste a esta página de manera casual, es que la petición que realizaste
no existe, considerando todos los factores, esto deberia ser por una de las
siguientes causas:</p>
<ol>
    <li>La página requerida jamas existio, y muy probablemente lo soñaste.</li>
    <li>La página vivio un tiempo y luego murio, a causa de algun motivo.</li>
    <li>La página fue movida a otro lugar del sitio, es decir, cambio de nombre.</li>
</ol>

<?php if (isset($this->exception)) { ?>
    <h2>Información del error:</h2>
    <p><?php echo $this->exception->getMessage() ?></p>

    <h3>Pila de error:</h3>
    <pre><?php echo $this->exception->getTraceAsString() ?></pre>

    <h3>Parametros de la petición:</h3>
    <pre><?php echo var_export($this->request->getParams(), true) ?></pre>
<?php } ?>
