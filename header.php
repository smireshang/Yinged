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
<div class="page-progress" aria-hidden="true"><span></span></div>
<div class="main">
    <div class="container">
        <header class="header">
            <img src="<?php $this->options->logoUrl(); ?>" width="80" height="80" alt="<?php $this->options->title(); ?>"/>
            <div class="site-info">
                <h1><?php $this->options->title(); ?></h1>
                <p class="site-description"><?php $this->options->yiyan(); ?></p>
            </div>
        </header>
        <nav class="nav header-nav">
            <ul class="flat">
                <li class="active"><a href="<?php $this->options->siteUrl(); ?>">首页</a></li>
                <?php $this->widget('Widget_Contents_Page_List')->parse('<li class="active"><a href="{permalink}">{title}</a></li> '); ?>
            </ul>
        </nav>
