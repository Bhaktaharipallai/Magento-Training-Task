<?php
/**
 * Copyright © Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Custom\RootCategories\Controller\Index;

use Magento\Framework\Controller\ResultFactory;

class Index implements \Magento\Framework\App\ActionInterface
{
    /**
     * @var ResultFactory
     */
    private $resultFactory;

    /**
     * Index constructor.
     * @param ResultFactory $resultFactory
     */
    public function __construct(ResultFactory $resultFactory)
    {
        $this->resultFactory = $resultFactory;
    }

    /**
     * Index execute
     *
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        return $this->resultFactory->create(ResultFactory::TYPE_PAGE);
    }
}
