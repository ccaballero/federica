<div class="post">
    <h1>BLOG</h1>
    <div class="email">
        Actualízate desde <a href="" title="Recibe los post del BLOG en tu email">tu email</a>
        <a href=""
           title="Recibe los post del BLOG en tu email">
            <img class="image-align" src="<?php echo $this->media_url ?>/images/mail.png"
                 alt="email" title="email" />
        </a>
    </div>
    <div class="clear"></div>

<?php foreach ($this->posts as $post) { ?>
    <div class="post-element">
        <img src="<?php echo $this->media_url ?>/images/flecha_blog.jpg" alt="" title="" />
        <a href="<?php echo $this->url(array('post' => $post->url), 'blog_post_view') ?>"
           title="<?php echo $post->label ?>"><?php echo $post->label ?></a>
    </div>
<?php } ?>
    <div class="all">
        <a title="Lee y comenta las noticias y artículos del mARTadero"
           href="<?php echo $this->url(array(), 'blog_list') ?>">...consulta + posts del Blog.</a>
    </div>
</div>
