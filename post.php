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

    <?php if ($this->allow('comment')): ?>
    <section class="comment-section" id="comments">
        <h2 class="comment-title"><?php _e('发表评论'); ?></h2>
        <form method="post" action="<?php $this->commentUrl(); ?>" class="comment-form" role="form">
            <div class="comment-form-top">
                <div class="comment-field">
                    <label for="author"><?php _e('昵称'); ?><span class="required">*</span></label>
                    <input type="text" id="author" name="author" required placeholder="<?php _e('请输入昵称'); ?>">
                </div>
                <div class="comment-field">
                    <label for="mail"><?php _e('邮箱'); ?><span class="required">*</span></label>
                    <input type="email" id="mail" name="mail" required placeholder="<?php _e('请输入邮箱'); ?>">
                </div>
                <div class="comment-field">
                    <label for="url"><?php _e('地址'); ?></label>
                    <input type="url" id="url" name="url" placeholder="<?php _e('请输入地址'); ?>">
                </div>
            </div>
            <div class="comment-form-bottom comment-field">
                <label for="textarea"><?php _e('评论内容'); ?></label>
                <textarea id="textarea" name="text" rows="6" required placeholder="<?php _e('请输入评论内容'); ?>"></textarea>
            </div>
            <button type="submit" class="comment-submit"><?php _e('提交评论'); ?></button>
        </form>
    </section>
    <?php endif; ?>
</div><!-- end #main-->

<?php $this->need('footer.php'); ?>
