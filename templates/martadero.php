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
            <div id="header"><?php echo $this->partial('regions/header.php', array('media_url' => $this->media_url)) ?></div>
            <div id="wrapper2">
                <div id="container">
                    <div id="bar"><?php echo $this->partial('regions/menubar.php', array('media_url' => $this->media_url)) ?></div>
                    <div id="tools"><?php echo $this->partial('regions/toolbar.php', array('media_url' => $this->media_url)) ?></div>
                    <div id="head_bar"><?php echo $this->partial('regions/sub-header.php', array('media_url' => $this->media_url)) ?></div>
                    <div class="clear"></div>
                    <div id="content">
                        <div id="main"><?php echo $this->layout()->content ?></div>
                        <div id="left_bar"><?php echo $this->partial('regions/left.php', array('media_url' => $this->media_url)) ?></div>
                        <div id="right_bar"><?php echo $this->partial('regions/right.php', array('media_url' => $this->media_url)) ?></div>
                    </div>
                    <div class="clear"></div>
                    <div id="foot_bar"><?php echo $this->partial('regions/foot_bar.php', array('media_url' => $this->media_url)) ?></div>
                </div>
                <div id="footer"><?php echo $this->partial('regions/footer.php', array('media_url' => $this->media_url)) ?></div>
            </div>
        </div>
    </body>
</html>
