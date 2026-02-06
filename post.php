<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>

        <h1 class="post-title" itemprop="name headline">
            <?php $this->title() ?>
        </h1>
        <div class="meta">
                    <span><?php $this->date('F j, Y'); ?></span>                 
                    <?php _e('作者: '); ?><?php $this->author(); ?>                      
                    <?php _e('分类: '); ?><?php $this->category(','); ?>
                    </span></ul>
        </div>  
        <div class="post-content" itemprop="articleBody">
            <?php $this->content(); ?>
            <div class="post-tags">
        <nav class="nav tags">
            <ul class="flat">
                <?php _e(''); ?><?php $this->tags(' ', true, ''); ?>
            </ul>
        </nav>
    </div>
    </div>

</div><!-- end #main-->

<?php $this->need('footer.php'); ?>
