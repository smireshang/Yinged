<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>

<a id="to_top" href="#" class="to_top"><i class="ri-arrow-up-line"></i></a> 
            <div class="footer">
                 <nav class="nav">
                 © 2019 - <?php echo date('Y'); ?> <?php $this->options->title(); ?> <a href="https://github.com/osgz/Ying/" target="_blank" title="点击查看主题">Ying</a></br>
                <a href="https://beian.miit.gov.cn/" target="_blank"><span><?php $this->options->footerbeian(); ?></span></a>
<div class="upyun-link"><a href="https://www.upyun.com/?utm_source=lianmeng&amp;utm_medium=referral" target="_blank"><img src="https://pic.imgdb.cn/item/610f528b5132923bf8d27dfb.png" alt="又拍云"/><span>云服务by又拍云</span></a></div>
                 </nav>
            </div>
        </div>
    </div>
    <script src="<?php $this->options->themeUrl('/js/iconfont.js'); ?>"></script>
    <script src="<?php $this->options->themeUrl('/js/app.js'); ?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/lightgallery@2.1.8/lightgallery.umd.min.js"></script>
</body>
</html>
