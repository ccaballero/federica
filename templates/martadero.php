<?php echo $this->doctype() ?>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <?php echo $this->headTitle() ?>
        <?php echo $this->headMeta() ?>
        <?php echo $this->headLink() ?>
        <?php echo $this->headStyle() ?>
        <?php echo $this->headScript() ?>
    </head>
    <body>
        <div id="wrapper1">
            <div id="header"><?php echo $this->placeholder('header') ?></div>
            <div id="wrapper2">
                <div id="container">
                    <div id="bar">
                        <?php echo $this->placeholder('menubar') ?>
                        <div class="clear"></div>
                    </div>
                    <div id="tools"><?php echo $this->placeholder('toolbar') ?></div>
                    <div id="head_bar">
                        <?php echo $this->placeholder('sub-header') ?>
                        <div class="clear"></div>
                    </div>
                    <div id="content">
                        <div id="main">
                            <?php echo $this->placeholder('messages') ?>
                            <?php echo $this->layout()->content ?>
                        </div>
                        <div id="left_bar"><?php echo $this->placeholder('left') ?></div>
                        <div id="right_bar"><?php echo $this->placeholder('right') ?></div>
                    </div>
                    <div class="clear"></div>
                    <div id="foot_bar"><?php echo $this->placeholder('foot-bar') ?></div>
                </div>
                <div id="footer">
                    <?php echo $this->placeholder('footer') ?>
                    <div class="clear"></div>
                </div>
            </div>
        </div>
    </body>
</html>
