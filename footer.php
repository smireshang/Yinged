<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>

<a id="to_top" href="#" class="to_top"><i class="ri-arrow-up-line"></i></a> 
            <div class="footer">
                 <nav class="nav">
                 © 2019 - <?php echo date('Y'); ?> <?php $this->options->title(); ?> <a href="https://github.com/smireshang/Yinged" target="_blank" title="点击查看主题">Yinged</a></br>
                <a href="https://beian.miit.gov.cn/" target="_blank"><span><?php $this->options->footerbeian(); ?></span></a>
                <?php if (!empty($this->options->footerCustomHtml)) : ?>
                    <div class="footer-custom"><?php echo $this->options->footerCustomHtml; ?></div>
                <?php endif; ?>
                 </nav>
            </div>
        </div>
    </div>
    <script src="<?php $this->options->themeUrl('/js/iconfont.js'); ?>"></script>
    <script src="<?php $this->options->themeUrl('/js/app.js'); ?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/lightgallery@2.1.8/lightgallery.umd.min.js"></script>
</body>
</html>
