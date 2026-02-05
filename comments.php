<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>

<?php if ($this->allow('comment')): ?>
<section class="comment-section" id="comments">
    <h2 class="comment-title"><?php _e('发表评论'); ?></h2>

    <?php $this->comments()->to($comments); ?>
    <?php if ($comments->have()): ?>
    <ol class="comment-list">
        <?php while ($comments->next()): ?>
        <li id="comment-<?php $comments->theId(); ?>" class="comment-item">
            <div class="comment-meta">
                <span class="comment-author"><?php $comments->author(); ?></span>
                <span class="comment-date"><?php $comments->date('Y-m-d H:i'); ?></span>
            </div>
            <div class="comment-content"><?php $comments->content(); ?></div>
        </li>
        <?php endwhile; ?>
    </ol>
    <?php endif; ?>

    <div id="respond" class="comment-respond">
        <form method="post" action="<?php $this->commentUrl(); ?>" id="comment-form" class="comment-form" role="form">
            <input type="hidden" name="parent" id="comment-parent" value="0" />

            <div class="comment-form-top">
                <div class="comment-field">
                    <label for="author"><?php _e('昵称'); ?><span class="required">*</span></label>
                    <input type="text" id="author" name="author" required value="<?php $this->remember('author'); ?>" placeholder="<?php _e('请输入昵称'); ?>" />
                </div>
                <div class="comment-field">
                    <label for="mail"><?php _e('邮箱'); ?><span class="required">*</span></label>
                    <input type="email" id="mail" name="mail" required value="<?php $this->remember('mail'); ?>" placeholder="<?php _e('请输入邮箱'); ?>" />
                </div>
                <div class="comment-field">
                    <label for="url"><?php _e('地址'); ?></label>
                    <input type="url" id="url" name="url" value="<?php $this->remember('url'); ?>" placeholder="<?php _e('请输入地址'); ?>" />
                </div>
            </div>

            <div class="comment-form-bottom comment-field">
                <label for="textarea"><?php _e('评论内容'); ?></label>
                <textarea id="textarea" name="text" rows="6" required placeholder="<?php _e('请输入评论内容'); ?>"><?php $this->remember('text'); ?></textarea>
            </div>

            <button type="submit" class="comment-submit"><?php _e('提交评论'); ?></button>
        </form>
    </div>
</section>
<?php endif; ?>
