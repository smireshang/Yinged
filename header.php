<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="<?php $this->options->charset(); ?>">
    <meta name="renderer" content="webkit">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title><?php $this->archiveTitle([
            'category' => _t('分类 %s 下的文章'),
            'search'   => _t('包含关键字 %s 的文章'),
            'tag'      => _t('标签 %s 下的文章'),
            'author'   => _t('%s 发布的文章')
        ], '', ' - '); ?><?php $this->options->title(); ?></title>

    <link rel="stylesheet" href="<?php $this->options->themeUrl('/css/main.css'); ?>">
    <link rel="stylesheet" href="<?php $this->options->themeUrl('/css/normalize.css'); ?>">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <script src="<?php $this->options->themeUrl('/js/jquery.min.js'); ?>"></script>
    <?php $this->header(); ?>
</head>
<body>
<div class="main">
    <?php $calendarMonth = date('n'); ?>
    <?php $calendarDay = date('j'); ?>
    <div class="calendar-widget" aria-hidden="true">
        <div class="calendar-month"><?php echo $calendarMonth; ?>月</div>
        <div class="calendar-day"><?php echo $calendarDay; ?></div>
    </div>
    <div class="container">
        <header class="header">
            <a href="<?php $this->options->siteUrl('admin'); ?>" class="site-logo-link">
                <img src="<?php $this->options->logoUrl(); ?>" width="80" height="80" alt="<?php $this->options->title(); ?>"/>
            </a>
            <div class="site-info">
                <h1><?php $this->options->title(); ?></h1>
                <p class="site-description"><?php $this->options->yiyan(); ?></p>
            </div>
        </header>
        <nav class="nav header-nav">
            <div class="header-nav-inner">
                <ul class="flat">
                    <li class="active"><a href="<?php $this->options->siteUrl(); ?>">首页</a></li>
                    <?php
                    $navCategoryMids = yingedGetCategoryMids($this->options->navCategoryMids);
                    if (!empty($navCategoryMids)) :
                        $categoryList = $this->widget('Widget_Metas_Category_List');
                        $categoryMap = array();
                        while ($categoryList->next()) :
                            $categoryMap[(int) $categoryList->mid] = array(
                                'permalink' => $categoryList->permalink,
                                'name' => $categoryList->name,
                            );
                        endwhile;
                        foreach ($navCategoryMids as $mid) :
                            if (!isset($categoryMap[$mid])) {
                                continue;
                            }
                            $category = $categoryMap[$mid];
                            ?>
                            <li class="active"><a href="<?php echo $category['permalink']; ?>"><?php echo $category['name']; ?></a></li>
                        <?php endforeach; ?>

                    <?php endif; ?>
                    <?php $this->widget('Widget_Contents_Page_List')->parse('<li class="active"><a href="{permalink}">{title}</a></li> '); ?>
                </ul>
                <div class="header-search">
                    <button type="button" class="header-search-toggle" id="header-search-toggle" aria-expanded="false" aria-controls="header-search-form" aria-label="搜索">
                        <i class="ri-search-line" aria-hidden="true"></i>
                    </button>
                    <form method="get" action="<?php $this->options->siteUrl(); ?>" id="header-search-form" class="header-search-form" role="search">
                        <label for="header-search-input" class="visually-hidden">搜索</label>
                        <input id="header-search-input" type="search" name="s" placeholder="搜索文章" autocomplete="off" required>
                    </form>
                </div>
            </div>
        </nav>
        <div class="content-loading-mask" aria-hidden="true">
            <img src="https://blog.misstwo.top/loading.gif" alt="">
            <div class="loading-text">努力加载中…</div>
        </div>
