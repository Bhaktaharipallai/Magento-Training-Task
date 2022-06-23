<?php
/**
 *
 * Copyright © Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Custom\ProductViewDescriptionPlugin\Block\Product\View;

/**
 * Class Description
 * Custom\ProductViewDescriptionPlugin\Block\Product\View
 */
class Description extends \Magento\Catalog\Block\Product\View\Description
{
    /**
     * @param \Magento\Catalog\Block\Product\View\Description $description
     */
    public function beforeToHtml(\Magento\Catalog\Block\Product\View\Description $description)
    {
        $description->getProduct()->setDescription('test description!');
    }
}
