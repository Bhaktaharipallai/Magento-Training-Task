<?php
/**
 *
 * Copyright © Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Session2\CustomDi\Controller\Index;

use Magento\Framework\Controller\ResultFactory;

/**
 * Class Index
 * Session2\CustomDi\Controller\Index
 */
class Index implements \Magento\Framework\App\ActionInterface
{
    /**
     * @var ResultFactory
     */
    private ResultFactory $resultFactory;

    /**
     * Index constructor.
     * @param ResultFactory $resultFactory
     */
    public function __construct(ResultFactory $resultFactory)
    {
        $this->resultFactory = $resultFactory;
    }

    /**
     * Execute Method
     *
     * @return \Magento\Framework\App\ResponseInterface|\Magento\Framework\Controller\ResultInterface|void
     */
    public function execute()
    {
        return $this->resultFactory->create(ResultFactory::TYPE_PAGE);
    }
}
