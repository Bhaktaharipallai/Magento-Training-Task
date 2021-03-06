<?php
/**
 * Copyright © Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Unit4\RootCategories\Block;

use Magento\Catalog\Api\Data\CategoryInterface;
use Magento\Framework\View\Element\Template\Context;

class StoresList extends \Magento\Framework\View\Element\Template
{
//    /**
//     * @var CategoryInterface
//     */
//    private $catalogCategory;
//
//    /**
//     * StoresList constructor.
//     *
//     * @param CategoryInterface $catalogCategory
//     * @param Context $context
//     */
//    public function __construct(CategoryInterface $catalogCategory, Context $context)
//    {
//        parent::__construct($context);
//        $this->catalogCategory = $catalogCategory;
//    }
//
//    /**
//     * _toHTml
//     *
//     * @return string
//     */
//    public function _toHtml()
//    {
//        $storesList = $this->_storeManager->getStores();
//        $catalogCategory = $this->catalogCategory;
//        $stores = [];
//        foreach ($storesList as $store) {
//            $categoryName = $catalogCategory->load($store->getRootCategoryId())->getName();
//            $stores[] = [
//                'store_name' => $store->getName(),
//                'root_category_name' => $categoryName
//            ];
//        }
//        $stores = array_map(function ($item) {
//            $string = '<b>STORE</b> ' . $item['store_name'];
//            $string .= ' <b>ROOT CATEGORY</b> ' . $item['root_category_name'] . '<br>';
//            return $string;
//        }, $stores);
//        $response = implode('', $stores);
//        return $response;
//    }
}
