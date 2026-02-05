<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>

        <h1 class="post-title" itemprop="name headline">
            <?php $this->title() ?>
        </h1>
    <div class="post-content" itemprop="articleBody">
    <?php $this->content(); ?>

<?php $this->need('footer.php'); ?>