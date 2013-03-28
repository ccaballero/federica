<div class="item-3">
    <div class="date">
        Del: <?php echo $this->start_date ?> al: <?php echo $this->end_date ?>
    </div>
    <div class="content">
        <h2>
            <a href="<?php echo $this->url(array('board' => $this->url), 'boards_board_view') ?>">
                <?php echo $this->label ?>
            </a>
        </h2>
        <?php echo $this->description ?>
    </div>
</div>
