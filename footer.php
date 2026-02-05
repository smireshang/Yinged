<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>

<a id="to_top" href="#" class="to_top"><i class="ri-arrow-up-line"></i></a>
<div class="footer">
    <nav class="nav">
        © 2016 - <?php echo date('Y'); ?> Theme is <a href="https://github.com/Siooooooooo/Ying/" target="_blank" rel="noopener noreferrer">颖</a><br/>
        <?php if (trim((string)$this->options->footerbeian) !== ''): ?>
        <a href="https://beian.miit.gov.cn/" target="_blank" rel="noopener noreferrer"><span><?php $this->options->footerbeian(); ?></span></a><br/>
        <?php endif; ?>
        <svg class="icon" aria-hidden="true">
            <use xlink:href="#icon-cn"></use>
        </svg>
    </nav>
</div>
</div>
</div>
<script src="<?php $this->options->themeUrl('/js/iconfont.js'); ?>"></script>
<script src="<?php $this->options->themeUrl('/js/app.js'); ?>"></script>
</body>
</html>
