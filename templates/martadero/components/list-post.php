<div class="item-3">
    <div class="date">
        <?php echo $this->date ?>
    </div>
    <div class="content">
        <h2>
            <a href="<?php echo $this->url(array('post' => $this->url), 'blog_post_view') ?>">
                <?php echo $this->label ?>
            </a>
        </h2>
        <?php echo $this->description ?>
    </div>
</div>
