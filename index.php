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
?>

            <article>              
            <div class="recent-posts section">
  <h2 class="section-header">随笔<i class="ri-quill-pen-line"></i></h2>
  <?php while ($this->next()): ?>
    <div class="posts"><div class="post">
    <a href="<?php $this->permalink() ?>"><?php $this->title() ?></a>
    <div class="time"><?php $this->date('F j, Y'); ?></div></div><div class="post">
    <?php endwhile; ?>
</ul>
</article>
<ul class="pagination">
    <li class="page-item page-previous"><?php $this->pageLink('下一页','next'); ?><span aria-hidden="true"></span></a></li>     
    <li class="page-item page-next"><?php $this->pageLink('上一页'); ?><span aria-hidden="true"></span></a></li>
</ul>
<?php $this->need('footer.php'); ?>
