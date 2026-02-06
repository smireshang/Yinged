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
    <?php
    $sourceType = isset($this->fields->sourceType) ? $this->fields->sourceType : 'original';
    $sourceUrl = isset($this->fields->sourceUrl) ? trim((string) $this->fields->sourceUrl) : '';
    ?>
    <div class="post-source-note">
        <?php if ($sourceType === 'reprint' && $sourceUrl): ?>
            文章来源：转载，原文地址为 <a href="<?php echo $sourceUrl; ?>" rel="noopener noreferrer" target="_blank"><?php echo $sourceUrl; ?></a>
        <?php elseif ($sourceType === 'reprint'): ?>
            文章来源：转载，转载请注明来源
        <?php else: ?>
            文章来源：原创，转载请注明来源
        <?php endif; ?>
    </div>
    </div>

</div><!-- end #main-->

<?php $this->need('footer.php'); ?>
