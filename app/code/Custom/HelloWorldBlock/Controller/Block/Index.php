<?php
/**
 *
 * Copyright © Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Custom\HelloWorldBlock\Controller\Block;

use Custom\HelloWorldBlock\Block\Test;
use Magento\Framework\App\ActionInterface;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\Controller\ResultInterface;
use Magento\Framework\View\LayoutInterface;
use Magento\Framework\View\Result\PageFactory;

/**
 * Class Index
 * Custom\HelloWorldBlock\Controller\Block
 */
class Index implements ActionInterface
{
    /**
     * @var PageFactory
     */
    protected $_pageFactory;

    /**
     * @var ResultFactory $resultFactory
     */
    protected $_resultFactory;
    /**
     * Index constructor.
     * @param PageFactory $pageFactory
     * @param ResultFactory $resultFactory
     */
    public function __construct(
        PageFactory $pageFactory,
        ResultFactory $resultFactory
    ) {
        $this->_pageFactory = $pageFactory;
        $this->_resultFactory = $resultFactory;
    }

    /**
     * @return ResponseInterface|ResultInterface
     */
    public function execute()
    {
        $layout = $this->_pageFactory->create()->getLayout();
        $block = $layout->createBlock('Custom\HelloWorldBlock\Block\Test');
        $result = $this->_resultFactory->create(ResultFactory::TYPE_RAW);
        $result->setContents($block->toHtml());

        return $result;
    }
}
