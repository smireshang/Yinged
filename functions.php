<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;

function themeConfig($form)
{
    $logoUrl = new Typecho_Widget_Helper_Form_Element_Text('logoUrl', NULL, 'https://jihulab.com/uploads/-/system/user/avatar/8308/avatar.png?width=400', _t('头像'), _t('在这里填入一个头像 URL 地址'));
    $form->addInput($logoUrl);

    $yiyan = new Typecho_Widget_Helper_Form_Element_Textarea('yiyan', NULL, '道德当身，故不已物惑', _t('一言'), _t('在这里填入一段话，将会显示在站点名称下方'));
    $form->addInput($yiyan);
    
    $footerbeian = new Typecho_Widget_Helper_Form_Element_Text('footerbeian', NULL, NULL, _t('备案号'), _t('如果你的网站备案，请在这里填写备案号，否则请空着它。'));
    $form->addInput($footerbeian);

    $topCids = new Typecho_Widget_Helper_Form_Element_Text(
        'topCids',
        NULL,
        '',
        _t('置顶文章 CID'),
        _t('填写首页需要置顶的文章 CID，多个请用英文逗号分隔，例如：1,2,3')
    );
    $form->addInput($topCids);
}

function themeFields($layout)
{
    $sourceType = new Typecho_Widget_Helper_Form_Element_Radio(
        'sourceType',
        array(
            'original' => _t('原创'),
            'reprint' => _t('转载')
        ),
        'original',
        _t('文章来源类型'),
        _t('设置文章来源类型，前端将显示对应提示')
    );
    $layout->addItem($sourceType);

    $sourceUrl = new Typecho_Widget_Helper_Form_Element_Text(
        'sourceUrl',
        NULL,
        '',
        _t('转载原文地址'),
        _t('当文章来源为转载时填写原文链接')
    );
    $layout->addItem($sourceUrl);
}

function yingedGetTopCids($value)
{
    if (empty($value)) {
        return array();
    }

    $parts = preg_split('/\s*,\s*/', trim((string) $value));
    $cids = array();
    foreach ($parts as $part) {
        $cid = (int) $part;
        if ($cid > 0) {
            $cids[] = $cid;
        }
    }

    return array_values(array_unique($cids));
}
