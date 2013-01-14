<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta http-equiv="Content-Language" content="es" />
        <meta http-equiv="title" content="Yachay v1.0" />
        <meta name="author" content="Carlos E. Caballero B." />
        <meta name="description" content="" />
        <meta name="distribution" content="global" />
        <meta name="keywords" content="redes,educacion,social,distribuido" />
        <meta name="locality" content="Cochabamba, Bolivia" />
        <meta name="organization" content="Yachay" />
        <meta name="revisit" content="1 days" />
        <meta name="title" content="" />

        <link media="all" href="<?php echo $this->media_url ?>/css/style.css" type="text/css" rel="stylesheet" />

        <!-- tag for no indexation in spiders -->
        <meta name="robots" content="noindex,follow" />

        <title>Yachay</title>
    </head>
    <body>
        <div id="toolbar">
            <div id="toolbar_wrapper">
                <ul>
                    <li><a href="#">Ingresar</a></li>
                    <li><a href="#"><span class="cyan_fg">Registrarse</span></a></li>
                </ul>
            </div>
        </div>
        <div id="menubar">
            <div id="menubar_wrapper">
                <ul class="left">
                    <li class="yellow"><a href="#">Principal</a></li>
                    <li class="blue"><a href="#">Contenidos minimos</a></li>
                    <li class="red"><a href="#">Comunidades</a></li>
                    <li class="green"><a href="#">Calendario</a></li>
                </ul>
                <ul id="contact" class="right">
                    <li><a href="#">Contactenos</a></li>
                </ul>
            </div>
        </div>
        <div id="content">
            <div id="main">
                <?php echo $this->layout()->content ?>
            </div>
            <div id="sidebar">
                <div class="widget">
                    <h2>Usuarios</h2>
                    <form action="" method="post">
                        <p><label>Correo electrónico:</label><input type="text" /></p>
                        <p><label>Contraseña:&nbsp;<a class="right" href="#">¿la olvidaste?</a></label><input type="password" /></p>
                        <p><input type="submit" value="Ingresar" /></p>
                    </form>
                </div>
                <div class="widget">
                    <h2>¿Aún no formas parte?</h2>
                    <a class="right button" href="">Unetenos! :)</a>
                    <div class="clear"></div>
                </div>
            </div>
        </div>
    </body>
</html>
