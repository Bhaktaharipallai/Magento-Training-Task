<?php
/**
 *
 * Copyright © Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Custom\Plugins\Plugin;

/**
 * Class AroundBreadcrumbsPlugin
 * Custom\Plugins\Plugin
 */
class AroundBreadcrumbsPlugin
{
    /**
     * @param \Magento\Theme\Block\Html\Breadcrumbs $subject
     * @param callable $proceed
     * @param $crumbName
     * @param $crumbInfo
     */
    public function aroundAddCrumb(
        \Magento\Theme\Block\Html\Breadcrumbs $subject,
        callable $proceed,
        $crumbName,
        $crumbInfo
    ) {
        $crumbInfo['label'] = $crumbInfo['label'].'<<<<<<<<<< ddd <<<<<<<';
        $proceed($crumbName, $crumbInfo);
    }
}
