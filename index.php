<?php
/**
 * 简约而不简单
 * 
 * @package Yinged
 * @author biilii, 颖宝
 * @version 1.1
 * @link https://github.com/smireshang/Yinged/
 */

if (!defined('__TYPECHO_ROOT_DIR__')) exit;
$this->need('header.php');

$topCids = yingedGetTopCids($this->options->topCids);
$currentPage = (int) ($this->request->page ? $this->request->page : 1);
$isFirstPage = $currentPage === 1;
$showTopPosts = $isFirstPage && !empty($topCids);
?>

<article>
    <div class="recent-posts section">
        <h2 class="section-header">随笔<i class="ri-quill-pen-line"></i></h2>

        <?php if ($showTopPosts): ?>
            <?php foreach ($topCids as $topCid): ?>
                <?php $this->widget('Widget_Archive@top-' . $topCid, 'pageSize=1&type=post', 'cid=' . $topCid)->to($topPost); ?>
                <?php if ($topPost->have()): $topPost->next(); ?>
                    <div class="posts">
                        <div class="post is-top-post">
                            <a href="<?php $topPost->permalink(); ?>"><span class="top-flag">[TOP]</span><?php $topPost->title(); ?></a>
                            <div class="time"><?php $topPost->date('F j, Y'); ?></div>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        <?php endif; ?>

        <?php while ($this->next()): ?>
            <?php if ($showTopPosts && in_array((int) $this->cid, $topCids, true)) continue; ?>
            <div class="posts">
                <div class="post">
                    <a href="<?php $this->permalink(); ?>"><?php $this->title(); ?></a>
                    <div class="time"><?php $this->date('F j, Y'); ?></div>
                </div>
            </div>
        <?php endwhile; ?>
    </div>
</article>

<ul class="pagination">
    <li class="page-item page-previous"><?php $this->pageLink('下一页', 'next'); ?></li>
    <li class="page-item page-next"><?php $this->pageLink('上一页'); ?></li>
</ul>

<?php $this->need('footer.php'); ?>
