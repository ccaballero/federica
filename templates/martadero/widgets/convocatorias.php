<div class="post">
    <h1>CONVOCATORIAS</h1>
    <div class="email">
        Actualízate desde <a href="" title="Recibe las convocatorias en tu email">tu email</a>
        <a href=""
           title="Recibe las convocatorias en tu email">
            <img class="image-align" src="<?php echo $this->media_url ?>/images/mail.png"
                 alt="email" title="email" />
        </a>
    </div>
    <div class="clear"></div>

<?php foreach ($this->boards as $board) { ?>
    <div class="post-element">
        <img src="<?php echo $this->media_url ?>/images/flecha_blog.jpg" alt="" title="" />
        <a href="<?php echo $this->url(array('board' => $board->url), 'boards_board_view') ?>"
           title="<?php echo $board->label ?>"><?php echo $board->label ?></a>
    </div>
<?php } ?>
    <div class="all">
        <a title="Lee y comenta las noticias y artículos del mARTadero"
           href="<?php echo $this->url(array(), 'boards_list') ?>">...consulta + posts del Blog.</a>
    </div>
</div>
