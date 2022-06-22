<?php
/**
 *
 * Copyright © Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Custom\Plugins\Plugin;

/**
 * Class BeforeBreadcrumbsPlugin
 * Custom\Plugins\Plugin
 */
class BeforeBreadcrumbsPlugin
{
    /**
     * @param \Magento\Theme\Block\Html\Breadcrumbs $subject
     * @param $crumbName
     * @param $crumbInfo
     * @return array
     */
    public function beforeAddCrumb(\Magento\Theme\Block\Html\Breadcrumbs $subject, $crumbName, $crumbInfo)
    {
        $crumbInfo['label'] = $crumbInfo['label'].'>>>>> jj>>>>';
        return [$crumbName, $crumbInfo];
    }
}
